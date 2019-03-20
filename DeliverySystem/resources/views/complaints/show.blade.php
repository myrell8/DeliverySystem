@extends('\..\layouts.layout')

@section('content')

	<div class="content-top">
      <span class="h1 overflow-wrap">Klacht: {{ $complaint->address->street->name }} {{ $complaint->address->house_number }}</span>
    </div>

    <div class="content-bottom scrollbar-custom">
    	<p class="overflow-wrap">Adres: {{ $complaint->address->street->name }} {{ $complaint->address->house_number }}</p>
        <p class="overflow-wrap">Week: {{ $complaint->week }}</p>
    	<p class="overflow-wrap">Jaar: {{ $complaint->year }}</p>
    	<p class="overflow-wrap">Type: {{ $complaint->type }}</p>
    	<p class="overflow-wrap">Status: {{ $complaint->status }}</p>
    	<p class="overflow-wrap">Bezorger: 	{{ $complaint->address->street->district->deliverer->firstname }}
    					{{ $complaint->address->street->district->deliverer->lastname }}
    	</p>
    	<p class="overflow-wrap">Overig: {{ $complaint->description }}</p>
    	<p class="overflow-wrap">Laatst aangepast: {{ $complaint->updated_at->format('d M Y') }}</p>
    	<a href="{{ url()->previous() }}" class="btn btn-secondary w-25">Terug</a>
    </div> 

@endsection