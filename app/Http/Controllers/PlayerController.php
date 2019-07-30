<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers;

class PlayerController extends Controller
{
    public function view($authid)
    {
    	$p = \App\Players::findByAuthId($authid)->first();

			if(!$p) {
				abort(404);
			}

			return view('player.overall', [
				'player' => $p,
				'stats_num' => \App\Players::count()
			]);
    }

		public function weapons($authid)
		{
			$p = \App\Players::findByAuthId($authid)->first();

			if(!$p) {
				abort(404);
			}

			return view('player.weapons', [
				'player' => $p,
				'weapons' => $p->weapons()->orderBy('kills', 'desc')->get(),
				'stats_num' => \App\Players::count()
			]);
		}
}
