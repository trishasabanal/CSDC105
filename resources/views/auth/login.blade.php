@extends('layouts.app')
@section('css')
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endsection
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card-container" style="position: relative;">
                    <img src="{{ asset('img/Lowgow.png') }}" class="lowgow" alt="Lunad Logo">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="row mb-2 mt-xl-5">
                                    <div class="col mx-auto">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#FFB200" class="bi bi-person-fill" viewBox="0 0 16 16">
                                                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="vr"></div>
                                            <input id="email" placeholder="email address" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                             @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-1">
                                    <div class="col mx-auto">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" fill="#FFB200" class="bi bi-lock-fill" viewBox="0 0 16 16">
                                                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="vr"></div>
                                            <input id="password" placeholder="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mx-auto">
                                    <div class="form-check d-flex justify-content-between align-items-center m-0 p-0">
                                        <div class="col text-md-start" style="margin-left: 30px;">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember" style="font-size: smaller;">
                                                <strong>{{ __('Remember me') }}</strong>
                                            </label>
                                        </div>

                                        <div class="col text-md-end">              
                                            @if (Route::has('password.request'))
                                            <a class="btn btn-link text-red" href="{{ route('password.request') }}" style="font-size: smaller; color: red; text-decoration: none; font-weight: bold; font-style: italic;">
                                                {{ __('Forgot Password?') }}
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-2 mt-xl-4">
                                    <div class="col-md-12">
                                        <button type="submit" class="login border-0 fw-bold mx-auto">
                                            {{ __('LOGIN') }}
                                        </button>
                                    </div>
                                </div>
                                
                                <div class="col-md-9 mx-auto" style="text-align: center;">
                                    <p style="font-weight: bold; font-size: smaller;">Don't have an account? <a href="{{ route('register') }}" style="color: red; text-decoration: none;">Sign Up</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection