<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/game.css') }}">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>

    <script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery.countdown.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery.timeago.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/game.js') }}"></script>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

  </head>

  <body>

    @include('dsgame::layout.nav')
    <div class="container">
      @if(Session::has('message'))
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <h4>Success!</h4>
          {{{ Session::get('message') }}}
        </div>
      @endif
      @if(Session::has('alert'))
        <div class="alert alert-error">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <h4>Error!</h4>
          {{{ Session::get('alert') }}}
        </div>  
      @endif
      <div class="timer">Server Time: <span class="clock">{{{ date('H:i:s') }}}</span></div>
      @yield('content')
    @include('dsgame::layout.footer')
    </div>


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

  </body>
</html>
