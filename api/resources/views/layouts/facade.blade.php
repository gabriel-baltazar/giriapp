<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>GiriAPI</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="py-7 border-b border-gray-300">
            <div class="container mx-auto flex justify-between px-5 lg:px-0 items-center">
                <div>
                    <a href="{{ url('/') }}" class="border-4 text-3xl sm:ml-2 lg:ml-0 border-blue-600 p-2 font-bold text-blue-600 no-underline">
                        giriapi_
                    </a>
                </div>
                <nav class="space-x-4 text-blue-600 sm:text-sm">
                    @guest
                        <a class="no-underline text-gray-500 lg:text-2xl sm:text-sm hover:underline" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                        @if (Route::has('register'))
                            <a class="no-underline text-gray-500 lg:text-2xl sm:text-sm hover:underline" href="{{ route('register') }}">{{ __('Cadastre-se') }}</a>
                        @endif
                    @else
                        <a href="{{ route('home') }}"
                           class="no-underline text-gray-500 lg:text-2xl sm:text-sm hover:underline">{{ Auth::user()->name }}</a>
                        <a href="/create"
                           class="no-underline text-gray-500 lg:text-2xl sm:text-sm hover:underline">Catalogar gíria</a>

                        <a href="{{ route('logout') }}"
                           class="no-underline text-gray-500 lg:text-2xl sm:text-sm hover:underline"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Sair') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </nav>
            </div>
        </header>

        @yield('content')
    </div>
</body>
</html>
