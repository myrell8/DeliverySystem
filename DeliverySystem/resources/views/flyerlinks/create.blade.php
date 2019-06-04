@extends('\..\layouts.layout')

@section('content')
    <div class="content-top">
      <span class="h1">Koppeling Toevoegen</span>
    </div>

    <div class="content-bottom scrollbar-custom">
      <div class="container mt-4">
        <form method="POST" action="/flyerlinks" class="w-75 m-auto">
          @csrf
          <div class="form-group">
            <h4>Folder</h4>
            <select name="flyer_id" class="form-control {{ $errors->has('flyer_id') ? 'border-danger' : '' }}" >
              <option></option>
              @foreach($flyers as $flyer)
              <option value="{{ $flyer->id }}">{{ $flyer->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <h4>Toevoegen aan (type)</h4>
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

          <?php
            $currentDate = new DateTime();
            $currentWeek = $currentDate->format("W");
            $currentYear = $currentDate->format("Y");
          ?>


          <div class="form-group">
            <h4>Week</h4>
            <input class="form-control" type="number" name="week" min="0" max="53" value="{{ $currentWeek }}">
          </div>
          <div class="form-group">
            <h4>Year</h4>
            <input class="form-control" type="number" name="year" min="0" value="{{ $currentYear }}">
          </div>

          <div class="form-group d-flex justify-content-between">
            <a href="/flyerlinks" class="btn btn-secondary w-25">Terug</a>
            <button type="submit" class="btn btn-primary w-25">Voeg koppeling toe</button>
          </div>
        </form>

        @include('inc/errors')
        
      </div>
    </div>    
@endsection