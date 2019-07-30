@extends('layout')
@section('title', $player->name. ' - ')

@section('content')
<div class="card">
	<div class="card-body">
		<div class="card-title">
			<span class="h2">{{ $player->name }}</span>
			<div class="clear-fix"></div>
			<span class="h6">Rank #<strong>{{ $player->rank }}</strong> of <strong>{{ $stats_num }}</strong></span>
		</div>
		<ul class="nav nav-tabs" style="margin-bottom: 1em;">
		  <li class="nav-item">
		    <a class="nav-link{{ request()->routeIs('player') ? ' active' : ''}}" href="{{ route('player', ['authid' => $player->authid]) }}">Overall</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link{{ request()->routeIs('player.weapons') ? ' active' : ''}}" href="{{ route('player.weapons', ['authid' => $player->authid]) }}">Weapons</a>
		</ul>

		@yield('stats')

	</div>
</div>
@endsection
