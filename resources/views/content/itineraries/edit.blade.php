@extends('layouts.contentNavbarLayout')

@section('title', 'Modifier un itinéraire')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modifier l'itinéraire</div>

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

                        <form method="POST" action="{{ route('itineraries.update', $itinerary->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="departure_point">Point de départ :</label>
                                <input type="text" class="form-control" id="departure_point" name="departure_point" value="{{ $itinerary->departure_point }}" required>
                            </div>

                            <div class="form-group">
                                <label for="arrival_point">Point d'arrivée :</label>
                                <input type="text" class="form-control" id="arrival_point" name="arrival_point" value="{{ $itinerary->arrival_point }}" required>
                            </div>

                            <div class="form-group">
                                <label for="stops">Arrêts :</label>
                                <select name="stop_id[]" id="stop_id" class="form-control" multiple required>
                                    @foreach($stops as $stop)
                                        <option value="{{ $stop->id }}"
                                            {{ (is_array(old('stop_id', $itinerary->stops->pluck('id')->toArray())) && in_array($stop->id, old('stop_id', $itinerary->stops->pluck('id')->toArray()))) ? 'selected' : '' }}>
                                            {{ $stop->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="schedules">Horaires :</label>
                                <select name="schedule_id[]" id="schedule_id" class="form-control" multiple required>
                                    @foreach($schedules as $schedule)
                                        <option value="{{ $schedule->id }}"
                                            {{ (is_array(old('schedule_id', $itinerary->schedules->pluck('id')->toArray())) && in_array($schedule->id, old('schedule_id', $itinerary->schedules->pluck('id')->toArray()))) ? 'selected' : '' }}>
                                            {{ $schedule->departure_time }}
                                            {{ $schedule->arrival_time }}
                                        </option>
                                    @endforeach
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
