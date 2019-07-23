<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Players extends Model
{
	public $timestamps = false;

	public function __construct()
	{
		$this->table = env('CSSTATS_SQL_TABLE', 'csstats');
	}

	public static function authField()
	{
			$a = ['name', 'steamid', 'ip'];
			return $a[env('CSSTATS_RANK', 0)];
	}

	public static function top()
	{
		$per_page = 20;

		$r = Players::select('*');
		$r->addSelect(DB::raw(Players::getRankFormula().' as s'));

		// - for pagination "ranking" -
		$page = (int)request('page') - 1;
		if($page < 0) {
			$page = 0;
		}
		DB::statement("set @r = ".($per_page * $page));
		$r->addSelect(DB::raw('@r := @r + 1 r'));
		// - - //

		$r->orderBy('s', 'desc');

		return $r->paginate($per_page);
	}

	public static function findByAuthId($authid)
	{
		return Players::where(Players::authField(), $authid);
	}

	public function getRankAttribute()
	{
		if($this->r) return $this->r;

		return Players::whereRaw(Players::getRankFormula().' >= '.$this->score)->count();
	}

	public function getAuthidAttribute()
	{
		$d = Players::authField();
		return $this->$d;
	}

	private static function getRankFormula()
	{
		$rank_formula = [
			'(kills-deaths-tks)',
			'kills',
			'(kills+hs)',
			'skill',
			'connection_time',
		];

		return $rank_formula[env('CSSTATS_SQL_RANKFORMULA', 0)];
	}

	public function getScoreAttribute()
	{
		if($this->s) return $this->s;

		// uh oh why
		switch(env('CSSTATS_SQL_RANKFORMULA', 0))
		{
			case 1: return $this->kills;
			case 2: return ($this->kills + $this->hs);
			case 3: return $this->skill;
			case 4: return $this->connection_time;
			default: return ($this->kills - $this->deaths - $this->tks);
		}
	}

	public function getKdAttribute()
	{
		if(!$this->deaths) {
			return $this->kills;
		}

		return number_format(($this->kills / $this->deaths), 2);
	}

	public function getHkAttribute()
	{
		if(!$this->kills) {
			return $this->hs;
		}

		return number_format(($this->hs / $this->kills), 2);
	}

	public function getAccuracyAttribute()
	{
		if(!$this->shots) {
			return 0;
		}

		return number_format(($this->hits / ($this->shots + $this->hits) * 100.0), 2);
	}

	public function getRoundsPlayedAttribute()
	{
		return ($this->roundt + $this->roundct);
	}
	public function getRoundsWinsAttribute()
	{
		return ($this->winct + $this->wint);
	}

	public function getWinRatioAttribute()
	{
		return ($this->rounds_wins) ? number_format(($this->rounds_wins / $this->rounds_played) * 100.0, 2) : 0.00;
	}

	public function getRoundsRatioAttribute()
	{
		$wr = $this->win_ratio;
		$r = [
			'as_t' => 0.00,
			'as_ct' => 0.00,
			'win_t' => 0.00,
			'win_ct' => 0.00
		];

		if($this->rounds_played)
		{
			$r['as_t'] = number_format(($this->roundt / $this->rounds_played) * 100.0, 2);
			$r['as_ct'] = number_format(($this->roundct / $this->rounds_played) * 100.0, 2);
		}

		if($this->rounds_wins)
		{
			$r['win_t'] = number_format(($this->wint / $this->rounds_played) * 100.0, 2);
			$r['win_ct'] = number_format(($this->winct / $this->rounds_played) * 100.0, 2);
		}

		return $r;
	}
}
