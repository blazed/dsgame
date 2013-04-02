@extends('dsgame::layout.main')

@section('content')

<h1>Stats</h1>
<ul class="nav nav-tabs">
  <li>
    <a href="{{ URL::route('stats', array('stats' => 'players')) }}">Players</a>
  </li>
  <li class="active">
    <a href="{{ URL::route('stats', array('stats' => 'planets')) }}">Planets</a>
  </li>
  <li>
    <a href="{{ URL::route('stats', array('stats' => 'colonels')) }}">Colones</a>
  </li>
</ul>
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Planet</th>
      <th>Player</th>
      <th>Population</th>
      <th>Coordinates</th>
    </tr>
  </thead>

  <tr>

@foreach ($planets as $planet)
    <td>{{{ DsStats::getPlanetRank($planet->user_id) }}}</td>
    <td>{{{ $planet->name }}}</td>
    <td class="text-center">{{{ DsUser::find($planet->user_id)->username }}}</td>
    <td class="text-center">{{{ $planet->workers }}}</td>
    <td class="text-center">{{{ $planet->x }}} | {{{ $planet->y }}}</td>
  </tr>
@endforeach
</table>
{{ $planets->links() }}
@stop
