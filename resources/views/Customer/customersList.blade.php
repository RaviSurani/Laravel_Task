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

                    <div class="card-header d-flex justify-content-between">
                        <h4>{{ __('customer List') }}</h4>
                        <a href="/customer/create" class="btn btn-primary btn-sm h-100">Add New</a>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Email </th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Location </th>

                                    <th scope="col">Created By </th>
                                    <th scope="col">Modified By </th>
                                    <th scope="col" class="w-25">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customerList as $customer)
                                    <tr>
                                        <th scope="row">{{ $customer->id }}</th>
                                        <th scope="row">{{ $customer->customer }}</th>
                                        <th scope="row">{{ $customer->email }}</th>
                                        <th scope="row">{{ $customer->phone_no }}</th>
                                        <th scope="row">
                                            {{ $customer->Citys->city . ', ' . $customer->Citys->States->state . ', ' . $customer->Citys->States->Countries->country }}
                                        </th>

                                        <th scope="row">{{ $customer->created_By->name }}</th>
                                        <th scope="row">{{ $customer->modified_By->name }}</th>
                                        {{-- <th scope="row">{{ $customer->States->state }}</th>
                                        <th scope="row">{{ $customer->States->Countries->country }}</th> --}}
                                        <td>
                                            <form method="post" action="{{ "customer/$customer->id/delete" }}">
                                                @method('post')
                                                @csrf
                                                <div class="btn-group w-100 mb-1" role="group" aria-label="Basic example">
                                                    <a href="{{ "customer/$customer->id/edit" }}"
                                                        class="btn btn-primary btn-sm ">Edit</a>
                                                    <button class="btn btn-danger btn-sm">Remove</button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
