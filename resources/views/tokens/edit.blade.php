@extends('layouts.manager')
@section('content')

        <h1> 
                Edit Token
        </h1>
      
        {!! Form::open(['action' => ['TokenController@update',$token->id], 'method' => 'POST']) !!}
    
        <div class="form-group">
                <h6>used Token</h6>
                {{Form::text('usedToken', $token->usedToken, ['class' => 'form-control', 'placeholder' =>'used Token' ])}}
        </div>

      
    
        
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}

        {!! Form::close() !!}
        
@endsection