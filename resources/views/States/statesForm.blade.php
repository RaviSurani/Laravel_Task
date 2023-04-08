@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="btn-group w-100 mb-1" role="group" aria-label="Basic example">
                <a href="/customer"type="button" class="btn btn-primary mx-1">Customer</a>
                <a href="/countries"type="button" class="btn btn-primary mx-1">countries</a>
                <a href="/state"type="button" class="btn btn-primary mx-1">State</a>
                <a href="/city" class="btn btn-primary mx-1">City</a>
            </div>

            <div class="col-md-12">
                <div class="card">


                    @if (isset($states))
                        <form method="post" action="/state/{{ $states->id }}/update">
                        @else
                            <form method="post" action="/state">
                    @endif
                    @method('POST')
                    @csrf
                    <div class="card-header d-flex justify-content-between">
                        <h4>{{ __('State Details') }}</h4>
                        <div class=" mb-1" role="group" aria-label="Basic example">
                            <button class="btn btn-primary mx-1 h-100">Save</button>
                            <a href="/state" class="btn btn-danger mx-1 h-100">Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div>
                            <label for="basic-url">State Name</label>
                            <div class="mb-3">

                                <input type="text" class="form-control" id="State" name="state" placeholder="State"
                                    @if (isset($states)) value="{{ $states->state }}" 
                                @else  value="{{ old('state') }}" @endif />
                                @error('state')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="basic-url">State Code</label>
                            <div class="mb-3">

                                <input type="number" class="form-control" id="state_code" name="state_code"
                                    placeholder="State Code"
                                    @if (isset($states)) value="{{ $states->state_code }}" 
                                    @else  value="{{ old('state_code') }}" @endif />
                                @error('state_code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="basic-url">Country Name</label>
                            <div class="mb-3">
                                <select class="form-select" id="country_id" name="country_id">
                                    <option selected disabled>Open this select menu</option>
                                    @foreach ($countryList as $country)
                                        <option value="{{ $country->id }}"
                                            @if (isset($states) && $states->country_id == $country->id) @selected(true) @endif>
                                            {{ $country->country }}</option>
                                    @endforeach
                                </select>
                                @error('country_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
