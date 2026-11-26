@extends('partials.layout')
@section('content')
    <div class="card bg-base-200 w-full max-w-lg mx-auto my-8 shadow-sm">
        <div class="card-body">
            <h1 class="card-title text-2xl">{{ __('Forgot your password?') }}</h1>
            <p class="text-base-content/70">{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}</p>
            @if (session('status'))
                <div role="status" class="alert alert-success">{{ session('status') }}</div>
            @endif
            <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                @csrf
                <fieldset class="fieldset">
                    <label class="fieldset-legend" for="email">{{ __('Email') }}</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                        class="input w-full @error('email') input-error @enderror" />
                    @error('email')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                </fieldset>
                <div class="flex flex-wrap justify-end gap-2">
                    <a href="{{ route('login') }}" class="btn btn-ghost">{{ __('Log in') }}</a>
                    <button type="submit" class="btn btn-primary">{{ __('Email Password Reset Link') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
