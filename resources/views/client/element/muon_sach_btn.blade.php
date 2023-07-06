@if (Auth::check())
    {{-- Kiểm tra đang trong giỏ --}}
    @if ($sach->hasGioSach->count() > 0)
        <a href="" id="sach_{{ $sach->id }}" class="btn danger-btn"
            onclick="handleGioSach({{ $sach->id }}); return false;">Bỏ chọn</a>

        {{-- Kiểm tra đang mượn --}}
    @elseif ($sach->hasPhieuMuon->count() > 0)
        @foreach ($sach->hasPhieuMuon as $key => $phieu_muon)
            @if ($phieu_muon->doc_gia_id == Auth::id() && ($phieu_muon->trang_thai == 1 || $phieu_muon->trang_thai == 2))
                <a class="btn custom-btn disable">Đang mượn</a>
                @break
            @endif
            @if ($key == $sach->hasPhieuMuon->count() - 1)
                <a href="" id="sach_{{ $sach->id }}" class="btn custom-btn"
                    onclick="handleGioSach({{ $sach->id }}); return false;">Chọn sách</a>
            @endif
        @endforeach

        {{-- Không có trong giỏ sách && không chờ chờ hoặc đang mượn --}}
    @else
        <a href="" id="sach_{{ $sach->id }}" class="btn custom-btn"
            onclick="handleGioSach({{ $sach->id }}); return false;">Chọn sách</a>
    @endif
@else
<a href="{{ route('dang-nhap') }}" class="btn custom-btn">Chọn sách</a>
@endif
