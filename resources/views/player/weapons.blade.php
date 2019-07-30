@extends('player.view')

@section('stats')
<table class="table table-bordered table-sm">
	<thead>
		<tr>
			<th>Weapon</th>
			<th>Kills</th>
			<th>Headshots</th>
			<th>Shots</th>
			<th>Hits</th>
			<th>Accuracy</th>
			<th>Damage</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($weapons as $weapon)
		<tr>
			<td>{{ $weapon->weapon }}</td>
			<td>{{ $weapon->kills }}</td>
			<td>{{ $weapon->hs }}</td>
			<td>{{ $weapon->shots }}</td>
			<td>{{ $weapon->hits }}</td>
			<td>{{ $weapon->accuracy }}</td>
			<td>{{ $weapon->dmg }}</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection
