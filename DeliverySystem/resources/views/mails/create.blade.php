@extends('\..\layouts.layout')

@section('content')
    <div class="content-top">
      <span class="h1">Mail bezorgers</span>
    </div>

    <div class="content-bottom">
      <div class="container mt-4">
        <form method="POST" action="/mails" class="w-75 m-auto">
          @csrf
          <div class="form-group">
            <h4>Onderwerp</h4>
            <input type="text" name="subject" class="form-control {{ $errors->has('subject') ? 'border-danger' : '' }}" placeholder="Onderwerp" required>
          </div>

          <div class="form-group">
            <h4>Inhoud</h4>
            <textarea name="body" class="form-control no-resize {{ $errors->has('body') ? 'border-danger' : '' }}" placeholder=". . ." rows="15"></textarea>
          </div>

          <div class="form-group d-flex justify-content-between">
            <a href="{{ url()->previous() }}" class="btn btn-secondary w-25">Terug</a>
            <button type="submit" class="btn btn-primary w-25">Verstuur mail</button>
          </div>
        </form>

        @include('inc/errors')
        
      </div>
    </div>    
@endsection