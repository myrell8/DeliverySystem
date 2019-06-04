@extends('\..\layouts.layout')

@section('content')
    <div class="content-top">
      <span class="h1">Folder wijzigen</span>
    </div>

    <div class="content-bottom scrollbar-custom">
      <div class="container mt-4">
        <form method="POST" action="/flyers/{{ $flyer->id }}" class="w-75 m-auto">
          @method('PATCH')
          @csrf
          <div class="form-group">
            <h4>Naam</h4>
            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'border-danger' : '' }}" value="{{ $flyer->name }}" placeholder="Naam folder" required>
          </div>
          <div class="form-group">
            <h4>Prijs</h4>
            <input type="text" name="price" class="form-control {{ $errors->has('price') ? 'border-danger' : '' }}" value="{{ $flyer->price }}" placeholder="Prijs" required>
          </div>
          <div class="form-group">
            <h4>Minimaal bedrag</h4>
            <input type="text" name="min_amount" class="form-control {{ $errors->has('min_amount') ? 'border-danger' : '' }}" value="{{ $flyer->min_amount }}" placeholder="Minimaal bedrag" required>
          </div>
          <div class="form-group">
            <h4>Maximaal bedrag</h4>
            <input type="text" name="max_amount" class="form-control {{ $errors->has('max_amount') ? 'border-danger' : '' }}" value="{{ $flyer->max_amount }}" placeholder="Maximaal bedrag" required>
          </div>

          <div class="form-group d-flex justify-content-between">
            <a href="/flyers" class="btn btn-secondary w-25">Terug</a>
            <button type="submit" class="btn btn-primary w-25">Wijzig folder</button>
          </div>
        </form>

        @include('inc/errors')
        
      </div>
    </div>    
@endsection