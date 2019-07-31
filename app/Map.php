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
}
