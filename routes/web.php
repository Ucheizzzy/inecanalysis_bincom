<?php

use App\Http\Controllers\PollingUnitController;
use Illuminate\Support\Facades\Route;

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
    return view('master');
});

// All Polling Unit controller
Route::controller(PollingUnitController::class)->group(function(){
    Route::get('/polling/results', 'pollingresults')->name('polling.results');
    Route::get('/lga/results', 'lgaresults')->name('lga.results');

    // polling unit ajax url
    Route::get('/lgas/polling_unit/ajax/lga', 'pollingAjax');
});
