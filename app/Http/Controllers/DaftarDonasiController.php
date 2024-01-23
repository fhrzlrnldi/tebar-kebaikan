<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DaftarDonasiController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth');
    }
    public function index(Request $req)
    {
        if ($req->ajax()) {
            $daftarDonasi = DB::table('donasis as d')
        ->join('galang_danas as gd','gd.id','=','d.galang_dana_id')
        ->join('users as u','u.id','=','d.user_id')
        ->select('d.order_number','gd.judul','u.name','d.nominal','d.status','d.created_at')
        // ->whereRaw('d.status = "confirmed"')
        ->get();
        return datatables($daftarDonasi)
        ->addIndexColumn()
        ->make(true);
        }
        return view('daftardonasi.index');
    }
}
