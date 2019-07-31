@extends('players.layout')

@section('stats')
<div class="row">
	<div class="col">
		<table class="table table-bordered table-sm">
			<tbody>
				<tr>
					<td>Skill</td>
					<td>{{ $player->skill }}</td>
				</tr>
				<tr>
					<td>Kills</td>
					<td>{{ $player->kills }}</td>
				</tr>
				<tr>
					<td>Deaths</td>
					<td>{{ $player->deaths }}</td>
				</tr>
				<tr>
					<td>Headshots</td>
					<td>{{ $player->hs }}</td>
				</tr>
				<tr>
					<td>K/D</td>
					<td>{{ calculate_ratio($player->kills, $player->deaths, false) }}</td>
				</tr>
				<tr>
					<td>H/K</td>
					<td>{{ calculate_ratio($player->hs, $player->kills, false) }}</td>
				</tr>
				<tr>
					<td>Damage</td>
					<td>{{ $player->dmg }} HP</td>
				</tr>
				<tr>
					<td>Shots Fired</td>
					<td>{{ $player->shots }}</td>
				</tr>
				<tr>
					<td>Shots Hit</td>
					<td>{{ $player->hits }}</td>
				</tr>
				<tr>
					<td>Shots Accuracy</td>
					<td>
						{{ calculate_ratio($player->hits, $player->shots) }}%
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="col">
		<table class="table table-bordered table-sm">
			<tbody>
				<tr>
					<td>Rounds</td>
					<td>
						{{ $player->rounds_played }} (Win.: {{ $player->rounds_won }}, Loss.: {{ $player->rounds_played - $player->rounds_won }})
					</td>
				</tr>
				<tr>
						<td>Teams</td>
						<td>
							{!! bootstrap_progress([
								['num' => $player->roundct, 'of' => $player->rounds_played, 'print_val' => true, 'tip' => 'top', 'tip_text' => '%ratio% of rounds as CT'],
								['num' => $player->roundt, 'of' => $player->rounds_played, 'class' => 'bg-danger', 'print_val' => true, 'tip' => 'top', 'tip_text' => '%ratio% of rounds as Terrorist']
							]) !!}
						</td>
				</tr>
				<tr>
					<td>Wins</td>
					<td>
						{!! bootstrap_progress([
							['num' => $player->winct, 'of' => $player->rounds_played, 'print_val' => true, 'tip' => 'top', 'tip_text' => '%ratio% of wins as CT'],
							['num' => $player->wint, 'of' => $player->rounds_played, 'class' => 'bg-danger', 'print_val' => true, 'tip' => 'top', 'tip_text' => '%ratio% of wins as Terrorist']
						])
						!!}
					</td>
				</tr>
				<tr>
					<td>Bomb Plants</td>
					<td>{{ $player->bombplants }}</td>
				</tr>
				<tr>
					<td>Bomb Explosions</td>
					<td>{{ $player->bombexplosions }}</td>
				</tr>
				<tr>
					<td>Bomb Defused</td>
					<td>{{ $player->bombdefused }}</td>
				</tr>
				<tr>
					<td>Assists</td>
					<td>{{ $player->assists }}</td>
				</tr>
				<tr>
					<td>Last Connect</td>
					<td>{{ date('j M Y H:i:s', strtotime($player->last_join)) }} (Total: {{ $player->connects }} Connects)</td>
				</tr>
				<tr>
					<td>Connection Time</td>
					<td>{{ $player->connection_time }} seconds</td>
				</tr>
				<tr>
					<td>First Connect</td>
					<td>{{ date('j M Y H:i:s', strtotime($player->first_join)) }}</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
@endsection
