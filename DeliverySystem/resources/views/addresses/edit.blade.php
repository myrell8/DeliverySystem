@extends('\..\layouts.layout')

@section('content')
    <div class="content-top">
      <span class="h1">Straat wijzigen</span>
    </div>

    <div class="content-bottom">
      <div class="container mt-4">
        <form method="POST" action="/streets/{{ $street->id }}" class="w-75 m-auto">
          @method('PATCH')
          @csrf
          <div class="form-group">
            <h4>Naam straat</h4>
            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'border-danger' : '' }}" placeholder="Naam straat" value="{{ $street->name }}" required>
          </div>

          <div class="form-group">
            <h4>Wijk</h4>
            <select name="area_id" class="form-control {{ $errors->has('area_id') ? 'border-danger' : '' }}" >
              <option></option>
              @foreach($areas as $area)
                @if($street->area_id == $area->id)
                <option value="{{ $area->id }}" selected>{{ $area->name }}</option>
                @else
                <option value="{{ $area->id }}">{{ $area->name }}</option>
                @endif
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <h4>Postcode</h4>
            <input type="text" name="areacode" class="form-control {{ $errors->has('areacode') ? 'border-danger' : '' }}" placeholder="Postcode" value="{{ $street->areacode }}" required>
          </div>

          <div class="form-group d-flex justify-content-between">
            <a href="{{ url()->previous() }}" class="btn btn-secondary w-25">Terug</a>
            <button type="submit" class="btn btn-primary w-25">Wijzig straat</button>
          </div>
        </form>

        @include('inc/errors')
        
      </div>
    </div>    
@endsection