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
        {!! Form::open(['action' => 'AnonymousController@store', 'method' => 'POST','id' => 'anonymousForm']) !!}
        
        <div class="form-group" >
            <h6 style="font-family: 'Roboto', sans-serif;">{{ __('header.RateService')}}</h6>     
            {{-- <label>Rate Service</label> --}}
            {{-- <br/> --}}
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
                        </div>
            </div>
            {{-- {{Form::select('rateService', ['A' => ' 5 Stars * * * * * ', 'B' => ' 4 Stars * * * * ', 'C' => '3 Stars * * * ','D'=>'2 Stars * *','E'=>'1 Star  * '], 'A')}} --}}
            
            {!! $errors->first('rating', '<p class="help-block">:message</p>') !!}
        </div>

        <div class="form-group">
                <h6 style="font-family: 'Roboto', sans-serif;">{{ __('header.RateFood')}}</h6>
                {{-- {{Form::select('rateFood', ['A' => ' 5 Stars * * * * * ', 'B' => ' 4 Stars * * * * ', 'C' => '3 Stars * * * ','D'=>'2 Stars * *','E'=>'1 Star  * '], 'A')}} --}}
                {{-- <fieldset class="rating">
                        <input type="radio" id="star5_1" name="rating_1" value="5" /><label class = "full" for="star5_1" title="Awesome - 5 stars"></label>
                        <input type="radio" id="star4half_1" name="rating_1" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                        <input type="radio" id="star4_1" name="rating_1" value="4" /><label class = "full" for="star4_1" title="Pretty good - 4 stars"></label>
                        <input type="radio" id="star3half_1" name="rating_1" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                        <input type="radio" id="star3_1" name="rating_1" value="3" /><label class = "full" for="star3_1" title="Meh - 3 stars"></label>
                        <input type="radio" id="star2half_1" name="rating_!" value="2 and a half" /><label class="half_1" for="star2half" title="Kinda bad - 2.5 stars"></label>
                        <input type="radio" id="star2_1" name="rating_1" value="2" /><label class = "full" for="star2_1" title="Kinda bad - 2 stars"></label>
                        <input type="radio" id="star1half_1" name="rating_1" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                        <input type="radio" id="star1_1" name="rating_1" value="1" /><label class = "full" for="star1_1" title="Sucks big time - 1 star"></label>
                        <input type="radio" id="starhalf_1" name="rating_1" value="half" /><label class="half" for="starhalf_1" title="Sucks big time - 0.5 stars"></label>
                </fieldset> --}}
                <div style="width: 100%;display: inline-block;text-align: center">   
                                <div class="rating" >
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
                
                {!! $errors->first('rating_2', '<p class="help-block">:message</p>') !!}

             
        </div>
 

        <div class="form-group">
                <h6 style="font-family: 'Roboto', sans-serif;">{{ __('header.RateSanitation')}}</h6>
                {{-- {{Form::select('rateSanitation', ['A' => ' 5 Stars * * * * * ', 'B' => ' 4 Stars * * * * ', 'C' => '3 Stars * * * ','D'=>'2 Stars * *','E'=>'1 Star  * '], 'A')}} --}}
                {{-- <fieldset class="rating">
                        <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                        <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                        <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                        <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                        <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                        <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                        <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                        <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                        <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                        <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                </fieldset> --}}
                <div style="width: 100%;display: inline-block;text-align: center">   
                                <div class="rating" >
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
                
                {!! $errors->first('rating_3', '<p class="help-block">:message</p>') !!}
        </div>
        {{-- <br/>
        <br/> --}}

        <div class="form-group" >
                <h6 style="font-family: 'Roboto', sans-serif;">{{ __('header.RateMusic')}}</h6>
                {{-- {{Form::select('rateMusic', ['A' => ' 5 Stars * * * * * ', 'B' => ' 4 Stars * * * * ', 'C' => '3 Stars * * * ','D'=>'2 Stars * *','E'=>'1 Star  * '], 'A')}} --}}
                {{-- <fieldset class="rating">
                        <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                        <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                        <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                        <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                        <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                        <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                        <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                        <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                        <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                        <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                </fieldset> --}}
                <div style="width: 100%;display: inline-block;text-align: center">   
                                <div class="rating" {{ $errors->has('rating_4') ? 'has-error' : ''}}>
                {{-- <fieldset class="rating" {{ $errors->has('rating_4') ? 'has-error' : ''}}> --}}
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
              
                <br/>
                {{-- <br/><br/> --}}
                {!! $errors->first('rating_4', '<p class="help-block">:message</p>') !!}
        </div>
        {{-- <br/> --}}
     

        {{-- <div class="form-group">
            <fieldset class="rating">
                <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
            </fieldset>
        </div>
        --}}

        <div class="range">
                        <div class="cell-sm-12 form-group" {{ $errors->has('body') ? 'has-error' : ''}}>
                                {{Form::textarea('body', '', [ 'style'=>'height:auto','class' => 'form-control2', 'placeholder' => 'Write your own Additional thoughts'])}}
                                {!! $errors->first('body', '<p class="help-block">:message</p>') !!}
                        </div>
                </div>
        {{-- <div class="form-group" {{ $errors->has('body') ? 'has-error' : ''}}> 
            
                <h6>{{ __('header.Body')}}</h6>
                {{Form::textarea('body', '', [ 'class' => 'form-control', 'placeholder' => 'Write your own Additional thoughts'])}}
                {!! $errors->first('body', '<p class="help-block">:message</p>') !!}
        </div> --}}
        
        <div class="form-group">
           {{Form::label('name',' When submitting this form you cannot get a coupon of ten percent' )}}
        </div>
    
    {{-- <div class="g-recaptcha" data-sitekey="6LelSHUUAAAAAIWNCEON2f52kJb8xaPAX857pqzn"></div> --}}
    <div class="range" style="margin-top:20px;">
                <div class="cell-sm-12">
        {{Form::submit('Submit', ['class'=>'btn btn-primary' ,'style'=>'width:100%;'])}}
                </div>
    </div>

        {!! Form::close() !!}
       </div>
                                </div>
                </div>
</div>
@endsection