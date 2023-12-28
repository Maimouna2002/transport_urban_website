@extends('layouts.contentNavbarLayout')

@section('title', 'Transport')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class='bx bx-list-ul'></i> Liste des transports</div>
                <div class="card-body">
                    <a href="{{ route('transports.create') }}" class="btn btn-primary mb-3"><i class='bx bx-plus'></i> Créer un transport</a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Compagnie</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transports as $transport)
                                <tr>
                                    <th scope="row">{{ $transport->id }}</th>
                                    <td>{{ $transport->nom }}</td>
                                    <td>{{ $transport->company->name }}</td>
                                    <td>{{ $transport->status }}</td>
                                    <td>
                                        <a href="{{ route('transports.edit', $transport->id) }}" class="btn btn-secondary"><i class='bx bx-edit'></i></a>
                                        <form action="{{ route('transports.destroy', $transport->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce transport?')"><i class='bx bx-trash'></i></button>
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
