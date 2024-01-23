<?php

namespace App\Models;

use App\Models\User;
use App\Models\Model;
use App\Models\Donasi;


use App\Models\Kategori;
use App\Models\KategoriDonasi;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GalangDana extends Model
{
    use HasFactory;

    //many to one table user
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    //one to many table kategori donasi
    public function kategoridonasis()
    {
        return $this->hasMany(KategoriDonasi::class);
    }
    /**
     * Get the kategori that owns the GalangDana
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    //one to many table donasi
    public function donasis()
    {
        return $this->hasMany(Donasi::class);
    }

    // public function kategori_donasi()
    // {
    //     return $this->belongsToMany(Kategori::class, 'kategori_donasi');
    // }

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_id', 'id');
    // }

}
