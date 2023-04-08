<?php

namespace App\Http\Controllers;

use App\Models\Citys;
use App\Models\States;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CitysController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $citysList = Citys::get();

        return view('Citys.citysList', compact('citysList'));
    }

    public function create()
    {
        $citys = null;
        $statesList = States::all();
        return view('Citys.citysForm', compact('citys', 'statesList'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "city" => 'required|string|unique:citys',
            "state_id" => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('city/create')
                ->withErrors($validator)
                ->withInput();
        } else {

            $data = $validator->validated();
            // dd($data);
            $data["created_by"] = Auth::user()->id;
            $data["modified_by"] = Auth::user()->id;
            Citys::create($data);
        }

        return redirect("/city");
    }

    /**
     * Display the specified resource.
     */
    public function show(Citys $citys)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Citys $citys)
    {
        $statesList = States::all();
        return view('Citys.citysForm', compact('citys', 'statesList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Citys $citys)
    {
        $validator = Validator::make($request->all(), [
            "city" => 'required|string',
            "state_id" => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('city/create')
                ->withErrors($validator)
                ->withInput();
        } else {

            $data = $validator->validated();
            $data["modified_by"] = Auth::user()->id;

            $citys->update($data);
        }

        return redirect("/city");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Citys $citys)
    {
        $citys->delete();
        return redirect("/city");
    }
}
