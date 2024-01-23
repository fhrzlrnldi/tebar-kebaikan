<?php

namespace App\Models;

use App\Models\User;
use App\Models\Donasi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembayaran extends Model
{
    use HasFactory;

    // many to one table donasi
    public function donasis()
    {
        return $this->belongsTo(Donasi::class);
    }

    //many to one table user
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
