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
		    <a class="nav-link{{ request()->routeIs('players.show') ? ' active' : ''}}" href="{{ route('players.show', ['authid' => $player->authid]) }}">Overall</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link{{ request()->routeIs('players.show.weapons') ? ' active' : ''}}" href="{{ route('players.show.weapons', ['authid' => $player->authid]) }}">Weapons</a>
			</li>
		  <li class="nav-item">
		    <a class="nav-link{{ request()->routeIs('players.show.maps') ? ' active' : ''}}" href="{{ route('players.show.maps', ['authid' => $player->authid]) }}">Maps</a>
			</li>
		</ul>

		@yield('stats')

	</div>
</div>
@endsection
