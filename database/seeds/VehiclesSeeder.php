<?php

use Illuminate\Database\Seeder;

use App\Vehicle;


class VehiclesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bike = new Vehicle();
        $bike->model = "BMX";
        //$bike->plaque = "A-1234";
        $bike->refrigeration = false;
        $bike->fragile = false;
        $bike->volume_capacity = 10;
        $bike->load_capacity = 20;
        $bike->vehicle_type_id = 1;
        $bike->fuel_type_id = 1;
        $bike->save();

        $motorbike = new Vehicle();
        $motorbike->model = "YAMAHA";
        //$motorbike->plaque = "A-1234";
        $motorbike->refrigeration = false;
        $motorbike->fragile = false;
        $motorbike->volume_capacity = 20;
        $motorbike->load_capacity = 40;
        $motorbike->vehicle_type_id = 2;
        $motorbike->fuel_type_id = 3;
        $motorbike->save();


        $car = new Vehicle();
        $car->model = "aveo";
        //$car->plaque = "A-1234";
        $car->refrigeration = false;
        $car->fragile = false;
        $car->volume_capacity = 50;
        $car->load_capacity = 100;
        $car->vehicle_type_id = 3;
        $car->fuel_type_id = 3;
        $car->save();

        $car = new Vehicle();
        $car->model = "spark";
        //$car->plaque = "A-1234";
        $car->refrigeration = true;
        $car->fragile = true;
        $car->volume_capacity = 50;
        $car->load_capacity = 100;
        $car->vehicle_type_id = 3;
        $car->fuel_type_id = 3;
        $car->save();


        $van = new Vehicle();
        $van->model = "viajera";
        //$van->plaque = "A-1234";
        $van->refrigeration = false;
        $van->fragile = false;
        $van->volume_capacity = 100;
        $van->load_capacity = 200;
        $van->vehicle_type_id = 4;
        $van->fuel_type_id = 2;
        $van->save();

        $van = new Vehicle();
        $van->model = "campera";
        //$van->plaque = "A-1234";
        $van->refrigeration = true;
        $van->fragile = true;
        $van->volume_capacity = 100;
        $van->load_capacity = 200;
        $van->vehicle_type_id = 4;
        $van->fuel_type_id = 2;
        $van->save();


        $truck = new Vehicle();
        $truck->model = "tonka";
        //$truck->plaque = "A-1234";
        $truck->refrigeration = false;
        $truck->fragile = false;
        $truck->volume_capacity = 400;
        $truck->load_capacity = 400;
        $truck->vehicle_type_id = 5;
        $truck->fuel_type_id = 2;
        $truck->save();

        $truck = new Vehicle();
        $truck->model = "campera";
        //$truck->plaque = "A-1234";
        $truck->refrigeration = true;
        $truck->fragile = true;
        $truck->volume_capacity = 400;
        $truck->load_capacity = 400;
        $truck->vehicle_type_id = 5;
        $truck->fuel_type_id = 2;
        $truck->save();


    }
}
