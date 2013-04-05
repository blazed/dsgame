<?php

namespace DsGame\Controllers;

use DsGame\Models\Planet;
use DsGame\Models\User;
use App;
use Auth;
use Session;
use Sentry;
use View;

class PlayersController extends BaseController
{
	public function getPlayerProfile($user_id = null)
    {
        if (is_null($user_id)) {
            $user_id = Sentry::getUser()->id;
        }

        $user = User::find($user_id);
        $planets = Planet::where('user_id', '=', $user_id)->get();

        return View::make('dsgame::players.profile.overview')->with('user', $user)
            ->with('planets', $planets);
    }
}
