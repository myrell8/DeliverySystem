<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flyer;

class FlyersController extends Controller
{
    public function index()
    {
        $flyers = Flyer::all();

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
        return view('flyers.show', compact('flyer'));
    }

    public function edit(Flyer $flyer)
    {
        return view('flyers.edit', compact('flyer'));
    }

    public function update(Flyer $flyer)
    {
        $flyer->update($this->validateFlyer());

        return redirect('/flyers');
    }

    public function destroy(Flyer $flyer)
    {
        $flyer->delete();

        return redirect('/flyers');
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
