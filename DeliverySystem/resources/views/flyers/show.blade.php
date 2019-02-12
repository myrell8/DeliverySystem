@extends('\..\layouts.layout')

@section('content')

	<div class="content-top">
      <span class="h1">{{ $flyer->name }}</span>
    </div>

    <div class="content-bottom scrollbar-custom">
    	<p>Naam: {{ $flyer->name }}</p>
    	<p>Prijs: {{ $flyer->price }}</p>
    	<p>Bonus(maximaal): {{ $flyer->max_amount }}</p>
    	<p>Bonus(minimaal): {{ $flyer->min_amount }}</p>
    	<a href="{{ url()->previous() }}" class="btn btn-secondary w-25">Terug</a>
    </div> 

@endsection