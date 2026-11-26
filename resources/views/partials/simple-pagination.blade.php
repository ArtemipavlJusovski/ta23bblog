@if ($paginator->hasPages())
    <nav class="my-2 flex justify-center" aria-label="Pagination">
        <div class="join">
            @if ($paginator->onFirstPage())
                <button type="button" class="join-item btn btn-disabled" disabled aria-disabled="true">@lang('pagination.previous')</button>
            @else
                <a class="join-item btn" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
            @endif
            @if ($paginator->hasMorePages())
                <a class="join-item btn" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
            @else
                <button type="button" class="join-item btn btn-disabled" disabled aria-disabled="true">@lang('pagination.next')</button>
            @endif
        </div>
    </nav>
@endif
