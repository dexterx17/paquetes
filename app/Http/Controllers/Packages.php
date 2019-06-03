<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Package;
use App\Vehicle;
use App\Asigned_vehicle;

class Packages extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::all();
        
        return view('packages.list', [ 'packages' => $packages ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $vehicles = Vehicle::all();
        return view('packages.create', [ 'vehicles' => $vehicles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $package = new Package($request->all());

        if($request->has('refrigeration')){
            $package->refrigeration = true;
        }else{
            $package->refrigeration = false;
        }
        $package->save();

        $this->calculate_best_vehicle($package, $request->distance);

        return redirect()->route('packages.index');
    }

    /**
     * Calcula el mejor vehiculo en base a un proceso de 3 etapas
     * 
     * La primera etapa verifica cual vehiculo cumple con los requerimientos del paquete
     *  
     * La segunda etapa calcula cual es el vehiculo mas optimo aplicando un formula
     * 
     * La tercera etapa calcula el costo minimo y define al vehiculo asignado
     * 
     * 
     * @param  [type] $package  [description]
     * @param  [type] $distance [description]
     * @return [type]           [description]
     */
    private function calculate_best_vehicle($package, $distance){
        //PRIMERA ETAPA
        //obtenemos el listado de todos los vehiculos que cumplan con las especificaciones del paquete
        $vehicles = Vehicle::where('height','>=',$package->height)
                           ->where('width','>=',$package->width)
                           ->where('length','>=',$package->length)
                           ->where('weight','>=',$package->weight)
                           ->where('refrigeration','=',($package->refrigeration ? 1 : 0))
                           ->get();

        //si el paquete requiere refrigeracion
        if($package->refrigeration){
            //verificamos cual vehiculo cumple con la temperatura especficada
            $vehicles = $vehicles->where('min_rf','>=',$package->min_temp)
                                 ->where('max_rf','<=',$package->max_temp);
        }
        //dd($vehicles);

        //SEGUNDA ETAPA
        //recorremos los vehiculos que pasaron la primera etapa
        foreach ($vehicles as $key => $vehicle) {
            //Variable de ni se que
            $w = 0.2;

            //aplicamos la formula para cada parametro
            $width = $package->width / $vehicle->width;
            $height = $package->height / $vehicle->height;
            $length = $package->length / $vehicle->length;
            $weight = $package->weight / $vehicle->weight;
            if($package->refrigeration){
                $refrigeration = ($package->max_temp - $package->min_temp) / ( $vehicle->max_rf - $vehicle->min_rf) ;
            }else{
                $refrigeration = 0;
            }
            //$dom = ($w * $width) + ($w * $height) + ($w * $length) + ($w * $weight) + ( $w * $refrigeration);
            $dom =  $w * ($width + $height + $length + $weight + $refrigeration);
            $vehicle->dom = $dom;
        }
        //Ordenamos el listado de vehiculo en base al DOM
        $vehicle = $vehicles->sortByDesc('dom');


        //TERCERA ETAPA
        ////recorremos los vehiculos que pasaron la segunda etapa
        foreach ($vehicles as $key => $vehicle) {
            //Salario de conductor
            $h = 20;
            $kv = $vehicle->type->cost_per_kilometer;
            $mv = $vehicle->type->maintenance;
            //dd($distance,$kv, $mv,$h);
            $cost = $distance * ($kv + $mv) + $h;
            $vehicle->cost = $cost;
        }

        //Ordenamos el listado de vehiculo en base al COSTO
        $vehicle = $vehicles->sortByDesc('cost');
        
        ////recorremos los vehiculos que pasaron las 3 etapa
        foreach ($vehicles as $key => $vehicle) {
            $asigned = new Asigned_vehicle();
            $asigned->vehicle_id = $vehicle->id;
            $asigned->package_id = $package->id;
            $asigned->distance = $distance;
            $asigned->cost = $vehicle->cost;
            $asigned->value = $vehicle->dom; //Ranking formule
            if($key==0)
                $asigned->winner = true;
            $asigned->save();
        } 

        return $vehicles;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $package = Package::find($id);

        return view('packages.info',[ 'package' => $package]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $package = Package::find($id);

        return view('packages.edit', [ 'p' => $package  ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $package = Package::find($id);
        $package->fill($request->all());
        
        if($request->has('refrigeration')){
            $package->refrigeration = true;
        }else{
            $package->refrigeration = false;
        }

        $package->save();

        return redirect()->route('packages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $package = Package::find($id);
        $package->delete();
        return redirect()->route('packages.index');
    }
}
