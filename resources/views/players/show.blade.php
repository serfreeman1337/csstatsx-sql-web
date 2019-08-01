@extends('players.layout')

@section('title', $player->name)
@section('stats')
<div class="row">
    <div class="col">
        <table class="table table-bordered table-sm">
            <tbody>
                <tr>
                    <td>@lang('Skill')</td>
                    <td>{{ $player->skill }}</td>
                </tr>
                <tr>
                    <td>@lang('Kills')</td>
                    <td>{{ $player->kills }}</td>
                </tr>
                <tr>
                    <td>@lang('Deaths')</td>
                    <td>{{ $player->deaths }}</td>
                </tr>
                <tr>
                    <td>@lang('Headshots')</td>
                    <td>{{ $player->hs }}</td>
                </tr>
                <tr>
                    <td>@lang('K/D')</td>
                    <td>{{ calculate_ratio($player->kills, $player->deaths, false) }}</td>
                </tr>
                <tr>
                    <td>@lang('H/K')</td>
                    <td>{{ calculate_ratio($player->hs, $player->kills, false) }}</td>
                </tr>
                <tr>
                    <td>@lang('Damage')</td>
                    <td>{{ $player->dmg }} HP</td>
                </tr>
                <tr>
                    <td>@lang('Shots Fired')</td>
                    <td>{{ $player->shots }}</td>
                </tr>
                <tr>
                    <td>@lang('Shots Hit')</td>
                    <td>{{ $player->hits }}</td>
                </tr>
                <tr>
                    <td>@lang('Shots Accuracy')</td>
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
                    <td>@lang('Rounds')</td>
                    <td>
                        {{ $player->rounds_played }} (@lang('Win.'): {{ $player->rounds_won }}, @lang('Loss.'): {{ $player->rounds_played - $player->rounds_won }})
                    </td>
                </tr>
                <tr>
                    <td>@lang('Teams')</td>
                    <td>
                        {!! bootstrap_progress([
                            [
                                'num' => $player->roundct,
                                'of' => $player->rounds_played,
                                'print_val' => true,
                                'tip' => 'top',
                                'tip_text' => __('%ratio% as CT')
                            ],
                            [
                                'num' => $player->roundt,
                                'of' => $player->rounds_played,
                                'class' => 'bg-danger',
                                'print_val' => true,
                                'tip' => 'top',
                                'tip_text' => __('%ratio% as Terrorist')
                            ]
                        ]) !!}
                    </td>
                </tr>
                <tr>
                    <td>@lang('Wins')</td>
                    <td>
                        {!! bootstrap_progress([
                            [
                                'num' => $player->winct,
                                'of' => $player->rounds_played,
                                'print_val' => true,
                                'tip' => 'top',
                                'tip_text' => __('%ratio% as CT')
                            ],
                            [
                                'num' => $player->wint,
                                'of' => $player->rounds_played,
                                'class' => 'bg-danger',
                                'print_val' => true,
                                'tip' => 'top',
                                'tip_text' => __('%ratio% as Terrorist')
                            ]
                        ]) !!}
                    </td>
                </tr>
                <tr>
                    <td>@lang('Bomb Plants')</td>
                    <td>{{ $player->bombplants }}</td>
                </tr>
                <tr>
                    <td>@lang('Bomb Explosions')</td>
                    <td>{{ $player->bombexplosions }}</td>
                </tr>
                <tr>
                    <td>@lang('Bomb Defused')</td>
                    <td>{{ $player->bombdefused }}</td>
                </tr>
                <tr>
                    <td>@lang('Assists')</td>
                    <td>{{ $player->assists }}</td>
                </tr>
                <tr>
                    <td>@lang('Last Connect')</td>
                    <td>{{ date('j M Y H:i:s', strtotime($player->last_join)) }} (@lang('Total: :connects Connects', ['connects' => $player->connects]))</td>
                </tr>
                <tr>
                    <td>@lang('Connection Time')</td>
                    <td>{{ $player->connection_time }} seconds</td>
                </tr>
                <tr>
                    <td>@lang('First Connect')</td>
                    <td>{{ date('j M Y H:i:s', strtotime($player->first_join)) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
