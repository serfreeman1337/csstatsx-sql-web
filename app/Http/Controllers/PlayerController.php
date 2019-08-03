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

    public function search()
    {
        $q = request()->get('q');

        if (!$q) {
            return redirect()->route('players.index');
        }

        $per_page = 20;
        $results = null;

        // search by steamid
        if (strpos($q, "STEAM_") === 0 || strpos($q, "VALVE_") === 0) {
            $r = \App\Player::where('steamid', '=', $q)->orderBy('last_join', 'asc')->paginate($per_page);

            if ($r->count()) {
                $results = &$r;
            }
        }

        // search by name instead
        if (!$results) {
            $results = \App\Player::where('name', 'like', '%'.$q.'%')->orderBy('last_join', 'asc')->paginate($per_page);
        }

        $results->appends(['q' => $q]);

        return view('players.search', [
            'players' => $results
        ]);
    }
}
