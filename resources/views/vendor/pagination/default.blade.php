@if ($paginator->hasPages())

if( Request::segment(2) == 'history_teh_keluar' ) {
if(@Input::get('date') != '' && @Input::get('metode') != '' && @Input::get('wilayah') != '' && @Input::get('kode_teh')
!= '') {
$addurl = '?date' . Input::get('date') . '&metode=' . Input::get('metode') . '&wilayah=' . Input::get('wilayah').
'&kode_teh=' . Input::get('kode_teh');
}else{
$addurl = '';
}
} else if( Request::segment(2) == 'table_penjualan' ) {
if(@Input::get('fromDate') != '' && @Input::get('toDate') != '') {
$addurl = '?fromDate=' . Input::get('fromDate') . '&toDate=' . Input::get('toDate') ;
} else if(@Input::get('metode') != '' && @Input::get('wilayah') != '' && @Input::get('kode_teh') != '') {
$addurl = '&metode=' . Input::get('metode') . '&wilayah=' . Input::get('wilayah'). '&kode_teh=' .
Input::get('kode_teh');
} else {
$addurl = '';
}
} else if( Request::segment(2) == 'table_penjualan_by_distributor' ) {
if(@Input::get('fromDate') != '' && @Input::get('toDate') != '') {
$addurl = '?fromDate=' . Input::get('fromDate') . '&toDate=' . Input::get('toDate') ;
} else if(@Input::get('metode') != '' && @Input::get('wilayah') != '' && @Input::get('kode_teh') != '') {
$addurl = '&metode=' . Input::get('metode') . '&wilayah=' . Input::get('wilayah'). '&kode_teh=' .
Input::get('kode_teh');
} else {
$addurl = '';
}

}
?>
<ul class="pagination">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
    @else
    <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() . $addurl}}"
            rel="prev">&laquo;</a></li>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
    {{-- "Three Dots" Separator --}}
    @if (is_string($element))
    <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
    @endif

    {{-- Array Of Links --}}
    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())
    <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
    @else
    <li class="page-item"><a class="page-link" href="{{ $url . $addurl }}">{{ $page }}</a></li>
    @endif
    @endforeach
    @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    <li class="page-item"><a class="page-link" href="{{  $paginator->nextPageUrl() . $addurl }}" rel="next">&raquo;</a>
    </li>
    @else
    <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
    @endif
</ul>
@endif