<section>
    <header>
        <h2 class="card-title">{{ __('Profile Information') }}</h2>
        <p class="text-base-content/70 mt-1">{{ __("Update your account's profile information and email address.") }}</p>
    </header>

    <form id="send-verification" method="POST" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="POST" action="{{ route('profile.update') }}" class="mt-4 space-y-4">
        @csrf
        @method('patch')

        <fieldset class="fieldset">
            <label for="name" class="fieldset-legend">{{ __('Name') }}</label>
            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required autocomplete="name"
                class="input w-full @error('name') input-error @enderror" />
            @error('name')
                <p class="label text-error">{{ $message }}</p>
            @enderror
        </fieldset>

        <fieldset class="fieldset">
            <label for="email" class="fieldset-legend">{{ __('Email') }}</label>
            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required autocomplete="username"
                class="input w-full @error('email') input-error @enderror" />
            @error('email')
                <p class="label text-error">{{ $message }}</p>
            @enderror
        </fieldset>

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="alert alert-warning flex-wrap">
                <span>{{ __('Your email address is unverified.') }}</span>
                <button type="submit" form="send-verification" class="btn btn-sm btn-outline">
                    {{ __('Click here to re-send the verification email.') }}
                </button>
            </div>
            @if (session('status') === 'verification-link-sent')
                <div role="status" class="alert alert-success">{{ __('A new verification link has been sent to your email address.') }}</div>
            @endif
        @endif

        <div class="flex flex-wrap items-center gap-3">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
            @if (session('status') === 'profile-updated')
                <span role="status" class="text-success">{{ __('Saved.') }}</span>
            @endif
        </div>
    </form>
</section>
