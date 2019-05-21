@extends('\..\layouts.layout')

@section('content')

    <div class="content-top">
      <span class="h1">Kranten</span>
      <div class="row m-0 mt-3 mb-4 justify-content-between">
          <a class="btn btn-primary" href="/papers/create" role="button">Krant toevoegen</a>

          <div class="input-group w-25">
            <input type="text" class="form-control" placeholder="Zoeken op naam" aria-describedby="basic-addon2">
          </div>
      </div>
    </div>

    <div class="content-bottom scrollbar-custom">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Naam</th>
              <th scope="col">Bezorgdag</th>
              <th scope="col">Prijs/krant in €</th>
              <th scope="col">Wijken</th>
              <th scope="col">Adressen</th>
              <th scope="col" class="form-button-column">Info</th>
              <th scope="col" class="form-button-column">Wijzig</th>
              <th scope="col" class="form-button-column">Verwijder</th>
            </tr>
          </thead>
          <tbody>
            @foreach($papers as $paper)
            <tr>
              <th scope="row">{{ $paper->name }}</th>
              <td>{{ $paper->delivery_day }}</td>
              <td>&euro;{{ $paper->price }}</td>

              <?php $district_count = 0; ?>
              @foreach($districts as $district)
                @isset($district->paper_id)
                  @if($district->paper_id == $paper->id)
                    <?php $district_count++ ?>
                  @endif
                @endisset
              @endforeach

              <?php $address_count = 0; ?>
              @foreach($addresses as $address)
                @isset($address->street->district->paper_id)
                  @if($address->street->district->paper_id == $paper->id)
                    <?php $address_count++ ?>
                  @endif
                @endisset
              @endforeach
              

              <td>{{ $district_count }}</td>
              <td>{{ $address_count }}</td>
              
              <td><a href="/papers/{{ $paper->id }}" class="btn btn-secondary w-100" role=button>Info</a></td>
              <td><a href="/papers/{{ $paper->id }}/edit" class="btn btn-primary w-100" role=button>Wijzig</a></td>
              <td>
                <form method="POST" action="/papers/{{ $paper->id }}" class="w-100 text-center">
                  @method('DELETE')
                  @csrf
                  <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Are you sure?')">Verwijder</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div> 
@endsection