@extends('\..\layouts.layout')

@section('content')

	<div class="content-top">
      <span class="h1">{{ $address->street->name }}{{ $address->house_number }}</span>
    </div>

    <div class="content-bottom scrollbar-custom">
    	<p>Straat: {{ $address->street->name }}</p>
    	<p>Huisnummer: {{ $address->house_number }}</p>
    	<p>Wijk: {{ $address->street->area->name }}</p>
    	<a href="{{ url()->previous() }}" class="btn btn-secondary w-25">Terug</a>
    </div> 

@endsection