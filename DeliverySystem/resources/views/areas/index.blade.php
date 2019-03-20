@extends('\..\layouts.layout')

@section('content')

    <div class="content-top">
      <span class="h1">Locaties</span>
      <div class="row m-0 mt-3 mb-4 justify-content-between">
          <a class="btn btn-primary" href="/areas/create" role="button">Locatie toevoegen</a>

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
              <th scope="col">Stad</th>
              <th scope="col" class="form-button-column">Info</th>
              <th scope="col" class="form-button-column">Wijzig</th>
              <th scope="col" class="form-button-column">Verwijder</th>
            </tr>
          </thead>
          <tbody>
            @foreach($areas as $area)
            <tr>
              <th scope="row">{{ $area->name }}</th>
              <td>{{ $area->city }}</td>
              <td><a href="/areas/{{ $area->id }}" class="btn btn-secondary w-100" role=button>Info</a></td>
              <td><a href="/areas/{{ $area->id }}/edit" class="btn btn-primary w-100" role=button>Wijzig</a></td>
              <td>
                <form method="POST" action="/areas/{{ $area->id }}" class="w-100 text-center">
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