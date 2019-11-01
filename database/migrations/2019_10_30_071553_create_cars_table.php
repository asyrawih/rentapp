<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->bigIncrements('car_id');
            $table->unsignedBigInteger('brand_id'); 
            $table->string('owner_id');
            $table->string('color'); 
            $table->string('plat_polisi');
            $table->string('chasisnumber');
            $table->integer('capacity');
            $table->string('modelYear'); 
            $table->string('gambar'); 
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
        Schema::dropIfExists('cars');
    }
}
