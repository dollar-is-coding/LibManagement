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

    <title>libro - Đổi mật khẩu</title>

    <!-- vendor css -->
    <link href="../lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../lib/typicons.font/typicons.css" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="../css/azia.css">

</head>

<body>

    @include('header', ['view' => 4])

    <div class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40">
        <div class="container">
            <div class="az-content-left az-content-left-components">
                <div class="component-item">
                    <label>Cá nhân</label>
                    <nav class="nav flex-column">
                        <a href="{{ route('xem-thong-tin') }}" class="nav-link ">Hồ sơ</a>
                        <a href="#" class="nav-link active">Đổi mật khẩu</a>
                        <a href="{{ route('tao-tai-khoan') }}" class="nav-link">Tạo tài khoản</a>
                        <a href="{{ route('quan-ly-tai-khoan') }}" class="nav-link">Quản lý tài khoản</a>
                    </nav>
                </div><!-- component-item -->
            </div><!-- az-content-left -->

            <div class="az-content-body pd-lg-l-40 d-flex flex-column">
                <div class="az-content-breadcrumb">
                    <span>Cá nhân</span>
                    <span>Đổi mật khẩu</span>
                </div>
                <div class="border shadow-sm rounded p-4 pr-5">
                    <h4 class="az-content-label mg-b-5 ml-3">Đổi Mật Khẩu</h4>
                    <p class="mg-b-5 ml-3">Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho người khác</p>
                    <hr class="hr ml-3" />
                    <div class="az-signin-header">
                        <form action="{{ route('xu-ly-doi-mat-khau') }}" class="col-lg" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="m-0">&nbsp;Mật Khẩu Hiện Tại</label>
                                <input required type="password" name="old_pass" class="form-control col-lg-7"
                                    placeholder="Nhập Mật Khẩu Hiện Tại" value="">
                            </div><!-- form-group -->
                            <div class="form-group">
                                <label class="m-0">&nbsp;Mật Khẩu Mới</label>
                                <input required type="password" name="new_pass" class="form-control col-lg-7"
                                    placeholder="Nhập Mật Khẩu Mới" value="">
                            </div><!-- form-group -->
                            <div class="form-group">
                                <label class="m-0">&nbsp;Xác Nhận Mật Khẩu</label>
                                <input required type="password" name="confirm_pass" class="form-control col-lg-7"
                                    placeholder="Nhập Xác Nhận Mật Khẩu" value="">
                            </div><!-- form-group -->
                            @if (session('error'))
                                <div class="text-danger">{{ session('error') }}</div>
                            @endif
                            <button class="col-lg-3 btn btn-az-primary btn-block">Cập nhật</button>
                        </form>
                    </div><!-- az-signin-header -->
                </div><!-- az-card-signin -->

                <div class="ht-40"></div>
                <div class="az-footer ht-40">
                    <div class="container ht-100p pd-t-0-f">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">
                            Copyright © bootstrapdash.com 2020
                        </span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free
                            <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">
                                Bootstrap admin templates
                            </a>
                            from Bootstrapdash.com
                        </span>
                    </div><!-- container -->
                </div><!-- az-footer -->
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
