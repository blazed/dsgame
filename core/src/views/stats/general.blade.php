@extends('dsgame::layout.main')

@section('content')

<h1>General</h1>

<p>Registered Players: {{{ $users->count() }}}</p>
<p>Active Players: </p>
<p>Players Online: </p>

<br />

<p>
Humans: {{{ User::where('race', '=', '1')->count() }}} ({{{ round((User::where('race', '=', '1')->count()/$users->count())*100, 1) }}}%)
</p>

<p>
Exibilister: {{{ User::where('race', '=', '2')->count() }}} ({{{ round((User::where('race', '=', '2')->count()/$users->count())*100, 1) }}}%)
</p>

<p>
Tieodfarer: {{{ User::where('race', '=', '3')->count() }}} ({{{ round((User::where('race', '=', '3')->count()/$users->count())*100, 1) }}}%)
</p>
@stop