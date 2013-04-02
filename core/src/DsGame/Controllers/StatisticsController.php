<?php

namespace DsGame\Controllers;

use DsGame\Models\Planet;
use DsGame\Models\Stats;
use DsGame\Models\User;
use DB;
use Input;
use View;

class StatisticsController extends BaseController 
{

	public function getStatsView($stats = null)
	{
		if (is_null($stats)) {
            $stats = 'players';
        }
        $test = Stats::getUserRank('12');
        if ($stats == 'players') {
            $users = User::where('race', '!=', '5')->orderBy('population', 'desc')->paginate(20);

            return View::make('dsgame::stats.players.overview')->with('users', $users);
        } elseif ($stats == 'planets') 
        {
            $planets = Planet::where('race_id', '!=', '5')
                ->orderBy('workers', 'desc')
                ->paginate(20);
           
            return View::make('dsgame::stats.planets.view')
            ->with('planets', $planets);
        }
        elseif ($stats == 'colonels')
        {
            $colonels = DB::table('colonels')
                ->orderBy('experience', 'desc')
                ->paginate(20);

            return View::make('dsgame::stats.colonels.view')
                ->with('colonels', $colonels);
        }
        elseif ($stats == 'general')
        {
            $users = DB::table('users');
            
            return View::make('dsgame::stats.general')
                ->with('users', $users);
        }
	}
}
