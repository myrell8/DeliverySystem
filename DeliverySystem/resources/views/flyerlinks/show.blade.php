@extends('\..\layouts.layout')

@section('content') {{-- This view extends the 'content' section of the layout file --}}

	<div class="content-top">
      <span class="h1 overflow-wrap">Koppeling folder</span>
    </div>

    <div class="content-bottom scrollbar-custom">
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <th class="w-20 h5 font-weight-bold">ID:</th>
                    <td class="h5">{{ $flyerlink->id }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Naam folder:</th>
                    <td class="h5">{{ $flyerlink->flyer->name }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Week:</th>
                    <td class="h5">{{ $flyerlink->week }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Jaar:</th>
                    <td class="h5">{{ $flyerlink->year }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Gekoppeld aan:</th>
                    <td class="h5">{{ $flyerlink->type }}</td>
                </tr>

                {{-- The code below stores the specific deliverername, areacode or areaname in a php variable called 'specificName'. --}}

                @if($flyerlink->type == "Bezorger")
                    @foreach($deliverers as $deliverer)
                      @if($deliverer->id == $flyerlink->specific)
                        <?php $specificName = $deliverer->firstname . " " . $deliverer->lastname ?>
                      @endif
                    @endforeach

                @elseif($flyerlink->type == "Locatie")
                    @foreach($areas as $area)
                      @if($area->id == $flyerlink->specific)
                        <?php $specificName = $area->name ?>
                      @endif
                    @endforeach

                @elseif($flyerlink->type == "Postcode")
                    <?php $specificName = $flyerlink->specific ?>

                @else
                    <?php $specificName = "" ?>

                @endif


                <tr>
                    <th class="w-20 h5 font-weight-bold">Bezorgd op/door:</th>
                    @if(isset($specificName))
                        <td class="h5">{{ $specificName }}</td> {{-- Echo the 'specificName' from the function above to show what specific area, deliverer or areacode this flyer is linked to --}}
                    @endif
                </tr>

            </tbody>
        </table>

        <span class="w-100 d-flex justify-content-center">
            <a href="/flyerlinks" class="btn btn-secondary w-25 p-2">Terug</a>
        </span>
    </div>

@endsection