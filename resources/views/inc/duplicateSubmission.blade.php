@extends('layouts.app')

@section('content')

<header style="" class="page-head bg-image novi-background custom-bg-image">
        <div class="section-gradient section-xs">
            <div class="container p0 border-radius-sm z-index-2">
                <div class="jumbotron text-md-left text-center bg-image-2 border-radius-sm container-shadow novi-background custom-bg-image">
                    <div class="row">
                        <div class="col-md-5 col-md-offset-5"><p class="medium">Welcome To Servicio!</p>
                            <p class="txt">DuplicateSubmission</p>
                            
                            {{-- <a href="#" class="btn btn-primary btn-xs">More</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>





<!-- A meta tag that redirects after 5 seconds to one of my PHP tutorials-->
    {{-- <div class="jumbotron text-center"> --}}
        {{-- <style>
            body
                {
                    background:orangered !important;
                }
        </style> --}}
        {{-- <h1>Welcome To Servicio!</h1>
        <p>DuplicateSubmission</p>
        
    </div> --}}
   <script> 
      
           
            //   setTimeout(function(){window.location='/add', }3000);
            setTimeout(function(){window.location='/'}, 5000);
    </script>

@endsection