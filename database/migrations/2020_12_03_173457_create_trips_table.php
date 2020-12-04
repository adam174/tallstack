<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->decimal('price', 8, 2);
            $table->date('departure')->nullable();
            $table->date('arrival')->nullable();
            $table->unsignedInteger('category_id');
            $table->unsignedMediumInteger('country_departure_id');
            $table->unsignedmediumInteger('country_arrival_id');
            $table->unsignedMediumInteger('city_departure_id');
            $table->unsignedmediumInteger('city_arrival_id');
            $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('trips');
    }
}
