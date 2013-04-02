<?php

namespace DsGame\Controllers\Admin;

use View;

class DashboardController extends BaseController
{

    public function showIndex()
    {
        return View::make('dsgame::admin.index');
    }
}

