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

    @include('/common/link')

</head>

<body style="
    display: flex;
      flex-direction: column; height: 100vh;">
    @include('../common/header', ['view' => 3])
    @if (Session::has('success'))
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
            <div class="az-content-body d-flex flex-column">
                <form class="row az-signin-header" action="{{ route('tim-kiem-duyet-sach') }}" method="get">
                    <div class="col-lg">
                        <input required class="form-control" name="tim_kiem" placeholder="Tìm kiếm" type="text" value="{{ old('tim_kiem', isset($tim_kiem) ? $tim_kiem : '') }}" autocomplete="off">
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
                    .mumu {
                        margin: 15px 50px 15px 15px !important;
                    }
                </style>
                <div class="az-content-left az-content-left-components" style="border: none;width: 100%;background-color: whitesmoke;">
                    <div class="component-item" style="position: sticky;">
                        <nav style="display: flex">
                            <a href="{{ route('phe-duyet-muon-sach') }}" class="nav-link active mumu">CHỜ DUYỆT</a>
                            <a href="{{ route('dang-muon-sach') }}" class="nav-link mumu">ĐANG MƯỢN</a>
                            <a href="{{ route('da-muon-sach') }}" class="nav-link mumu">ĐÃ TRẢ</a>
                            <a href="{{ route('phieu-phat') }}" class="nav-link mumu">PHIẾU PHẠT</a>
                        </nav>
                    </div><!-- component-item -->
                </div><!-- az-content-left -->
                <div>
                    @if ($so_luong > 0)
                    <div class="d-flex justify-content-between align-items-center mt-2 mb-2">
                        @if(request()->has('tim_kiem'))
                        <h4 class="m-0"><a href="{{ route('phe-duyet-muon-sach') }}" style="font-size: 22px;color: black;" class="mr-2">
                                <i class="typcn typcn-arrow-back"></i></a>TÌM THẤY ({{ $so_luong }}) PHIẾU</h4>
                        @else
                        <h4 class="m-0">PHÊ DUYỆT MƯỢN SÁCH ({{ $so_luong }})</h4>
                        @endif

                        <div style="display: flex;justify-content: end;">
                            <a class="btn btn-success rounded" href="{{ route('xu-ly-muon-tat-ca-sach') }}">
                                Duyệt tất cả</a>
                        </div>
                    </div>
                </div>
                @else
                <h4 class="mt-3">HIỆN TẠI KHÔNG CÓ PHIẾU CHỜ DUYỆT NÀO !!</h4>
                @endif
                <div class="table-responsive">
                    @foreach ($cho_duyet as $key => $item)
                    @if ($key == 0 || $item->ma_phieu_muon != $cho_duyet[$key - 1]->ma_phieu_muon)
                    <div class="container border rounded pt-3 pl-4 pr-3 pb-2 mb-2" style="display: grid;grid-template-columns: auto;">
                        <div class="d-flex">
                            <h5 class="mr-4">Mã phiếu mượn #{{ $item->ma_phieu_muon }}</h5>
                            <p class="mb-1 mr-4">
                                Độc giả:
                                <span style="font-weight: bold;">
                                    {{ $item->fkNguoiDung->ho }}
                                    {{ $item->fkNguoiDung->ten }}
                                </span>
                            </p>
                            <p class="mb-1 mr-4">
                                Ngày mượn:
                                <span style="font-weight: bold;">
                                    {{ \Carbon\Carbon::parse($item->ngay_lap_phieu)->format('d/m/Y') }}
                                </span>
                            </p>
                            <p class="mb-1">Ngày cần trả:
                                <span style="font-weight: bold;">
                                    {{ \Carbon\Carbon::parse($item->han_tra)->format('d/m/Y') }}
                                </span>
                            </p>
                        </div>
                        <div style="font-style: italic; text-decoration:underline">
                            Các quyển sách ({{ $item->tong_so_luong }}):</div>
                        @endif
                        @if (
                        ($key != $cho_duyet->count() - 1 && $item->ma_phieu_muon != $cho_duyet[$key + 1]->ma_phieu_muon) ||
                        $key == $cho_duyet->count() - 1)
                        <div class="ml-2" style="display: grid;grid-template-columns: auto auto">
                            <div style="display: flex;">
                                <div class="ml-3">
                                    <p class="mt-1 mb-0">
                                        <b>&bull; {{ $item->fkSach->ten }}</b>
                                        <span class="ml-3">x{{ $item->so_luong }} quyển</span>
                                    </p>
                                </div>
                            </div>
                            <div style="display: flex;flex-direction: row-reverse;">
                                <a class="btn btn-danger rounded m-1 delete-link" href="{{route('xu-ly-huy-phieu-muon',[$item->ma_phieu_muon])}}">Hủy phiếu</a>
                                <a href="{{ route('xu-ly-muon-sach', ['id' => $item->ma_phieu_muon]) }}" class="btn btn-success rounded m-1">Duyệt</a>
                                <a href="{{ route('chi-tiet-phieu', ['id' => $item->ma_phieu_muon]) }}" class="btn btn-indigo rounded m-1">Chi tiết</a>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="ml-2">
                        <div class="ml-3">
                            <p class="mt-1 mb-0">
                                <b>&bull; {{ $item->fkSach->ten }}</b>
                                <span class="ml-3">x{{ $item->so_luong }} quyển</span>
                            </p>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div><!-- container -->
    </div><!-- az-content -->
    @include('../common/footer')
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
                title: "Bạn có muốn hủy phiếu không?",
                // imageUrl: "/img/war.png",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Xác nhận hủy",
                cancelButtonText: "Không",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link.href;
                }
            });
        });
    </script>
</body>

</html>