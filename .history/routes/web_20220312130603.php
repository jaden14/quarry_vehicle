<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ConveyanceController;
use App\Http\Controllers\ViolationTypeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {

    /**
     * Conveyance Route
     */
    Route::resource('/conveyance', ConveyanceController::class)->except([
        'create', 'show'
    ]);
    /**
     * Violation Type Route
     */
    Route::resource('/violation', ViolationTypeController::class)->except([
        'create', 'show'
    ]);

});
