<!-- resources/views/content/itineraries/index.blade.php -->

@extends('layouts.contentNavbarLayout')

@section('title', 'Itinéraires')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><i class='bx bx-list-ul'></i> Liste des itinéraires</div>
                    <div class="card-body">
                        <a href="{{ route('itineraries.create') }}" class="btn btn-primary mb-3"><i class='bx bx-plus'></i> Créer un itinéraire</a>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Point de départ</th>
                                    <th scope="col">Point d'arrivée</th>
                                    <th scope="col">Arrêts</th>
                                    <th scope="col">Compagnie</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($itineraries as $itinerary)
                                    <tr>
                                        <th scope="row">{{ $itinerary->id }}</th>
                                        <td>{{ $itinerary->departure_point }}</td>
                                        <td>{{ $itinerary->arrival_point }}</td>
                                        <td>{{ $itinerary->stops->implode('name', ', ') }}</td>
                                        <td>{{ $itinerary->companies->implode('name', ', ') }}</td>
                                        <td>
                                            <a href="{{ route('itineraries.edit', $itinerary->id) }}" class="btn btn-secondary float-right"><i class='bx bx-edit'></i></a>
                                            <form action="{{ route('itineraries.destroy', $itinerary->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger float-right" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet itinéraire?')"><i class='bx bx-trash'></i></button>
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
