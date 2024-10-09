<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Covid Vaccin Registration</title>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>

    <div class="container mt-3 mb-3">
        {{-- Header section --}}
        @include('layouts.header')

        @yield('content')
    </div>

</body>
</html>