<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Postful</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="system-theme theme-container relative pb-24 sm:pb-16" style="min-height: 100vh;">
@include('layouts.components.navbar')
<main>
    @yield('content')
</main>
@include('layouts.components.footer')
</body>
</html>
