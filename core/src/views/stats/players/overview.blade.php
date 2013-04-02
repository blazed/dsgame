@extends('dsgame::layout.main')

@section('content')
<h1>Stats</h1>
<ul class="nav nav-tabs">
  <li class="active">
    <a href="{{ URL::route('stats', array('stats' => 'players')) }}">Players</a>
  </li>
  <li>
    <a href="{{ URL::route('stats', array('stats' => 'planets')) }}">Planets</a>
  </li>
  <li>
    <a href="{{ URL::route('stats', array('stats' => 'colonels')) }}">Colones</a>
  </li>
  <li>
    <a href="{{ URL::route('stats', array('stats' => 'general')) }}">General</a>
  </li>
</ul>
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Player</th>
      <th>Alliance</th>
      <th>Population</th>
      <th>Planets</th>
    </tr>
  </thead>

  <tr>

@foreach ($users as $user)
    <td>
      {{{ DsGame\Models\Stats::getUserRank($user->id) }}}
    </td>
    <td>
    <a href="{{ URL::route('player', array('id' => $user->id)) }}">{{{ $user->username }}}</a></td>
    <td class="text-center">
    @if ($user->alliance == '0')
      -
    @else
       {{{ $user->alliance }}}
    @endif</td>
    <td class="text-center">{{{ $user->population }}}</td>
    <td class="text-center">{{{ $user->total_planets }}}</td>
  </tr>
@endforeach
</table>
{{ $users->links() }}
@stop
