<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrayIn extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'traysin', 'provider_id',
    ];

 
    
    public function provider()
    {
        return $this->belongsTo(Providers::class);
    }

}
