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

    <title>libro - Hồ sơ</title>

    <!-- vendor css -->
    @include('/common/link')

</head>

<body style="
display: flex;
      flex-direction: column; height: 100vh;">

    @include('../common/header', ['view' => 9])
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
    <div style="margin-bottom: 50px;" class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40">
        <div class="container">
            <div class="az-content-left az-content-left-components">
                <div class="component-item">
                    <label style="font-size: 20px;">Cá nhân</label>
                    <nav class="nav flex-column">
                        <a style="font-size: 18px;" href="#" class="nav-link active">Hồ sơ</a>
                        <a style="font-size: 18px;" href="{{ route('doi-mat-khau') }}" class="nav-link">Đổi mật khẩu</a>
                    </nav>
                </div><!-- component-item -->
            </div><!-- az-content-left -->

            <script>
                function chooseFile(fileinput) {
                    if (fileinput.files && fileinput.files[0]) {
                        var read = new FileReader();
                        read.onload = function(e) {
                            $('#image').attr('src', e.target.result);
                        }
                        read.readAsDataURL(fileinput.files[0]);
                    }
                }
            </script>
            <style>
                .ongnoi {
                    padding-top: 20px;
                    width: 400px;
                    height: 250px;
                    position: relative;
                    margin: 0px auto;
                }

                .cha {
                    width: 200px;
                    position: relative;
                    height: 200px;
                    margin: 0px auto;
                    border-radius: 100px;
                }

                .con1 {
                    width: 200px;
                    height: 200px;
                    position: absolute;
                    border-radius: 100px;
                }

                .cha:hover {
                    opacity: 0.8;

                }

                .con2 {
                    position: relative;
                    width: 100%;
                    height: 100%;
                    border-radius: 100px;
                }

                .chau1 {
                    position: absolute;
                    border-radius: 100px;
                    width: 100%;
                    height: 100%;
                    opacity: 0;
                }
            </style>

            <div class="az-content-body pd-lg-l-40 d-flex flex-column">
                <div class="az-content-breadcrumb">
                    <span>Cá nhân</span>
                    <span>Hồ sơ</span>
                </div>
                <div class="border shadow-sm rounded p-4 pr-5">
                    <h4 class="az-content-label mg-b-5 ml-3">Hồ Sơ Của Tôi</h4>
                    <p class="mg-b-5 ml-3 ">Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
                    <hr class="hr ml-3" />
                    <form class="az-signin-header row" action="{{ route('xu-ly-doi-thong-tin') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="ongnoi col-lg-4">
                            <div class="cha">
                                <div class="con1">
                                    @if (Auth::user()->hinh_anh == '')
                                    <img class="ca border rounded-circle" id="image" alt="" srcset="" src="../img/default/no_avatar.png" width="200px" height="200px" style="object-fit:cover">
                                    @else
                                    <img class="ca border rounded-circle" id="image" alt="" srcset="" src="../img/avt/{{ Auth::user()->hinh_anh }}" width="200px" height="200px" style="object-fit:cover">
                                    @endif
                                </div>

                                <div class="con2">
                                    <label for="file"></label>
                                    <input class="chau1" type="file" value="" onchange="chooseFile(this)" name="file" accept="image/gif, image/jpeg, image/png, image/jpg">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="row">
                                <div class="col-lg form-group">
                                    <div class="d-flex justify-content-between">
                                        <label class="m-0">&nbsp;Họ</label>
                                        @error('ho')
                                        <div style="font-style: italic;" class="text-danger">{{ $message }} *&nbsp;
                                        </div>
                                        @enderror
                                    </div>
                                    <input type="text" name="ho" class="form-control" placeholder="Nhập họ" value="{{ Auth::user()->ho }}">
                                </div><!-- form-group -->
                                <div class="col-lg form-group">
                                    <div class="d-flex justify-content-between">
                                        <label class="m-0">&nbsp;Tên</label>
                                        @error('ten')
                                        <div style="font-style: italic;" class="text-danger">{{ $message }} *&nbsp;
                                        </div>
                                        @enderror
                                    </div>
                                    <input type="text" name="ten" class="form-control" placeholder="Nhập tên" value="{{ Auth::user()->ten }}">
                                </div><!-- form-group -->
                            </div>
                            <div class="row row-sm align-items-end">
                                <div class="col-lg form-group">
                                    <div class="row row-sm justify-content-between ml-0 mr-0">
                                        <label class="m-0">&nbsp;Email</label>
                                        <a style="text-decoration: underline" class="" href="{{ route('xac-minh-email') }}">Thay đổi</a>
                                    </div>
                                    <input type="email" name="email" class="form-control" readonly value="{{ Auth::user()->email }}">
                                </div><!-- form-group -->
                                <div class="mg-b-20">
                                    <label class="rdiobox">
                                        <input name="gioi_tinh" value="1" type="radio" checked>
                                        <span>Nam</span>
                                    </label>
                                </div><!-- col-3 -->
                                <div class="mg-b-20">
                                    <label class="rdiobox">
                                        <input name="gioi_tinh" value="2" type="radio" {{ Auth::user()->gioi_tinh == 2 ? 'checked' : '' }}>
                                        <span>Nữ</span>
                                    </label>
                                </div><!-- col-3 -->
                            </div>

                            <div class="form-group">
                                <label class="m-0">&nbsp;Vai trò</label>
                                <input class="form-control" value="{{ Auth::user()->vai_tro == 0 ? 'Quản trị viên' : (Auth::user()->vai_tro == 1 ? 'Quản trị viên cấp cao' : 'Thủ thư') }}" disabled>
                            </div><!-- form-group -->
                            <button class="col-lg-3 btn btn-az-primary btn-block m-0 mt-2 border">Cập nhật</button>
                        </div>
                    </form><!-- az-signin-header -->
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