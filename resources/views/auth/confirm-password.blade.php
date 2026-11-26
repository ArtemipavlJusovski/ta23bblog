@extends('partials.layout')
@section('content')
    <div class="card bg-base-200 w-full max-w-lg mx-auto my-8 shadow-sm">
        <div class="card-body">
            <h1 class="card-title text-2xl">{{ __('Confirm Password') }}</h1>
            <p class="text-base-content/70">{{ __('This is a secure area of the application. Please confirm your password before continuing.') }}</p>
            <form method="POST" action="{{ route('password.confirm') }}" class="space-y-4">
                @csrf
                <fieldset class="fieldset">
                    <label class="fieldset-legend" for="password">{{ __('Password') }}</label>
                    <input id="password" name="password" type="password" required autofocus autocomplete="current-password"
                        class="input w-full @error('password') input-error @enderror" />
                    @error('password')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                </fieldset>
                <div class="flex justify-end">
                    <button type="submit" class="btn btn-primary">{{ __('Confirm') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
