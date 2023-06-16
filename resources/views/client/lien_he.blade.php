<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Pod Talk - Contact Page</title>

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
        @include('client.header', ['view' => 4])

        <header class="site-header d-flex flex-column justify-content-center align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 text-center">
                        <h2 class="mb-0">Liên hệ</h2>
                    </div>
                </div>
            </div>
        </header>

        <section class="section-padding pt-2 pb-5" id="section_2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-12 pe-lg-5">
                        <div class="contact-info">
                            <h3 class="mb-4">Thông tin liện hệ</h3>
                            <p class="d-flex border-bottom pb-3 mb-4">
                                <strong class="d-inline me-4">Số điện thoại:</strong>
                                <span>010-020-0340</span>
                            </p>
                            <p class="d-flex border-bottom pb-3 mb-4">
                                <strong class="d-inline me-4">Email:</strong>
                                <a
                                    href="https://mail.google.com/mail/u/0/#inbox?compose=new&chat=1&to=123@gmail.com">inquiry@pod.co</a>
                            </p>
                            <p class="d-flex">
                                <strong class="d-inline me-4">Vị trí:</strong>
                                <span>65 Đ. Huỳnh Thúc Kháng, Bến Nghé, Quận 1, Thành phố Hồ Chí Minh</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-5 col-12 mt-5 mt-lg-0">
                        <iframe class="google-map"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1959.7582617803375!2d106.70005877098545!3d10.77169511740364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f40a3b49e59%3A0xa1bd14e483a602db!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEvhu7kgdGh14bqtdCBDYW8gVGjhuq9uZw!5e0!3m2!1svi!2s!4v1686839504732!5m2!1svi!2s"
                            width="100%" height="300" style="border: 0" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </section>

        <section class="contact-section section-padding pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-12 mx-auto">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">Mẫu liên hệ</h4>
                        </div>
                        <form action="#" method="post" class="custom-form contact-form" role="form">
                            <div class="row">
                                <div class="col-lg-12 col-12">
                                    <div class="form-floating">
                                        <input type="text" name="tieu_de" id="name" class="form-control"
                                            placeholder="Name" required="" />
                                        <label for="floatingInput">Tiêu đề</label>
                                    </div>
                                    <div class="form-floating">
                                        <textarea class="form-control" id="message" name="noi_dung" placeholder="Describe message here"></textarea>
                                        <label for="floatingTextarea">Nội dung</label>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12 ms-auto">
                                    <button type="submit" class="form-control">Gửi</button>
                                </div>
                            </div>
                        </form>
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
                            <input type="email" name="subscribe-email" id="subscribe-email" pattern="[^ @]*@[^ @]*"
                                class="form-control" placeholder="Email Address" required="" />

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
