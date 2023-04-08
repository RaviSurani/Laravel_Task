<?php

namespace App\Http\Controllers;

use App\Models\Countries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CountriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $countryList = Countries::all();
        return view('Country.countryList', compact('countryList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $country = null;
        return view('Country.countryForm', compact('country'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'country' => 'required|string|unique:countries',
        ]);

        if ($validator->fails()) {
            return redirect('countries/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $data = $validator->validated();
            $data["created_by"] = Auth::user()->id;
            $data["modified_by"] = Auth::user()->id;

            Countries::create($data);
        }

        return redirect("/countries");
    }

    /**
     * Display the specified resource.
     */
    public function show(Countries $countries)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Countries $countries)
    {
        return view('Country.countryForm', compact('countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Countries $countries)
    {

        $validator = Validator::make($request->all(), [
            'country' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect('countries/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $data = $validator->validated();
            $data["modified_by"] = Auth::user()->id;

            $countries->update($data);
        }

        return redirect("/countries");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Countries $countries)
    {
        $countries->delete();
        return redirect("/countries");
    }
}
