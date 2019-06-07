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
                    @isset($street->district->id)
                        @if($street->district->id == $district->id)
                          <?php $street_count++ ?>
                        @endif
                    @endisset
                @endforeach

                <tr>
                    <th class="w-20 h5 font-weight-bold">Straten:</th>
                    <td class="h5">{{ $street_count }}</td>
                </tr>

                <?php $address_count = 0; ?>
                @foreach($addresses as $address)
                    @isset($address->street->district->id)
                        @if($address->street->district->id == $district->id)
                          <?php $address_count++ ?>
                        @endif
                    @endisset
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
                    <th class="w-20 h5 font-weight-bold">Aantal folders (handmatig):</th>
                    @isset($district->amount_flyers)
                    <td class="h5">{{ $district->amount_flyers }}</td>
                    @endisset
                    @empty($district->amount_flyers)
                      <td>-</td>
                    @endempty
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Aantal kranten (handmatig):</th>
                    @isset($district->amount_papers)
                    <td class="h5">{{ $district->amount_papers }}</td>
                    @endisset
                    @empty($district->amount_papers)
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

                <tr>
                    <th class="w-20 h5 font-weight-bold">Straatnamen:</th>
                    <td>
                        <ul class="list-goup p-0 streetname-list scrollbar-custom">
                            @foreach($streets as $street)
                                @isset($street->district->id)
                                    @if($street->district->id == $district->id)
                                      <li class="list-group-item w-50">{{ $street->name }} {{ $street->areacode }}</li>
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