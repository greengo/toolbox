<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->

                    @if(Auth::user())
                    <ul class="nav navbar-nav">
                      <li class="dropdown">
              					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Features <span class="caret"></span></a>
              					<ul class="dropdown-menu" role="menu">
              						<li {{ (Request::is('features*') ? 'class="active"' : '') }}><a href="{{ action('\\Greengo\Http\Controllers\FeaturesController@index') }}">All</a></li>
              						{{--
              						<li><a href="#">Accepted</a></li>
              						<li><a href="#">Postponed</a></li>
              						<li><a href="#">Rejected</a></li>
              						<li class="divider"></li>
              						<li><a href="#">In Progress</a></li>
              						<li><a href="#">Finished</a></li>
              						--}}
              						<li class="divider"></li>
              						<li {{ (Request::is('features.create*') ? 'class="active"' : '') }}><a href="{{ action('\\Greengo\Http\Controllers\FeaturesController@create') }}">Suggest Feature</a></li>
              					</ul>
              				</li>

                      <li class="dropdown">
              					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Bugs <span class="caret"></span></a>
              					<ul class="dropdown-menu" role="menu">
                          <li {{ (Request::is('bugs*') ? 'class="active"' : '') }}><a href="{{ action('\\Greengo\Http\Controllers\BugsController@index') }}">Open</a></li>
              						<li {{ (Request::is('bugs*') ? 'class="active"' : '') }}><a href="{{ action('\\Greengo\Http\Controllers\BugsController@indexPending') }}">Pending Approval</a></li>
              						<li {{ (Request::is('bugs*') ? 'class="active"' : '') }}><a href="{{ action('\\Greengo\Http\Controllers\BugsController@indexClosed') }}">Closed</a></li>
              						<li class="divider"></li>
              						<li {{ (Request::is('bugs.user*') ? 'class="active"' : '') }}><a href="{{ action('\\Greengo\Http\Controllers\BugsController@indexBy', [ Auth::user()->id ]) }}">Bugs I Reported</a></li>
              						<li {{ (Request::is('bugs.user*') ? 'class="active"' : '') }}><a href="{{ action('\\Greengo\Http\Controllers\BugsController@indexAssigned', [ Auth::user()->id ]) }}">Bugs Assigned to Me</a></li>
              						<li class="divider"></li>
              						<li {{ (Request::is('bugs.create*') ? 'class="active"' : '') }}><a href="{{ action('\\Greengo\Http\Controllers\BugsController@create') }}">Report New Bug</a></li>
              					</ul>
              				</li>
                      @endif

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
          @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
