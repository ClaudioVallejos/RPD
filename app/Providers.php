<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Providers extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'rut', 'address','number_phone', 'rate'
    ];
 	public function receptions(){
        return $this->hasMany(Reception::class);
    }
    public function tray(){
        return $this->hasMany(Trays::class);
    }

    public function rates(){
        return $this->hasMany(Rate::class);
    }
}
