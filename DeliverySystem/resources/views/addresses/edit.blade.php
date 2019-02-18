@extends('\..\layouts.layout')

@section('content')
    <div class="content-top">
      <span class="h1">Adres wijzigen</span>
    </div>

    <div class="content-bottom">
      <div class="container mt-4">
        <form method="POST" action="/addresses/{{ $address->id }}" class="w-75 m-auto">
          @method('PATCH')
          @csrf
          <div class="form-group">
            <h4>Wijk</h4>
            <select name="area_id" class="form-control {{ $errors->has('area_id') ? 'border-danger' : '' }}" disabled>
              <option></option>
              @foreach($areas as $area)
                <option value="{{ $area->id }}">{{ $area->name }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <h4>Straat</h4>
            <select name="street_id" class="form-control {{ $errors->has('street_id') ? 'border-danger' : '' }}" >
              <option></option>
              @foreach($streets as $street)
                @if($address->street_id == $street->id)
                  <option value="{{ $street->id }}" selected>{{ $street->name }}</option>
                @else
                  <option value="{{ $street->id }}">{{ $street->name }}</option>
                @endif
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <h4>Huisnummer</h4>
            <input type="text" name="house_number" class="form-control {{ $errors->has('house_number') ? 'border-danger' : '' }}" placeholder="Huisnummer" value="{{ $address->house_number }}" required>
          </div>

          <div class="form-group d-flex justify-content-between">
            <a href="{{ url()->previous() }}" class="btn btn-secondary w-25">Terug</a>
            <button type="submit" class="btn btn-primary w-25">Wijzig adres</button>
          </div>
        </form>

        @include('inc/errors')
        
      </div>
    </div>    
@endsection