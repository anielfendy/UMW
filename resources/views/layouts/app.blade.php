<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'UMW Cost Saving Initiative') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/modern-business.css') }}" rel="stylesheet">

    <!-- Javascript -->
    <script src="https://unpkg.com/vue/dist/vue.min.js"></script>
    <script src="https://unpkg.com/highcharts/highcharts.js"></script>
    <!-- vue-highcharts should be load after Highcharts -->
    <script src="https://unpkg.com/vue-highcharts/dist/vue-highcharts.min.js"></script>
    
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
                    <a class="navbar-brand pull-left" href="{{ url('/') }}">
                        {{-- {{ config('app.name', 'UMW Cost Saving Initiative') }} --}}
                        <img class="image-responsive" src="{{ asset('img/umw-logo.png') }}"  alt="UMW logo" style="width:23%;height:auto;">

                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                        {{-- <li><a href="{{ url('/home') }}">Home</a></li> --}}
                        <!-- <img class="image-responsive" src="{{ asset('img/umw-logo.png') }}"  alt="UMW logo" style="width:3%;height:auto;padding: 10px"> -->
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li><a href="{{ url('/initiative') }}">Initiative Management</a></li>
                            <li><a href="{{ url('/saving') }}">Saving Management</a></li>
                            <li><a href="{{ url('/company') }}">Company Management</a></li>
                            <li><a href="{{ url('/user') }}">User Management</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->username }} <span class="caret"></span>
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

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (isset($errors))
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{ $error }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    @yield('content')
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-right padding2">
                        <!-- <a href="{{ url('/print-overall') }}" class="btn btn-outline-success success">Print Overall Page</a> -->
                    </div>
                </div>
            </div>
        </div> <!-- container -->
    </div>

    <!-- Footer -->
    <div class="container">
        <hr>
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; UMW Cost Saving Initiative 2018</p>
                </div>
            </div>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
    <script>
        $(document).on("click", "#confirm-modal", function(e) {
            window.console&&console.log('foo');
            var url = $(this).attr("href");
            window.console&&console.log(url);
            e.preventDefault();
            
            $('#destroy-form').attr('action', url);
            $('#destroy-modal').modal({ show: true });
        });
    </script>
    @yield('scripts')
</body>
</html>