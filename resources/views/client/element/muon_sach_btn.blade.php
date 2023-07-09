@if (Auth::check())
    {{-- Kiểm tra đang trong giỏ --}}
    @if ($sach->hasGioSach->count() > 0)
        @foreach ($sach->hasGioSach as $key => $item)
            @if ($item->doc_gia_id == Auth::id())
                <a href="" id="sach_{{ $sach->id }}" class="btn danger-btn"
                    onclick="handleGioSach({{ $sach->id }},{{ $sach->hasThuVien->sl_con_lai }}); return false;">
                    Bỏ chọn</a>
            @break
        @endif
        @if ($sach->hasGioSach->count() - 1 == $key)
            @if ($sach->hasThuVien->sl_con_lai > 0)
                <a href="" id="sach_{{ $sach->id }}" class="btn custom-btn"
                    onclick="handleGioSach({{ $sach->id }},{{ $sach->hasThuVien->sl_con_lai }}); return false;">
                    Chọn sách</a>
            @else
                <a href="" class="btn custom-btn bg-secondary" onclick="return false;">Hết sách</a>
            @endif
        @endif
    @endforeach

    {{-- Kiểm tra đang mượn --}}
@elseif ($sach->hasPhieuMuon->count() > 0)
    @foreach ($sach->hasPhieuMuon as $key => $phieu_muon)
        @if ($phieu_muon->doc_gia_id == Auth::id() && ($phieu_muon->trang_thai == 1 || $phieu_muon->trang_thai == 2))
            <a class="btn custom-btn disable">Đang mượn</a>
        @break
    @endif
    @if ($key == $sach->hasPhieuMuon->count() - 1)
        @if ($sach->hasThuVien->sl_con_lai > 0)
            <a href="" id="sach_{{ $sach->id }}" class="btn custom-btn"
                onclick="handleGioSach({{ $sach->id }},{{ $sach->hasThuVien->sl_con_lai }}); return false;">
                Chọn sách</a>
        @else
            <a href="" class="btn custom-btn bg-secondary" onclick="return false;">Hết sách</a>
        @endif
    @endif
@endforeach
{{-- Không có trong giỏ sách && không chờ chờ hoặc đang mượn --}}
@elseif ($sach->hasThuVien->sl_con_lai == 0)
<a href="" class="btn custom-btn bg-secondary" onclick="return false;">Hết sách</a>
@else
<a href="" id="sach_{{ $sach->id }}" class="btn custom-btn"
    onclick="handleGioSach({{ $sach->id }},{{ $sach->hasThuVien->sl_con_lai }}); return false;">
    Chọn sách</a>
@endif
@elseif ($sach->hasThuVien->sl_con_lai == 0)
<a href="" class="btn custom-btn bg-secondary" onclick="return false;">Hết sách</a>
@else
<a href="{{ route('dang-nhap') }}" class="btn custom-btn">Chọn sách</a>
@endif
