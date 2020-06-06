@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
<div class="col-md-8">
                <div class="card" style="background: rgba(0,0,0,0.6);min-height: 660px;">
                        <div class="card-header" style="text-transform: uppercase;font-size: 2rem;"> 
                                {{ __('header.Create FeedBack') }} 
                        </div>
       {{-- <script> echo +" "+url()->current(); </script> --}}
       <div class="card-body">
        {!! Form::open(['action' => 'FeedbacksController@store', 'method' => 'POST' ,'id' => 'feedbackForm']) !!}
        <div class="range">
                        <div class="offset-md-2 cell-sm-8 form-group" style="text-align: center;font-size: 1.25rem;text-decoration: underline;font-weight: bold;">
        {{-- <select onchange="location = this.value;" style="margin-bottom: 2rem;background: transparent">
            <option value="" disabled selected>Give anonymous feedback</option>
                      
                       <option value="{{url('/anonymousFeedbacks/create/')}}">anonymous Feedback</option>
                       
        </select> --}}
                <a href="{{url('/anonymousFeedbacks/create/')}}">Give Feedback Anonymously</a>
        </div>
        </div>
        <div class="form-group">
            <h6 style='font-family: "Roboto", sans-serif;'>{{ __('header.RateService')}}</h6>  
            <div style="width: 100%;display: inline-block;text-align: center">   
            <div class="rating" >
                    
                <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                {{-- <input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label> --}}
                <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                {{-- <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label> --}}
                <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                {{-- <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label> --}}
                <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                {{-- <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label> --}}
                <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                {{-- <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label> --}}
                
                
                {{-- <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label> --}}
            </div>
</div>
            {{-- {{Form::select('rateService', ['A' => ' 5 Stars * * * * * ', 'B' => ' 4 Stars * * * * ', 'C' => '3 Stars * * * ','D'=>'2 Stars * *','E'=>'1 Star  * '], 'A')}} --}}
        </div>
        {{-- <br/>
        <br/> --}}
        <div class="form-group">
                <h6 style="margin-top: 2rem;font-family: 'Roboto', sans-serif;">{{ __('header.RateFood')}}</h6>
                <div style="width: 100%;display: inline-block;text-align: center">   
                        <div class="rating">
                        <input type="radio" id="star5_2" name="rating_2" value="5" /><label class = "full" for="star5_2" title="Awesome - 5 stars"></label>
                        {{-- <input type="radio" id="star4half_2" name="rating_2" value="4.5" /><label class="half" for="star4half_2" title="Pretty good - 4.5 stars"></label> --}}
                        <input type="radio" id="star4_2" name="rating_2" value="4" /><label class = "full" for="star4_2" title="Pretty good - 4 stars"></label>
                        {{-- <input type="radio" id="star3half_2" name="rating_2" value="3 and a half" /><label class="half" for="star3half_2" title="Meh - 3.5 stars"></label> --}}
                        <input type="radio" id="star3_2" name="rating_2" value="3" /><label class = "full" for="star3_2" title="Meh - 3 stars"></label>
                        {{-- <input type="radio" id="star2half_2" name="rating_2" value="2 and a half" /><label class="half" for="star2half_2" title="Kinda bad - 2.5 stars"></label> --}}
                        <input type="radio" id="star2_2" name="rating_2" value="2" /><label class = "full" for="star2_2" title="Kinda bad - 2 stars"></label>
                        {{-- <input type="radio" id="star1half_2" name="rating_2" value="1 and a half" /><label class="half" for="star1half_2" title="Meh - 1.5 stars"></label> --}}
                        <input type="radio" id="star1_2" name="rating_2" value="1" /><label class = "full" for="star1_2" title="Sucks big time - 1 star"></label>
                        {{-- <input type="radio" id="starhalf_2" name="rating_2" value="half" /><label class="half" for="starhalf_2" title="Sucks big time - 0.5 stars"></label> --}}
                        </div>
                </div>
                {{-- {{Form::select('rateFood', ['A' => ' 5 Stars * * * * * ', 'B' => ' 4 Stars * * * * ', 'C' => '3 Stars * * * ','D'=>'2 Stars * *','E'=>'1 Star  * '], 'A')}} --}}
        </div>
        {{-- <br/>
        <br/> --}}
        <div class="form-group">
                <h6 style="margin-top: 2rem;font-family: 'Roboto', sans-serif;">{{ __('header.RateSanitation')}}</h6>
                <div style="width: 100%;display: inline-block;text-align: center">   
                        <div class="rating">
                        <input type="radio" id="star5_3" name="rating_3" value="5" /><label class = "full" for="star5_3" title="Awesome - 5 stars"></label>
                        {{-- <input type="radio" id="star4half_3" name="rating_3" value="4.5" /><label class="half" for="star4half_2" title="Pretty good - 4.5 stars"></label> --}}
                        <input type="radio" id="star4_3" name="rating_3" value="4" /><label class = "full" for="star4_3" title="Pretty good - 4 stars"></label>
                        {{-- <input type="radio" id="star3half_3" name="rating_3" value="3 and a half" /><label class="half" for="star3half_2" title="Meh - 3.5 stars"></label> --}}
                        <input type="radio" id="star3_3" name="rating_3" value="3" /><label class = "full" for="star3_3" title="Meh - 3 stars"></label>
                        {{-- <input type="radio" id="star2half_3" name="rating_3" value="2 and a half" /><label class="half" for="star2half_2" title="Kinda bad - 2.5 stars"></label> --}}
                        <input type="radio" id="star2_3" name="rating_3" value="2" /><label class = "full" for="star2_3" title="Kinda bad - 2 stars"></label>
                        {{-- <input type="radio" id="star1half_3" name="rating_3" value="1 and a half" /><label class="half" for="star1half_2" title="Meh - 1.5 stars"></label> --}}
                        <input type="radio" id="star1_3" name="rating_3" value="1" /><label class = "full" for="star1_3" title="Sucks big time - 1 star"></label>
                        {{-- <input type="radio" id="starhalf_3" name="rating_3" value="half" /><label class="half" for="starhalf_4" title="Sucks big time - 0.5 stars"></label> --}}
                        </div>
                </div>
                {{-- {{Form::select('rateSanitation', ['A' => ' 5 Stars * * * * * ', 'B' => ' 4 Stars * * * * ', 'C' => '3 Stars * * * ','D'=>'2 Stars * *','E'=>'1 Star  * '], 'A')}} --}}
        </div>
        {{-- <br/>
        <br/> --}}
        <div class="form-group">
                <h6 style="margin-top: 2rem;font-family: 'Roboto', sans-serif;">{{ __('header.RateMusic')}}</h6>
                {{-- {{Form::select('rateMusic', ['A' => ' 5 Stars * * * * * ', 'B' => ' 4 Stars * * * * ', 'C' => '3 Stars * * * ','D'=>'2 Stars * *','E'=>'1 Star  * '], 'A')}} --}}
                <div style="width: 100%;display: inline-block;text-align: center">   
                        <div class="rating">
                                <input type="radio" id="star5_4" name="rating_4" value="5" /><label class = "full" for="star5_4" title="Awesome - 5 stars"></label>
                                {{-- <input type="radio" id="star4half_4" name="rating_4" value="4.5" /><label class="half" for="star4half_2" title="Pretty good - 4.5 stars"></label> --}}
                                <input type="radio" id="star4_4" name="rating_4" value="4" /><label class = "full" for="star4_4" title="Pretty good - 4 stars"></label>
                                {{-- <input type="radio" id="star3half_4" name="rating_4" value="3 and a half" /><label class="half" for="star3half_2" title="Meh - 3.5 stars"></label> --}}
                                <input type="radio" id="star3_4" name="rating_4" value="3" /><label class = "full" for="star3_4" title="Meh - 3 stars"></label>
                                {{-- <input type="radio" id="star2half_4" name="rating_4" value="2 and a half" /><label class="half" for="star2half_2" title="Kinda bad - 2.5 stars"></label> --}}
                                <input type="radio" id="star2_4" name="rating_4" value="2" /><label class = "full" for="star2_4" title="Kinda bad - 2 stars"></label>
                                {{-- <input type="radio" id="star1half_4" name="rating_4" value="1 and a half" /><label class="half" for="star1half_2" title="Meh - 1.5 stars"></label> --}}
                                <input type="radio" id="star1_4" name="rating_4" value="1" /><label class = "full" for="star1_4" title="Sucks big time - 1 star"></label>
                                {{-- <input type="radio" id="starhalf_4" name="rating_4" value="half" /><label class="half" for="starhalf_4" title="Sucks big time - 0.5 stars"></label> --}}
                        </div>  
                </div> 
        </div>
        
        <div class="range">
                        <div class="cell-sm-12 form-group">
                                <div class="form-wrap"><label for="emailtxt" class="form-label">{{ __('header.Email')}}</label>                
                                {{Form::email('email','',['data-constraints'=>'@Email','id' =>'emailtxt','class' => 'form-input', 'placeholder' => ''])}}
                                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                                </div>
                        </div>
        </div>
        <div class="range">
                <div class="cell-sm-12 form-group">
                        <div class="form-wrap"><label for="nametxt" class="form-label">{{ __('header.Name')}}</label>                
                                {{Form::text('fullname','',['data-constraints'=>'@Required','id' =>'nametxt','class' => 'form-input', 'placeholder' => ''])}}
                                {!! $errors->first('fullname', '<p class="help-block">:message</p>') !!}
                        </div>
                </div>
        </div>

        <div class="range">
                        <div class="cell-sm-12 form-group">
                                        <div class="form-wrap"><label for="phonetxt" class="form-label">{{ __('header.Phone')}}</label>                
                                        {{Form::tel('phone','',['data-constraints'=>'@Required','id' =>'phonetxt','class' => 'form-input', 'placeholder' => ''])}}
                                        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                                        </div>
                        </div>
        </div>

        <div class="range">
                <div class="cell-sm-12 form-group" {{ $errors->has('body') ? 'has-error' : ''}}>
                        {{Form::textarea('body', '', [ 'style'=>'height:auto','class' => 'form-control2', 'placeholder' => 'WRITE ANY ADDITIONAL INFORMATION YOU WOULD LIKE'])}}
                        {!! $errors->first('body', '<p class="help-block">:message</p>') !!}
                </div>
        </div>

        <div class="range">
                <div class="cell-sm-12 form-group">
                     {{Form::checkbox('termschk', 'termschk',['id'=>'termschk'])}}   <span>Agree to Terms and Conditions</span>
                </div>
        </div>

                
        {{-- <div class="form-group" style="display: none;">
                
                <h6>{{ __('header.Name')}}</h6>
                {{Form::text('fullname', '', ['class' => 'form-control', 'placeholder' =>'Full Name' ])}}
        </div> --}}
        
        {{-- <div class="form-group" style="display: none;">
                <h6>{{ __('header.Email')}}</h6>
                
                {{Form::email('email', '', [ 'class' => 'form-control', 'placeholder' => 'Enter Email'])}}
        </div> --}}
        {{-- <div style="display: none;" class="form-group"  {{ $errors->has('phone') ? 'has-error' : ''}} >
                
                <h6>{{ __('header.Phone')}}</h6>
                {{Form::text('phone', '', [ 'class' => 'form-control', 'placeholder' => 'Enter Phone Number, For Example 050-1234-567'])}}
                {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
        </div> --}}
        {{-- <div style="display: none;" class="form-group" {{ $errors->has('body') ? 'has-error' : ''}}>

            <h6>{{ __('header.Body')}}</h6>
            {{Form::textarea('body', '', [ 'class' => 'form-control', 'placeholder' => 'Write your own Additional thoughts'])}}
            {!! $errors->first('body', '<p class="help-block">:message</p>') !!}
        </div> --}}
        
        
      
        
        {{-- <div class="g-recaptcha" data-sitekey="6LdZSnUUAAAAAKbpoijMsUESWbTOEFWXHcHvqYU8"></div> --}}
        {{-- <div class="g-recaptcha" data-sitekey="6LelSHUUAAAAAIWNCEON2f52kJb8xaPAX857pqzn"></div> --}}
        <div class="range" style="margin-top:20px;">
                        <div class="cell-sm-8" style="margin: 0 auto;">
        <div class="g-recaptcha" data-sitekey="6LelSHUUAAAAAIWNCEON2f52kJb8xaPAX857pqzn" style="margin: 0 auto;"></div>
                        </div>
        </div>

        <div class="range" style="margin-top:20px;">
                <div class="cell-sm-12" style="margin: 0 auto;">
        {{Form::submit('Submit', ['class'=>'btn btn-primary','style'=>'width:100%;'])}}
                </div>
        </div>
        {!! Form::close() !!}
       </div>
                </div>
</div>
</div>
@endsection