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
}
