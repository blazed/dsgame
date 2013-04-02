    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <div class="nav-collapse">
            <ul class="nav">
              {{-- <li><a href="{{ URL::route('home') }}">Home</a></li> --}}
              @if(Sentry::check())
              <li><a href="{{ URL::route('overview') }}">Overview</a></li>
              <li><a href="#">Center</a></li>
              <li><a href="#">Universe</a></li>
              <li><a href="{{ URL::route('stats') }}">Statistics</a></li>
              @else
              <li><a href="{{ URL::route('index') }}">Home</a></li>
              <li><a href="{{ URL::route('register') }}">Register</a></li>
              <li><a href="{{ URL::route('login') }}">Login</a></li>
              @endif
            </ul>
            @if(Sentry::check())
            <ul class="nav pull-right">
              <li><a href="#"><i class="icon-comment"></i>&nbsp;&nbsp;Messages&nbsp;&nbsp;<span class="label label-important">4 new</span></a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-bullhorn"></i>&nbsp;&nbsp;Latest reports&nbsp;&nbsp;<span class="label label-important">2031</span></a>
                <ul class="dropdown-menu">
                  <li><a href="#"><i class="icon-comment"></i>Successful attack<time class="time timeago mytooltip" datetime="2013-03-26T01:53:28+0100">time ago</time></a></li>
                  <li><a href="#"><i class="icon-lock"></i>Failed attack<abbr class="time timeago" title="2013-01-21T14:12:54Z">time ago</abbr></a></li>
                  <li><hr><a href="#" class="dropdown-menu-footer">
                    <span class="footer"><i class="icon-eye-open"></i>&nbsp;&nbsp;View all reports</span></a>
                  </li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon-user"></i>&nbsp;&nbsp;{{ Sentry::getUser()->username }}&nbsp;&nbsp;<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="{{ URL::route('player') }}"><i class="icon-file"></i>&nbsp;&nbsp;Overview</a></li>
                  <li><a href="{{ URL::route('player_edit') }}"><i class="icon-key"></i>&nbsp;&nbsp;Edit Profile</a></li>
                  {{-- <li><a href="{{ URL::route('player_account') }}"><i class="icon-book"></i>&nbsp;&nbsp;Account</a></li> --}}
                </ul>
              </li>
              <li><a href="{{ URL::route('logout') }}"><i class="icon-lock"></i>&nbsp;&nbsp;Logout</a></li>
            </ul>
            @endif
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

