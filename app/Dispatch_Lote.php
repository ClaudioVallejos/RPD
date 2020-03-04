<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dispatch_Lote extends Model
{
   protected $primaryKey = 'id';
	
    protected $fillable = [
        
            'dispatch_id', 'lote_id'   
    ];
    
}