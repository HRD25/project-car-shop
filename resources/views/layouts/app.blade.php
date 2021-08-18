<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CarShop') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Scripts-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Scripts-->
    <script src="{{ asset('js/image-animantion.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark text-white">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                        <div class="row">
                            <ul class="navbar-nav">
                                @guest
                                    @if (Route::has('login'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link"
                                                href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @endguest
                            </ul>
                            <ul class="navbar-nav">
                                @auth
                                    <li class="nav-item me-2">
                                        <a class="nav-link" href="{{ route('user.showfavorites') }}">Favorite</a>
                                    </li>
                                    <li class="nav-item col-sm-2 mt-2 m-0">
                                        @if (Auth::user()->avatar)
                                            <img src="{{ asset('/storage/' . Auth::user()->avatar) }}"
                                                class="img-fluid rounded-circle p-0 m-0" style="width: 25%;">
                                        @else
                                            <img src="https://packback.pl/wp-content/plugins/all-in-one-seo-pack/images/default-user-image.png"
                                                class="img-fluid rounded-circle p-0 m-0" style="width: 25%">
                                        @endif
                                        {{ Auth::user()->name }}
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle col-sm-" href="#" id="navbarDarkDropdownMenuLink"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        </a>

                                        <ul class="dropdown-menu dropdown-menu-dark"
                                            aria-labelledby="navbarDarkDropdownMenuLink">
                                            <li>
                                                <a class="dropdown-item text-center"
                                                    href="{{ route('user.settingsuser', ['id' => Auth::id()]) }}">
                                                    Seetings
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                                        <path
                                                            d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                                                        <path
                                                            d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                                                    </svg>
                                                </a>
                                            </li>

                                            <li>
                                                <a class="dropdown-item text-center" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                                                                                                                    document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
                                                        <path d="M7.5 1v7h1V1h-1z" />
                                                        <path
                                                            d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z" />
                                                    </svg>
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>

                                    </li>
                                @endauth
                            </ul>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid p-0 m-0">
        @yield('content')
    </div>
</body>

</html>
