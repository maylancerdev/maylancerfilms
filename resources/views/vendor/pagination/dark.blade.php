@if ($paginator->hasPages())
<nav role="navigation" aria-label="Pagination">
    <ul class="tp-pagination d-flex align-items-center justify-content-center gap-2 list-unstyled mb-0">
        {{-- Previous --}}
        @if ($paginator->onFirstPage())
            <li class="tp-pagination-item disabled">
                <span class="tp-pagination-link tp-ff-inter fw-500 fs-15">&laquo;</span>
            </li>
        @else
            <li class="tp-pagination-item">
                <a href="{{ $paginator->previousPageUrl() }}" class="tp-pagination-link tp-ff-inter fw-500 fs-15" rel="prev">&laquo;</a>
            </li>
        @endif

        {{-- Pages --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="tp-pagination-item disabled">
                    <span class="tp-pagination-link tp-ff-inter fw-500 fs-15">{{ $element }}</span>
                </li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="tp-pagination-item active">
                            <span class="tp-pagination-link tp-ff-inter fw-600 fs-15">{{ $page }}</span>
                        </li>
                    @else
                        <li class="tp-pagination-item">
                            <a href="{{ $url }}" class="tp-pagination-link tp-ff-inter fw-500 fs-15">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next --}}
        @if ($paginator->hasMorePages())
            <li class="tp-pagination-item">
                <a href="{{ $paginator->nextPageUrl() }}" class="tp-pagination-link tp-ff-inter fw-500 fs-15" rel="next">&raquo;</a>
            </li>
        @else
            <li class="tp-pagination-item disabled">
                <span class="tp-pagination-link tp-ff-inter fw-500 fs-15">&raquo;</span>
            </li>
        @endif
    </ul>
</nav>
@endif
