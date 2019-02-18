@extends('\..\layouts.layout')

@section('content')
    <div class="content-top">
      <span class="h1">Route wijzigen</span>
    </div>

    <div class="content-bottom">
      <div class="container mt-4">
        <form method="POST" action="/districts/{{ $district->id }}" class="w-75 m-auto">
          @method('PATCH')
          @csrf
          <div class="form-group">
            <h4>Naam route</h4>
            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'border-danger' : '' }}" placeholder="Naam route" value="{{ $district->name }}" required>
          </div>

          <div class="form-group">
            <h4>Wijk</h4>
            <select name="area_id" class="form-control {{ $errors->has('area_id') ? 'border-danger' : '' }}" >
              <option></option>
              @foreach($areas as $area)
                @if($district->area_id == $area->id)
                <option value="{{ $area->id }}" selected>{{ $area->name }}</option>
                @else
                <option value="{{ $area->id }}">{{ $area->name }}</option>
                @endif
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <h4>Bezorger toewijzen</h4>
            <select name="deliverer_id" class="form-control {{ $errors->has('deliverer_id') ? 'border-danger' : '' }}" >
              <option></option>
              @foreach($deliverers as $deliverer)
                <option value="{{ $deliverer->id }}" {{ $deliverer->id == $district->deliverer->id ? 'selected' : '' }}>{{ $deliverer->firstname }} {{ $deliverer->lastname }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <h4>Map (Afbeelding)</h4>
            <input type="text" name="price" class="form-control" placeholder="Image upload" disabled>
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