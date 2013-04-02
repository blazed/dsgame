@extends('dsgame::layout.main')

@section('content')

<h1>Stats</h1>
<ul class="nav nav-tabs">
  <li>
    <a href="{{ URL::route('stats', array('stats' => 'players')) }}">Players</a>
  </li>
  <li>
    <a href="{{ URL::route('stats', array('stats' => 'planets')) }}">Planets</a>
  </li>
  <li  class="active">
    <a href="{{ URL::route('stats', array('stats' => 'colonels')) }}">Colones</a>
  </li>
</ul>
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Player</th>
      <th>Level</th>
      <th>Experience</th>
    </tr>
  </thead>

  <tr>

@foreach ($colonels as $colonel)
    <td>{{{ DsStats::getColonelRank($colonel->user_id) }}}.</td>
    <td><a href="{{{ URL::route('player', array('id' => $colonel->user_id)) }}}">{{{ DsUser::find($colonel->user_id)->username }}}</a></td>
    <td class="text-center">{{{ DsColonel::calculateLevel($colonel->experience) }}}</td>
    <td class="text-center">{{{ $colonel->experience }}}</td>
  </tr>
@endforeach
</table>
{{ $colonels->links() }}
@stop
