<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Customer;
use App\Models\Rent;
use Illuminate\Http\Request;

class RentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $available_cars = Car::where('car_availability',1)->get();
        $customers = Customer::get();
        return view('rent.rent',['available_cars' => $available_cars, "customers" => $customers]);
    }

    public function addData(Request $request){



        $data = [
            'rent_returndate' => $request->rent_return_date,
            'rent_rentdate' => $request->rent_start_date,
            'pelanggan_id' => $request->rent_customer,
            'car_id' => $request->rent_car_id,
            'rent_total_price' => $request->rent_total_price

        ];

        $car = Car::findOrFail($request->rent_car_id);

        $car->car_availability = 0;
        $car->save();

        Rent::create($data);
        return redirect("/rent")->with('success', "Rent Added!");
    }


    public function returnForm(){
        $rents = Rent::with(["car", "customer"])->where('is_returned', 0)->get();
        return view('rent.return', ["rents"=>$rents]);
    }


    public function returnData($id){




        $rent = Rent::findOrFail($id);

        $rent->is_returned = 1;
        $rent->save();


        $car = Car::findOrFail($rent->car_id);

        $car->car_availability = 0;
        $car->save();

        return redirect("/rent/return")->with('success', "Car Returned!");
    }

}
