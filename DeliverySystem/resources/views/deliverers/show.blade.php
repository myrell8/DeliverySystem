@extends('\..\layouts.layout')

@section('content')

	<div class="content-top">
      <span class="h1">{{ $deliverer->firstname }} {{ $deliverer->lastname }}</span>
    </div>

    <div class="content-bottom scrollbar-custom">
    	<p>Naam: {{ $deliverer->firstname }} {{ $deliverer->lastname }}</p>
    	<p>Adres: {{ $deliverer->street }} {{ $deliverer->house_number }}</p>
    	<p>Postcode: {{ $deliverer->areacode }}</p>
    	<p>Plaats: {{ $deliverer->city }}</p>
    	<p>Telefoon: {{ $deliverer->telephone ? $deliverer->telephone : 'n.v.t.' }}</p>
    	<p>Mobiel: {{ $deliverer->mobile ? $deliverer->mobile : 'n.v.t.' }}
    	<p>Email: {{ $deliverer->email }}</p>
    	<p>IBAN: {{ $deliverer->iban }}</p>
    	<p>Tenaamstelling IBAN: {{ $deliverer->iban_name }}</p>
    	<p>Geboortedatum (jjjj-mm-dd): {{ $deliverer->birthday }}</p>
    	<p>Overig: {{ $deliverer->comment ? $deliverer->comment : 'n.v.t.' }}</p>
    	<a href="{{ url()->previous() }}" class="btn btn-secondary w-25">Terug</a>
    </div> 

@endsection