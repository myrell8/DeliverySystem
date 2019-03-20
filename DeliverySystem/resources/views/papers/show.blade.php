@extends('\..\layouts.layout')

@section('content')

	<div class="content-top">
      <span class="h1 overflow-wrap">{{ $paper->name }}</span>
    </div>

    
    <div class="content-bottom scrollbar-custom">

    	<table class="table table-borderless">
	   	  <tbody c>
		    <tr>
		      <th class="w-20 h5 font-weight-bold">Naam:</th>
		      <td class="h5">{{ $paper->name }}</td>
		    </tr>

		    <tr>
		      <th class="w-20 h5 font-weight-bold">Bezorgdag:</th>
		      <td class="h5">{{ $paper->delivery_day }}</td>
		    </tr>

		    <tr>
		      <th class="w-20 h5 font-weight-bold">Prijs:</th>
		      <td class="h5">{{ $paper->price }}</td>
		    </tr>

		    <?php $district_count = 0; ?>
              @foreach($districts as $district)
                @if($district->paper_id == $paper->id)
                  <?php $district_count++ ?>
                @endif
              @endforeach

		    <tr>
		      <th class="w-20 h5 font-weight-bold">Wijken:</th>
		      <td class="h5">{{ $district_count }}</td>
		    </tr>

		    <?php $address_count = 0; ?>
              @foreach($addresses as $address)
                @if($address->street->district->paper_id == $paper->id)
                  <?php $address_count++ ?>
                @endif
              @endforeach

		    <tr>
		      <th class="w-20 h5 font-weight-bold">Adressen:</th>
		      <td class="h5">{{ $address_count }}</td>
		    </tr>

		    <tr>
		      <th class="w-20 h5 font-weight-bold">Folders deze week:</th>
		      <td class="h5">-</td>
		    </tr>

		  </tbody>
		</table>

    	<span class="w-100 d-flex justify-content-center">
    		<a href="{{ url()->previous() }}" class="btn btn-secondary w-25 p-2">Terug</a>
    	</span>
    	
    </div> 

@endsection