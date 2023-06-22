@if ($phieu_phat->count() <= 0)
    <div class="sono d-flex justify-content-center mt-5 mb-5 ">
        <div class="disable-text"><strong>Không có phiếu phạt nào!</strong></div>
    </div>
@else
    @foreach ($phieu_phat as $key => $item)
        @if ($key == 0 || $item->ma_phieu != $phieu_phat[$key - 1]->ma_phieu)
            <div class="mt-4" style="font-family: 'sono'">
                <div class="custom-block">
                    <div class="d-flex align-items-center justify-content-between">
                        <h6 class="m-0">Mã số: #{{ $item->ma_phieu }}</h6>
                        <div class="m-0"><strong>Tổng số lượng
                                ({{ $item->tong_so_luong }})
                            </strong>
                        </div>
                    </div>
        @endif
        @if (
            $key == $phieu_phat->count() - 1 ||
                ($key != $phieu_phat->count() - 1 && $item->ma_phieu != $phieu_phat[$key + 1]->ma_phieu))
            <hr>
            <div class="d-flex justify-content-between">
                <div class="d-flex" style="width:70%">
                    <div class="custom-block-icon-wrap">
                        <div class="section-overlay"></div>
                        <a class="custom-block-image-wrap">
                            @if ($item->fkSach->hinh_anh != '')
                                <img src="../img/books/{{ $item->fkSach->hinh_anh }}"
                                    class="custom-block-image img-fluid" alt="" />
                            @else
                                <img src="../img/default/no_book.jpg" class="custom-block-image img-fluid border"
                                    alt="" />
                            @endif
                        </a>
                    </div>
                    <div class="custom-block-info d-flex flex-column justify-content-start">
                        <div><strong>{{ $item->fkSach->ten }}</strong></div>
                        <div class="d-flex">
                            <p class="m-0">Tác giả:&nbsp;</p>
                            <div>{{ $item->fkSach->fkTacGia->ten }}</div>
                        </div>
                        <div class="d-flex">
                            <p class="m-0">Thể loại:&nbsp;</p>
                            <div> {{ $item->fkSach->fkTheLoai->ten }}</div>
                        </div>
                        <div class="d-flex">
                            <p class="m-0">Nhà xuất bản:&nbsp;</p>
                            <div> {{ $item->fkSach->fkNhaXuatBan->ten }}</div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center" style="width:10%">
                    <div class="m-0">Số lượng x1</div>
                </div>
            </div>
            <hr>
            <div class="d-flex align-items-center justify-content-start">
                <div class="d-flex">
                    <p class="m-0">Ngày phạt:&nbsp;</p>
                    <div>{{ date('d-m-Y', strtotime($item->created_at)) }}</div>
                </div>
            </div>
            </div>
            </div>
        @else
            <hr>
            <div class="d-flex justify-content-between">
                <div class="d-flex" style="width:55%">
                    <div class="custom-block-icon-wrap">
                        <div class="section-overlay"></div>
                        <a class="custom-block-image-wrap">
                            @if ($item->fkSach != '')
                                <img src="../img/books/{{ $item->fkSach }}" class="custom-block-image img-fluid"
                                    alt="" />
                            @else
                                <img src="../img/default/no_book.jpg" class="custom-block-image img-fluid border"
                                    alt="" />
                            @endif
                        </a>
                    </div>
                    <div class="custom-block-info d-flex flex-column justify-content-start">
                        <div><strong>{{ $item->fkSach->ten }}</strong></div>
                        <div class="d-flex">
                            <p class="m-0">Tác giả:&nbsp;</p>
                            <div> {{ $item->fkSach->fkTacGia->ten }}</div>
                        </div>
                        <div class="d-flex">
                            <p class="m-0">Thể loại:&nbsp;</p>
                            <div> {{ $item->fkSach->fkTheLoai->ten }}</div>
                        </div>
                        <div class="d-flex">
                            <p class="m-0">Nhà xuất bản:&nbsp;</p>
                            <div> {{ $item->fkSach->fkNhaXuatBan->ten }}</div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center" style="width:10%">
                    <div class="m-0">Số lượng x1</div>
                </div>
            </div>
        @endif
    @endforeach
@endif
