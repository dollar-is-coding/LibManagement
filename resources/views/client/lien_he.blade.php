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

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Sono:wght@200;300;400;500;700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel='shortcut icon' href='/img/header.png' />


    <link rel="stylesheet" href="css/bootstrap-icons.css" />

    <link rel="stylesheet" href="css/owl.carousel.min.css" />

    <link rel="stylesheet" href="css/owl.theme.default.min.css" />

    <link href="css/templatemo-pod-talk.css" rel="stylesheet" />

    <!-- TemplateMo 584 Pod Talk https://templatemo.com/tm-584-pod-talk -->

</head>

<body>
    <main>
        @include('client.element.header', ['view' => 4])

        <header class="site-header d-flex flex-column justify-content-center align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 text-center">
                        <h2 class="mb-0">LIÊN HỆ</h2>
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
                                <span>038-325-9886</span>
                            </p>
                            <p class="d-flex border-bottom pb-3 mb-4">
                                <strong class="d-inline me-4">Email:</strong>
                                <span>libro@gmail.com</span>
                            </p>
                            <p class="d-flex">
                                <strong class="d-inline me-4">Vị trí:</strong>
                                <span>65 Đ. Huỳnh Thúc Kháng, Bến Nghé, Quận 1, Thành phố Hồ Chí Minh</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-5 col-12 mt-5 mt-lg-0">
                        <iframe class="google-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1959.7582617803375!2d106.70005877098545!3d10.77169511740364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f40a3b49e59%3A0xa1bd14e483a602db!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEvhu7kgdGh14bqtdCBDYW8gVGjhuq9uZw!5e0!3m2!1svi!2s!4v1686839504732!5m2!1svi!2s" width="100%" height="300" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                        <form action="{{ Auth::check() ? route('gui-lien-he') : route('dang-nhap') }}" method="{{ Auth::check() ? 'POST' : 'GET' }}" class="custom-form contact-form" role="form">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 col-12">
                                    <div class="form-floating">
                                        <input type="text" name="tieu_de" id="tieu-de" class="form-control" placeholder="Name" autocomplete="off" oninput="showSubmit()" />
                                        <label for="floatingInput">Tiêu đề</label>
                                    </div>
                                    <div class="form-floating">
                                        <textarea class="form-control" id="noi-dung" name="noi_dung" placeholder="Describe message here" oninput="showSubmit()"></textarea>
                                        <label for="floatingTextarea">Nội dung</label>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12 ms-auto">
                                    <button type="submit" id="submit-btn" class="form-control" style="background-color:rgb(80, 80, 80);pointer-events:none">Gửi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('client.element.footer')

    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>
    <script>
        var tieude = document.getElementById('tieu-de');
        var noidung = document.getElementById('noi-dung');
        var btn = document.getElementById('submit-btn')

        function showSubmit() {
            if (tieude.value.trim() !== '' && noidung.value.trim() !== '') {
                btn.style.pointerEvents = 'fill';
                btn.style.backgroundColor = '#0066cc';
            } else {
                btn.style.pointerEvents = 'none';
                btn.style.backgroundColor = 'rgb(80, 80, 80)';
            }
        }
    </script>
</body>

</html>