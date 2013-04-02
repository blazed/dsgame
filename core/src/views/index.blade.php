@extends('dsgame::layout.main')

@section('content')
<?php
if (Sentry::Check()) {
	$user = Sentry::getUserProvider()->findByLogin(Sentry::getUser()->email);

	if ($user->hasAccess('pending')) {
		echo 'admin';
	} else {
		echo 'else';
	}
}
?>
@stop