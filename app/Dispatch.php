<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dispatch extends Model
{
    protected $primaryKey = 'id';
	
    protected $fillable = [
            'exporter_id', 'planilla_dispatch','numero_guia','numero_despacho','season_id','tipodispatch_id','puerto_salida','consignatario','numero_contenedor','nombre_chofer','patente_vehiculo','patente_rampla','rejected','comment','tipotransporte_id','fruit_id','quality_id','status_id', 'variety_id','palletWeight', 'format_id'
    ];


   public function lote()
    {
        return $this->belongsToMany('\App\Lote', 'Dispatch_Lote')
            ->withPivot('lote_id');
    }  //falta crear la modelo pivote dispatch lote

    public function processes()
    {
        return $this->belongsToMany(Process::class);
    }

    public function subprocesses()
    {
        return $this->belongsToMany(SubProcess::class);
    }

	public function rejected(){
        return $this->belongsTo(Rejected::class);
    }

     public function season()
    {
        return $this->belongsTo(Season::class);
    }


     public function tipodispatch()
    {
        return $this->belongsTo(TipoDispatch::class);
    }

    public function tipotransporte()
    {
        return $this->belongsTo(TipoTransporte::class);
    }
       
    
    public function fruit()
    {
        return $this->belongsTo(Fruit::class);
    }

 public function quality()
    {
        return $this->belongsTo(Quality::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
    public function varieties()
    {
        return $this->belongsTo(Variety::class, 'variety_id');
    }
}

