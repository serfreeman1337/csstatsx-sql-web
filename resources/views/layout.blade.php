<!doctype html>
<html lang="{{ App::getLocale() }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <title>@yield('title')</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <ul class="navbar-nav">
            <li class="nav-item{{ request()->routeIs('players.index') ? ' active' : ''}}">
                <a class="nav-link" href="/">@lang('Players')</a>
            </li>
            @if (env('CSSTATS_SQL_WEAPONS'))
            <li class="nav-item{{ request()->routeIs('weapons*') ? ' active' : ''}}">
                <a class="nav-link" href="{{ route('weapons.index') }}">@lang('Weapons')</a>
            </li>
            @endif
            @if (env('CSSTATS_SQL_MAPS'))
            <li class="nav-item{{ request()->routeIs('maps*') ? ' active' : ''}}">
                <a class="nav-link" href="{{ route('maps.index') }}">@lang('Maps')</a>
            </li>
            @endif
        </ul>
    </nav>

    <div class="container my-2">
        @yield('content')
    </div>

    <script src="/js/app.js" charset="utf-8"></script>
</body>
</html>
