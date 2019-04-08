@extends('\..\layouts.layout')

@section('content')

    <div class="content-top">
      <span class="h1">Straten</span>
      <div class="row m-0 mt-3 mb-4 justify-content-between">
          <a class="btn btn-primary" href="/streets/create" role="button">Straat toevoegen</a>

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
              <th scope="col">Postcode</th>
              <th scope="col">Adressen</th>
              <th scope="col">Locatie</th>
              <th scope="col">Wijk</th>
              <th scope="col" class="form-button-column">Info</th>
              <th scope="col" class="form-button-column">Wijzig</th>
              <th scope="col" class="form-button-column">Verwijder</th>
            </tr>
          </thead>
          <tbody>
            @foreach($streets as $street)
              <tr>
                <th scope="row">{{ $street->name }}</th>
                <td>{{ $street->areacode }}</td>

                <?php $address_count = 0; ?>
                @foreach($addresses as $address)
                  @if($address->street->id == $street->id)
                    <?php $address_count++ ?>
                  @endif
                @endforeach

                <td>{{ $address_count }}</td>

                @isset($street->area->name)
                  <td>{{ $street->area->name }}</td>
                @endisset
                @empty($street->area->name)
                  <td class="text-danger">Error: not found</td>
                @endempty

                @isset($street->district->name)
                  <td>{{ $street->district->name }}</td>
                @endisset
                @empty($street->district->name)
                  <td class="text-danger">Error: not found</td>
                @endempty

                <td><a href="/streets/{{ $street->id }}" class="btn btn-secondary w-100" role=button>Info</a></td>
                <td><a href="/streets/{{ $street->id }}/edit" class="btn btn-primary w-100" role=button>Wijzig</a></td>
                <td>
                  <form method="POST" action="/streets/{{ $street->id }}" class="w-100 text-center">
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