@extends('layout')

@section('title', __('Maps'))
@section('content')
<div class="card">
    <div class="card-body">
        <div class="card-title">
            <span class="h2">@lang('Maps')</span>
            <div class="clear-fix"></div>
            <span class="h6">@lang('From a total of <strong>:kills</strong> kills with <strong>:hs</strong> headshots', ['kills' => $total_kills, 'hs' => $total_hs])</span>
        </div>

        <div class="row">
            <div class="col">
                <table class="table table-bordered table-sm text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('Map')</th>
                            <th>@lang('Time')</th>
                            <th>@lang('Time') %</th>
                            <th>@lang('Kills')</th>
                            <th>@lang('Kills') %</th>
                            <th>@lang('Hs')</th>
                            <th>@lang('Hs') %</th>
                            <th>@lang('Hpk')</th>
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
