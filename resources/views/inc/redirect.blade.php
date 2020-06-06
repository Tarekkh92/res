@extends('layouts.app')

@section('content')
           
<!-- A meta tag that redirects after 5 seconds to one of my PHP tutorials-->
    <div class="jumbotron text-center">
        {{-- <style>
            body
                {
                    background:orangered !important;
                }
        </style> --}}
        <h1>Welcome To Servicio!</h1>
        <p>You havn't clicked I'm not robot</p>
        
    </div>
   <script> 
      
           
            //   setTimeout(function(){window.location='/add', }3000);
            setTimeout(function(){window.location='/add'}, 5000);
    </script>

@endsection