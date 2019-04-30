<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Street;
use App\Area;
use App\District;
use App\Address;
use App\Flyer;

class StreetsController extends Controller
{
    public function index()
    {
        $streets = Street::all()->sortByDesc('created_at');

        $addresses = Address::all();

        return view('streets.index', compact('streets', 'addresses'));
    }

    public function create()
    {
        $areas = Area::all();

        $districts = District::all();

        return view('streets.create', compact('areas', 'districts'));
    }

    public function store()
    {
        $attributes = $this->validateStreet();

        $street = Street::create($attributes);

        return redirect('/streets');
    }

    public function show(Street $street)
    {
        $addresses = Address::all();

        $districts = District::all();

        $flyers = Flyer::where('type', '=', 'Postcode')->orWhere('type', '=', 'Locatie')->get();

        return view('streets.show', compact('street', 'addresses', 'districts', 'flyers'));
    }

    public function edit(Street $street)
    {
        $areas = Area::all();

        $districts = District::all();

        return view('streets.edit', compact('street', 'areas', 'districts'));
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
            'name' => ['required', 'min:3', 'max:191'],
            'area_id' => ['required', 'numeric'],
            'district_id' => [],
            'areacode' => ['required', 'size:6']
         ]);
      }
}
