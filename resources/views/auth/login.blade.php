@extends('partials.layout')
@section('content')
    <!-- Session Status -->
    @if (session('status'))
        <div role="alert" class="alert alert-success">
            <span>{{ session('status') }}</span>
        </div>
    @endif
    <div class="card bg-base-200 w-full max-w-lg mx-auto my-8 shadow-sm">

        <div class="card-body">
            <h2 class="card-title">{{ __('Log in') }}</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">@lang('Email')</legend>
                    <input id="login_email" value="{{ old('email') }}" name="email" type="email" required
                        class="input w-full @error('email') input-error @enderror" autofocus autocomplete="username" />
                    @error('email')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                </fieldset>

                <!-- Password -->

                <fieldset class="fieldset">
                    <legend class="fieldset-legend">@lang('Password')</legend>
                    <input id="login_password" name="password" type="password" required
                        class="input w-full @error('password') input-error @enderror" autocomplete="current-password" />
                    @error('password')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                </fieldset>

                <!-- Remember Me -->
                <fieldset class="fieldset">
                    <label class="label">
                        <input type="checkbox" class="checkbox checkbox-sm" name="remember" @checked(old('remember')) />
                        {{ __('Remember me') }}
                    </label>
                </fieldset>


                <div class="flex flex-wrap items-center justify-end gap-2 mt-4">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <button type="submit" class="btn btn-primary">
                        {{ __('Log in') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
