@extends('layouts.blankLayout')

@section('title', 'Inscription de base - Pages')

@section('page-style')
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}">
@endsection

@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">

                <!-- Formulaire d'Inscription -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="{{ url('/') }}" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">@include('_partials.macros',["width"=>25,"withbg"=>'#696cff'])</span>
                                <span class="app-brand-text demo text-body fw-bolder">{{ config('variables.templateName') }}</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2">L'aventure commence ici 🚀</h4>
                        <p class="mb-4">Simplifiez et amusez-vous dans la gestion de votre application !</p>

                        <form id="formInscription" class="mb-3" action="{{ route('register-post') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">Nom d'utilisateur</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Entrez votre nom d'utilisateur" autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Adresse Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Entrez votre adresse email">
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">Mot de passe</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" required>
                                    <label class="form-check-label" for="terms-conditions">
                                        J'accepte les
                                        <a href="javascript:void(0);">politiques de confidentialité et les termes</a>
                                    </label>
                                </div>
                            </div>
                            <button class="btn btn-primary d-grid w-100">
                                S'inscrire
                            </button>
                        </form>

                        <p class="text-center">
                            <span>Vous avez déjà un compte ?</span>
                            <a href="{{ route('login') }}">
                                <span>Connectez-vous plutôt</span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <!-- Formulaire d'Inscription -->
        </div>
    </div>
@endsection
