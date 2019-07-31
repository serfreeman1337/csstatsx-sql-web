<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <title>@yield('title')Player Stats</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <ul class="navbar-nav">
            <li class="nav-item{{ request()->routeIs('top') ? ' active' : ''}}">
                <a class="nav-link" href="/">Stats</a>
            </li>
            <li class="nav-item{{ request()->routeIs('weapons*') ? ' active' : ''}}">
                <a class="nav-link" href="{{ route('weapons.index') }}">Weapons</a>
            </li>
        </ul>
    </nav>

    <div class="container my-2">
        @yield('content')
    </div>

    <script src="/js/app.js" charset="utf-8"></script>
</body>
</html>
