<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(FuelTypesSeeder::class);
         $this->call(VehicleTypesSeeder::class);
         $this->call(VehiclesSeeder::class);
    }
}
