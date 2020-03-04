<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quality extends Model
{
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name', 'description',
    ];
    
     public function receptions(){
        return $this->hasMany(Reception::class);
    }

    public function subprocess()
    {
        return $this->belongsTo(SubProcess::class);
    }
     public function reprocesses(){
        return $this->hasMany(Reprocess::class);
    }

    public function lotes()
    {
        return $this->belongsTo(Lote::class);
    }

     public function dispatchs(){
        return $this->hasMany(Dispatch::class);
    }
}
