@extends('layout')
@section('title', 'Maps Stats - ')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="card-title">
            <span class="h2">{{ $map }} map stats</span>
            <div class="float-right">
                {{ $maps->links() }}
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
                    @foreach ($maps as $pos => $map)
                    <tr>
                        <td>{{ rank_for_top($pos, $maps) }}</td>
                        <td><a href="{{ route('players.show', ['authid' => $map->player->authid]) }}">{{ $map->player->name }}</a></td>
                        <td>{{ $map->player->rank }}</td>
                        <td>{{ $map->kills }}</td>
                        <td>{{ $map->deaths }}</td>
                        <td>
                            {{ calculate_ratio($map->kills, $map->deaths, false) }}
                        </td>
                        <td>{{ $map->hs }}</td>
                        <td>
                            {!! bootstrap_progress([
                                ['num' => $map->hs, 'of' => $map->kills]
                            ], ['center_val' => true]) !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
