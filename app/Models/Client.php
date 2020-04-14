<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'social_name', 'fantasy_name', 'cnpj', 'code', 'telephone', 'zipcode', 'street', 'number', 'complement', 'district', 'city', 'state', 'status', 'state_registration', 'responsible'
    ];

    public function services()
    {
        return $this->hasMany('App\Models\Service');
    }

    public function schedules()
    {
        return $this->hasMany('App\Models\Schedule');
    }

}
