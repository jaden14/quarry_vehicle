<?php

namespace App\Http\Controllers;

use App\Models\ViolationType;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Validator;

class ViolationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ViolationType.index');
    }

    public function fetchviolationtypes()
    {
        $violationtypes = ViolationType::all();

        return response()->json([
            'violationtypes'  => $violationtypes,
        ]);
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
            'description' => 'required|max:50'
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'    => 400,
                'errors'    => $validator->messages(),
            ]);
        }

        $violationtype = new ViolationType;
        $violationtype->description = $request->input('description');
        $violationtype->save();

        return response()->json([
            'status'    => 200,
            'message'   => $request->description . ' has been added successfully',
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ViolationType  $violationtype
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $violationtype = ViolationType::find($id);

        // Check if id exist
        if($violationtype)
        {
            return response()->json([
                'status'    => 200,
                'violationtype'   => $violationtype,
            ]);
        } else {
            return response()->json([
                'status'    => 404,
                'message'   => 'Not Found!',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ViolationType  $violationtype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'description' => 'required|max:50'
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'    => 400,
                'errors'    => $validator->messages(),
            ]);
        }

        $violationtype = ViolationType::find($id);

        // Check if id exist
        if($violationtype)
        {
            $violationtype->description = $request->input('description');
            $violationtype->update();

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ViolationType  $violationtype
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $violationtype = ViolationType::find($id);

        // Check if id exist
        if($violationtype)
        {
            $violationtype->delete();

            return response()->json([
                'status'    => 200,
                'message'   => $violationtype->description . ' has been deleted.',
            ]);
        } else {
            return response()->json([
                'status'    => 404,
                'message'   => "Record doesn't exist",
            ]);
        }
    }
}
