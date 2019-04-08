@extends('\..\layouts.layout')

@section('content')

	<div class="content-top">
      <span class="h1 overflow-wrap">{{ $area->name }}</span>
    </div>

    <div class="content-bottom scrollbar-custom">
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <th class="w-20 h5 font-weight-bold">Naam:</th>
                    <td class="h5">{{ $area->name }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Stad:</th>
                    <td class="h5">{{ $area->city }}</td>
                </tr>

                <?php $street_count = 0; ?>
                  @foreach($streets as $street)
                    @if($street->area->id == $area->id)
                      <?php $street_count++ ?>
                    @endif
                  @endforeach

                <tr>
                    <th class="w-20 h5 font-weight-bold">Straten:</th>
                    <td class="h5">{{ $street_count }}</td>
                </tr>

                <?php $address_count = 0; ?>
                  @foreach($addresses as $address)
                    @if($address->street->area->id == $area->id)
                      <?php $address_count++ ?>
                    @endif
                  @endforeach

                <tr>
                    <th class="w-20 h5 font-weight-bold">Adressen:</th>
                    <td class="h5">{{ $address_count }}</td>
                </tr>

            </tbody>
        </table>

        <span class="w-100 d-flex justify-content-center">
            <a href="{{ url()->previous() }}" class="btn btn-secondary w-25 p-2">Terug</a>
        </span>
    </div>

@endsection