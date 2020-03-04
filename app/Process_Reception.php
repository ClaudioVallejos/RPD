<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Process_Reception extends Model
{

   protected $primaryKey = 'id';
	
    protected $fillable = [
        
            'process_id', 'reception_id'   
    ];
    
}
