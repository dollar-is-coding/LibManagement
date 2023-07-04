<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Đăng nhập</title>
    <link rel='shortcut icon' href='/img/LIBRO.png' />
    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Sono:wght@200;300;400;500;700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="css/bootstrap.min.css" />

    <link rel="stylesheet" href="css/bootstrap-icons.css" />

    <link rel="stylesheet" href="css/owl.carousel.min.css" />

    <link rel="stylesheet" href="css/owl.theme.default.min.css" />

    <link href="css/templatemo-pod-talk.css" rel="stylesheet" />

    <link href="../lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../lib/typicons.font/typicons.css" rel="stylesheet">
    <!-- TemplateMo 584 Pod Talk https://templatemo.com/tm-584-pod-talk -->

</head>

<body>
    <section class="contact-section section-padding pt-0" style="margin-top:20vh">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-12 mx-auto sign-in">
                    <div class="section-title-wrap mb-5">
                        <h4 class="section-title">Đặt mật khẩu mới</h4>
                    </div>
                    <form action="{{ route('xu-ly-dat-lai-mat-khau') }}" method="post" class="custom-form contact-form" role="form">
                        @csrf
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
                        <div class="row">
                            <div class="col-lg-12 col-12">
                                @error('new_pass')
                                <div style="font-style: italic;" class="text-danger">
                                    {{ $message }} *&nbsp;
                                </div>
                                @enderror
                                <div class="form-floating">
                                    <input type="password" name="new_pass" id="name" class="form-control" placeholder="Nhập email" required />
                                    <i class="password-toggle far fa-eye"></i>
                                    <label for="floatingInput">Mật khẩu mới</label>
                                </div>
                                @error('confirm_pass')
                                <div style="font-style: italic;" class="text-danger">
                                    {{ $message }} *&nbsp;
                                </div>
                                @enderror
                                <div class="form-floating">
                                    <input type="password" name="confirm_pass" id="name" class="form-control" placeholder="Nhập email" required />
                                    <label for="floatingInput">Xác nhận mật khẩu mới</label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('dang-nhap') }}" style="margin-left:10px" class="d-flex align-items-center">
                                    <i class="bi bi-caret-left-fill"></i>
                                    <span class="h7">Quay lại trang chủ</span>
                                </a>
                                <div class="col-lg-4 col-12 ms-auto">
                                    <button type="submit" class="form-control">Lưu</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    @if (session('error'))
                    <div class="row justify-content-center">
                        <span class="rounded-lg p-1 pl-2 pr-2" style="color: #402DA1;">
                            <i class="typcn typcn-info text-danger h-4" style="font-size:16px"></i>
                            <span class="text-danger">{{ session('error') }}</span>
                        </span>
                    </div>
                    @endif
                    <script>
                        document.querySelector('.password-toggle').addEventListener('click', function() {
                            var passwordInput = document.querySelector('input[name="new_pass"]');
                            var passwordInput_conf = document.querySelector('input[name="confirm_pass"]');
                            var type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                            var type = passwordInput_conf.getAttribute('type') === 'password' ? 'text' : 'password';

                            passwordInput.setAttribute('type', type);
                            passwordInput_conf.setAttribute('type', type);


                            // Thay đổi biểu tượng mắt khi chế độ hiển thị mật khẩu thay đổi
                            this.classList.toggle('fa-eye-slash');
                            this.classList.toggle('fa-eye');
                        });
                    </script>
                </div>
            </div>
        </div>
    </section>

    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>