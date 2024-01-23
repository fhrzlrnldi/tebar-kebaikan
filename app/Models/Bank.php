<?php

namespace App\Models;

use App\Models\BankUser;
use App\Models\BankSetting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bank extends Model
{
    use HasFactory;

    // one to many table bank user
    public function bankusers()
    {
        return $this->hasMany(BankUser::class);
    }

    //one to many table bank setting
    public function banksettings()
    {
        return $this->hasMany(BankSetting::class);
    }
}
