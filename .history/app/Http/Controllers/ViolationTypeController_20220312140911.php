<?php

namespace App\Http\Controllers;

use App\Models\ViolationType;
use Illuminate\Http\Request;
use Session;

class ViolationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $violationtypes = ViolationType::select('id', 'description')->paginate(20);

        return view('ViolationType.index', compact('violationtypes'));
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

        return redirect()->route('violationtype.index');
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
    public function edit(ViolationType $violationtype)
    {
        return view('ViolationType.edit', compact('violationtype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ViolationType $violationtype)
    {
        $request->validate([
            'description'   => ['required', 'max:255', 'string']
        ]);

        $violationtype->update([
            'description'   =>  $request->description
        ]);

        \Session::flash('success', $request->description . ' modified successfully.');

        return redirect()->route('violationtype.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ViolationType $violationtype)
    {
        $violationtype->delete();

        // return to_route('conveyance.index');
        return redirect()->route('violationtype.index');
    }
}
