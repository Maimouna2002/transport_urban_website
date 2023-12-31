@extends('layouts.blankLayout')

@section('title', 'Login Basic - Pages')

@section('page-style')
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}">
@endsection

@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Login Form -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="{{ url('/') }}" class="app-brand-link">
                                <img src="{{ asset('assets/img/avatars/logo.jpeg') }}" alt="Mon logo" width="70" height="70">
                                <span class="demo menu-text fw-bold ms-2" style="font-size: 1.5rem;">E-TRAVEL</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2">Bienvenue Sur E-TRAVEL 👋</h4>

                        <!-- Login Form -->
                        <form id="formAuthentication" class="mb-3" action="{{ route('login-post') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre e-mail" autofocus>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Mot de Passe</label>
                                    <a href="{{ route('auth-reset-password-basic') }}">
                                        <small>Mot de passe oublié?</small>
                                    </a>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Se Connecter</button>
                            </div>
                        </form>
                        <!-- /Login Form -->

                        <!-- Register Button -->
                        <div class="text-center">
                            <p>Vous n'avez pas de compte ? <a href="{{ route('register') }}">S'inscrire</a></p>
                        </div>
                        <!-- /Register Button -->
                    </div>
                </div>
                <!-- /Login Form -->
            </div>
        </div>
    </div>
@endsection
