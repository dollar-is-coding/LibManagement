<div class="custom-block-bottom d-flex justify-content-between sono" style="color: #717275">
    <p class="bi-eye mb-0">&nbsp;{{ $sach->luot_xem }}</p>
    @if (Auth::check())
        @foreach ($sach->hasYeuThich as $key => $lich_su)
            @if ($lich_su->da_thich == 1 && $lich_su->doc_gia_id == Auth::user()->id)
                <p class="bi-heart-fill mb-0">&nbsp;{{ $sach->luot_thich }}</p>
                @break
            @endif
            @if ($sach->hasYeuThich->count() - 1 == $key)
                <p class="bi-heart mb-0">&nbsp;{{ $sach->luot_thich }}</p>
            @endif
        @endforeach
        @if ($sach->hasYeuThich->count() == 0)
            <p class="bi-heart mb-0">&nbsp;{{ $sach->luot_thich }}</p>
        @endif
    @else
        <p class="bi-heart mb-0">&nbsp;{{ $sach->luot_thich }}</p>
    @endif
    <p class="bi-chat mb-0">&nbsp;{{ $sach->luot_binh_luan }}</p>
</div>
