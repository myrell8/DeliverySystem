@extends('\..\layouts.layout')

@section('content')

	<div class="content-top">
      <span class="h1 overflow-wrap">{{ $paper->name }}</span>
    </div>

    <div class="content-bottom scrollbar-custom">
    	<p class="overflow-wrap">Naam: {{ $paper->name }}</p>
    	<p class="overflow-wrap">Bezorgdag: {{ $paper->delivery_day }}</p>
    	<p class="overflow-wrap">Prijs: &euro; {{ $paper->price }}</p>
    	<a href="{{ url()->previous() }}" class="btn btn-secondary w-25">Terug</a>
    </div> 

@endsection