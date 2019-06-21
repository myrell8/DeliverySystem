<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deliverer;
use App\District;
use App\Flyerlink;
use App\Street;
use App\Complaint;
use App\Address;
use Carbon\Carbon;

class DeliverersController extends Controller
{
    public function index()
    {
        $deliverers = Deliverer::all()->sortByDesc('created_at');

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
        $flyerlinks = Flyerlink::where('type', '=', 'Bezorger')->get();

        $districts = District::all();

        $streets =  Street::all();

        $complaints = Complaint::all();

        $addresses = Address::all();

        return view('deliverers.show', compact('deliverer', 'streets', 'districts', 'complaints', 'addresses', 'flyerlinks'));
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
            'delivery_bag' => [],
            'paper_salary' => [],
            'birthday' => ['required'],
            'bonus' => [],
            'bonus_amount' => ['numeric'],
            'bonus_timer' => [],
            'comment' => [],
         ]);
      }
}
