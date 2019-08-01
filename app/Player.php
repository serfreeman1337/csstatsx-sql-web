<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Player extends Model
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

    public static function findByAuthId($authid)
    {
        return Player::where(Player::authField(), $authid);
    }

    public function getRankAttribute()
    {
        if (env('CSSTATS_SQL_RANKFORMULA') == 3) {
            return Player::whereRaw('cast(skill as decimal(12,2)) >= ?', [$this->score])->count();
        }
        return Player::whereRaw(Player::getRankFormula().' >= '.$this->score)->count();
    }

    public function getAuthidAttribute()
    {
        $d = Player::authField();
        return $this->$d;
    }

    public static function getRankFormula()
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
        if ($this->s) {
            return $this->s;
        }

        // uh oh why
        switch (env('CSSTATS_SQL_RANKFORMULA', 0)) {
            case 1:
                return $this->kills;
            case 2:
                return ($this->kills + $this->hs);
            case 3:
                return $this->skill;
            case 4:
                return $this->connection_time;
            default:
                return ($this->kills - $this->deaths - $this->tks);
        }
    }

    public function getRoundsPlayedAttribute()
    {
        return ($this->roundt + $this->roundct);
    }
    public function getRoundsWonAttribute()
    {
        return ($this->winct + $this->wint);
    }

    public function weapons()
    {
        return $this->hasMany('App\Weapon', 'player_id');
    }

    public function maps()
    {
        return $this->hasMany('App\Map', 'player_id');
    }
}
