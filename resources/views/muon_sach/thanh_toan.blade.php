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
    <link rel='shortcut icon' href='/img/header.png' />
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
        <div class="container" style="margin-bottom: 30px;">
            <div class="az-content-body pd-lg-l-40 d-flex flex-column">
                <div class="">
                    <div style="display: flex;background-color: whitesmoke;" class="rounded">
                        <div style="flex-basis: 75%;" class="mt-3 ml-3">
                            <p>Mã phiếu mượn: <b>{{ $detail->ma_phieu_muon }}</b></p>
                            <p>Thủ thư: <b>{{ $detail->fkThuThu->ho }} {{ $detail->fkThuThu->ten }}</b></p>
                            <p>Đọc giả: <b>{{ $detail->fkNguoiDung->ho }} {{ $detail->fkNguoiDung->ten }}</b></p>
                            <input hidden type="text" id="tien_phat" value="{{ $tien_phat_het_han }}">
                        </div>
                        <div style="flex-basis: 25%;" class="mt-3">
                            <p>Thời gian: <b>{{ \Carbon\Carbon::parse($detail->ngay_lap_phieu)->format('d/m/Y') }}</b> -
                                <b>{{ \Carbon\Carbon::parse($detail->han_tra)->format('d/m/Y') }}</b>
                            </p>
                            @php
                            $hanTra = strtotime($detail->han_tra);
                            $ngayHienTai = strtotime(date('Y-m-d'));

                            $hanTra = new DateTime($detail->han_tra);
                            $ngayHienTai = new DateTime();
                            $diff = $ngayHienTai->diff($hanTra);
                            $soNgay = $diff->days +1;
                            if ($hanTra < $ngayHienTai) { echo "Đã trễ hạn: <b>$soNgay Ngày </b>" ; } else { echo "Số ngày còn lại: <b>$soNgay Ngày </b>" ; } if ($hanTra < $ngayHienTai) { echo '<p class="mt-3" style="color:red"><b>Hết hạn</b></p>' ; } else { echo '<p class="mt-3" style="color:green"><b>Còn hạn</b></p>' ; } @endphp </div>
                        </div>
                        <hr>
                        <form id="payment-form" action="{{ route('thanh-toan') }}" method="post">
                            @csrf
                            <input hidden type="text" name="het_han" value="{{ Carbon\Carbon::now() > Carbon\Carbon::parse($detail->han_tra) ? 1 : 0 }}">
                            <input hidden type="date" name="han_tra" value="{{ $detail->han_tra }}">
                            <input hidden type="text" name="doc_gia" value="{{ $detail->doc_gia_id }}">
                            <input hidden type="text" name="ma_phieu" value="{{ $detail->ma_phieu_muon }}">
                            <div class="table-responsive">
                                @foreach ($thanhtoan as $key => $item)
                                <p>Tên sách: <b>{{ $item->fkSach->ten }}</b></p>
                                <p>Tình trạng</p>
                                <div class="thanhtoan" data-id="{{ $item->sach_id }}">
                                    <div style="display: flex;">
                                        <label class="rdiobox">
                                            <input data-type="nguyen" checked type="radio" value="0|1" name="{{ $item->sach_id }}" id="{{ $item->sach_id }}_nguyen">
                                            <span class="p-1">Còn nguyên</span>
                                        </label>

                                        <label class="rdiobox mr-3 ml-3">
                                            <input data-type="mat" type="radio" value="{{ $item->fkSach->gia_tien }}|2" name="{{ $item->sach_id }}" id="{{ $item->sach_id }}_mat">
                                            <span class="p-1">Mất sách</span>
                                        </label>

                                        <label class="rdiobox">
                                            <input data-type="hu" type="radio" value="{{ $item->fkSach->gia_tien * 0.7 }}|3" name="{{ $item->sach_id }}" id="{{ $item->sach_id }}_hu">
                                            <span class="p-1">Hư sách</span>
                                        </label>
                                    </div>

                                    <div id="{{ $item->sach_id }}_a" style="display: none;">
                                        <div class="form-floating">
                                            <textarea class="form-control" name="hu_hong_{{ $item->sach_id }}" placeholder="Trình trạng hư hỏng" id="floatingTextarea"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                @endforeach
                                <p style="text-align: end;font-size: 18px;">Tiền phạt hết hạn: {{ number_format($tien_phat_het_han, 0, ',', '.') }} đ</p>
                                <p id="tienmatsach" style="text-align: end;font-size: 18px;">Tiền mất sách:</p>
                                <p id="tienhusach" style="text-align: end;font-size: 18px;">Tiền hư sách:</p>
                                <hr>
                                <p style="text-align: end;font-size: 20px;">Tổng tiền</p>
                                <input hidden class="mb-3" name="tong_tien_phat" id="tongtien" style="pointer-events: none;border: none;font-size: 18px;">
                                <p style="font-size: 18px;text-align: end;" id="tongtiendv"></p>
                                <div style="display: flex;justify-content: end;">
                                    <button class="btn btn-success abbutton" type="submit">Thanh Toán</button>
                                </div>

                                <script>
                                    function button_click(event) {
                                        event.preventDefault();

                                        Swal.fire({
                                            title: 'Bạn có muốn xuất hóa đơn không?',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            cancelButtonText: 'Không',

                                        }).then((result) => {
                                            if (result.value) {
                                                var form = document.getElementById('payment-form');
                                                var exportUrl = form.action + "?export=true";
                                                form.action = exportUrl;
                                                form.submit();
                                            } else {
                                                document.getElementById('payment-form').submit();
                                            }
                                        });
                                    }
                                    let tienmatsach = document.getElementById('tienmatsach');
                                    let tienhusach = document.getElementById('tienhusach');

                                    function tinhtongtiensach(key) {
                                        let hu = document.getElementById(`${key}_hu`);
                                        let nguyen = document.getElementById(`${key}_nguyen`);
                                        let mat = document.getElementById(`${key}_mat`);
                                        let input = document.getElementById(`${key}_a`);
                                        let tien_phat = document.getElementById('tien_phat')

                                        function check_hu() {
                                            if (hu.checked) {
                                                input.style.display = "block";
                                                Dom();
                                            }
                                        };

                                        function check_nguyen() {
                                            if (nguyen.checked) {
                                                input.style.display = "none";
                                                Dom();
                                            }
                                        }

                                        function check_mat() {
                                            if (mat.checked) {
                                                input.style.display = "none";
                                                Dom();
                                            }
                                        }
                                        hu.onchange = check_hu;
                                        nguyen.onchange = check_nguyen;
                                        mat.onchange = check_mat;
                                    }
                                    let tongtiendv = document.getElementById('tongtiendv');
                                    var tongtien = document.getElementById('tongtien');
                                    let a = document.querySelectorAll('.thanhtoan');
                                    var tong = 0;

                                    function Dom() {
                                        let tong_tien_sach = Number(tien_phat.value);
                                        let tien = {
                                            "hu": 0,
                                            "mat": 0,
                                            "nguyen": 0,
                                        }
                                        for (i of a) {
                                            let id_sach = i.getAttribute('data-id');
                                            let el = i.querySelector(`input[name="${id_sach}"]:checked`);
                                            let value = el.value;

                                            let array = value.split("|");
                                            tien[el.getAttribute('data-type')] += Number(array[0])

                                            tong_tien_sach += Number(array[0]);
                                        }
                                        tongtien.value = `${tong_tien_sach}`;
                                        tongtiendv.innerHTML = Number(tongtien.value).toLocaleString('vi-VI', {
                                            style: 'currency',
                                            currency: 'VND'
                                        }); + ' đ';

                                        tienhusach.innerHTML = 'Tiền hư sách: ' + Number(tien.hu).toLocaleString('vi-VI', {
                                            style: 'currency',
                                            currency: 'VND'
                                        }); + ' đ';
                                        tienmatsach.innerHTML = 'Tiền mất sách: ' + Number(tien.mat).toLocaleString('vi-VI', {
                                            style: 'currency',
                                            currency: 'VND'
                                        }); + ' đ';

                                        const buttom_thanh_toan = document.querySelector('.abbutton');
                                        if (Number(tongtien.value) > 0) {
                                            buttom_thanh_toan.onclick = button_click;
                                            // buttom_thanh_toan.setAttribute("id", "submit-btn");
                                        } else {

                                            buttom_thanh_toan.onclick = undefined;
                                            // buttom_thanh_toan.setAttribute("id", " ");
                                        }

                                    }

                                    for (i of a) {
                                        let id_sach = i.getAttribute('data-id');
                                        tinhtongtiensach(id_sach);
                                    }

                                    Dom();
                                    tongtien.value = Number(tien_phat.value) + Number(`${tong}`);
                                    tongtiendv.innerHTML = Number(tongtien.value).toLocaleString('vi-VI', {
                                        style: 'currency',
                                        currency: 'VND'
                                    }); + ' đ';
                                </script>
                            </div>

                        </form>
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

            <!-- <script>
            $(document).ready(function() {
                $('#submit-btn').click(function(event) {
                    event.preventDefault();
                    Swal.fire({
                        title: 'Bạn có muốn xuất hóa đơn không?',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Không',
                        cancelButtonText: 'Xuất hóa đơn'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#payment-form').submit();
                            var route = `{{ route('export-pdf', ['id' => $detail->ma_phieu_muon]) }}`;
                            var exportUrl = route + "?export=true";
                            window.location.href = exportUrl;
                        } else {
                            $('#payment-form').submit();
                        }
                    });
                });
            });
        </script> -->

</body>

</html>