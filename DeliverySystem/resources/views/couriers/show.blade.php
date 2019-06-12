@extends('\..\layouts.layout')

@section('content')

	<div class="content-top">
      <span class="h1 overflow-wrap">{{ $courier->firstname }} {{ $courier->lastname }}</span>
    </div>

    <div class="content-bottom scrollbar-custom">
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <th class="w-20 h5 font-weight-bold">Naam:</th>
                    <td class="h5">{{ $courier->firstname }} {{ $courier->lastname }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Adres:</th>
                    <td class="h5">{{ $courier->street }} {{ $courier->house_number }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Postcode:</th>
                    <td class="h5">{{ $courier->areacode }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Plaats:</th>
                    <td class="h5">{{ $courier->city }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Telefoon:</th>
                    <td class="h5">{{ $courier->telephone ? $courier->telephone : 'n.v.t.' }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Mobiel:</th>
                    <td class="h5">{{ $courier->mobile ? $courier->mobile : 'n.v.t.' }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Email:</th>
                    <td class="h5">{{ $courier->email }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Geboortedatum (jjjj-mm-dd):</th>
                    <td class="h5">{{ $courier->birthday }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Overig:</th>
                    <td class="h5">{{ $courier->comment ? $courier->comment : 'n.v.t.' }}</td>
                </tr>

            </tbody>
        </table>

        <span class="w-100 d-flex justify-content-center">
            <a href="{{ url()->previous() }}" class="btn btn-secondary w-25 p-2">Terug</a>
        </span>
    </div>

@endsection