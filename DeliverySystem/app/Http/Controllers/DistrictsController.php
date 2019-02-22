<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\District;
use App\Deliverer;
use App\Area;
use App\Paper;
use App\Street;
use App\Address;

class DistrictsController extends Controller
{
    public function index()
    {
        $districts = District::all();

        $deliverers = Deliverer::all();

        $areas = Area::all();

        $papers = Paper::all();

        $streets = Street::all();

        $addresses = Address::all();

        return view('districts.index', compact('districts', 'deliverers', 'areas', 'papers', 'streets', 'addresses'));
    }

    public function create()
    {
        $deliverers = Deliverer::all();

        $areas = Area::all();

        $papers = Paper::all();

        return view('districts.create', compact('deliverers', 'areas', 'papers'));
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
        $deliverers = Deliverer::all();

        $areas = Area::all();

        $papers = Paper::all();

        return view('districts.edit', compact('district', 'deliverers', 'areas', 'papers'));
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
            'area_id' => ['required', 'numeric'],
            'paper_id' => [],
            'deliverer_id' => [],
         ]);
      }
}
