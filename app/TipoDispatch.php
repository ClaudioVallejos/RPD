<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDispatch extends Model
{
   protected $primaryKey = 'id';
	
    protected $fillable = [
        
        'name','description'            
    ];

    public function processes(){
        return $this->hasMany(Process::class);
    }
	
}
