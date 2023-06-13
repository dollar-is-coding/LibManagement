<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand me-lg-5 me-0" href="{{ route('trang-chu') }}">
            <img src="images/pod-talk-logo.png" class="logo-image img-fluid" alt="templatemo pod talk" />
        </a>

        <form action="{{ route('tim-kiem') }}" method="get" role="search"
            class="custom-form search-form flex-fill me-3">
            <div class="input-group input-group-lg">
                <input name="search" type="search" class="form-control" id="search" placeholder="Tìm kiếm sách"
                    aria-label="Search" autocomplete="off" />

                <button type="submit" class="form-control" id="submit">
                    <i class="bi-search"></i>
                </button>
            </div>
        </form>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-lg-auto">
                <li class="nav-item">
                    <a class="nav-link {{ $view == 1 ? 'active' : '' }}" href="{{ route('trang-chu-client') }}">Trang
                        chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $view == 2 ? 'active' : '' }}" href="{{ route('danh-muc-sach') }}">
                        Thể loại sách</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">Tin tức</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">
                        Liên hệ
                    </a>
                </li>
                @if (Auth::user() && Auth::user()->vai_tro == 3)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown bi bi-person-circle" href="#" id="navbarLightDropdownMenuLink"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->ho }} {{ Auth::user()->ten }}</a>

                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="{{ route('hien-thi-gio-sach') }}">Giỏ sách
                                    ({{ $gio_sach->count() }})</a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="{{ route('cho-duyet') }}">
                                    Lịch sử mượn sách</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('xu-ly-dang-xuat') }}">
                                    Đăng xuất</a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li>
                        <a href="{{ route('dang-nhap') }}" class="btn custom-btn custom-border-btn smoothscroll">Đăng
                            nhập</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
