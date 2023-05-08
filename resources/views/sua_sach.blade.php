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

    <title>libro - Sách</title>

    <!-- vendor css -->
    <link href="../lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../lib/typicons.font/typicons.css" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="../css/azia.css">

</head>

<body>

    @include('header', ['view' => 2])

    <div class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40">
        <div class="container">
            <div class="az-content-left az-content-left-components">
                <div class="component-item">
                    @foreach ($sach as $item)
                    <label>{{ $item->fkSach->ten }}</label>
                    @endforeach
                    <nav class="nav flex-column">
                        <a href="#" class="nav-link ">Chi tiết</a>
                        <a href="#" class="nav-link">Mượn sách</a>
                        <a href="#" class="nav-link active">Sửa sách</a>
                    </nav>
                </div><!-- component-item -->
            </div><!-- az-content-left -->

            <div class="az-content-body pd-lg-l-40 d-flex flex-column">
                <!-- đây mục trỏ-->
                <div class="az-content-breadcrumb">
                    @foreach ($sach as $item)
                    <span>{{ $item->fkSach->ten }}</span>
                    @endforeach
                    <span>Sửa sách</span>
                </div>
                <div class="border shadow-sm rounded p-4 pr-5">
                    <form action="" id="form_them_sach" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div style="display: flex;flex-direction: row-reverse;">
                            <!-- form -->
                            <div style="flex-basis: 70%">
                                <div class="form-group">
                                    <label>&nbsp;&nbsp;Tên sách</label>
                                    <input required type="text" name="ten_sach" id="ten_sach" class="form-control" placeholder="Nhập tên sách" value="{{ $item->fkSach->ten }}" tabindex="1" autofocus=true>
                                </div>
                                <!-- form-group -->

                                <div class="form-group">
                                    <label>&nbsp;&nbsp;Tác giả</label>
                                    <select required id="form-select" name="tac_gia" class="form-control select2-no-search" tabindex="2">
                                        @foreach ($sach as $item)
                                        <option selected value="{{$item->fkSach->tac_gia_id}}">{{ $item->fkSach->fkTacGia->ten }}</option>
                                        @endforeach
                                        @foreach ($tac_gia as $item)
                                        <option value="{{ $item->id }}">{{ $item->ten }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>&nbsp;&nbsp;Thể loại</label>
                                    <select required id="form-select" name="the_loai" class="form-control select2-no-search" tabindex="3">
                                        @foreach ($sach as $item)
                                        <option selected value="{{ $item->fkSach->fkTheLoai->the_loai_id }}">{{ $item->fkSach->fkTheLoai->ten }}</option>
                                        @endforeach
                                        @foreach ($the_loai as $item)
                                        <option value="{{ $item->id }}">{{ $item->ten }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>&nbsp;&nbsp;Nhà xuất bản</label>
                                    <select required id="form-select" name="nha_xuat_ban" class="form-control select2-no-search" tabindex="4">
                                        @foreach ($sach as $item)
                                        <option value="{{ $item->fkSach->fkNhaXuatBan->nha_xuat_ban_id }}">{{ $item->fkSach->fkNhaXuatBan->ten }}</option>
                                        @endforeach
                                        @foreach ($nha_xuat_ban as $item)
                                        <option value="{{ $item->id }}">{{ $item->ten }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>&nbsp;&nbsp;Năm xuất bản</label>
                                    @foreach ($sach as $item)
                                    <input required type="number" min="1800" max="2024" name="nam_xuat_ban" class="form-control" placeholder="Nhập năm xuất bản" value="{{ $item->fkSach->nam_xuat_ban }}" tabindex="5" />

                                    @endforeach
                                </div>
                                <!-- form-group -->

                                <div class="form-group">
                                    <label>&nbsp;&nbsp;Tủ sách</label>
                                    <select required id="tuSachSelect" name="tu_sach" class="form-control select2-no-search" tabindex="6">
                                        <option disabled value="{{ $item->fkTusach->fkKhuVuc->khu_vuc_id }}" selected>{{ $item->fkTuSach->ten }}</option>
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
                            <!-- up ảnh -->
                            <div class="upload-container row" style="flex-basis: 30%; margin-right: 2%">
                                <div class="upload-container border rounded" style="object-fit:fill;background-image: url('../img/books/{{ $item->fkSach->hinh_anh }}');">
                                    <!-- <label for="upload-file" class="upload-label" style="font-size: 130%">Tải ảnh
                                        lên</label> -->
                                    <input style="font-size: 120px; opacity: 0" type="file" id="upload-file" name="file_upload" accept="image/*" onchange="chooseFile(this)" tabindex="10" required />
                                    <div id="preview-container" style="object-fit: cover;" class="preview-container">
                                    </div>
                                </div>
                                <!-- số lượng -->
                                <div style="margin-top: 6%" class="form-group">
                                    <label>&nbsp;&nbsp;Số lượng</label>
                                    <input required type="number" min="1" name="so_luong" id="so_luong" class="form-control" placeholder="Số lượng" value="{{ $item->so_luong }}" tabindex="7" />
                                </div>
                                <!-- khu vực -->
                                <div class="form-group">
                                    <label>&nbsp;&nbsp;Khu vực</label>
                                    <select style="width: 190px;" required id="khuVucSelect" name="khu_vuc" class="form-control select2-no-search" tabindex="8">
                                        <option value="{{ $item->fkTusach->fkKhuVuc->khu_vuc_id }}">{{ $item->fkTusach->fkKhuVuc->ten }}</option>
                                        @foreach ($khu_vuc as $item)
                                        <option value="{{ $item->id }}">{{ $item->ten }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">&nbsp;&nbsp;Nội dung tóm tắt</label>
                            @foreach ($sach as $item)
                            <textarea required rows="10" class="form-control" name="tom_tat" placeholder="Nhập tóm tắt nội dung sách" tabindex="9">{{ $item->fkSach->tom_tat }}</textarea>
                            @endforeach
                        </div>

                        <div style="display: flex; justify-content: end; margin-top: 5%">
                            <a href="" class="btn btn-danger rounded" style="margin-right: 2%">Hủy</a>
                            <!-- <a href="" class="btn btn-success rounded">Thêm</a> -->
                            <button class="btn btn-success rounded" type="submit">
                                Sửa
                            </button>
                        </div>
                    </form>
                </div><!-- az-card-signin -->

                <div class="ht-40"></div>
                <div class="az-footer ht-40">
                    <div class="container ht-100p pd-t-0-f">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                            bootstrapdash.com
                            2020</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap
                                admin
                                templates</a> from Bootstrapdash.com</span>
                    </div><!-- container -->
                </div><!-- az-footer -->
            </div><!-- az-content-body -->
        </div><!-- container -->
    </div><!-- az-content -->
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
    <script src="../lib/jquery/jquery.min.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/ionicons/ionicons.js"></script>
    <script src="../lib/chart.js/Chart.bundle.min.js"></script>

    <script src="../js/azia.js"></script>
    <!-- <script src="../js/chart.chartjs.js"></script> -->
    <script src="../js/jquery.cookie.js" type="text/javascript"></script>
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
    <script>
        function chooseFile(fileinput) {
            const previewContainer = document.getElementById("preview-container");

            if (fileinput.files && fileinput.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const image = new Image();
                    image.src = e.target.result;
                    image.onload = function() {
                        previewContainer.innerHTML = "";
                        previewContainer.appendChild(image);
                        previewContainer.style.display = "block";
                    };
                }
                reader.readAsDataURL(fileinput.files[0]);
            } else {
                previewContainer.innerHTML = "";
                previewContainer.style.display = "none";
            }
            previewContainer.addEventListener("click", function(event) {
                if (event.target.closest("#preview-container")) {
                    const uploadFile = document.getElementById("upload-file");
                    uploadFile.click();
                }
            });
        }
    </script>
</body>

</html>