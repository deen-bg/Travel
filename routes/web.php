<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\RapidAPIController;

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

// Default
Route::get('/', [RouteController::class, 'index']);

// test
Route::get('/greeting', function () {
    return 'Hello World';
});
// show Recoomended Route
Route::get('/listRouteRecommend', [RouteController::class, 'index']);

// lists routes by id
Route::get('/listRoutes/{id}/', [RouteController::class, 'routeList']);
Route::get('/attraction/{id}/', [RouteController::class, 'attraction_detail']);


// RapidAPI
Route::get('/getChampionshipTable', [RapidAPIController::class, 'championshipTable']);
