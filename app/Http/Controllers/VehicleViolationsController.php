<?php

namespace App\Http\Controllers;

use App\Models\VehicleViolations;
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
        $vehicleviolations = VehicleViolations::select('id', 'date')->paginate(20);
        return view('vehicleviolations.index', compact('vehicleviolations'));
    }
    public function create()
    {
        
    }
}
