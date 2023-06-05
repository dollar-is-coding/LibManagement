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
                                <div class="d-flex justify-content-between">
                                    <label class="m-0">&nbsp;Họ</label>
                                    @error('ho')
                                        <div style="font-style: italic;" class="text-danger">{{ $message }} *&nbsp;
                                        </div>
                                    @enderror
                                </div>
                                <input name="ho" id="ho" class="form-control" value="{{ old('ho') }}"
                                    placeholder="Nhập họ" type="text" autocomplete="off">
                            </div>

                            <div class="col-lg form-group m-0">
                                <div class="d-flex justify-content-between">
                                    <label class="m-0">&nbsp;Tên</label>
                                    @error('ten')
                                        <div style="font-style: italic;" class="text-danger">{{ $message }} *&nbsp;
                                        </div>
                                    @enderror
                                </div>
                                <input name="ten" id="ten" value="{{ old('ten') }}" class="form-control"
                                    placeholder="Nhập tên" type="text" autocomplete="off">
                            </div>
                            <div class="mb-1">
                                <label class="rdiobox">
                                    <input name="gioi_tinh" type="radio" value="1" checked>
                                    <span>Nam</span>
                                </label>
                            </div>
                            <div class="mb-1">
                                <label class="rdiobox">
                                    <input name="gioi_tinh" type="radio" value="2"
                                        {{ old('gioi_tinh') == 2 ? 'checked' : '' }}>
                                    <span>Nữ</span>
                                </label>
                            </div>
                        </div>

                        <div class="row row-sm mg-b-20">
                            <div class="wd-350 form-group m-0">
                                <div class="d-flex justify-content-between">
                                    <label class="m-0">&nbsp;Lớp</label>
                                    @error('lop')
                                        <div style="font-style: italic;" class="text-danger">{{ $message }} *&nbsp;
                                        </div>
                                    @enderror
                                </div>
                                <input name="lop" class="form-control" value="{{ old('lop') }}"
                                    placeholder="Nhập lớp" type="text" autocomplete="off">
                            </div>
                            <div class="col-lg">
                                <div class="d-flex justify-content-between">
                                    <label class="m-0">&nbsp;Ngày sinh</label>
                                    @error('ngay_sinh')
                                        <div style="font-style: italic;" class="text-danger">{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <input name="ngay_sinh" class="form-control" value="{{ old('ngay_sinh') }}"
                                    id="datetimepicker" placeholder="DD/MM/YYYY" type="text" autocomplete="off">
                            </div>
                        </div>

                        <div class="row row-sm mg-b-20">
                            <div class="wd-350 form-group m-0">
                                <div class="d-flex justify-content-between">
                                    <label class="m-0">&nbsp;Số điện thoại</label>
                                    @error('so_dien_thoai')
                                        <div style="font-style: italic;" class="text-danger">{{ $message }} *&nbsp;
                                        </div>
                                    @enderror
                                </div>
                                <input name="so_dien_thoai" class="form-control" value="{{ old('so_dien_thoai') }}"
                                    placeholder="Nhập số điện thoại" type="text" autocomplete="off">
                            </div>
                            <div class="col-lg">
                                <div class="d-flex justify-content-between">
                                    <label class="m-0">&nbsp;Email</label>
                                    @error('email')
                                        <div style="font-style: italic;" class="text-danger">{{ $message }} *&nbsp;
                                        </div>
                                    @enderror
                                </div>
                                <input name="email" class="form-control" value="{{ old('email') }}"
                                    type="text" autocomplete="off" placeholder="Nhập email">
                            </div>
                        </div>

                        <div class="form-group mg-b-20">
                            <div class="d-flex justify-content-between">
                                <label class="m-0">&nbsp;Địa chỉ</label>
                                @error('dia_chi')
                                    <div style="font-style: italic;" class="text-danger">{{ $message }} *&nbsp;
                                    </div>
                                @enderror
                            </div>
                            <input type="text" name="dia_chi" class="form-control" value="{{ old('dia_chi') }}"
                                placeholder="Nhập địa chỉ" autocomplete="off">
                        </div>
                        @if (session('success'))
                            <span class="rounded-lg p-2 pl-3 pr-4 shadow-sm"
                                style="background-color: #F2F0FE; border:#C6BCF8 1px solid; color: #402DA1;">
                                <i class="typcn typcn-input-checked h-4" style="font-size:18px;color:#402DA1"></i>
                                <span class="ml-1">{{ session('success') }}</span>
                            </span>
                        @else
                            @if (session('error'))
                                <span class="rounded-lg p-2 pl-3 pr-4 shadow" style="border: #dbd7fa 1px solid">
                                    <i class="typcn typcn-warning h-4" style="font-size:18px;color:red"></i>
                                    <span class="ml-1">{{ session('error') }}</span>
                                </span>
                            @endif
                        @endif
                        <div class="col-sm-6 col-md-3 p-0">
                            <button id="button" class="btn btn-primary btn-block">Tạo thẻ mới</button>
                        </div>

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
