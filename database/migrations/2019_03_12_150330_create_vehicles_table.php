<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('model')->nullable();
            $table->string('plaque')->nullable();
            $table->boolean('refrigeration');
            $table->boolean('fragile');
            $table->boolean('available')->default(true);
            $table->double('volume_capacity');
            $table->double('load_capacity');
            $table->integer('vehicle_type_id')->unsigned();
            $table->foreign('vehicle_type_id')->references('id')->on('vehicle_types');
            $table->integer('fuel_type_id')->unsigned();
            $table->foreign('fuel_type_id')->references('id')->on('fuel_types');
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
        Schema::dropIfExists('vehicles');
    }
}
