<?php

namespace DsGame\Controllers;

use App;
use View;

class HomeController extends BaseController
{

    public function getIndex()
    {
        return View::make('dsgame::index');
    }
}
