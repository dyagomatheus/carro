<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['car_id', 'client_id'];
    
    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function performeds()
    {
        return $this->hasMany('App\Models\ServicePerformed');
    }
}
