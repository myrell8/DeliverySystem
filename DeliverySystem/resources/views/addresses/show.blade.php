@extends('\..\layouts.layout')

@section('content')

	<div class="content-top">
      <span class="h1 overflow-wrap">{{ $address->street->name }}{{ $address->house_number }}</span>
    </div>

    <div class="content-bottom scrollbar-custom">
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <th class="w-20 h5 font-weight-bold">Straat:</th>
                    <td class="h5">{{ $address->street->name }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Huisnummer:</th>
                    <td class="h5">{{ $address->house_number }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Postcode:</th>
                    <td class="h5">{{ $address->street->areacode }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Locatie:</th>
                    <td class="h5">{{ $address->street->area->name }}</td>
                </tr>

            </tbody>
        </table>

        <span class="w-100 d-flex justify-content-center">
            <a href="{{ url()->previous() }}" class="btn btn-secondary w-25 p-2">Terug</a>
        </span>
    </div>

@endsection