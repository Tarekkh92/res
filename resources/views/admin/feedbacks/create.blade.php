@extends('layouts.app')
@section('content')
    
        <h1> 
                {{ __('header.Create FeedBack') }} 
        </h1>
       {{-- <script> echo +" "+url()->current(); </script> --}}
        {!! Form::open(['action' => 'FeedbacksController@store', 'method' => 'POST']) !!}
        <div class="form-group">
                {{-- {{Form::label('name', __('header.Name'))}} --}}
                <h6>{{ __('header.Name')}}</h6>
                {{Form::text('fullname', '', ['class' => 'form-control', 'placeholder' =>'Full Name' ])}}
        </div>
        {{-- <label>العربيه</label> --}}
        <div class="form-group">
                <h6>{{ __('header.Email')}}</h6>
                {{-- {{Form::label('email', __('header.Email'))}} --}}
                {{Form::email('email', '', [ 'class' => 'form-control', 'placeholder' => 'Enter Email'])}}
        </div>
        <div class="form-group">
                {{-- {{Form::label('phone', __('header.Phone'))}} --}}
                <h6>{{ __('header.Phone')}}</h6>
                {{Form::text('phone', '', [ 'class' => 'form-control', 'placeholder' => 'Enter Phone Number'])}}
        </div>
  
        <div class="form-group">
            <h6>{{ __('header.RateService')}}</h6>     
            {{Form::select('rateService', ['A' => ' 5 Stars * * * * * ', 'B' => ' 4 Stars * * * * ', 'C' => '3 Stars * * * ','D'=>'2 Stars * *','E'=>'1 Star  * '], 'A')}}
        </div>
        <div class="form-group">
                <h6>{{ __('header.RateFood')}}</h6>
                {{Form::select('rateFood', ['A' => ' 5 Stars * * * * * ', 'B' => ' 4 Stars * * * * ', 'C' => '3 Stars * * * ','D'=>'2 Stars * *','E'=>'1 Star  * '], 'A')}}
        </div>
        <div class="form-group">
                <h6>{{ __('header.RateSanitation')}}</h6>
                {{Form::select('rateSanitation', ['A' => ' 5 Stars * * * * * ', 'B' => ' 4 Stars * * * * ', 'C' => '3 Stars * * * ','D'=>'2 Stars * *','E'=>'1 Star  * '], 'A')}}
        </div>
        <div class="form-group">
                <h6>{{ __('header.RateMusic')}}</h6>
                {{Form::select('rateMusic', ['A' => ' 5 Stars * * * * * ', 'B' => ' 4 Stars * * * * ', 'C' => '3 Stars * * * ','D'=>'2 Stars * *','E'=>'1 Star  * '], 'A')}}
                <br/>
        </div>

        <div class="form-group">

                <h6>{{ __('header.Body')}}</h6>
                {{Form::textarea('body', '', [ 'class' => 'form-control', 'placeholder' => 'Write your own Additional thoughts'])}}
        </div>
        
        
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}

        {!! Form::close() !!}
        
@endsection