@extends('layouts.contentNavbarLayout')

@section('title', 'Compagnie')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Créer une compagnie</div>

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

                        <form method="POST" action="{{ route('companies.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="name">Nom :</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <div class="form-group">
                                <label for="localisation">Localisation :</label>
                                <input type="text" class="form-control" id="localisation" name="localisation" required>
                            </div>

                            <div class="form-group">
                                <label for="contact">Contact :</label>
                                <input type="text" class="form-control" id="contact" name="contact" required>
                            </div>

                            <div class="form-group">
                              <label for="itinerary_id">Itinéraires :</label>
                              <select name="itinerary_id[]" id="itinerary_id" class="form-control" multiple required>
                                    @foreach($itineraries as $itinerary)
                                        <option value="{{ $itinerary->id }}"
                                            {{ (is_array(old('itineraries')) && in_array($itinerary->id, old('itineraries'))) ? 'selected' : '' }}>
                                            {{ $itinerary->departure_point }} - {{ $itinerary->arrival_point }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                              <label for="status">Statut :</label>
                              <select name="status" id="status" class="form-control" required>
                                  <option value="active">Actif</option>
                                  <option value="inactive">Inactif</option>
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
