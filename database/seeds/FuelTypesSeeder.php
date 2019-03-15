<?php

use Illuminate\Database\Seeder;

use App\Fuel_type;

class FuelTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super = new Fuel_type();
        $super->fuel = "Gasolina super";
        $super->cost = 2;
        $super->save();

        
        $diesel = new Fuel_type();
        $diesel->fuel = "Diesel";
        $diesel->cost = 1.50;
        $diesel->save();

        $extra = new Fuel_type();
        $extra->fuel = "Gasolina extra";
        $extra->cost = 2.5;
        $extra->save();


    }
}
