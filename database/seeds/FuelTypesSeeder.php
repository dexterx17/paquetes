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
        $super->fuel = "Manual";
        $super->cost = 0;
        $super->save();        

        $diesel = new Fuel_type();
        $diesel->fuel = "Diesel";
        $diesel->cost = 1.03;
        $diesel->save();

        $super = new Fuel_type();
        $super->fuel = "Gasolina super";
        $super->cost = 2.8;
        $super->save();

        $extra = new Fuel_type();
        $extra->fuel = "Gasolina extra";
        $extra->cost = 1.8;
        $extra->save();


    }
}
