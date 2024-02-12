<div class="pagination">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <span class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <span aria-hidden="true">&lsaquo;</span>
        </span>
    @else
        <span wire:click="previousPage" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</span>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <span class="disabled" aria-disabled="true"><span>{{ $element }}</span></span>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span class="active" aria-current="page"><span>{{ $page }}</span></span>
                @else
                    <span wire:click="gotoPage({{ $page }})"><span>{{ $page }}</span></span>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <span wire:click="nextPage" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</span>
    @else
        <span class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
            <span aria-hidden="true">&rsaquo;</span>
        </span>
    @endif
</div>
