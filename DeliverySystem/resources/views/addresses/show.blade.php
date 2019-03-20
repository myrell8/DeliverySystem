@extends('\..\layouts.layout')

@section('content')

	<div class="content-top">
      <span class="h1 overflow-wrap">{{ $address->street->name }}{{ $address->house_number }}</span>
    </div>

    <div class="content-bottom scrollbar-custom">
    	<p class="overflow-wrap">Straat: {{ $address->street->name }}</p>
    	<p class="overflow-wrap">Huisnummer: {{ $address->house_number }}</p>
    	<p class="overflow-wrap">Locatie: {{ $address->street->area->name }}</p>
    	<a href="{{ url()->previous() }}" class="btn btn-secondary w-25">Terug</a>
    </div> 

@endsection