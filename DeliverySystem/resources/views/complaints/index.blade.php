@extends('\..\layouts.layout')

@section('content')

    <div class="content-top">
      <span class="h1">Klachten</span>
      <div class="row m-0 mt-3 mb-4 justify-content-between">
          <a class="btn btn-primary" href="/complaints/create" role="button">Klacht toevoegen</a>

          <div class="input-group w-25">
            <input type="text" class="form-control" placeholder="Zoeken op naam" aria-describedby="basic-addon2">
          </div>
      </div>
    </div>

    <div class="content-bottom scrollbar-custom">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Aangepast op</th>
              <th scope="col">Wijk</th>
              <th scope="col">Adres</th>
              <th scope="col">Jaar</th>
              <th scope="col">Week</th>
              <th scope="col">Bezorger</th>
              <th scope="col">Type</th>
              <th scope="col">Reacties</th>
              <th scope="col" class="form-button-column">Info</th>
              <th scope="col" class="form-button-column">Wijzig</th>
              <th scope="col" class="form-button-column">Verwijder</th>
            </tr>
          </thead>
          <tbody>
            @foreach($complaints as $complaint)
              <tr>
                <td scope="row">{{ $complaint->updated_at }}</td>
                <td>{{ $complaint->address->street->area->name }}</td>
                <td>{{ $complaint->address->street->name }} {{ $complaint->address->house_number }}</td>
                <td>{{ $complaint->year }}</td>
                <td>{{ $complaint->week }}</td>
                <td>{{ $complaint->address->street->district->deliverer->firstname }} {{ $complaint->address->street->district->deliverer->lastname }}</td>
                <td>{{ $complaint->type }}</td>
                <td>0</td>

                <td><a href="/complaints/{{ $complaint->id }}" class="btn btn-secondary w-100" role=button>Info</a></td>
                <td><a href="/complaints/{{ $complaint->id }}/edit" class="btn btn-primary w-100" role=button>Wijzig</a></td>
                <td>
                  <form method="POST" action="/complaints/{{ $complaint->id }}" class="w-100 text-center">
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