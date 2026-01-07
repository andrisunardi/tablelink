<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <title>@yield('title') | {{ config('app.name') }}</title>
</head>

<body>
    {{ $slot }}

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
