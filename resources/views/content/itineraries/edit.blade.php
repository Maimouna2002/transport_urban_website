@extends('layouts.contentNavbarLayout')

@section('title', 'Modifier l\'itinéraire')

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
                                <label for="stop_id">Arrêts :</label>
                                <select class="form-control" id="stop_id" name="stop_id[]" multiple>
                                    @foreach ($stops as $stop)
                                        <option value="{{ $stop->id }}" @if(in_array($stop->id, $selectedStops)) selected @endif>{{ $stop->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="company_id">Compagnies :</label>
                                <select class="form-control" id="company_id" name="company_id[]" multiple>
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}" @if(in_array($company->id, $selectedCompanies)) selected @endif>{{ $company->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <br>

                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
