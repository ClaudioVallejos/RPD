<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'numero_lote', 'fruit_id',
        'quality_id', 'variety_id', 'format_id', 'quantity', 'palletWeight', 'status_id'
    ];

    public function dispatch()
    {
       
        return $this->belongsToMany('\App\Dispatch', 'Dispatch_Lote')
            ->withPivot('dispatch_id');
    }

    public function subprocesses()
    {
        return $this->belongsToMany('\App\Lote', 'lote_sub_process')
            ->withPivot('sub_process_id');
    }

    public function subprocess()
    {
        return $this->belongsToMany('\App\SubProcess', 'lote_sub_process')
         ->withPivot('lote_id');
    }
    public function subreprocess()
    {
        return $this->belongsToMany('\App\SubReprocess', 'lote__sub_reprocess')
         ->withPivot('lote_id');
    }

    public function fruit()
    {
        return $this->belongsTo(Fruit::class);
    }

    public function format()
    {
        return $this->belongsTo(Format::class);
    }

    public function varieties()
    {
        return $this->belongsTo(Variety::class, 'variety_id');
    }

    public function quality()
    {
        return $this->belongsTo(Quality::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
