<!-- resources/views/content/schedules/create.blade.php -->

@extends('layouts.contentNavbarLayout')

@section('title', 'Créer un horaire')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Créer un horaire</div>

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

                        <form method="POST" action="{{ route('schedules.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="departure_time">Heure de départ :</label>
                                <input type="time" class="form-control" id="departure_time" name="departure_time" required>
                            </div>

                            <div class="form-group">
                                <label for="arrival_time">Heure d'arrivée :</label>
                                <input type="time" class="form-control" id="arrival_time" name="arrival_time" required>
                            </div>

                            <br>

                            <button type="submit" class="btn btn-primary">Créer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
