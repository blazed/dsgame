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

}

