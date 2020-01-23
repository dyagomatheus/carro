<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['car_id', 'client_id', 'current_km'];
    
    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function car()
    {
        return $this->belongsTo('App\Models\Car');
    }

    public function performeds()
    {
        return $this->hasMany('App\Models\ServicePerformed');
    }
}
