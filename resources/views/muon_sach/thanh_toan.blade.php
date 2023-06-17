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
                <div class="">
                    <p>{{$detail->ma_phieu_muon}}</p>
                    <!-- <p>ngay lap {{$detail->ngay_lap_phieu}}</p>
                    <p>ngay tra {{$detail->han_tra}}</p> -->
                    <p>Thu thu {{$detail->fkThuThu->ten}}</p>
                    <p>doc gia {{$detail->fkNguoiDung->ten}}</p>
                    @php
                    $hanTra = strtotime($detail->han_tra);
                    $ngayHienTai = strtotime(date('Y-m-d'));

                    if ($hanTra < $ngayHienTai) { echo '<p style="color:red">Hết hạn</p>' ; } else { echo '<p style="color:green">Còn hạn</p>' ; } @endphp <hr>
                        <form action="" method="post">
                            <div class="table-responsive">

                                @foreach ($thanhtoan as $key => $item)
                                <div class="thanhtoan" data-id="{{$key}}">
                                    <label for="">Còn nguyên</label>
                                    <input checked type="radio" value="0" name="{{$key}}" id="{{$key}}_nguyen">
                                    <label for="">Mất sách</label>
                                    <input type="radio" value="10" name="{{$key}}" id="{{$key}}_mat">
                                    <label for="{{$key}}">Hư</label>
                                    <input type="radio" value="20" name="{{$key}}" id="{{$key}}_hu">
                                    <input type="hidden" id="tien{{$key}}" value="0" class="tongtien">

                                    <div id="{{$key}}_a" style="display: none;">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Trình trạng hư hỏng" id="floatingTextarea"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                @endforeach
                                <p id="tongtien"></p>
                                <script>
                                    function tinhtongtiensach(key) {
                                        let hu = document.getElementById(`${key}_hu`);
                                        let nguyen = document.getElementById(`${key}_nguyen`);
                                        let mat = document.getElementById(`${key}_mat`);
                                        let input = document.getElementById(`${key}_a`);

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
                                    var tongtien = document.getElementById('tongtien');
                                    let a = document.querySelectorAll('.thanhtoan');
                                    var tong = 0;

                                    function Dom() {
                                        let tong_tien_sach = 0;
                                        for (i of a) {
                                            let id_sach = i.getAttribute('data-id');
                                            let value = i.querySelector(`input[name="${id_sach}"]:checked`).value;
                                            tong_tien_sach += Number(value);
                                        }
                                        tongtien.innerHTML = `Tổng tiền: ${tong_tien_sach}`;
                                    }
                                    for (i of a) {
                                        let id_sach = i.getAttribute('data-id');
                                        tinhtongtiensach(id_sach);
                                        let value = i.querySelector(`input[name="${id_sach}"]:checked`).value;
                                        tong += Number(value);
                                    }
                                    tongtien.innerHTML = `Tổng tiền: ${tong}`;
                                </script>

                            </div>
                            <button class="btn btn-success" type="submit">Thanh Toán</button>
                        </form>
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