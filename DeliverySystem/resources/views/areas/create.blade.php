@extends('\..\layouts.layout')

@section('content')
    <div class="content-top">
      <span class="h1">Locatie toevoegen</span>
    </div>

    <div class="content-bottom">
      <div class="container mt-4">
        <form method="POST" action="/areas" class="w-75 m-auto">
          @csrf
          <div class="form-group">
            <h4>Naam locatie</h4>
            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'border-danger' : '' }}" placeholder="Naam locatie" required>
          </div>

          <div class="form-group">
            <h4>Stad</h4>
            <input type="text" name="city" class="form-control {{ $errors->has('city') ? 'border-danger' : '' }}" placeholder="Stad" required>
          </div>

          <div class="form-group d-flex justify-content-between">
            <a href="{{ url()->previous() }}" class="btn btn-secondary w-25">Terug</a>
            <button type="submit" class="btn btn-primary w-25">Voeg locatie toe</button>
          </div>
        </form>

        @include('inc/errors')
        
      </div>
    </div>    
@endsection