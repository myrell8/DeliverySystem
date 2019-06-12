@extends('\..\layouts.layout')

@section('content')
    <div class="content-top">
      <span class="h1">Koerier toevoegen</span>
    </div>

    <div class="content-bottom scrollbar-custom">
      <div class="container mt-4">
        <form method="POST" action="/couriers" class="w-75 m-auto">
          @csrf
          <div class="form-group">
            <div class="row">
              <div class="col">
                <h4>Voornaam</h4>
                <input type="text" name="firstname" class="form-control {{ $errors->has('firstname') ? 'border-danger' : '' }}" placeholder="Voornaam" required>
              </div>
              <div class="col">
                <h4>Achternaam</h4>
                <input type="text" name="lastname" class="form-control {{ $errors->has('lastname') ? 'border-danger' : '' }}" placeholder="Achternaam" required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col">
                <h4>Straat</h4>
                <input type="text" name="street" class="form-control {{ $errors->has('street') ? 'border-danger' : '' }}" placeholder="Straat" required>
              </div>
              <div class="col">
                <h4>Huisnummer</h4>
                <input type="text" name="house_number" class="form-control {{ $errors->has('house_number') ? 'border-danger' : '' }}" placeholder="Huisnummer" required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col">
                <h4>Stad</h4>
                <input type="text" name="city" class="form-control {{ $errors->has('city') ? 'border-danger' : '' }}" placeholder="Stad" required>
              </div>
              <div class="col">
                <h4>Postcode</h4>
                <input type="text" name="areacode" class="form-control {{ $errors->has('areacode') ? 'border-danger' : '' }}" placeholder="Postcode" required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col">
                <h4>Telefoon</h4>
                <input type="text" name="telephone" class="form-control {{ $errors->has('telephone') ? 'border-danger' : '' }}" placeholder="Telefoon">
              </div>
              <div class="col">
                <h4>Mobiel</h4>
                <input type="text" name="mobile" class="form-control {{ $errors->has('mobile') ? 'border-danger' : '' }}" placeholder="Mobiel">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col">
                <h4>Email</h4>
                <input type="text" name="email" class="form-control {{ $errors->has('email') ? 'border-danger' : '' }}" placeholder="Email" required>
              </div>
              <div class="col">
                <h4>Geboortedatum</h4>
                <input type="date" name="birthday" class="form-control {{ $errors->has('birthday') ? 'border-danger' : '' }}" required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <h4>Overige informatie</h4>
            <textarea name="comment" class="form-control no-resize {{ $errors->has('comment') ? 'border-danger' : '' }}" placeholder="Overig" rows="3"></textarea>
          </div>
          <div class="form-group d-flex justify-content-between">
            <a href="{{ url()->previous() }}" class="btn btn-secondary w-25">Terug</a>
            <button type="submit" class="btn btn-primary w-25">Voeg koerier toe</button>
          </div>
        </form>

        @include('inc/errors')
        
      </div>
    </div>    
@endsection