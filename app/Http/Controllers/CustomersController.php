<?php

namespace App\Http\Controllers;

use App\Models\Citys;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CustomersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $customerList = Customers::get();
        return view('Customer.customersList', compact('customerList'));
    }

    public function create()
    {
        $customers = null;
        $cityList = Citys::all();
        return view('Customer.customersForm', compact('customers', 'cityList'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "customer_code" => 'required|string',
            "customer" => 'required',
            "address" => 'required',
            "city" => 'required',
            "pin_code" => 'required|min:6',
            "phone_no" => 'required',
            "email" => 'required',
            "web_address" => 'required',
            "gst_no" => 'required|min:15',
            "pan_no" => 'required|min:10',
            "payment_terms" => 'required',

        ]);
        if ($validator->fails()) {
            return redirect('customer/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $data = $validator->validated();


            $data["created_by"] = Auth::user()->id;
            $data["modified_by"] = Auth::user()->id;

            // dd($data);

            Customers::create($data);
        }

        return redirect("/customer");
    }
    public function edit(Customers $customers)
    {
        $cityList = Citys::all();
        return view('Customer.customersForm', compact('customers', 'cityList'));
    }


    public function update(Request $request, Customers $customers)
    {
        $validator = Validator::make($request->all(), [
            "customer_code" => 'required|string',
            "customer" => 'required',
            "address" => 'required',
            "city" => 'required',
            "pin_code" => 'required|min:6',
            "phone_no" => 'required',
            "email" => 'required',
            "web_address" => 'required',
            "gst_no" => 'required|min:15',
            "pan_no" => 'required|min:10',
            "payment_terms" => 'required',

        ]);

        if ($validator->fails()) {
            return redirect('customer/create')
                ->withErrors($validator)
                ->withInput();
        } else {

            $data = $validator->validated();
            // dump($data);
            // dd($customers);
            $data["modified_by"] = Auth::user()->id;

            $customers->update($data);
        }

        return redirect("/customer");
    }

    public function destroy(Customers $customers)
    {
        $customers->delete();
        return redirect("/students");
    }
}
