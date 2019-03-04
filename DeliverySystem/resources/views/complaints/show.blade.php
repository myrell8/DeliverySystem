@extends('\..\layouts.layout')

@section('content')

	<div class="content-top">
      <span class="h1">Klacht: {{ $complaint->address->street->name }} {{ $complaint->address->house_number }}</span>
    </div>

    <div class="content-bottom scrollbar-custom">
    	<p>Adres: {{ $complaint->address->street->name }} {{ $complaint->address->house_number }}</p>
    	<p>Jaar: {{ $complaint->year }}</p>
    	<p>Week: {{ $complaint->week }}</p>
    	<p>Type: {{ $complaint->type }}</p>
    	<p>Status: {{ $complaint->status }}</p>
    	<p>Bezorger: 	{{ $complaint->address->street->district->deliverer->firstname }}
    					{{ $complaint->address->street->district->deliverer->lastname }}
    	</p>
    	<p>Overig: {{ $complaint->description }}</p>
    	<p>Laatst aangepast: {{ $complaint->updated_at }}</p>
    	<a href="{{ url()->previous() }}" class="btn btn-secondary w-25">Terug</a>
    </div> 

@endsection