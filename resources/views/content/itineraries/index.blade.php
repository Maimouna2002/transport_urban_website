@extends('layouts.contentNavbarLayout')

@section('title', 'Liste des itinéraires')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header"><i class='bx bx-list-ul'></i> Liste des itinéraires</div>


                    <div class="card-body">
                        <div class="mb-3">
                            <a href="{{ route('itineraries.create') }}" class="btn btn-primary"><i class="bx bx-plus"></i> Créer</a>
                        </div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Point de départ</th>
                                    <th scope="col">Point d'arrivée</th>
                                    <th scope="col">Arrêts</th>
                                    <th scope="col">Horaires</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($itineraries as $itinerary)
                                    <tr>
                                        <th scope="row">{{ $itinerary->id }}</th>
                                        <td>{{ $itinerary->departure_point }}</td>
                                        <td>{{ $itinerary->arrival_point }}</td>
                                        <td>
                                            @foreach ($itinerary->stops as $stop)
                                                {{ $stop->name }},
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($itinerary->schedules as $schedule)
                                                {{ $schedule->departure_time }} - {{ $schedule->arrival_time }},
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('itineraries.edit', $itinerary->id) }}" class="btn btn-secondary"><i class='bx bx-edit'></i></a>
                                            <form action="{{ route('itineraries.destroy', $itinerary->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet itinéraire?')"><i class='bx bx-trash'></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
