<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\District;

class DistrictsController extends Controller
{
    public function index()
    {
        $districts = District::all();

        return view('districts.index', compact('districts'));
    }

    public function create()
    {
        return view('districts.create');
    }

    public function store()
    {
        $attributes = $this->validateDistrict();

        $district = District::create($attributes);

        return redirect('/districts');
    }

    public function show(District $district)
    {
        return view('districts.show', compact('district'));
    }

    public function edit(District $district)
    {
        return view('districts.edit', compact('district'));
    }

    public function update(District $district)
    {
        $district->update($this->validateDistrict());

        return redirect('/districts');
    }

    public function destroy(District $district)
    {
        $district->delete();

        return redirect('/districts');
    }

    protected function validateDistrict()
      {
         return request()->validate([
            'name' => ['required', 'min:3'],
            'area' => ['required', 'min:3'],
         ]);
      }
}
