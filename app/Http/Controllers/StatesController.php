<?php

namespace App\Http\Controllers;

use App\Models\Countries;
use App\Models\States;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StatesController extends Controller
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

        $statesList = States::get();


        return view('States.statesList', compact('statesList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $states = null;
        $countryList = Countries::all();
        return view('States.statesForm', compact('states', 'countryList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "state" => 'required|string|unique:states',
            "state_code" => 'required|unique:states',
            "country_id" => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('state/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $data = $validator->validated();
            $data["created_by"] = Auth::user()->id;
            $data["modified_by"] = Auth::user()->id;

            States::create($data);
        }

        return redirect("/state");
    }

    /**
     * Display the specified resource.
     */
    public function show(States $states)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(States $states)
    {
        $countryList = Countries::all();
        return view('States.statesForm', compact('states', 'countryList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, States $states)
    {
        $validator = Validator::make($request->all(), [
            "state" => 'required|string',
            "state_code" => 'required',
            "country_id" => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('state/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $data = $validator->validated();
            $data["modified_by"] = Auth::user()->id;

            $states->update($data);
        }

        return redirect("/state");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(States $states)
    {
        $states->delete();
        return redirect("/state");
    }
}
