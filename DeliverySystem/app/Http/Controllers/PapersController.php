<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paper;
use App\Address;
use App\District;

class PapersController extends Controller
{
    public function index()
    {
    	$papers = Paper::all()->sortByDesc('created_at');

        $addresses = Address::all();

        $districts = District::all();

    	return view('papers.index', compact('papers', 'addresses', 'districts'));
    }

    public function create()
    {
    	return view('papers.create');
    }

    public function store()
    {
    	$attributes = $this->validatePaper();

    	$paper = Paper::create($attributes);

    	return redirect('/papers');
    }

    public function show(Paper $paper)
    {
    	$addresses = Address::all();

        $districts = District::all();

        return view('papers.show', compact('paper', 'addresses', 'districts'));
    }

	public function edit(Paper $paper)
    {
    	return view('papers.edit', compact('paper'));
    }

    public function update(Paper $paper)
    {
    	$paper->update($this->validatePaper());

   		return redirect('/papers');
    }

    public function destroy(Paper $paper)
    {
    	$paper->delete();

    	return redirect('/papers');
    }

  	protected function validatePaper()
      {
         return request()->validate([
            'name' => ['required', 'min:3', 'max:191'],
            'delivery_day' => ['required', 'min:3', 'max:191'],
            'price' => ['required', 'numeric']
         ]);
      } 
}
