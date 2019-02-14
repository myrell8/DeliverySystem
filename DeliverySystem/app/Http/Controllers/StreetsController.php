<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Street;
use App\Area;

class StreetsController extends Controller
{
    public function index()
    {
        $streets = Street::all();

        return view('streets.index', compact('streets'));
    }

    public function create()
    {
        $areas = Area::all();

        return view('streets.create', compact('areas'));
    }

    public function store()
    {
        $attributes = $this->validateStreet();

        $street = Street::create($attributes);

        return redirect('/streets');
    }

    public function show(Street $street)
    {
        return view('streets.show', compact('street'));
    }

    public function edit(Street $street)
    {
        $areas = Area::all();

        return view('streets.edit', compact('street', 'areas'));
    }

    public function update(Street $street)
    {
        $street->update($this->validateStreet());

        return redirect('/streets');
    }

    public function destroy(Street $street)
    {
        $street->delete();

        return redirect('/streets');
    }

    protected function validateStreet()
      {
         return request()->validate([
            'name' => ['required', 'min:3'],
            'area_id' => ['required', 'numeric'],
            'areacode' => ['required', 'size:6']
         ]);
      }
}
