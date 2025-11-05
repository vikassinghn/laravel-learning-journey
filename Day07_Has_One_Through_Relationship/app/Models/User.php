<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function phoneNumber()
    {
        return $this->hasOneThrough(Phone_number::class, Company::class);
    }
}
