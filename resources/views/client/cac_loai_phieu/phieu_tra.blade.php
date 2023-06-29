@if ($da_tra->count() <= 0)
    <div class="sono d-flex justify-content-center mt-5 mb-5 ">
        <div class="disable-text"><strong>Không có phiếu trả nào!</strong></div>
    </div>
@else
    @foreach ($da_tra as $key => $item)
        @if ($key == 0 || $item->ma_phieu_muon != $da_tra[$key - 1]->ma_phieu_muon)
            <div class="mt-4" style="font-family: 'sono'">
                <div class="custom-block">
                    <div class="d-flex align-items-center justify-content-between">
                        <h6 class="m-0">Mã số: #{{ $item->ma_phieu_muon }}</h6>
                        <div class="m-0"><strong>Tổng số lượng
                                ({{ $item->tong_so_luong }})
                            </strong>
                        </div>
                    </div>
        @endif
        <hr>
        <div class="d-flex justify-content-between">
            <div class="d-flex" style="width:55%">
                <div class="custom-block-icon-wrap">
                    <div class="section-overlay"></div>
                    <a class="custom-block-image-wrap" href="{{ route('thong-tin-sach', ['id' => $item->fkSach->id]) }}"
                        style="color: black">
                        @if ($item->fkSach->hinh_anh != '')
                            <img src="../img/books/{{ $item->fkSach->hinh_anh }}" class="custom-block-image img-fluid"
                                alt="" />
                        @else
                            <img src="../img/default/no_book.jpg" class="custom-block-image img-fluid border"
                                alt="" />
                        @endif
                    </a>
                </div>
                <div class="custom-block-info d-flex flex-column justify-content-start">
                    <a href="{{ route('thong-tin-sach', ['id' => $item->fkSach->id]) }}" style="color: black">
                        <strong>{{ $item->fkSach->ten }}</strong>
                    </a>
                    <div class="d-flex">
                        <p class="m-0">Tác giả:&nbsp;</p>
                        <div> {{ $item->fkSach->fkTacGia->ten }}</div>
                    </div>
                    <div class="d-flex">
                        <p class="m-0">Năm xuất bản:&nbsp;</p>
                        <div> {{ $item->fkSach->nam_xuat_ban }}</div>
                    </div>
                    <div class="d-flex">
                        <p class="m-0">Thể loại:&nbsp;</p>
                        <div> {{ $item->fkSach->fkTheLoai->ten }}</div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center" style="width:10%">
                <div class="m-0">Số lượng x1</div>
            </div>
        </div>
        @if (
            ($key != $da_tra->count() - 1 && $item->ma_phieu_muon != $da_tra[$key + 1]->ma_phieu_muon) ||
                $key == $da_tra->count() - 1)
            <hr>
            <div class="d-flex align-items-center justify-content-start">
                <div class="d-flex">
                    <p class="m-0">Ngày mượn:&nbsp;</p>
                    <div>{{ date('d-m-Y', strtotime($item->created_at)) }}</div>
                </div>
                <div class="m-4 mt-0 mb-0">&#8226;</div>
                <div class="d-flex">
                    <p class="m-0">Ngày cần trả:&nbsp;</p>
                    <div>{{ date('d-m-Y', strtotime($item->han_tra)) }}</div>
                </div>
                <div class="m-4 mt-0 mb-0">&#8226;</div>
                <div class="d-flex">
                    <p class="m-0">Ngày trả:&nbsp;</p>
                    <div>{{ date('d-m-Y', strtotime($item->updated_at)) }}</div>
                </div>
                <div class="m-4 mt-0 mb-0">&#8226;</div>
                @if ($item->updated_at <= $item->han_tra)
                    <div class="meet-deadline"><strong>Đúng hạn</strong></div>
                @else
                    <div class="miss-deadline"><strong>
                            Trễ hạn {{ $item->updated_at->diffInDays($item->han_tra) }}
                            ngày
                        </strong></div>
                @endif
            </div>
            </div>
            </div>
        @endif
    @endforeach

@endif
