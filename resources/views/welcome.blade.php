<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>
        <main>
            <div class="container text-center m-auto w-100 welcome-title">
                <a href="" class="bg-info fs-2 w-50 p-2 fw-bold rounded">
                    Covid Vaccin Registration
                </a>
            </div>
        </main>
    </body>
</html>
