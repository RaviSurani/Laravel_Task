<?php

use App\Http\Controllers\CitysController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\StatesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::resource("countries", CountriesController::class);


Route::get('countries', [CountriesController::class, 'index']);
Route::get('countries/create', [CountriesController::class, 'create']);
Route::post('countries', [CountriesController::class, 'store']);
Route::get('countries/{countries}/edit', [CountriesController::class, 'edit']);
Route::post('countries/{countries}/update', [CountriesController::class, 'update']);
Route::post('countries/{countries}/delete', [CountriesController::class, 'destroy']);

Route::get('state', [StatesController::class, 'index']);
Route::get('state/create', [StatesController::class, 'create']);
Route::post('state', [StatesController::class, 'store']);
Route::get('state/{states}/edit', [StatesController::class, 'edit']);
Route::post('state/{states}/update', [StatesController::class, 'update']);
Route::post('state/{states}/delete', [StatesController::class, 'destroy']);

Route::get('city', [CitysController::class, 'index']);
Route::get('city/create', [CitysController::class, 'create']);
Route::post('city', [CitysController::class, 'store']);
Route::get('city/{citys}/edit', [CitysController::class, 'edit']);
Route::post('city/{citys}/update', [CitysController::class, 'update']);
Route::post('city/{citys}/delete', [CitysController::class, 'destroy']);

Route::get('customer', [CustomersController::class, 'index']);
Route::get('customer/create', [CustomersController::class, 'create']);
Route::post('customer', [CustomersController::class, 'store']);
Route::get('customer/{customers}/edit', [CustomersController::class, 'edit']);
Route::post('customer/{customers}/update', [CustomersController::class, 'update']);
Route::post('customer/{customers}/delete', [CustomersController::class, 'destroy']);
