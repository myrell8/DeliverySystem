<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deliverer;
use App\District;

class DeliverersController extends Controller
{
    public function index()
    {
        $deliverers = Deliverer::all();

        return view('deliverers.index', compact('deliverers'));
    }

    public function create()
    {
        return view('deliverers.create');
    }

    public function store()
    {
        $attributes = $this->validateDeliverer();

        $deliverer = Deliverer::create($attributes);

        return redirect('/deliverers');
    }

    public function show(Deliverer $deliverer)
    {
        return view('deliverers.show', compact('deliverer'));
    }

    public function edit(Deliverer $deliverer)
    {
        return view('deliverers.edit', compact('deliverer'));
    }

    public function update(Deliverer $deliverer)
    {
        $deliverer->update($this->validateDeliverer());

        return redirect('/deliverers');
    }

    public function destroy(Deliverer $deliverer)
    {
        $deliverer->delete();

        return redirect('/deliverers');
    }

    protected function validateDeliverer()
      {
         return request()->validate([
            'firstname' => ['required'],
            'lastname' => ['required'],
            'street' => ['required', 'min:2', 'max:191'],
            'house_number' => ['required'],
            'areacode' => ['required', 'min:3', 'max:6'],
            'city' => ['required', 'min:2', 'max:191'],
            'telephone' => [],
            'mobile' => [],
            'email' => ['required', 'email'],
            'iban' => ['required', 'min:3', 'max:191'],
            'iban_name' => ['required', 'min:3', 'max:191'],
            'birthday' => ['required'],
            'comment' => [],
         ]);
      }
}
