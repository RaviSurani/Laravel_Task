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



                    @if (isset($citys))
                        <form method="post" action="/city/{{ $citys->id }}/update">
                        @else
                            <form method="post" action="/city">
                    @endif
                    @method('POST')
                    @csrf
                    <div class="card-header d-flex justify-content-between">
                        <h4>{{ __('City Details') }}</h4>
                        <div class=" mb-1" role="group" aria-label="Basic example">
                            <button class="btn btn-primary mx-1 h-100">Save</button>
                            <a href="/city" class="btn btn-danger mx-1 h-100">Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div>
                            <label for="basic-url">City Name</label>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="city" name="city" placeholder="City"
                                    @if (isset($citys)) value="{{ $citys->city }}" 
                                @else  value="{{ old('city') }}" @endif />
                                @error('city')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="basic-url">Country Name</label>
                            <div class="mb-3">
                                <select class="form-select" id="state_id" name="state_id">
                                    <option selected disabled>Open this select menu</option>
                                    @foreach ($statesList as $state)
                                        <option value="{{ $state->id }}"
                                            @if (isset($citys) && $citys->state_id == $state->id) @selected(true) @endif>
                                            {{ $state->state }}</option>
                                    @endforeach
                                </select>
                                @error('state_id')
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
