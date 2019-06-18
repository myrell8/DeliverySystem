@extends('\..\layouts.layout')

@section('content')
    <div class="content-top">
      <span class="h1">Bezorger wijzigen</span>
    </div>

    <div class="content-bottom scrollbar-custom">
      <div class="container mt-4">
        <form method="POST" action="/deliverers/{{ $deliverer->id }}" class="w-75 m-auto">
          @method('PATCH')
          @csrf
          <div class="form-group">
            <div class="row">
              <div class="col">
                <h4>Voornaam</h4>
                <input type="text" name="firstname" class="form-control {{ $errors->has('firstname') ? 'border-danger' : '' }}" placeholder="Voornaam" value="{{ $deliverer->firstname }}" required>
              </div>
              <div class="col">
                <h4>Achternaam</h4>
                <input type="text" name="lastname" class="form-control {{ $errors->has('lastname') ? 'border-danger' : '' }}" placeholder="Achternaam" value="{{ $deliverer->lastname }}" required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col">
                <h4>Straat</h4>
                <input type="text" name="street" class="form-control {{ $errors->has('street') ? 'border-danger' : '' }}" placeholder="Straat" value="{{ $deliverer->street }}" required>
              </div>
              <div class="col">
                <h4>Huisnummer</h4>
                <input type="text" name="house_number" class="form-control {{ $errors->has('house_number') ? 'border-danger' : '' }}" placeholder="Huisnummer" value="{{ $deliverer->house_number }}" required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col">
                <h4>Stad</h4>
                <input type="text" name="city" class="form-control {{ $errors->has('city') ? 'border-danger' : '' }}" placeholder="Stad" value="{{ $deliverer->city }}" required>
              </div>
              <div class="col">
                <h4>Postcode</h4>
                <input type="text" name="areacode" class="form-control {{ $errors->has('areacode') ? 'border-danger' : '' }}" placeholder="Postcode" value="{{ $deliverer->areacode }}" required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col">
                <h4>Telefoon</h4>
                <input type="text" name="telephone" class="form-control {{ $errors->has('telephone') ? 'border-danger' : '' }}" placeholder="Telefoon" value="{{ $deliverer->telephone }}">
              </div>
              <div class="col">
                <h4>Mobiel</h4>
                <input type="text" name="mobile" class="form-control {{ $errors->has('mobile') ? 'border-danger' : '' }}" placeholder="Mobiel" value="{{ $deliverer->mobile }}">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col">
                <h4>Email</h4>
                <input type="text" name="email" class="form-control {{ $errors->has('email') ? 'border-danger' : '' }}" placeholder="Email" value="{{ $deliverer->email }}" required>
              </div>
              <div class="col">
                <h4>Geboortedatum</h4>
                <input type="date" name="birthday" class="form-control {{ $errors->has('birthday') ? 'border-danger' : '' }}" value="{{ $deliverer->birthday }}" required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col">
                <h4>IBAN</h4>
                <input type="text" name="iban" class="form-control {{ $errors->has('iban') ? 'border-danger' : '' }}" placeholder="IBAN" value="{{ $deliverer->iban}}" required>
              </div>
              <div class="col">
                <h4>Tenaamstelling IBAN</h4>
                <input type="text" name="iban_name" class="form-control {{ $errors->has('iban_name') ? 'border-danger' : '' }}" placeholder="Tenaamstelling IBAN" value="{{ $deliverer->iban_name }}" required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col">
                <h4>Vast bedrag per krant (optioneel)</h4>
                <input type="text" name="paper_salary" class="form-control {{ $errors->has('paper_salary') ? 'border-danger' : '' }}" placeholder="Vast bedrag" value="{{ $deliverer->paper_salary }}">
              </div>
              <div class="col">
                <h4>Tas</h4>
                <select name="delivery_bag" class="form-control {{ $errors->has('delivery_bag') ? 'border-danger' : '' }}" >
                    @if($deliverer->delivery_bag === "Geen")
                      <option value="Geen" selected>Geen</option>
                      <option value="Fietstas">Fietstas</option>
                      <option value="Schoudertas">Schoudertas</option>
                    @elseif($deliverer->delivery_bag === "Fietstas")
                      <option value="Geen">Geen</option>
                      <option value="Fietstas" selected>Fietstas</option>
                      <option value="Schoudertas">Schoudertas</option>
                    @else
                      <option value="Geen">Geen</option>
                      <option value="Fietstas">Fietstas</option>
                      <option value="Schoudertas" selected>Schoudertas</option>
                    @endif
                </select>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col">
                <h4>Bonus bedrag (&euro;)</h4>
                <input type="text" name="bonus_amount" class="form-control {{ $errors->has('bonus_amount') ? 'border-danger' : '' }}" placeholder="Bonus bedrag" value="{{ $deliverer->bonus_amount }}">
              </div>
              <div class="col">
                <div class="form-group">
                  <h4>Overige informatie</h4>
                  <textarea name="comment" class="form-control no-resize {{ $errors->has('comment') ? 'border-danger' : '' }}" placeholder="Overig" rows="3">{{ $deliverer->comment }}</textarea>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            
          </div>

          <div class="form-group d-flex justify-content-between">
            <a href="{{ url()->previous() }}" class="btn btn-secondary w-25">Terug</a>
            <button type="submit" class="btn btn-primary w-25">Wijzig bezorger</button>
          </div>
        </form>

        @include('inc/errors')
        
      </div>
    </div>    
@endsection