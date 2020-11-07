@extends('publik.layouts.app')

@section('content')
<div class="container">
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-t-50 p-b-90">
                    <form method="POST" action="{{ route('login') }}" class="login100-form validate-form flex-sb flex-w">
                        @csrf
                    <span class="login100-form-title p-b-51">
                        Login
                    </span>

                    
                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Email is required">
                            <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        <span class="focus-input100"></span>
                    </div>
                    
                    
                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
                            <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" autofocus placeholder="Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        <span class="focus-input100"></span>

                    </div>
                    
                    <div class="flex-sb-m w-full p-t-3 p-b-24">
                        <div class="contact100-form-checkbox">
                             <div class="form-check">
                                    <input class="input-checkbox100" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="label-checkbox100" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                        </div>

                        <div>
                             @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>

                    <div class="container-login100-form-btn m-t-17">
                        <button type="submit" class="login100-form-btn" style="background-color: grey">
                            {{ __('Login') }}
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    

    <div id="dropDownSelect1"></div>
</div>
@endsection

