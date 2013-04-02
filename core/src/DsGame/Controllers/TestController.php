<?php

namespace DsGame\Controllers;

use DsGame\Models\Config;
use DsGame\Models\User;
use Auth;
use Formly;
use Input;
use Redirect;
use Request;
use Session;
use Sentry;
use Validator;
use View;

/**
 * 
 **/
class TestController extends BaseController
{
	public function createGroups()
	{
		try {
			$group = Sentry::getGroupProvider()->create(array(
				'name' => 'Administrator',
				'permissions' => array(
					'admin'     => 1,
					'moderator' => 1,
					'users'     => 1,
					'pending'   => 0,
				),
			));
		}
		catch (Cartalyst\Sentry\Groups\NameRequiredException $e)
		{
		    echo 'Name field is required';
		}
		catch (Cartalyst\Sentry\Groups\GroupExistsException $e)
		{
		    echo 'Group already exists';
		}
			
	}

	public function addUserToGroup()
	{
		$user = Sentry::getUserProvider()->findByLogin('oxid@darkstar.se');
		$pending = Sentry::getGroupProvider()->findById(2);

		$user->addGroup($pending);


	}
}
