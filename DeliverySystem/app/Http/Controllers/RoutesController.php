<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Route;
use App\Courier;
use App\District;

class RoutesController extends Controller
{
    public function index()
    {
        $routes = Route::all();

        $districts = District::all();

        return view('routes.index', compact('routes', 'districts'));
    }

    public function create()
    {
        $couriers = Courier::all();

        return view('routes.create', compact('couriers'));
    }

    public function store()
    {
        $attributes = $this->validateRoute();

        $route = Route::create($attributes);

        return redirect('/routes');
    }

    public function show(Route $route)
    {
        $districts = District::all();

        return view('routes.show', compact('route', 'districts'));
    }

    public function edit(Route $route)
    {
        $couriers = Courier::all();

        return view('routes.edit', compact('route', 'couriers'));
    }

    public function update(Route $route)
    {
        $route->update($this->validateRoute());

        return redirect('/routes');
    }

    public function destroy(Route $route)
    {
        $route->delete();

        return redirect('/routes');
    }

    protected function validateRoute()
      {
         return request()->validate([
            'name' => ['required', 'min:3', 'max:191'],
            'courier_id' => [],
            'comment' => [],
         ]);
      }
}
