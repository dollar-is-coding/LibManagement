<div class="az-header">
    <div class="container">
        <div class="az-header-left">
            <a href="{{ route('trang-chu') }}" class="az-logo"><span></span>
                <img style="width: 60px;height: 60px;" src="/img/header.png" alt="">
            </a>
            <a href="" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
        </div><!-- az-header-left -->
        <div class="az-header-menu">
            <div class="az-header-menu-header">
                <a href="{{ route('trang-chu') }}" class="az-logo"><span></span>libro</a>
                <a href="" class="close">&times;</a>
            </div><!-- az-header-menu-header -->
            <ul class="nav">
                <li class="nav-item {{ $view == 1 ? 'active show' : '' }}">
                    <a href="{{ $view == 1 ? '#' : route('trang-chu') }}" class="nav-link">
                        <i class="typcn typcn-chart-area"></i>
                        TRANG CHỦ
                    </a>
                </li>
                <li class="nav-item {{ $view == 2 ? 'active show' : '' }}">
                    <a href="" class="nav-link with-sub"><i class="typcn typcn-document"></i>SÁCH</a>
                    <nav class="az-menu-sub">
                        <a href="{{ route('hien-thi-sach') }}" class="nav-link">TRA CỨU</a>
                        <a href="{{ route('hien-thi-them-sach') }}" class="nav-link">THÊM SÁCH</a>
                        <a href="{{ route('bao-cao-sach-hu') }}" class="nav-link">BÁO CÁO SÁCH</a>
                        <a href="{{ route('quan-ly-kho-sach') }}" class="nav-link">QUẢN LÝ KHO SÁCH</a>
                    </nav>
                </li>
                <li class="nav-item {{ $view == 3 ? 'active show' : '' }}">
                    <a href="{{ $view == 3 ? '#' : route('phe-duyet-muon-sach') }}" class="nav-link">
                        <i class="typcn typcn-book"></i>
                        MƯỢN SÁCH
                    </a>
                </li>

                <li class="nav-item {{ $view == 4 ? 'active show' : '' }}">
                    @if(Auth::user()->vai_tro == 1 || Auth::user()->vai_tro == 0 )
                    <a href="" class="nav-link with-sub"><i class="typcn typcn-user"></i>QUẢN TRỊ VIÊN</a>
                    @else
                    <a href="" class="nav-link with-sub"><i class="typcn typcn-user"></i>THỦ THƯ</a>
                    @endif
                    <nav class="az-menu-sub">

                        <a href="{{ route('tao-tai-khoan') }}" class="nav-link">CẤP TÀI KHOẢN</a>

                        <a href="{{ route('quan-ly-tai-khoan') }}" class="nav-link">QUẢN LÝ TÀI KHOẢN</a>
                    </nav>
                </li>

                <li class="nav-item {{ $view == 5 ? 'active show' : '' }}">
                    <a href="" class="nav-link with-sub"><i class="typcn typcn-news"></i>TIN TỨC</a>
                    <nav class="az-menu-sub">
                        <a href="{{route('them-tin-tuc')}}" class="nav-link">THÊM TIN TỨC</a>
                        <a href="{{ route('danh-sach-tin-tuc') }}" class="nav-link">QUẢN LÝ TIN TỨC</a>
                    </nav>
                </li>
                <li class="nav-item {{ $view == 6 ? 'active show' : '' }}">
                    <a href="{{route('quan-ly-lien-he')}}" class="nav-link">
                        <i class="fas fa-mail-bulk mr-1"></i>
                        QUẢN LÝ PHẢN HỒI
                    </a>
                </li>
            </ul>
        </div><!-- az-header-menu -->
        <div class="az-header-right">
            <div class="text-info font-weight-bold">{{ Auth::user()->ho }} {{ Auth::user()->ten }}</div>
            <div class="dropdown az-profile-menu">
                <a href="" class="az-img-user">
                    @if (Auth::user()->hinh_anh == '')
                    <img src="/img/default/no_avatar.png">
                    @else
                    <img src="/img/avt/{{ Auth::user()->hinh_anh }}">
                    @endif
                </a>
                <div class="dropdown-menu">
                    <div class="az-dropdown-header d-sm-none">
                        <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                    </div>
                    <div class="az-header-profile">
                        <div class="az-img-user">
                            @if (Auth::user()->hinh_anh == '')
                            <img src="../img/default/no_avatar.png">
                            @else
                            <img src="../img/avt/{{ Auth::user()->hinh_anh }}">
                            @endif
                        </div><!-- az-img-user -->
                        <h6>{{ Auth::user()->ho }} {{ Auth::user()->ten }}</h6>
                        <span>{{ Auth::user()->vai_tro == 0 ? 'Quản trị viên' : (Auth::user()->vai_tro == 1 ? 'Quản trị viên cấp cao' : 'Thủ thư') }}</span>
                    </div><!-- az-header-profile -->

                    <a href="{{ route('xem-thong-tin') }}" class="dropdown-item">
                        <i class="typcn typcn-user-outline"></i>Cá nhân
                    </a>
                    <a href="{{ route('xu-ly-dang-xuat') }}" class="dropdown-item">
                        <i class="typcn typcn-power-outline"></i>Đăng xuất
                    </a>
                </div><!-- dropdown-menu -->
            </div>
        </div><!-- az-header-right -->
    </div><!-- container -->
</div><!-- az-header -->