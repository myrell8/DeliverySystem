@extends('\..\layouts.layout')

@section('content')

    <div class="content-top">
      <span class="h1">Krantgegevens wijzigen</span>
    </div>

    <div class="content-bottom">
      <div class="container mt-4">
        <form method="POST" action="/papers/{{ $paper->id }}" class="w-75 m-auto">
          @method('PATCH')
          @csrf
          <div class="form-group">
            <h4>Naam</h4>
            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'border-danger' : '' }}" placeholder="Naam krant" value="{{ $paper->name }}" required>
          </div>

          <div class="form-group">
            <h4>Bezorgdag</h4>
            <input type="text" name="delivery_day" class="form-control {{ $errors->has('delivery_day') ? 'border-danger' : '' }}" placeholder="Bezorgdag" value="{{ $paper->delivery_day }}" required>
          </div>

          <div class="form-group">
            <h4>Prijs</h4>
            <input type="text" name="price" class="form-control {{ $errors->has('price') ? 'border-danger' : '' }}" placeholder="Prijs" value="{{ $paper->price }}" required>
          </div>

          <div class="form-group d-flex justify-content-between">
            <a href="{{ url()->previous() }}" class="btn btn-secondary w-25">Terug</a>
            <button type="submit" class="btn btn-primary w-25">Wijzig krant</button>
          </div>
        </form>
      </div>
    </div>
        
    @include('inc/errors')

    </div>
@endsection