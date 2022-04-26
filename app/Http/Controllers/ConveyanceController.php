<?php

namespace App\Http\Controllers;

use App\Models\Conveyance;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Validator;

class ConveyanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Conveyance.index');
    }

    public function fetchconveyances()
    {
        $conveyances = Conveyance::all();

        return response()->json([
            'conveyances'  => $conveyances,
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

        $conveyance = new Conveyance;
        $conveyance->description = $request->input('description');
        $conveyance->save();

        return response()->json([
            'status'    => 200,
            'message'   => $request->description . ' has been added successfully',
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Conveyance  $conveyance
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $conveyance = Conveyance::find($id);

        // Check if id exist
        if($conveyance)
        {
            return response()->json([
                'status'    => 200,
                'conveyance'   => $conveyance,
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
     * @param  \App\Models\Conveyance  $conveyance
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

        $conveyance = Conveyance::find($id);

        // Check if id exist
        if($conveyance)
        {
            $conveyance->description = $request->input('description');
            $conveyance->update();

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
     * @param  \App\Models\Conveyance  $conveyance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $conveyance = Conveyance::find($id);

        // Check if id exist
        if($conveyance)
        {
            $conveyance->delete();

            return response()->json([
                'status'    => 200,
                'message'   => $conveyance->description . ' has been deleted.',
            ]);
        } else {
            return response()->json([
                'status'    => 404,
                'message'   => "Record doesn't exist",
            ]);
        }
    }
}