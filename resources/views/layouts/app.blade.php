<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Lunad Maps</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('/fontawesome-free/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" >
    <link rel="stylesheet" href="./Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
        crossorigin=""/>
    @yield('css')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="./Bootstrap/js/bootstrap.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
</head>
<body id="body-pd" oncontextmenu="return false" class="snippet-body body-pd">
    <div id="map"></div>
    <!-- Navbar -->
    <div class="lunad_UI">
        <header class="header navbar-expand-md body-pd" id="header">
            <div class="navbar-nav gap-2 align-middle">
                <div class="header_toggle me-2 mt-2">
                    <i class='bx bx-arrow-back' id="header-toggle"></i>
                </div>
                <button type="button" href="/ride/0" class="btn btn-primary h-25 fw-bold pe-3 mt-2 rounded-pill shadow map-select {{request()->is('tricycle') ? 'active' : ''}}">
                    <img class="v-icon mx-1" src="{{asset('img/Icons/Vehicle Icons/tricy.png')}}" width="20"></img>
                    Tricycle</button>
                <button type="button" href="/ride/1" class="btn btn-primary h-25 fw-bold pe-3 mt-2 rounded-pill shadow map-select {{request()->is('jeepney') ? 'active' : ''}}">
                    <img class="v-icon mx-1" src="{{asset('img/Icons/Vehicle Icons/jeepney.png')}}" width="20"></img>
                    Jeepney</button>
                <button type="button" href="/ride/2" class="btn btn-primary h-25 fw-bold pe-3 mt-2 rounded-pill shadow map-select {{request()->is('pedicab') ? 'active' : ''}}">
                    <img class="v-icon mx-1" src="{{asset('img/Icons/Vehicle Icons/pedicab.png')}}" width="20"></img>
                    Pedicab</button>
                <button type="button" href="/ride/3" class="btn btn-primary h-25 fw-bold pe-3 mt-2 rounded-pill shadow map-select {{request()->is('bus') ? 'active' : ''}}">
                    <img class="v-icon mx-1" src="{{asset('img/Icons/Vehicle Icons/bus.png')}}" width="20"></img>
                    Bus</button>
                <button type="button" href="/ride/4" class="btn btn-primary h-25 fw-bold pe-3 mt-2 rounded-pill shadow map-select {{request()->is('van') ? 'active' : ''}}">
                    <img class="v-icon mx-1" src="{{asset('img/Icons/Vehicle Icons/van.png')}}" width="20"></img>
                    Van</button>
            </div>
            <div class="navbar-nav ms-auto h-35 mt-2 px-3 py-2 align-middle rounded-pill" id="logo">
                <img class="logo mt-1" src="{{asset('img/Logo transparent.png')}}" height="20"></img>
                <span class="logoText ms-2">Lunad</span>
            </div>
        </header>
        <!-- Sidebar -->
        <div class="l-navbar show shadow" id="nav-bar">
            <nav class="nav">
                <div class="saved_routes pt-4 pb-3 shadow-sm">
                    <i class='bx bx-bookmark nav_icon'></i>
                    <span class="nav_name ms-2 fw-bold">Saved Routes</span>
                </div>

                <!-- Saved routes list -->
                <div class="nav_list ms-5 mb-auto">
                    <a href="#" class="route_link">
                    <i class='bx bx-pin nav_icon'></i> <span class="nav_name">route 1</span> </a>
                </div>
                
                <div class="navbar navbar-expand-md shadow ps-4 py-2 user_bar">
                    <i class='bx bx-user user_icon'></i>
                    <div class="gap-1 user_text">
                        <ul class="navbar-nav">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif
                                <div class="vr my-auto" style="width: 2px; height: 20px;"></div>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                <!-- <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li> -->
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
    <!--Container Main start-->
    <!--Container Main end-->
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
        crossorigin=""></script>
</body>
</html>