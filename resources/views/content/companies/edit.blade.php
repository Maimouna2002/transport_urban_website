@extends('layouts.contentNavbarLayout')

@section('title', 'Compagnie')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modifier la compagnie</div>

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

                        <form method="POST" action="{{ route('companies.update', $company->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Nom :</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $company->name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="localisation">Localisation :</label>
                                <input type="text" class="form-control" id="localisation" name="localisation" value="{{ $company->localisation }}" required>
                            </div>

                            <div class="form-group">
                                <label for="contact">Contact :</label>
                                <input type="text" class="form-control" id="contact" name="contact" value="{{ $company->contact }}" required>
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
