@if ($paginator->hasPages())
    <nav class="pagination is-centered">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="pagination-previous" title="first page" disabled>&#10094;&#10094;</a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="pagination-previous">&#10094;&#10094;</a>
        @endif

        {{-- Pagination Elements --}}
        <ul class="pagination-list is-hidden-mobile" style="list-style: none;">
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li>
                  <span class="pagination-ellipsis">&hellip;</span>
                </li>                
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li>
                          <a class="pagination-link is-current">{{ $page }}</a>
                        </li>                        
                    @else
                        <li>
                          <a href="{{ $url }}" class="pagination-link">{{ $page }}</a>
                        </li>                        
                    @endif
                @endforeach
            @endif
        @endforeach
        </ul>


        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="pagination-next">&#10095;&#10095;</a>
        @else
            <a class="pagination-next" title="last page" disabled>&#10095;&#10095;</a>
        @endif
    </nav>
@endif
