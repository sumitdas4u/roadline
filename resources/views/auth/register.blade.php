@extends('layout.auth')

@section('content')
    <!--begin::Signup-->
    <div class="login-form  pt-11">
        <!--begin::Form-->
        <form method="POST" action="{{ route('register') }}">
        @csrf
            <!--begin::Title-->
            <div class="text-center pb-8">
                <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Sign Up</h2>
                <p class="text-muted font-weight-bold font-size-h4">Enter your details to create your account</p>
            </div>
            <!--end::Title-->
            <!--begin::Form group-->
            <div class="form-group">
                <input id="name" placeholder="Fullname" type="text" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror

            </div>
            <!--end::Form group-->
            <!--begin::Form group-->
            <div class="form-group">
                <input id="email" placeholder="Email"  type="email" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror

            </div>
            <!--end::Form group-->
            <!--begin::Form group-->
            <div class="form-group">
                <input placeholder="Password" id="password" type="password" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror


            </div>
            <!--end::Form group-->
            <!--begin::Form group-->
            <div class="form-group">
                <input id="password-confirm"  placeholder="Confirm password" type="password" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" name="password_confirmation" required autocomplete="new-password">

            </div>
            <!--end::Form group-->
            <!--begin::Form group-->

            <!--end::Form group-->
            <!--begin::Form group-->
            <div class="form-group d-flex flex-wrap flex-center pb-lg-0 pb-3">
                <button type="submit" id="kt_login_signup_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">  {{ __('Register') }}</button>
               <a href="{{ route('login') }}"> <button type="button" id="kt_login_signup_cancel" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">Cancel</button></a>
            </div>
            <!--end::Form group-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Signup-->

    @endsection

