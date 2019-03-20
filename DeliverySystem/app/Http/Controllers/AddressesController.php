<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;
use App\Street;
use App\Area;

class AddressesController extends Controller
{
    public function index()
    {
        $addresses = Address::all();

        return view('addresses.index', compact('addresses'));
    }

    public function create()
    {
        $areas = Area::all();

        $streets = Street::all();

        return view('addresses.create', compact('areas', 'streets'));
    }

    public function store()
    {
        $attributes = $this->validateAddress();

        $address = Address::create($attributes);

        return redirect('/addresses');
    }

    public function show(Address $address)
    {
        return view('addresses.show', compact('address'));
    }

    public function edit(Address $address)
    {
        $areas = Area::all();

        $streets = Street::all();

        return view('addresses.edit', compact('address', 'areas', 'streets'));
    }

    public function update(Address $address)
    {
        $address->update($this->validateAddress());

        return redirect('/addresses');
    }

    public function destroy(Address $address)
    {
        $address->delete();

        return redirect('/addresses');
    }

    protected function validateAddress()
      {
         return request()->validate([
            'street_id' => ['required', 'numeric'],
            'house_number' => ['required']
         ]);
      }

    public function getStreets(Request $request) {
        $areaID = $request->areaID;

        $streets = Street::where('area_id', '=', $areaID)->get();

        echo json_encode($streets); 
    }
}
