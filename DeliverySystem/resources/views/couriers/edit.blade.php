@extends('\..\layouts.layout')

@section('content')
    <div class="content-top">
      <span class="h1">Koerier wijzigen</span>
    </div>

    <div class="content-bottom scrollbar-custom">
      <div class="container mt-4">
        <form method="POST" action="/couriers/{{ $courier->id }}" class="w-75 m-auto">
          @method('PATCH')
          @csrf
          <div class="form-group">
            <div class="row">
              <div class="col">
                <h4>Voornaam</h4>
                <input type="text" name="firstname" class="form-control {{ $errors->has('firstname') ? 'border-danger' : '' }}" placeholder="Voornaam" value="{{ $courier->firstname }}" required>
              </div>
              <div class="col">
                <h4>Achternaam</h4>
                <input type="text" name="lastname" class="form-control {{ $errors->has('lastname') ? 'border-danger' : '' }}" placeholder="Achternaam" value="{{ $courier->lastname }}" required>
              </div>
            </div>
          </div>

          <div class="form-group d-flex justify-content-between">
            <a href="{{ url()->previous() }}" class="btn btn-secondary w-25">Terug</a>
            <button type="submit" class="btn btn-primary w-25">Wijzig koerier</button>
          </div>
        </form>

        @include('inc/errors')
        
      </div>
    </div>    
@endsection