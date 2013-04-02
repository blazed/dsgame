@extends('dsgame::layout.main')

@section('content')
<div class="page-header">
  <h1>Planet Overview <small>Planet name</small></h1>
</div>

<div class="row">
  <div class="span3">
    <span>Planet::getResource(Auth::user()->last_planet_id, '1') }}}/100</span>
    <div class="progress" style="width: 90px; height: 5px;">
      <div class="bar bar-warning" style="width: 83%;"></div>
    </div>
  </div>

  <div class="span3">
    <small>Planet::getResource(Auth::user()->last_planet_id, '2') }}}/1000</small>
    <div class="progress"  style="width: 90px; height: 5px;">
      <div class="bar bar-success" style="width: 75%;"></div>
    </div>
  </div>

  <div class="span3">
    <small>30/100</small>
    <div class="progress" style="width: 90px; height: 5px;">
      <div class="bar bar-success" style="width: 30%";></div>
    </div>
  </div>

  <div class="span3">
    <small>100/100</small>
    <div class="progress" style="width: 90px; height: 5px;">
      <div class="bar bar-danger" style="width: 100%";></div>
    </div>
  </div>

</div>

<div class="row">
  <div class="span3">
    <p><a href="#">Resource #1 (level)</a></p>
  </div>
  
  <div class="span3">
<p><a href="#">Resource #2 (level)</a></p>
  </div>

  <div class="span3">
   <p> <a href="#">Resource #3 (level)</a></p>
  </div>

  <div class="span3">
    <p><a href="#">Resouce #4 (level)</a></p>
  </div>

  <div class="alert alert-success span3 offset8">
    <p><strong>Troops Table</strong></p>
@foreach ($troops as $troop)
    <p>{{{ $troop->troop_id }}} ({{{ $troop->number }}}) ({{{ $troop->wounded }}})</p>
@endforeach
    <p>
    @if ($colonel > 1)
      {{{ $colonel }}} Colonels
    @elseif ($colonel == 1)
      1 Colonel
    @endif
      
  </div>

  <div class="alert span3 offset8">
    <p><strong>Resource Table</strong></p>
    <div class="row">
      <div class="span2">
        <p>Resource #1: tot</p>
        <p>Resource #2: tot</p>
        <p>Resource #3: tot</p>
        <p>Resource #4: tot</p>
      </div>
    </div>
  </div>

  <div class="alert alert-info span3 offset8">
    <p><strong>Reinforcement Table</strong></p>
    <p>Reinf. troop #1 (num)</p>
  </div>
</div>
<div id="testasd"></div>
<span id="timers" data-countdown="2013/03/16 15:03:02">asdf</span>
<span id="timers" data-countdown="03/14/2013 02:48:00"></span>
@stop
