@extends('frontend.layouts.login')

@section('content')
<div class="d-flex flex-column flex-root">
    <!--begin::Login-->
    <div class="login login-3 login-signin-on d-flex flex-row-fluid" id="kt_login">
        <div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url({{ asset('assets/media/background.jpg') }}); max-w:100%;">
            <div class="login-form text-center text-white p-7 position-relative overflow-hidden">
                <!--begin::Login Header-->
                <div class="d-flex flex-center mb-10">
                    <a href="#">
                        <img src="{{ asset('assets/media/logos/laravel-logo.png') }}" class="max-h-90px" alt="" />
                    </a>
                </div>
                <!--end::Login Header-->
                <!--begin::Login Sign in form-->
                <div class="login-signin">
                    <div class="mb-10">
                        <h3>{{ __('login.sign_in') }}</h3>
                        <p class="opacity-60 font-weight-bold">{{ __('login.sub_text') }}</p>
                    </div>
                    <form class="form" method="post" action="{{ route('login') }}" id="login_signin_form">
                        @csrf
                        <div class="form-group">
                            {{ Form::text('email',null,array('class' => 'form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8'. ($errors->has('email') ? ' is-invalid' : null), 'placeholder' => __('label.email')))}}
                            
                        </div>
                        <div class="form-group">
                            {{ Form::password('password',array('class' => 'form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8'. ($errors->has('password') ? ' is-invalid' : null), 'placeholder' => __('label.password')))}}
                        </div>
                        <div class="form-group d-flex flex-wrap justify-content-center align-items-center px-8">
                            <div class="checkbox-inline">
                                <label class="checkbox checkbox-outline checkbox-white text-white m-0">
                                <input type="checkbox" name="remember" />
                                <span></span>{{ __('login.remember_me') }}</label>
                            </div>
                        </div>
                        
                        @error('email')
                        <div class="fv-plugins-message-container">
                            <div class="fv-help-block">
                                <strong>{{ $message }}</strong>
                            </div>
                        </div>
                        @enderror
                        @error('password')
                            <div class="fv-plugins-message-container">
                                <div class="fv-help-block">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror

                        <div class="form-group text-center mt-10">
                            {{ Form::submit(__('buttons.sign_in'),array('class' => 'btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3', 'id' => 'kt_login_signin_submit'))}}
                        </div>
                    </form>
                    <div class="mt-10">
                        <span class="opacity-70 mr-4">{{ __('login.dont_have_account') }}</span>
                        <a href="javascript:;" id="kt_login_signup" class="text-white font-weight-bold">{{ __('login.sign_up') }}</a>
                    </div>
                </div>
                <!--end::Login Sign in form-->
                
                <!--begin::Sign up form-->
                <div class="login-signup">
                    <div class="mb-10">
                        <h3>{{ __('login.sign_up') }}</h3>
                        <p class="opacity-60">{{ __('login.sign_up_sub_text') }}</p>
                    </div>
                    <form class="form text-center" method="post" action="{{ route('register') }}" id="kt_login_signup_form">
                        @csrf
                        <div class="form-group">
                            {{ Form::text('first_name',null,array('class' => 'form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8'. ($errors->has('first_name') ? ' is-invalid' : null), 'placeholder' => __('label.first_name')))}}
                            @error('first_name')
                            <div class="fv-plugins-message-container">
                                <div class="fv-help-block">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::text('last_name',null,array('class' => 'form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8'. ($errors->has('last_name') ? ' is-invalid' : null), 'placeholder' => __('label.last_name')))}}
                            @error('last_name')
                            <div class="fv-plugins-message-container">
                                <div class="fv-help-block">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::text('email',null,array('class' => 'form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8'. ($errors->has('email') ? ' is-invalid' : null), 'placeholder' => __('label.email')))}}
                            @error('email')
                            <div class="fv-plugins-message-container">
                                <div class="fv-help-block">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::password('password',array('class' => 'form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8'. ($errors->has('password') ? ' is-invalid' : null), 'placeholder' => __('label.password')))}}
                            @error('password')
                            <div class="fv-plugins-message-container">
                                <div class="fv-help-block">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::password('cpassword',array('class' => 'form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8'. ($errors->has('cpassword') ? ' is-invalid' : null), 'placeholder' => __('label.confirm_password')))}}
                            @error('cpassword')
                            <div class="fv-plugins-message-container">
                                <div class="fv-help-block">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::date('dob',null,array('class' => 'form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8'. ($errors->has('dob') ? ' is-invalid' : null), 'id' => 'example-date-input','placeholder' => __('label.dob')))}}
                            @error('dob')
                            <div class="fv-plugins-message-container">
                                <div class="fv-help-block">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::submit(__('buttons.sign_up'),array('class' => 'btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3 m-2', 'id' => 'kt_login_signup_submit'))}}
                            <button id="kt_login_signup_cancel" type="button" class="btn btn-pill btn-outline-white font-weight-bold opacity-70 px-15 py-3 m-2">{{ __('buttons.cancel') }}</button>
                        </div>
                    </form>
                </div>
                <!--end::Sign up form-->
            </div>
        </div>
    </div>
    <!--end::Login-->
</div>
@endsection
@section('after-scripts')
    <script src="{{ asset('js/pages/custom/login/login-general.js') }}"></script> 
@endsection