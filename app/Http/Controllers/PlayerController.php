<?php

namespace App\Http\Controllers;

class PlayerController extends Controller
{
    public function index()
    {
        return view('players.index')->with('players', \App\Player::top());
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
