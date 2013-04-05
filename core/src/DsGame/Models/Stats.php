<?php

namespace DsGame\Models;

use DsGame\Models\User;
use DB;

class Stats
{

    public static function getUserRank($user_id)
    {
        $rank = DB::table('users')->distinct('id')
            ->where('population', '>', User::find($user_id)->population)
            ->where('race', '!=', '5')
            ->orWhere('population', '=', User::find($user_id)->population)
            ->where('id', '<', $user_id);
        
        return $rank->count()+1;
    }
    // ToDo: fix better rank code.
    public static function getPlanetRank($user_id)
    {
        $ranks = DB::table('planets')->distinct('id')
            ->where('race_id', '!=', '5')
            ->orderBy('workers', 'desc')->get();

        $i = 1;
        $planet_rank = 0;
        foreach ($ranks as $rank) {
            if ($rank->user_id == $user_id) {
                $planet_rank = $i;
            }
            $i++;
        }

        return $planet_rank;
    }

    public static function getColonelRank($user_id)
    {
        $ranks = DB::table('colonels')
            ->distinct('id')
            ->where('experience', '>',  DsColonel::find($user_id)->experience)
            ->orWhere('experience', '=', DsColonel::find($user_id)->experience)
            ->where('user_id', '<', $user_id)
            ->orderBy('experience', 'desc')->get();

        $i = 1;
        $colonel_rank = 0;
        foreach ($ranks as $rank) {
            if ($rank->user_id == $user_id) {
                $colonel_rank = $i;
            }
            $i++;
        }

        return $colonel_rank;
    }

}

