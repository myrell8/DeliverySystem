@extends('\..\layouts.layout')

@section('content')

	<div class="content-top">
      <span class="h1">{{ $street->name }}</span>
    </div>

    <div class="content-bottom scrollbar-custom">
    	<p>Naam: {{ $street->name }}</p>
    	<p>Wijk: {{ $street->area->name }}</p>
    	<a href="{{ url()->previous() }}" class="btn btn-secondary w-25">Terug</a>
    </div> 

@endsection