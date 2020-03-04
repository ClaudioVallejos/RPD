<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class motivorejected extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
    ];
}
