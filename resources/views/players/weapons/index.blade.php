@extends('players.layout')

@section('stats')
<div class="row">
    <div class="col">
        <table class="table table-bordered table-sm text-center">
            <thead>
                <tr>
                    <th>Weapon</th>
                    <th>Kills</th>
                    <th>Headshots</th>
                    <th>Shots</th>
                    <th>Hits</th>
                    <th>Accuracy</th>
                    <th>Damage</th>
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
