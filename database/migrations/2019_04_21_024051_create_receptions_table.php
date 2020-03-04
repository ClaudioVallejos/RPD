 <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receptions', function (Blueprint $table) {
            $table->increments('id');
            $table->Double('grossweight');

            $table->Integer('provider_id')->unsigned();
                $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade');

            $table->Integer('variety_id')->unsigned();
                $table->foreign('variety_id')->references('id')->on('varieties')->onDelete('cascade');
            
            $table->Integer('fruit_id')->unsigned();
                $table->foreign('fruit_id')->references('id')->on('fruits')->onDelete('cascade');

            $table->Integer('quality_id')->unsigned();
                $table->foreign('quality_id')->references('id')->on('qualities')->onDelete('cascade');

            $table->Integer('season_id')->unsigned();
                $table->foreign('season_id')->references('id')->on('seasons')->onDelete('cascade');     
           
            $table->Integer('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');

            $table->Integer('supplies_id')->unsigned();
            $table->foreign('supplies_id')->references('id')->on('supplies')->onDelete('cascade');

            $table->Integer('quantity');
            $table->Double('palet_weight');

            $table->String('netweight');
            $table->boolean('rejected');
            $table->String('middleweight_trays');
            $table->String('name_driver');
            $table->String('number_guide');
            $table->String('comment')->nullable();
            $table->String('temperature');
            $table->String('tarja');
            $table->Boolean('available')->default('1');

            $table->timestamps();

        });        
    }

    /**
     * Reverse the migrations.–––
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receptions');
    }
}