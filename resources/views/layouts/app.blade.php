<!DOCTYPE html>
<html style="height: 100%;background: black;" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <script type="text/javascript" src="js/app.js"></script> 
    <script type="text/javascript" src="js/core.min.js"></script> 
    <script type="text/javascript" src="js/js/custom.js"></script> 
    <!-- <script src="{{ asset('js/core.min.js') }}" defer></script> -->
    <!-- <script src="{{ asset('js/custom.js') }}" defer></script> -->
   
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:400,500%7CCinzel:400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link href="/css/app.css" rel="stylesheet">

    {{-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> --}}
    <link href="/css/guest/style.css" rel="stylesheet">
    <!-- <link href="{{ asset('css/guest/style.css') }}" rel="stylesheet"> -->
    {{-- <link rel="shortcut icon" href="{{{ asset('img/faviicon.png') }}}"> --}}
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
{{-- <body style="height: 100%"> --}}
<body >

    <script>
        $(function () {
           $('#feedbackForm').submit(function(event){
               var verified= grecaptcha.getResponse();
               if(verified.length===0){
                   event.preventDefault();

               }
                
           });
        });
        // anonymousForm
       
    </script>
    {{-- <script>
          $(function () {
           $('#anonymousForm').submit(function(event){
               var verified= grecaptcha.getResponse();
               if(verified.length===0){
                   event.preventDefault();

               }
                
           });
        });   
    </script>
         --}}
         <script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/5be08a9545840924fe2340c6/default';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
            })();
        </script>
    <div id="app">
        <nav class="navbar1 navbar-expand-md navbar-dark navbar-laravel bg-secondary" style="display: none;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Servicio') }}
                   
                     {{-- <img src="{{asset('favicon.PNG')}}"> --}}
                                   </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                            {{-- <ul class="nav navbar-nav">
                                    <li><a href="{{ url('/')}}"> {{__('header.home')}} </a></li>
                            </ul> --}}
                            <ul class="nav navbar-nav">
                                    <li><a  class="nav-link" href="{{ url('/')}}">{{__('header.home')}} </a></li>
                            </ul>

                            {{-- <ul class="nav navbar-nav navbar-left">
                                    <li><a href="feedbacks/create"> {{ __('header.createFeedback')}} </a></li>
                            </ul> --}}
                           
                            <ul class="nav navbar-nav">
                                    <li><a  class="nav-link" href="{{ url('/add') }}">{{ __('header.createFeedback')}} </a></li>
                            </ul>
                          
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest

                   
                        {{-- <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    choose lang<span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/locale/en') }}">
                                        English
                                    </a>
                                    <a class="dropdown-item" href="{{ url('/locale/he') }}">
                                        Hebrew
                                       
                                    </a>

                                 
                                </div>
                            </li> --}}
                            <select onchange="location = this.value;" style="background-color: transparent;">
                                <option value="" disabled selected>Change Language</option>
                                           <option value="/locale/en">English</option>
                                           <option value="/locale/he">Hebrew</option>
                                           
                            </select>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"> {{ __('header.login') }} </a>
                            </li>



                            
                        
                        @else

                        <ul class="nav navbar-nav">
                                <li><a  class="nav-link" href="{{ url('/feedbacks')}}">All Feedbacks</a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                                <li><a  class="nav-link" href="{{ url('/todaysFeedback')}}">Todays Feedbacks</a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li><a  class="nav-link" href="{{ url('/averages') }}">{{ __('header.averages')}} </a></li>
                    </ul>
                        <ul class="nav navbar-nav">
                            <li><a  class="nav-link" href="{{ url('/tokens')}}">Tokens</a></li>
                    </ul>
                  
                        {{-- <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    choose lang<span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/locale/en') }}">
                                        English
                                    </a>
                                    <a class="dropdown-item" href="{{ url('/locale/he') }}">
                                        Hebrew
                                       
                                    </a>

                                </div>
                            </li> --}}
                            <ul>
                                <li class="nav navbar-nav">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
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
    </div>
        {{-- <div class="container"> --}}
        <div class="page" style="background-image: url('{{ asset('img/index-1.jpg') }}');background-size: cover;{{Request::is('add') ? '':'height:100%'}}">

                {{-- @include('inc.messages') --}}
            
                <nav class="navbar1 navbar-expand-md navbar-dark navbar-laravel">
                        <div class="container">
                            <a class="navbar-brand" href="{{ url('/') }}">
                                {{ config('app.name', 'Servicio') }}
                               
                                 {{-- <img src="{{asset('favicon.PNG')}}"> --}}
                                               </a>
            
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                <span class="navbar-toggler-icon"></span>
                            </button>
            
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <!-- Left Side Of Navbar -->
                                <ul class="navbar-nav mr-auto">
                                        {{-- <ul class="nav navbar-nav">
                                                <li><a href="{{ url('/')}}"> {{__('header.home')}} </a></li>
                                        </ul> --}}
                                        <ul class="nav navbar-nav">
                                                <li><a  class="nav-link" href="{{ url('/')}}">{{__('header.home')}} </a></li>
                                        </ul>
            
                                        {{-- <ul class="nav navbar-nav navbar-left">
                                                <li><a href="feedbacks/create"> {{ __('header.createFeedback')}} </a></li>
                                        </ul> --}}
                                       
                                        <ul class="nav navbar-nav">
                                                <li><a  class="nav-link" href="{{ url('/add') }}">{{ __('header.createFeedback')}} </a></li>
                                        </ul>
                                      
                                </ul>
            
                                <!-- Right Side Of Navbar -->
                                <ul class="navbar-nav ml-auto">
                                    <!-- Authentication Links -->
                                    @guest
            
                               
                                    {{-- <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                choose lang<span class="caret"></span>
                                            </a>
            
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ url('/locale/en') }}">
                                                    English
                                                </a>
                                                <a class="dropdown-item" href="{{ url('/locale/he') }}">
                                                    Hebrew
                                                   
                                                </a>
            
                                             
                                            </div>
                                        </li> --}}
                                        <select onchange="location = this.value;" style="background-color: transparent;border:none;">
                                            <option value="" disabled selected>Change Language</option>
                                                       <option value="/locale/en">English</option>
                                                       <option value="/locale/he">Hebrew</option>
                                                       
                                        </select>
                                        
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}"> {{ __('header.login') }} </a>
                                        </li>
            
            
            
                                        
                                    
                                    @else
            
                                    <ul class="nav navbar-nav">
                                            <li><a  class="nav-link" href="{{ url('/feedbacks')}}">All Feedbacks</a></li>
                                    </ul>
                                    <ul class="nav navbar-nav">
                                            <li><a  class="nav-link" href="{{ url('/todaysFeedback')}}">Todays Feedbacks</a></li>
                                    </ul>
                                    <ul class="nav navbar-nav">
                                        <li><a  class="nav-link" href="{{ url('/averages') }}">{{ __('header.averages')}} </a></li>
                                </ul>
                                    <ul class="nav navbar-nav">
                                        <li><a  class="nav-link" href="{{ url('/tokens')}}">Tokens</a></li>
                                </ul>
                              
                                    {{-- <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                choose lang<span class="caret"></span>
                                            </a>
            
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ url('/locale/en') }}">
                                                    English
                                                </a>
                                                <a class="dropdown-item" href="{{ url('/locale/he') }}">
                                                    Hebrew
                                                   
                                                </a>
            
                                            </div>
                                        </li> --}}
                                        <ul>
                                            <li class="nav navbar-nav">
                                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                            </li>
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
        

        <div>
 {{-- @yield('content') --}}
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer style="margin-top: 1rem;">
    
            {{-- <span class="text-muted">All rights Reserved &copy;</span> --}}
            <div class="section inset-2 section-transparent novi-background bg-cover">
                    <div class="shell">
                        <div class="range range-xs-middle range-fix">
                            <div class="cell-md-4 text-md-left">
                                {{-- <address class="contact-info"><p class="h5">28 Jackson Blvd Ste 1020 Chicago <br>IL 60604-2340</p>
                                </address> --}}
                                <ul class="list-inline text-center">
                                    <li><a href="#"><span class="icon icon-xs icon-default novi-icon fl-glypho-facebook2"></span></a></li>
                                    <li><a href="#"><span class="icon icon-xs icon-default novi-icon fl-glypho-twitter"></span></a></li>
                                    <li><a href="#"><span class="icon icon-xs icon-default novi-icon fl-glypho-google-plus"></span></a></li>
                                    <li><a href="#"><span class="icon icon-xs icon-default novi-icon fl-glypho-instagram19"></span></a></li>
                                </ul>
                            </div>
                            <div class="cell-md-4">
                                {{-- <p class="h5"><a href="mailto:#info@demolink.org">info@demolink.org</a></p> --}}
                                <div class="row" ><a style="display:block;text-align: center;width: 100%;" href="#">Privacy Terms</a></div>
                                <div class="row" style="text-align: center"><a style="display:block;text-align: center;width: 100%;" href="#">Terms Of Use</a></div>
                                <div class="row" style="text-align: center"><a style="display:block;text-align: center;width: 100%;" href="#">About Us</a></div>
                                

                            </div>
                            <div class="cell-md-3 cell-md-preffix-1 text-md-left copyright"><p style="text-align: center;">© <span id="copyright-year"></span> All Rights Reserved</p></div>
                        </div>
                    </div>
                </div>
    </footer>
    
</body>

</html>
