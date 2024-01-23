<?php

namespace App\Models;

use App\Models\User;
use App\Models\GalangDana;
use App\Models\Pembayaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Donasi extends Model
{
    use HasFactory;
    protected $guarded =['id'];

    //many to one table user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //many to one galang dana
    public function galangdana()
    {
        return $this->belongsTo(GalangDana::class);
    }

    //one to many table pembayaran
    public function pembayarans()
    {
        return $this->hasMany(Pembayaran::class);
    }

    
}
