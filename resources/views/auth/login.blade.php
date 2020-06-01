@extends('layout.auth')

@section('content')
    <!--begin::Signin-->
    <div class="login-form login-signin py-11">
        <!--begin::Form-->

        <form method="POST" action="{{ route('login') }}">
        @csrf
        <!--begin::Title-->
            <div class="text-center pb-8">
                <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Sign In</h2>
                <span class="text-muted font-weight-bold font-size-h4">Or

										<a href="{{ route('register') }}" class="text-primary font-weight-bolder"  >Create An Account</a></span>
            </div>
            <!--end::Title-->
            <!--begin::Form group-->
            <div class="form-group">




                <label class="font-size-h6 font-weight-bolder text-dark">{{ __('E-Mail Address') }}</label>

                <input id="email" type="email" class="form-control  form-control-solid h-auto py-7 px-6 rounded-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror

            </div>
            <!--end::Form group-->
            <!--begin::Form group-->
            <div class="form-group">
                <div class="d-flex justify-content-between mt-n5">
                    <label class="font-size-h6 font-weight-bolder text-dark pt-5">{{ __('Password') }}</label>
                    @if (Route::has('password.request'))
                        <a class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif

                </div>
                <input id="password" type="password" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror

            </div>

            <div class="form-group text-center ">

                <label class="checkbox mb-0">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    {{ __('Remember Me') }}

                    <span></span></label>
            </div>


            <!--end::Form group-->
            <!--begin::Action-->
            <div class="text-center pt-2">
                <button id="kt_login_signin_submit" class="btn btn-dark font-weight-bolder font-size-h6 px-8 py-4 my-3">Sign In</button>
            </div>
            <!--end::Action-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Signin-->



@endsection
