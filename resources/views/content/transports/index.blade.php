@extends('layouts.contentNavbarLayout')

@section('title', 'Liste des transports')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header"><i class='bx bx-list-ul'></i> Liste des transports</div>

                    <div class="card-body">
                        <div class="mb-3">
                            <a href="{{ route('transports.create') }}" class="btn btn-primary"><i class="bx bx-plus"></i> Créer</a>
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Compagnie</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transports as $transport)
                                        <tr>
                                            <th scope="row">{{ $transport->id }}</th>
                                            <td>{{ $transport->name }}</td>
                                            <td>
                                              @if ($transport->companies)
    @foreach ($transport->companies as $company)
        {{ $company->name }}
    @endforeach
@endif
                                          </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('transports.edit', $transport->id) }}" class="btn btn-secondary mr-2"><i class='bx bx-edit'></i></a>
                                                    <form action="{{ route('transports.destroy', $transport->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce transport?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"><i class='bx bx-trash'></i></button>
                                                    </form>
                                                </div>
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
    </div>
@endsection
