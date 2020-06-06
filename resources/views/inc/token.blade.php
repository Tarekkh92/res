            @extends('layouts.manager')
            @section('content')
                
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                
            
                
                
            
                
            </head>
            <body onload="doSomething()">
                    {!! Form::open(['action' => 'TokenValidityController@store', 'method' => 'POST']) !!}
                
                    
                    <div class="form-group" >
                            <h6>{{ __('header.TokenName')}}</h6>
                            {{Form::text('tokenStr', '', ['class' => 'form-control','id'=>'tokenStr' ])}}
                            {{--  'placeholder' =>'Enter your Token for Validation', --}}
                    </div>  

                
                {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}

                {!! Form::close() !!}
                <script>
                    function doSomething(){
                    //    alert('ddd');
                    //    $id=Session::get('code');
                    //    var session=var data = '@Session["code"]';
                    //    alert(session);
                    }
                
     
                </script>    
                
                
            </body>
            </html>
                
                
                    
@endsection