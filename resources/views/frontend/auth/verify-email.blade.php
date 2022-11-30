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
                <div class="verify-email">
                    <div class="mb-10">
                        <h3 class="font-weight-bold">{{ __('Verify E-mail') }}</h3>
                        <p class="opacity-60 font-weight-bold text-dark-100">
                            {{ __('Thanks for signing up! Before getting started, Please verify your email address by clicking on the link, you have received in the email. If you didn\'t receive the email, Click the button below.') }}
                        </p>
                    </div>
                    
                    @if (session('status') == 'verification-link-sent')
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                        </div>
                    @endif
                </div>
                <div class="buttons">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf        
                        <div class="form-group mb-2">
                            <button type="submit" class="btn btn-pill btn-outline-white font-weight-bold opacity-70 px-15 py-3 m-2">
                                {{ __('Resend Verification Email') }}
                            </button>
                        </div>
                    </form>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <div class="form-group">
                            <button type="submit" class="btn btn-pill btn-outline-white font-weight-bold opacity-70 px-15 py-3 m-2">
                                {{ __('Log Out') }}
                            </button>
                        </div>
                    </form>
                </div>
                <!--end::Login forgot password form-->
            </div>
        </div>
    </div>
    <!--end::Login-->
</div>
@endsection
