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

    @include('/common/link')

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
                timer: 1000 // Hiển thị trong 5 giây
            });
        }, 100);
    </script>
    @endif
    <div style="margin-bottom: 270px;" class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40">
        <div class="container">
            <div class="az-content-left az-content-left-components">
                <div class="component-item">
                    <label>Cá nhân</label>
                    <nav class="nav flex-column">
                        <a href="#" class="nav-link active">Hồ sơ</a>
                        <a href="{{ route('doi-mat-khau') }}" class="nav-link">Đổi mật khẩu</a>
                    </nav>
                </div><!-- component-item -->
            </div><!-- az-content-left -->
            <div class="az-content-body pd-lg-l-40 d-flex flex-column">
                <div class="border shadow-sm rounded p-4 pr-5">
                    <h4 class="az-content-label mg-b-5 ml-3">Xác minh tài khoản</h4>
                    <p class="mg-b-5 ml-3 ">Vui lòng kiểm tra email tài khoản của bạn và không chia sẻ mã với bất cứ</p>

                    <form action="{{route('nhap-ma-xac-thuc-quen-mat-khau')}}" method="post">
                        @csrf
                        <div class="form-group password-container ml-3">
                            <div class="row row-sm ml-0 pl-0 pr-0 mr-0 justify-content-between col-lg-7">
                                <label class="mt-2">&nbsp;Nhập mã xác thực</label>
                            </div>
                            <input type="text" name="xac_thuc" class="form-control col-lg-7" placeholder="Nhập mã xác thực">
                            <button class="btn btn-az-primary mt-3" type="submit">Xác thực</button>
                        </div><!-- form-group -->
                    </form>
                    @if (session('error'))
                    <div class="row">
                        <span class="rounded-lg p-1 pl-2 pr-2" style="color: #402DA1;">
                            <i class="typcn typcn-info text-danger h-4" style="font-size:16px"></i>
                            <span class="text-danger">{{ session('error') }}</span>
                        </span>
                    </div>
                    @endif
                </div><!-- az-card-signin -->

                <div class="ht-40"></div>

                

            </div><!-- az-content-body -->
        </div><!-- container -->
    </div><!-- az-content -->
@include('../common/footer')
    <script src="../lib/jquery/jquery.min.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/ionicons/ionicons.js"></script>
    <script src="../lib/chart.js/Chart.bundle.min.js"></script>


    <script src="../js/azia.js"></script>
    <script src="../js/chart.chartjs.js"></script>
    <script src="../js/jquery.cookie.js" type="text/javascript"></script>
</body>

</html>