<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lote_SubReprocess extends Model
{
    protected $primaryKey = 'id';
	
    protected $fillable = [
        
            'lote_id', 'subreprocess_id'   
    ];
}
