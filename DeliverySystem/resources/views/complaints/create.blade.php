@extends('\..\layouts.layout')

@section('content')
    <div class="content-top">
      <span class="h1">Klacht toevoegen</span>
    </div>

    <div class="content-bottom">
      <div class="container mt-4">
        <form method="POST" action="/complaints" class="w-75 m-auto">
          @csrf
          <div class="form-group">
            <h4>Wijk</h4>
            <select name="area_id" disabled="" class="form-control {{ $errors->has('area_id') ? 'border-danger' : '' }}" >
              <option></option>
              @foreach($areas as $area)
                <option value="{{ $area->id }}">{{ $area->name }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <h4>Straat</h4>
            <select name="street_id" disabled class="form-control {{ $errors->has('street_id') ? 'border-danger' : '' }}" >
              <option></option>
              @foreach($streets as $street)
                <option value="{{ $street->id }}">{{ $street->name }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <h4>Adres</h4>
            <select name="address_id" class="form-control {{ $errors->has('address_id') ? 'border-danger' : '' }}" >
              <option></option>
              @foreach($addresses as $address)
                <option value="{{ $address->id }}">{{ $address->street->name }} {{ $address->house_number }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col">
                <h4>Jaar</h4>
                <select name="year" class="form-control {{ $errors->has('year') ? 'border-danger' : '' }}" >
                  <option><?php echo date("Y")-1; ?></option>
                  <option selected><?php echo date("Y"); ?></option>
                  <option><?php echo date("Y")+1; ?></option>
                </select>
              </div>
              <div class="col">
                <h4>Weeknummer</h4>
                <input type="number" name="week" class="form-control {{ $errors->has('week') ? 'border-danger' : '' }}" placeholder="Weeknummer" required>
              </div>
            </div>
          </div> 

          <div class="form-group">
            <div class="row">
              <div class="col">
                <h4>Status</h4>
                <select name="status" class="form-control {{ $errors->has('status') ? 'border-danger' : '' }}" >
                  <option>Open</option>
                  <option>Opgelost</option>
                </select>
              </div>
              <div class="col">
                <h4>Type</h4>
                <select name="type" class="form-control {{ $errors->has('type') ? 'border-danger' : '' }}" >
                  <option>Geen</option>
                  <option>Deze week niet bezorgd</option>
                  <option>Meerdere weken niet bezorgd</option>
                  <option>Onregelmatige bezorging</option>
                  <option>Te laat bezorgd</option>
                  <option>Hele straat niet bezorgd</option>
                  <option>Nabezorgen</option>
                  <option>Bezorgd bij nee/nee sticker</option>
                  <option>Niet bezorgd bij nee/ja sticker</option>
                  <option>Commerciele klacht</option>
                  <option>Brievenbus bevindt zich elders</option>
                  <option>Beschadigde krant bezorgd</option>
                  <option>Schade veroorzaakt</option>
                  <option>Meerdere exemplaren tegelijk bezorgd</option>
                  <option>Geen folders bezorgd bij krant</option>
                </select>
              </div>
            </div>
          </div>

          <div class="form-group">
            <h4>Overig</h4>
            <textarea name="description" class="form-control no-resize {{ $errors->has('description') ? 'border-danger' : '' }}" placeholder="Overig" rows="3"></textarea>
          </div>

          <div class="form-group d-flex justify-content-between">
            <a href="{{ url()->previous() }}" class="btn btn-secondary w-25">Terug</a>
            <button type="submit" class="btn btn-primary w-25">Voeg klacht toe</button>
          </div>
        </form>

        @include('inc/errors')
        
      </div>
    </div>    
@endsection