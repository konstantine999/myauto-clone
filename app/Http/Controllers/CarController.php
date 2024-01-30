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

    public function carSearch(Request $request)
    {
        $results = Car::whereHas('manufacturer', function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request['search'] . '%');
        })->get();

        return response()->json($results);
    }
}
