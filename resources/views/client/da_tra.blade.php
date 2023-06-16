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
                        <h2 class="mb-0">Mượn - trả sách</h2>
                    </div>
                </div>
            </div>
        </header>

        <section class="latest-podcast-section section-padding pt-2" id="section_2">
            <div class="container">
                <div class="row justify-content-center">
                    <div style="font-family: 'sono'">
                        <div class="d-flex justify-content-start shadow-sm border"
                            style="padding:20px 30px 20px 30px; border-radius:30px">
                            <div class="p-4 pt-0 pb-0">
                                <a href="{{ route('cho-duyet') }}" class="history"><strong>Đang chờ duyệt</strong></a>
                            </div>
                            <div class="p-4 pt-0 pb-0">
                                <a href="{{ route('dang-muon') }}" class="history"><strong>Đang mượn</strong></a>
                            </div>
                            <div class="p-4 pt-0 pb-0"><a href="" class="history-active">
                                    <strong>Đã trả</strong></a>
                            </div>
                            <div class="p-4 pt-0 pb-0"><a href="" class="history"><strong>Phiếu phạt</strong></a>
                            </div>
                        </div>
                    </div>
                    @foreach ($da_tra as $key => $item)
                        @if ($key == 0 || $item->ma_phieu_muon != $da_tra[$key - 1]->ma_phieu_muon)
                            <div class="mt-4" style="font-family: 'sono'">
                                <div class="custom-block">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h6 class="m-0">Mã số: #{{ $item->ma_phieu_muon }}</h6>
                                        <div class="m-0"><strong>Tổng số lượng (5)</strong></div>
                                    </div>
                        @endif
                        @if (
                            ($key != $da_tra->count() - 1 && $item->ma_phieu_muon != $da_tra[$key + 1]->ma_phieu_muon) ||
                                $key == $da_tra->count() - 1)
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
                                                <img src="../img/default/no_book.jpg"
                                                    class="custom-block-image img-fluid border" alt="" />
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
                                    <div class="meet-deadline"><strong>Trả đúng hạn</strong></div>
                                @else
                                    <div class="miss-deadline"><strong>
                                        Trả trễ hạn {{ $item->updated_at->diffInDays($item->han_tra) }} ngày
                                    </strong></div>
                                @endif
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
                        <div class="social-icon-item">
                            <a href="#" class="social-icon-link bi-instagram"></a>
                        </div>

                        <div class="social-icon-item">
                            <a href="#" class="social-icon-link bi-twitter"></a>
                        </div>

                        <div class="social-icon-item">
                            <a href="#" class="social-icon-link bi-whatsapp"></a>
                        </div>
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
                        <div class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Homepage</a>
                        </div>

                        <div class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Browse episodes</a>
                        </div>

                        <div class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Help Center</a>
                        </div>

                        <div class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Contact Us</a>
                        </div>
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
