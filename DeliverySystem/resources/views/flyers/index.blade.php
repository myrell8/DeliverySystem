@extends('\..\layouts.layout')

@section('content')

    <div class="content-top">
      <span class="h1">Folders</span>
      <div class="row m-0 mt-3 mb-4 justify-content-between">
          <a class="btn btn-primary" href="/flyers/create" role="button">Folder toevoegen</a>

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
              <th scope="col">Prijs</th>
              <th scope="col">Bonus(Minimaal)</th>
              <th scope="col">Bonus(Maximaal)</th>
              <th scope="col" class="form-button-column">Info</th>
              <th scope="col" class="form-button-column">Wijzig</th>
              <th scope="col" class="form-button-column">Verwijder</th>
            </tr>
          </thead>
          <tbody>
            @foreach($flyers as $flyer)
            <tr>
              <th scope="row">{{ $flyer->name }}</th>
              <td>&euro;{{ $flyer->price }}</td>
              <td>&euro;{{ $flyer->min_amount }}</td>
              <td>&euro;{{ $flyer->max_amount }}</td>
              <td><a href="/flyers/{{ $flyer->id }}" class="btn btn-secondary w-100" role=button>Info</a></td>
              <td><a href="/flyers/{{ $flyer->id }}/edit" class="btn btn-primary w-100" role=button>Wijzig</a></td>
              <td>
                <form method="POST" action="/flyers/{{ $flyer->id }}" class="w-100 text-center">
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