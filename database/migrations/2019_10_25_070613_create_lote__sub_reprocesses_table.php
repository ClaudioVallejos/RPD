<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoteSubReprocessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lote__sub_reprocesses', function (Blueprint $table) {
            $table->increments('id');
           
            $table->integer('subreprocess_id')->unsigned();
            $table->integer('lote_id')->unsigned();


            $table->foreign('subreprocess_id')->references('id')->on('sub_reprocesses') ->onDelete('cascade') ->onUpdate('cascade');
            $table->foreign('lote_id')->references('id')->on('lotes') ->onDelete('cascade') ->onUpdate('cascade');
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
        Schema::dropIfExists('lote__sub_reprocesses');
    }
}
