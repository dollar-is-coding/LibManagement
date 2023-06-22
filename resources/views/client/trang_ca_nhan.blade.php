<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="description" content="" />

    <meta name="author" content="" />

    <title>Libro - Tài khoản của tôi</title>

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

</head>

<body>
    <main>
        @include('client.header', ['view' => 5])

        <header class="site-header d-flex flex-column justify-content-center align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 text-center">
                        <h2 class="mb-0">Tài khoản của tôi</h2>
                    </div>
                </div>
            </div>
        </header>

        <section class="about-section section-padding pt-2 pb-5" id="section_2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-12 mx-auto">
                        <div class="mb-5 d-flex custom-block">
                            <form action="{{ route('cap-nhat-thong-tin') }}" method="POST"
                                enctype="multipart/form-data" class="d-flex flex-column">
                                @csrf
                                <div class="ongnoi col-lg-4">
                                    <div class="cha">
                                        <div class="con1">
                                            @if (Auth::user()->hinh_anh == '')
                                                <img class="ca border rounded-circle" id="image" alt=""
                                                    srcset="" src="../img/default/no_avatar.png" width="200px"
                                                    height="200px" style="object-fit:cover">
                                            @else
                                                <img class="ca border rounded-circle" id="image" alt=""
                                                    srcset="" src="../img/avt/{{ Auth::user()->hinh_anh }}"
                                                    width="200px" height="200px" style="object-fit:cover">
                                            @endif
                                        </div>
                                        <div class="con2">
                                            <label for="file"></label>
                                            <input class="chau1" type="file" value=""
                                                onchange="chooseFile(this)" name="file"
                                                accept="image/gif, image/jpeg, image/png, image/jpg">
                                        </div>
                                    </div>
                                </div>
                                <button class="btn comment-btn smoothscroll align-self-center mt-2">
                                    Cập nhật ảnh</button>
                            </form>
                            <div class="m-4"></div>
                            <div class="flex-fill d-flex flex-column justify-content-evenly">
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
                                        <div>{{ $da_tra->count() }} quyển</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-12">
                        <style>
                            .nav-link.active {
                                color: #0066cc !important;
                            }
                        </style>
                        <nav class="d-flex justify-content-start shadow-sm border history-include">
                            <div class="nav nav-tabs" id="nav-tab" style="border: none;" role="tablist">
                                <a class="nav-link active history" style="border: none;" id="nav-home-tab"
                                    data-bs-toggle="tab" data-bs-target="#waiting-tab" type="button" role="tab"
                                    aria-controls="nav-home" aria-selected="true">
                                    <strong>Đang chờ duyệt</strong></a>
                                <a class="nav-link history" style="border: none;" id="nav-profile-tab"
                                    data-bs-toggle="tab" data-bs-target="#borrowing-tab" type="button"
                                    role="tab" aria-controls="nav-profile" aria-selected="false">
                                    <strong>Đang mượn</strong></a>
                                <a class="nav-link history" style="border: none;" id="nav-contact-tab"
                                    data-bs-toggle="tab" data-bs-target="#returned-tab" type="button"
                                    role="tab" aria-controls="nav-contact" aria-selected="false">
                                    <strong>Đã trả</strong></a>
                                <a class="nav-link history" style="border: none;" id="nav-contact-tab"
                                    data-bs-toggle="tab" data-bs-target="#fined-tab" type="button" role="tab"
                                    aria-controls="nav-contact" aria-selected="false">
                                    <strong>Phiếu phạt</strong></a>
                                <a class="nav-link history" style="border: none;" id="nav-contact-tab"
                                    data-bs-toggle="tab" data-bs-target="#cancel-tab" type="button" role="tab"
                                    aria-controls="nav-contact" aria-selected="false">
                                    <strong>Phiếu hủy</strong></a>
                            </div>
                        </nav>
                    </div>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="waiting-tab" role="tabpanel"
                            aria-labelledby="nav-home-tab" tabindex="0">
                            @include('client.cac_loai_phieu.phieu_cho_duyet', ['cho_duyet' => $cho_duyet])
                        </div>

                        <div class="tab-pane fade" id="borrowing-tab" role="tabpanel"
                            aria-labelledby="nav-profile-tab" tabindex="0">
                            @include('client.cac_loai_phieu.phieu_dang_muon', ['dang_muon' => $dang_muon])
                        </div>

                        <div class="tab-pane fade" id="returned-tab" role="tabpanel"
                            aria-labelledby="nav-contact-tab" tabindex="0">
                            @include('client.cac_loai_phieu.phieu_tra', ['da_tra' => $da_tra])
                        </div>

                        <div class="tab-pane fade" id="fined-tab" role="tabpanel" aria-labelledby="nav-contact-tab"
                            tabindex="0">..3.</div>

                        <div class="tab-pane fade" id="cancel-tab" role="tabpanel" aria-labelledby="nav-contact-tab"
                            tabindex="0">
                            @include('client.cac_loai_phieu.phieu_huy', ['phieu_huy' => $phieu_huy])
                        </div>
                    </div>
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
    <script>
        function chooseFile(fileinput) {
            if (fileinput.files && fileinput.files[0]) {
                var read = new FileReader();
                read.onload = function(e) {
                    $('#image').attr('src', e.target.result);
                }
                read.readAsDataURL(fileinput.files[0]);
            }
        }
    </script>
</body>

</html>
