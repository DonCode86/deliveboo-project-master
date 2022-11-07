<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/admin.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-light sticky-top shadow-sm">
        <div class="container-fluid">
            {{-- Brand Text/Logo --}}
            <a class="navbar-brand" href="/">
                <img class="navbar_img"
                    src="{{ asset('images/brand_logo.png') }}" alt="">
            </a>

            {{-- Hamburger Menu --}}
            <button class="navbar-toggler" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" type="button"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                {{-- Left Side --}}
                <ul class="navbar-nav me-auto">

                </ul>

                {{-- Right Side --}}
                <ul class="navbar-nav ms-auto">
                    {{-- Authentication Links --}}
                    @guest
                        <li class="nav-item">
                            <a class="nav-link @if (Route::is('login')) active @endif"
                                href="{{ route('login') }}" aria-current="page">
                                {{ __('Accedi') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if (Route::is('register')) active @endif"
                                href="{{ route('register') }}" aria-current="page">
                                {{ __('Registrati') }}
                            </a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle"
                                data-bs-toggle="dropdown" href="#"
                                role="button" aria-expanded="false">
                                {{ Auth::user()->email }}
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item"
                                        href="{{ route('admin.dashboard') }}">
                                        {{ __('Dashboard') }}
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                        href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form class="d-none" id="logout-form"
                                        action="{{ route('logout') }}"
                                        method="POST">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>
</body>

</html>
