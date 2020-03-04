<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Format extends Model
{


	protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'weight'
    ];

  	public function subprocesses()
    {
        return $this->belongsTo(SubProcess::class);
    }
    
  	public function lotes()
    {
        return $this->belongsTo(Lote::class);
    }
  
}
