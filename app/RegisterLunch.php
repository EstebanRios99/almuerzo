<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegisterLunch extends Model
{
    protected $fillable = [
        'CheckIn', 'CheckOut',
    ];
}
