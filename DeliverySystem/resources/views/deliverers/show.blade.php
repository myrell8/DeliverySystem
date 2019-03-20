@extends('\..\layouts.layout')

@section('content')

	<div class="content-top">
      <span class="h1 overflow-wrap">{{ $deliverer->firstname }} {{ $deliverer->lastname }}</span>
    </div>

    <div class="content-bottom scrollbar-custom">
    	<p class="overflow-wrap">Naam: {{ $deliverer->firstname }} {{ $deliverer->lastname }}</p>
    	<p class="overflow-wrap">Adres: {{ $deliverer->street }} {{ $deliverer->house_number }}</p>
    	<p class="overflow-wrap">Postcode: {{ $deliverer->areacode }}</p>
    	<p class="overflow-wrap">Plaats: {{ $deliverer->city }}</p>
    	<p class="overflow-wrap">Telefoon: {{ $deliverer->telephone ? $deliverer->telephone : 'n.v.t.' }}</p>
    	<p class="overflow-wrap">Mobiel: {{ $deliverer->mobile ? $deliverer->mobile : 'n.v.t.' }}
    	<p class="overflow-wrap">Email: {{ $deliverer->email }}</p>
    	<p class="overflow-wrap">IBAN: {{ $deliverer->iban }}</p>
    	<p class="overflow-wrap">Tenaamstelling IBAN: {{ $deliverer->iban_name }}</p>
    	<p class="overflow-wrap">Geboortedatum (jjjj-mm-dd): {{ $deliverer->birthday }}</p>
    	<p class="overflow-wrap">Overig: {{ $deliverer->comment ? $deliverer->comment : 'n.v.t.' }}</p>
    	<a href="{{ url()->previous() }}" class="btn btn-secondary w-25">Terug</a>
    </div> 

@endsection