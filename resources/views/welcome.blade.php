@extends('partials.layout')
@section('content')
    @isset($tag)
        <h1 class="text-2xl font-bold mb-4">Posts tagged: {{ $tag->name }}</h1>
    @endisset
    {{ $posts->links() }}
    <div class="grid grid-cols-4 gap-2">
        @foreach($posts as $post)
            @include('partials.post-card')
        @endforeach
    </div>
    @if ($posts->isEmpty())
        <p class="py-6 text-center text-base-content/70">No posts found{{ isset($tag) ? ' for this tag' : '' }}.</p>
    @endif
@endsection
