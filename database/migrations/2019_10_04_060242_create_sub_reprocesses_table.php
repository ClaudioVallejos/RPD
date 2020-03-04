<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubReprocessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_reprocesses', function (Blueprint $table) {
            $table->increments('id');

            $table->Integer('reprocess_id')->unsigned();
            $table->foreign('reprocess_id')->references('id')->on('reprocesses');

            $table->Integer('format_id')->unsigned();
            $table->foreign('format_id')->references('id')->on('formats')->onDelete('cascade');;
            
            $table->Integer('quality_id')->unsigned();
            $table->foreign('quality_id')->references('id')->on('qualities');

            $table->Integer('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('statuses');

            $table->Integer('fruit_id')->unsigned();
            $table->foreign('fruit_id')->references('id')->on('fruits');

            $table->Integer('variety_id')->unsigned();
            $table->foreign('variety_id')->references('id')->on('varieties');

            $table->Integer('quantity');
            $table->Boolean('rep')->default('0');
            
            $table->Integer('weight');
            $table->String('tarja');
            $table->Boolean('available')->default('1');
    
            $table->Boolean('rejected')->default('0');

            $table->integer('reason')->unsigned()->nullable();
            $table->foreign('reason')->references('id')->on('motivorejecteds');
            $table->String('comment')->nullable();

            $table->String('folioStart');
            $table->String('folioEnd');

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
        Schema::dropIfExists('sub_reprocesses');
    }
}
