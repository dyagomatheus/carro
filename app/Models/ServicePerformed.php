<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicePerformed extends Model
{
    protected $fillable = ['warranty', 'description', 'service_id'];
    protected $table = 'services_performeds';

    public function service()
    {
        return $this->belongsTo('App\Models\Service');
    }
}
