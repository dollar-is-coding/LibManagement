{{-- @foreach ($yeu_thich as $key => $lich_su)
    @if ($lich_su->da_thich == 1 && $lich_su->doc_gia_id == Auth::user()->id)
        <a href="{{ route('yeu-thich', ['sach' => $sach->id]) }}" class="bi-heart-fill">
            <span>{{ $sach->luot_thich }}</span>
        </a>
        <input type="text" value="1" id="like_not_like">
        @break
    @endif
    @if ($yeu_thich->count() - 1 == $key)
        <a href="{{ route('yeu-thich', ['sach' => $sach->id]) }}" class="bi-heart">
            <span>{{ $sach->luot_thich }}</span>
        </a>
        <input type="text" value="0" id="like_not_like">
    @endif
@endforeach
@if ($yeu_thich->count() == 0)
<a href="{{ route('yeu-thich', ['sach' => $sach->id]) }}" class="bi-heart">
    <span>{{ $sach->luot_thich }}</span>
</a>
<input type="text" value="0" id="like_not_like">
@endif --}}


@foreach ($yeu_thich as $key => $lich_su)
    @if ($lich_su->da_thich == 1 && $lich_su->doc_gia_id == Auth::user()->id)
        <a class="bi-heart-fill" onclick="handleLike({{ $lich_su->sach_id }})" id="love_btn">
            <span id="luot_thich">{{ $sach->luot_thich }}</span>
        </a>
        <input type="text" value="1" id="like_not_like" hidden>
        @break
    @endif
    @if ($yeu_thich->count() - 1 == $key)
        <a class="bi-heart" onclick="handleLike({{ $lich_su->sach_id }})" id="love_btn">
            <span id="luot_thich">{{ $sach->luot_thich }}</span>
        </a>
        <input type="text" value="0" id="like_not_like" hidden>
    @endif
@endforeach
@if ($yeu_thich->count() == 0)
<a class="bi-heart" onclick="handleLike({{ $lich_su->sach_id }})" id="love_btn">
    <span id="luot_thich">{{ $sach->luot_thich }}</span>
</a>
<input type="text" value="0" id="like_not_like" hidden>
@endif
