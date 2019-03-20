@extends('\..\layouts.layout')

@section('content')
    <div class="content-top">
      <span class="h1">Adres toevoegen</span>
    </div>

    <div class="content-bottom">
      <div class="container mt-4">
        <form method="POST" action="/addresses" class="w-75 m-auto">
          @csrf
          <div class="form-group">
            <h4>Locatie</h4>
            <select id="area_select" name="area_id" class="form-control {{ $errors->has('area_id') ? 'border-danger' : '' }}">
              <option></option>
              @foreach($areas as $area)
                <option value="{{ $area->id }}">{{ $area->name }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <h4>Straat</h4>
            <select id="street_select" name="street_id" disabled class="form-control {{ $errors->has('street_id') ? 'border-danger' : '' }}" >
              <option>Selecteer locatie</option>
            </select>
          </div>

          <div class="form-group">
            <h4>Huisnummer</h4>
            <input type="text" name="house_number" class="form-control {{ $errors->has('house_number') ? 'border-danger' : '' }}" placeholder="Huisnummer" required>
          </div>

          <div class="form-group d-flex justify-content-between">
            <a href="{{ url()->previous() }}" class="btn btn-secondary w-25">Terug</a>
            <button type="submit" class="btn btn-primary w-25">Voeg adres toe</button>
          </div>
        </form>

        @include('inc/errors')
        
      </div>
    </div>    
@endsection