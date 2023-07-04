@if (Auth::check())
    @foreach ($yeu_thich as $key => $lich_su)
    @if ($lich_su->da_thich == 1 && $lich_su->doc_gia_id == Auth::user()->id)
        <a href="#" class="bi-heart-fill" onclick="handleLike({{ $lich_su->sach_id }}); return false;" id="love_btn">
            <span id="luot_thich">{{ $sach->luot_thich }}</span>
        </a>
        <input type="text" value="1" id="like_not_like" hidden>
        @break
    @endif
    @if ($yeu_thich->count() - 1 == $key)
        <a href="#" class="bi-heart" onclick="handleLike({{ $lich_su->sach_id }}); return false;" id="love_btn">
            <span id="luot_thich">{{ $sach->luot_thich }}</span>
        </a>
        <input type="text" value="0" id="like_not_like" hidden>
    @endif
    @endforeach
    @if ($yeu_thich->count() == 0)
    <a href="#" class="bi-heart" onclick="handleLike({{ $lich_su->sach_id }}); return false;" id="love_btn">
        <span id="luot_thich">{{ $sach->luot_thich }}</span>
    </a>
    <input type="text" value="0" id="like_not_like" hidden>
    @endif
@else
    <a href="{{ route('dang-nhap') }}" class="bi-heart" id="love_btn">
        <span id="luot_thich">{{ $sach->luot_thich }}</span>
    </a>
@endif
