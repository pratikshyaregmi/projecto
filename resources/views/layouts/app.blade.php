<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('meta-title')</title>
    <meta name="description" content="@yield('meta-desc')">
    <meta name="author" content="@yield('meta-author')">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sweetalert.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                      Projecto
                        <!-- {{ config('app.name', 'Laravel') }} -->
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-left">
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            Categories <span class="caret"></span>
                        </a>
                        @if ($c)
                        <ul class="dropdown-menu" role="menu">
                          @foreach ($c as $c)
                            @if ($c->blog->count() > 0)
                            <li> <a href="{{ route('categories.show', $c->slug) }}">{{ $c->name }}</a> </li>
                            @endif
                          @endforeach
                        </ul>
                        @endif
                      </li>
                      <li><a href="{{ url('/blog/create') }}">Blog</a></li>
                      @if (Auth::user())
                      <li><a href="{{ url('/users') }}">Dashboard</a></li>
                      @endif
                      @if (Auth::user() ? Auth::user()->role->id === 1 : '')
                      <li><a href="{{ url('/admin') }}">Admin</a></li>
                      @endif
                      <li><a href="{{ url('/contact') }}">Contact us</a></li>
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li>
                              <a href="{{ action('UserController@edit', Auth::user()->username) }}">Profile Setting</a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
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
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/sweetalert.js') }}"></script> -->


    <script src="/js/app.js"></script>
    <script src="/js/jquery-3.3.1.slim.js"></script>
    <script src="/js/sweetalert.min.js"></script>
    <script>
        @if (notify()->ready())
            swal({
                  title: "{!! notify()->message() !!}",
                  type: "{!! notify()->type() !!}",
                  @if (notify()->option('timer'))
                    timer: "{!! notify()->option('timer') !!}",
                    showConfirmButton: true,
                  @endif
                  html: true
                });
        @endif
    </script>
</body>
</html>
