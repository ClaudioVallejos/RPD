<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lotes', function (Blueprint $table) {
            $table->increments('id');

            $table->String('numero_lote');
            $table->Boolean('available')->default('1');

            $table->integer('fruit_id')->unsigned();
            $table->integer('variety_id')->unsigned();
            $table->integer('quality_id')->unsigned();
            $table->integer('format_id')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->integer('quantity')->unsigned();
            $table->integer('palletWeight')->unsigned();
            
            
            
            $table->Boolean('rep')->default('0');
        
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
            $table->foreign('fruit_id')->references('id')->on('fruits')->onDelete('cascade');
            $table->foreign('variety_id')->references('id')->on('varieties')->onDelete('cascade');
            $table->foreign('quality_id')->references('id')->on('qualities')->onDelete('cascade');
            $table->foreign('format_id')->references('id')->on('formats')->onDelete('cascade');

            $table->Boolean('rejected')->default('0');

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
        Schema::dropIfExists('lotes');
    }
}
