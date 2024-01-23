<?php

namespace App\Models;

use App\Models\BankSetting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengaturan extends Model
{
    use HasFactory;

    //one to many table bank setting
    public function banksettings()
    {
        return $this->hasMany(BankSetting::class);
    }
}
