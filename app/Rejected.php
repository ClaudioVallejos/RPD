<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rejected extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'reason', 'comment', 'reception_id', 'process_id', 'dispatch_id',
    ];

    public function receptions()
    {
        return $this->hasMany(Reception::class);
    }

    public function processes()
    {
        return $this->hasMany(Proccess::class);
    }

    public function dispatches()
    {
        return $this->hasMany(Dispatch::class);
    }
}
