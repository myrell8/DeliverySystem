@extends('\..\layouts.layout')

@section('content')

    <div class="content-top">
      <span class="h1">Folders koppelen</span>
      <div class="row m-0 mt-3 mb-4 justify-content-start">
          <a class="btn btn-primary" href="/flyerlinks/create" role="button">Koppeling toevoegen</a>
      </div>
    </div>

    <div class="content-bottom scrollbar-custom">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Naam folder</th>
              <th scope="col">Gekoppeld aan:</th>
              <th scope="col"></th>
              <th scope="col">Week</th>
              <th scope="col" class="form-button-column">Info</th>
              <th scope="col" class="form-button-column">Wijzig</th>
              <th scope="col" class="form-button-column">Verwijder</th>
            </tr>
          </thead>
          <tbody>
            @foreach($flyerlinks as $flyerlink)

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
              <th scope="row">{{ $flyerlink->flyer->name }}</th>
              <td>{{ $flyerlink->type }}</td>
              <td>{{ $specificName }}</td>
              <td>{{ $flyerlink->week }}</td>

              <td><a href="/flyerlinks/{{ $flyerlink->id }}" class="btn btn-secondary w-100" role=button>Info</a></td> 

              <td><a href="/flyerlinks/{{ $flyerlink->id }}/edit" class="btn btn-primary w-100" role=button>Wijzig</a></td>
              <td>
                <form method="POST" action="/flyerlinks/{{ $flyerlink->id }}" class="w-100 text-center">
                  @method('DELETE')
                  @csrf
                  <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Are you sure?')">Verwijder</button>
                </form>
              </td>
            </tr>

          @endforeach
          </tbody>
        </table>
    </div>

    


@endsection