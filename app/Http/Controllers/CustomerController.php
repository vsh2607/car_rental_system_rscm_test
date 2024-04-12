<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        $customer_list = Customer::all();

        return view('customer.list', ['customer_list' => $customer_list]);
    }

    public function addForm()
    {
        return view('customer.add');
    }


    public function addData(Request $request)
    {



        $data = [
            'customer_name' => $request->customer_name,
            'customer_address' => $request->customer_address,
            'customer_no_telp' => $request->customer_telp_number,
            'customer_sim_num' => $request->customer_sim_number
        ];

        Customer::create($data);
        return redirect("/customer")->with('success', "New Customer Added Successfully!");
    }

    public function viewForm(string $id)
    {
        $customer = Customer::where('id', $id)->first();
        return view('customer.info', ['customer' => $customer]);
    }


    public function editForm(string $id)
    {
        $customer = Customer::where('id', $id)->first();
        return view('customer.edit', ['customer' => $customer]);
    }

    public function editData(Request $request, string $id)
    {
        $customer = Customer::find($id);
        $customer->update(
            [
                'customer_name' => $request->customer_name,
                'customer_address' => $request->customer_address,
                'customer_no_telp' => $request->customer_telp_number,
                'customer_sim_num' => $request->customer_sim_number
            ]
        );

        return redirect("/customer/".$customer->id."/info")->with('success', "Customer Edited Successfully!");

    }



    public function delete(string $id)
    {
        Customer::find($id)->delete();
        return redirect("/customer")->with('success', "Customer Removed Successfully!");
    }
}
