@extends('layouts.contentNavbarLayout')

@section('title', 'Transport')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Créer un transport</div>

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

                        <form method="POST" action="{{ route('transports.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="nom">Nom :</label>
                                <input type="text" class="form-control" id="nom" name="nom" required>
                            </div>

                            <div class="form-group">
                              <label for="status">Statut :</label>
                              <select name="status" id="status" class="form-control" required>
                                  <option value="active">Actif</option>
                                  <option value="inactive">Inactif</option>
                              </select>
                          </div>

                            <div class="form-group">
                                <label for="company_id">Compagnie :</label>
                                <select class="form-control" id="company_id" name="company_id" required>
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
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