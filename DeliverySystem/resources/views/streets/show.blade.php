@extends('\..\layouts.layout')

@section('content')

	<div class="content-top">
      <span class="h1 overflow-wrap">{{ $street->name }}</span>
    </div>

    <div class="content-bottom scrollbar-custom">
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <th class="w-20 h5 font-weight-bold">Naam:</th>
                    <td class="h5">{{ $street->name }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Postcode:</th>
                    <td class="h5">{{ $street->areacode }}</td>
                </tr>

                <?php $address_count = 0; ?>
                @foreach($addresses as $address)
                  @if($address->street->id == $street->id)
                    <?php $address_count++ ?>
                  @endif
                @endforeach

                <tr>
                    <th class="w-20 h5 font-weight-bold">Adressen:</th>
                    <td class="h5">{{ $address_count }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Locatie:</th>
                    <td class="h5">{{ $street->area->name }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Wijk:</th>
                    @isset( $street->district->name )
                        <td class="h5">{{ $street->district->name }}</td>
                    @endisset
                    @empty( $street->district->name )
                        <td>-</td>
                    @endempty
                </tr>

                <?php
                  $currentDate = new DateTime();
                  $currentWeek = $currentDate->format("W");
                ?>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Folders deze week (week {{$currentWeek}}):</th>
                    <td class="h5">
                        @foreach($flyerlinks as $flyerlink)
                            @if($flyerlink->specific == $street->areacode)
                                {{ $flyerlink->flyer->name }} ,
                            @endif
                        @endforeach
                    </td>
                </tr>
            </tbody>
        </table>

        <span class="w-100 d-flex justify-content-center">
            <a href="{{ url()->previous() }}" class="btn btn-secondary w-25 p-2">Terug</a>
        </span>
    </div>

@endsection