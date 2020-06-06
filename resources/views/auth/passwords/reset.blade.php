@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="background: rgba(0,0,0,0.6);min-height: 660px;">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">


                        <div class="range" style="margin-top:1rem;">
                            <div class="cell-sm-12 form-group">
                                <div class="form-wrap">
                                            <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>  
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user icon"></i>
                                                </div>
                                                <input id="email" type="email" class="form-input {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                            </div>              
                                            
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                </div>
                            </div>
                        </div>

                        <div class="range" style="margin-top:1rem;">
                                <div class="cell-sm-12 form-group">
                                    <div class="form-wrap">
                                                <label for="password" class="form-label">{{ __('Password') }}</label>  
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-key icon"></i>
                                                    </div>
                                                    <input id="password" type="password" class="form-input{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                                </div>              
                                                
                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                    </div>
                                </div>
                        </div>

                        <div class="range" style="margin-top:1rem;">
                                <div class="cell-sm-12 form-group">
                                    <div class="form-wrap">
                                                <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>  
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-key icon"></i>
                                                    </div>
                                                    <input id="password-confirm" type="password" class="form-input" name="password_confirmation" required>
                                                </div>              
                                    </div>
                                </div>
                        </div>







                        {{-- <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}

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

                        {{-- <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div> --}}

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
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
