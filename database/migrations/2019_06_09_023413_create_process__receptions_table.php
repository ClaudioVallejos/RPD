<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcessReceptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('process__receptions', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('process_id')->unsigned();
            $table->integer('reception_id')->unsigned();
            
            $table->timestamps();

            //relation
            $table->foreign('process_id')->references('id')->on('processes')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('reception_id')->references('id')->on('receptions')
                ->onDelete('cascade')
                ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('process__receptions');
    }
}
