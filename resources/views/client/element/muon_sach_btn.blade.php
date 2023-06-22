{{-- Sách không được mượn --}}
@if ($sach->hasPhieuMuon->count() == 0)
    @if ($sach->hasGioSach->count()==0)
        <a class="btn custom-btn" id="sach_{{$sach->id}}" onclick="handleGioSach({{$sach->id}})">Chọn sách</a>
    @else
        @foreach ($sach->hasGioSach as $key_gs=> $gio_sach)
            @if ($gio_sach->doc_gia_id==Auth::id())
                <a id="sach_{{$sach->id}}" onclick="handleGioSach({{$sach->id}})" class="btn danger-btn">Bỏ chọn</a>
                @break
            @endif
            @if ($gio_sach->hasGioSach->count()-1==$key_gs)
                <a class="btn custom-btn" id="sach_{{$sach->id}}" onclick="handleGioSach({{$sach->id}})">Chọn sách</a>
            @endif
        @endforeach
    @endif
{{-- Sách được mượn --}}
@else
    @foreach ($sach->hasPhieuMuon as $pm_key => $phieu_muon)
        @if (($phieu_muon->doc_gia_id == Auth::id() && $phieu_muon->trang_thai == 1) || $phieu_muon->trang_thai == 2)
            <a class="btn custom-btn disable">Đang mượn</a>
            @break
        @endif
        @if ($sach->hasPhieuMuon->count()-1==$pm_key)
            @if ($sach->hasGioSach->count()==0)
                <a class="btn custom-btn" id="sach_{{$sach->id}}" onclick="handleGioSach({{$sach->id}})">Chọn sách</a>
            @else
                @foreach ($sach->hasGioSach as $key_gs=> $gio_sach)
                    @if ($gio_sach->doc_gia_id==Auth::id())
                        <a id="sach_{{$sach->id}}" onclick="handleGioSach({{$sach->id}})" class="btn danger-btn">Bỏ chọn</a>
                        @break
                    @endif
                    @if ($gio_sach->hasGioSach->count()-1==$key_gs)
                        <a class="btn custom-btn" id="sach_{{$sach->id}}" onclick="handleGioSach({{$sach->id}})">Chọn sách</a>
                    @endif
                @endforeach
            @endif
        @endif
    @endforeach
@endif
