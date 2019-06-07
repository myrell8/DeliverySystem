@extends('\..\layouts.layout')

@section('content')

	<div class="content-top">
      <span class="h1 overflow-wrap">{{ $deliverer->firstname }} {{ $deliverer->lastname }}</span>
    </div>

    <div class="content-bottom scrollbar-custom">
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <th class="w-20 h5 font-weight-bold">Naam:</th>
                    <td class="h5">{{ $deliverer->firstname }} {{ $deliverer->lastname }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Adres:</th>
                    <td class="h5">{{ $deliverer->street }} {{ $deliverer->house_number }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Postcode:</th>
                    <td class="h5">{{ $deliverer->areacode }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Plaats:</th>
                    <td class="h5">{{ $deliverer->city }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Telefoon:</th>
                    <td class="h5">{{ $deliverer->telephone ? $deliverer->telephone : 'n.v.t.' }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Mobiel:</th>
                    <td class="h5">{{ $deliverer->mobile ? $deliverer->mobile : 'n.v.t.' }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Email:</th>
                    <td class="h5">{{ $deliverer->email }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">IBAN:</th>
                    <td class="h5">{{ $deliverer->iban }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Tenaamstelling IBAN:</th>
                    <td class="h5">{{ $deliverer->iban_name }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Geboortedatum (jjjj-mm-dd):</th>
                    <td class="h5">{{ $deliverer->birthday }}</td>
                </tr>

                {{-- <tr>
                    <th class="w-20 h5 font-weight-bold">Folder:</th>
                    <td class="h5">
                        @foreach($flyers as $flyer)
                            @if($flyer->specific == $deliverer->id)
                                {{ $flyer->name }} ,
                            @endif
                        @endforeach
                    </td>
                </tr> --}}

                <tr>
                    <th class="w-20 h5 font-weight-bold">Vast bedrag per krant:</th>
                    <td class="h5">{{ $deliverer->paper_salary ? $deliverer->paper_salary : 'n.v.t.' }}</td>
                </tr>

                <tr>
                    <th class="w-20 h5 font-weight-bold">Overig:</th>
                    <td class="h5">{{ $deliverer->comment ? $deliverer->comment : 'n.v.t.' }}</td>
                </tr>

                <?php $districtArray = array(); ?>
                @foreach($districts as $district)
                    @if($district->deliverer_id == $deliverer->id)
                        <?php array_push($districtArray, $district->id); ?>
                    @endif
                @endforeach

                <tr>
                    <th class="w-20 h5 font-weight-bold">Straten:</th>
                    <td>
                        <ul class="list-goup p-0 streetname-list scrollbar-custom">
                            @foreach($streets as $street)
                                @if(in_array($street->district_id , $districtArray))
                                    <li class="list-group-item w-50">{{ $street->name }}</li>
                                @endif
                            @endforeach
                        </ul>
                    </td>  
                </tr>

                <?php $addressArray = array(); ?>
                @foreach($addresses as $address)
                    @if($address->street->district->deliverer_id == $deliverer->id)
                        <?php array_push($addressArray, $address->id); ?>
                    @endif
                @endforeach

                <tr>
                    <th class="w-20 h5 font-weight-bold">Klachten:</th>
                    <td>
                        <ul class="list-goup p-0 streetname-list scrollbar-custom">
                            @foreach($complaints as $complaint)
                                @if(in_array($complaint->address_id , $addressArray))
                                    <li class="list-group-item w-50">Week: {{ $complaint->week }} - {{ $complaint->type }}</li>
                                @endif
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