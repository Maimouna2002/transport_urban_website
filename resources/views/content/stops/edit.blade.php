<!-- resources/views/content/stops/edit.blade.php -->

@extends('layouts.contentNavbarLayout')

@section('title', 'Modifier un arrêt')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modifier un arrêt</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('stops.update', $stop->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="stop_name">Nom :</label>
                                <input type="text" class="form-control" id="stop_name" name="stop_name" value="{{ old('stop_name', $stop->stop_name) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="status">Statut :</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="active" {{ old('status', $stop->status) === 'active' ? 'selected' : '' }}>Actif</option>
                                    <option value="inactive" {{ old('status', $stop->status) === 'inactive' ? 'selected' : '' }}>Inactif</option>
                                </select>
                            </div>

                            <br>

                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
