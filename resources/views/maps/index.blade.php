@extends('layout')
@section('title', 'Maps Stats - ')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="card-title">
            <span class="h2">Maps</span>
            <div class="clear-fix"></div>
            <span class="h6">From a total of <strong>{{ $total_kills }}</strong> kills with <strong>{{ $total_hs }}</strong> headshots</span>
        </div>

        <div class="row">
            <div class="col">
                <table class="table table-bordered table-sm text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Map</th>
                            <th>Time</th>
                            <th>Time %</th>
                            <th>Kills</th>
                            <th>Kills %</th>
                            <th>Hs</th>
                            <th>Hs %</th>
                            <th>Hpk</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($maps as $pos => $map)
                        <tr>
                            <td>{{ ($pos+1) }}</td>
                            <td><a href="{{ route('maps.show', ['map' => $map->map]) }}">{{ $map->map }}</a></td>
                            <td>{{ $map->connection_time }}</td>
                            <td>
                                {!! bootstrap_progress([
                                    ['num' => $map->connection_time, 'of' => $total_time]
                                ], ['center_val' => true]) !!}
                            </td>
                            <td>{{ $map->kills }}</td>
                            <td>
                                {!! bootstrap_progress([
                                    ['num' => $map->kills, 'of' => $total_kills]
                                ], ['center_val' => true]) !!}
                            </td>
                            <td>{{ $map->hs }}</td>
                            <td>
                                {!! bootstrap_progress([
                                    ['num' => $map->hs, 'of' => $total_hs]
                                ], ['center_val' => true]) !!}
                            </td>
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
</div>
@endsection
