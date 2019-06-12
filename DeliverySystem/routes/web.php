<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group.
|
*/

// Welcome route
Route::get('/', function () {
    return view('welcome');
});

//Authentication routes
Auth::routes();

// (Ajax) function routes
Route::post('/getStreets', 'AddressesController@getStreets');
Route::post('/getAddresses', 'AddressesController@getAddresses');
Route::post('/getArea', 'FlyersLinkController@getArea');
Route::post('/getDeliverer', 'FlyersLinkController@getDeliverer');
Route::post('/getAreacode', 'FlyersLinkController@getAreacode');
Route::post('/getDistrict', 'FlyersLinkController@getDistrict');
Route::delete('/deleteFlyer', 'FlyersController@deleteFlyer');

// Resource routes
Route::resource('papers', 'PapersController')->middleware('auth');
Route::resource('flyers', 'FlyersController')->middleware('auth');
Route::resource('flyerlinks', 'FlyersLinkController')->middleware('auth');
Route::resource('districts', 'DistrictsController')->middleware('auth');
Route::resource('vacancies', 'VacanciesController')->middleware('auth');
Route::resource('complaints', 'ComplaintsController')->middleware('auth');
Route::resource('routes', 'RoutesController')->middleware('auth');
Route::resource('areas', 'AreasController')->middleware('auth');
Route::resource('streets', 'StreetsController')->middleware('auth');
Route::resource('addresses', 'AddressesController')->middleware('auth');
Route::resource('admins', 'AdminsController')->middleware('auth');
Route::resource('deliverers', 'DeliverersController')->middleware('auth');
Route::resource('mails', 'MailsController')->middleware('auth');
Route::resource('couriers', 'CouriersController')->middleware('auth');