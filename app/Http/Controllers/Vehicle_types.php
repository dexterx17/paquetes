<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Vehicle_type;

class Vehicle_types extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Vehicle_type::all();
        
        return view('vehicle_types.list', [ 'types' => $types ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehicle_types.create', [ ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type = new Vehicle_type($request->all());

        $type->save();

        return redirect()->route('vehicle_types.index');
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
        $type = Vehicle_type::find($id);
        
        return view('vehicle_types.edit', [ 'type' => $type  ]);
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
        $type = Vehicle_type::find($id);
        $type->fill($request->all());
        $type->save();

        return redirect()->route('vehicle_types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = Vehicle_type::find($id);
        $type->delete();
        
        return redirect()->route('vehicle_types.index');
    }
}
