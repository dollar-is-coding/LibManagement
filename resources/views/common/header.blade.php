<div class="az-header">
    <div class="container">
        <div class="az-header-left">
            <a href="{{ route('trang-chu') }}" class="az-logo"><span></span>
                <img style="width: 60px;height: 60px;" src="/img/LIBRO.png" alt="">
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
                        Trang chủ
                    </a>
                </li>
                <li class="nav-item {{ $view == 2 ? 'active show' : '' }}">
                    <a href="" class="nav-link with-sub"><i class="typcn typcn-document"></i>Sách</a>
                    <nav class="az-menu-sub">
                        <a href="{{ route('hien-thi-sach') }}" class="nav-link">Tra cứu</a>
                        <a href="{{ route('hien-thi-them-sach') }}" class="nav-link">Thêm sách</a>
                    </nav>
                </li>
                <li class="nav-item {{ $view == 3 ? 'active show' : '' }}">
                    <a href="{{ $view == 3 ? '#' : route('phe-duyet-muon-sach') }}" class="nav-link">
                        <i class="typcn typcn-book"></i>
                        Mượn sách
                    </a>
                </li>
                @if(Auth::user()->vai_tro == 1)
                <li class="nav-item {{ $view == 4 ? 'active show' : '' }}">
                    <a href="" class="nav-link with-sub"><i class="typcn typcn-user"></i>Quản trị viên</a>
                    <nav class="az-menu-sub">
                        <a href="{{ route('tao-tai-khoan') }}" class="nav-link">Cấp tài khoản</a>
                        <a href="{{ route('quan-ly-tai-khoan') }}" class="nav-link">Quản lý tài khoản</a>
                    </nav>
                </li>
                @endif
                <li class="nav-item {{ $view == 5 ? 'active show' : '' }}">
                    <a href="" class="nav-link with-sub"><i class="typcn typcn-news"></i>Tin tức</a>
                    <nav class="az-menu-sub">
                        <a href="{{route('them-tin-tuc')}}" class="nav-link">Thêm tin tức</a>
                        <a href="{{ route('danh-sach-tin-tuc') }}" class="nav-link">Quản lý tin tức</a>
                    </nav>
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
                        <span>{{ Auth::user()->vai_tro == 1 ? 'Quản trị viên' : 'Thủ thư' }}</span>
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