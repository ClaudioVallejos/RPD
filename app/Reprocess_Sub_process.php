<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reprocess_Sub_process extends Model
{
      protected $primaryKey = 'id';

    protected $fillable = [
            'reprocess_id', 'subprocess_id',
    ];
}
