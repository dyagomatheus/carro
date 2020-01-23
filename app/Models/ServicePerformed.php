<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicePerformed extends Model
{
    protected $fillable = ['car_id', 'description'];
    protected $table = 'services_performeds';
    
    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }
}
