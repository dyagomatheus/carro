<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['car_id', 'description'];
    
    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }
}
