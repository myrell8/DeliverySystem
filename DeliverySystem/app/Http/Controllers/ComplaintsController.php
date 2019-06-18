<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Complaint;
use App\Area;
use App\Street;
use App\Address;
use App\Deliverer;
use Carbon\Carbon;

class ComplaintsController extends Controller
{
    public function index()
    {
        $complaints = Complaint::all()->sortByDesc('created_at');

        return view('complaints.index', compact('complaints'));
    }

    public function create()
    {
        $areas = Area::all();

        $streets = Street::all();

        $addresses = Address::all();

        return view('complaints.create', compact('areas', 'streets', 'addresses'));
    }

    public function store()
    {
        $attributes = $this->validateComplaint();

        $complaint = Complaint::create($attributes);

        $deliverer_id = $complaint->address->street->district->deliverer->id;

        $deliverer = Deliverer::where('id', $deliverer_id)->first();
        $now = Carbon::now();
        $deliverer->bonus_timer = $now;
        $deliverer->save();

        return redirect('/complaints');
    }

    public function show(Complaint $complaint)
    {
        $areas = Area::all();

        $streets = Street::all();

        $addresses = Address::all();

        return view('complaints.show', compact('complaint', 'areas', 'streets', 'addresses'));
    }

    public function edit(Complaint $complaint)
    {
        $areas = Area::all();

        $streets = Street::all();

        $addresses = Address::all();

        return view('complaints.edit', compact('complaint', 'areas', 'streets', 'addresses'));
    }

    public function update(Complaint $complaint)
    {
        $complaint->update($this->validateComplaint());

        return redirect('/complaints');
    }

    public function destroy(Complaint $complaint)
    {
        $complaint->delete();

        return redirect('/complaints');
    }

    protected function validateComplaint()
      {
         return request()->validate([
            'address_id' => ['required', 'numeric'],
            'year' => ['required', 'numeric'],
            'week' => ['required', 'numeric'],
            'type' => ['required'],
            'description' => [],
            'status' => ['required'],
         ]);
      }
}
