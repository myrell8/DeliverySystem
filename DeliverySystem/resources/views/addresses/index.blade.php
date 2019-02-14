@extends('\..\layouts.layout')

@section('content')

  <div class="content-top">
    <span class="h1">Adressen</span>
    <div class="row m-0 mt-3 mb-4 justify-content-between">
        <a class="btn btn-primary" href="/addresses/create" role="button">Adres toevoegen</a>

        <div class="input-group w-25">
          <input type="text" class="form-control" placeholder="Zoeken op naam" aria-describedby="basic-addon2">
        </div>
    </div>
  </div>

  <div class="content-bottom scrollbar-custom">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Straat</th>
            <th scope="col">Huisnummer</th>
            <th scope="col">Postcode</th>
            <th scope="col">Wijk</th>
            <th scope="col" class="form-button-column">Info</th>
            <th scope="col" class="form-button-column">Wijzig</th>
            <th scope="col" class="form-button-column">Verwijder</th>
          </tr>
        </thead>
        <tbody>
          @foreach($addresses as $address)
            @isset($address->street->area->name)
            <tr>
              <th scope="row">{{ $address->street->name }}</th>
              <td>{{ $address->house_number }}</td>
              <td>{{ $address->street->areacode }}</td>
              <td>{{ $address->street->area->name }}</td>
              <td><a href="/addresses/{{ $address->id }}" class="btn btn-secondary w-100" role=button>Info</a></td>
              <td><a href="/addresses/{{ $address->id }}/edit" class="btn btn-primary w-100" role=button>Wijzig</a></td>
              <td>
                <form method="POST" action="/addresses/{{ $address->id }}" class="w-100 text-center">
                  @method('DELETE')
                  @csrf
                  <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Are you sure?')">Verwijder</button>
                </form>
              </td>
            </tr>
            @endisset
            @empty($address->street->area->name)
            <tr>
              <th scope="row" class="text-danger">Error: not found</th>
              <td>{{ $address->house_number }}</td>
              <td class="text-danger">Error: not found</td>
              <td class="text-danger">Error: not found</td>
              <td><a href="/addresses/{{ $address->id }}" class="btn btn-secondary w-100" role=button>Info</a></td>
              <td><a href="/addresses/{{ $address->id }}/edit" class="btn btn-primary w-100" role=button>Wijzig</a></td>
              <td>
                <form method="POST" action="/address/{{ $address->id }}" class="w-100 text-center">
                  @method('DELETE')
                  @csrf
                  <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Are you sure?')">Verwijder</button>
                </form>
              </td>
            </tr>
            @endempty
          @endforeach
        </tbody>
      </table>
  </div>
  
@endsection