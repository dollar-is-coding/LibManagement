<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Pod Talk Free CSS Template by TemplateMo</title>

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
    <!--

TemplateMo 584 Pod Talk

https://templatemo.com/tm-584-pod-talk

-->
</head>

<body>
    <main>
        @include('client.header', ['view' => 0])

        <header class="site-header d-flex flex-column justify-content-center align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 text-center">
                        <h2 class="mb-0">Chi tiết</h2>
                    </div>
                </div>
            </div>
        </header>
        <section class="latest-podcast-section section-padding pt-2 pb-5" id="section_2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-12">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">{{ $sach->fkTheLoai->ten }}</h4>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-12">
                                <div class="custom-block-icon-wrap">
                                    <div class="custom-block-image-wrap custom-block-image-detail-page">
                                        @if ($sach->hinh_anh != '')
                                            <img src="../img/books/{{ $sach->hinh_anh }}"
                                                class="custom-block-image img-fluid" alt="" />
                                        @else
                                            <img src="../img/default/no_book.jpg"
                                                class="custom-block-image img-fluid border" alt="" />
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-9 col-12">
                                <div class="custom-block-info">
                                    <div class="custom-block-top d-flex mb-1">
                                        <small class="me-4">
                                            <i class="bi-geo-alt-fill custom-icon"></i>
                                            {{ $sach->hasThuVien->fkTuSach->ten }},
                                            {{ $sach->hasThuVien->fkTuSach->ten }}
                                        </small>

                                        <small>
                                            <i class="bi-clock-fill custom-icon"></i>
                                            {{ $sach->nam_xuat_ban }}
                                        </small>

                                        <small class="ms-auto">Mã sách <span
                                                class="badge">#{{ $sach->ma_sach }}</span></small>
                                    </div>

                                    <h2 class="mb-2">{{ $sach->ten }}</h2>
                                    <div class="d-flex">
                                        <div class="d-flex">
                                            <p>Tại thư viện:&nbsp;</p>
                                            <div>{{ $sach->hasThuVien->sl_con_lai }} quyển</div>
                                        </div>
                                        <h6 class="m-2 mt-0 mb-0 bi-dot"></h6>
                                        <div class="d-flex">
                                            <p>Đang mượn:&nbsp;</p>
                                            <div>{{ $sach->hasThuVien->dang_muon }} quyển</div>
                                        </div>
                                        <h6 class="m-2 mt-0 mb-0 bi-dot"></h6>
                                        <div class="d-flex">
                                            <p>Số lần mượn:&nbsp;</p>
                                            <div>{{ $sach->hasThuVien->da_muon }}</div>
                                        </div>
                                    </div>
                                    <p>{{ $sach->mo_ta }}</p>

                                    <div
                                        class="profile-block profile-detail-block d-flex flex-wrap align-items-center mt-5">
                                        <div class="d-flex mb-3 mb-lg-0 mb-md-0">
                                            <img src="../img/default/author.png" class="profile-block-image img-fluid"
                                                alt="" />
                                            <p>Tác giả<strong>{{ $sach->fkTacGia->ten }}</strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @if ($cung_tac_gia)
            <section class="related-podcast-section section-padding pt-0 pb-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="section-title-wrap mb-5">
                                <h4 class="section-title">Cùng tác giả</h4>
                            </div>
                        </div>
                        @foreach ($cung_tac_gia as $key => $item)
                            <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                                <div class="custom-block custom-block-full">
                                    <div class="custom-block-image-wrap">
                                        <a href="detail-page.html">
                                            @if ($sach->hinh_anh != '')
                                                <img src="../img/books/{{ $sach->hinh_anh }}"
                                                    class="custom-block-image img-fluid" alt="" />
                                            @else
                                                <img src="../img/default/no_book.jpg"
                                                    class="custom-block-image img-fluid border" alt="" />
                                            @endif
                                        </a>
                                    </div>
                                    <div class="custom-block-info">
                                        <h5 class="mb-2">
                                            <a href="detail-page.html">{{ $item->ten }}</a>
                                        </h5>
                                        <div class="profile-block d-flex">
                                            <img src="../img/default/author.png" class="profile-block-image img-fluid"
                                                alt="" />
                                            <p>
                                                Tác giả
                                                <strong>{{ $item->fkTacGia->ten }}</strong>
                                            </p>
                                        </div>
                                        <div class="custom-block-bottom d-flex justify-content-between">
                                            <a href="#" class="bi-eye me-1">
                                                <span>{{ $item->luot_xem }}</span>
                                            </a>
                                            <a href="#" class="bi-heart me-1">
                                                <span>{{ $item->luot_thich }}</span>
                                            </a>
                                            <a href="#" class="bi-chat me-1">
                                                <span>{{ $item->luot_binh_luan }}</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if ($key == 2)
                            @break
                        @endif
                    @endforeach
                    @if ($cung_tac_gia->count() > 3)
                        <div class="col-lg-4 col-12 mx-auto">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination pagination-lg justify-content-center mt-5">
                                    <h4>
                                        <a href="{{ route('tim-kiem-tac-gia', ['tac_gia' => $sach->tac_gia_id]) }}"
                                            onMouseOver="this.style.textDecoration='underline'"
                                            onMouseOut="this.style.textDecoration='none'" href="">Xem tất
                                            cả</a>
                                    </h4>
                                </ul>
                            </nav>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @else
        <section class="related-podcast-section section-padding pt-0 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">Liên quan</h4>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                        <div class="custom-block custom-block-full">
                            <div class="custom-block-image-wrap">
                                <a href="detail-page.html">
                                    <img src="images/podcast/27376480_7326766.jpg"
                                        class="custom-block-image img-fluid" alt="" />
                                </a>
                            </div>
                            <div class="custom-block-info">
                                <h5 class="mb-2">
                                    <a href="detail-page.html"> Vintage Show </a>
                                </h5>
                                <div class="profile-block d-flex">
                                    <img src="images/profile/woman-posing-black-dress-medium-shot.jpg"
                                        class="profile-block-image img-fluid" alt="" />
                                    <p>
                                        Elsa
                                        <strong>Influencer</strong>
                                    </p>
                                </div>
                                <div class="custom-block-bottom d-flex justify-content-between">
                                    <a href="#" class="bi-headphones me-1">
                                        <span>100k</span>
                                    </a>
                                    <a href="#" class="bi-heart me-1">
                                        <span>2.5k</span>
                                    </a>
                                    <a href="#" class="bi-chat me-1">
                                        <span>924k</span>
                                    </a>
                                </div>
                            </div>
                            <div class="social-share d-flex flex-column ms-auto">
                                <a href="#" class="badge ms-auto">
                                    <i class="bi-heart"></i>
                                </a>
                                <a href="#" class="badge ms-auto">
                                    <i class="bi-bookmark"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if ($ds_da_xem)
        <section class="related-podcast-section section-padding pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">Đã xem gần đây</h4>
                        </div>
                    </div>
                    @foreach ($ds_da_xem as $key => $item)
                        <div class="col-lg-4 col-12 mb-4 mb-lg-0 {{ $key > 2 ? 'mt-4' : '' }} ">
                            <div class="custom-block custom-block-full">
                                <div class="custom-block-image-wrap">
                                    <a href="detail-page.html">
                                        @if ($item->fkSach->hinh_anh != '')
                                            <img src="../img/books/{{ $sach->fkSach->hinh_anh }}"
                                                class="custom-block-image img-fluid" alt="" />
                                        @else
                                            <img src="../img/default/no_book.jpg"
                                                class="custom-block-image img-fluid border" alt="" />
                                        @endif
                                    </a>
                                </div>
                                <div class="custom-block-info">
                                    <h5 class="mb-2">
                                        <a href="detail-page.html">{{ $item->fkSach->ten }}</a>
                                    </h5>
                                    <div class="profile-block d-flex">
                                        <img src="../img/default/author.png" class="profile-block-image img-fluid"
                                            alt="" />
                                        <p>
                                            Tác giả
                                            <strong>{{ $item->fkSach->fkTacGia->ten }}</strong>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
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
