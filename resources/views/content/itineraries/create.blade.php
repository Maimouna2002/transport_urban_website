@extends('layouts.contentNavbarLayout')

@section('title', 'Itinéraire')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Créer un itinéraire</div>

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

                        <form method="POST" action="{{ route('itineraries.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="departure_point">Point de départ :</label>
                                <input type="text" class="form-control" id="departure_point" name="departure_point" required>
                            </div>

                            <div class="form-group">
                                <label for="arrival_point">Point d'arrivée :</label>
                                <input type="text" class="form-control" id="arrival_point" name="arrival_point" required>
                            </div>

                            <div class="form-group">
                                <label for="stops">Arrêts :</label>
                                <select name="stop_id[]" id="stop_id" class="form-control" multiple required>
                                    @foreach($stops as $stop)
                                        <option value="{{ $stop->id }}"
                                            {{ (is_array(old('stops')) && in_array($stop->id, old('stops'))) ? 'selected' : '' }}>
                                            {{ $stop->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="schedules_">Horaires :</label>
                                <select name="schedule_id[]" id="schedule_id" class="form-control" multiple required>
                                    @foreach($schedules as $schedule)
                                        <option value="{{ $schedule->id }}"
                                            {{ (is_array(old('schedules')) && in_array($schedule->id, old('schedules'))) ? 'selected' : '' }}>
                                            {{ $schedule->departure_time }}
                                            {{ $schedule->arrival_time }}
                                        </option>
                                    @endforeach
                                </select>
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
