<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class WeaponController extends Controller
{
    public function index()
    {
        $weapons = \App\Weapon::select('weapon', DB::raw('sum(kills) as kills'), DB::raw('sum(hs) as hs'))
                                ->groupBy('weapon')
                                ->orderBy('kills', 'desc')
                                ->get();

        return view('weapons.index', [
            'weapons' => $weapons,
            'total_kills' => $weapons->sum('kills'),
            'total_hs' => $weapons->sum('hs')
        ]);
    }

    public function show($weapon)
    {
        $per_page = 20;

        $stats = \App\Weapon::select(DB::raw('sum(kills) as total_kills'), DB::raw('sum(hs) as total_hs'))
                        ->where('weapon', $weapon)
                        ->first();

        $weapons = \App\Weapon::where('weapon', $weapon)->orderBy('kills', 'desc')->paginate($per_page);

        return view('weapons.show', [
            'weapons' => $weapons,
            'weapon' => $weapon,
            'total_kills' => $stats->total_kills,
            'total_hs' => $stats->total_hs
        ]);
    }
}
