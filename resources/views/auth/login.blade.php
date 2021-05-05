@extends('layouts.auth')

@section('content')
<p class="login-box-msg">@lang('site.login')</p>

<form action="{{ route('login') }}" method="post">
    @csrf

    <div class="input-group mb-3">
        <input id="email" type="email" name="email" placeholder="email"
            class="form-control @error('email') is-invalid @enderror"
            value="{{ old('email') }}" required autocomplete="email" autofocus>

        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
        </div>

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="input-group mb-3">
        <input id="password" type="password" placeholder="password"
            class="form-control @error('password') is-invalid @enderror"
            name="password" required autocomplete="current-password">

        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

    </div>
    <div class="row">
        <div class="col-5">
            <div class="icheck-primary">
                <input type="checkbox" id="remember"
                    name="remember" {{ old('remember') ? 'checked' : '' }}>

                <label for="remember">
                    @lang('site.remember_me')
                </label>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-7">
            <button type="submit" class="btn btn-primary btn-block">@lang('site.login')</button>
        </div>
        <!-- /.col -->
    </div>
</form>



<p class="mb-1">
    @if (Route::has('password.request'))
        <a class="btn btn-link" href="{{ route('password.request') }}">
            @lang('site.forget_password')
        </a>
    @endif
</p>
@endsection
