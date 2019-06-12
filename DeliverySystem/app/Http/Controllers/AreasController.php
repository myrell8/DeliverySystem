<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use App\Street;
use App\Address;
use App\Flyerlink;
use App\Flyer;

class AreasController extends Controller
{
    public function index()
    {
        $areas = Area::all()->sortByDesc('created_at');

        $streets = Street::all();

        $addresses = Address::all();

        return view('areas.index', compact('areas', 'streets', 'addresses'));
    }

    public function create()
    {
        return view('areas.create');
    }

    public function store()
    {
        $attributes = $this->validateArea();

        $area = Area::create($attributes);

        return redirect('/areas');
    }

    public function show(Area $area)
    {
        $streets = Street::all();

        $addresses = Address::all();

        $flyerlinks = Flyerlink::where('type', '=', 'Locatie')->get();

        return view('areas.show', compact('area', 'streets', 'addresses', 'flyerlinks'));
    }

    public function edit(Area $area)
    {
        return view('areas.edit', compact('area'));
    }

    public function update(Area $area)
    {
        $area->update($this->validateArea());

        return redirect('/areas');
    }

    public function destroy(Area $area)
    {
        $area->delete();

        return redirect('/areas');
    }

    protected function validateArea()
      {
         return request()->validate([
            'name' => ['required', 'min:3', 'max:191'],
            'city' => ['required', 'min:3', 'max:191'],
         ]);
      }
}
