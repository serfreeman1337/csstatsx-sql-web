<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weapons extends Model
{
  public $timestamps = false;

	public function __construct()
	{
		$this->table = env('CSSTATS_SQL_TABLE', 'csstats').'_weapons';
	}

	public function player()
	{
		return $this->belongsTo('App\Players', 'id', 'player_id');
	}

	public function sort()
	{
		return $this->sort('kills', 'desc');
	}

	public function getAccuracyAttribute()
	{
		if(!$this->shots) {
			return 0;
		}

		return number_format(($this->hits / ($this->shots + $this->hits) * 100.0), 2);
	}
}
