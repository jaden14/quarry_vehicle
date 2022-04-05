<?php

namespace App\Http\Controllers;

//use App\Models\VehicleViolations;
use Illuminate\Http\Request;
use Session;

class VehicleViolationsController extends Controller
{
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
        
    }
}
