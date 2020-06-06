@extends('layouts.app')

@section('content')
<meta http-equiv="refresh" content="1; url=/">
<header style="" class="page-head bg-image novi-background custom-bg-image">
    <div class="section-gradient section-xs">
        <div class="container p0 border-radius-sm z-index-2">
            <div class="jumbotron text-md-left text-center bg-image-2 border-radius-sm container-shadow novi-background custom-bg-image">
                <div class="row">
                    <div class="col-md-5 col-md-offset-5"><p class="medium">Thank You </p>
                        <p class="txt">For registering and giving feedback to Us,<br> See you Soon</p>
                        
                        {{-- <a href="#" class="btn btn-primary btn-xs">More</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- A meta tag that redirects after 5 seconds to one of my PHP tutorials-->
{{-- <meta http-equiv="refresh" content="1; url=/"> --}}
    {{-- <div class="jumbotron text-center"> --}}
        {{-- <style>
            body
                {
                    background:orangered !important;
                }
        </style> --}}
        {{-- <h1>Welcome To Laravel!</h1>
        <p>Thank You For registering and giving feedback to Us ,See you Soon </p> --}}
        {{-- <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a> <a class="btn btn-success btn-lg" href="/register" role="button">Register</a></p> --}}
    {{-- </div> --}}
   <script> 
      
           
            //  setTimeout(function(){window.location='feedbacks/create/'+session()->get('res1')}, 2000);
    </script>
@endsection