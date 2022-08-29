<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>Xo Store</title>
    </head>
    <body class="antialiased">

        <div id="xo-shop-app">
            <xo-shop/>
        </div>

        <script>
            window.auth_user = {!! json_encode($auth_user) !!}

            window.laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!}
        </script>

        <script src="/js/app.js"></script>

    </body>
</html>
