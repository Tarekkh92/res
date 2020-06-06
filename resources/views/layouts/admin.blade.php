<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ config('app.name', 'Laravel') }}
        {{-- <img src="{{asset('favicon.PNG')}}"> --}}
        
    
    </title>
  

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
   
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> --}}
<!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/admin/black-dashboard.css?v=1.0.0') }}" rel="stylesheet" />
    {{-- <link rel="shortcut icon" href="{{{ asset('img/faviicon.png') }}}"> --}}

</head>
<body>
    <div class="wrapper">    

            <div class="sidebar" data-color="purple" data-background-color="white">
                    <!--
                      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
                
                      Tip 2: you can also add an image using data-image tag
                  -->
                    <div class="logo">
                      <a href="{{ url('/home')}}" class="simple-text logo-mini">
                        CT
                      </a>
                
                      <a href="{{ url('/home')}}" class="simple-text logo-normal">
                       Creative Tim
                      </a>
                    </div>
                
                    <div class="sidebar-wrapper">
                      <ul class="nav">
                        <li class="nav-item active  ">
                            <a class="nav-link" href="{{ url('/home')}}">
                                <i class="tim-icons icon-chart-pie-36"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"> {{ __('header.login') }} </a>
                        </li>
                    
                        @else

                        <li class="nav-item"><a  class="nav-link" href="{{ url('/adminFeedbacks')}}">All Feedbacks</a></li>
                        <li class="nav-item"><a  class="nav-link" href="{{ url('/adminAverages') }}">{{ __('header.averages')}} </a></li>
                        <li class="nav-item"><a  class="nav-link" href="{{ url('/adminTokens')}}">Tokens</a></li>
                        @endguest
                         <!-- your sidebar here -->
                      </ul>
                    </div>
                  </div>



                  <div id="app">
                  </div>
    {{-- <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark navbar-laravel bg-secondary">
            <div class="container">
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                            
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"> {{ __('header.login') }} </a>
                            </li>
                        
                        @else

                        <ul class="nav navbar-nav">
                                <li><a  class="nav-link" href="{{ url('/adminFeedbacks')}}">All Feedbacks</a></li>
                        </ul>

                        <ul class="nav navbar-nav">
                            <li><a  class="nav-link" href="{{ url('/adminAverages') }}">{{ __('header.averages')}} </a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li><a  class="nav-link" href="{{ url('/adminTokens')}}">Tokens</a></li>
                        </ul>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div> --}}
    <div class="main-panel">



        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-toggle d-inline">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                    </div>
                    <a class="navbar-brand" href="{{ url('/home')}}">Dashboard</a>
                </div>
      
              {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
              </button> --}}

              <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                  </button>
      
              <div class="collapse navbar-collapse justify-content-end" id="navigation">
                <ul class="navbar-nav">
                        

                    <li class="dropdown nav-item">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} 
                            {{-- <span class="caret"></span> --}}
                        </a>
                        {{-- <a class="nav-link" href="#pablo">
                        <i class="tim-icons icon-bell-55"></i>  Notifications
                        </a> --}}
                        <ul class="dropdown-menu dropdown-navbar">
                            <li class="nav-link">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" class="nav-item dropdown-item">Log out</a>
                            </li>
                        </ul>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>    
                    </li>
                   <!-- your navbar here -->
                </ul>
              </div>
            </div>
        </nav>
          <!-- End Navbar -->










        <div class="content">

                @include('inc.messages')
                {{-- @yield('content') --}}
            <div class="container-fluid">
                <main class="py-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
    </div>
    
</body>
<footer class="fixed-bottom">
    <span class="text-muted">All rights Reserved &copy;</span>
</footer>

<!--   Core JS Files   -->
<script src="{{ asset('/js/admin/core/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/admin/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/admin/core/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/admin/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
<!--  Google Maps Plugin    -->
{{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
<!-- Chartist JS -->
<script src="{{ asset('/js/admin/plugins/chartjs.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('/js/admin/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('/js/admin/black-dashboard.js?v=1.0.0') }}" type="text/javascript"></script>
</html>
