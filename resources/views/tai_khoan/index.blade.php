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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="BootstrapDash">

    <title>libro - Quản lý tài khoản</title>

    <!-- vendor css -->
    <link href="../lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../lib/typicons.font/typicons.css" rel="stylesheet">

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
                        <a href="{{ route('tao-tai-khoan') }}" class="nav-link">Cấp tài khoản</a>
                        <a href="#" class="nav-link active">Quản lý tài khoản</a>
                    </nav>
                </div><!-- component-item -->
            </div><!-- az-content-left -->

            <div class="az-content-body pd-lg-l-40 d-flex flex-column">
                <div class="az-content-breadcrumb">
                    <span>Cá nhân</span>
                    <span>Quản lý tài khoản</span>
                </div>

                <div class="table-responsive">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active border" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Quản trị viên</button>
                        </li>
                        <li class="nav-item mr-2 ml-2" role="presentation">
                            <button class="nav-link border" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Thủ thư</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link border" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Độc giả</button>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <table class="table mg-b-0 mg-t-20 az-table-reference">
                                <thead>
                                    <tr>
                                        <td class="wd-5p">STT</td>
                                        <th>Họ</th>
                                        <th>Tên</th>
                                        <th>Email</th>
                                        <th>Vị trí</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admin as $key => $item)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>{{ $item->ho }}</td>
                                        <td>{{ $item->ten }}</td>
                                        <td>{{ $item->email }}</td>

                                        <td>
                                            <?php
                                            if ($item->vai_tro == 2) {
                                                echo 'Thủ thư';
                                            } elseif ($item->vai_tro == 1) {
                                                echo 'Quản trị viên';
                                            } else {
                                                echo 'Độc giả';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                            <table class="table mg-b-0 mg-t-20 az-table-reference">
                                <thead>
                                    <tr>
                                        <td class="wd-5p">STT</td>
                                        <th>Họ</th>
                                        <th>Tên</th>
                                        <th>Email</th>
                                        <th>Vị trí</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($thuthu as $key => $item)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>{{ $item->ho }}</td>
                                        <td>{{ $item->ten }}</td>
                                        <td>{{ $item->email }}</td>

                                        <td>
                                            <?php
                                            if ($item->vai_tro == 2) {
                                                echo 'Thủ thư';
                                            } elseif ($item->vai_tro == 1) {
                                                echo 'Quản trị viên';
                                            } else {
                                                echo 'Độc giả';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                            <table class="table mg-b-0 mg-t-20 az-table-reference">
                                <thead>
                                    <tr>
                                        <td class="wd-5p">STT</td>
                                        <th>Họ</th>
                                        <th>Tên</th>
                                        <th>Email</th>
                                        <th>Vị trí</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($docgia as $key => $item)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>{{ $item->ho }}</td>
                                        <td>{{ $item->ten }}</td>
                                        <td>{{ $item->email }}</td>

                                        <td>
                                            <?php
                                            if ($item->vai_tro == 2) {
                                                echo 'Thủ thư';
                                            } elseif ($item->vai_tro == 1) {
                                                echo 'Quản trị viên';
                                            } else {
                                                echo 'Độc giả';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- <div class="mt-5 d-flex justify-content-center">
                        <div>
                             $ds_tai_khoan->links() 
                        </div>
                    </div> -->
                </div><!-- bd -->

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