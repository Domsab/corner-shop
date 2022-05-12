<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>Dashboard</title>
    </head>
    <body class="antialiased">
        <div class="">
            {{-- @if (Route::has('login'))
                <div class="fixed top-0 right-0 hidden px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline dark:text-gray-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline dark:text-gray-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline dark:text-gray-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif --}}
        </div>

        @include('components.flash')

        <div id="xo-dashboard-app">
            <xo-dashboard/>
        </div>

        <script src="/js/app.js"></script>

    </body>
</html>
