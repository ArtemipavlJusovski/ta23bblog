@extends('partials.layout')
@section('content')
    <div class="max-w-4xl mx-auto my-8">
        <h1 class="text-2xl font-bold mb-4">{{ __('Dashboard') }}</h1>
        <div class="card bg-base-200 shadow-sm">
            <div class="card-body">
                <h2 class="card-title">{{ __('Welcome') }}, {{ auth()->user()->name }}!</h2>
                <p>{{ __("You're logged in!") }}</p>
                <div class="card-actions justify-end">
                    <a href="{{ route('profile.edit') }}" class="btn btn-primary">{{ __('Profile') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
