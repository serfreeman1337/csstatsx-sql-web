<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers;

class PlayerController extends Controller
{
    public function view($authid)
    {
    	$player = \App\Players::findByAuthId($authid)->first();

			if(!$player) {
				abort(404);
			}

			return view('player.overall', [
				'player' => $player,
				'stats_num' => \App\Players::count()
			]);
    }

		public function weapons($authid)
		{
			$player = \App\Players::findByAuthId($authid)->first();

			if(!$player) {
				abort(404);
			}

			$weapons = $player->weapons()
				->orderBy('kills', 'desc')
				->get();

			return view('player.weapons', [
				'player' => $player,
				'weapons' => $weapons,
				'stats_num' => \App\Players::count()
			]);
		}

		public function maps($authid)
		{
			$player = \App\Players::findByAuthId($authid)->first();

			if(!$player) {
				abort(404);
			}

			$maps = $player->maps()
				->groupBy('map')
				->orderBy('connection_time', 'DESC')
				->get();

			return view('player.maps', [
				'player' => $player,
				'maps' => $maps,
				'stats_num' => \App\Players::count()
			]);
		}
}
