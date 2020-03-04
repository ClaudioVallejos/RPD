<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dispatch_Process extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
            'disptach_id', 'subprocess_id',
    ];
}