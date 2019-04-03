@extends('\..\layouts.layout')

@section('content')

	<div class="content-top">
      <span class="h1 overflow-wrap">{{ $district->name }}</span>
    </div>

    <div class="content-bottom scrollbar-custom">
    	<p class="overflow-wrap">Naam: {{ $district->name }}</p>
    	<p class="overflow-wrap">Locatie: {{ $district->area->name }}</p>
    	<p class="overflow-wrap">Map:</p>
    	@if($district->map)
    		<img src="/uploads/{{ $district->map }}" width="700" height="400"><br>
    	@else
    		<img src="/images/NoImg.jpg" width="700" height="400"><br>
    	@endif
    	
    	<a href="{{ url()->previous() }}" class="btn btn-secondary w-25 mt-4">Terug</a>
    </div> 

@endsection