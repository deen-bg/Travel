<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;

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
Route::get('/', function () {
    return view('welcome');
});
// test
Route::get('/greeting', function () {
    return 'Hello World';
});
// show Recoomended Route
Route::get('/listRouteRecommend', [RouteController::class, 'index']);

// lists routes by id
Route::get('/listRoutes/{id}/', [RouteController::class, 'routeList']);
Route::get('/attraction/{id}/', [RouteController::class, 'attraction_detail']);
