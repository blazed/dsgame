@extends('dsgame::layout.main')

@section('content')
	<div id="system-message-container">
	@if(Session::has('login_errors'))
		<div class="alert">
			<h4 class="alert-heading">Warning</h4>
				<p>Username or password incorrect.</p>
		</div>
	@endif
	</div>

	<form method="post" action="{{ route('login') }}" id="form-login" class="form-inline">
		<fieldset class="loginform">
			<div class="control-group">
				<div class="controls">
					<div class="input-prepend input-append">
						<span class="add-on">
							<i class="icon-user hasTooltip" data-placement="left" data-toggle="hasTooltip" title="{{ trans('dsgame::common.username') }}"></i>
							<label for="username" class="element-invisible"></label>
						</span>
						<input name="username" tabindex="1" id="username" type="text" class="input-medium" placeholder="{{ trans('dsgame::common.username') }}" size="20" />
					</div>
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<div class="input-prepend input-append">
						<span class="add-on">
							<i class="icon-lock hasTooltip" data-placement="left" data-toggle="hasTooltip" title="{{ trans('dsgame::common.password') }}"></i>
							<label for="username" class="element-invisible"></label>
						</span>
						<input name="password" tabindex="2" id="password" type="password" class="input-medium" placeholder="{{ trans('dsgame::common.password') }}" size="20" />
					</div>
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<div class="btn-group pull-left">
						<button tabindex="3" class="btn btn-primary btn-medium"><i class="icon-lock icon-white"></i> {{ trans('dsgame::common.login') }}</button>
					</div>
				</div>
			</div>

			<input type="hidden" name="csrf_token" value="{{ csrf_token() }}" />
		</fieldset>
	</form>

	<p><a href="{{ route('forgot_password') }}">{{ trans('dsgame::login.forgot_pass') }}</a></p>
@stop
