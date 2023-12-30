<!-- resources/views/content/stops/index.blade.php -->

@extends('layouts.contentNavbarLayout')

@section('title', 'Arrêts')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><i class='bx bx-list-ul'></i> Liste des arrêts</div>
                    <div class="card-body">
                        <a href="{{ route('stops.create') }}" class="btn btn-primary mb-3"><i class='bx bx-plus'></i> Créer un arrêt</a>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Statut</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stops as $stop)
                                    <tr>
                                        <th scope="row">{{ $stop->id }}</th>
                                        <td>{{ $stop->name }}</td>
                                        <td>{{ $stop->status }}</td>
                                        <td>
                                            <a href="{{ route('stops.edit', $stop->id) }}" class="btn btn-secondary float-right"><i class='bx bx-edit'></i></a>
                                            <form action="{{ route('stops.destroy', $stop->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger float-right" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet arrêt?')"><i class='bx bx-trash'></i></button>
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
