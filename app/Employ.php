<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Employ extends Model
{
    protected $fillable = [
        'name','lastname', 'identification',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($employ) {
            $employ->user_id = Auth::id();
        });
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function registers()
    {
        return $this->hasMany('App\Register');
    }
}
