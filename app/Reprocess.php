<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reprocess extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'tarja_reproceso', 'wash', 'rejected_id', 'variety_id', 'quality_id', 'fruit_id', 'status_id','identificador'
    ];

    public function lotes()
    {
        return $this->belongsToMany(Lote::class);
    }
    public function Reprocess()
    {
        return $this->belongsToMany(Reprocess::class);
    }

    public function subprocess()
    {
        return $this->belongsToMany(SubProcess::class);
    }

    public function receptions()
    {
        return $this->belongsToMany('\App\Reception', 'process__receptions')
            ->withPivot('process_id');
    }

    public function dispatches()
    {
        return $this->belongsToMany(Dispatch::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function rejected()
    {
        return $this->belongsTo(Rejected::class);
    }

    public function fruit()
    {
        return $this->belongsTo(Fruit::class);
    }

    public function varieties()
    {
        return $this->belongsTo(Variety::class, 'variety_id');
    }

    public function quality()
    {
        return $this->belongsTo(Quality::class);
    }

    
}
