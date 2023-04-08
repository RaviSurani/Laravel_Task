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



                    @if (isset($customers))
                        <form method="post" action="/customer/{{ $customers->id }}/update">
                        @else
                            <form method="post" action="/customer">
                    @endif
                    @method('POST')
                    @csrf
                    <div class="card-header d-flex justify-content-between">
                        <h4>{{ __('Customers Details') }}</h4>
                        <div class=" mb-1" role="group" aria-label="Basic example">
                            <button class="btn btn-primary mx-1 h-100">Save</button>
                            <a href="/customers" class="btn btn-danger mx-1 h-100">Back</a>
                        </div>
                    </div>


                    <div class="card-body">

                        <div>
                            <label for="basic-url">Customer Code</label>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="customer_code" name="customer_code"
                                    placeholder="customer_code"
                                    @if (isset($customers)) value="{{ $customers->customer_code }}" 
                                @else  value="{{ old('customer_code') }}" @endif />
                                @error('customer_code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="basic-url">Customer </label>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="customer" name="customer"
                                    placeholder="customer"
                                    @if (isset($customers)) value="{{ $customers->customer }}" 
                                @else  value="{{ old('customer') }}" @endif />
                                @error('customer')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="basic-url">Address</label>
                            <div class="mb-3">
                                <textarea class="form-control" id="address" name="address" rows="1">@if (isset($customers)){{ $customers->address }}
                                    @else{{ old('address') }}@endif 
                                </textarea>
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="basic-url">City</label>
                            <div class="mb-3">
                                <select class="form-select" id="city" name="city">
                                    <option selected disabled>Open this select menu</option>

                                    @foreach ($cityList as $city)
                                        <option value="{{ $city->id }}"
                                            @if ((isset($customers) && $customers->city == $city->id) || old('city') == $city->id) @selected(true) @endif>
                                            {{ $city->city }}</option>
                                    @endforeach
                                </select>
                                @error('city')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="basic-url">Pin Code </label>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="pin_code" name="pin_code"
                                    placeholder="Pin Code"
                                    @if (isset($customers)) value="{{ $customers->pin_code }}" 
                                @else  value="{{ old('pin_code') }}" @endif />
                                @error('pin_code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="basic-url">Phone </label>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="phone_no" name="phone_no"
                                    placeholder="Phone No "
                                    @if (isset($customers)) value="{{ $customers->phone_no }}" 
                                @else  value="{{ old('phone_no') }}" @endif />
                                @error('phone_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="basic-url">Email </label>
                            <div class="mb-3">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Phone No "
                                    @if (isset($customers)) value="{{ $customers->email }}" 
                                @else  value="{{ old('email') }}" @endif />
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="basic-url">Web Address </label>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="web_address" name="web_address"
                                    placeholder="Phone No "
                                    @if (isset($customers)) value="{{ $customers->web_address }}" 
                                @else  value="{{ old('web_address') }}" @endif />
                                @error('web_address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="basic-url">GST No</label>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="gst_no" name="gst_no"
                                    placeholder="Phone No "
                                    @if (isset($customers)) value="{{ $customers->gst_no }}" 
                                @else  value="{{ old('gst_no') }}" @endif />
                                @error('gst_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="basic-url">PAN No </label>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="pan_no" name="pan_no"
                                    placeholder="Phone No "
                                    @if (isset($customers)) value="{{ $customers->pan_no }}" 
                                @else  value="{{ old('pan_no') }}" @endif />
                                @error('pan_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="basic-url">Payment Terms </label>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="payment_terms" name="payment_terms"
                                    placeholder="Phone No "
                                    @if (isset($customers)) value="{{ $customers->payment_terms }}" 
                                @else  value="{{ old('payment_terms') }}" @endif />
                                @error('payment_terms')
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
