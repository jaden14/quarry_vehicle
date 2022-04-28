<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConveyanceController;
use App\Http\Controllers\ViolationTypeController;
use App\Http\Controllers\VehicleViolationsController;
use App\Http\Controllers\QuarryController;

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

// Route::get('/', function () {
//     return view('auth.login');
// });
Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/**
 * Please PUT your route on auth group to make it secure
 *
 */

Route::middleware(['auth'])->group(function () {

    /**
     * Conveyance Route
     */
    Route::get('conveyance', [ConveyanceController::class, 'index'])->name('conveyance');
    Route::get('fetch-conveyance', [ConveyanceController::class, 'fetchconveyances']);
    Route::post('conveyance', [ConveyanceController::class, 'store']);
    Route::get('edit-conveyance/{id}', [ConveyanceController::class, 'edit']);
    Route::put('update-conveyance/{id}', [ConveyanceController::class, 'update']);
    Route::delete('delete-conveyance/{id}', [ConveyanceController::class, 'destroy']); // Not Working

    /**
     * Violation Type Route
     */
    // Route::resource('/violationtype', ViolationTypeController::class)->except([
    //     'create', 'show'
    // ]);
    Route::get('violationtype', [ViolationTypeController::class, 'index'])->name('violationtype');
    Route::get('fetch-violationtype', [ViolationTypeController::class, 'fetchviolationtypes']);
    Route::post('violationtype', [ViolationTypeController::class, 'store']);
    Route::get('edit-violationtype/{id}', [ViolationTypeController::class, 'edit']);
    Route::put('update-violationtype/{id}', [ViolationTypeController::class, 'update']);
    Route::delete('delete-violationtype/{id}', [ViolationTypeController::class, 'destroy']); // Not Working
    /**
     * Vehicle Violations Route
     */
    Route::resource('/vehicleviolations', VehicleViolationsController::class)->except([
        'create', 'show'
    ]);

    /**
     * Quarry Route
    */

    Route::post('quarry', [QuarryController::class,'addData']);
    Route::post('certainUser', [QuarryController::class,'selectUser']);
    Route::get('quarry', [QuarryController::class,'dataList'])->name('quarry');
    Route::post('lastid', [QuarryController::class,'lastID']);
    Route::delete('delete/{id}', [QuarryController::class,'deleteData']);
    Route::put('edit', [QuarryController::class,'updateData']);
    Route::get('/search', [VehicleViolationsController::class,'search']);



});

