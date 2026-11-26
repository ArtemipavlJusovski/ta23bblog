@extends('partials.layout')
@section('content')
    <div class="max-w-4xl mx-auto my-8">
        <h1 class="text-2xl font-bold mb-4">{{ __('Profile') }}</h1>
        <div class="space-y-4">
            <div class="card bg-base-200 shadow-sm">
                <div class="card-body">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
            <div class="card bg-base-200 shadow-sm">
                <div class="card-body">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
            <div class="card bg-base-200 shadow-sm">
                <div class="card-body">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
@endsection
