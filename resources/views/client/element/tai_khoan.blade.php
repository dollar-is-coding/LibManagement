<div class="col-lg-8 col-12 mx-auto">
    <div class="mb-5 d-flex custom-block">
        <form action="{{ route('cap-nhat-thong-tin') }}" method="POST" enctype="multipart/form-data"
            class="d-flex flex-column">
            @csrf
            <div class="ongnoi col-lg-4">
                <div class="cha">
                    <div class="con1">
                        @if (Auth::user()->hinh_anh == '')
                            <img class="ca border rounded-circle" id="image" alt="" srcset=""
                                src="../img/default/no_avatar.png" width="200px" height="200px"
                                style="object-fit:cover">
                        @else
                            <img class="ca border rounded-circle" id="image" alt="" srcset=""
                                src="../img/avt/{{ Auth::user()->hinh_anh }}" width="200px" height="200px"
                                style="object-fit:cover">
                        @endif
                    </div>
                    <div class="con2">
                        <label for="file"></label>
                        <input class="chau1" type="file" value="" onchange="chooseFile(this)" name="file"
                            accept="image/gif, image/jpeg, image/png, image/jpg">
                    </div>
                </div>
            </div>
            <button class="btn comment-btn smoothscroll align-self-center mt-2">
                Cập nhật ảnh</button>
        </form>
        <div class="m-4"></div>
        <div class="flex-fill d-flex flex-column justify-content-evenly">
            <div class="d-flex justify-content-between">
                <div>
                    <h4>{{ Auth::user()->ho }} {{ Auth::user()->ten }}</h4>
                    <div class="d-flex align-items-center sono">
                        <p class="m-0">Mã số:&nbsp;</p>
                        <div>1234567</div>
                    </div>
                    <div class="d-flex align-items-center sono">
                        <p class="m-0">Giới tính:&nbsp;</p>
                        <div>{{ Auth::user()->gioi_tinh == 1 ? 'Nam' : 'Nữ' }}</div>
                    </div>
                    <div class="d-flex align-items-center sono">
                        <p class="m-0">Ngày sinh:&nbsp;</p>
                        <div>{{ date('d-m-Y', strtotime(Auth::user()->ngay_sinh)) }}</div>
                    </div>
                </div>
                <div class="dropdown" style="margin-top:-20px">
                    <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi-three-dots"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('thay-doi-mat-khau') }}">Thay đổi mật khẩu</a></li>
                        <li><a class="dropdown-item" href="#">Quên mật khẩu</a></li>
                    </ul>
                </div>
            </div>
            <div>
                <div class="border-bottom d-flex">
                    <i class="bi-journal-text custom-icon"></i>&nbsp;
                    <p class="so-no m-0">Sách</p>
                </div>
                <div class="d-flex align-items-center sono bi-dot">
                    <p class="m-0">Đang mượn:&nbsp;</p>
                    <div>{{ $dang_muon->count() }} quyển</div>
                </div>
                <div class="d-flex align-items-center sono bi-dot">
                    <p class="m-0">Đã mượn:&nbsp;</p>
                    <div>{{ $sach_da_muon }} quyển</div>
                </div>
            </div>
        </div>
    </div>
</div>
