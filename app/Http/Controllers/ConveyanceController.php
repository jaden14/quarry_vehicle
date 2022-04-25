<?php

namespace App\Http\Controllers;

use App\Models\Conveyance;
use Illuminate\Http\Request;
use Session;

class ConveyanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conveyances = Conveyance::select('id', 'description')->paginate(5);

        return view('Conveyance.index', compact('conveyances'));
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

        Conveyance::create([
            'description'   =>  $request->description
        ]);

        Session::flash('success', $request->description . ' has been added successfully.');

        return redirect()->route('conveyance.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Conveyance  $conveyance
     * @return \Illuminate\Http\Response
     */
    public function show(Conveyance $conveyance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Conveyance  $conveyance
     * @return \Illuminate\Http\Response
     */
    public function edit(Conveyance $conveyance)
    {
        return view('Conveyance.edit', compact('conveyance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Conveyance  $conveyance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conveyance $conveyance)
    {
        $request->validate([
            'description'   => ['required', 'max:255', 'string']
        ]);

        $conveyance->update([
            'description'   =>  $request->description
        ]);

        \Session::flash('success', $request->description . ' modified successfully.');

        return redirect()->route('conveyance.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Conveyance  $conveyance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conveyance $conveyance)
    {
        $conveyance->delete();

        // return to_route('conveyance.index');
        return redirect()->route('conveyance.index');
    }
}
