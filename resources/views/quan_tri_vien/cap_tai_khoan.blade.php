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

    @include('../common/header', ['view' => 4])

    <div class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40">
        <div class="container">
            <div class="az-content-left az-content-left-components">
                <div class="component-item">
                    <label>Quản trị viên</label>
                    <nav class="nav flex-column">
                        <a href="#" class="nav-link active">Cấp tài khoản</a>
                        <a href="{{ route('quan-ly-tai-khoan') }}" class="nav-link ">Quản lý tài khoản</a>
                    </nav>
                </div><!-- component-item -->
            </div><!-- az-content-left -->

            <div class="az-content-body pd-lg-l-40 d-flex flex-column">
                <div class="az-content-breadcrumb">
                    <span>Cá nhân</span>
                    <span>Tạo tài khoản</span>
                </div>
                <div class="border shadow-sm rounded p-4 pr-5">
                    <h4 class="az-content-label mg-b-5 ml-3">Tạo tài khoản</h4>
                    <p class="mg-b-5 ml-3 ">
                        Chỉ admin mới có quyền cấp tài khoản, vui lòng không chia sẻ mật khẩu cho người khác
                    </p>
                    <hr class="hr ml-3" />
                    <form action="{{ route('xu-ly-tao-tai-khoan') }}" class="ml-3 az-signin-header" method="POST">
                        @csrf
                        <div class="row row-sm align-items-end mg-b-20">
                            <div class="wd-350 form-group m-0">
                                <label class="m-0">&nbsp;Họ</label>
                                <input class="form-control" name="ho" placeholder="Nhập họ" type="text" required>
                            </div><!-- col -->
                            <div class="col-lg form-group m-0">
                                <label class="m-0">&nbsp;Tên</label>
                                <input class="form-control" name="ten" placeholder="Nhập tên" type="text" required>
                            </div><!-- col -->
                            <div class="mb-1">
                                <label class="rdiobox">
                                    <input name="gioi_tinh" value="1" type="radio" checked>
                                    <span>Nam</span>
                                </label>
                            </div><!-- col-3 -->
                            <div class="mb-1">
                                <label class="rdiobox">
                                    <input name="gioi_tinh" value="2" type="radio">
                                    <span>Nữ</span>
                                </label>
                            </div><!-- col-3 -->
                        </div>

                        <div class="row row-sm">
                            <div class="wd-350">
                                <label class="m-0">&nbsp;Vai trò</label>
                                <select name="vai_tro" class="form-control select2-no-search">
                                    <option label="Choose one"></option>
                                    <option value="1">Quản trị viên</option>
                                    <option value="0">Thủ thư</option>
                                </select>
                            </div><!-- col-4 -->
                            <div class="col-lg form-group">
                                <label class="m-0">&nbsp;Email</label>
                                <input required pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" type="email" name="email" class="form-control" placeholder="Nhập email" value="">
                                @if (session('errorMail'))
                                <i class="text-center text-danger fst-italic" style="margin-top: 10px;">{{ session('errorMail') }}</i>
                                @endif
                            </div><!-- form-group -->
                        </div>

                        <div class="row row-sm">
                            <div class="wd-350 form-group">
                                <label class="m-0">&nbsp;Mật khẩu</label>
                                <input required type="password" name="password" class="form-control" placeholder="Nhập mật khẩu" value="">
                            </div><!-- form-group -->
                           
                        </div>

                        <button class="col-lg-3 btn btn-az-primary btn-block m-0 mt-2 border">Tạo</button>
                    </form>
                </div><!-- az-card-signin -->

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
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: 'Choose one',
                searchInputPlaceholder: 'Search'
            });

            $('.select2-no-search').select2({
                minimumResultsForSearch: Infinity,
                placeholder: 'Chọn vai trò'
            });
        });
    </script>
</body>

</html>