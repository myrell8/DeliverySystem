<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flyerlink;
use App\Flyer;
use App\Area;
use App\Deliverer;
use App\Street;

class FlyersLinkController extends Controller
{

    public function index()
    {
        $flyerlinks = Flyerlink::all()->sortByDesc('created_at');

        $areas = Area::all();
        $deliverers = Deliverer::all();

        return view('flyerlinks.index', compact('flyerlinks', 'areas', 'deliverers'));
    }

    public function create()
    {
        $flyers = Flyer::all();

        return view('flyerlinks.create', compact('flyers'));
    }

    public function store(Request $request)
    {
        $attributes = $this->validateFlyerlink();

        $flyerlink = Flyerlink::create($attributes);

        return redirect('/flyerlinks');
    }

    public function show(Flyerlink $flyerlink)
    {
        $areas = Area::all();
        $deliverers = Deliverer::all();

        return view('flyerlinks.show', compact('flyerlink', 'areas', 'deliverers'));
    }

    public function edit(Flyerlink $flyerlink)
    {
        $areas = Area::all();
        $deliverers = Deliverer::all();
        $flyers = Flyer::all();

        return view('flyerlinks.edit', compact('flyerlink', 'areas', 'deliverers', 'flyers'));
    }

    public function update(Flyerlink $flyerlink)
    {
        $flyerlink->update($this->validateFlyerlink());

        return redirect('/flyerlinks');
    }

    public function destroy(Flyerlink $flyerlink)
    {
        $flyerlink->delete();

        return redirect('/flyerlinks');
    }

    protected function validateFlyerlink()
      {
         return request()->validate([
            'flyer_id' => ['required', 'numeric'],
            'type' => ['required'],
            'specific' => ['required'],
            'week' => ['required', 'numeric'],
            'year' => ['required', 'numeric']
         ]);
      }

    public function getArea(Request $request) {
        $areas = Area::all();
        echo json_encode($areas); 
    }

    public function getDeliverer(Request $request) {
        $deliverers = Deliverer::all();
        echo json_encode($deliverers); 
    }

    public function getAreacode(Request $request) {
        $areacodes = Street::all();
        echo json_encode($areacodes);
    }
}
