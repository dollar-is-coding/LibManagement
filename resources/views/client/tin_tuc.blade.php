<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Libro - Tin tức</title>

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
        @include('client.element.header', ['view' => 3])

        <header class="site-header d-flex flex-column justify-content-center align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 text-center">
                        <h2 class="mb-0">Tin Tức</h2>
                    </div>
                </div>
            </div>
        </header>

        <section class="about-section section-padding pt-2 pb-5" id="section_2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-12 mx-auto">
                        <div class="pb-5 mb-5">
                            <div class="section-title-wrap mb-4">
                                <h4 class="section-title">Nổi bật</h4>
                            </div>

                            <h6 class="mb-3">{{ $noi_bat->ten }}</h6>

                            <p style="text-align: justify;">
                                {{ $noi_bat->noi_dung }}
                            </p>
                            @if ($noi_bat->anh_bia)
                                <div class="d-flex justify-content-center">
                                    <img src="../img/avt/{{ $noi_bat->anh_bia }}" class="about-image mt-3 img-fluid" />
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="trending-podcast-section section-padding pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">
                                Liên quan
                            </h4>
                        </div>
                    </div>

                    @foreach ($tin_tuc as $key => $item)
                        <div class="col-lg-4 col-12 mb-4 mb-lg-0 {{ $key > 2 ? 'mt-4' : '' }}">
                            <div class="custom-block custom-block-full">
                                <div class="custom-block-image-wrap">
                                    <a href="">
                                        @if ($item->anh_bia != '')
                                            <img src="../img/avt/{{ $item->anh_bia }}"
                                                class="custom-block-image img-fluid" alt="" />
                                        @else
                                            <img src="../img/default/no_book.jpg"
                                                class="custom-block-image img-fluid border" alt="" />
                                        @endif
                                    </a>
                                </div>
                                <div class="custom-block-info">
                                    <h5 class="mb-2">
                                        <a style="width:13em; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;"
                                            href="">{{ $item->ten }}</a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
</body>

</html>
