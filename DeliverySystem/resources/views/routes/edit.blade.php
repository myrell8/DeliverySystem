@extends('\..\layouts.layout')

@section('content')
    <div class="content-top">
      <span class="h1">Koerier wijzigen</span>
    </div>

    <div class="content-bottom scrollbar-custom">
      <div class="container mt-4">
        <form method="POST" action="/routes/{{ $route->id }}" class="w-75 m-auto">
          @method('PATCH')
          @csrf
          <div class="form-group">
            <h4>Naam</h4>
            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'border-danger' : '' }}" placeholder="Naam route" value="{{ $route->name }}" required>
          </div>

          <div class="form-group">
            <h4>Koerier toewijzen</h4>
            <select name="courier_id" class="form-control {{ $errors->has('courier_id') ? 'border-danger' : '' }}" >
              <option></option>
              @foreach($couriers as $courier)
                @if($courier->id == $route->courier_id)
                  <option value="{{ $courier->id }}" selected>{{ $courier->firstname }} {{ $courier->lastname }}</option>
                @else
                  <option value="{{ $courier->id }}">{{ $courier->firstname }} {{ $courier->lastname }}</option>
                @endif
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <h4>Overige informatie</h4>
            <textarea name="comment" class="form-control no-resize {{ $errors->has('comment') ? 'border-danger' : '' }}" placeholder="Overig" rows="3">{{ $route->comment }}</textarea>
          </div>

          <div class="form-group d-flex justify-content-between">
            <a href="{{ url()->previous() }}" class="btn btn-secondary w-25">Terug</a>
            <button type="submit" class="btn btn-primary w-25">Wijzig route</button>
          </div>
        </form>

        @include('inc/errors')
        
      </div>
    </div>    
@endsection