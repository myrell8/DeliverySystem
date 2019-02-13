@extends('\..\layouts.layout')

@section('content')
    <div class="content-top">
      <span class="h1">Folder Toevoegen</span>
    </div>

    <div class="content-bottom">
      <div class="container mt-4">
        <form method="POST" action="/flyers" class="w-75 m-auto">
          @csrf
          <div class="form-group">
            <h4>Naam</h4>
            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'border-danger' : '' }}" placeholder="Naam folder" required>
          </div>
          <div class="form-group">
            <h4>Prijs</h4>
            <input type="text" name="price" class="form-control {{ $errors->has('price') ? 'border-danger' : '' }}" placeholder="Prijs" required>
          </div>
          <div class="form-group">
            <h4>Minimaal bedrag</h4>
            <input type="text" name="min_amount" class="form-control {{ $errors->has('min_amount') ? 'border-danger' : '' }}" placeholder="Minimaal bedrag" required>
          </div>
          <div class="form-group">
            <h4>Maximaal bedrag</h4>
            <input type="text" name="max_amount" class="form-control {{ $errors->has('max_amount') ? 'border-danger' : '' }}" placeholder="Maximaal bedrag" required>
          </div>
          <div class="form-group d-flex justify-content-between">
            <a href="{{ url()->previous() }}" class="btn btn-secondary w-25">Terug</a>
            <button type="submit" class="btn btn-primary w-25">Voeg folder toe</button>
          </div>
        </form>

        @include('inc/errors')
        
      </div>
    </div>    
@endsection