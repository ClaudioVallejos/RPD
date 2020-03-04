<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDispatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispatches', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('exporter_id')->unsigned();
            
            $table->foreign('exporter_id')->references('id')->on('exporters')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->String('planilla_dispatch');
            $table->String('numero_guia');
            $table->String('numero_despacho');
            
            $table->Integer('season_id')->unsigned();
            $table->foreign('season_id')->references('id')->on('seasons')->onDelete('cascade');

            $table->Integer('tipodispatch_id')->unsigned();
            $table->foreign('tipodispatch_id')->references('id')->on('tipo_dispatches')->onDelete('cascade');

            $table->Integer('tipotransporte_id')->unsigned();
            $table->foreign('tipotransporte_id')->references('id')->on('tipo_transportes')->onDelete('cascade');
            
             $table->integer('fruit_id')->unsigned();
            $table->integer('variety_id')->unsigned();
            $table->integer('quality_id')->unsigned();
            $table->integer('format_id')->unsigned();
            $table->foreign('fruit_id')->references('id')->on('fruits');
            $table->foreign('variety_id')->references('id')->on('varieties');
            $table->foreign('quality_id')->references('id')->on('qualities');
            $table->foreign('format_id')->references('id')->on('formats');
            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('statuses');
           

            $table->String('puerto_salida');
            $table->String('consignatario');
            $table->String('numero_contenedor');    
            $table->integer('palletWeight')->unsigned();

            $table->String('nombre_chofer');
            $table->String('patente_vehiculo');
            $table->String('patente_rampla');
            $table->Boolean('rejected')->default('0');

            $table->integer('reason')->unsigned()->nullable();
            $table->foreign('reason')->references('id')->on('motivorejecteds');
            $table->String('comment')->nullable();

            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dispatches');
    }
}
