@extends('\..\layouts.layout')

@section('content')

	<div class="content-top">
      <span class="h1 overflow-wrap">{{ $flyer->name }}</span>
    </div>

    <div class="content-bottom scrollbar-custom">
    	<p class="overflow-wrap">Naam: {{ $flyer->name }}</p>
    	<p class="overflow-wrap">Prijs: &euro; {{ $flyer->price }}</p>
    	<p class="overflow-wrap">Bonus(maximaal): &euro; {{ $flyer->max_amount }}</p>
    	<p class="overflow-wrap">Bonus(minimaal): &euro; {{ $flyer->min_amount }}</p>
    	<a href="{{ url()->previous() }}" class="btn btn-secondary w-25">Terug</a>
    </div> 

@endsection