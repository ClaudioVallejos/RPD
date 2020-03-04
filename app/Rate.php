<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable = [
        'provider_id', 'rate',
    ];

    public function providers(){
        return $this->hasMany(Provider::class);
    }
}
