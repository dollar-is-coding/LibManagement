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

    @include('/common/link')

</head>

<body style=" display: flex; flex-direction: column; height: 100vh;">

    @include('../common/header', ['view' => 4])
    @if (Session::has('success'))
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
                    @if(Auth::user()->vai_tro == 2)
                    <label style="font-size: 20px;">Thủ thư</label>
                    @else
                    <label style="font-size: 20px;">Quản trị viên</label>
                    @endif
                    <nav class="nav flex-column">
                        <a style="font-size: 18px;" href="{{ route('tao-tai-khoan') }}" class="nav-link">Cấp tài khoản</a>
                        <a style="font-size: 18px;" href="#" class="nav-link active">Quản lý tài khoản</a>
                    </nav>
                </div><!-- component-item -->
            </div><!-- az-content-left -->

            <div class="az-content-body pd-lg-l-40 d-flex flex-column">
                <div class="az-content-breadcrumb">
                    <span>Cá nhân</span>
                    <span>Quản lý tài khoản</span>
                </div>
                @if(Auth::user()->vai_tro == 1 || Auth::user()->vai_tro == 0)
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
                                        @if(Auth::user()->vai_tro == 1)
                                        <th></th>
                                        @elseif(Auth::user()->vai_tro == 0)
                                        @else
                                        <th></th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody >
                                    @foreach ($admin as $key => $item)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        @if($item->vai_tro == Auth::user()->vai_tro)
                                        <td>
                                            <p>{{ $item->ho }}</p>
                                        </td>
                                        @else
                                        <td><a href="{{route('chi-tiet-tai-khoan',['id'=>$item->id])}}">{{ $item->ho }}</a></td>
                                        @endif
                                        <td>{{ $item->ten }}</td>
                                        <td>{{ $item->email }}</td>
                                        @if(Auth::user()->vai_tro == 1 && $item->id != Auth::id())
                                        <td>
                                            <div style="display: flex;justify-content: center;">
                                                <a class="delete-link" href="{{route('xu-ly-xoa-tai-khoan',['id'=>$item->id])}}"><i style="font-size: 20px;color: red;" class="fas fa-times"></i></a>
                                            </div>
                                        </td>
                                        @elseif(Auth::user()->vai_tro == 0)
                                        @else
                                        <td>

                                        </td>
                                        @endif
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
                                        @if(Auth::user()->vai_tro == 1 || Auth::user()->vai_tro == 0)
                                        <th></th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($thuthu as $key => $item)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        @if($item->vai_tro == Auth::user()->vai_tro)
                                        <td>
                                            <p>{{ $item->ho }}</p>
                                        </td>
                                        @else
                                        <td><a href="{{route('chi-tiet-tai-khoan',['id'=>$item->id])}}">{{ $item->ho }}</a></td>
                                        @endif
                                        <td>{{ $item->ten }}</td>
                                        <td>{{ $item->email }}</td>
                                        @if(Auth::user()->vai_tro == 1 || Auth::user()->vai_tro == 0)
                                        <td>
                                            <div style="display: flex;justify-content: center;">
                                                <a class="delete-link" href="{{route('xu-ly-xoa-tai-khoan',['id'=>$item->id])}}"><i style="font-size: 20px;color: red;" class="fas fa-times"></i></a>
                                            </div>
                                        </td>
                                        @endif
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
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($docgia as $key => $item)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td><a href="{{route('chi-tiet-tai-khoan',['id'=>$item->id])}}">{{ $item->ho }}</a></td>
                                        <td>{{ $item->ten }}</td>
                                        <td>{{ $item->email }}</td>

                                        <td>
                                            <div style="display: flex;justify-content: center;">
                                                <a class="delete-link" href="{{route('xu-ly-xoa-tai-khoan',['id'=>$item->id])}}"><i style="font-size: 20px;color: red;" class="fas fa-times"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- bd -->
                @else
                <h4 class="mt-2">QUẢN LÝ TÀI KHOẢN ĐỘC GIẢ</h4>
                <table class="table mg-b-0 mg-t-20 az-table-reference">
                    <thead>
                        <tr>
                            <td class="wd-5p">STT</td>
                            <th>Họ</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($docgia as $key => $item)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td><a href="{{route('chi-tiet-tai-khoan',['id'=>$item->id])}}">{{ $item->ho }}</a></td>
                            <td>{{ $item->ten }}</td>
                            <td>{{ $item->email }}</td>

                            <td>
                                <div style="display: flex;justify-content: center;">
                                    <a class="delete-link" href="{{route('xu-ly-xoa-tai-khoan',['id'=>$item->id])}}"><i style="font-size: 20px;color: red;" class="fas fa-times"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
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
    <script>
        const deleteLinks = document.querySelectorAll(".delete-link");
        deleteLinks.forEach((link) => {
            link.addEventListener("click", (event) => {
                event.preventDefault();
                Swal.fire({
                    title: "Bạn có chắc chắn muốn xóa tài khoản này không?",
                    // imageUrl: "/img/war.png",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Xóa",
                    cancelButtonText: "Hủy",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link.href;
                    }
                });
            });
        });
    </script>
</body>

</html>