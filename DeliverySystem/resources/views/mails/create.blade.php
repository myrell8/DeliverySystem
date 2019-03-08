@extends('\..\layouts.layout')

@section('content')
    <div class="content-top">
      <span class="h1">Krant toevoegen</span>
    </div>

    <div class="content-bottom">
      <div class="container mt-4">
        <form method="POST" action="/papers" class="w-75 m-auto">
          @csrf
          <div class="form-group">
            <h4>Naam</h4>
            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'border-danger' : '' }}" placeholder="Naam krant" required>
          </div>

          <div class="form-group">
            <h4>Bezorgdag</h4>
            <select name="delivery_day" class="form-control {{ $errors->has('delivery_day') ? 'border-danger' : '' }}" >
              <option></option>
              <option>Maandag</option>
              <option>Dinsdag</option>
              <option>Woensdag</option>
              <option>Donderdag</option>
              <option>Vrijdag</option>
              <option>Zaterdag</option>
              <option>Zondag</option>
            </select>
          </div>

          <div class="form-group">
            <h4>Prijs</h4>
            <input type="text" name="price" class="form-control {{ $errors->has('price') ? 'border-danger' : '' }}" placeholder="Prijs" required>
          </div>

          <div class="form-group d-flex justify-content-between">
            <a href="{{ url()->previous() }}" class="btn btn-secondary w-25">Terug</a>
            <button type="submit" class="btn btn-primary w-25">Voeg krant toe</button>
          </div>
        </form>

        @include('inc/errors')
        
      </div>
    </div>    
@endsection