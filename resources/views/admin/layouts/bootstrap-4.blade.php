@if ($paginator->hasPages())
    <ul class="pagination  justify-content-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item"><a class="page-link" href="javascript:void(0);"><div class="li_inner"><</div></a></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}"><div class="li_inner"><img src="/img/common/chevrons-left.svg" alt="戻る"></div></a></li>
        @endif

        {{-- Pagination Elemnts --}}
        {{-- Array Of Links --}}
        {{-- 定数よりもページ数が多い時 --}}
        @if ($paginator->lastPage() > $link_size)

            {{-- 現在ページが表示するリンクの中心位置よりも左の時 --}}
            @if ($paginator->currentPage() <= floor($link_size / 2))
                <?php $start_page = 1; //最初のページ ?> 
                <?php $end_page = $link_size; ?>

            {{-- 現在ページが表示するリンクの中心位置よりも右の時 --}}
            @elseif ($paginator->currentPage() > $paginator->lastPage() - floor($link_size / 2))
                <?php $start_page = $paginator->lastPage() - ($link_size - 1); ?>
                <?php $end_page = $paginator->lastPage(); ?>

            {{-- 現在ページが表示するリンクの中心位置の時 --}}
            @else
                <?php $start_page = $paginator->currentPage() - (floor(($link_size % 2 == 0 ? $link_size - 1 : $link_size)  / 2)); ?>
                <?php $end_page = $paginator->currentPage() + floor($link_size / 2); ?>
            @endif

        {{-- 定数よりもページ数が少ない時 --}}
        @else
            <?php $start_page = 1; ?>
            <?php $end_page = $paginator->lastPage(); ?>
        @endif

        {{-- 処理部分 --}}
        @for ($i = $start_page; $i <= $end_page; $i++)
            <li class="page-item"><a class="page-link" href="{{ $paginator->url($i) }}"><div class="li_inner {{ ($paginator->currentPage() == $i) ? 'active' : '' }}">{{ $i }}</div></a></li>
        @endfor



        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}"><div class="li_inner">></div></a></li>
        @else
            <li class="page-item"><a class="page-link" href="javascript:void(0);"><div class="li_inner"><img src="/img/common/chevrons-right.svg" alt="次へ"></div></a></li>
        @endif
    </ul>
@endif

