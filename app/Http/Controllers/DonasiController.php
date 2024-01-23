<?php

namespace App\Http\Controllers;

use App\Models\GalangDana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonasiController extends Controller
{
    
    public function lihatdetaildonasi($slug)
    {
        
        $detaildonasi =GalangDana::where('slug',$slug)
        ->with(['donasis' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->first();


        return view('user.detaildonasi',[
            'detaildonasi'=>$detaildonasi,
            'id'=>$detaildonasi->id
        ]);
    }
    public function lihatorangdonasi ($slug) {
        $orangdonasi = GalangDana::where('slug', $slug)
        ->with(['donasis' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])
        ->first();;
        return view('user.orangdonasi',[
            'orangdonasi'=>$orangdonasi
        ]);
    }
}
