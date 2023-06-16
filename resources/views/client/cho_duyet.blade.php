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

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Sono:wght@200;300;400;500;700&display=swap" rel="stylesheet" />

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
                    <!-- <div style="font-family: 'sono'">
                        <div class="d-flex justify-content-start shadow-sm border nav-tabs" id="myTab" role="tablist" style="padding:20px 30px 20px 30px; border-radius:30px">
                            <div class="p-4 pt-0 pb-0" role="presentation">
                                <a style="border: none;" class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true"><strong>Đang chờ duyệt</strong></a>
                            </div>
                            <div class="p-4 pt-0 pb-0" role="presentation">
                                <a style="border: none;" class=" nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false"><strong>Đang mượn</strong></a>
                            </div>
                            <div class="p-4 pt-0 pb-0" role="presentation">
                                <a style="border: none;" class=" nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false"><strong>Đã trả</strong></a>
                            </div>
                            <div class="p-4 pt-0 pb-0" role="presentation">
                                <a style="border: none;" class=" nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane" type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false"><strong>Phiếu phạt</strong></a>
                            </div>
                        </div>
                    </div>
                  

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">.2..</div>
                        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">..3.</div>
                        <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">..4.</div>
                        <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">5...</div>
                    </div> -->
                    <!-- end dinh -->
                    <style>
                        .nav-link.active {
                            color: blue !important;
                        }
                    </style>

                    <nav style="font-family: 'sono'; padding: 20px 30px 20px 30px; border-radius: 30px" class="d-flex justify-content-start shadow-sm border">
                        <div class="nav nav-tabs" id="nav-tab" style="border: none; padding: 0" role="tablist">
                            <a class="nav-link active" style="border: none; padding: 0; color: black;" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><strong>Home</strong></a>
                            <a class="nav-link" style="border: none; padding: 0; color: black" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"><strong>Profile</strong></a>
                            <a class="nav-link" style="border: none; padding: 0; color: black" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false"><strong>Contact</strong></a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">..1.</div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">..2.</div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">..3.</div>
                    </div>



                    <!-- again end -->
                    @foreach ($cho_duyet as $key => $item)
                    @if ($key == 0 || $item->ma_phieu_muon != $cho_duyet[$key - 1]->ma_phieu_muon)
                    <div class="mt-4" style="font-family: 'sono'">
                        <div class="custom-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="m-0">Mã số: #{{ $item->ma_phieu_muon }}</h6>
                                <div class="m-0"><strong>
                                        Tổng số lượng ({{ $item->tong_so_luong }})
                                    </strong></div>
                            </div>
                            @endif
                            @if (
                            ($key != $cho_duyet->count() - 1 && $item->ma_phieu_muon != $cho_duyet[$key + 1]->ma_phieu_muon) ||
                            $key == $cho_duyet->count() - 1)
                            <hr>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex" style="width:70%">
                                    <div class="custom-block-icon-wrap">
                                        <div class="section-overlay"></div>
                                        <a class="custom-block-image-wrap">
                                            @if ($item->fkSach->hinh_anh != '')
                                            <img src="../img/books/{{ $item->fkSach->hinh_anh }}" class="custom-block-image img-fluid" alt="" />
                                            @else
                                            <img src="../img/default/no_book.jpg" class="custom-block-image img-fluid border" alt="" />
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
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex">
                                    <p class="m-0">Ngày cần trả:&nbsp;</p>
                                    <div>{{ date('d-m-Y', strtotime($item->han_tra)) }}</div>
                                </div>
                                <a href="{{ route('huy-phieu-muon', ['ma_phieu_muon' => $item->ma_phieu_muon]) }}" class="btn danger-btn">Hủy phiếu</a>
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
                                    <img src="../img/books/{{ $item->fkSach->hinh_anh }}" class="custom-block-image img-fluid" alt="" />
                                    @else
                                    <img src="../img/default/no_book.jpg" class="custom-block-image img-fluid border" alt="" />
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
                                    <p class="m-0">Năm xuất bản:&nbsp;</p>
                                    <div> {{ $item->fkSach->nam_xuat_ban }}</div>
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
                            <input type="email" name="subscribe-email" id="subscribe-email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email Address" required="" />

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