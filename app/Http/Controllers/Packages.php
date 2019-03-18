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
        $vs = [];
        foreach ($vehicles as $key => $v) {
            $vs[$key] = $v->model.' - '.$v->type->type;
        }
        return view('packages.create', [ 'vehicles' => $vehicles, 'vs' => $vs ]);
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

        if($request->has('fragile')){
            $package->fragile = true;
        }else{
            $package->fragile = false;
        }

        $package->save();

        return redirect()->route('packages.index');
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

        if($request->has('fragile')){
            $package->fragil = true;
        }else{
            $package->fragil = false;
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
