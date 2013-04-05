@extends('dsgame::layout.main')

@section('content')
<h1>Player Profile - {{ $user->username }}</h1>
<p>{{{ Lang::get('game.common.rank') }}}: 
@if ($user->race == '5')

@else
  {{{ DsGame\Models\Stats::getUserRank($user->id) }}}
@endif
</p>
<p>{{{ Lang::get('game.common.race') }}}: 
@if($user->race == '1')
    {{{ Lang::get('game.common.races.humans') }}}
@elseif ($user->race == '2')
    {{{ Lang::get('game.common.races.exibilister') }}}
@elseif ($user->race == '3')
    {{{ Lang::get('game.common.races.tieodfarer') }}}
@elseif ($user->race == '5')
    {{{ Lang::get('game.common.races.onelioner') }}}
@endif</p>

<p>{{{ Lang::get('game.common.alliance') }}}:
@if ($user->alliance == '0')
    -
@else
    {{{ $user->alliance }}}
@endif</p>

<p>
{{{ Lang::get('game.common.planets') }}}: {{{ $user->total_planets }}}
</p>

<p>
{{{ Lang::get('game.common.population') }}}: {{{ $user->population }}}
</p>

<h2>Planets</h2>
<table class="table table-condensed">
  <thead>
    <tr>
      <th>Name</th>
      <th>Inhabitants</th>
      <th>Coordinates</th>
    </tr>
  </thead>
  <tbody>
@foreach ($planets as $planet)
  <tr>
    <td>{{{ $planet->name }}}
    @if ($planet->capital == '1')
        <small class="muted">(Capital)</small>
    @endif</td>
    <td>{{{ $planet->workers }}}</td>
    <td>( {{{ $planet->x }}} | {{{ $planet->y }}} )</td>
  </tr>
@endforeach
</table>
@stop
