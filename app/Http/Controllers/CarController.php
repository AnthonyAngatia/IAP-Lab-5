<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    //
    public function allCars()
    {
        $cars = Car::all();
        return view('allcars', ["cars" => $cars]);
    }
    public function particularCar($id)
    {
        $cars = DB::table('cars')->where('id', $id)->first();
        // $car = DB::table('cars')->where('id', '1')->first();
        // print_r($cars->id);

        return view('singlecar', ["cars" => ["id" => $cars->id]]);
    }
    public function newCar(Request $request)
    {
        //For validation
        $this->validate(request(), [
            'make' => 'required|unique:cars',
            'model' => 'required|unique:cars',
            'produced_on' => 'required|unique:cars',
            'image' => 'required|unique:cars'
        ]);
        //create a new car
        $car = new Car();
        $car->model = request('model');
        $car->make = request('make');
        $car->produced_on = request('produced_on');
        $car->image = request()->file('image')->store('public/images');
        $car->save();


        $request->session()->flash('form_status', 'Successful');
        $this->allCars();
    }
    public function newCarForm()
    {
        return view('carform');
    }
    public function carReview($id)
    {
        //NOTE To get reviews for car 
        $car = Car::find($id);
        print_r($car->reviews);
        error_log($car->reviews);
    }
}
