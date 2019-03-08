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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('papers', 'PapersController')->middleware('auth');

Route::resource('flyers', 'FlyersController')->middleware('auth');

Route::resource('districts', 'DistrictsController')->middleware('auth');

Route::resource('vacancies', 'VacanciesController')->middleware('auth');

Route::resource('complaints', 'ComplaintsController')->middleware('auth');

Route::resource('areas', 'AreasController')->middleware('auth');

Route::resource('streets', 'StreetsController')->middleware('auth');

Route::resource('addresses', 'AddressesController')->middleware('auth');

Route::resource('admins', 'AdminsController')->middleware('auth');

Route::resource('deliverers', 'DeliverersController')->middleware('auth');

Route::resource('mails', 'MailsController')->middleware('auth');