@if ($paginator->hasPages())
    <nav>
        <ul class="pagination p-0 m-0">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled me-2" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link border-0" aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li class="page-item me-2">
                    <a class="page-link border-0" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                        aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span
                            class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><span
                                    class="page-link  border-0 me-1">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link border-0 me-1"
                                    href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item ms-1">
                    <a class="page-link border-0" href="{{ $paginator->nextPageUrl() }}" rel="next"
                        aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="page-item disabled ms-1" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link border-0" aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
