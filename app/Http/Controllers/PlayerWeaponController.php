<?php

namespace App\Http\Controllers;

class PlayerWeaponController extends Controller
{
    public function index($authid)
    {
        $player = \App\Player::findByAuthId($authid)->first();

        if (!$player) {
            abort(404);
        }

        $weapons = $player->weapons()
                            ->orderBy('kills', 'desc')
                            ->get();

        return view('players.weapons.index', [
            'player' => $player,
            'weapons' => $weapons,
            'stats_num' => \App\Player::count()
        ]);
    }
}
