<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weapon extends Model
{
  public $timestamps = false;

	public function __construct()
	{
		$this->table = env('CSSTATS_SQL_TABLE', 'csstats').'_weapons';
	}

	public function player()
	{
		return $this->belongsTo('App\Player', 'player_id', 'id');
	}
}
