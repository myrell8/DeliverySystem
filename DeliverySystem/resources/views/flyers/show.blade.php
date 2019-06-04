@extends('\..\layouts.layout')

@section('content') {{-- This view extends the 'content' section of the layout file --}}

	<div class="content-top">
      <span class="h1 overflow-wrap">{{ $flyer->name }}</span>
    </div>

    <div class="content-bottom scrollbar-custom">
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <th class="w-20 h5 font-weight-bold">Naam:</th>
                    <td class="h5">{{ $flyer->name }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Prijs:</th>
                    <td class="h5">&euro;{{ $flyer->price }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Bonus (min):</th>
                    <td class="h5">&euro;{{ $flyer->min_amount }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Bonus (max):</th>
                    <td class="h5">&euro;{{ $flyer->max_amount }}</td>
                </tr>     

                <tr>
                    <th class="w-20 h5 font-weight-bold">Gemaakt op:</th>
                    <td class="h5">{{ $flyer->created_at }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Aangepast op:</th>
                    <td class="h5">{{ $flyer->updated_at }}</td>
                </tr>

            </tbody>
        </table>

        <span class="w-100 d-flex justify-content-center">
            <a href="/flyers" class="btn btn-secondary w-25 p-2">Terug</a>
        </span>
    </div>

@endsection