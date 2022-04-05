<?php

namespace App\Http\Controllers;

use App\Models\VehicleViolations;
use Illuminate\Http\Request;
use Session;

class VehicleViolationsController extends Controller
{
    /** 
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the vehicle violations page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('vehicleviolations');
    }
}
