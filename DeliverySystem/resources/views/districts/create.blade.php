@extends('\..\layouts.layout')

@section('content')
    <div class="content-top">
      <span class="h1">Wijk toevoegen</span>
    </div>

    <div class="content-bottom">
      <div class="container mt-4">
        <form method="POST" action="/districts" class="w-75 m-auto" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <h4>Naam wijk</h4>
            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'border-danger' : '' }}" placeholder="Naam wijk" required>
          </div>

          <div class="form-group">
            <h4>Krant</h4>
            <select name="paper_id" class="form-control {{ $errors->has('paper_id') ? 'border-danger' : '' }}" >
              <option></option>
              @foreach($papers as $paper)
                <option value="{{ $paper->id }}">{{ $paper->name }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <h4>Locatie</h4>
            <select name="area_id" class="form-control {{ $errors->has('area_id') ? 'border-danger' : '' }}" >
              <option></option>
              @foreach($areas as $area)
                <option value="{{ $area->id }}">{{ $area->name }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <h4>Bezorger toewijzen</h4>
            <select name="deliverer_id" class="form-control {{ $errors->has('deliverer_id') ? 'border-danger' : '' }}" >
              <option></option>
              @foreach($deliverers as $deliverer)
                <option value="{{ $deliverer->id }}">{{ $deliverer->firstname }} {{ $deliverer->lastname }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col">
                <h4>Aantal folders (optioneel)</h4>
                <input class="form-control" type="number" min="0" name="amount_flyers">
              </div>
              <div class="col">
                <h4>Aantal kranten (optioneel)</h4>
                <input class="form-control" type="number" min="0" name="amount_papers">
              </div>
            </div>   
          </div>

          <div class="form-group">
            <h4>Map (Afbeelding)</h4>
            <input type="file" name="map" id="map">
          </div>

          <div class="form-group d-flex justify-content-between">
            <a href="{{ url()->previous() }}" class="btn btn-secondary w-25">Terug</a>
            <button type="submit" class="btn btn-primary w-25">Voeg wijk toe</button>
          </div>
        </form>

        @include('inc/errors')
        
      </div>
    </div>    
@endsection