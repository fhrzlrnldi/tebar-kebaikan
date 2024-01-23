<?php

namespace App\Models;

use App\Models\GalangDana;
// use Illuminate\Database\Eloquent\Model;
use App\Models\KategoriDonasi;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];
  /**
   * Get all of the galangDanas for the Kategori
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function galangDanas()
  {
      return $this->hasMany(GalangDana::class);
  }

    //one to many kategori donasi
    public function kategoridonasis()
    {
        return $this->hasMany(KategoriDonasi::class);
    }
}
