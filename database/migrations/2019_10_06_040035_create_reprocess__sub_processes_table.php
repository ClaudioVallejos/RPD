<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReprocessSubProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reprocess_sub_process', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reprocess_id')->unsigned();
            $table->integer('sub_process_id')->unsigned();
            
            $table->timestamps();

            //relation
            $table->foreign('reprocess_id')->references('id')->on('reprocesses')
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
        Schema::dropIfExists('reprocess_sub_process');
    }
}
