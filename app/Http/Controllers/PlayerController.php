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

			return view('player', [
				'player' => $p,
				'stats_num' => \App\Players::count()
			]);
    }
}
