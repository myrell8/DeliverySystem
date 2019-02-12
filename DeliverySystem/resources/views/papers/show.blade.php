@extends('\..\layouts.layout')

@section('content')

	<div class="content-top">
      <span class="h1">{{ $paper->name }}</span>
    </div>

    <div class="content-bottom scrollbar-custom">
    	<p>Naam: {{ $paper->name }}</p>
    	<p>Bezorgdag: {{ $paper->delivery_day }}</p>
    	<p>Prijs: {{ $paper->price }}</p>
    	<a href="{{ url()->previous() }}" class="btn btn-secondary w-25">Terug</a>
    </div> 

@endsection