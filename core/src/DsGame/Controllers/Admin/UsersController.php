<?php

namespace DsGame\Controllers\Admin;

use DsGame\Models\User;
use Sentry;
use View;

class UsersController extends BaseController
{

    public function showIndex()
    {
    	//$users = Sentry::getUserProvider()->findAll();
        $users = User::where('race', '!=', '5')->orderBy('username', 'asc')->paginate(20);

        return View::make('dsgame::admin.users.index')
                    ->with('users', $users);
    }
}

