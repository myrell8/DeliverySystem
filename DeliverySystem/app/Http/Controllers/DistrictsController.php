<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\District;
use App\Deliverer;
use App\Area;
use App\Paper;
use App\Street;
use App\Address;
use App\Route;
use App\Flyerlink;
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

        $routes = Route::all();

        return view('districts.create', compact('deliverers', 'areas', 'papers', 'routes'));
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
        $papers = Paper::all();

        $streets = Street::all();

        $addresses = Address::all();

        $flyerlinks = Flyerlink::where('type', '=', 'Krantenwijk')->get();

        return view('districts.show', compact('district', 'streets', 'addresses', 'flyerlinks'));
    }

    public function edit(District $district)
    {
        $deliverers = Deliverer::all();

        $areas = Area::all();

        $papers = Paper::all();

        $routes = Route::all();

        return view('districts.edit', compact('district', 'deliverers', 'areas', 'papers', 'routes'));
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

        if (isset($district->map)) {
            unlink("uploads/$district->map");
        }

        return redirect('/districts');
    }

    protected function validateDistrict()
      {
         return request()->validate([
            'name' => ['required', 'min:3', 'max:191'],
            'area_id' => ['required', 'numeric'],
            'paper_id' => ['numeric'],
            'deliverer_id' => [],
            'route_id' => [],
            'amount_flyers' => [],
            'amount_papers' => [],
            'map' => ['image'],
         ]);
      }
}
