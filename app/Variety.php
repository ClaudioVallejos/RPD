<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variety extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'variety', 'fruit_id'
    ];

    public function fruit()
    {
        return $this->belongsTo(Fruit::class);
    }

    public function receptions(){
        return $this->hasMany(Reception::class);
    }
     public function subprocess(){
        return $this->hasMany(SubProcess::class);
    }

     public function reprocesses(){
        return $this->hasMany(Reprocess::class);
    }
    
    public function lote(){
        return $this->hasMany(Lote::class);
    }
     public function dispatch(){
        return $this->hasMany(Dispatch::class);
    }
}
