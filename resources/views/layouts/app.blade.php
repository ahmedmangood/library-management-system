<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    {{-- <link href=""> --}}
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
</head>
<body style="color: white">
    <div id="app">
        <nav class="navbar navbar-expand-lg bg-dark shadow-sm" data-bs-theme="dark">
            <div class="container-fluid">
                
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Books<b>Library</b> <i class="fas fa-book-open"></i>
                    </a>
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @auth
                    <ul class="navbar-nav ms-auto">
                        <a class="navbar-brand" href="{{ url('/dash-board') }}">
                            {{ config('DashBoard', 'DashBoard') }}
                        </a>
                        <a class="navbar-brand" href="{{ url('categories') }}">
                            {{  'Categories' }}
                        </a>
                        <a class="navbar-brand" href="{{ url('/authors') }}">
                            {{ config('Authors', 'Authors') }}
                        </a>
                        <a class="navbar-brand" href="{{ url('/booksList')}}">
                            {{  config('Books','Books') }}
                        </a>
                        {{-- <a class="navbar-brand" href="{{ url('/search') }}">
                            {{ config('Search', 'Search') }}
                        </a> --}}
                    </ul>
                    @endauth
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
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
</body>
</html>
