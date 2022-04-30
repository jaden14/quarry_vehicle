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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(VehicleViolations $vehicleviolation)
    {
        $vehicleviolation->delete();
        return redirect()->route('vehicleviolations.index')->withSuccess('Deleted Successfully!');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Conveyance  $conveyance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VehicleViolations $vehicleviolation)
    {
        $request->validate([
            'responsible' => ['required', 'max:255', 'string']
        ]);

        $vehicleviolation->update([
            'responsible' => $request->responsible,
            'date' => $request->date,
            'time' => $request->time,
            'plate_no' => $request->plate_no,
            'conveyance_type' => $request->conveyance_type,
            'violation_type' => $request->violation_type,
            'remarks' =>  $request->remarks
        ]);

        \Session::flash('success', $request->responsible . ' updated successfully.');

        return redirect()->route('vehicleviolations.index');
    }
    public function search()
    {

        $search_text_one = $_GET['plate_no'];
        $search_text_two = $_GET['responsible'];
        $vehicleviolations = VehicleViolations::where('plate_no','LIKE', '%'.$search_text_one.'%')->orWhere('responsible','LIKE', '%'.$search_text_two.'%',)->get();
        return view('vehicleviolations.search', compact('vehicleviolations'));
    }

}
