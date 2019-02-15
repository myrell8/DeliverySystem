@extends('\..\layouts.layout')

@section('content')

    <div class="content-top">
      <span class="h1">Bezorgers</span>
      <div class="row m-0 mt-3 mb-4 justify-content-between">
          <a class="btn btn-primary" href="/deliverers/create" role="button">Bezorger toevoegen</a>

          <div class="input-group w-25">
            <input type="text" class="form-control" placeholder="Zoeken op naam" aria-describedby="basic-addon2">
          </div>
      </div>
    </div>

    <div class="content-bottom scrollbar-custom">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Voornaam</th>
              <th scope="col">Achternaam</th>
              <th scope="col">Telefoon</th>
              <th scope="col">Mobiel</th>
              <th scope="col">Email</th>
              <th scope="col" class="form-button-column">Info</th>
              <th scope="col" class="form-button-column">Wijzig</th>
              <th scope="col" class="form-button-column">Verwijder</th>
            </tr>
          </thead>
          <tbody>
            @foreach($deliverers as $deliverer)
              <tr>
                <td scope="row">{{ $deliverer->firstname }}</td>
                <td>{{ $deliverer->lastname }}</td>
                <td>{{ $deliverer->telephone ? $deliverer->telephone : 'n.v.t.' }}</td>
                <td>{{ $deliverer->mobile ? $deliverer->mobile : 'n.v.t.' }}</td>
                <td>{{ $deliverer->email }}</td>
                <td><a href="/deliverers/{{ $deliverer->id }}" class="btn btn-secondary w-100" role=button>Info</a></td>
                <td><a href="/deliverers/{{ $deliverer->id }}/edit" class="btn btn-primary w-100" role=button>Wijzig</a></td>
                <td>
                  <form method="POST" action="/deliverers/{{ $deliverer->id }}" class="w-100 text-center">
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