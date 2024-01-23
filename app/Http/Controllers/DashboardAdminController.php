<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Donasi;
use App\Models\GalangDana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardAdminController extends Controller
{
    //
    public function dashboard( ){
        $donaturKaya = DB::table('donasis')
    ->join('users', 'donasis.user_id', '=', 'users.id')
    ->select('users.name', DB::raw('sum(donasis.nominal) as nominal'),'users.email')
    ->where('donasis.status', 'confirmed')
    ->groupBy('users.id')
    ->orderBy('donasis.nominal', 'DESC')
    ->limit(5)
    ->get();
    $donaturRajin = DB::table('donasis')
    ->join('users', 'donasis.user_id', '=', 'users.id')
    ->select('users.name', DB::raw('COUNT(*) as total_donasi'),DB::raw('sum(donasis.nominal) as nominal'),'users.email')
    ->where('donasis.status', 'confirmed')
    ->groupBy('users.id')
    ->orderBy('total_donasi', 'DESC')
    ->limit(5)
    ->get();
        return view('admin.admin',[
            'total_donasi'=>GalangDana::sum('nominal'),
            'jumlah_user'=>User::where('role_id','1')->count(),
            'jumlah_galdan'=>GalangDana::count(),
            'sipaling_kaya'=>$donaturKaya,
            'sipaling_rajin'=>$donaturRajin,
        ]);
    }
}
