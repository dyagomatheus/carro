<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['date', 'hour', 'client_id', 'car_id', 'description'];

    public function car()
    {
        return $this->belongsTo('App\Models\Car');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }
}
