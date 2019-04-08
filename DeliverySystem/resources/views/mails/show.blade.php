@extends('\..\layouts.layout')

@section('content')

	<div class="content-top">
      <span class="h1 overflow-wrap">{{ $mail->subject }}</span>
    </div>

    <div class="content-bottom scrollbar-custom">
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <th class="w-20 h5 font-weight-bold">Onderwerp:</th>
                    <td class="h5">{{ $mail->subject }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Inhoud:</th>
                    <td class="h5">{{ $mail->body }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Verstuurd op:</th>
                    <td class="h5">{{ $mail->created_at }}</td>
                </tr>

            </tbody>
        </table>

        <span class="w-100 d-flex justify-content-center">
            <a href="{{ url()->previous() }}" class="btn btn-secondary w-25 p-2">Terug</a>
        </span>
    </div>

@endsection