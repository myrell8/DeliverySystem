@extends('\..\layouts.layout')

@section('content')

    <div class="content-top">
      <?php
        use Carbon\Carbon;
        $current = Carbon::now();
      ?>
      <span class="h1">Meldingen</span>
      <div class="row m-0 mt-3 mb-4 justify-content-between">
          {{-- <a class="btn btn-primary" href="#" role="button">Button</a>

          <div class="input-group w-25">
            <input type="text" class="form-control" placeholder="Zoeken op naam" aria-describedby="basic-addon2">
          </div> --}}
      </div>
    </div>

    <div class="content-bottom scrollbar-custom">
      <table class="table">
        <thead>
          <tr class="justify-content-between">
            <th scope="col">Onderwerp</th>
            <th scope="col" class="form-button-colum text-right">Datum - Tijd</th>
          </tr>
        </thead>
        <tbody>

          @foreach($messages as $message)
          <tr>
            <th scope="row">{{ $message->message }}</th>
            <td class="text-right">{{ $message->created_at->format('d M Y - H:m')  }}</td>
          </tr>
          @endforeach
          
        </tbody>
      </table>
    </div> 
@endsection