<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\VehicleViolations;
use App\Models\Conveyance;
use App\Models\ViolationType;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Validator;

class VehicleViolationsController extends Controller
{
    /**
     * Show the modal for editing
     */
    public function edit($id)
    {
        $vehicleviolations = VehicleViolations::find($id);

        $violationtypes = ViolationType::all();
        $conveyancetypes = Conveyance::all();

        // Check if id exist
        if($vehicleviolations)
        {
            return response()->json([
                'status'    => 200,
                'vehicleviolations'   => $vehicleviolations,
                'violationtypes'  => $violationtypes,
                'conveyancetypes' => $conveyancetypes,
            ]);
        } else {
            return response()->json([
                'status'    => 404,
                'message'   => 'Not Found!',
            ]);
        }
    }

    /**
     * Show the vehicle violations data.
     */
    public function view($id)
    {
        $vehicleviolations = VehicleViolations::find($id);

        // Check if id exist
        if($vehicleviolations)
        {
            return response()->json([
                'status'    => 200,
                'vehicleviolations'   => $vehicleviolations,
                
            ]);
        } else {
            return response()->json([
                'status'    => 404,
                'message'   => 'Not Found!',
            ]);
        }
    }

    /**
     * Show the vehicle violations table.
     */
    public function fetchVehicleViolation()
    {

        $violationtypes = ViolationType::all();
        $conveyancetypes = Conveyance::all();
        $vehicleviolations = VehicleViolations::all();
        //$vehicleviolations = VehicleViolations::select('id', 'date', 'time','plate_no','responsible','conveyance_type','violation_type','remarks')->latest()->paginate(10);
        
        return response()->json([
            'vehicleviolations'  => $vehicleviolations,
            'violationtypes'  => $violationtypes,
            'conveyancetypes' => $conveyancetypes,

        ]);
    }

    /**
     * Show the vehicle violations page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('vehicleviolations.index');
    }
    public function create()
    {
        //
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'time' => 'required',
            'plate_no' => 'required',
            'responsible' => 'required|max:50',
            'remarks' => 'required',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'    => 400,
                'errors'    => $validator->messages(),
            ]);
        }

        VehicleViolations::create([
            'responsible' => $request->responsible,
            'date' => $request->date,
            'time' => $request->time,
            'plate_no' => $request->plate_no,
            'conveyance_type' => $request->conveyance_type,
            'violation_type' => $request->violation_type,
            'remarks' =>  $request->remarks
        ]);

        return response()->json([
            'status'    => 200,
            'message'   => $request->responsible . ' has been added successfully',
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */

    public function destroy($id)
    {
        $vehicleviolations = VehicleViolations::find($id);

        // Check if id exist
        if($vehicleviolations)
        {
            $vehicleviolations->delete();

            return response()->json([
                'status'    => 200,
                'message'   => $vehicleviolations->responsible . ' has been deleted.',
            ]);
        } else {
            return response()->json([
                'status'    => 404,
                'message'   => "Record doesn't exist",
            ]);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'time' => 'required',
            'plate_no' => 'required',
            'responsible' => 'required|max:50',
            'remarks' => 'required',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'    => 400,
                'errors'    => $validator->messages(),
            ]);
        }

        $vehicleviolations = VehicleViolations::find($id);

        // Check if id exist
        if($vehicleviolations)
        {
            $vehicleviolations->responsible = $request->input('responsible');
            $vehicleviolations->update();

            return response()->json([
                'status'    => 200,
                'message'    => $request->description . ' has been update successfully',
            ]);

        } else {
            return response()->json([
                'status'    => 404,
                'message'   => "We can't find " . $request->description,
            ]);
        }
    }

}
