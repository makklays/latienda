@extends('layouts.main')

@section('content')

    <div class="row">
        <div class="col-md-6 text-center vertical-align-middle" style="background-color: #e7e7e7; padding-top:300px;">
            <h1 style="font-size: 200px;">LA</h1>
            <img src="/" alt="" />
        </div>
        <div class="col-md-6" style="margin:300px auto 250px auto;">

            <div class="row">
                <div class="col-md-6 offset-3">
                    <h2>{{ trans('main.Sign In') }}</h2> <br/>
                </div>
            </div>

            <form method="POST" action="{{ route('login_process', app()->getLocale()) }}" >
                @csrf

                <div class="form-group row">
                    <div class="col-md-6 offset-3">
                        <label for="email" class="form-label">{{ trans('main.E-mail') }}</label>
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-3">
                        <label for="password" class="form-label">{{ trans('main.Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-7 offset-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ trans('main.Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-7 offset-md-3">
                        <button type="submit" class="btn btn-primary">
                            {{ trans('main.Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ trans('main.Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
