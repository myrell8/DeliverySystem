@extends('\..\layouts.layout')

@section('content')

    <div class="content-top">
      <span class="h1">Meldingen</span>
      <div class="row m-0 mt-3 mb-4 justify-content-between">
          <h5>Huidig weeknummer: <?php use Carbon\Carbon; $now = Carbon::now(); echo $now->weekOfYear; ?></h5>
      </div>
    </div>

    <div class="content-bottom scrollbar-custom">
      <table class="table">
        <thead>
          <tr class="justify-content-between">
            <th scope="col">Bericht</th>
            <th scope="col" class="form-button-colum text-right">Datum</th>
          </tr>
        </thead>
        <tbody>

        @foreach($messages as $message)
          <tr>
            <th scope="row">{{ $message->message }}</th>
            <td class="text-right">{{ $message->created_at->format('d M Y')  }}</td>
          </tr>
        @endforeach
          
        </tbody>
      </table>
    </div> 
@endsection