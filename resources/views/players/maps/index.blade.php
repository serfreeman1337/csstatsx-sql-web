@extends('players.layout')

@section('stats')
<div class="row">
	<div class="col">
		<table class="table table-bordered table-sm text-center">
			<thead>
				<tr>
					<th>Map</th>
					<th>Time</th>
					<th>Rounds</th>
					<th>Rounds Won</th>
					<th>Win Rate</th>
					<th>Kills</th>
					<th>Deaths</th>
					<th>K/D</th>
					<th>HS</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($maps as $map)
				<tr>
					<td>{{ $map->map }}</td>
					<td>{{ $map->connection_time }}</td>
					<td>{{ $map->rounds_played }}</td>
					<td>{{ $map->rounds_won }}</td>
					<td>{{ calculate_ratio($map->rounds_won, $map->rounds_played) }}%</td>
					<td>{{ $map->kills }}</td>
					<td>{{ $map->deaths }}</td>
					<td>{{ calculate_ratio($map->kills, $map->deaths, false) }}</td>
					<td>{{ $map->hs }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
</table>
@endsection
