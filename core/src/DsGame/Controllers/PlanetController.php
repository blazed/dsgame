<?php

namespace DsGame\Controllers;

use DsGame\Models\Colonel;
use DsGame\Models\Troop;
use DsGame\Models\User;
use App;
use Auth;
use Session;
use Sentry;
use View;

class PlanetController extends BaseController
{

    public function getOverview()
    {
        $user_id = Sentry::getUser()->getId();
        $planet_id = Session::get('planet_id');

        $colonel = Colonel::where('dead', '=', '0')
                        ->where('planet_id', '=', Session::get('planet_id'))->count();

        $troops = Troop::where('planet_id', '=', $planet_id)
                    ->get();

        return View::make('dsgame::planet.overview')
                    ->with('colonel', $colonel)
                    ->with('troops', $troops);
    }
}

