@extends('\..\layouts.layout')

@section('content')
    <div class="content-top">
      <span class="h1">Route toevoegen</span>
    </div>

    <div class="content-bottom scrollbar-custom">
      <div class="container mt-4">
        <form method="POST" action="/routes" class="w-75 m-auto">
          @csrf
          <div class="form-group">
            <h4>Naam</h4>
            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'border-danger' : '' }}" placeholder="Naam route" required>
          </div>

          <div class="form-group">
            <h4>Koerier toewijzen</h4>
            <select name="courier_id" class="form-control {{ $errors->has('courier_id') ? 'border-danger' : '' }}" >
              <option></option>
              @foreach($couriers as $courier)
                <option value="{{ $courier->id }}">{{ $courier->firstname }} {{ $courier->lastname }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <h4>Overige informatie</h4>
            <textarea name="comment" class="form-control no-resize {{ $errors->has('comment') ? 'border-danger' : '' }}" placeholder="Overig" rows="3"></textarea>
          </div>

          <div class="form-group d-flex justify-content-between">
            <a href="{{ url()->previous() }}" class="btn btn-secondary w-25">Terug</a>
            <button type="submit" class="btn btn-primary w-25">Voeg route toe</button>
          </div>
        </form>

        @include('inc/errors')
        
      </div>
    </div>    
@endsection