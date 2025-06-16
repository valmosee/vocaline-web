@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-center space-x-1 text-sm">
        {{-- First Page Link --}}
        @if (!$paginator->onFirstPage())
            <a href="{{ $paginator->url(1) }}" class="px-3 py-1 rounded bg-white border hover:bg-blue-100 text-gray-600">&laquo; First</a>
        @endif

        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="px-3 py-1 rounded bg-gray-100 border text-gray-400">&lsaquo; Prev</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-1 rounded bg-white border hover:bg-blue-100 text-gray-600">&lsaquo; Prev</a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="px-3 py-1 rounded bg-gray-100 border text-gray-400">{{ $element }}</span>
            @endif

            {{-- Array of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="px-3 py-1 rounded bg-blue-500 border text-white font-semibold">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="px-3 py-1 rounded bg-white border hover:bg-blue-100 text-gray-600">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-1 rounded bg-white border hover:bg-blue-100 text-gray-600">Next &rsaquo;</a>
        @else
            <span class="px-3 py-1 rounded bg-gray-100 border text-gray-400">Next &rsaquo;</span>
        @endif

        {{-- Last Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->url($paginator->lastPage()) }}" class="px-3 py-1 rounded bg-white border hover:bg-blue-100 text-gray-600">Last &raquo;</a>
        @endif
    </nav>
@endif
