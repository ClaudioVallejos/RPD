<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lote_Reprocess extends Model
{
    protected $primaryKey = 'id';
	
    protected $fillable = [
        
            'lote_id', 'reprocess_id'   
    ];
}
