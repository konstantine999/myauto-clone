<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\CarController::class, 'showAllCars'])->name('welcome');
Route::get('/car/{id}', [\App\Http\Controllers\CarController::class, 'getSingleCar'])->name('get.single.car');
Route::post('/car/search', [\App\Http\Controllers\CarController::class, 'carSearch'])->name('car.search');
