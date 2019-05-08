@extends('\..\layouts.layout')

@section('content') {{-- This view extends the 'content' section of the layout file --}}
    <div class="content-top">
      <span class="h1">Folder wijzigen</span>
    </div>

    <div class="content-bottom scrollbar-custom">
      <div class="container mt-4">
        {{-- Form that displays on the edit page. When one of the inputs doesnt meet the requirements set in the FlyersController it will be assigned the 'border-danger'  class which will give the borders a red colour. When loading this page the inputs will be filled in with the data of the flyer the user is trying to edit. --}}
        <form method="POST" action="/flyers/{{ $flyer->id }}" class="w-75 m-auto">
          @method('PATCH')
          @csrf
          <div class="form-group">
            <h4>Naam</h4>
            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'border-danger' : '' }}" value="{{ $flyer->name }}" placeholder="Naam folder" required>
          </div>
          <div class="form-group">
            <h4>Prijs</h4>
            <input type="text" name="price" class="form-control {{ $errors->has('price') ? 'border-danger' : '' }}" value="{{ $flyer->price }}" placeholder="Prijs" required>
          </div>
          <div class="form-group">
            <h4>Minimaal bedrag</h4>
            <input type="text" name="min_amount" class="form-control {{ $errors->has('min_amount') ? 'border-danger' : '' }}" value="{{ $flyer->min_amount }}" placeholder="Minimaal bedrag" required>
          </div>
          <div class="form-group">
            <h4>Maximaal bedrag</h4>
            <input type="text" name="max_amount" class="form-control {{ $errors->has('max_amount') ? 'border-danger' : '' }}" value="{{ $flyer->max_amount }}" placeholder="Maximaal bedrag" required>
          </div>
          <div class="form-group">
            <h4>Toevoegen aan (type)</h4>
            {{-- Input used for the user to select what type of connection he/she wants to link this flyer to. Using this input will trigger a JQuery function in the main.js file to enable the next input and fill its options according to the users choice in this input. When loading this page the value of this unput will be the current 'type' of the flyer that the user is editing --}}
            <select id="addToType" name="type" class="form-control {{ $errors->has('type') ? 'border-danger' : '' }}" >
              <option></option>
              @if( $flyer->type == "Locatie" )
                <option value="Locatie" selected>Locatie</option>
                <option value="Bezorger">Bezorger</option>
                <option value="Postcode">Postcode</option>
              @elseif( $flyer->type == "Bezorger" )
                <option value="Locatie">Locatie</option>
                <option value="Bezorger" selected>Bezorger</option>
                <option value="Postcode">Postcode</option>
              @elseif( $flyer->type == "Postcode" )
                <option value="Locatie">Locatie</option>
                <option value="Bezorger">Bezorger</option>
                <option value="Postcode" selected>Postcode</option>
              @else
                <option value="Locatie">Locatie</option>
                <option value="Bezorger">Bezorger</option>
                <option value="Postcode">Postcode</option>
              @endif
            </select>
          </div>

          {{-- For the specific input a variable will be created named 'specificName'. The current 'specific' attribute of the flyer the user is trying to edit will be stored in here useing the following code --}}

          @if($flyer->type == "Bezorger") {{-- Check if the flyer is linked to a deliverer --}}
            @foreach($deliverers as $deliverer)
              @if($deliverer->id == $flyer->specific) {{-- Store the deliverers id in 'specificName' --}}
                <?php $specificName = $deliverer->id ?>
              @endif
            @endforeach
          @endif

          @if($flyer->type == "Locatie") {{-- Check if the flyer is linked to an area --}}
            @foreach($areas as $area)
              @if($area->id == $flyer->specific) {{-- Store area's id in 'specificName' --}}
                <?php $specificName = $area->id ?>
              @endif
            @endforeach
          @endif

          @if($flyer->type == "Postcode") {{-- Check if the flyer is linked to an areacode --}}
            <?php $specificName = $flyer->specific ?> {{-- Store the areacode 'specificName' --}}
          @endif

          <div class="form-group">
            <h4>Toevoegen aan (specifiek)</h4>
            @if(isset($specificName))
            <input type="hidden" name="specificName" id="specificName" value="{{ $specificName }}"> {{-- Hidden input for Jquery function --}}
            @endif
            <select id="addToSpecific" name="specific" disabled class="form-control {{ $errors->has('specific') ? 'border-danger' : '' }}" >
              <option></option>
            </select>
          </div>

          <div class="form-group d-flex justify-content-between">
            <a href="/flyers" class="btn btn-secondary w-25">Terug</a> {{-- Redirect user back to previous page. --}}
            <button type="submit" class="btn btn-primary w-25">Wijzig folder</button> {{-- Submit the form and call the 'edit' function in the controller --}}
          </div>
        </form>

        {{-- The errors.blade file will be included here. This file will only display an error list when the inputs dont meet the requirements set in the Flyerscontroller --}}
        @include('inc/errors')
        
      </div>
    </div>    
@endsection