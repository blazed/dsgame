@extends('dsgame::layout.main')

@section('content')
    <ul class="breadcrumb">
    	<li class="active"><strong>Race</strong> <span class="divider">-></span></li>
    	<li><span class="muted">Location</span> <span class="divider">-></span></li>
    	<li><span class="muted">Colonel</span> <span class="divider">-></span></li>
    	<li><span class="muted">Finished</span></li>
    </ul>

<h4>Select a race</h4>

	<form action="{{ route('register_race') }}" method="post" class="labeless">
		<input type="hidden" name="csrf_token" value="{{ csrf_token() }}" />

		@if($errors->first('race'))
        	<div class="alert alert-error">
        	  <button type="button" class="close" data-dismiss="alert">&times;</button>
       	   <h4>Error!</h4>
       	   {{{ $errors->first('race', ':message') }}}
       	 </div>     
      	@endif

		<p>
			<label class="radio">Race 1
				<input type="radio" name="race" id="race1" value="1" />
			</label>
		</p>

		<p>
			<label class="radio">Race 2
				<input type="radio" name="race" id="race2" value="2" />
			</label>
		</p>

		<p>
			<label class="radio">Race 3
				<input type="radio" name="race" id="race3" value="3" />
			</label>
		</p>

		<p>
			<input type="submit" value="Select a race" />
		</p>

	</form>
@stop
