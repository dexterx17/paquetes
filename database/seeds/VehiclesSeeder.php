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
        $bike->length = 35;
        $bike->width = 25;
        $bike->height = 25;
        $bike->weight = 3;
        $bike->vehicle_type_id = 1;
        $bike->fuel_type_id = 1;
        $bike->save();

        $motorbike = new Vehicle();
        $motorbike->model = "YAMAHA";
        //$motorbike->plaque = "A-1234";
        $motorbike->refrigeration = false;
        $motorbike->length = 40;
        $motorbike->width = 40;
        $motorbike->height = 35;
        $motorbike->weight = 5;
        $motorbike->vehicle_type_id = 2;
        $motorbike->fuel_type_id = 3;
        $motorbike->save();


        $car = new Vehicle();
        $car->model = "Car 1";
        //$car->plaque = "A-1234";
        $car->refrigeration = true;
        $car->length = 200;
        $car->width = 100;
        $car->height = 100;
        $car->weight = 700;
        $car->min_rf = -26;
        $car->max_rf = -24;
        $car->vehicle_type_id = 3;
        $car->fuel_type_id = 3;
        $car->save();

        $car = new Vehicle();
        $car->model = "Car 2";
        //$car->plaque = "A-1234";
        $car->refrigeration = true;
        $car->length = 200;
        $car->width = 100;
        $car->height = 100;
        $car->weight = 700;
        $car->min_rf = -20;
        $car->max_rf = -10;
        $car->vehicle_type_id = 3;
        $car->fuel_type_id = 2;
        $car->save();


        $van = new Vehicle();
        $van->model = "Van 1";
        //$van->plaque = "A-1234";
        $van->refrigeration = true;
        $van->length = 300;
        $van->width = 150;
        $van->height = 150;
        $van->weight = 1000;
        $van->min_rf = -26;
        $van->max_rf = -24;
        $van->vehicle_type_id = 4;
        $van->fuel_type_id = 3;
        $van->save();

        $van = new Vehicle();
        $van->model = "Van2";
        //$van->plaque = "A-1234";
        $van->refrigeration = true;
        $van->length = 300;
        $van->width = 150;
        $van->height = 150;
        $van->weight = 1000;
        $van->min_rf = -25;
        $van->max_rf = -5;
        $van->vehicle_type_id = 4;
        $van->fuel_type_id = 2;
        $van->save();


        $truck = new Vehicle();
        $truck->model = "Truck 1";
        //$truck->plaque = "A-1234";
        $truck->refrigeration = true;
        $truck->length = 500;
        $truck->width = 260;
        $truck->height = 300;
        $truck->weight = 7000;
        $truck->min_rf = -26;
        $truck->max_rf = -24;
        $truck->vehicle_type_id = 5;
        $truck->fuel_type_id = 3;
        $truck->save();

        $truck = new Vehicle();
        $truck->model = "Truck 2";
        //$truck->plaque = "A-1234";
        $truck->refrigeration = true;
        $truck->length = 500;
        $truck->width = 260;
        $truck->height = 300;
        $truck->weight = 7000;
        $truck->min_rf = -20;
        $truck->max_rf = -10;
        $truck->vehicle_type_id = 5;
        $truck->fuel_type_id = 3;
        $truck->save();


    }
}
