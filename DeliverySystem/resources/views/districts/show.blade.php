@extends('\..\layouts.layout')

@section('content')

	<div class="content-top">
      <span class="h1 overflow-wrap">{{ $district->name }}</span>
    </div>

    <div class="content-bottom scrollbar-custom">
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <th class="w-20 h5 font-weight-bold">Naam:</th>
                    <td class="h5">{{ $district->name }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Locatie:</th>
                    <td class="h5">{{ $district->area->name }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Krant:</th>
                    <td class="h5">{{ $district->paper->name }}</td>
                </tr>

                <?php $street_count = 0; ?>
                @foreach($streets as $street)
                    @if($street->district->id == $district->id)
                      <?php $street_count++ ?>
                    @endif
                @endforeach

                <tr>
                    <th class="w-20 h5 font-weight-bold">Straten:</th>
                    <td class="h5">{{ $street_count }}</td>
                </tr>

                <?php $address_count = 0; ?>
                @foreach($addresses as $address)
                    @if($address->street->district->id == $district->id)
                      <?php $address_count++ ?>
                    @endif
                @endforeach

                <tr>
                  <th class="w-20 h5 font-weight-bold">Adressen:</th>
                  <td class="h5">{{ $address_count }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Bezorger:</th>
                    @isset($district->deliverer->firstname)
                    <td class="h5">{{ $district->deliverer->firstname }} {{ $district->deliverer->lastname }}</td>
                    @endisset
                    @empty($district->deliverer->firstname)
                      <td>-</td>
                    @endempty
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Map:</th>
                    <td class="h5">
                        @if($district->map)
                            <img src="/uploads/{{ $district->map }}" width="700" height="400"><br>
                        @else
                            <img src="/images/NoImg.jpg" width="700" height="400"><br>
                        @endif
                    </td>
                </tr>

            </tbody>
        </table>

        <span class="w-100 d-flex justify-content-center">
            <a href="{{ url()->previous() }}" class="btn btn-secondary w-25 p-2">Terug</a>
        </span>
    </div>

@endsection