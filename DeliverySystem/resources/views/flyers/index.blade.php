@extends('\..\layouts.layout')

@section('content') {{-- This view extends the 'content' section of the layout file --}}

    <div class="content-top">
      <span class="h1">Folders</span>
      <div class="row m-0 mt-3 mb-4 justify-content-between">
          <a class="btn btn-primary" href="/flyers/create" role="button">Folder toevoegen</a>
          {{-- Link to the create view --}}
      </div>
    </div>

    <div class="content-bottom scrollbar-custom">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Naam</th>
              <th scope="col">Prijs</th>
              <th scope="col">Bonus(Minimaal)</th>
              <th scope="col">Bonus(Maximaal)</th>
              <th scope="col" class="form-button-column">Info</th>
              <th scope="col" class="form-button-column">Wijzig</th>
              <th scope="col" class="form-button-column">Verwijder</th>
            </tr>
          </thead>
          <tbody>
            {{-- Looping through each flyer in the database and making a table row with the flyers' information in the <td> inside --}}
            @foreach($flyers as $flyer)
            <tr>
              <th scope="row">{{ $flyer->name }}</th>
              <td>&euro;{{ $flyer->price }}</td>
              <td>&euro;{{ $flyer->min_amount }}</td>
              <td>&euro;{{ $flyer->max_amount }}</td>
              <td><a href="/flyers/{{ $flyer->id }}" class="btn btn-secondary w-100" role=button>Info</a></td> {{-- Link to the show view, uses the flyer id in the url to redirect the user to the flyer he/she chooses--}}
              <td><a href="/flyers/{{ $flyer->id }}/edit" class="btn btn-primary w-100" role=button>Wijzig</a></td>{{-- Link to the edit view, uses the flyer id in the url to redirect the user to the flyer he/she chooses--}}
              <td>
                {{-- Button that calls the JQuery function to show the 'confirm-delete' modal --}}
                <a href="#" class="btn btn-danger w-100" data-record-id="{{ $flyer->id }}" data-record-title="{{ $flyer->name }}" data-toggle="modal" data-target="#confirm-delete">
                    Verwijder
                </a>
              </td>
            </tr>

            {{-- The 'confirm-delete' modal that shows when the user presses the 'Verwijder' button --}}
            <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Bevestig keuze</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      </div>
                      <div class="modal-body">
                          <p>Weet je zeker dat je <b><i class="title"></i></b> wilt verwijderen?</p>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Annuleren</button>
                          <button type="button" class="btn btn-danger btn-ok" data-token="{{ csrf_token() }}">Verwijder</button>
                      </div>
                  </div>
              </div>
          </div>

          @endforeach
          </tbody>
        </table>
    </div>

    


@endsection