<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Vehicle;
use App\Vehicle_type;
use App\Fuel_type;

class Vehicles extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        
        return view('vehicles.list', [ 'vehicles' => $vehicles ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fuels = $this->_fuelTypes(); 
        
        $types = Vehicle_type::all()->pluck('type', 'id');
        
        return view('vehicles.create', [ 'fuel_types'=>$fuels,  'vehicle_types' => $types  ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vehicle = new Vehicle($request->all());

        if($request->has('refrigeration')){
            $vehicle->refrigeration = true;
        }else{
            $vehicle->refrigeration = false;
        }
        $vehicle->save();

        return redirect()->route('vehicles.index');
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
        $vehicle = Vehicle::find($id);
        $fuels = $this->_fuelTypes(); 
        
        $types = Vehicle_type::all()->pluck('type', 'id');
        
        return view('vehicles.edit', [ 'fuel_types'=>$fuels,  'vehicle_types' => $types, 'v' => $vehicle  ]);
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
        $vehicle = Vehicle::find($id);
        $vehicle->fill($request->all());
        
        if($request->has('refrigeration')){
            $vehicle->refrigeration = true;
        }else{
            $vehicle->refrigeration = false;
        }
        $vehicle->save();

        return redirect()->route('vehicles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->delete();
        
        return redirect()->route('vehicles.index');
    }

    private function _fuelTypes(){
        $fuels = Fuel_type::all();
        $types = [];
        foreach ($fuels as $key => $f) {
            $types[$f->id]=$f->fuel.' ( $ '.$f->cost.' / gal )';
        }
        return $types;
    }
}
