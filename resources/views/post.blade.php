@extends('partials.layout')

@section('content')
    <div class="max-w-4xl mx-auto my-6 space-y-6">
        @include('partials.post-card', ['full' => true])

        <section id="comments" class="space-y-4">
            <h2 class="text-2xl font-bold">
                {{ __('Comments') }} ({{ $post->comments_count }})
            </h2>

            @if (session('comment_added'))
                <div role="status" class="alert alert-success">
                    {{ __('Comment added successfully.') }}
                </div>
            @endif

            @auth
                <form method="POST" action="{{ route('post.comments.store', $post) }}" class="card bg-base-200 shadow-sm">
                    @csrf
                    <div class="card-body">
                        <label for="comment-body" class="font-semibold">{{ __('Add a comment') }}</label>
                        <textarea id="comment-body" name="body" rows="4" minlength="2" maxlength="2000"
                            class="textarea textarea-bordered w-full @error('body') textarea-error @enderror"
                            placeholder="{{ __('Write your comment here...') }}" required>{{ old('body') }}</textarea>
                        @error('body')
                            <p class="text-error text-sm">{{ $message }}</p>
                        @enderror
                        <div class="card-actions justify-end">
                            <button type="submit" class="btn btn-primary">{{ __('Post comment') }}</button>
                        </div>
                    </div>
                </form>
            @else
                <div class="alert">
                    <span>{{ __('Please log in to leave a comment.') }}</span>
                    <a href="{{ route('login') }}" class="btn btn-primary btn-sm">{{ __('Log in') }}</a>
                </div>
            @endauth

            <div class="space-y-3">
                @forelse ($post->comments as $comment)
                    <article class="card bg-base-200 shadow-sm">
                        <div class="card-body">
                            <div class="flex flex-wrap items-center justify-between gap-2">
                                <span class="font-semibold">{{ $comment->user?->name ?? __('Deleted user') }}</span>
                                <time class="text-xs text-base-content/60" datetime="{{ $comment->created_at?->toIso8601String() }}">
                                    {{ $comment->created_at?->diffForHumans() }}
                                </time>
                            </div>
                            <p class="whitespace-pre-wrap break-words">{{ $comment->body }}</p>
                        </div>
                    </article>
                @empty
                    <p class="text-base-content/70">{{ __('No comments yet. Be the first to comment!') }}</p>
                @endforelse
            </div>
        </section>
    </div>
@endsection
