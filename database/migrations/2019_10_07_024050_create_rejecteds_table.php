<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRejectedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rejecteds', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('reception_id')->unsigned()->nullable();
            $table->foreign('reception_id')->references('id')->on('receptions');

            $table->integer('process_id')->unsigned()->nullable();
            $table->foreign('process_id')->references('id')->on('processes');

            $table->integer('dispatch')->unsigned()->nullable();
            $table->foreign('dispatch')->references('id')->on('dispatches');

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
        Schema::dropIfExists('rejecteds');
    }
}
