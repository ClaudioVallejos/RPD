<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
    ];

    public function receptions(){
        return $this->hasMany(Reception::class);
    } 

    public function subprocesses(){
        return $this->hasMany(SubProcess::class);
    }

     public function subreprocesses(){
        return $this->hasMany(SubProcess::class);
    }
     public function lote(){
        return $this->hasMany(Reception::class);
    }
     public function dispatchs(){
        return $this->hasMany(Dispatch::class);
    }
}
