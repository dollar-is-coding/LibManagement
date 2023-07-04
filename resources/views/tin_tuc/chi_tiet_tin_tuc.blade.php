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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="BootstrapDash">

    <title>libro - Tạo tài khoản</title>

    <!-- vendor css -->
    <link href="../lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="../lib/spectrum-colorpicker/spectrum.css" rel="stylesheet">
    <link href="../lib/select2/css/select2.min.css" rel="stylesheet">
    <link href="../lib/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="../lib/ion-rangeslider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <link href="../lib/amazeui-datetimepicker/css/amazeui.datetimepicker.css" rel="stylesheet">
    <link href="../lib/jquery-simple-datetimepicker/jquery.simple-dtpicker.css" rel="stylesheet">
    <link href="../lib/pickerjs/picker.min.css" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="../css/azia.css">
    <link rel='shortcut icon' href='/img/LIBRO.png' />
</head>

<body>

    @include('../common/header', ['view' => 5])
    @if(Session::has('success'))
    <script>
        setTimeout(function() {
            Swal.fire({
                icon: 'success',
                title: 'Thành công',
                text: `{{ Session::get('success') }}`,
                showConfirmButton: false,
                timer: 1000 // Hiển thị trong 5 giây
            });
        }, 100);
    </script>
    @endif
    <div class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40">
        <div class="container">
            <div class="az-content-left az-content-left-components">
                <div class="component-item">
                    <label>Tin tức</label>
                    <nav class="nav flex-column">
                        <a href="{{route('them-tin-tuc')}}" class="nav-link ">Thêm tin tức</a>
                        <a href="{{ route('danh-sach-tin-tuc') }}" class="nav-link">Quản lý tin tức</a>
                    </nav>
                </div><!-- component-item -->
            </div><!-- az-content-left -->

            <div class="az-content-body pd-lg-l-40 d-flex flex-column">
                <div class="az-content-breadcrumb">
                    <span>Tin tức</span>
                    <span>Quản lý tin tức</span>
                </div>
                <!-- viet tai day -->
                @foreach($tintuc as $item)
                <h3 style="text-align: center;" class="mb-3">{{$item->ten}}</h3>
                <div style="display: flex;">
                    <div style="flex-basis: 30%;">
                        @if ($item->anh_bia == "")
                        <img src="../img/default/no_image_available.jpg" width="240em" height="320em" style="object-fit: cover">
                        @else
                        <img src="/img/news/{{ $item->anh_bia }}" width="240em" height="320em" style="object-fit: cover">
                        @endif
                    </div>
                    <div style="flex-basis: 70%;" class="pr-3">
                        <p>
                            @php
                            echo $item->noi_dung;
                            @endphp
                        </p>
                    </div>
                </div>
                <div style="display: flex;" class="pt-3">
                    <p style="width: 33%;">Lượt xem {{$item->luot_xem}}</p>
                    <p style="width: 33%;"></p>
                    <p style="width: 33%;"></p>
                </div>
                @endforeach
            </div>
        </div><!-- container -->
        <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
            @include('../common/footer')
        </div><!-- az-content-body -->
    </div><!-- az-content -->
    <link href="https://cdn.jsdelivr.net/npm/suneditor@latest/dist/css/suneditor.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/suneditor@latest/dist/suneditor.min.js"></script>


    <script src="../lib/jquery/jquery.min.js"></script>
    <script src="../lib/jquery-ui/ui/widgets/datepicker.js"></script>

    <script src="../lib/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js"></script>
    <script src="../lib/jquery-simple-datetimepicker/jquery.simple-dtpicker.js"></script>

    <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/ionicons/ionicons.js"></script>
    <script src="../lib/chart.js/Chart.bundle.min.js"></script>
    <script src="../lib/select2/js/select2.min.js"></script>

    <script src="../js/azia.js"></script>
    <script src="../js/chart.chartjs.js"></script>
    <script src="../js/jquery.cookie.js" type="text/javascript"></script>
</body>

</html>