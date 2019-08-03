@extends('layout')
@section('title', __('Search'))

@section('content')
<div class="card">
    <div class="card-body">
        <div class="card-title">
            <span class="h2">@lang('Search results')</span>

            <div class="float-right">
                {{ $players->links() }}
            </div>
        </div>

        <div class="card-text">
            <table class="table table-bordered table-sm text-center">
                <thead>
                    <tr>
                        <th scope="col">@lang('SteamID')</th>
                        <th scope="col" class="text-left">@lang('Name')</th>
                        <th scope="col">@lang('Rank')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($players as $player)
                    <tr>
                        <td>{{ $player->steamid }}</td>
                        <td class="text-left"><a href="{{ route('players.show', ['authid' => $player->authid]) }}">{{ $player->name }}</a></td>
                        <td>{{ $player->rank }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
