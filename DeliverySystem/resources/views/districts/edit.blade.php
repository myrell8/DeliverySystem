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
            <select name="area" class="form-control {{ $errors->has('area') ? 'border-danger' : '' }}" >
              <option></option>
              <option {{ $district->area == "Brandevoort" ? 'selected' : '' }}>Brandevoort</option>
              <option {{ $district->area == "Mierlo-Hout" ? 'selected' : '' }}>Mierlo-Hout</option>
              <option {{ $district->area == "Stiphout" ? 'selected' : '' }}>Stiphout</option>
              <option {{ $district->area == "Helmond-West" ? 'selected' : '' }}>Helmond-West</option>
              <option {{ $district->area == "Helmond-Noord" ? 'selected' : '' }}>Helmond-Noord</option>
              <option {{ $district->area == "Centrum" ? 'selected' : '' }}>Centrum</option>
              <option {{ $district->area == "Helmond-Oost" ? 'selected' : '' }}>Helmond-Oost</option>
              <option {{ $district->area == "Industrieterrein" ? 'selected' : '' }}>Industrieterrein</option>
              <option {{ $district->area == "Suytkade" ? 'selected' : '' }}>Suytkade</option>
              <option {{ $district->area == "Brouwhuis" ? 'selected' : '' }}>Brouwhuis</option>
              <option {{ $district->area == "Rijpelberg" ? 'selected' : '' }}>Rijpelberg</option>
              <option {{ $district->area == "Dierdonk" ? 'selected' : '' }}>Dierdonk</option>
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