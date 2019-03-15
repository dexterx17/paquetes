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
        $truck = new Vehicle_type();
        $truck->type = "Truck";
        $truck->save();

        
        $motorbike = new Vehicle_type();
        $motorbike->type = "MotorBike";
        $motorbike->save();

        $movil = new Vehicle_type();
        $movil->type = "Movil";
        $movil->save();


    }
}
