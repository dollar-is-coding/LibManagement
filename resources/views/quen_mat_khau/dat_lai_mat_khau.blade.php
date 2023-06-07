<!DOCTYPE html>
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

    <title>libro - Quên mật khẩu</title>

    <!-- vendor css -->
    <link href="../lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../lib/typicons.font/typicons.css" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="../css/azia.css">

</head>

<body class="az-body">

    <div class="az-signin-wrapper">
        <div class="az-card-signin">
            <h1 class="az-logo">libro</h1>
            <div class="az-signin-header">
                <h2>Đặt lại mật khẩu</h2>
                <!-- <h4>Please sign in to continue</h4> -->

                <form action="{{ route('xu-ly-dat-lai-mat-khau') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="d-flex justify-content-between">
                            <label class="m-0">&nbsp;Mật khẩu mới</label>
                            {{-- @error('new_pass')
                                <div style="font-style: italic;" class="text-danger">
                                    {{ $message }} *&nbsp;
                        </div>
                        @enderror --}}
                    </div>
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
                        }
                        .password-toggle_1 {
                            position: absolute;
                            top: 50%;
                            right: 10px;
                            transform: translateY(-50%);
                            cursor: pointer;
                        }
                    </style>
                    <div class="password-container">
                        <input type="password" name="new_pass" class="form-control" placeholder="Nhập mật khẩu mới">
                        <i class="password-toggle far fa-eye"></i>
                    </div>
                    <script>
                        document.querySelector('.password-toggle').addEventListener('click', function() {
                            var passwordInput = document.querySelector('input[name="new_pass"]');
                            var type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                            passwordInput.setAttribute('type', type);

                            // Thay đổi biểu tượng mắt khi chế độ hiển thị mật khẩu thay đổi
                            this.classList.toggle('fa-eye');
                            this.classList.toggle('fa-eye-slash');
                        });
                    </script>
            </div><!-- form-group -->
            <div class="form-group">
                <div class="d-flex justify-content-between">
                    <label class="m-0">&nbsp;Xác minh mật khẩu</label>
                    {{-- @error('confirm_pass')
                                <div style="font-style: italic;" class="text-danger">
                                    {{ $message }} *&nbsp;
                </div>
                @enderror --}}
            </div>
            <div class="password-container">
                <input type="password" name="confirm_pass" class="form-control" placeholder="Nhập lại mật khẩu">
                <i class="password-toggle_1 far fa-eye"></i>
            </div>
            <script>
                document.querySelector('.password-toggle_1').addEventListener('click', function() {
                    var passwordInput = document.querySelector('input[name="confirm_pass"]');
                    var type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);

                    // Thay đổi biểu tượng mắt khi chế độ hiển thị mật khẩu thay đổi
                    this.classList.toggle('fa-eye');
                    this.classList.toggle('fa-eye-slash');
                });
            </script>
        </div><!-- form-group -->
        <button class="btn btn-az-primary btn-block">Lưu</button>
        </form>
        @if (session('error'))
        <div class="row justify-content-center">
            <span class="rounded-lg p-1 pl-2 pr-2" style="background-color: #F2F0FE; border:#C6BCF8 1px solid; color: #402DA1;">
                <i class="typcn typcn-info text-danger h-4" style="font-size:16px"></i>
                <span class="text-danger">{{ session('error') }}</span>
            </span>
        </div>
        @endif
    </div><!-- az-signin-header -->
    <div class="az-signin-footer">
        <p><a href="{{ route('dang-nhap') }}">Trở về đăng nhập</a></p>
    </div><!-- az-signin-footer -->
    </div><!-- az-card-signin -->
    </div><!-- az-signin-wrapper -->


    <script src="../lib/jquery/jquery.min.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/ionicons/ionicons.js"></script>
    <script src="../js/jquery.cookie.js" type="text/javascript"></script>
    <script src="../js/jquery.cookie.js" type="text/javascript"></script>

    <script src="../js/azia.js"></script>
    <script>
        $(function() {
            'use strict'
        });
    </script>
</body>

</html>