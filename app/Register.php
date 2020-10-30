<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Register extends Model
{
    protected $fillable = [
        'checkIn','checkOut', 'employ_id',
    ];

    public function employ()
    {
        return $this->belongsTo('App\Employ');
    }

   
}

