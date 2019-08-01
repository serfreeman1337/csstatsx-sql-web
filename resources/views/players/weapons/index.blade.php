@extends('players.layout')

@section('title', $player->name.' - '.__('Weapons'))
@section('stats')
<div class="row">
    <div class="col">
        <table class="table table-bordered table-sm text-center">
            <thead>
                <tr>
                    <th>@lang('Weapon')</th>
                    <th>@lang('Kills')</th>
                    <th>@lang('Headshots')</th>
                    <th>@lang('Shots')</th>
                    <th>@lang('Hits')</th>
                    <th>@lang('Accuracy')</th>
                    <th>@lang('Damage')</th>
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
                    <td>{{ calculate_ratio($weapon->hits, $weapon->shots) }}%</td>
                    <td>{{ $weapon->dmg }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
