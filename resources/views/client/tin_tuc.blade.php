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

    <!-- TemplateMo 584 Pod Talk https://templatemo.com/tm-584-pod-talk -->

</head>

<body>
    <main>
        @include('client.element.header', ['view' => 3])

        <header class="site-header d-flex flex-column justify-content-center align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 text-center">
                        <h2 class="mb-0">TIN TỨC</h2>
                    </div>
                </div>
            </div>
        </header>

        @if (!$noi_bat && $tin_tuc->count() == 0)
            <section class="trending-podcast-section section-padding pt-0">
                <div class="container">
                    <div class="d-flex justify-content-center">
                        <h6>Chưa có tin tức!</h6>
                    </div>
                </div>
            </section>
        @endif

        @if ($noi_bat)
            <section class="about-section section-padding pt-2 {{ $tin_tuc->count() > 0 ? 'pb-0' : '' }}"
                id="section_2">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-12 mx-auto">
                            <div class="pb-5">
                                @if ($is_noi_bat)
                                    <div class="section-title-wrap">
                                        <h4 class="section-title">Nổi bật</h4>
                                    </div>
                                @endif
                                <div class="d-flex flex-column align-items-end mb-2">
                                    <small style="font-family: 'sono'; color: #717275">
                                        Đăng ngày {{ $noi_bat->created_at->day }},
                                        tháng {{ $noi_bat->created_at->month }},
                                        {{ $noi_bat->created_at->year }}
                                    </small>
                                    <small style="font-family: 'sono'; color: #717275">
                                        <i class="bi-eye-fill"></i>
                                        {{ $noi_bat->luot_xem }} lượt xem</small>
                                </div>
                                <h5 style="text-align: justify">{{ $noi_bat->ten }}</h5>
                                <hr>
                                <?= htmlspecialchars_decode($noi_bat->noi_dung) ?>
                                @if ($noi_bat->anh_bia)
                                    <div class="d-flex justify-content-center">
                                        <img src="../img/news/{{ $noi_bat->anh_bia }}"
                                            class="about-image mt-3 img-fluid" />
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        @if ($tin_tuc->count() > 0)
            <section class="trending-podcast-section section-padding pt-0 mb-4">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="section-title-wrap mb-5">
                                <h4 class="section-title">
                                    Mới nhất
                                </h4>
                            </div>
                        </div>
                        @foreach ($tin_tuc as $key => $item)
                            <div class="col-lg-4 col-12 mb-4 mb-lg-0 {{ $key > 2 ? 'mt-4' : '' }}">
                                <div class="custom-block custom-block-full">
                                    <div class="custom-block-image-wrap">
                                        <a href="{{ route('tin-tuc', ['tin_tuc' => $item->id]) }}">
                                            @if ($item->anh_bia != '')
                                                <img src="../img/news/{{ $item->anh_bia }}"
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
                                                href="{{ route('tin-tuc', ['tin_tuc' => $item->id]) }}">{{ $item->ten }}</a>
                                        </h5>
                                        <hr class="m-0 mb-2">
                                        <div class="d-flex justify-content-between">
                                            <small style="font-family: 'sono'; color: #717275">
                                                <i class="bi-calendar"></i>
                                                {{ $item->created_at->format('d-m-Y') }}</small>
                                            <small style="font-family: 'sono'; color: #717275">
                                                <i class="bi-eye-fill"></i>
                                                {{ $item->luot_xem }}</small>
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

    @include('client.element.footer')

    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>
