<ul class="pagination" itemscope itemtype="http://schema.org/SiteNavigationElement/Pagination">
    {{-- Previous Page Link --}}

    @if ($paginator->onFirstPage())
        <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span> <span class="sr-only">Previous</span>
            </a>
        </li>
    @else
        <li class="page-item">
            <a class="page-link" tabindex="-1" aria-label="Previous" href="{{ $paginator->previousPageUrl() }}" rel="prev" itemprop="relatedLink/pagination">
                <span aria-hidden="true">&laquo;</span> <span class="sr-only">Previous</span>
            </a>
        </li>
    @endif


    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <li class="page-item disabled"><a class="page-link" href="#"><span>{{ $element }}</span></a></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="page-item active"> <a class="page-link" href="{{ $url }}">{{ $page }} <span class="sr-only">(current)</span></a> </li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next"  rel="next" itemprop="relatedLink/pagination">
                    <span aria-hidden="true">&raquo;</span> <span class="sr-only">Next</span>
                </a>
        </li>
    @else
        <li class="page-item disabled">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span> <span class="sr-only">Next</span>
                </a>
        </li>

    @endif
</ul>
