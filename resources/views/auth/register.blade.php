@extends('layouts.manager')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="background: rgba(0,0,0,0.6);min-height: 660px;">
                <div class="card-header" style="text-transform: uppercase;font-size: 2rem;">{{ __('Register') }}</div>

                <div class="card-body">
                    <form style="margin-left: 10%;margin-right: 10%;" method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        {{-- <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}




                        <div class="range" style="margin-top:1rem;">
                            <div class="cell-sm-12 form-group">
                                    <div class="form-wrap">
                                        <label for="name" class="form-label">{{ __('Name') }}</label>  
                                        <div class="input-group">
                                            
                                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                        </div>              
                                        
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                            </div>
                        </div>


                        {{-- <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}

                        <div class="range" style="margin-top:1rem;">
                            <div class="cell-sm-12 form-group">
                                    <div class="form-wrap">
                                        <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>  
                                        <div class="input-group">
                                            {{-- <div class="input-group-addon">
                                                <i class="fa fa-envelope icon"></i>
                                            </div> --}}
                                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                        </div>              
                                        
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                            </div>
                        </div>



                        {{-- <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}


                        <div class="range" style="margin-top:1rem;">
                            <div class="cell-sm-12 form-group">
                                    <div class="form-wrap">
                                        <label for="password" class="form-label">{{ __('Password') }}</label>  
                                        <div class="input-group">
                                            {{-- <div class="input-group-addon">
                                                <i class="fa fa-key icon"></i>
                                            </div> --}}
                                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                        </div>              
                                        
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                            </div>
                        </div>



                        {{-- <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div> --}}

                        <div class="range" style="margin-top:1rem;">
                            <div class="cell-sm-12 form-group">
                                    <div class="form-wrap">
                                        <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>  
                                        <div class="input-group">
                                            {{-- <div class="input-group-addon">
                                                <i class="fa fa-key icon"></i>
                                            </div> --}}
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                        </div>              
                                    </div>
                            </div>
                        </div>
                        



                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" >User type</label>     
                            <div class="col-md-6">
                                {{Form::select( 'userType', ['1' => 'Restaurant one', '2' => 'Restaurant two  ', '3' => 'Restaurant three ' ], '1', ['style' => 'color:white;margin-bottom: 2rem;background: transparent;'])}} 
                            </div> 
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" style="width: 100%;">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
