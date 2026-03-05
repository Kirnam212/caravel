<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Блог о картинах')</title>

    <link rel="stylesheet" href="{{ asset('css/pictures.css') }}">
    @stack('head')
</head>
<body>
    <div class="container @yield('containerClass', '')">
        @yield('content')
    </div>
</body>
</html>


