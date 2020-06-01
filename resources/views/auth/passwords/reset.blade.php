@extends('layout.auth')

@section('content')

    <div class="login-form pt-11">
        <!--begin::Form-->
        <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <!--begin::Title-->
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="text-center pb-8">
                <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Forgotten Password ?</h2>
                <p class="text-muted font-weight-bold font-size-h4">Enter your email to reset your password</p>
            </div>
            <!--end::Title-->
            <!--begin::Form group-->
            <div class="form-group">
                <input id="email" placeholder="Email"  type="email" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror

            </div>

            <div class="form-group">

                <input id="password" placeholder="Password" type="password" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="form-group">


                    <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" name="password_confirmation" required autocomplete="new-password">

            </div>
            <!--end::Form group-->
            <!--begin::Form group-->
            <div class="form-group d-flex flex-wrap flex-center pb-lg-0 pb-3">
                <button type="submit" id="kt_login_forgot_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4"> {{ __('Reset Password') }}</button>
                <a href="{{ route('login') }}"> <button type="button" id="kt_login_signup_cancel" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">Cancel</button></a>
            </div>
            <!--end::Form group-->
        </form>
        <!--end::Form-->
    </div>

@endsection
