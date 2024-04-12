<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        $car_list = Car::all();

        return view('car.list', ['car_list' => $car_list]);
    }

    public function addForm()
    {
        return view('car.add');
    }


    public function addData(Request $request)
    {


        $data = [
            'car_merk' => $request->car_brand,
            'car_model' => $request->car_model,
            'car_plate_number' => $request->car_plate_number,
            'car_rental_price' => $request->car_rental_price
        ];

        Car::create($data);
        return redirect("/car")->with('success', "New Car Added Successfully!");
    }

    public function viewForm(string $id)
    {
        $car = Car::where('id', $id)->first();
        return view('car.info', ['car' => $car]);
    }


    public function editForm(string $id)
    {
        $car = Car::where('id', $id)->first();
        return view('car.edit', ['car' => $car]);
    }

    public function editData(Request $request, string $id)
    {
        $car = Car::find($id);
        $car->update(
            [
                'car_merk' => $request->car_brand,
                'car_model' => $request->car_model,
                'car_plate_number' => $request->car_plate_number,
                'car_rental_price' => $request->car_rental_price
            ]
        );

        return redirect("/car/" . $car->id . "/info")->with('success', "Car Edited Successfully!");
    }



    public function delete(string $id)
    {
        Car::find($id)->delete();
        return redirect("/car")->with('success', "Car Removed Successfully!");
    }
}
