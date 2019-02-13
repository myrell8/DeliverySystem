@extends('\..\layouts.layout')

@section('content')
    <div class="content-top">
      <span class="h1">Wijk wijzigen</span>
    </div>

    <div class="content-bottom">
      <div class="container mt-4">
        <form method="POST" action="/areas/{{ $area->id }}" class="w-75 m-auto">
          @method('PATCH')
          @csrf
          <div class="form-group">
            <h4>Naam wijk</h4>
            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'border-danger' : '' }}" placeholder="Naam wijk" value="{{ $area->name }}" required>
          </div>

          <div class="form-group">
            <h4>Stad</h4>
            <input type="text" name="city" class="form-control {{ $errors->has('city') ? 'border-danger' : '' }}" placeholder="Stad" value="{{ $area->city }}" required>
          </div>

          <div class="form-group d-flex justify-content-between">
            <a href="{{ url()->previous() }}" class="btn btn-secondary w-25">Terug</a>
            <button type="submit" class="btn btn-primary w-25">Wijzig wijk</button>
          </div>
        </form>

        @include('inc/errors')
        
      </div>
    </div>    
@endsection