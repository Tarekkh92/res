@extends('layouts.admin')
@section('content')
    
        <h1> 
               Get Average 
        </h1>
      
        {!! Form::open(['action' => 'GetAverageController@store', 'method' => 'POST']) !!}
       
        
        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right" >Restaurant ID </label>     
            <div class="col-md-6">
                {{Form::select( 'resID', ['1' => 'Restaurant one', '2' => 'Restaurant two  ', '3' => 'Restaurant three '], '1')}} 
            </div> 
        </div>
       
        
        <div class="form-group row" >
            <div class="col-md-10" style="text-align: center;">
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
            </div>
        </div>
        {!! Form::close() !!}
        
@endsection