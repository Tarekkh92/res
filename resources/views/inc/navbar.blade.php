<nav class="navbar navbar-inverse navbar-dark" >
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle " data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href={{ url('/')}}>{{ config('app.name', 'RESAPP') }}</a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="{{ url('/')}}">Home</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                {{-- @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                 
                @else
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
            </ul> --}}
     
        {{-- <ul class="nav navbar-nav navbar-right">
            <li><a href={{ url('/posts/create')}}>Create Post </a></li>
        </ul>
        
        <ul class="nav navbar-nav navbar-right">
                <li><a href={{ url('/feedbacks/create')}}>Create feedback </a></li>
        </ul> --}}
       
      </div>
    </div>
  </nav>



