<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-90680653-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-90680653-2');
    </script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="BootstrapDash">

    <title>{{ $doc_gia->ho }} {{ $doc_gia->ten }} - Trả sách</title>

    <!-- vendor css -->
    <link href="../lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../lib/typicons.font/typicons.css" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="../css/azia.css">

</head>

<body>

    @include('../common/header', ['view' => 3])

    <div class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40">
        <div class="container">
            <div class="az-content-left az-content-left-components">
                <div class="component-item">
                    <label>{{ $doc_gia->ho }} {{ $doc_gia->ten }}</label>
                    <nav class="nav flex-column">
                        <a href="{{ route('hien-thi-chi-tiet-doc-gia', ['id' => $doc_gia->id]) }}" class="nav-link">
                            Chi tiết</a>
                        @if ($doc_gia->sgk > 0 || $doc_gia->sach_khac > 0)
                            <a class="nav-link active">Trả sách</a>
                        @endif
                    </nav>
                </div><!-- component-item -->
            </div><!-- az-content-left -->

            <div class="az-content-body pd-lg-l-40 d-flex flex-column">
                <div class="az-content-breadcrumb">
                    <span>{{ $doc_gia->ho }} {{ $doc_gia->ten }}</span>
                    <span>Chi tiết</span>
                </div>
                <div class="border shadow-sm rounded p-4 pr-5">
                    <div class="ml-4">
                        <div class="row row-sm">
                            <div class="col-lg">
                                <div style="font-size: 26px" class="ml-1">
                                    {{ $doc_gia->ho }} {{ $doc_gia->ten }}
                                    <span class="font-weight-normal h6">
                                        ({{ $doc_gia->gioi_tinh ? 'Nam' : 'Nữ' }})
                                    </span>
                                </div>
                                <div style="color:gray" class="ml-1">Mã số
                                    <span class="font-italic font-weight-bold">
                                        {{ $doc_gia->ma_so }}
                                    </span>
                                </div>
                            </div>
                            <div>
                                {!! QrCode::size(80)->generate('(doc gia) ' . Str::ascii($doc_gia->ten)) !!}
                            </div>
                        </div>
                        <div class="mt-2">
                            @foreach ($sach as $key => $item)
                                <div class="rounded border p-3 mb-2 ml-0 mr-0 row"
                                    style="background-color: #f9f9fc; border:#C6BCF8 1px solid">
                                    <div>
                                        <label class="ckbox">
                                            <input type="checkbox" name="tra_sach">
                                            <span></span>
                                        </label>
                                    </div>
                                    <div class="ml-3">
                                        <div class="row row-sm">
                                            <div class="h6 pr-0" style="color: #402DA1;">{{ $item->fkSach->ten }}</div>
                                            <div class="text-danger h6">
                                                @if (\Carbon\Carbon::now()->format('d/m/Y') > \Carbon\Carbon::parse($item->ngay_tra)->format('d/m/Y'))
                                                    &#x2022; Trễ
                                                    {{ \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($item->ngay_tra)) }}
                                                    ngày
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row row-sm mt-2">
                                            <div class="mb-0">
                                                <label class="rdiobox mb-0">
                                                    <input name="tinh_trang{{ $key }}" type="radio" checked>
                                                    <span>Nguyên vẹn</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="rdiobox mb-0">
                                                    <input name="tinh_trang{{ $key }}" type="radio">
                                                    <span>Không nguyên vẹn (rách trang sách, nhào nát, ...)</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div><!-- az-card-signin -->

                <div class="ht-40"></div>

                @include('../common/footer')

            </div><!-- az-content-body -->
        </div><!-- container -->
    </div><!-- az-content -->

    <script src="../lib/jquery/jquery.min.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/ionicons/ionicons.js"></script>
    <script src="../lib/chart.js/Chart.bundle.min.js"></script>

    <script src="../js/azia.js"></script>
    <script src="../js/chart.chartjs.js"></script>
    <script src="../js/jquery.cookie.js" type="text/javascript"></script>
</body>

</html>
