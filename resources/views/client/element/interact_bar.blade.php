<a class="bi-eye"><span>{{ $sach->luot_xem }}</span></a>
@foreach ($sach->hasYeuThich as $key => $lich_su)
    @if ($lich_su->da_thich == 1 && $lich_su->doc_gia_id == Auth::user()->id)
        <a class="bi-heart-fill"><span>{{ $sach->luot_thich }}</span></a>
        @break
    @endif
    @if ($sach->hasYeuThich->count() - 1 == $key)
        <a class="bi-heart"><span>{{ $sach->luot_thich }}</span></a>
    @endif
@endforeach
@if ($sach->hasYeuThich->count() == 0)
<a class="bi-heart me-1"><span>{{ $sach->luot_thich }}</span></a>
@endif
<a class="bi-chat me-1"><span>{{ $sach->luot_binh_luan }}</span></a>
