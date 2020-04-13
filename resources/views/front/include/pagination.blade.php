@if ($data->lastPage() > 1)
    <div class="pagination flex-m flex-w p-t-10">
        <a class="item-pagination flex-c-m trans-0-4 {{ ($data->currentPage() == 1) ? ' disabled' : '' }}" href="{{ $data->url(1) }}"><i class="fa fa-angle-double-left"></i></a>
        @for ($i = 1; $i <= $data->lastPage(); $i++)
            <?php
            $half_total_links = floor($limit / 2);
            $from = $data->currentPage() - $half_total_links;
            $to = $data->currentPage() + $half_total_links;
            if ($data->currentPage() < $half_total_links) {
               $to += $half_total_links - $data->currentPage();
            }
            if ($data->lastPage() - $data->currentPage() < $half_total_links) {
                $from -= $half_total_links - ($data->lastPage() - $data->currentPage()) - 1;
            }
            ?>
            @if ($from < $i && $i < $to)
                <a class="item-pagination flex-c-m trans-0-4 {{ ($data->currentPage() == $i) ? ' active-pagination' : '' }}" href="{{ $data->url($i) }}@if($request->sort)&sort={{ $request->sort }}@endif">{{ $i }}</a>
            @endif
        @endfor
        <a class="item-pagination flex-c-m trans-0-4 {{ ($data->currentPage() == $data->lastPage()) ? ' disabled' : '' }}" href="{{ $data->url($data->lastPage()) }}"><i class="fa fa-angle-double-right"></i></a>
    </div>
@endif