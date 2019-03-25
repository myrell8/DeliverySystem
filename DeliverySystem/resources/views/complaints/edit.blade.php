@extends('\..\layouts.layout')

@section('content')
    <div class="content-top">
      <span class="h1">Klacht wijzigen</span>
    </div>

    <div class="content-bottom">
      <div class="container mt-4">
        <form method="POST" action="/complaints/{{ $complaint->id }}" class="w-75 m-auto">
          @method('PATCH')
          @csrf
          <div class="form-group">
            <h4>Locatie</h4>
            <select id="area_select" name="area_id" class="form-control {{ $errors->has('area_id') ? 'border-danger' : '' }}" >
              <option></option>
              @foreach($areas as $area)
                @if($area->id == $complaint->address->street->area_id)
                  <option value="{{ $area->id }}" selected>{{ $area->name }}</option>
                @else
                  <option value="{{ $area->id }}">{{ $area->name }}</option>
                @endif
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <h4>Straat</h4>
            <select id="street_select" name="street_id" class="form-control {{ $errors->has('street_id') ? 'border-danger' : '' }}" >
              <option></option>
              @foreach($streets as $street)
                @if($street->id == $complaint->address->street_id)
                  <option value="{{ $street->id }}" selected>{{ $street->name }}</option>
                @endif
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <h4>Huisnummer</h4>
            <select id="address_select" name="address_id" class="form-control {{ $errors->has('address_id') ? 'border-danger' : '' }}" >
              <option></option>
              @foreach($addresses as $address)
                @if($address->id == $complaint->address_id)
                  <option value="{{ $address->id }}" selected>{{ $address->house_number }}</option>
                @endif
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col">
                <h4>Jaar</h4>
                <select name="year" class="form-control {{ $errors->has('year') ? 'border-danger' : '' }}" >
                  <option>{{ $complaint->year }}</option>
                  <option value="<?php echo date("Y")-1 ?>"><?php echo date("Y")-1; ?></option>
                  <option value="<?php echo date("Y") ?>"><?php echo date("Y"); ?></option>
                  <option value="<?php echo date("Y")+1 ?>"><?php echo date("Y")+1; ?></option>
                </select>
              </div>
              <div class="col">
                <h4>Weeknummer</h4>
                <input type="number" name="week" value="{{ $complaint->week }}" class="form-control {{ $errors->has('week') ? 'border-danger' : '' }}" placeholder="Weeknummer" required>
              </div>
            </div>
          </div> 

          <div class="form-group">
            <div class="row">
              <div class="col">
                <h4>Status</h4>
                <select name="status" class="form-control {{ $errors->has('status') ? 'border-danger' : '' }}" >
                  @if($complaint->status === "Open")
                    <option selected>Open</option>
                    <option>Opgelost</option>
                  @else
                    <option>Open</option>
                    <option selected>Opgelost</option>
                  @endif
                </select>
              </div>
              <div class="col">
                <h4>Type</h4>
                <select name="type" class="form-control {{ $errors->has('type') ? 'border-danger' : '' }}" >
                  <option>{{ $complaint->type }}</option>
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
            <textarea name="description" class="form-control no-resize {{ $errors->has('description') ? 'border-danger' : '' }}" placeholder="Overig" rows="3">{{ $complaint->description }}</textarea>
          </div>

          <div class="form-group d-flex justify-content-between">
            <a href="{{ url()->previous() }}" class="btn btn-secondary w-25">Terug</a>
            <button type="submit" class="btn btn-primary w-25">Wijzig klacht</button>
          </div>
        </form>

        @include('inc/errors')
        
      </div>
    </div>    
@endsection