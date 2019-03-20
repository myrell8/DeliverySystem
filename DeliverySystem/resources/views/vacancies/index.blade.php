@extends('\..\layouts.layout')

@section('content')

    <div class="content-top">
      <span class="h1">Vacatures</span>
      <div class="row m-0 mt-3 mb-4 justify-content-end">
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
              <th scope="col">Locatie</th>
              <th scope="col">Bezorger</th>
              <th scope="col">Krant</th>
              <th scope="col">Straten</th>
              <th scope="col">Adressen</th>
              <th scope="col" class="form-button-column">Info</th>
              <th scope="col" class="form-button-column">Wijzig</th>
              <th scope="col" class="form-button-column">Verwijder</th>
            </tr>
          </thead>
          <tbody>
            @foreach($districts as $district)
              @empty($district->deliverer->firstname)
                <tr>
                  <th scope="row">{{ $district->name }}</th>

                  @isset($district->area->name)
                    <td>{{ $district->area->name }}</td>
                  @endisset
                  @empty($district->area->name)
                    <td class="text-danger">Error: not found</td>
                  @endempty

                  <td>-</td>

                  @isset($district->paper->name)
                    <td>{{ $district->paper->name }}</td>
                  @endisset
                  @empty($district->paper->name)
                    <td>-</td>
                  @endempty

                  <?php $street_count = 0; $address_count = 0; ?>
                  @foreach($streets as $street)
                    @if($street->district_id == $district->id)
                      <?php $street_count = $street_count + 1 ?>
                      @foreach($addresses as $address)
                        @if($address->street_id == $street->id)
                          <?php $address_count = $address_count + 1 ?>
                        @endif
                      @endforeach
                    @endif
                  @endforeach

                  <td>{{ $street_count }}</td>
                  <td>{{ $address_count }}</td>

                  <td><a href="/districts/{{ $district->id }}" class="btn btn-secondary w-100" role=button>Info</a></td>
                  <td><a href="/districts/{{ $district->id }}/edit" class="btn btn-primary w-100" role=button>Wijzig</a></td>
                  <td>
                    <form method="POST" action="/districts/{{ $district->id }}" class="w-100 text-center">
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