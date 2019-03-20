@extends('\..\layouts.layout')

@section('content')

	<div class="content-top">
      <span class="h1 overflow-wrap">{{ $district->name }}</span>
    </div>

    <div class="content-bottom scrollbar-custom">
    	<p class="overflow-wrap">Naam: {{ $district->name }}</p>
    	<p class="overflow-wrap">Locatie: {{ $district->area->name }}</p>
    	<p class="overflow-wrap">Map: {{ $district->map }}</p>
    	<a href="{{ url()->previous() }}" class="btn btn-secondary w-25">Terug</a>
    </div> 

@endsection