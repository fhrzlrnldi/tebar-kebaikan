<?php

namespace App\Models;

use App\Models\Bank;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BankUser extends Model
{
    use HasFactory;

    //many to one table user
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    //many to one table bank
    public function banks()
    {
        return $this->belongsTo(Bank::class);
    }


}
