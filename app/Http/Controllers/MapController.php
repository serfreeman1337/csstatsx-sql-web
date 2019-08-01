<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class MapController extends Controller
{
    public function index()
    {
        $maps_time = DB::query()->fromSub(function ($mt) { // sum maps sessions time
            $mt->fromSub(function ($st) { // count sessions time
                $st->from(with(new \App\Map)->getTable())
                    ->select('map', DB::raw('TIME_TO_SEC(TIMEDIFF(MAX(last_join), MIN(first_join))) as connection_time'))
                    ->groupBy('session_id');
            }, 'st')->select('map', DB::raw('sum(connection_time) as connection_time'))
                    ->groupBy('map');
        }, 'mt');

        $table = with(new \App\Map)->getTable();

        $maps = \App\Map::
            from("{$table} as maps")
            ->leftJoinSub($maps_time, 'maps_time', function($join) {
                $join->on('maps.map', '=', 'maps_time.map');
            })
            ->select(
                'maps.map',
                'maps_time.connection_time',
                DB::raw('sum(kills) as kills'),
                DB::raw('sum(hs) as hs')
            )
            ->groupBy('maps.map')
            ->orderBy('kills', 'desc')
            ->get();

        return view('maps.index', [
            'maps' => $maps,
            'total_kills' => $maps->sum('kills'),
            'total_hs' => $maps->sum('hs'),
            'total_time' => $maps->sum('connection_time')
        ]);
    }

    public function show($map)
    {
        $per_page = 20;

        $stats = \App\Map::select(DB::raw('sum(kills) as total_kills'), DB::raw('sum(hs) as total_hs'))
                        ->where('map', $map)
                        ->first();

        $maps = \App\Map::select('player_id', DB::raw('sum(kills) as kills'), DB::raw('sum(deaths) as deaths'), DB::raw('sum(hs) as hs'))
                        ->where('map', $map)
                        ->groupBy('player_id')
                        ->orderByRaw('sum(kills) desc')
                        ->paginate($per_page);

        return view('maps.show', [
            'maps' => $maps,
            'map' => $map,
            'total_kills' => $stats->total_kills,
            'total_hs' => $stats->total_hs
        ]);
    }
}
