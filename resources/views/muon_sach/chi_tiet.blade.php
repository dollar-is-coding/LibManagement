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

    @include('/common/link')

</head>

<body>

    @include('../common/header', ['view' => 0])
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
            <div class="az-content-body pd-lg-l-40 d-flex flex-column">
                <div>
                    <div class="d-flex mb-2">
                        <div>
                            <h3 class="m-0"> <a href="{{ url()->previous() }}" style="font-size: 22px;color: black;" class="mr-2">
                                    <i class="typcn typcn-arrow-back"></i></a>Chi tiết phiếu</h3>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div class="rounded p-3" style="background-color: whitesmoke;">
                            <div class="d-flex">
                                <h5 class="m-0 mr-5">Mã phiếu: {{ $chi_tiet_sach->ma_phieu_muon }}</h5>
                                <div class="d-flex">
                                    <p class="m-0 mr-5">Độc giả: <b>{{ $chi_tiet_sach->fkNguoiDung->ho }}
                                            {{ $chi_tiet_sach->fkNguoiDung->ten }}</b></p>
                                    @if ($chi_tiet_sach->thu_thu_id != '' && $chi_tiet_sach->trang_thai == 2)
                                    <p class="m-0 mr-5">Thủ thư: <b>
                                            {{ $chi_tiet_sach->fkThuThu->ho }} {{ $chi_tiet_sach->fkThuThu->ten }}
                                        </b></p>
                                    @elseif($chi_tiet_sach->trang_thai == 3)
                                    <p class="m-0 mr-5">Thủ thư: <b>
                                            {{ $chi_tiet_sach->hasPhieuTraSach->fkNguoiDung->ho }}
                                            {{ $chi_tiet_sach->hasPhieuTraSach->fkNguoiDung->ten }}
                                        </b></p>
                                    @endif
                                </div>
                                <p class="m-0 mr-5">Ngày mượn:
                                    <b>{{ \Carbon\Carbon::parse($chi_tiet_sach->ngay_lap_phieu)->format('d/m/Y') }}</b>
                                </p>
                                @if ($chi_tiet_sach->trang_thai != 3)
                                <p class="m-0 mr-5">Ngày cần trả:
                                    <b>{{ \Carbon\Carbon::parse($chi_tiet_sach->han_tra)->format('d/m/Y') }}</b>
                                </p>
                                @else
                                <p class="m-0 mr-5">Ngày trả:
                                    <b>{{ \Carbon\Carbon::parse($chi_tiet_sach->hasPhieuTraSach->created_at)->format('d/m/Y') }}</b>
                                </p>
                                @endif
                                <div>
                                    @if($chi_tiet_sach->trang_thai ==1)
                                    <a href="{{route('xu-ly-huy-phieu-muon',[$chi_tiet_sach->ma_phieu_muon])}}" class="btn btn-danger rounded delete-link">Hủy phiếu</a>
                                    <a href="{{ route('xu-ly-muon-sach', ['id' => $chi_tiet_sach->ma_phieu_muon]) }}" class="btn btn-success rounded">Duyệt</a>
                                    @elseif($chi_tiet_sach->trang_thai ==2)
                                    <a href="{{ route('thanh-toan-sach', ['id' => $chi_tiet_sach->ma_phieu_muon]) }}" class="btn btn-success rounded">Trả sách</a>
                                    @endif
                                </div>
                            </div>
                            <p class="m-0 mt-2">
                                Tổng số lượng sách: <b>{{ $chi_tiet_sach->tong_so_luong }} quyển
                                </b></p>
                        </div>
                        @foreach ($chitiet as $key => $item)
                        <div class="border rounded mt-3" style="display: flex;">
                            <div style="flex-basis: 100%;" class="mt-3 ml-3 mr-3">
                                <div class="d-flex justify-content-between">
                                    <h4>{{ $item->fkSach->ten }}</h4>
                                    <div style="display: flex;">
                                        <p>Mã sách: <b>{{ $item->fkSach->ma_sach }}</b></p>
                                        <p class="ml-4">Số lượng: <b>{{ $item->so_luong }}</b></p>
                                        <p class="ml-4">Vị trí:
                                            <b>{{ $item->fkSach->hasThuVien->fkTuSach->ten }},
                                                {{ $item->fkSach->hasThuVien->fkTuSach->fkKhuVuc->ten }}</b>
                                        </p>
                                    </div>
                                </div>
                                <p class="m-0 mb-2">Tác giả: <b>{{ $item->fkSach->fkTacGia->ten }}</b></p>
                                <p class="m-0 mb-2">Thể loại: <b>{{ $item->fkSach->fkTheLoai->ten }}</b></p>
                                <p class="m-0 mb-2">Năm xuất bản: <b>{{ $item->fkSach->nam_xuat_ban }}</b></p>
                                <p class="m-0 mb-3">
                                    Nhà xuất bản: <b>{{ $item->fkSach->fkNhaXuatBan->ten }}</b>
                                </p>
                            </div>
                        </div>
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