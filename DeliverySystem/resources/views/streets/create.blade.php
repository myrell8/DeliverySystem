@extends('\..\layouts.layout')

@section('content')
    <div class="content-top">
      <span class="h1">Straat toevoegen</span>
    </div>

    <div class="content-bottom">
      <div class="container mt-4">
        <form method="POST" action="/streets" class="w-75 m-auto">
          @csrf
          <div class="form-group">
            <h4>Naam straat</h4>
            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'border-danger' : '' }}" placeholder="Naam straat" required>
          </div>

          <div class="form-group">
            <h4>Locatie</h4>
            <select name="area_id" class="form-control {{ $errors->has('area_id') ? 'border-danger' : '' }}" >
              <option></option>
              @foreach($areas as $area)
                <option value="{{ $area->id }}">{{ $area->name }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <h4>Postcode</h4>
            <input type="text" name="areacode" class="form-control {{ $errors->has('areacode') ? 'border-danger' : '' }}" placeholder="Postcode" required>
          </div>

          <div class="form-group">
            <h4>Wijk</h4>
            <select name="district_id" class="form-control {{ $errors->has('district_id') ? 'border-danger' : '' }}" >
              <option></option>
              @foreach($districts as $district)
                <option value="{{ $district->id }}">{{ $district->name }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group d-flex justify-content-between">
            <a href="{{ url()->previous() }}" class="btn btn-secondary w-25">Terug</a>
            <button type="submit" class="btn btn-primary w-25">Voeg straat toe</button>
          </div>
        </form>

        @include('inc/errors')
        
      </div>
    </div>    
@endsection