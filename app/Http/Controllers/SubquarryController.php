<?php

namespace App\Http\Controllers;

use App\Models\Subquarry;
use Illuminate\Http\Request;

class SubquarryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subquarries = Subquarry::select('name', 'requirements');

        return view('subquarry.index',compact('subquarries'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('subquarry.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['requirements'] = $request->input('requirements');
        Post::create($input);
        return redirect()->route('subquarry.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subquarry  $subquarry
     * @return \Illuminate\Http\Response
     */
    public function show(Subquarry $subquarry)
    {
        // return view('subquarry.show',compact('subquarry'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subquarry  $subquarry
     * @return \Illuminate\Http\Response
     */
    public function edit(Subquarry $subquarry)
    {
        return view('subquarry.index',compact('subquarry'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subquarry  $subquarry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subquarry $subquarry)
    {
        $request->validate([
            'name' => 'required',
            'requirements' => 'required',
            
        ]);
    
        $subquarry->update($request->all());
    
        return redirect()->route('subquarry.index')
                        ->with('success','Subquarry updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subquarry  $subquarry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subquarry $subquarry)
    {
        $subquarry->delete();
    
        return redirect()->route('subquarry.index');
                       
    }
}
