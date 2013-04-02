@extends('dsgame::layout.main')

@section('content')
{{ $form->open() }}
{{ $form->submit('save') }}
@stop
