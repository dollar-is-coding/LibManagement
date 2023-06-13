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
                        <h2 class="mb-0">Giỏ sách ({{ $gio_sach->count() }})</h2>
                    </div>
                </div>
            </div>
        </header>

        <section class="latest-podcast-section section-padding pt-2" id="section_2">
            <div class="container">
                @if ($gio_sach->count() > 0)
                    <form action="{{ route('muon-sach') }}" class="row justify-content-center" method="POST">
                        @csrf
                        <div style="font-family: 'Sono'">
                            <div class="d-flex justify-content-between shadow-sm border"
                                style="padding:20px 30px 20px 30px; border-radius:30px">
                                <div style="width:55%">
                                    <p class="m-0"><strong>Sách</strong></p>
                                </div>
                                <div style="width:10%" class="d-flex justify-content-center">
                                    <p class="m-0"><strong>Số lượng</strong></p>
                                </div>
                                <div style="width:10%" class="d-flex justify-content-center">
                                    <p class="m-0"><strong>Trạng thái</strong></p>
                                </div>
                                <div style="width:15%" class="d-flex justify-content-center">
                                    <p class="m-0"><strong>Chức năng</strong></p>
                                </div>
                            </div>
                        </div>
                        @foreach ($gio_sach as $key => $sach)
                            <div class="mt-4" style="font-family: 'sono'">
                                <div class="custom-block">
                                    <div class="d-flex align-items-center">
                                        <input style="width:1em;height:1em" type="checkbox" name="{{ $sach->sach_id }}"
                                            checked hidden>
                                        <h6 class="m-0">&nbsp;{{ $sach->fkSach->ten }}</h6>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex" style="width:55%">
                                            <div class="custom-block-icon-wrap">
                                                <div class="section-overlay"></div>
                                                <a class="custom-block-image-wrap">
                                                    @if ($sach->fkSach->hinh_anh != '')
                                                        <img src="../img/books/{{ $sach->fkSach->hinh_anh }}"
                                                            class="custom-block-image img-fluid" alt="" />
                                                    @else
                                                        <img src="../img/default/no_book.jpg"
                                                            class="custom-block-image img-fluid border"
                                                            alt="" />
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="custom-block-info d-flex flex-column justify-content-between">
                                                <div><strong>
                                                        #{{ $sach->fkSach->ma_sach }} -
                                                        {{ $sach->fkSach->fkTacGia->ten }}
                                                    </strong></div>
                                                <div class="d-flex">
                                                    <p class="m-0">Thể loại:&nbsp;</p>
                                                    <div>{{ $sach->fkSach->fkTheLoai->ten }}</div>
                                                </div>
                                                <div class="d-flex">
                                                    <p class="m-0">Năm xuất bản:&nbsp;</p>
                                                    <div>{{ $sach->fkSach->nam_xuat_ban }}</div>
                                                </div>
                                                <div class="d-flex">
                                                    <p class="m-0">Nhà xuất bản:&nbsp;</p>
                                                    <div>{{ $sach->fkSach->fkNhaXuatBan->ten }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center align-items-center" style="width:10%">
                                            <div>x1</div>
                                        </div>
                                        <div class="d-flex justify-content-center align-items-center" style="width:10%">
                                            <div>{{ $sach->sl_con_lai > 0 ? 'Có sẵn' : 'Đang hết' }}</div>
                                        </div>
                                        <div class="d-flex flex-column justify-content-evenly align-items-center"
                                            style="width:15%">
                                            <div>
                                                <a href="{{ route('loai-khoi-gio-sach', ['id' => $sach->sach_id]) }}"
                                                    class="btn danger-btn">Bỏ chọn</a>
                                            </div>
                                            <div>
                                                <a href="#" class="btn custom-btn">Xem chi tiết</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="mt-5 d-flex" style="font-family: 'Sono'">
                            <div class="d-flex justify-content-end shadow-sm border flex-grow-1"
                                style="padding:20px 30px 20px 30px; border-radius:30px">
                                {{-- <div class="d-flex">
                                    <p class="m-0"><strong>Ngày lập phiếu:&nbsp;</strong></p>
                                    <div><strong>{{ date('d-m-Y') }}</strong></div>
                                </div>
                                <div class="d-flex justify-content-center" style="margin-left: 5em">
                                    <p class="m-0"><strong>Hạn trả:&nbsp; </strong></p>
                                    <div>
                                        <strong>{{ date('d-m-Y', strtotime(date('m-d-y') . ' + 14 days')) }}</strong>
                                    </div>
                                </div> --}}
                                <div class="d-flex justify-content-center" style="margin-left: 5em">
                                    <p class="m-0">Tổng số sách:&nbsp;</p>
                                    <div>{{ $gio_sach->count() }} quyển</div>
                                </div>
                            </div>
                            <div class="m-3"></div>
                            <div class="d-inline-flex justify-content-center">
                                <button type="submit" class="pagination pagination-lg btn custom-btn">
                                    Xác nhận mượn sách
                                </button>
                            </div>
                            <div class="m-1"></div>
                        </div>
                    </form>
                @else
                    <div class="d-flex justify-content-center">
                        <h6>Không có quyển sách nào trong giỏ!</h6>
                    </div>
                @endif
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
