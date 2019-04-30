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
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $flyers = Flyer::all()->sortByDesc('created_at');

        return view('flyers.index', compact('flyers'));
    }


    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('flyers.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store()
    {
        $attributes = $this->validateFlyer();

        $flyer = Flyer::create($attributes);

        return redirect('/flyers');
    }

    /**
     * Display the specified resource.
     */

    public function show(Flyer $flyer)
    {
        $areas = Area::all();
        $deliverers = Deliverer::all();

        return view('flyers.show', compact('flyer', 'areas', 'deliverers'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Flyer $flyer)
    {
        $areas = Area::all();
        $deliverers = Deliverer::all();

        return view('flyers.edit', compact('flyer', 'areas', 'deliverers'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Flyer $flyer)
    {
        $flyer->update($this->validateFlyer());

        return redirect('/flyers');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function deleteFlyer(Request $request)
    {
        Flyer::find ($request->id)->delete();

        return response()->json(['succes' => true, 'message' => 'Flyer deleted']);
    }

    /*
     * Function used to validate the inputs of the create and edit forms, all inputs must match the requirements given in this functions.
     */

    protected function validateFlyer()
      {
         return request()->validate([
            'name' => ['required', 'min:3', 'max:191'],
            'type' => [],
            'specific' => [],
            'price' => ['required', 'numeric'],
            'min_amount' => ['required', 'numeric', 'lt:max_amount'],
            'max_amount' => ['required', 'numeric']
         ]);
      }

    /*
     * Function used to retrieve a list of all area's in the database. This function is called when the user selects the 'Area' type to link a flyer to.
     */

    public function getArea(Request $request) {
        $areas = Area::all();
        echo json_encode($areas); 
    }

    /*
     * Function used to retrieve a list of all deliverers's in the database. This function is called when the user selects the 'Deliverer' type to link a flyer to.
     */

    public function getDeliverer(Request $request) {
        $deliverers = Deliverer::all();
        echo json_encode($deliverers); 
    }

    /*
     * Function used to retrieve a list of all areacodes's in the database. This function is called when the user selects the 'Areacode' type to link a flyer to.
     */

    public function getAreacode(Request $request) {
        $areacodes = Street::all();
        echo json_encode($areacodes); 
    }   
}
