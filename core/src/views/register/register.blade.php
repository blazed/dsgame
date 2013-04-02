@extends('dsgame::layout.main')

@section('content')

	<h1>{{ trans('dsgame::common.register') }}</h1>

	<form action="{{ route('register') }}" method="post" class="labeless">
		<input type="hidden" name="csrf_token" value="{{ csrf_token() }}" />

		<p>
			<label for="username">Username</label>
			<input type="text" name="username" value="{{ Input::old('username') }}" placeholder="{{ trans('dsgame::common.username') }}" />
			@if($errors->first('username'))
				{{{ $errors->first('username', '<span class="text-error">:message</span>') }}}
			@endif
		</p>

		<p>
			<label for="email">Email</label>
			<input type="email" name="email" value="{{ Input::old('email') }}" placeholder="Your email address" />
			@if($errors->first('email'))
				{{{ $errors->first('email', '<span class="text-error">:message</span>') }}}
			@endif
		</p>

		<p>
			<label for="password">Password</label>
			<input type="password" name="password" placeholder="Password" />
			@if($errors->first('password'))
				{{{ $errors->first('password', '<span class="text-error">:message</span>') }}}
			@endif
		</p>

		<p>
			<label for="password_confirmation">Confirm Password</label>
			<input type="password" name="password_confirmation" placeholder="Confirm Password" />
		</p>

		<p>
			<input type="submit" value="Sign up!" />
		</p>

	</form>
@stop
