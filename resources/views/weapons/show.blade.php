@extends('layout')

@section('title', __('Weapons').' - '.$weapon)
@section('content')
<div class="card">
    <div class="card-body">
        <div class="card-title">
            <span class="h2">@lang('Top players with :weapon', ['weapon' => $weapon])</span>
            <div class="float-right">
                {{ $weapons->links() }}
            </div>
            <div class="clear-fix"></div>
            <span class="h6">@lang('From a total of <strong>:kills</strong> kills with <strong>:hs</strong> headshots', ['kills' => $total_kills, 'hs' => $total_hs])</span>
        </div>

        <div class="card-text">
            <table class="table table-bordered table-sm text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>@lang('Player')</th>
                        <th>@lang('Rank')</th>
                        <th>@lang('Kills')</th>
                        <th>@lang('Deaths')</th>
                        <th>@lang('Kpd')</th>
                        <th>@lang('Hs')</th>
                        <th style="width: 100px;">@lang('Hpk')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($weapons as $pos => $weapon)
                    <tr>
                        <td>{{ rank_for_top($pos, $weapons) }}</td>
                        <td><a href="{{ route('players.show', ['authid' => $weapon->player->authid]) }}">{{ $weapon->player->name }}</a></td>
                        <td>{{ $weapon->player->rank }}</td>
                        <td>{{ $weapon->kills }}</td>
                        <td>{{ $weapon->deaths }}</td>
                        <td>
                            {{ calculate_ratio($weapon->kills, $weapon->deaths, false) }}
                        </td>
                        <td>{{ $weapon->hs }}</td>
                        <td>
                            {!! bootstrap_progress([
                                ['num' => $weapon->hs, 'of' => $weapon->kills]
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
