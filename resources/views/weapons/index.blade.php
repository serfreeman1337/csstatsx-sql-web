@extends('layout')
@section('title', __('Weapons'))

@section('content')
<div class="card">
    <div class="card-body">
        <div class="card-title">
            <span class="h2">@lang('Weapons')</span>
            <div class="clear-fix"></div>
            <span class="h6">@lang('From a total of <strong>:kills</strong> kills with <strong>:hs</strong> headshots', ['kills' => $total_kills, 'hs' => $total_hs])</span>
        </div>

        <div class="row">
            <div class="col">
                <table class="table table-bordered table-sm text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('Weapon')</th>
                            <th>@lang('Kills')</th>
                            <th style="width: 100px;">@lang('Kills') %</th>
                            <th>@lang('Headshots')</th>
                            <th style="width: 100px;">@lang('Headshots') %</th>
                            <th style="width: 100px;">@lang('Hpk')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($weapons as $pos => $weapon)
                        <tr>
                            <td>{{ ($pos+1) }}</td>
                            <td><a href="{{ route('weapons.show', ['weapon' => $weapon->weapon]) }}">{{ $weapon->weapon }}</a></td>
                            <td>{{ $weapon->kills }}</td>
                            <td>
                                {!! bootstrap_progress([
                                    ['num' => $weapon->kills, 'of' => $total_kills]
                                ], ['center_val' => true]) !!}
                            </td>
                            <td>{{ $weapon->hs }}</td>
                            <td>
                                {!! bootstrap_progress([
                                    ['num' => $weapon->hs, 'of' => $total_hs]
                                ], ['center_val' => true]) !!}
                            </td>
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
</div>
@endsection
