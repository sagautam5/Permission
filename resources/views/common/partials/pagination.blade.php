@if ($paginator->lastPage() > 1)

    <div class="pagination">
        @if($paginator->currentPage() != 1)
            <a href="{{ $paginator->url($paginator->currentPage()-1) }}">Previous</a>
        @endif
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                       @if($paginator->currentPage()==$i)
                        <span class="current">{{ $i }}</span>
                       @else
                    <a class="page larger" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                           @endif
            
        @endfor
        @if($paginator->currentPage() != $paginator->lastPage())
            <a class="nextpostslink" rel="next" href="{{ $paginator->url($paginator->currentPage()+1) }}">Next</a>
        @endif
    </div>
@endif