<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="description" content="" />

    <meta name="author" content="" />

    <title>Pod Talk - About Page</title>

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

        <div style="font-family: 'sono'">
            <div class="d-flex justify-content-start shadow-sm border"
                style="padding:20px 30px 20px 30px; border-radius:30px">
                <div class="p-4 pt-0 pb-0">
                    <a href="" class="history-active"><strong>Đang chờ duyệt</strong></a>
                </div>
                <div class="p-4 pt-0 pb-0 history">
                    <a href="{{ route('dang-muon') }}" class="history"><strong>Đang mượn</strong></a>
                </div>
                <div class="p-4 pt-0 pb-0"><a href="{{ route('da-tra') }}" class="history">
                        <strong>Đã trả</strong></a></div>
                <div class="p-4 pt-0 pb-0"><a href="" class="history"><strong>Phiếu phạt</strong></a>
                </div>
            </div>
        </div>

        <div style="font-family: 'sono'">
            <ul class="nav nav-pills mb-3 d-flex justify-content-start shadow-sm border" id="pills-tab" role="tablist">
                <li class=" p-4 pt-0 pb-0" role="presentation">
                    <a class="" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                        role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                        role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"
                        role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                </li>
            </ul>
        </div>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                tabindex="0">1</div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                tabindex="0">2</div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                tabindex="0">3</div>
        </div>

        <section class="about-section section-padding pt-2 pb-5" id="section_2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-12 mx-auto">
                        <div class="mb-5 d-flex custom-block">
                            <div class="d-flex flex-column">
                                <div class="ongnoi col-lg-4">
                                    <div class="cha">
                                        <div class="con1 border">
                                            @if (Auth::user()->hinh_anh == '')
                                                <img class="ca border rounded-circle" id="image" alt=""
                                                    srcset="" src="../img/default/no_avatar.png" width="200px"
                                                    height="200px">
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
                            </div>
                            <div class="m-4"></div>
                            <div class="flex-fill d-flex flex-column justify-content-evenly">
                                <h4>{{ $doc_gia->ho }} {{ $doc_gia->ten }}</h4>
                                <div class="d-flex align-items-center sono">
                                    <p class="m-0">Mã số:&nbsp;</p>
                                    <div>1234567</div>
                                </div>
                                <div class="d-flex align-items-center sono">
                                    <p class="m-0">Giới tính:&nbsp;</p>
                                    <div>{{ $doc_gia->gioi_tinh == 1 ? 'Nam' : 'Nữ' }}</div>
                                </div>
                                <div class="d-flex align-items-center sono">
                                    <p class="m-0">Ngày sinh:&nbsp;</p>
                                    <div>{{ date('d-m-Y', strtotime($doc_gia->ngay_sinh)) }}</div>
                                </div>
                                <div>
                                    <div class="border-bottom d-flex">
                                        <i class="bi-journal-text custom-icon"></i>&nbsp;
                                        <p class="so-no m-0">Sách</p>
                                    </div>
                                    <div class="d-flex align-items-center sono bi-dot">
                                        <p class="m-0">Đang mượn:&nbsp;</p>
                                        <div>5 quyển</div>
                                    </div>
                                    <div class="d-flex align-items-center sono bi-dot">
                                        <p class="m-0">Đã mượn:&nbsp;</p>
                                        <div>12 quyển</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-12">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">Liên quan</h4>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                        <div class="team-thumb bg-white shadow-lg">
                            <img src="images/profile/handsome-asian-man-listening-music-through-headphones.jpg"
                                class="about-image img-fluid" alt="" />
                            <div class="team-info">
                                <h4 class="mb-2">
                                    William
                                    <img src="images/verified.png" class="verified-image img-fluid" alt="" />
                                </h4>
                                <span class="badge">Creative</span>
                                <span class="badge">Design</span>
                            </div>
                            <div class="social-share">
                                <ul class="social-icon">
                                    <li class="social-icon-item">
                                        <a href="#" class="social-icon-link bi-twitter"></a>
                                    </li>
                                    <li class="social-icon-item">
                                        <a href="#" class="social-icon-link bi-facebook"></a>
                                    </li>
                                    <li class="social-icon-item">
                                        <a href="#" class="social-icon-link bi-pinterest"></a>
                                    </li>
                                </ul>
                            </div>
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
