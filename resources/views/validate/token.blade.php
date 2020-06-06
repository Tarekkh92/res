{{-- @extends('layouts.app')
@section('content')
    
       
     
        {!! Form::open(['action' => 'TokenValidityController@store', 'method' => 'POST']) !!}
    
        
            <div class="form-group">
                    <h6>{{ __('header.TokenName')}}</h6>
                    {{Form::text('tokenStr', '', ['class' => 'form-control', 'placeholder' =>'Enter your Token for Validation' ])}}
            </div>  

        
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}

        {!! Form::close() !!}
        <script>
            window.onload = function(){
            document.getElementById("tokenStr").value = "value";
            }   


        </script>
        
@endsection --}}