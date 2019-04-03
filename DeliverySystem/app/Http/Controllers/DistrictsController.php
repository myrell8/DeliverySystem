<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\District;
use App\Deliverer;
use App\Area;
use App\Paper;
use App\Street;
use App\Address;
use Illuminate\Support\Facades\Input;

class DistrictsController extends Controller
{
    public function index()
    {
        $districts = District::all()->sortByDesc('created_at');

        $streets = Street::all();

        $addresses = Address::all();

        return view('districts.index', compact('districts', 'streets', 'addresses'));
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

        if(Input::hasFile('map')){
            $image = Input::file('map');
            $name = $image->getClientOriginalName();
            $image->move('uploads', $name);
            $district->map = $name;
            $district->save();
        }

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
        if(Input::hasFile('map')){
            unlink("uploads/$district->map");

            $district->update($this->validateDistrict());

            $image = Input::file('map');
            $name = $image->getClientOriginalName();
            $image->move('uploads', $name);
            $district->map = $name;
            $district->update();
        }
        else{
            $district->update($this->validateDistrict());
        }

        return redirect('/districts');
    }

    public function destroy(District $district)
    {
        $district->delete();

        unlink("uploads/$district->map");

        return redirect('/districts');
    }

    protected function validateDistrict()
      {
         return request()->validate([
            'name' => ['required', 'min:3', 'max:191'],
            'area_id' => ['required', 'numeric'],
            'paper_id' => [],
            'deliverer_id' => [],
            'map' => ['image'],
         ]);
      }
}
