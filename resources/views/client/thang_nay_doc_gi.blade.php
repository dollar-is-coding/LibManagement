<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Pod Talk - Listing Page</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Sono:wght@200;300;400;500;700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="css/bootstrap.min.css" />

    <link rel="stylesheet" href="css/bootstrap-icons.css" />

    <link rel="stylesheet" href="css/owl.carousel.min.css" />

    <link rel="stylesheet" href="css/owl.theme.default.min.css" />

    <link href="css/templatemo-pod-talk.css" rel="stylesheet" />

    <!-- TemplateMo 584 Pod Talk https://templatemo.com/tm-584-pod-talk -->

</head>

<body>
    <main>
        @include('client.header', ['view' => 0])

        <header class="site-header d-flex flex-column justify-content-center align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 text-center">
                        <h2 class="mb-0">Tháng này mọi người đọc gì?</h2>
                    </div>
                </div>
            </div>
        </header>

        <section class="latest-podcast-section section-padding pt-2" id="section_2">
            <div class="container">
                <div class="row justify-content-start">
                    <div class="col-lg-12 col-12">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">Top {{ $xu_huong->count() }}</h4>
                        </div>
                    </div>
                    @foreach ($xu_huong as $key => $item)
                        @if ($key > 2)
                            <div class="col-lg-6 col-12 mb-4 mb-lg-0 {{ $key > 2 ? 'mt-4' : '' }}">
                                <div class="custom-block d-flex">
                                    <div>
                                        <div class="custom-block-icon-wrap">
                                            <div class="section-overlay"></div>
                                            <a href="{{ route('thong-tin-sach', ['id' => $item->sach_id]) }}"
                                                class="custom-block-image-wrap">
                                                @if ($item->fkSach->hinh_anh != '')
                                                    <img src="../img/books/{{ $item->fkSach->hinh_anh }}"
                                                        class="custom-block-image img-fluid" alt="" />
                                                @else
                                                    <img src="../img/default/no_book.jpg"
                                                        class="custom-block-image img-fluid border" alt="" />
                                                @endif
                                            </a>
                                        </div>
                                        <div class="mt-2">
                                            @if (Auth::user() && Auth::user()->vai_tro == 3)
                                                @foreach ($item->fkSach->hasGioSach as $key => $detail)
                                                    @if ($detail->doc_gia_id == Auth::user()->id)
                                                        <a href="{{ route('loai-khoi-gio-sach', ['id' => $item->sach_id]) }}"
                                                            class="btn danger-btn smoothscroll align-self-end">
                                                            Bỏ mượn</a>
                                                    @break
                                                @endif
                                                @if ($item->fkSach->hasGioSach->count() - 1 == $key)
                                                    <a href="{{ route('them-sach-vao-gio', ['sach' => $item->sach_id]) }}"
                                                        class="btn comment-btn smoothscroll align-self-end">
                                                        Chọn mượn</a>
                                                @endif
                                            @endforeach
                                            @if ($item->fkSach->hasGioSach->count() == 0)
                                                <a href="{{ route('them-sach-vao-gio', ['sach' => $item->sach_id]) }}"
                                                    class="btn comment-btn smoothscroll align-self-end">
                                                    Chọn mượn</a>
                                            @endif
                                        @else
                                            <a href="{{ route('dang-nhap') }}" class="btn custom-btn"> Chọn mượn
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="custom-block-info">
                                    <div class="custom-block-top d-flex mb-1">
                                        <small class="me-4">
                                            <i class="bi-clock-fill custom-icon"></i>
                                            {{ $item->fkSach->nam_xuat_ban }}
                                        </small>
                                        <small class="me-4">Mã sách <span
                                                class="badge">#{{ $item->fkSach->ma_sach }}</span></small>
                                        <small>Số lượng <span
                                                class="badge">{{ $item->fkSach->hasThuVien->sl_con_lai }}</span></small>
                                    </div>
                                    <h5 class="mb-2">
                                        <a style="width:17em; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden;"
                                            href="{{ route('thong-tin-sach', ['id' => $item->sach_id]) }}">
                                            {{ $item->fkSach->ten }} </a>
                                    </h5>
                                    <div class="profile-block d-flex">
                                        <img src="../img/default/author.png" class="profile-block-image img-fluid"
                                            alt="" />
                                        <p>
                                            Tác giả
                                            <strong>
                                                <a href="{{ route('sach-theo-chu-de', ['dieu_kien' => 2, 'tac_gia' => $item->fkSach->tac_gia_id]) }}"
                                                    style="color:#717275">{{ $item->fkSach->fkTacGia->ten }}</a>
                                            </strong>
                                        </p>
                                    </div>
                                    <div class="custom-block-bottom d-flex justify-content-between">
                                        <a href="#" class="bi-eye me-1">
                                            <span>{{ $item->fkSach->luot_xem }}</span>
                                        </a>
                                        <a href="#" class="bi-heart me-1">
                                            <span>{{ $item->fkSach->luot_thich }}</span>
                                        </a>
                                        <a href="#" class="bi-chat me-1">
                                            <span>{{ $item->fkSach->luot_binh_luan }}</span>
                                        </a>
                                        <div class="me-1"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                            <div class="custom-block custom-block-full">
                                <div class="custom-block-image-wrap">
                                    <a href="{{ route('thong-tin-sach', ['id' => $item->fkSach->id]) }}">
                                        @if ($item->fkSach->hinh_anh != '')
                                            <img src="../img/books/{{ $sach->fkSach->hinh_anh }}"
                                                class="custom-block-image img-fluid" alt="" />
                                        @else
                                            <img src="../img/default/no_book.jpg"
                                                class="custom-block-image img-fluid border" alt="" />
                                        @endif
                                    </a>
                                </div>
                                <div class="social-share d-flex flex-column ms-auto">
                                    <div class="badge ms-auto">
                                        Top {{ ++$key }}
                                    </div>
                                </div>
                                <div class="custom-block-info">
                                    <h5 class="mb-2">
                                        <a href="{{ route('thong-tin-sach', ['id' => $item->fkSach->id]) }}">
                                            {{ $item->fkSach->ten }}</a>
                                    </h5>
                                    <div class="profile-block d-flex">
                                        <img src="../img/default/author.png" class="profile-block-image img-fluid"
                                            alt="" />
                                        <p>
                                            Tác giả
                                            <strong><a
                                                    href="{{ route('sach-theo-chu-de', ['dieu_kien' => 2, 'tac_gia' => $item->fkSach->tac_gia_id]) }}"
                                                    class="author">{{ $item->fkSach->fkTacGia->ten }}</a></strong>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
</main>

<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                <div class="subscribe-form-wrap">
                    <h6>Subscribe. Every weekly.</h6>

                    <form class="custom-form subscribe-form" action="#" method="get" role="form">
                        <input type="email" name="subscribe-email" id="subscribe-email"
                            pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email Address"
                            required="" />

                        <div class="col-lg-12 col-12">
                            <button type="submit" class="form-control" id="submit">
                                Subscribe
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12 mb-4 mb-md-0 mb-lg-0">
                <h6 class="site-footer-title mb-3">Contact</h6>

                <p class="mb-2">
                    <strong class="d-inline me-2">Phone:</strong> 010-020-0340
                </p>

                <p>
                    <strong class="d-inline me-2">Email:</strong>
                    <a href="#">inquiry@pod.co</a>
                </p>
            </div>

            <div class="col-lg-3 col-md-6 col-12">
                <h6 class="site-footer-title mb-3">Download Mobile</h6>

                <div class="site-footer-thumb mb-4 pb-2">
                    <div class="d-flex flex-wrap">
                        <a href="#">
                            <img src="images/app-store.png" class="me-3 mb-2 mb-lg-0 img-fluid" alt="" />
                        </a>

                        <a href="#">
                            <img src="images/play-store.png" class="img-fluid" alt="" />
                        </a>
                    </div>
                </div>

                <h6 class="site-footer-title mb-3">Social</h6>

                <ul class="social-icon">
                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link bi-instagram"></a>
                    </li>

                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link bi-twitter"></a>
                    </li>

                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link bi-whatsapp"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container pt-5">
        <div class="row align-items-center">
            <div class="col-lg-2 col-md-3 col-12">
                <a class="navbar-brand" href="index.html">
                    <img src="images/pod-talk-logo.png" class="logo-image img-fluid" alt="templatemo pod talk" />
                </a>
            </div>

            <div class="col-lg-7 col-md-9 col-12">
                <ul class="site-footer-links">
                    <li class="site-footer-link-item">
                        <a href="#" class="site-footer-link">Homepage</a>
                    </li>

                    <li class="site-footer-link-item">
                        <a href="#" class="site-footer-link">Browse episodes</a>
                    </li>

                    <li class="site-footer-link-item">
                        <a href="#" class="site-footer-link">Help Center</a>
                    </li>

                    <li class="site-footer-link-item">
                        <a href="#" class="site-footer-link">Contact Us</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-3 col-12">
                <p class="copyright-text mb-0">
                    Copyright © 2036 Talk Pod Company <br /><br />
                    Design:
                    <a rel="nofollow" href="https://templatemo.com/page/1" target="_parent">TemplateMo</a>
                </p>
                Distribution:
                <a rel="nofollow" href="https://themewagon.com" target="_blank">ThemeWagon</a>
            </div>
        </div>
    </div>
</footer>

<!-- JAVASCRIPT FILES -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/custom.js"></script>
</body>

</html>