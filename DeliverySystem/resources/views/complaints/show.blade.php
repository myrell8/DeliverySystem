@extends('\..\layouts.layout')

@section('content')

	<div class="content-top">
      <span class="h1 overflow-wrap">Klacht: {{ $complaint->address->street->name }} {{ $complaint->address->house_number }}</span>
    </div>

    <div class="content-bottom scrollbar-custom">
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <th class="w-20 h5 font-weight-bold">Adres:</th>
                    <td class="h5">{{ $complaint->address->street->name }} {{ $complaint->address->house_number }}</td>
                    </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Week:</th>
                    <td class="h5">{{ $complaint->week }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Jaar:</th>
                    <td class="h5">{{ $complaint->year }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Type:</th>
                    <td class="h5">{{ $complaint->type }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Status:</th>
                    <td class="h5">{{ $complaint->status }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Bezorger:</th>
                    <td class="h5">{{ $complaint->address->street->district->deliverer->firstname }}
                        {{ $complaint->address->street->district->deliverer->lastname }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Overig:</th>
                    <td class="h5">{{ $complaint->description }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Laatst aangepast:</th>
                    <td class="h5">{{ $complaint->updated_at->format('d M Y') }}</td>
                </tr>

            </tbody>
        </table>

        <span class="w-100 d-flex justify-content-center">
            <a href="{{ url()->previous() }}" class="btn btn-secondary w-25 p-2">Terug</a>
        </span>
    </div>

@endsection