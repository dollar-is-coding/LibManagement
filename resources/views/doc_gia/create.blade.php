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

    <title>libro - Sách</title>

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

    <div class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40">
        <div class="container">
            <div class="az-content-left az-content-left-components">
                <div class="component-item">
                    <label>Độc giả</label>
                    <nav class="nav flex-column">
                        <a href="#" class="nav-link active">Cấp thẻ</a>
                        <a href="" class="nav-link">Quản lý</a>
                    </nav>
                    <label>Mượn sách</label>
                    <nav class="nav flex-column">
                        <a href="{{ route('hien-thi-muon-sach-giao-khoa') }}" class="nav-link">Sách giáo khoa</a>
                        <a href="{{ route('hien-thi-muon-sach-khac') }}" class="nav-link">Sách khác</a>
                    </nav>
                </div><!-- component-item -->
            </div><!-- az-content-left -->

            <div class="az-content-body pd-lg-l-40 d-flex flex-column">
                <div class="az-content-breadcrumb">
                    <span>Độc giả</span>
                    <span>Cấp thẻ</span>
                </div>
                <div class="border shadow-sm rounded p-4 az-signin-header">
                    <form action="{{ route('xu-ly-cap-the') }}" class="ml-3 mr-3" method="POST">
                        @csrf
                        <div class="row row-sm align-items-end mg-b-20">
                            <div class="wd-350 form-group m-0">
                                <label class="m-0">&nbsp;Họ</label>
                                <input name="ho" id="ho" class="form-control" placeholder="Nhập họ"
                                    type="text" autocomplete="off" required>
                            </div>
                            <div class="col-lg form-group m-0">
                                <label class="m-0">&nbsp;Tên</label>
                                <input name="ten" id="ten" class="form-control" placeholder="Nhập tên"
                                    type="text" autocomplete="off" required>
                            </div>
                            <div class="mb-1">
                                <label class="rdiobox">
                                    <input name="gioi_tinh" type="radio" value="1" checked>
                                    <span>Nam</span>
                                </label>
                            </div>
                            <div class="mb-1">
                                <label class="rdiobox">
                                    <input name="gioi_tinh" type="radio" value="0">
                                    <span>Nữ</span>
                                </label>
                            </div>
                        </div>

                        <div class="row row-sm mg-b-20">
                            <div class="wd-350 form-group m-0">
                                <label class="m-0">&nbsp;Lớp</label>
                                <input name="lop" class="form-control" placeholder="Nhập lớp" type="text"
                                    autocomplete="off" required>
                            </div>
                            <div class="col-lg">
                                <label class="m-0">&nbsp;Ngày sinh</label>
                                <input name="ngay_sinh" class="form-control" id="datetimepicker"
                                    placeholder="DD/MM/YYYY" type="text" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="row row-sm mg-b-20">
                            <div class="wd-350 form-group m-0">
                                <label class="m-0">&nbsp;Điện thoại</label>
                                <input name="so_dien_thoai" class="form-control" placeholder="Nhập số điện thoại"
                                    type="text" autocomplete="off" required>
                            </div>
                            <div class="col-lg">
                                <label class="m-0">&nbsp;Email</label>
                                <input name="email" class="form-control" type="email" autocomplete="off"
                                    placeholder="Nhập email" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="dia_chi" class="m-0">&nbsp;Địa chỉ</label>
                            <input type="text" name="dia_chi" class="form-control" placeholder="Nhập địa chỉ"
                                autocomplete="off" required>
                        </div>

                        <div class="col-sm-6 col-md-3 p-0">
                            <button id="button" class="btn btn-primary btn-block">Tạo thẻ</button>
                        </div>

                        @if (session('error'))
                            <p style="color: red;">{{ session('error') }}</p>
                        @endif
                    </form>
                </div>

                <div class="ht-40"></div>

                @include('../common/footer')

            </div><!-- az-content-body -->
        </div><!-- container -->
    </div><!-- az-content -->
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
        $(function() {
            // Datepicker
            $('.fc-datepicker').datepicker({
                showOtherMonths: true,
                selectOtherMonths: true
            });

            $('#datepickerNoOfMonths').datepicker({
                showOtherMonths: true,
                selectOtherMonths: true,
                numberOfMonths: 2
            });

            // AmazeUI Datetimepicker
            $('#datetimepicker').datepicker({
                format: 'mm-dd-yyyy',
                autoclose: true, // close the datepicker when a date is selected
                todayHighlight: true, // highlight today's date
                dateFormat: 'dd/mm/yy'
            });

        });

        $(document).ready(function() {
            $('.select2').select2({
                placeholder: 'Chọn trường',
                searchInputPlaceholder: 'Search'
            });

            $('.select2-no-search').select2({
                minimumResultsForSearch: Infinity,
                placeholder: 'Choose one'
            });
        });

        var ho = document.getElementById('ho');
        var ten = document.getElementById('ten');
        var button = document.getElementById('button');
        var result = document.getElementById('result');

        button.addEventListener('click', function() {
            result.innerText = ho.value + ' ' + ten.value;
        });
    </script>
</body>

</html>
