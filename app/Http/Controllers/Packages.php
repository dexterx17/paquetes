<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Package;
use App\Vehicle;

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
        $vehicles = Vehicle::all();

        foreach ($vehicles as $key => $v) {
            $vs[$v->id] = $v->model.' - '.$v->type->type;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
