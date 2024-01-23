<?php

namespace App\Models;

use App\Models\Bank;
use App\Models\Pengaturan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BankSetting extends Model
{
    use HasFactory;

    // many to one table pengaturan
    public function pengaturans()
    {
        return $this->belongsTo(Pengaturan::class);
    }

    //many to one table bank
    public function banks()
    {
        return $this->belongsTo(Bank::class);
    }


}
