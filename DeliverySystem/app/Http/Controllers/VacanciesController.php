<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\District;
use App\Street;
use App\Address;

class VacanciesController extends Controller
{
    public function index()
    {
        $districts = District::all()->sortByDesc('created_at');

        $streets = Street::all();

        $addresses = Address::all();

        return view('vacancies.index', compact('districts', 'streets', 'addresses'));
    }
}
