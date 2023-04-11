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
    <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Sau đó, bạn có thể khởi tạo trình soạn thảo bằng cách sử dụng mã JavaScript -->
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
                language: 'vi'
            })
            .catch(error => {
                console.error(error);
            });
    </script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<!-- Meta -->
<meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
<meta name="author" content="BootstrapDash">

<title>Azia Responsive Bootstrap 4 Dashboard Template</title>

<!-- vendor css -->
<link href="/lib/fontawesome-free/css/all.min.css" rel="stylesheet">
<link href="/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
<link href="/lib/typicons.font/typicons.css" rel="stylesheet">

<!-- azia CSS -->
<link rel="stylesheet" href="/css/azia.css">

</head>

<body>
    <div class="az-header">
        <div class="container">
            <div class="az-header-left">
                <a href="index.html" class="az-logo"><span></span> azia</a>
                <a href="" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
            </div><!-- az-header-left -->
            <div class="az-header-menu">
                <div class="az-header-menu-header">
                    <a href="index.html" class="az-logo"><span></span> azia</a>
                    <a href="" class="close">&times;</a>
                </div><!-- az-header-menu-header -->
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
                            </div><!-- container -->
                        </div>
                    </li>
                </ul>
            </div><!-- az-header-menu -->
            <div class="az-header-right">
                <a href="https://www.bootstrapdash.com/demo/azia-free/docs/documentation.html" target="_blank"
                    class="az-header-search-link"><i class="far fa-file-alt"></i></a>
                <a href="" class="az-header-search-link"><i class="fas fa-search"></i></a>
                <div class="az-header-message">
                    <a href="#"><i class="typcn typcn-messages"></i></a>
                </div><!-- az-header-message -->
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
                                <div class="az-img-user"><img src="/img/faces/face2.jpg" alt=""></div>
                                <div class="media-body">
                                    <p>Congratulate <strong>Socrates Itumay</strong> for work anniversaries</p>
                                    <span>Mar 15 12:32pm</span>
                                </div><!-- media-body -->
                            </div><!-- media -->
                            <div class="media new">
                                <div class="az-img-user online"><img src="/img/faces/face3.jpg" alt=""></div>
                                <div class="media-body">
                                    <p><strong>Joyce Chua</strong> just created a new blog post</p>
                                    <span>Mar 13 04:16am</span>
                                </div><!-- media-body -->
                            </div><!-- media -->
                            <div class="media">
                                <div class="az-img-user"><img src="/img/faces/face4.jpg" alt=""></div>
                                <div class="media-body">
                                    <p><strong>Althea Cabardo</strong> just created a new blog post</p>
                                    <span>Mar 13 02:56am</span>
                                </div><!-- media-body -->
                            </div><!-- media -->
                            <div class="media">
                                <div class="az-img-user"><img src="/img/faces/face5.jpg" alt=""></div>
                                <div class="media-body">
                                    <p><strong>Adrian Monino</strong> added new comment on your photo</p>
                                    <span>Mar 12 10:40pm</span>
                                </div><!-- media-body -->
                            </div><!-- media -->
                        </div><!-- az-notification-list -->
                        <div class="dropdown-footer"><a href="">View All Notifications</a></div>
                    </div><!-- dropdown-menu -->
                </div><!-- az-header-notification -->
                <div class="dropdown az-profile-menu">
                    <a href="" class="az-img-user"><img src="/img/faces/face1.jpg" alt=""></a>
                    <div class="dropdown-menu">
                        <div class="az-dropdown-header d-sm-none">
                            <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                        </div>
                        <div class="az-header-profile">
                            <div class="az-img-user">
                                <img src="/img/faces/face1.jpg" alt="">
                            </div><!-- az-img-user -->
                            <h6>Aziana Pechon</h6>
                            <span>Premium Member</span>
                        </div><!-- az-header-profile -->

                        <a href="" class="dropdownitem"><i class="typcn typcn-user-outline"></i> My
                            Profile</a>
                        <a href="" class="dropdownitem"><i class="typcn typcn-edit"></i> Edit Profile</a>
                        <a href="" class="dropdownitem"><i class="typcn typcn-time"></i> Activity Logs</a>
                        <a href="" class="dropdownitem"><i class="typcn typcn-cog-outline"></i> Account
                            Settings</a>
                        <a href="page-signin.html" class="dropdownitem"><i class="typcn typcn-power-outline"></i>
                            Sign Out</a>
                    </div><!-- dropdown-menu -->
                </div>
            </div><!-- az-header-right -->
        </div><!-- container -->
    </div><!-- az-header -->

    <div class="az-content pd-y-20 pd-lg-y-30 shadow-sm">
        <div class="container">
            <div class="az-content-body d-flex flex-column">
                <div style="display: flex;">
                    <div style="flex-basis: 70%;margin-right: 2%;padding: 2%;" class="shadow border rounded">
                        <form>
                            <div style="display: flex;">
                                <div class="upload-container" style="flex-basis: 30%;margin-right: 2%;">
                                    <div class="upload-container border rounded">
                                        <label for="upload-file" class="upload-label" style="font-size: 130%;">Tải
                                            ảnh lên</label>
                                        <input style="font-size: 120px;opacity: 0;" type="file" id="upload-file"
                                            accept="image/*">
                                        <div id="preview-container" class="preview-container"></div>
                                    </div>
                                    <style>
                                        .upload-container {
                                            position: relative;
                                            width: 200px;
                                            height: 200px;
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
                                        const uploadFile = document.getElementById('upload-file');
                                        const previewContainer = document.getElementById('preview-container');

                                        let selectedFile = null;

                                        uploadFile.addEventListener('change', (event) => {
                                            selectedFile = event.target.files[0];
                                            const reader = new FileReader();
                                            reader.onload = () => {
                                                const image = new Image();
                                                image.src = reader.result;
                                                image.onload = () => {
                                                    previewContainer.innerHTML = '';
                                                    previewContainer.appendChild(image);
                                                    previewContainer.style.display = 'block';
                                                    uploadFile.style.display = 'none';
                                                    document.querySelector('.upload-label').style.display = 'none';
                                                };
                                            };
                                            reader.readAsDataURL(selectedFile);
                                        });

                                        previewContainer.addEventListener('click', () => {
                                            if (selectedFile) {
                                                selectedFile = null;
                                                previewContainer.style.display = 'none';
                                                uploadFile.style.display = 'block';
                                                document.querySelector('.upload-label').style.display = 'block';
                                                uploadFile.value = '';
                                            }
                                        });
                                    </script>


                                </div>
                                <div style="flex-basis: 70%;">
                                    <div class="form-group">
                                        <label>&nbsp;&nbsp;Tên sách</label>
                                        <input type="text" name="ten_sach" class="form-control"
                                            placeholder="Nhập tên sách" value="">
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label>&nbsp;&nbsp;Tác giả</label>
                                        <select id="form-select" class="form-control select2-no-search">
                                            @foreach ($tac_gia as $item)
                                                <option selected value="1">{{ $item->ten }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>&nbsp;&nbsp;Thể loại</label>
                                        <select id="form-select" class="form-control select2-no-search">
                                            @foreach ($the_loai as $item)
                                                <option value="2">{{ $item->ten }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label>&nbsp;&nbsp;Nhà xuất bản</label>
                                        <select id="form-select" class="form-control select2-no-search">
                                            @foreach ($nha_xuat_ban as $item)
                                                <option value="2">{{ $item->ten }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>&nbsp;&nbsp;Năm xuất bản</label>
                                        <input type="number" name="ten_sach" class="form-control"
                                            placeholder="Nhập tên sách" value="">
                                    </div><!-- form-group -->
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">&nbsp;&nbsp;Nội dung tóm tắt</label>
                                <textarea rows="10" class="form-control" placeholder="Nhập tóm tắt nội dung sách"></textarea>
                            </div>

                            <div style="display: flex;justify-content: end;margin-top: 5%;">
                                <a href="" class="btn btn-danger rounded" style="margin-right: 2%;">Làm
                                    mới</a>
                                <a href="" class="btn btn-success rounded">Thêm</a>
                            </div>
                        </form>
                    </div>

                    <div style="flex-basis: 30%;padding: 2%;" class="shadow border rounded">
                        <select class="form-control select2-no-search">
                            <option value="author-form">Tác giả</option>
                            <option value="publisher-form">Nhà xuất bản</option>
                            <option value="category-form">Thể loại</option>
                            <option value="area-form">Khu vực</option>
                            {{-- <option value="bookshelf-form">Tủ sách</option> --}}
                        </select>

                        <div id="author-form" class="form active">
                            <div class="mt-1 mb-1">
                                @foreach ($tac_gia as $key => $item)
                                    <div
                                        class="d-flex {{ $key != count($tac_gia) - 1 ? 'border-bottom' : '' }} p-2 justify-content-between">
                                        <div>{{ $key + 1 }}. {{ $item->ten }}</div>
                                        <div>
                                            <a href=""><i
                                                    class="fa-solid fa-pen-to-square text-secondary"></i></a>
                                            &nbsp;
                                            <a href="{{ route('xoa-tac-gia', ['id' => $item->id]) }}"><i
                                                    class="fa-solid fa-xmark text-danger"></i></a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <form action="{{ route('them-tac-gia') }}" method="post">
                                @csrf
                                <div class="input-group mb-3">
                                    <input name="ten" type="text" class="form-control"
                                        style="margin-right: 5%;" placeholder="Thêm tác giả"
                                        aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-success" type="submit" style="color:white"
                                        id="button-addon2">Thêm</button>
                                </div>
                            </form>
                        </div>

                        <div id="publisher-form" class="form">
                            <div style="padding: 2%;">
                                <div style="margin-top: 5%;">
                                    @foreach ($nha_xuat_ban as $key => $item)
                                        <div
                                            class="d-flex {{ $key != count($tac_gia) - 1 ? 'border-bottom' : '' }} justify-content-between">
                                            <p>{{ $key + 1 }}. {{ $item->ten }}</p>
                                            <div>
                                                <a href=""><i
                                                        class="fa-solid fa-pen-to-square text-secondary"></i></a>
                                                &nbsp;
                                                <a href="{{ route('xoa-nha-xuat-ban', ['id' => $item->id]) }}"><i
                                                        class="fa-solid fa-xmark text-danger"></i></a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <form action="{{ route('them-nha-xuat-ban') }}" method="post">
                                @csrf
                                <div class="input-group mb-3">
                                    <input name="nhaxuatban" type="text" class="form-control"
                                        style="margin-right: 5%;" placeholder="Thêm nhà xuất bản"
                                        aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-success" type="submit" style="color:white"
                                        id="button-addon2">Thêm</button>
                                </div>
                            </form>
                        </div>

                        <div id="category-form" class="form">
                            <div style="padding: 2%;">
                                <div style="margin-top: 5%;">
                                    @foreach ($the_loai as $key => $item)
                                        <div
                                            class="d-flex {{ $key != count($tac_gia) - 1 ? 'border-bottom' : '' }} justify-content-between">
                                            <p>{{ $key + 1 }}. {{ $item->ten }}</p>
                                            <div>
                                                <a href=""><i
                                                        class="fa-solid fa-pen-to-square text-secondary"></i></a>
                                                &nbsp;
                                                <a href="{{ route('xoa-the-loai', ['id' => $item->id]) }}"><i
                                                        class="fa-solid fa-xmark text-danger"></i></a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <form action="{{ route('them-the-loai') }}" method="post">
                                @csrf
                                <div class="input-group mb-3">
                                    <input name="theloai" type="text" class="form-control"
                                        style="margin-right: 5%;" placeholder="Thêm thể loại"
                                        aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-success" type="submit" style="color:white"
                                        id="button-addon2">Thêm</button>
                                </div>
                            </form>
                        </div>

                        <div id="area-form" class="form">
                            <div style="padding: 2%;">
                                <div style="margin-top: 5%;">
                                    @foreach ($khu_vuc as $key => $item)
                                        <div
                                            class="d-flex {{ $key != count($tac_gia) - 1 ? 'border-bottom' : '' }} justify-content-between">
                                            <p>{{ $key + 1 }}. {{ $item->ten }}</p>
                                            <div>
                                                <a href=""><i
                                                        class="fa-solid fa-pen-to-square text-secondary"></i></a>
                                                &nbsp;
                                                <a href="{{ route('xoa-khu-vuc', ['id' => $item->id]) }}"><i
                                                        class="fa-solid fa-xmark text-danger"></i></a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <form action="{{ route('them-khu-vuc') }}" method="post">
                                @csrf
                                <div class="input-group mb-3">
                                    <input name="khuvuc" type="text" class="form-control"
                                        style="margin-right: 5%;" placeholder="Thêm khu vực"
                                        aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-success" type="submit" style="color:white"
                                        id="button-addon2">Thêm</button>
                                </div>
                            </form>
                        </div>

                        {{-- <div id="bookshelf-form" class="form" action="">
                            <div style="padding: 2%;">
                                <div class="form-check" style="display: flex;margin-top: 5%;">
                                    <div style="flex-basis: 70%;">
                                        <input name="tusach" style="padding: 2%;" class="form-check-input"
                                            type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Tủ sách
                                        </label>
                                    </div>
                                    <div style="flex-basis: 30%;padding-top: 2%;">
                                        <span><a href="#"><i style="color:red;margin-left: 75%;"
                                                    class="fa-solid fa-x"></i></a></span>
                                    </div>
                                </div>
                            </div>
                            <form action="" method="post">
                                @csrf
                                <div class="input-group mb-3">
                                    <input name="tusach" type="text" class="form-control rounded"
                                        style="margin-right: 5%;" placeholder="Thêm tủ sách"
                                        aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-success rounded" type="button" style="color:white"
                                        id="button-addon2">Thêm</button>
                                </div>
                            </form>
                        </div> --}}

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

                        <script>
                            const formSelect = document.getElementById("form-select");
                            const forms = document.querySelectorAll(".form");

                            formSelect.addEventListener("change", () => {
                                forms.forEach((form) => {
                                    form.classList.remove("active");
                                });

                                const selectedForm = document.getElementById(formSelect.value);
                                selectedForm.classList.add("active");
                            });
                        </script>
                    </div>
                </div>

            </div><!-- az-content-body -->
        </div><!-- container -->
    </div><!-- az-content -->

    <div class="az-footer ht-40">
        <div class="container ht-100p pd-t-0-f">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com
                2020</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a
                    href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin
                    templates</a> from Bootstrapdash.com</span>
        </div><!-- container -->
    </div><!-- az-footer -->

    <script src="/lib/jquery/jquery.min.js"></script>
    <script src="/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/lib/ionicons/ionicons.js"></script>
    <script src="/lib/chart.js/Chart.bundle.min.js"></script>


    <script src="/js/azia.js"></script>
    <script src="/js/jquery.cookie.js" type="text/javascript"></script>
</body>

</html>
