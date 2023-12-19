@extends('layouts.contentNavbarLayout')

@section('title', 'Compagnie')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class='bx bx-list-ul'></i> Liste des compagnies</div>
                <div class="card-body">
                    <a href="{{ route('companies.create') }}" class="btn btn-primary mb-3"><i class='bx bx-plus'></i> Créer une compagnie</a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Localisation</th>
                                <th scope="col">Contact</th>
                                <th scope="col">status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $company)
                                <tr>
                                    <th scope="row">{{ $company->id }}</th>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->localisation }}</td>
                                    <td>{{ $company->contact }}</td>
                                    <td>{{ $company->status }}</td>
                                    <td>
                                        <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-secondary"><i class='bx bx-edit'></i></a>
                                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette compagnie?')"><i class='bx bx-trash'></i></button>
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
