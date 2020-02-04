<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['chassis', 'model', 'color', 'year'];

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function services()
    {
        return $this->hasMany('App\Models\Service');
    }
}
