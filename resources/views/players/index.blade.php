@extends('layout')

@section('content')
<div class="card">
	<div class="card-body">
		<div class="card-title">
			<span class="h2">Top Players</span>

			<div class="float-right">
				{{ $players->links() }}
			</div>
		</div>

		<div class="card-text">
			<table class="table table-bordered table-sm text-center">
				<thead>
					<tr>
						<th scope="col">Rank</th>
						<th scope="col" class="text-left">Name</th>
						<th scope="col">Skill</th>
						<th scope="col">Kills</th>
						<th scope="col">Deaths</th>
						<th scope="col">Headshots</th>
						<th scope="col">K/D</th>
						<th scope="col">Last game</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($players as $player)
					<tr>
						<th scope="row">{{ $player->rank }}</th>
						<td class="text-left"><a href="{{ route('players.show', ['authid' => $player->authid]) }}">{{ $player->name }}</a></td>
						<td>{{ $player->skill }}</td>
						<td>{{ $player->kills }}</td>
						<td>{{ $player->deaths }}</td>
						<td>{{ $player->hs }}</td>
						<td>{{ calculate_ratio($player->kills, $player->deaths, false) }}</td>
						<td>{{ $player->last_join }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
