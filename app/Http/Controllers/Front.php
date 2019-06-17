<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Vehicle;
use App\Package;
use App\Fuel_type;
use App\Vehicle_type;

class Front extends Controller
{
    var $datos;

    public function index(){
        $this->datos['vehicles'] = Vehicle::count();
        $this->datos['packages'] = Package::count();
        $this->datos['fuels'] = Fuel_type::count();
        $this->datos['types'] = Vehicle_type::count();

        return view('dashboard', $this->datos);
    }
}
