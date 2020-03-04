<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fruit extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'specie',
    ];
     public function receptions(){
        return $this->hasMany(Reception::class);
    }


     public function subprocesses(){
        return $this->hasMany(SubProcess::class);
    }

      public function reprocesses(){
        return $this->hasMany(Reprocess::class);
    }
   
     public function dispatch(){
        return $this->hasMany(Dispatch::class);
    }

     public function variety(){
        return $this->belongsTo(Variety::class);
    }

     public function lote(){
        return $this->hasMany(Lote::class);
    }
    
}
