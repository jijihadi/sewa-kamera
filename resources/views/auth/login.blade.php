@extends('./layouts.login')

@section('content')
<section class="p-t-104 p-b-116">
    <div class="container">
        <div class="flex-w flex-tr" style="align-items: center;display: flex; justify-content: center;">
            <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md"
                style="background: #FFF; border-radius: 2%">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h4 class="mtext-105 cl2 txt-center p-b-30">
                        Log <b>In</b>
                    </h4>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input id="email" type="email"
                            class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30 form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email"
                            autofocus placeholder="Your Email Address">
                        <span class="how-pos4 pointer-none lnr lnr-envelope"></span>
                    </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input id="password" type="password"
                            class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30 form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password" placeholder="********">
                        <span class="how-pos4 pointer-none lnr lnr-lock"></span>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer m-b-10"
                        type="submit">
                        Login
                    </button>
                    <div class="m-b-20 how-pos4-parent">
                        <input class="form-check-input m-l-3" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label m-l-3" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                    @if(Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                    <a>|</a>
                    <a class="btn btn-link" href="{{ route('home') }}"> Back to home</a>
                </form>
            </div>

        </div>
    </div>
</section>


@endsection
