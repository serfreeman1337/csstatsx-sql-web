@extends('players.layout')

@section('title', $player->name.' - '.__('Maps'))
@section('stats')
<div class="row">
    <div class="col">
        <table class="table table-bordered table-sm text-center">
            <thead>
                <tr>
                    <th>@lang('Map')</th>
                    <th>@lang('Time')</th>
                    <th>@lang('Rounds')</th>
                    <th>@lang('Rounds Won')</th>
                    <th>@lang('Win Rate')</th>
                    <th>@lang('Kills')</th>
                    <th>@lang('Deaths')</th>
                    <th>@lang('K/D')</th>
                    <th>@lang('HS')</th>
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
