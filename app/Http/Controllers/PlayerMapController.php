<?php

namespace App\Http\Controllers;

class PlayerMapController extends Controller
{
    public function index($authid)
    {
        $player = \App\Player::findByAuthId($authid)->first();

        if (!$player) {
            abort(404);
        }

        $maps = $player->maps()
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
