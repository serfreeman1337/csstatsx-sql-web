@extends('layout')
@section('title', $player->name. ' - ')

@section('content')
<div class="card">
	<div class="card-body">
		<div class="card-title">
			<span class="h2">{{ $player->name }}</span>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col">
				<table class="table table-bordered table-sm">
					<tbody>
						<tr>
							<td>Rank</td>
							<td>{{ $player->rank }}</td>
						</tr>
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
							<td>{{ $player->kd }}</td>
						</tr>
						<tr>
							<td>H/K</td>
							<td>{{ $player->hk }}</td>
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
								{{ $player->accuracy }}%
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
								{{ $player->rounds_played }} (Win.: {{ $player->rounds_wins }}, Loss.: {{ $player->rounds_played - $player->rounds_wins }})
							</td>
						</tr>
						<tr>
								<td>Teams</td>
								<td>
									<div class="progress">
									  <div class="progress-bar" role="progressbar"
											style="width: {{ $player->rounds_ratio['as_ct'] }}%;" aria-valuenow="{{ $player->rounds_ratio['as_ct'] }}" aria-valuemin="0" aria-valuemax="100"
											data-toggle="tooltip" data-placement="top" title="{{ $player->rounds_ratio['as_ct'] }}% of rounds as CT">
											{{ $player->roundct }}
										</div>
									  <div class="progress-bar bg-danger" role="progressbar"
											style="width: {{ $player->rounds_ratio['as_t'] }}%;" aria-valuenow="{{ $player->rounds_ratio['as_t'] }}" aria-valuemin="0" aria-valuemax="100"
											data-toggle="tooltip" data-placement="top" title="{{ $player->rounds_ratio['as_t'] }}% of rounds as Terrorist">
											{{ $player->roundt }}
										</div>
									</div>
								</td>
						</tr>
						<tr>
							<td>Wins</td>
							<td>
								<div class="progress">
									@if ($player->win_ratio)
										<div class="progress-bar" role="progressbar"
											style="width: {{ $player->rounds_ratio['win_ct'] }}%;" aria-valuenow="{{ $player->rounds_ratio['win_ct'] }}" aria-valuemin="0" aria-valuemax="100"
											data-toggle="tooltip" data-placement="top" title="{{ $player->rounds_ratio['win_ct'] }}% of wins as CT">
											{{ $player->winct }}
										</div>
										<div class="progress-bar bg-danger" role="progressbar"
											style="width: {{ $player->rounds_ratio['win_t'] }}%;" aria-valuenow="{{ $player->rounds_ratio['win_t'] }}" aria-valuemin="0" aria-valuemax="100"
											data-toggle="tooltip" data-placement="top" title="{{ $player->rounds_ratio['win_t'] }}% of wins as Terrorist">
											{{ $player->wint }}
										</div>
									@endif
								</div>
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
						<tr>
							<td>SteamID</td>
							<td>{{ $player->steamid }}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
