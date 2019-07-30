<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class WeaponsController extends Controller
{
  public function view()
  {
		$weapons = \App\Weapons::select('weapon', DB::raw('sum(kills) as kills'), DB::raw('sum(hs) as hs'))
			->groupBy('weapon')
			->orderBy('kills', 'desc')
			->get();

		return view('weapons.view', [
			'weapons' => $weapons,
			'total_kills' => $weapons->sum('kills'),
			'total_hs' => $weapons->sum('hs')
		]);
  }

	public function players($weapon)
	{
		$per_page = 20;
		$weapons = \App\Weapons::where('weapon', $weapon)->orderBy('kills', 'desc')->paginate($per_page);

		return view('weapons.players', [
			'weapons' => $weapons,
			'total_kills' => $weapons->sum('kills'),
			'total_hs' => $weapons->sum('hs')
		]);
	}
}
