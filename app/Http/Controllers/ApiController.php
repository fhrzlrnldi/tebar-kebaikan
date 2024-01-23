<?php

namespace App\Http\Controllers;

use App\Models\GalangDana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    //
    public function paymenthandler(Request $request)
    {
        $validated= $request->validate([
            'order_id'=>'required',
            'transaction_status'=>'required',
            'gross_amount'=>'required',
            'signature_key'=>'required',
            'status_code'=>'required',
        ]);
      
        $signature_key =  hash('sha512',$validated['order_id'].$validated['status_code'].$validated['gross_amount'].env('MIDTRANS_SERVER_KEY'));
        if($signature_key != $validated['signature_key']){
            return abort(404);
        }
        if ($validated['transaction_status']==='settlement') {
            $validated['transaction_status']='confirmed';
        }
        if ($validated['transaction_status']==='failure') {
            $validated['transaction_status']='expired';
        }
        DB::table('donasis')
        ->where('order_number',$validated['order_id'])
        ->update([
            'status'=>$validated['transaction_status']
        ]);
        $transaksi_donasi= DB::table('donasis as d')
        ->where('order_number',$validated['order_id'])->first();
        $galangDana = GalangDana::find($transaksi_donasi->galang_dana_id);
        $nominalLama = $galangDana->nominal;
        $grossAmount = (float)$transaksi_donasi->nominal ;
        $galangDana->nominal = $nominalLama + $grossAmount;
        $galangDana->save();
        return response('success',200);
    }
}
