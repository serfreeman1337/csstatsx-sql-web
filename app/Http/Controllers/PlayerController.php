<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{
    public function index()
    {
        $per_page = 20;

        $players = \App\Player::select('*', DB::raw(\App\Player::getRankFormula().' as s'))
                    ->orderBy('s', 'desc')
                    ->paginate($per_page);

        return view('players.index', [
            'players' => $players
        ]);
    }

    public function show($authid)
    {
        $player = \App\Player::findByAuthId($authid)->first();

        if (!$player) {
            abort(404);
        }

        return view('players.show', [
            'player' => $player,
            'stats_num' => \App\Player::count()
        ]);
    }
}
