<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExportersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exporters', function (Blueprint $table) {
            $table->increments('id');
            $table->String('name'); 
            $table->String('rut');
            $table->String('phone');
            $table->String('email')->nullable();

           
            $table->timestamps();
            
        });
    }
    //Rut empresa (o persona), patente es opcional (de hecho pensar en borrar), consultar que mas  
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exporters');
    }
}
