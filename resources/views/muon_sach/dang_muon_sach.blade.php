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

</head>

<body>

    @include('../common/header', ['view' => 3])
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
            <div class="az-content-body pd-lg-l-40 d-flex flex-column">
                <form class="row az-signin-header" action="{{route('tim-kiem-dang-muon-sach')}}" method="get">
                    <div class="col-lg">
                        <input class="form-control" name="tim_kiem" placeholder="Tìm kiếm" type="text" value="" autocomplete="off">
                    </div>
                    <div class="col-lg-2">
                        <button class="btn btn-indigo btn-block m-0">Tìm kiếm</button>
                    </div>
                </form>
                @if (session('error'))
                <div id="error_ms" class="rounded-lg p-1 pl-2 pr-2 shadow-sm" style="background-color: #F2F0FE; border:#C6BCF8 1px solid; color: #402DA1;">
                    <i class="typcn typcn-info text-danger h-4" style="font-size:16px"></i>
                    <span class="text-danger">{{ session('error') }}</span>
                </div>
                @endif
                <style>
                    .nav-link {
                        margin: 15px 50px 15px 15px !important;
                    }
                </style>
                <div class="az-content-left az-content-left-components" style="border: none;width: 100%;background-color: whitesmoke;">
                    <div class="component-item" style="position: sticky;">
                        <nav style="display: flex">
                            <a href="{{route('phe-duyet-muon-sach')}}" class="nav-link">Chờ duyệt</a>
                            <a href="{{route('dang-muon-sach')}}" class="nav-link active">Đang mượn</a>
                            <a href="{{route('da-muon-sach')}}" class="nav-link">Đã mượn</a>
                        </nav>
                    </div><!-- component-item -->
                </div><!-- az-content-left -->
                <div class="">
                    <h3 class="ml-3 mt-3">Sách đang mượn sách</h3>
                    <div class="table-responsive">
                        @foreach ($dang_muon as $key => $item)
                        @if ($key == 0 || $item->ma_phieu_muon != $dang_muon[$key - 1]->ma_phieu_muon)
                        <div class="container border rounded ml-3 mb-3" style="width: 96%;display: grid;grid-template-columns: auto;">
                            <div style="display: grid;grid-template-columns: auto auto auto;width: 100%;">
                                <h5 class="ml-2 mt-1">Đọc giả: {{$item->fkNguoiDung->ten}}</h5>
                                <p class="mt-1">Mã phiếu mượn #{{$item->ma_phieu_muon}}</p>
                                <p style="text-align: right;" class="mt-1 mr-2">{{$item->ngay_lap_phieu}} - {{$item->han_tra}}</p>
                            </div>
                            <p class="ml-2" style="font-weight: bold;">Người duyệt: {{$item->fkNguoiDung->ten}}</p>
                            <p class="ml-2">Tổng số lượng: </p>
                            @endif
                            @if (
                            ($key != $dang_muon->count() - 1 && $item->ma_phieu_muon != $dang_muon[$key + 1]->ma_phieu_muon) ||
                            $key == $dang_muon->count() - 1)
                            <div class="ml-2" style="display: grid;grid-template-columns: auto auto">
                                <div style="display: flex;">
                                    <div class="ml-3">
                                        <p>{{ $item->fkSach->ten }} ({{ $item->so_luong }} quyển)</p>
                                    </div>
                                </div>
                                <div style="display: flex;flex-direction: row-reverse;height: 50px;">
                                    <a href="{{route('thanh-toan-sach',['id'=>$item->ma_phieu_muon])}}" style="width: 30%;" class="btn btn-success rounded mb-3 mr-2 ml-2">Xác nhận</a>
                                    <a href="{{route('chi-tiet-phieu',['id'=>$item->ma_phieu_muon])}}" style="width: 25%;" class="btn btn-indigo rounded mb-3">Chi tiết</a>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="ml-2">
                            <div class="ml-3">
                                <p>{{ $item->fkSach->ten }} ({{ $item->so_luong }} quyển)</p>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>


        </div><!-- container -->
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
    <script>
        $(document).on("click", ".delete-link", function(event) {
            event.preventDefault();
            var link = this;

            Swal.fire({
                title: "Bạn có muốn xóa không?",
                imageUrl: "/img/war.png",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Xóa",
                cancelButtonText: "Hủy",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link.href;
                }
            });
        });
    </script>
</body>

</html>