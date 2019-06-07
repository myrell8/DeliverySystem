@extends('\..\layouts.layout')

@section('content')
    <div class="content-top">
      <span class="h1">Koppeling Wijzigen</span>
    </div>

    <div class="content-bottom scrollbar-custom">
      <div class="container mt-4">
        <form method="POST" action="/flyerlinks/{{ $flyerlink->id }}" class="w-75 m-auto">
          @method('PATCH')
          @csrf
          <div class="form-group">
            <h4>Folder</h4>
            <select name="flyer_id" class="form-control {{ $errors->has('flyer_id') ? 'border-danger' : '' }}" >
              <option></option>
              @foreach($flyers as $flyer)
                @if($flyerlink->flyer->id == $flyer->id)
                  <option value="{{ $flyer->id }}" selected>{{ $flyer->name }}</option>
                @else
                  <option value="{{ $flyer->id }}">{{ $flyer->name }}</option>
                @endif
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <h4>Toevoegen aan (type)</h4>
            <select id="addToType" name="type" class="form-control {{ $errors->has('type') ? 'border-danger' : '' }}" >
              <option></option>
              @if( $flyerlink->type == "Locatie" )
                <option value="Locatie" selected>Locatie</option>
                <option value="Bezorger">Bezorger</option>
                <option value="Postcode">Postcode</option>
                <option value="Krantenwijk">Krantenwijk</option>
              @elseif( $flyerlink->type == "Bezorger" )
                <option value="Locatie">Locatie</option>
                <option value="Bezorger" selected>Bezorger</option>
                <option value="Postcode">Postcode</option>
                <option value="Krantenwijk">Krantenwijk</option>
              @elseif( $flyerlink->type == "Postcode" )
                <option value="Locatie">Locatie</option>
                <option value="Bezorger">Bezorger</option>
                <option value="Postcode" selected>Postcode</option>
                <option value="Krantenwijk">Krantenwijk</option>
              @elseif( $flyerlink->type == "Krantenwijk")
                <option value="Locatie">Locatie</option>
                <option value="Bezorger">Bezorger</option>
                <option value="Postcode">Postcode</option>
                <option value="Krantenwijk" selected>Krantenwijk</option>
              @else
                <option value="Locatie">Locatie</option>
                <option value="Bezorger">Bezorger</option>
                <option value="Postcode">Postcode</option>
              @endif
            </select>
          </div>

          @if($flyerlink->type == "Bezorger")
            @foreach($deliverers as $deliverer)
              @if($deliverer->id == $flyerlink->specific)
                <?php $specificName = $deliverer->id ?>
              @endif
            @endforeach
          @endif

          @if($flyerlink->type == "Locatie")
            @foreach($areas as $area)
              @if($area->id == $flyerlink->specific)
                <?php $specificName = $area->id ?>
              @endif
            @endforeach
          @endif

          @if($flyerlink->type == "Postcode")
            <?php $specificName = $flyerlink->specific ?>
          @endif

          @if($flyerlink->type == "Krantenwijk")
            @foreach($districts as $district)
              @if($district->id == $flyerlink->specific)
                <?php $specificName = $district->id ?>
              @endif
            @endforeach
          @endif

          <div class="form-group">
            <h4>Toevoegen aan (specifiek)</h4>
            @if(isset($specificName))
            <input type="hidden" name="specificName" id="specificName" value="{{ $specificName }}">
            @endif
            <select id="addToSpecific" name="specific" disabled class="form-control {{ $errors->has('specific') ? 'border-danger' : '' }}" >
              <option></option>
            </select>
          </div>

          <div class="form-group">
            <h4>Week</h4>
            <input class="form-control" type="number" name="week" min="0" max="53" value="{{ $flyerlink->week }}">
          </div>
          <div class="form-group">
            <h4>Year</h4>
            <input class="form-control" type="number" name="year" min="0" value="{{ $flyerlink->year }}">
          </div>

          <div class="form-group d-flex justify-content-between">
            <a href="/flyerlinks" class="btn btn-secondary w-25">Terug</a>
            <button type="submit" class="btn btn-primary w-25">Wijzig koppeling</button>
          </div>
        </form>

        @include('inc/errors')
        
      </div>
    </div>    
@endsection