<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ArtSite') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ mix('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<style>
    .nav-polygon {
        fill: transparent;
        stroke: black;
        stroke-width: 3;
    }

    .nav-polygon:hover {
        fill: black;
    }

    .input_box {
        background-color: transparent;
        color: black;
        outline: none;
        outline-style: none;
        outline-offset: 0;
        border-top: none;
        border-left: none;
        border-right: none;
        border-bottom: solid black 3px;
        padding: 3px 10px;
        margin: 2% 12% 2% 12%;
        width: 75%;
    }

    .search_box {
        background-color: transparent;
        color: black;
        outline-offset: 0;
        border: solid black 1px;
        padding: 3px 10px;
        width: 100%;
    }

    .button_box {
        display: inline-block;
        margin: 2% 10% 2% 14%;
        box-sizing: border-box;
        color: black;
        background-color: white;
        text-align: center;
        width: 25%;
        border: 1px solid black;
    }

    .search_box:hover,
    .button_box:hover {
        border: 3px solid black;
        color: white;
        text-decoration: none;

    }
</style>


@include('modal/signin_modal')
@include('modal/login_modal')

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                        <li class="nav-item dropdown">
                            <a class="navbar-brand dropdown-toggle" href="#" data-toggle="dropdown" title="ArtSite" v-pre>
                                <svg height="50" width="50">
                                    <circle class="nav-polygon" cx="25" cy="25" r="12" />
                                </svg>
                            </a>



                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="{{ url('/') }}" style="text-align: center;">
                                    About
                                </a>
                                <hr>
                                <a class="dropdown-item" href="{{ url('/') }}" style="text-align: center;">
                                    Category
                                </a>
                                <hr>
                                <a class="dropdown-item" href="{{ url('/') }}" style="text-align: center;">
                                    Dark Mode
                                </a>
                                <hr>
                                <a class="dropdown-item" href="{{ url('/') }}" style="text-align: center;">
                                    History
                                </a>
                                <hr>
                                <a class="dropdown-item" href="{{ url('/') }}" style="text-align: center;">
                                    Help
                                </a>
                                <hr>
                                <a class="dropdown-item" href="{{ url('/') }}" style="text-align: center;">
                                    Maps
                                </a>
                                <hr>

                                <a class="dropdown-item" href="{{ url('/') }}" style="text-align: center;">
                                    FAQ
                                </a>

                            </div>



                        </li>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">
                                Sup
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                        </li>

                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav mx-auto">

                        <li class="nav-item">
                            <input placeholder="Search" class="search_box">
                        </li>

                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <button class="btn" data-toggle="modal" data-target="#login_dialog">
                                Log in
                                <svg height="50" width="50">
                                    <polygon class="nav-polygon" points="40,10 10,40 40,40" />
                                </svg>
                            </button>

                        </li>
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                                <svg height="50" width="50">
                                    <polygon points="40,10 10,40 40,40" style="fill: transparent; stroke:black; stroke-width:3" />
                                </svg>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/" style="text-align: center;">
                                    Home
                                </a>
                                <hr>
                                <a class="dropdown-item" href="{{ route('profile.index') }}" style="text-align: center;">
                                    Profile
                                </a>
                                <hr>
                                <a class="dropdown-item" href="{{ route('profile.create') }}" style="text-align: center;">
                                    Upload
                                </a>
                                <hr>
                                <a class="dropdown-item" href="{{ route('logout') }}" style="text-align: center;" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @yield('scripts')

</body>

</html>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
    $('.modal').on('shown.bs.modal', function(e) {
        $("body").addClass("modal-open")
    });
</script>