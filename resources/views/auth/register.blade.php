<DOCTYPE HTML>
    <head>
        <link href="{{ asset('css/register.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    </head>
    <body class="no-navbar">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card-container">
                        <img src="{{ asset('img/Lowgow.png') }}" class="lowgow" alt="Lunad Logo">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    
                                    <div class="row mb-0 mt-xl-3">
                                        <label for="fname" class="col mx-auto col-form-label text-md-start fw-bold">{{ __('First Name') }}</label>
                                        <label for="surname" class="col mx-auto col-form-label text-md-start fw-bold">{{ __('Last Name') }}</label>
                                    </div>     

                                    <div class="row mb-3">
                                        <div class="col mx-auto">
                                            <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" required autocomplete="fname" autofocus>

                                            @error('fname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col mx-auto">
                                            <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname">

                                            @error('surname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-0">
                                        <label for="email" class="col-md-4 col-form-label text-md-start fw-bold">{{ __('Email Address') }}</label>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col mx-auto">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-0">
                                        <label for="password" class="col mx-auto col-form-label text-md-start fw-bold">{{ __('Password') }}</label>
                                        <label for="password-confirm" class="col mx-auto col-form-label text-md-start fw-bold">{{ __('Confirm Password') }}</label>
                                    </div>

                                    <div class="row mb-5">
                                        <div class="col mx-auto">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col mx-auto">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-md-6">
                                            <button type="submit" class="register border-0 fw-bold">
                                                {{ __('CREATE ACCOUNT') }}
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <p style="font-weight: bold; font-size: smaller;">Already have an account? <a href="{{ route('login') }}" style="color: red; text-decoration: none;">Log In</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>