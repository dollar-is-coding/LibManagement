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

    <title>libro - Đổi mật khẩu</title>
    <link rel='shortcut icon' href='/img/LIBRO.png' />
    <!-- vendor css -->
    <link href="../lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../lib/typicons.font/typicons.css" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="../css/azia.css">

</head>

<body>

    @include('../common/header', ['view' => 4])
    @if(Session::has('success'))
    <script>
        setTimeout(function() {
            Swal.fire({
                icon: 'success',
                title: 'Thành công',
                text: `{{ Session::get('success') }}`,
                showConfirmButton: false,
                timer: 1000 
            });
        }, 100);
    </script>
    @endif
    <div class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40">
        <div class="container">
            <div class="az-content-left az-content-left-components">
                <div class="component-item">
                    <label>Cá nhân</label>
                    <nav class="nav flex-column">
                        <a href="{{ route('xem-thong-tin') }}" class="nav-link ">Hồ sơ</a>
                        <a href="#" class="nav-link active">Đổi mật khẩu</a>
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
                        <style>
                            .password-container {
                                position: relative;
                            }

                            .password-toggle {
                                position: absolute;
                                top: 50%;
                                right: 10px;
                                transform: translateY(-50%);
                                cursor: pointer;
                                left: 436px;
                                top: 40px;
                            }

                            .password-toggle_1 {
                                position: absolute;
                                top: 50%;
                                right: 10px;
                                transform: translateY(-50%);
                                cursor: pointer;
                                left: 436px;
                                top: 40px;
                            }
                        </style>
                        <form action="{{ route('xu-ly-doi-mat-khau-admin') }}" class="col-lg" method="POST">
                            @csrf

                            @error('old_pass')
                            <div style="font-style: italic;" class="text-danger">
                                {{ $message }} *&nbsp;
                            </div>
                            @enderror
                            <div class="form-group password-container">
                                <div class="row row-sm ml-0 pl-0 pr-0 mr-0 justify-content-between col-lg-7">
                                    <label class="m-0">&nbsp;Mật khẩu hiện tại</label>
                                </div>
                                <input type="password" name="old_pass" class="form-control col-lg-7" placeholder="Nhập Mật Khẩu Hiện Tại">
                                <i class="password-toggle far fa-eye"></i>
                            </div><!-- form-group -->
                            @error('new_pass')
                            <div style="font-style: italic;" class="text-danger">
                                {{ $message }} *&nbsp;
                            </div>
                            @enderror
                            <div class="form-group password-container">
                                <div class="row row-sm ml-0 pl-0 pr-0 mr-0 justify-content-between col-lg-7">
                                    <label class="m-0">&nbsp;Mật khẩu mới</label>
                                </div>
                                <input type="password" name="new_pass" class="form-control col-lg-7" placeholder="Nhập Mật Khẩu Mới">
                                <i class="password-toggle_1 far fa-eye"></i>
                            </div><!-- form-group -->
                            @error('confirm_pass')
                            <div style="font-style: italic;" class="text-danger">
                                {{ $message }} *&nbsp;
                            </div>
                            @enderror
                            <div class="form-group">
                                <div class="row row-sm ml-0 pl-0 pr-0 mr-0 justify-content-between col-lg-7">
                                    <label class="m-0">&nbsp;Xác minh mật khẩu</label>
                                </div>
                                <input type="password" id="confirm_pass" name="confirm_pass" class="form-control col-lg-7" placeholder="Nhập Xác Nhận Mật Khẩu">

                            </div><!-- form-group -->
                            <script>
                                document.querySelector('.password-toggle').addEventListener('click', function() {
                                    var passwordInput = document.querySelector('input[name="old_pass"]');
                                    var type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                                    passwordInput.setAttribute('type', type);

                                    // Thay đổi biểu tượng mắt khi chế độ hiển thị mật khẩu thay đổi
                                    this.classList.toggle('fa-eye');
                                    this.classList.toggle('fa-eye-slash');
                                });
                                document.querySelector('.password-toggle_1').addEventListener('click', function() {
                                    var conf = document.querySelector('input[id="confirm_pass"]');
                                    var passwordInput = document.querySelector('input[name="new_pass"]');
                                    var type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                                    passwordInput.setAttribute('type', type);

                                    var type_conf = conf.getAttribute('type') === 'password' ? 'text' : 'password';
                                    passwordInput.setAttribute('type', type);
                                    conf.setAttribute('type', type_conf);
                                    // Thay đổi biểu tượng mắt khi chế/ độ hiển thị mật khẩu thay đổi
                                    this.classList.toggle('fa-eye');
                                    this.classList.toggle('fa-eye-slash');
                                });
                            </script>
                            <div class="az-signin-footer row align-items-center ml-0 pl-0 col-lg-7">
                                @if (session('error'))
                                <span class="rounded-lg p-1 pl-2 pr-2 shadow-sm col-lg" style="background-color: #F2F0FE; border:#C6BCF8 1px solid; color: #402DA1;">
                                    <i class="typcn typcn-info text-danger h-4" style="font-size:16px"></i>
                                    <span class="text-danger">{{ session('error') }}</span>
                                </span>
                                @endif
                            </div>
                            <button class="col-lg-3 btn btn-az-primary btn-block mt-2 mb-3">Cập nhật</button>

                        </form>
                        <form class="ml-3" action="{{route('xu-ly-gui-ma-quen-mat-khau')}}" method="post">
                            @csrf
                            <button style="border:none" type="submit">Quên mật khẩu</button>
                        </form>
                    </div><!-- az-signin-header -->
                </div><!-- az-card-signin -->

                <div class="ht-40"></div>

                @include('../common/footer')

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