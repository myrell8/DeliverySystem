@extends('\..\layouts.layout')

@section('content')

    <div class="content-top">
      <span class="h1">Emails</span>
      <div class="row m-0 mt-3 mb-4 justify-content-between">
          <a class="btn btn-primary" href="/mails/create" role="button">Nieuwe mail opstellen</a>

          <div class="input-group w-25">
            <input type="text" class="form-control" placeholder="Zoeken op naam" aria-describedby="basic-addon2">
          </div>
      </div>
    </div>

    <div class="content-bottom scrollbar-custom">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Onderwerp</th>
              <th scope="col">Datum</th>
              <th scope="col" class="form-button-column">Info</th>
            </tr>
          </thead>
          <tbody>

            @foreach($mails as $mail)
            <tr>
              <th scope="row">{{ $mail->subject }}</th>
              <td>{{ $mail->created_at->format('d M Y - H:m') }}</td>
              <td><a href="/mails/{{ $mail->id }}" class="btn btn-secondary w-100" role=button>Info</a></td>
            </tr>
            @endforeach
            
          </tbody>
        </table>
    </div> 
@endsection