@extends('dsgame::admin.layout.main')

@section('content')
<div id="content" class="span10">

  <div class="sortable row-fluid">
    <div class="box-small span2">
      <a data-rel="tooltip" title="55% visists growth." class="box-small-link" href="#">
        <div id="visits-count">1.998.746</div>
      </a>
      <div class="box-small-title">Visits</div>
      <span id="visits-count-n" class="notification">+ 55%</span>
    </div>
  </div>

</div>
@stop
