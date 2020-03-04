<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoteReprocessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lote_reprocess', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reprocess_id')->unsigned();
            $table->integer('lote_id')->unsigned();
            $table->timestamps();

            $table->foreign('reprocess_id')->references('id')->on('reprocesses') ->onDelete('cascade') ->onUpdate('cascade');
            $table->foreign('lote_id')->references('id')->on('lotes') ->onDelete('cascade') ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lote_reprocess');
    }
}
