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

    .button_box:hover {
        border: 3px solid black;
        color: black;
        text-decoration: none;

    }
</style>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" title="ArtSite">
                    <svg height="50" width="50">
                        <circle class="nav-polygon" cx="25" cy="25" r="12" />
                    </svg>
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav mr-auto justify-content-center">
                        <input class="input_box">
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">

                            <button class="btn" data-toggle="modal" data-target="#login_dialog">
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
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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
    <div class="modal hide fade" id="signin_dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Register') }}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <input placeholder="Name" id="name" type="text" class="form-control input_box @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            <input placeholder="E-Mail Address" id="email" type="email" class="form-control input_box @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            <input placeholder="Password" id="password" type="password" class="form-control input_box @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            <input placeholder="Confirm Password" id="password-confirm" type="password" class="form-control input_box" name="password_confirmation" required autocomplete="new-password">

                            @error('name', 'email', 'password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-2">
                                <button type="submit" class="button_box">{{ __('Register') }}</button>
                                <button type="button" class="button_box" data-dismiss="modal" data-toggle="modal" data-target="#login_dialog">Log in</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            </form>
        </div>
    </div>

    <div class="modal hide fade" id="login_dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Login') }}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <input placeholder="E-Mail Address" id="email" type="email" class="form-control input_box @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <input placeholder="Password" id="password" type="password" class="form-control input_box @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('email', 'password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group text-center">
                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Recover Password') }}
                            </a>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-2">
                                    <button type="submit" class="button_box">{{ __('Login') }}</button>
                                    <button class="button_box" data-toggle="modal" data-dismiss="modal" data-target="#signin_dialog" href="#signin_dialog">Sign in</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
    $('.modal').on('shown.bs.modal', function(e) {
        $("body").addClass("modal-open")
    });
</script>