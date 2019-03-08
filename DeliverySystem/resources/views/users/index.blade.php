@extends('\..\layouts.layout')

@section('content')

    <div class="content-top">
      <span class="h1">Gebruikers (admins)</span>
      <div class="row m-0 mt-3 mb-4 justify-content-between">
          <a class="btn btn-primary" href="/register" role="button">Gebruiker toevoegen</a>

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
              <th scope="col">Email</th>
              <th scope="col">Aangemaakt</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
            <tr>
              <th scope="row">{{ $user->name }}</th>
              <td>{{ $user->email }}</td>
              <td>{{ $user->created_at->format('d M Y') }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div> 
@endsection