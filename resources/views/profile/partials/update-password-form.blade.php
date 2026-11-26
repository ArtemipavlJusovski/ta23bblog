<section>
    <header>
        <h2 class="card-title">{{ __('Update Password') }}</h2>
        <p class="text-base-content/70 mt-1">{{ __('Ensure your account is using a long, random password to stay secure.') }}</p>
    </header>

    <form method="POST" action="{{ route('password.update') }}" class="mt-4 space-y-4">
        @csrf
        @method('put')

        <fieldset class="fieldset">
            <label for="update_password_current_password" class="fieldset-legend">{{ __('Current Password') }}</label>
            <input id="update_password_current_password" name="current_password" type="password" autocomplete="current-password"
                class="input w-full @if($errors->updatePassword->has('current_password')) input-error @endif" />
            @foreach ($errors->updatePassword->get('current_password') as $error)
                <p class="label text-error">{{ $error }}</p>
            @endforeach
        </fieldset>

        <fieldset class="fieldset">
            <label for="update_password_password" class="fieldset-legend">{{ __('New Password') }}</label>
            <input id="update_password_password" name="password" type="password" autocomplete="new-password"
                class="input w-full @if($errors->updatePassword->has('password')) input-error @endif" />
            @foreach ($errors->updatePassword->get('password') as $error)
                <p class="label text-error">{{ $error }}</p>
            @endforeach
        </fieldset>

        <fieldset class="fieldset">
            <label for="update_password_password_confirmation" class="fieldset-legend">{{ __('Confirm Password') }}</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password"
                class="input w-full @if($errors->updatePassword->has('password_confirmation')) input-error @endif" />
            @foreach ($errors->updatePassword->get('password_confirmation') as $error)
                <p class="label text-error">{{ $error }}</p>
            @endforeach
        </fieldset>

        <div class="flex flex-wrap items-center gap-3">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
            @if (session('status') === 'password-updated')
                <span role="status" class="text-success">{{ __('Saved.') }}</span>
            @endif
        </div>
    </form>
</section>
