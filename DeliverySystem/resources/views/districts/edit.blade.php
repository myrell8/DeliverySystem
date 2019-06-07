@extends('\..\layouts.layout')

@section('content')
    <div class="content-top">
      <span class="h1">Wijk wijzigen</span>
    </div>

    <div class="content-bottom">
      <div class="container mt-4">
        <form method="POST" action="/districts/{{ $district->id }}" class="w-75 m-auto" enctype="multipart/form-data">
          @method('PATCH')
          @csrf
          <div class="form-group">
            <h4>Naam wijk</h4>
            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'border-danger' : '' }}" placeholder="Naam wijk" value="{{ $district->name }}" required>
          </div>

          <div class="form-group">
            <h4>Krant</h4>
            <select name="paper_id" class="form-control {{ $errors->has('paper_id') ? 'border-danger' : '' }}" >
              <option></option>
              @foreach($papers as $paper)
                @if($district->paper_id == $paper->id)
                <option value="{{ $paper->id }}" selected>{{ $paper->name }}</option>
                @else
                <option value="{{ $paper->id }}">{{ $paper->name }}</option>
                @endif
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <h4>Locatie</h4>
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
                @if($district->deliverer_id == $deliverer->id)
                <option value="{{ $deliverer->id }}" selected>{{ $deliverer->firstname }} {{ $deliverer->lastname }}</option>
                @else
                <option value="{{ $deliverer->id }}">{{ $deliverer->firstname }} {{ $deliverer->lastname }}</option>
                @endif   
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col">
                <h4>Aantal folders (optioneel)</h4>
                <input class="form-control" type="number" min="0" name="amount_flyers" value="{{ $district->amount_flyers }}">
              </div>
              <div class="col">
                <h4>Aantal kranten (optioneel)</h4>
                <input class="form-control" type="number" min="0" name="amount_papers" value="{{ $district->amount_papers }}">
              </div>
            </div>   
          </div>

          <div class="form-group">
            <h4>Map (Afbeelding)</h4>
            <input type="file" name="map" id="map">
          </div>

          <div class="form-group d-flex justify-content-between">
            <a href="{{ url()->previous() }}" class="btn btn-secondary w-25">Terug</a>
            <button type="submit" class="btn btn-primary w-25">Wijzig wijk</button>
          </div>
        </form>

        @include('inc/errors')
        
      </div>
    </div>    
@endsection