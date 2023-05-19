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

    <title>libro - Đăng nhập</title>

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
                <h2>Xác minh tài khoản</h2>
                <!-- <h4>Xác minh tài khoản</h4> -->

                <form action="" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Email</label>
                        <input required pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" type="email" name="email" class="form-control" placeholder="Nhập email của bạn" value="">
                    </div><!-- form-group -->
                    <button type="submit" class="btn btn-az-primary btn-block">Send</button>
                </form>
                @if (session('error'))
                <div class="text-center text-danger fst-italic" style="margin-top: 10px;">{{ session('error') }}</div>
                @endif
            </div><!-- az-signin-header -->
            <div class="az-signin-footer">
                <!-- @if ($errors->any())
                {{ implode('', $errors->all('<div>:message</div>')) }}
                @endif -->
                <p><a href="{{route('dang-nhap')}}">Quay lại</a></p>
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