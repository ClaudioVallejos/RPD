<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LoteSubProcessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lote_sub_process', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('lote_id')->unsigned();
            $table->integer('sub_process_id')->unsigned();
            
            $table->timestamps();
    
            //relation
            $table->foreign('lote_id')->references('id')->on('lotes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
    
            $table->foreign('sub_process_id')->references('id')->on('sub_processes')
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
         Schema::dropIfExists('lote_sub_process');
    }
}
