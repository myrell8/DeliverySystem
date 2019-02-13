<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('papers', 'PapersController');

Route::resource('flyers', 'FlyersController');

Route::resource('districts', 'DistrictsController');

Route::resource('areas', 'AreasController');

Route::resource('streets', 'StreetsController');

Route::resource('addresses', 'AddressesController');