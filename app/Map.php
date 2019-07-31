<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
	public $timestamps = false;

	public function __construct()
	{
		$this->table = env('CSSTATS_SQL_TABLE', 'csstats').'_maps';
	}

	public function player()
	{
		return $this->belongsTo('App\Player', 'player_id', 'id');
	}

	public function getRoundsPlayedAttribute()
	{
		return ($this->roundt + $this->roundct);
	}

	public function getRoundsWonAttribute()
	{
		return ($this->wint + $this->winct);
	}

	public function getWinRateAttribute()
	{
		return ($this->rounds_won) ? number_format(($this->rounds_won / $this->rounds_played) * 100.0, 2) : '0.00';
	}

	public function getKdAttribute()
	{
		if(!$this->deaths) {
			return $this->kills;
		}

		return number_format(($this->kills / $this->deaths), 2);
	}
}
