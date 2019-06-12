@extends('\..\layouts.layout')

@section('content')

    <div class="content-top">
      <span class="h1">Routes</span>
      <div class="row m-0 mt-3 mb-4 justify-content-between">
          <a class="btn btn-primary" href="/routes/create" role="button">Route toevoegen</a>

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
              <th scope="col">Koerier</th>
              <th scope="col">Aantal wijken (stops)</th>
              <th scope="col" class="form-button-column">Info</th>
              <th scope="col" class="form-button-column">Wijzig</th>
              <th scope="col" class="form-button-column">Verwijder</th>
            </tr>
          </thead>
          <tbody>
            @foreach($routes as $route)
              <tr>
                <td scope="row">{{ $route->name }}</td>
                <td scope="row">{{ $route->courier->firstname }} {{ $route->courier->lastname }}</td>

                <?php $district_count = 0; ?>
                @foreach($districts as $district)
                  @isset($district->route_id)
                    @if($district->route_id == $route->id)
                      <?php $district_count = $district_count + 1 ?>
                    @endif
                  @endisset
                @endforeach

                <td>{{ $district_count }}</td>

                <td><a href="/routes/{{ $route->id }}" class="btn btn-secondary w-100" role=button>Info</a></td>
                <td><a href="/routes/{{ $route->id }}/edit" class="btn btn-primary w-100" role=button>Wijzig</a></td>
                <td>
                  <form method="POST" action="/routes/{{ $route->id }}" class="w-100 text-center">
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