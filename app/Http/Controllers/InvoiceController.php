<?php

namespace App\Http\Controllers;
use App\Models\Donasi;
use App\Models\GalangDana;
use Illuminate\Http\Request;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index($slug)
    {
       return view('program.invoice',[
        'slug'=>$slug
       ]);
    }
    public function pembayaran(Request $req)
    {
        $uuid = Str::uuid()->toString();
        $id_galang_dana = GalangDana::where('slug',$req->slug)->first()->id;
       $data = Donasi::create([
            'order_number'=>$uuid,
            'user_id'=>Auth::user()->id,
            'galang_dana_id'=>$id_galang_dana,
            'nominal'=>$req->nominal,
            'anonim'=>isset($req->anonim)?'1':'0',
            'dukungan'=>$req->dukungan,
            'status'=>'not confirmed'
        ]);
        $galangDana = GalangDana::find($data->galang_dana_id);
        //SAMPLE REQUEST START HERE
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env("MIDTRANS_SERVER_KEY");
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = false;

    $params = array(
        'transaction_details' => array(
            'order_id' => $data->order_number,
            'gross_amount' => $data->nominal,
        ),
    );
    $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('program.pembayaran',[
            'snapToken'=>$snapToken,
            'data'=>$data,
            'galangDana'=>$galangDana
        ]);
    }
    public function prosesbayar(Request $request)
    {
           // Mendekode JSON yang ada dalam input tersembunyi
           $jsonInfo = $request->input('jsoninfo');
           $responseData = json_decode($jsonInfo, true);
           // Mengambil nilai yang diperlukan dari response JSON
           $jenisPembayaran = $responseData['va_numbers'][0]['bank'];
           $noVA = $responseData['va_numbers'][0]['va_number'];
           $slug = $request->input('slug');
           
           if ($request->status=='settlement') {
            $status='confirmed';    
            $galangDana = GalangDana::where('slug', $slug)->first();
            $nominalLama = $galangDana->nominal;
            $grossAmount = (float) $responseData['gross_amount'];
            $galangDana->nominal = $nominalLama + $grossAmount;
            $galangDana->save();
           }else {
            $status='not confirmed';
           }
   
           // Mengambil slug dari input tersembunyi
           // Mencari donasi berdasarkan slug
           $donasi = Donasi::where('order_number', $responseData['order_id'])->first();
           $donasi->jenis_pembayaran = $jenisPembayaran;
           $donasi->no_va = $noVA;
           $donasi->status = $status;
           $donasi->save();
   

          return redirect()->route('histori-donasi');
    }

}
