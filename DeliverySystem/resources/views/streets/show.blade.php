@extends('\..\layouts.layout')

@section('content')

	<div class="content-top">
      <span class="h1 overflow-wrap">{{ $street->name }}</span>
    </div>

    <div class="content-bottom scrollbar-custom">
    	<p class="overflow-wrap">Naam: {{ $street->name }}</p>
    	<p class="overflow-wrap">Locatie: {{ $street->area->name }}</p>
    	<a href="{{ url()->previous() }}" class="btn btn-secondary w-25">Terug</a>
    </div> 

@endsection