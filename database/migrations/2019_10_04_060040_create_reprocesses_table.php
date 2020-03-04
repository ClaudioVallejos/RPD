<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReprocessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reprocesses', function (Blueprint $table) {
            $table->increments('id');
            $table->String('tarja_reproceso');
            $table->Boolean('wash')->default('1');
            $table->Boolean('available')->default('1');
            $table->integer('fruit_id')->unsigned();
            $table->integer('variety_id')->unsigned();
            $table->integer('quality_id')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->String('identificador');

            $table->foreign('fruit_id')->references('id')->on('fruits');
            $table->foreign('variety_id')->references('id')->on('varieties');
            $table->foreign('quality_id')->references('id')->on('qualities');
            $table->foreign('status_id')->references('id')->on('statuses');
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
        Schema::dropIfExists('reprocesses');
    }
}
