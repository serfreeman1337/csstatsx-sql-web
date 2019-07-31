@extends('layout')
@section('title', 'Weapons Stats - ')

@section('content')
<div class="card">
	<div class="card-body">
		<div class="card-title">
			<span class="h2">{{ $weapon }} weapon stats</span>
			<div class="float-right">
				{{ $weapons->links() }}
			</div>
			<div class="clear-fix"></div>
			<span class="h6">From a total of <strong>{{ $total_kills }}</strong> kills with <strong>{{ $total_hs }}</strong> headshots</span>
		</div>

		<div class="card-text">
			<table class="table table-bordered table-sm text-center">
				<thead>
					<tr>
						<th>#</th>
						<th>Player</th>
						<th>Rank</th>
						<th>Kills</th>
						<th>Deaths</th>
						<th>Kpd</th>
						<th>Hs</th>
						<th style="width: 100px;">Hpk</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($weapons as $pos => $weapon)
					<tr>
						<td>{{ ($pos+1) }}</td>
						<td><a href="{{ route('players.show', ['authid' => $weapon->player->authid]) }}">{{ $weapon->player->name }}</a></td>
						<td>{{ $weapon->player->rank }}</td>
						<td>{{ $weapon->kills }}</td>
						<td>{{ $weapon->deaths }}</td>
						<td>
							{{ calculate_ratio($weapon->kills, $weapon->deaths, false) }}
						</td>
						<td>{{ $weapon->hs }}</td>
						<td>{!! bootstrap_progress([
							[
								'num' => $weapon->hs,
								'of' => $weapon->kills,
							]
						], ['center_val' => true]) !!}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
