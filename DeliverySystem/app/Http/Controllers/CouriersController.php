<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Courier;

class CouriersController extends Controller
{
    public function index()
    {
        $couriers = Courier::all()->sortByDesc('created_at');

        return view('couriers.index', compact('couriers'));
    }

    public function create()
    {
        return view('couriers.create');
    }

    public function store()
    {
        $attributes = $this->validateCourier();

        $courier = Courier::create($attributes);

        return redirect('/couriers');
    }

    public function show(Courier $courier)
    {
        return view('couriers.show', compact('courier'));
    }

    public function edit(Courier $courier)
    {
        return view('couriers.edit', compact('courier'));
    }

    public function update(Courier $courier)
    {
        $courier->update($this->validateCourier());

        return redirect('/couriers');
    }

    public function destroy(Courier $courier)
    {
        $courier->delete();

        return redirect('/couriers');
    }

    protected function validateCourier()
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
            'birthday' => ['required'],
            'comment' => [],
         ]);
      }
}
