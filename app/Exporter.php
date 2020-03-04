<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exporter extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'rut', 'phone', 'email'
    ];
}
