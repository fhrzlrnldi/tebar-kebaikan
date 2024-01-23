<?php

namespace App\Models;

use App\Models\Kategori;
use App\Models\GalangDana;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriDonasi extends Model
{
    use HasFactory;

    //many to one table kategori
    public function kategoris()
    {
        return $this->belongsTo(Kategori::class);
    }

    //many to one table galang dana
    public function galangdanas()
    {
        return $this->belongsTo(GalangDana::class);
    }
}
