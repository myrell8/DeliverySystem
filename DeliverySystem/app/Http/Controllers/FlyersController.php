<?php

namespace App\Http\Controllers;

//Load in all the needed models
use Illuminate\Http\Request;
use App\Flyer;
use App\Area;
use App\Deliverer;
use App\Street;

class FlyersController extends Controller
{

    public function index()
    {
        $flyers = Flyer::all()->sortByDesc('created_at');

        return view('flyers.index', compact('flyers'));
    }

    public function create()
    {
        return view('flyers.create');
    }

    public function store()
    {
        $attributes = $this->validateFlyer();

        $flyer = Flyer::create($attributes);

        return redirect('/flyers');
    }

    public function show(Flyer $flyer)
    {
        $areas = Area::all();
        $deliverers = Deliverer::all();

        return view('flyers.show', compact('flyer', 'areas', 'deliverers'));
    }

    public function edit(Flyer $flyer)
    {
        $areas = Area::all();
        $deliverers = Deliverer::all();

        return view('flyers.edit', compact('flyer', 'areas', 'deliverers'));
    }

    public function update(Flyer $flyer)
    {
        $flyer->update($this->validateFlyer());

        return redirect('/flyers');
    }

    public function deleteFlyer(Request $request)
    {
        Flyer::find($request->id)->delete();

        return response()->json(['succes' => true, 'message' => 'Flyer deleted']);
    }

    protected function validateFlyer()
      {
         return request()->validate([
            'name' => ['required', 'min:3', 'max:191'],
            'price' => ['required', 'numeric'],
            'min_amount' => ['required', 'numeric', 'lt:max_amount'],
            'max_amount' => ['required', 'numeric']
         ]);
      }
    
}
