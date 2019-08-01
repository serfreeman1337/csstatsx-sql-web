@extends('layout')
@section('title', __('Players'))

@section('content')
<div class="card">
    <div class="card-body">
        <div class="card-title">
            <span class="h2">@lang('Top Players')</span>

            <div class="float-right">
                {{ $players->links() }}
            </div>
        </div>

        <div class="card-text">
            <table class="table table-bordered table-sm text-center">
                <thead>
                    <tr>
                        <th scope="col">@lang('Rank')</th>
                        <th scope="col" class="text-left">@lang('Name')</th>
                        <th scope="col">@lang('Skill')</th>
                        <th scope="col">@lang('Kills')</th>
                        <th scope="col">@lang('Deaths')</th>
                        <th scope="col">@lang('Headshots')</th>
                        <th scope="col">@lang('K/D')</th>
                        <th scope="col">@lang('Last Connect')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($players as $pos => $player)
                    <tr>
                        <th scope="row">{{ rank_for_top($pos, $players) }}</th>
                        <td class="text-left"><a href="{{ route('players.show', ['authid' => $player->authid]) }}">{{ $player->name }}</a></td>
                        <td>{{ $player->skill }}</td>
                        <td>{{ $player->kills }}</td>
                        <td>{{ $player->deaths }}</td>
                        <td>{{ $player->hs }}</td>
                        <td>{{ calculate_ratio($player->kills, $player->deaths, false) }}</td>
                        <td>{{ $player->last_join }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
