<?php

Route::filter('sentry', function()
{
	if (!Sentry::check()) {
		return Redirect::route('login');
	}
});

/*Route::filter('admin', function()
{
	$user = Sentry::getUserProvider()->findById(Sentry::getUser()->id);
	if (!Sentry::check()) {

	}
});
*/