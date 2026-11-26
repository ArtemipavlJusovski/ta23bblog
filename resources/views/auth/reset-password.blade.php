@extends('partials.layout')
@section('content')
    <div class="card bg-base-200 w-full max-w-lg mx-auto my-8 shadow-sm">
        <div class="card-body">
            <h1 class="card-title text-2xl">{{ __('Reset Password') }}</h1>
            <form method="POST" action="{{ route('password.store') }}" class="space-y-4">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <fieldset class="fieldset">
                    <label class="fieldset-legend" for="email">{{ __('Email') }}</label>
                    <input id="email" name="email" type="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username"
                        class="input w-full @error('email') input-error @enderror" />
                    @error('email')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                </fieldset>
                <fieldset class="fieldset">
                    <label class="fieldset-legend" for="password">{{ __('Password') }}</label>
                    <input id="password" name="password" type="password" required autocomplete="new-password"
                        class="input w-full @error('password') input-error @enderror" />
                    @error('password')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                </fieldset>
                <fieldset class="fieldset">
                    <label class="fieldset-legend" for="password_confirmation">{{ __('Confirm Password') }}</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"
                        class="input w-full @error('password_confirmation') input-error @enderror" />
                    @error('password_confirmation')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                </fieldset>
                <div class="flex justify-end">
                    <button type="submit" class="btn btn-primary">{{ __('Reset Password') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
