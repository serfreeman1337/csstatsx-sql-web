<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class PlayerMapController extends Controller
{
    public function index($authid)
    {
        $player = \App\Player::findByAuthId($authid)->first();

        if (!$player) {
            abort(404);
        }

        $maps = $player->maps()
                        ->select(
                            'map',
                            DB::raw('sum(roundt) as roundt'),
                            DB::raw('sum(roundct) as roundct'),
                            DB::raw('sum(wint) as wint'),
                            DB::raw('sum(winct) as winct'),
                            DB::raw('sum(kills) as kills'),
                            DB::raw('sum(deaths) as deaths'),
                            DB::raw('sum(hs) as hs'),
                            DB::raw('sum(connection_time) as connection_time')
                        )
                        ->groupBy('map')
                        ->orderBy('connection_time', 'DESC')
                        ->get();

        return view('players.maps.index', [
            'player' => $player,
            'maps' => $maps,
            'stats_num' => \App\Player::count()
        ]);
    }
}
