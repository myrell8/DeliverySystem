@extends('\..\layouts.layout')

@section('content')

	<div class="content-top">
      <span class="h1">{{ $district->name }}</span>
    </div>

    <div class="content-bottom scrollbar-custom">
    	<p>Naam: {{ $district->name }}</p>
    	<p>Wijk: {{ $district->area }}</p>
    	<p>Map: {{ $district->map }}</p>
    	<a href="{{ url()->previous() }}" class="btn btn-secondary w-25">Terug</a>
    </div> 

@endsection