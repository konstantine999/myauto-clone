<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function showAllCars()
    {
        $cars = Car::get();
        return view('welcome', compact('cars'));
    }

    public function getSingleCar($id)
    {
        $car = Car::findOrFail($id);
        $carMedia = $car->getMedia('*')[0]->getUrl();
//        dd($carMedia);
        return view('single_car', compact('car', 'carMedia'));
    }
}
