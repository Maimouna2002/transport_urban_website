<!-- resources/views/content/schedules/index.blade.php -->

@extends('layouts.contentNavbarLayout')

@section('title', 'Horaires')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><i class='bx bx-list-ul'></i> Liste des horaires</div>
                    <div class="card-body">
                        <a href="{{ route('schedules.create') }}" class="btn btn-primary mb-3"><i class='bx bx-plus'></i> Créer un horaire</a>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Heure de départ</th>
                                    <th scope="col">Heure d'arrivée</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schedules as $schedule)
                                    <tr>
                                        <th scope="row">{{ $schedule->id }}</th>
                                        <td>{{ $schedule->departure_time }}</td>
                                        <td>{{ $schedule->arrival_time }}</td>
                                        <td>
                                            <a href="{{ route('schedules.edit', $schedule->id) }}" class="btn btn-secondary float-right"><i class='bx bx-edit'></i></a>
                                            <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger float-right" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet horaire?')"><i class='bx bx-trash'></i></button>
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
