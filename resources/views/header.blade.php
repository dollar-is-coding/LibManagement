<div class="az-header">
    <div class="container">
        <div class="az-header-left">
            <a href="{{ route('trang-chu') }}" class="az-logo"><span></span>libro</a>
            <a href="" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
        </div><!-- az-header-left -->
        <div class="az-header-menu">
            <div class="az-header-menu-header">
                <a href="" class="az-logo"><span></span>libro</a>
                <a href="" class="close">&times;</a>
            </div><!-- az-header-menu-header -->
            <ul class="nav">
                <li class="nav-item {{ $view == 1 ? 'active show' : '' }}">
                    <a href="{{ $view == 1 ? '#' : route('trang-chu') }}" class="nav-link"><i
                            class="typcn typcn-chart-area-outline"></i>
                        Trang chủ</a>
                </li>
                <li class="nav-item {{ $view == 2 ? 'active show' : '' }}">
                    <a href="" class="nav-link with-sub"><i class="typcn typcn-document"></i>Sách</a>
                    <nav class="az-menu-sub">
                        <a href="{{ route('hien-thi-sach') }}" class="nav-link">Tra cứu</a>
                        <a href="{{ route('hien-thi-them') }}" class="nav-link">Thêm sách</a>
                    </nav>
                </li>
                <li class="nav-item ">
                    <a href="" class="nav-link with-sub"><i class="typcn typcn-document"></i>Độc giả</a>
                    <nav class="az-menu-sub">
                        <a href="" class="nav-link">Cấp thẻ</a>
                        <a href="" class="nav-link">Quản lý</a>
                    </nav>
                </li>
                <li class="nav-item {{ $view == 3 ? 'active show' : '' }}">
                    <a href="" class="nav-link with-sub"><i class="typcn typcn-user-outline"></i>Cá nhân</a>
                    <nav class="az-menu-sub">
                        <a href="{{ route('xem-thong-tin') }}" class="nav-link">Hồ sơ</a>
                        <a href="{{ route('doi-mat-khau') }}" class="nav-link">Đổi mật khẩu</a>
                        <a href="{{ route('tao-tai-khoan') }}" class="nav-link">Tạo tài khoản</a>
                    </nav>
                </li>
            </ul>
        </div><!-- az-header-menu -->
        <div class="az-header-right">
            <div class="dropdown az-profile-menu">
                <a href="" class="az-img-user">
                    @if (Auth::user()->anh_dai_dien == '')
                        <img src="../img/avt/user.png" alt="">
                    @else
                        <img src="../img/avt/{{ Auth::user()->anh_dai_dien }}" alt="">
                    @endif
                </a>
                <div class="dropdown-menu">
                    <div class="az-dropdown-header d-sm-none">
                        <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                    </div>
                    <div class="az-header-profile">
                        <div class="az-img-user">
                            @if (Auth::user()->anh_dai_dien == '')
                                <img src="../img/avt/user.png" alt="">
                            @else
                                <img src="../img/avt/{{ Auth::user()->anh_dai_dien }}" alt="">
                            @endif
                        </div><!-- az-img-user -->
                        <h6>{{ Auth::user()->ho }} {{ Auth::user()->ten }}</h6>
                        <span>{{ Auth::user()->vai_tro == 1 ? 'Quản trị viên' : 'Thủ thư' }}</span>
                    </div><!-- az-header-profile -->

                    <a href="{{ route('xem-thong-tin') }}" class="dropdown-item"><i
                            class="typcn typcn-user-outline"></i>Hồ sơ</a>
                    <a href="{{ route('xu-ly-dang-xuat') }}" class="dropdown-item"><i
                            class="typcn typcn-power-outline"></i>
                        Đăng xuất</a>
                </div><!-- dropdown-menu -->
            </div>
        </div><!-- az-header-right -->
    </div><!-- container -->
</div><!-- az-header -->
