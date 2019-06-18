@extends('\..\layouts.layout')

@section('content')

	<div class="content-top">
      <span class="h1 overflow-wrap">{{ $route->name }}</span>
    </div>

    <div class="content-bottom scrollbar-custom">
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <th class="w-20 h5 font-weight-bold">Naam:</th>
                    <td class="h5">{{ $route->name }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Koerier:</th>
                    <td class="h5">{{ $route->courier->firstname }} {{ $route->courier->lastname }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Overig:</th>
                    <td class="h5">{{ $route->comment }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Straten:</th>
                    <td>
                        <ul class="list-goup p-0 streetname-list scrollbar-custom">
                            @foreach($districts as $district)
                                @isset($district->route_id)
                                    @if($district->route_id == $route->id)
                                        <li class="list-group-item w-50">{{ $district->name}}</li>
                                    @endif
                                @endisset
                            @endforeach
                        </ul>
                    </td>  
                </tr>

            </tbody>
        </table>

        <span class="w-100 d-flex justify-content-center">
            <a href="{{ url()->previous() }}" class="btn btn-secondary w-25 p-2">Terug</a>
        </span>
    </div>

@endsection