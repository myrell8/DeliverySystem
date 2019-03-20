@extends('\..\layouts.layout')

@section('content')

	<div class="content-top">
      <span class="h1 overflow-wrap">{{ $mail->subject }}</span>
    </div>

    <div class="content-bottom scrollbar-custom">
    	<p class="overflow-wrap">Onderwerp: {{ $mail->subject }}</p>
    	<p class="overflow-wrap">Inhoud: {{ $mail->body }}</p>
    	<p class="overflow-wrap">Verstuurd op: {{ $mail->created_at }}</p>
    	<a href="{{ url()->previous() }}" class="btn btn-secondary w-25">Terug</a>
    </div> 

@endsection