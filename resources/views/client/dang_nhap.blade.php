<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Đăng nhập</title>

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
                        <h4 class="section-title">Đăng nhập</h4>
                    </div>
                    <form action="{{ route('xu-ly-dang-nhap') }}" method="post" class="custom-form contact-form" role="form">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <div class="form-floating">
                                    @error('email')
                                    <div style="font-style: italic;" class="text-danger">
                                        {{ $message }} *&nbsp;
                                    </div>
                                    @enderror
                                    <input type="text" name="email" id="name" class="form-control" placeholder="Nhập email" value="{{ old('email') }}" />
                                    <label for="floatingInput">Email</label>
                                </div>
                                <div class="form-floating">
                                    @error('password')
                                    <div style="font-style: italic;" class="text-danger">
                                        {{ $message }} *&nbsp;
                                    </div>
                                    @enderror
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
                                    </style>
                                    <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu" value="{{ old('password') }}">
                                    <label for="floatingInput">Mật khẩu</label>
                                    <i class="password-toggle far fa-eye"></i>
                                    <script>
                                        document.querySelector('.password-toggle').addEventListener('click', function() {
                                            var passwordInput = document.querySelector('input[name="password"]');
                                            var type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                                            passwordInput.setAttribute('type', type);

                                            // Thay đổi biểu tượng mắt khi chế độ hiển thị mật khẩu thay đổi
                                            this.classList.toggle('fa-eye');
                                            this.classList.toggle('fa-eye-slash');
                                        });
                                    </script>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="h7" style="margin-left:10px">
                                    <a href="{{ route('nhap-mail-quen-mat-khau') }}">Quên mật khẩu?</a>
                                </div>
                                <div class="col-lg-4 col-12 ms-auto">
                                    <button type="submit" class="form-control">Đăng nhập</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    @if (session('error'))
                    <div class="row justify-content-center">
                        <span class="rounded-lg p-1 pl-2 pr-2" style="background-color: #F2F0FE; border:#C6BCF8 1px solid; color: #402DA1;">
                            <i class="typcn typcn-info text-danger h-4" style="font-size:16px"></i>
                            <span class="text-danger">{{ session('error') }}</span>
                        </span>
                    </div>
                    @endif
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