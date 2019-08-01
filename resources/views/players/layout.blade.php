@extends('layout')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="card-title">
            <span class="h2">{{ $player->name }}</span>
            <div class="clear-fix"></div>
            <span class="h6">@lang('Rank #<strong>:rank</strong> of <strong>:stats_num</strong>', ['rank' => $player->rank, 'stats_num' => $stats_num])</span>
        </div>
        <ul class="nav nav-tabs" style="margin-bottom: 1em;">
            <li class="nav-item">
                <a class="nav-link{{ request()->routeIs('players.show') ? ' active' : ''}}"
                    href="{{ route('players.show', ['authid' => $player->authid]) }}">
                    @lang('Overall')
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ request()->routeIs('players.show.weapons') ? ' active' : ''}}"
                    href="{{ route('players.show.weapons', ['authid' => $player->authid]) }}">
                    @lang('Weapons')
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ request()->routeIs('players.show.maps') ? ' active' : ''}}"
                    href="{{ route('players.show.maps', ['authid' => $player->authid]) }}">
                    @lang('Maps')
                </a>
            </li>
        </ul>

        @yield('stats')
    </div>
</div>
@endsection
