@extends('\..\layouts.layout')

@section('content')

	<div class="content-top">
      <span class="h1">{{ $area->name }}</span>
    </div>

    <div class="content-bottom scrollbar-custom">
    	<p>Naam: {{ $area->name }}</p>
    	<p>Wijk: {{ $area->area }}</p>
    	<p>Map: {{ $area->map }}</p>
    	<a href="{{ url()->previous() }}" class="btn btn-secondary w-25">Terug</a>
    </div> 

@endsection