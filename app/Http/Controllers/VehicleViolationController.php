<?php

namespace App\Http\Controllers;

use App\Models\VehicleViolation;
use Illuminate\Http\Request;
use Session;

class VehicleViolationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicleviolation = VehicleViolation::select('id', 'description')->paginate(20);

        return view('VehicleViolation.index', compact('vehicleviolation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'description'   => ['required', 'max:255', 'string']
        ]);

        ViolationType::create([
            'description'   =>  $request->description
        ]);

        \Session::flash('success', $request->description . ' has been added successfully.');

        return redirect()->route('VehicleViolation.index');
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
    public function edit(VehicleViolation $VehicleViolation)
    {
        return view('VehicleViolation.edit', compact('VehicleViolation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VehicleViolation $VehicleViolation)
    {
        $request->validate([
            'description'   => ['required', 'max:255', 'string']
        ]);

        $VehicleViolation->update([
            'description'   =>  $request->description
        ]);

        \Session::flash('success', $request->description . ' modified successfully.');

        return redirect()->route('VehicleViolation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(VehicleViolation $VehicleViolation)
    {
        $VehicleViolation->delete();

        // return to_route('conveyance.index');
        return redirect()->route('VehicleViolation.index');
    }
}
