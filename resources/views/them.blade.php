<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-90680653-2"></script> -->
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-90680653-2');
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/error.css">
    <!-- Link tới jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <!-- Link tới Popper.js (Yêu cầu bởi Bootstrap) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <!-- Link tới Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="BootstrapDash">

    <title>Azia Responsive Bootstrap 4 Dashboard Template</title>

    <!-- vendor css -->
    <link href="/lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="/lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="../lib/select2/css/select2.min.css" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="/css/azia.css">

</head>

<body>
    <div class="az-header">
        <div class="container">
            <div class="az-header-left">
                <a href="index.html" class="az-logo"><span></span> azia</a>
                <a href="" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
            </div>
            <!-- az-header-left -->
            <div class="az-header-menu">
                <div class="az-header-menu-header">
                    <a href="index.html" class="az-logo"><span></span> azia</a>
                    <a href="" class="close">&times;</a>
                </div>
                <!-- az-header-menu-header -->
                <ul class="nav">
                    <li class="navitem">
                        <a href="index.html" class="nav-link"><i class="typcn typcn-chart-area-outline"></i>
                            Dashboard</a>
                    </li>
                    <li class="navitem">
                        <a href="" class="nav-link with-sub"><i class="typcn typcn-document"></i> Pages</a>
                        <nav class="az-menu-sub">
                            <a href="page-signin.html" class="nav-link">Sign In</a>
                            <a href="page-signup.html" class="nav-link">Sign Up</a>
                        </nav>
                    </li>
                    <li class="navitem active">
                        <a href="chart-chartjs.html" class="nav-link"><i class="typcn typcn-chart-bar-outline"></i>
                            Charts</a>
                    </li>
                    <li class="navitem">
                        <a href="form-elements.html" class="nav-link"><i class="typcn typcn-chart-bar-outline"></i>
                            Forms</a>
                    </li>
                    <li class="navitem">
                        <a href="" class="nav-link with-sub"><i class="typcn typcn-book"></i> Components</a>
                        <div class="az-menu-sub">
                            <div class="container">
                                <div>
                                    <nav class="nav">
                                        <a href="elem-buttons.html" class="nav-link">Buttons</a>
                                        <a href="elem-dropdown.html" class="nav-link">Dropdown</a>
                                        <a href="elem-icons.html" class="nav-link">Icons</a>
                                        <a href="table-basic.html" class="nav-link">Table</a>
                                    </nav>
                                </div>
                            </div>
                            <!-- container -->
                        </div>
                    </li>
                </ul>
            </div>
            <!-- az-header-menu -->
            <div class="az-header-right">
                <a href="https://www.bootstrapdash.com/demo/azia-free/docs/documentation.html" target="_blank" class="az-header-search-link"><i class="far fa-file-alt"></i></a>
                <a href="" class="az-header-search-link"><i class="fas fa-search"></i></a>
                <div class="az-header-message">
                    <a href="#"><i class="typcn typcn-messages"></i></a>
                </div>
                <!-- az-header-message -->
                <div class="dropdown az-header-notification">
                    <a href="" class="new"><i class="typcn typcn-bell"></i></a>
                    <div class="dropdown-menu">
                        <div class="az-dropdown-header mg-b-20 d-sm-none">
                            <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                        </div>
                        <h6 class="az-notification-title">Notifications</h6>
                        <p class="az-notification-text">You have 2 unread notification</p>
                        <div class="az-notification-list">
                            <div class="media new">
                                <div class="az-img-user">
                                    <img src="/img/faces/face2.jpg" alt="" />
                                </div>
                                <div class="media-body">
                                    <p>
                                        Congratulate <strong>Socrates Itumay</strong> for work
                                        anniversaries
                                    </p>
                                    <span>Mar 15 12:32pm</span>
                                </div>
                                <!-- media-body -->
                            </div>
                            <!-- media -->
                            <div class="media new">
                                <div class="az-img-user online">
                                    <img src="/img/faces/face3.jpg" alt="" />
                                </div>
                                <div class="media-body">
                                    <p>
                                        <strong>Joyce Chua</strong> just created a new blog post
                                    </p>
                                    <span>Mar 13 04:16am</span>
                                </div>
                                <!-- media-body -->
                            </div>
                            <!-- media -->
                            <div class="media">
                                <div class="az-img-user">
                                    <img src="/img/faces/face4.jpg" alt="" />
                                </div>
                                <div class="media-body">
                                    <p>
                                        <strong>Althea Cabardo</strong> just created a new blog post
                                    </p>
                                    <span>Mar 13 02:56am</span>
                                </div>
                                <!-- media-body -->
                            </div>
                            <!-- media -->
                            <div class="media">
                                <div class="az-img-user">
                                    <img src="/img/faces/face5.jpg" alt="" />
                                </div>
                                <div class="media-body">
                                    <p>
                                        <strong>Adrian Monino</strong> added new comment on your
                                        photo
                                    </p>
                                    <span>Mar 12 10:40pm</span>
                                </div>
                                <!-- media-body -->
                            </div>
                            <!-- media -->
                        </div>
                        <!-- az-notification-list -->
                        <div class="dropdown-footer">
                            <a href="">View All Notifications</a>
                        </div>
                    </div>
                    <!-- dropdown-menu -->
                </div>
                <!-- az-header-notification -->
                <div class="dropdown az-profile-menu">
                    <a href="" class="az-img-user"><img src="/img/faces/face1.jpg" alt="" /></a>
                    <div class="dropdown-menu">
                        <div class="az-dropdown-header d-sm-none">
                            <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                        </div>
                        <div class="az-header-profile">
                            <div class="az-img-user">
                                <img src="/img/faces/face1.jpg" alt="" />
                            </div>
                            <!-- az-img-user -->
                            <h6>Aziana Pechon</h6>
                            <span>Premium Member</span>
                        </div>
                        <!-- az-header-profile -->

                        <a href="" class="dropdownitem"><i class="typcn typcn-user-outline"></i> My
                            Profile</a>
                        <a href="" class="dropdownitem"><i class="typcn typcn-edit"></i> Edit Profile</a>
                        <a href="" class="dropdownitem"><i class="typcn typcn-time"></i> Activity Logs</a>
                        <a href="" class="dropdownitem"><i class="typcn typcn-cog-outline"></i> Account
                            Settings</a>
                        <a href="page-signin.html" class="dropdownitem"><i class="typcn typcn-power-outline"></i>
                            Sign Out</a>
                    </div>
                    <!-- dropdown-menu -->
                </div>
            </div>
            <!-- az-header-right -->
        </div>
        <!-- container -->
    </div>
    <!-- az-header -->

    <div class="az-content pd-y-20 pd-lg-y-30 shadow-sm">
        <div class="container">
            <div class="az-content-body d-flex flex-column">
                <div style="display: flex">
                    <div style="flex-basis: 70%; margin-right: 2%; padding: 2%" class="shadow border rounded auto_form">
                        <form action="{{ route('xu-ly-them-sach') }}" id="form_them_sach" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div style="display: flex">
                                <!-- up ảnh -->
                                <div class="upload-container row" style="flex-basis: 30%; margin-right: 2%">
                                    <div class="upload-container border rounded">
                                        <label for="upload-file" class="upload-label" style="font-size: 130%">Tải ảnh
                                            lên</label>
                                        <input required style="font-size: 120px; opacity: 0" type="file" id="upload-file" name="file_upload" accept="image/*" />
                                        <div id="preview-container" class="preview-container"></div>
                                    </div>
                                    <!-- số lượng -->
                                    <div style="margin-top: 6%" class="form-group">
                                        <label>&nbsp;&nbsp;Số lượng</label>
                                        <input required type="number" min="1" max="100" name="so_luong" id="so_luong" class="form-control" placeholder="Số lượng" value="" />
                                    </div>
                                    <!-- khu vực -->
                                    <div class="form-group">
                                        <label>&nbsp;&nbsp;Khu vực</label>
                                        <select id="khuVucSelect" name="khu_vuc" class="form-control select2-no-search">
                                            @foreach ($khu_vuc as $item)
                                            <option value="{{ $item->id }}">{{ $item->ten }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- form -->
                                <div style="flex-basis: 70%">
                                    <div class="form-group">
                                        <label>&nbsp;&nbsp;Tên sách</label>
                                        <input required type="text" name="ten_sach" id="ten_sach" class="form-control" placeholder="Nhập tên sách" value="" pattern="[A-Za-z0-9\u00C0-\u017F]{3,30}" title="Tên sách phải chứa từ 3 đến 30 ký tự chữ cái hoặc số">
                                    </div>
                                    <!-- form-group -->

                                    <div class="form-group">
                                        <label>&nbsp;&nbsp;Tác giả</label>
                                        <select id="form-select" name="tac_gia" class="form-control select2-no-search">
                                            @foreach ($tac_gia as $item)
                                            <option selected value="1">{{ $item->ten }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>&nbsp;&nbsp;Thể loại</label>
                                        <select id="form-select" name="the_loai" class="form-control select2-no-search">
                                            @foreach ($the_loai as $item)
                                            <option value="2">{{ $item->ten }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>&nbsp;&nbsp;Nhà xuất bản</label>
                                        <select id="form-select" name="nha_xuat_ban" class="form-control select2-no-search">
                                            @foreach ($nha_xuat_ban as $item)
                                            <option value="2">{{ $item->ten }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>&nbsp;&nbsp;Năm xuất bản</label>
                                        <input required type="number" min="1800" max="2024" name="nam_xuat_ban" class="form-control" placeholder="Nhập năm xuất bản" value="" />
                                    </div>
                                    <!-- form-group -->

                                    <div class="form-group">
                                        <label>&nbsp;&nbsp;Tủ sách</label>
                                        <select required id="tuSachSelect" name="tu_sach" class="form-control select2-no-search">
                                            <option value="" selected>-- Chọn tủ sách --</option>
                                            @foreach ($khu_vuc as $khu_vuc_item)
                                            <optgroup label="{{ $khu_vuc_item->ten }} gồm các tủ" data-khu-vuc="{{ $khu_vuc_item->id }}" class="tuSachOptgroup">
                                                @foreach ($tu_sach as $tu_sach_item)
                                                @if ($tu_sach_item->khu_vuc_id == $khu_vuc_item->id)
                                                <option value="{{ $tu_sach_item->id }}">
                                                    {{ $tu_sach_item->ten }}
                                                </option>
                                                @endif
                                                @endforeach
                                            </optgroup>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">&nbsp;&nbsp;Nội dung tóm tắt</label>
                                <textarea required rows="10" class="form-control" name="tom_tat" placeholder="Nhập tóm tắt nội dung sách" ></textarea>
                            </div>

                            <div style="display: flex; justify-content: end; margin-top: 5%">
                                <a href="" class="btn btn-danger rounded" style="margin-right: 2%">Làm mới</a>
                                <!-- <a href="" class="btn btn-success rounded">Thêm</a> -->
                                <button class="btn btn-success rounded" type="submit">
                                    Thêm
                                </button>
                            </div>
                        </form>
                    </div>

                    <div style="flex-basis: 30%; padding: 2%; height: auto" class="shadow border rounded">
                        <select id="option-select" class="form-control select2-no-search">
                            <option value="author-form">Tác giả</option>
                            <option value="publisher-form">Nhà xuất bản</option>
                            <option value="category-form">Thể loại</option>
                            <option value="area-form">Khu vực</option>
                            <option value="bookshelf-form">Tủ sách</option>
                        </select>
                        <div id="author-form" class="form active">
                            <div class="mt-1 mb-1">
                                @foreach ($tac_gia as $key => $item)
                                <div class="d-flex {{ $key != count($tac_gia) - 1 ? 'border-bottom' : '' }} p-2 justify-content-between">
                                    <div>{{ $key + 1 }}. {{ $item->ten }}</div>
                                    <div>
                                        <a href="#" class="btn-open-modal" data-toggle="modal" data-target="#{{ $key + 1 }}_{{ $item->ten }}">
                                            <i class="fa-solid fa-pen-to-square text-secondary"></i></a>
                                        <!-- modal -->

                                        <div class="modal fade" id="{{ $key + 1 }}_{{ $item->ten }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Sửa tác giả</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('sua-tac-gia', ['id' => $item->id]) }}" method="POST">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Tên tác giả</label>
                                                                <input disabled value="{{ $item->ten }}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="text" placeholder="" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Bạn muốn sửa tên
                                                                    tác giả thành</label>
                                                                <input name="tac_gia" type="text" class="form-control" id="exampleInputPassword1" placeholder="Tên tác giả mới" />
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary rounded" data-dismiss="modal">
                                                                    Đóng
                                                                </button>
                                                                <button type="submit" class="btn btn-primary rounded">
                                                                    Lưu thay đổi
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- end modal -->
                                        &nbsp;
                                        <a href="{{ route('xoa-tac-gia', ['id' => $item->id]) }}" class="delete-link">
                                            <i class="fa-solid fa-xmark text-danger"></i>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <form action="{{ route('them-tac-gia') }}" method="post">
                                @csrf
                                <div class="input-group mb-3">
                                    <input required name="tacgia" type="text" class="form-control" style="margin-right: 5%" placeholder="Thêm tác giả" aria-label="Recipient's username" aria-describedby="button-addon2" />
                                    <button class="btn btn-success rounded" type="submit" style="color: white" id="button-addon2">
                                        Thêm
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div id="publisher-form" class="form">
                            <div class="mt-1 mb-1">
                                @foreach ($nha_xuat_ban as $key => $item)
                                <div class="d-flex {{ $key != count($nha_xuat_ban) - 1 ? 'border-bottom' : '' }} p-2 justify-content-between">
                                    <div>{{ $key + 1 }}. {{ $item->ten }}</div>
                                    <div>
                                        <a href="#" class="btn-open-modal" data-toggle="modal" data-target="#{{ $key + 1 }}_{{ $item->ten }}">
                                            <i class="fa-solid fa-pen-to-square text-secondary"></i></a>
                                        <!-- modal -->

                                        <div class="modal fade" id="{{ $key + 1 }}_{{ $item->ten }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Sửa tên nhà xuất bản</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('sua-nha-xuat-ban', ['id' => $item->id]) }}" method="POST">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Tên nhà xuất
                                                                    bản</label>
                                                                <input disabled value="{{ $item->ten }}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="text" placeholder="" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Bạn muốn sửa tên
                                                                    nhà xuất bản thành</label>
                                                                <input name="nha_xuat_ban" type="text" class="form-control" id="exampleInputPassword1" placeholder="Tên nhà xuát bản mới" />
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary rounded" data-dismiss="modal">
                                                                    Đóng
                                                                </button>
                                                                <button type="submit" class="btn btn-primary rounded">
                                                                    Lưu thay đổi
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        &nbsp;
                                        <a href="{{ route('xoa-nha-xuat-ban', ['id' => $item->id]) }}" class="delete-link"><i class="fa-solid fa-xmark text-danger"></i></a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <form action="{{ route('them-nha-xuat-ban') }}" method="post">
                                @csrf
                                <div class="input-group mb-3">
                                    <input required name="nhaxuatban" type="text" class="form-control" style="margin-right: 5%" placeholder="Thêm nhà xuất bản" aria-label="Recipient's username" aria-describedby="button-addon2" />
                                    <button class="btn btn-success rounded" type="submit" style="color: white" id="button-addon2">
                                        Thêm
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div id="category-form" class="form">
                            <div class="mt-1 mb-1">
                                @foreach ($the_loai as $key => $item)
                                <div class="d-flex {{ $key != count($the_loai) - 1 ? 'border-bottom' : '' }} p-2 justify-content-between">
                                    <div>{{ $key + 1 }}. {{ $item->ten }}</div>
                                    <div>
                                        <a href="#" class="btn-open-modal" data-toggle="modal" data-target="#{{ $key + 1 }}_{{ $item->ten }}">
                                            <i class="fa-solid fa-pen-to-square text-secondary"></i></a>
                                        <!-- modal -->

                                        <div class="modal fade" id="{{ $key + 1 }}_{{ $item->ten }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Sửa tên thể loại</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('sua-the-loai', ['id' => $item->id]) }}" method="POST">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Tên thể
                                                                    loại</label>
                                                                <input disabled value="{{ $item->ten }}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="text" placeholder="" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Bạn muốn sửa tên
                                                                    thể loại thành</label>
                                                                <input name="the_loai" type="text" class="form-control" id="exampleInputPassword1" placeholder="Tên thể loại mới" />
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary rounded" data-dismiss="modal">
                                                                    Đóng
                                                                </button>
                                                                <button type="submit" class="btn btn-primary rounded">
                                                                    Lưu thay đổi
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        &nbsp;
                                        <a href="{{ route('xoa-the-loai', ['id' => $item->id]) }}" class="delete-link"><i class="fa-solid fa-xmark text-danger"></i></a>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <form action="{{ route('them-the-loai') }}" method="post">
                                @csrf
                                <div class="input-group mb-3">
                                    <input required name="theloai" type="text" class="form-control" style="margin-right: 5%" placeholder="Thêm thể loại" aria-label="Recipient's username" aria-describedby="button-addon2" />
                                    <button class="btn btn-success rounded" type="submit" style="color: white" id="button-addon2">
                                        Thêm
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div id="area-form" class="form">
                            <div class="mt-1 mb-1">
                                @foreach ($khu_vuc as $key => $item)
                                <div class="d-flex {{ $key != count($khu_vuc) - 1 ? 'border-bottom' : '' }} p-2 justify-content-between">
                                    <div>{{ $key + 1 }}. {{ $item->ten }}</div>
                                    <div>
                                        <a href="#" class="btn-open-modal" data-toggle="modal" data-target="#{{ $key + 1 }}_{{ $item->ten }}">
                                            <i class="fa-solid fa-pen-to-square text-secondary"></i></a>
                                        <!-- modal -->

                                        <div class="modal fade" id="{{ $key + 1 }}_{{ $item->ten }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Sửa tên khu vực</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('sua-khu-vuc', ['id' => $item->id]) }}" method="POST">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Tên khu vực</label>
                                                                <input disabled value="{{ $item->ten }}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="text" placeholder="" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Bạn muốn sửa tên
                                                                    khu vực thành</label>
                                                                <input name="khu_vuc" type="text" class="form-control" id="exampleInputPassword1" placeholder="Tên khu vực mới" />
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary rounded" data-dismiss="modal">
                                                                    Đóng
                                                                </button>
                                                                <button type="submit" class="btn btn-primary rounded">
                                                                    Lưu thay đổi
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        &nbsp;
                                        <a href="{{ route('xoa-khu-vuc', ['id' => $item->id]) }}" class="delete-link"><i class="fa-solid fa-xmark text-danger"></i></a>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <form action="{{ route('them-khu-vuc') }}" method="post">
                                @csrf
                                <div class="input-group mb-3">
                                    <input required name="khuvuc" type="text" class="form-control" style="margin-right: 5%" placeholder="Thêm khu vực" aria-label="Recipient's username" aria-describedby="button-addon2" />
                                    <button class="btn btn-success rounded" type="submit" style="color: white" id="button-addon2">
                                        Thêm
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div id="bookshelf-form" class="form">
                            <!-- <div class="mt-1 mb-1">
                                    <div id="tu-sach-list"></div>
                                </div> -->
                            <!-- <form id="them-tu-sach-form" action="{{ route('them-tu-sach') }}" method="post">
                                @csrf -->
                            <div id="tusach-container">
                                @foreach($khu_vuc as $khu_vuc_item)
                                <div class="tusach-group" data-khu-vuc="{{$khu_vuc_item->id}}">
                                    @foreach($tu_sach as $tu_sach_item)
                                    @if($tu_sach_item->khu_vuc_id == $khu_vuc_item->id)
                                    <div data-tusach-id="{{$tu_sach_item->id}}" class="tusach-item d-flex {{ $loop->last ? '' : 'border-bottom' }} p-2 justify-content-between">
                                        <div>{{$tu_sach_item->ten}}</div>
                                        <div>
                                            <a href="#" class="btn-open-modal" data-toggle="modal" data-target="#{{ $key + 1 }}_{{ $tu_sach_item->ten }}">
                                                <i class="fa-solid fa-pen-to-square text-secondary"></i></a>
                                            <!-- modal -->

                                            <div class="modal fade" id="{{ $key + 1 }}_{{ $tu_sach_item->ten }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Sửa tên tủ sách</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('sua-tu-sach',['id'=>$tu_sach_item->id])}}" method="POST">
                                                                @csrf
                                                                <div style="display: flex;" class="form-group">
                                                                    <div style="flex-basis: 48%;margin-right: 2%;">
                                                                        <label for="exampleInputEmail1">Tên tủ sách</label>
                                                                        <input disabled value="{{$tu_sach_item->ten}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="text" placeholder="">
                                                                    </div>
                                                                    <div style="flex-basis: 50%;">
                                                                        <label for="exampleInputEmail1">Tên khu vực</label>
                                                                        <input disabled value="{{$khu_vuc_item->ten}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="text" placeholder="">
                                                                    </div>
                                                                </div>
                                                                <label for="khuVucSelect">Bạn muốn đổi thành khu vực</label>
                                                                <select name="khu_vuc_id" id="khuVucSelect" class="form-control select2-no-search">
                                                                    @foreach($khu_vuc as $item)
                                                                    <option value="{{$item->id}}">{{$item->ten}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <div class="form-group">
                                                                    <label style="margin: 5% 0 1% 0;" for="exampleInputPassword1">Bạn muốn sửa tên tủ sách thành</label>
                                                                    <input value="{{$tu_sach_item->ten}}" name="tu_sach" type="text" class="form-control" id="exampleInputPassword1" placeholder="Tên tủ sách mới">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary rounded" data-dismiss="modal">Đóng</button>
                                                                    <button type="submit" class="btn btn-primary rounded">Lưu thay đổi</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- xoa -->
                                            &nbsp;
                                            <a href="{{ route('xoa-khu-vuc', ['id' => $item->id]) }}" class="delete-link"><i class="fa-solid fa-xmark text-danger"></i></a>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                                @endforeach
                            </div>
                            <form id="them-tu-sach-form" action="{{ route('them-tu-sach') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label style="margin-top: 2%;">&nbsp;&nbsp;Chọn khu vực</label>
                                    <select id="khuVucSelect1" name="khu_vuc_id" style="width: 100%;" class="form-control select2-no-search">
                                        @foreach($khu_vuc as $item)
                                        <option value="{{$item->id}}">{{$item->ten}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <input required name="tu_sach" type="text" class="form-control" style="margin-right: 5%;" placeholder="Thêm tủ sách" aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-success rounded" type="submit" style="color:white" id="them-tu-sach-button">Thêm</button>
                                </div>
                            </form>
                        </div>
                        <style>
                            input[type="number"]::-webkit-inner-spin-button,
                            input[type="number"]::-webkit-outer-spin-button {
                                -webkit-appearance: none;
                                margin: 0;
                            }

                            .form {
                                display: none;
                            }

                            .form.active {
                                display: block;
                            }

                            .form label {
                                display: block;
                                margin-bottom: 5px;
                                font-weight: bold;
                            }

                            .form select,
                            /* .form input[type="text"] {
                                  width: 100%;
                                  padding: 5px;
                                  border: 1px solid #ccc;
                                  border-radius: 4px;
                              } */

                            .form select {
                                height: 32px;
                            }

                            .form-select {
                                margin-bottom: 10px;
                            }
                        </style>
                    </div>
                </div>
            </div>
            <!-- az-content-body -->
        </div>
        <!-- container -->
    </div>
    <!-- az-content -->

    <div class="az-footer ht-40">
        <div class="container ht-100p pd-t-0-f">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com
                2020</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
                Free
                <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin
                    templates</a>
                from Bootstrapdash.com</span>
        </div>
        <!-- container -->
    </div>
    <!-- az-footer -->
    <style>
        .upload-container {
            position: relative;
            width: 195px;
            height: 316px;
            border: 1px border #ccc;
            display: flex;
            justify-content: center;
            align-items: center;
            /* cursor: pointer; */
        }

        .upload-label {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .preview-container {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            display: none;
        }

        .preview-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
    <script>
        const uploadFile = document.getElementById("upload-file");
        const previewContainer = document.getElementById("preview-container");

        let selectedFile = null;

        uploadFile.addEventListener("change", (event) => {
            selectedFile = event.target.files[0];
            const reader = new FileReader();
            reader.onload = () => {
                const image = new Image();
                image.src = reader.result;
                image.onload = () => {
                    previewContainer.innerHTML = "";
                    previewContainer.appendChild(image);
                    previewContainer.style.display = "block";
                    uploadFile.style.display = "none";
                    document.querySelector(".upload-label").style.display = "none";
                };
            };
            reader.readAsDataURL(selectedFile);
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#khuVucSelect")
                .val($("#khuVucSelect option:first").val())
                .trigger("change");
            $("#khuVucSelect").change(function() {
                var selectedVal = $(this).val();
                $(".tuSachOptgroup").hide();
                $('.tuSachOptgroup[data-khu-vuc="' + selectedVal + '"]').show();
                $("#tuSachSelect").val("");
                // $('.result').html('');
            });
            $(".tuSachOptgroup").hide();

            // lấy giá trị của khuVucSelect và cập nhật tuSachSelect tương ứng
            var selectedVal = $("#khuVucSelect").val();
            $(".tuSachOptgroup").hide();
            $('.tuSachOptgroup[data-khu-vuc="' + selectedVal + '"]').show();
            $("#tuSachSelect").val("");
            // $('.result').html('');
        });

        $(document).ready(function() {
            $(".tusach-group").hide();
            $("#khuVucSelect1").change(function() {
                var selectedVal = $(this).val();
                $(".tusach-group").hide();
                $('.tusach-group[data-khu-vuc="' + selectedVal + '"]').show();
                // $('.result').html('');
            });
        });
        $(document).ready(function() {
            $(".tusach-group").hide();
            $("#khuVucSelect1")
                .change(function() {
                    var selectedVal = $(this).val();
                    $(".tusach-group").hide();
                    $('.tusach-group[data-khu-vuc="' + selectedVal + '"]').show();
                    // $('.result').html('');
                })
                .change(); // Gọi hàm change() ở đây để khởi tạo giá trị ban đầu
        });
    </script>

    <script src="/lib/jquery/jquery.min.js"></script>
    <script>
        const deleteLinks = document.querySelectorAll(".delete-link");
        deleteLinks.forEach((link) => {
            link.addEventListener("click", (event) => {
                event.preventDefault();
                Swal.fire({
                    title: "Bạn có muốn xóa không?",
                    imageUrl: "/img/war.png",
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
        // Lắng nghe sự kiện 'change' trên phần tử select
        document
            .getElementById("option-select")
            .addEventListener("change", function() {
                // Lấy giá trị của tùy chọn đã chọn
                var selectedOption = this.value;
                // Tìm form tương ứng theo giá trị tùy chọn đã chọn
                var selectedForm = document.getElementById(selectedOption);
                // Thêm lớp 'active' vào form đã chọn
                selectedForm.classList.add("active");
                // Xóa lớp 'active' của các form khác
                var forms = document.querySelectorAll(".form");
                forms.forEach(function(form) {
                    if (form !== selectedForm) {
                        form.classList.remove("active");
                    }
                });
            });
        //
        $(document).on("click", ".delete-link", function(event) {
            event.preventDefault();
            var link = this;

            Swal.fire({
                title: "Bạn có muốn xóa không?",
                imageUrl: "/img/war.png",
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
        //
    </script>
    <script src="/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/lib/ionicons/ionicons.js"></script>
    <script src="/lib/chart.js/Chart.bundle.min.js"></script>

    <script src="/js/azia.js"></script>
    <script src="/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="/js/validate.js"></script>
</body>


</html>