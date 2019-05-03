@extends('\..\layouts.layout')

@section('content') {{-- This view extends the 'content' section of the layout file --}}
    <div class="content-top">
      <span class="h1">Folder Toevoegen</span>
    </div>

    <div class="content-bottom scrollbar-custom">
      <div class="container mt-4">
        {{-- Form that displays on the create page. When one of the inputs doesnt meet the requirements set in the FlyersController it will be assigned the 'border-danger'  class which will give the borders a red colour. --}}
        <form method="POST" action="/flyers" class="w-75 m-auto">
          @csrf
          <div class="form-group">
            <h4>Naam</h4>
            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'border-danger' : '' }}" placeholder="Naam folder" required>
          </div>
          <div class="form-group">
            <h4>Prijs</h4>
            <input type="text" name="price" class="form-control {{ $errors->has('price') ? 'border-danger' : '' }}" placeholder="Prijs" required>
          </div>
          <div class="form-group">
            <h4>Minimaal bedrag</h4>
            <input type="text" name="min_amount" class="form-control {{ $errors->has('min_amount') ? 'border-danger' : '' }}" placeholder="Minimaal bedrag" required>
          </div>
          <div class="form-group">
            <h4>Maximaal bedrag</h4>
            <input type="text" name="max_amount" class="form-control {{ $errors->has('max_amount') ? 'border-danger' : '' }}" placeholder="Maximaal bedrag" required>
          </div>
          <div class="form-group">
            <h4>Toevoegen aan (type)</h4>
            {{-- Input used for the user to select what type of connection he/she wants to link this flyer to. Using this input will trigger a JQuery function in the main.js file to enable the next input and fill its options according to the users choice in this input --}}
            <select id="addToType" name="type" class="form-control {{ $errors->has('type') ? 'border-danger' : '' }}" >
              <option></option>
              <option value="Locatie">Locatie</option>
              <option value="Bezorger">Bezorger</option>
              <option value="Postcode">Postcode</option>
            </select>
          </div>
          <div class="form-group">
            <h4>Toevoegen aan (specifiek)</h4>
            <select id="addToSpecific" name="specific" disabled class="form-control {{ $errors->has('specific') ? 'border-danger' : '' }}" >
              <option>Selecteer type</option>
            </select>
          </div>

          <div class="form-group d-flex justify-content-between">
            <a href="/flyers" class="btn btn-secondary w-25">Terug</a> {{-- Redirect user back to previous page. --}}
            <button type="submit" class="btn btn-primary w-25">Voeg folder toe</button> {{-- Submit the form and call the 'create' function in the controller --}}
          </div>
        </form>

        {{-- The errors.blade file will be included here. This file will only display an error list when the inputs dont meet the requirements set in the Flyerscontroller --}}
        @include('inc/errors')
        
      </div>
    </div>    
@endsection