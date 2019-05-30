<?php

use Illuminate\Database\Seeder;

use App\Vehicle_type;

class VehicleTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        
        $bike = new Vehicle_type();
        $bike->type = "Bike";
        $bike->cost_per_kilometer = 0.2;
        $bike->maintenance = 0.2;
        $bike->save();

        $motorbike = new Vehicle_type();
        $motorbike->type = "MotorBike";
        $motorbike->kilometers_per_gallon = 0.5;
        $motorbike->cost_per_kilometer = 0.5;
        $motorbike->maintenance = 0.5;
        $motorbike->save();

        $car = new Vehicle_type();
        $car->type = "Car";
        $car->kilometers_per_gallon = 24;
        $car->cost_per_kilometer = 0.15;
        $car->maintenance = 0.11;
        $car->save();

        $van = new Vehicle_type();
        $van->type = "Van";
        $van->kilometers_per_gallon = 8;
        $van->cost_per_kilometer = 0.21;
        $van->maintenance = 0.17;
        $van->save();

        $truck = new Vehicle_type();
        $truck->kilometers_per_gallon = 4;
        $truck->cost_per_kilometer = 0.4;
        $truck->maintenance = 0.30;
        $truck->type = "Truck";
        $truck->save();

    }
}
