<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->double('length');
            $table->double('width');
            $table->double('height');
            $table->double('weight');
            $table->boolean('refrigeration')->default(false);
            $table->double('min_temp')->nullable();
            $table->double('max_temp')->nullable();
            $table->integer('assign_attempt')->nullable()->default(0);
            //$table->boolean('fragile')->default(false);
            
            $table->string('origen');
            $table->string('destino');


            $table->timestamps();
        }); 

        Schema::create('asigned_vehicle', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('package_id')->unsigned();
            $table->foreign('package_id')->references('id')->on('packages');
            
            $table->integer('vehicle_id')->unsigned();
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->double('distance');
            $table->double('cost');
            $table->double('value');
            $table->boolean('winner')->default(false);

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
        Schema::dropIfExists('asigned_vehicle');
        Schema::dropIfExists('packages');
    }
}
