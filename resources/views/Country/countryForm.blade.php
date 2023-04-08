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


                    @if (isset($countries))
                        <form method="post" action="/countries/{{ $countries->id }}/update">
                        @else
                            <form method="post" action="/countries">
                    @endif
                    @method('POST')
                    @csrf
                    <div class="card-header d-flex justify-content-between">
                        <h4>{{ __('Country Details') }}</h4>
                        <div class=" mb-1" role="group" aria-label="Basic example">
                            <button class="btn btn-primary mx-1 h-100">Save</button>
                            <a href="/Country" class="btn btn-danger mx-1 h-100">Back</a>
                        </div>
                    </div>
                    <div class="card-body">

                        <label for="basic-url">Country Name</label>
                        <div class="mb-3">

                            <input type="text" class="form-control" id="country" name="country" placeholder="Country"
                                @if (isset($countries)) value="{{ $countries->country }}" @endif />
                            @error('country')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
