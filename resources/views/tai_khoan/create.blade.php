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
                timer: 1000
            });
        }, 100);
    </script>
    @endif
    @if(Session::has('error'))
    <script>
        setTimeout(function() {
            Swal.fire({
                icon: 'error',
                title: 'Thất bại',
                text: `{{ Session::get('error') }}`,
                showConfirmButton: false,
                timer: 1000
            });
        }, 100);
    </script>
    @endif
    <div style="margin-bottom: 65px;" class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40">
        <div class="container">
            <div class="az-content-left az-content-left-components">
                <div class="component-item">
                    <label>Quản trị viên</label>
                    <nav class="nav flex-column">
                        <a href="#" class="nav-link active">Cấp tài khoản</a>
                        <a href="{{ route('quan-ly-tai-khoan') }}" class="nav-link ">Quản lý tài khoản</a>
                    </nav>
                </div><!-- component-item -->
            </div><!-- az-content-left -->

            <div class="az-content-body pd-lg-l-40 d-flex flex-column">
                <div class="az-content-breadcrumb">
                    <span>Cá nhân</span>
                    <span>Cấp tài khoản</span>
                </div>
                <div class="border shadow-sm rounded p-4 pr-5">
                    <!-- import -->
                    <div id="import_doc_gia" style="display: none;">
                        <form action="{{route('import-sach')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label class="custom-file-upload">
                                <input required type="file" name="file" accept=".xlsx" onchange="showFileName(event)">
                                <span id="file-name">Chọn tệp</span>
                            </label>

                            <style>
                                .custom-file-upload {
                                    display: inline-block;
                                    padding: 6px 12px;
                                    cursor: pointer;
                                    border: 1px solid #ccc;
                                    border-radius: 4px;
                                    background-color: #f1f1f1;
                                }

                                .custom-file-upload input[type="file"] {
                                    display: none;
                                }
                            </style>
                            <script>
                                function showFileName(event) {
                                    const input = event.target;
                                    const fileName = input.files[0].name;
                                    const fileNameSpan = document.getElementById('file-name');
                                    fileNameSpan.textContent = fileName;
                                }
                            </script>
                            <button style="margin-top: 0px;" type="submit" name="import_csv" class="btn btn-success ">Tải lên</button>
                        </form>
                    </div>
                    <!-- end import -->

                    <h4 class="az-content-label mg-b-5 ml-3">Cấp tài khoản</h4>
                    <p class="mg-b-5 ml-3 ">
                        Chỉ admin mới có quyền cấp tài khoản, vui lòng không chia sẻ mật khẩu cho người khác
                    </p>
                    <hr class="hr ml-3" />
                    <form action="{{ route('xu-ly-tao-tai-khoan') }}" class="ml-3 az-signin-header" method="POST">
                        @csrf
                        <div class="row row-sm align-items-end mg-b-20">
                            <div class="wd-350 form-group m-0">
                                <div class="d-flex justify-content-between">
                                    <label class="m-0">&nbsp;Họ</label>
                                    @error('ho')
                                    <div style="font-style: italic;" class="text-danger">
                                        {{ $message }} *&nbsp;
                                    </div>
                                    @enderror
                                </div>
                                <input class="form-control" name="ho" value="{{ old('ho') }}" placeholder="Nhập họ" type="text" autocomplete="off">
                            </div><!-- col -->
                            <div class="col-lg form-group m-0">
                                <div class="d-flex justify-content-between">
                                    <label class="m-0">&nbsp;Tên</label>
                                    @error('ten')
                                    <div style="font-style: italic;" class="text-danger">
                                        {{ $message }} *&nbsp;
                                    </div>
                                    @enderror
                                </div>
                                <input class="form-control" name="ten" value="{{ old('ten') }}" placeholder="Nhập tên" type="text" autocomplete="off">
                            </div><!-- col -->
                            <div class="mb-1">
                                <label class="rdiobox">
                                    <input name="gioi_tinh" value="1" type="radio" checked>
                                    <span>Nam</span>
                                </label>
                            </div><!-- col-3 -->
                            <div class="mb-1">
                                <label class="rdiobox">
                                    <input name="gioi_tinh" value="2" type="radio" {{ old('gioi_tinh') == 2 ? 'checked' : '' }}>
                                    <span>Nữ</span>
                                </label>
                            </div><!-- col-3 -->
                        </div>

                        <div class="row row-sm">
                            <div class="wd-350">
                                <div class="d-flex justify-content-between">
                                    <label class="m-0">&nbsp;Vai trò</label>
                                    @error('vai_tro')
                                    <div style="font-style: italic;" class="text-danger">
                                        {{ $message }} *&nbsp;
                                    </div>
                                    @enderror
                                </div>
                                <select name="vai_tro" id="vai_tro" class="form-control select2-no-search">
                                    <option value="" selected></option>
                                    <option value="1" {{ old('vai_tro') == 1 ? 'selected' : '' }}>Quản trị viên</option>
                                    <option value="2" {{ old('vai_tro') == 2 ? 'selected' : '' }}>Thủ thư</option>
                                    <option value="3" {{ old('vai_tro') == 3 ? 'selected' : '' }}>Độc giả</option>
                                </select>

                                <div class="mt-3" id="show" style="display: none;">
                                    <div class="wd-320 form-group m-0">
                                        <div class="d-flex justify-content-between">
                                            <label class="m-0">&nbsp;Mã học sinh</label>
                                            @error('ma_hs')
                                            <div style="font-style: italic;" class="text-danger">
                                                {{ $message }} *&nbsp;
                                            </div>
                                            @enderror
                                        </div>
                                        <input class="form-control" name="ma_hs" id="ma_hoc_sinh" value="" placeholder="Nhập mã học sinh" type="number" autocomplete="off">
                                    </div><!-- col -->
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg form-group">
                                <div class="d-flex justify-content-between">
                                    <label class="m-0">&nbsp;Email</label>
                                    @error('email')
                                    <div style="font-style: italic;" class="text-danger">
                                        {{ $message }} *&nbsp;
                                    </div>
                                    @enderror
                                </div>
                                <input type="text" name="email" class="form-control" placeholder="Nhập email" value="{{ old('email') }}" autocomplete="off">
                                <!-- ngay sinh -->
                                <div style="display: none;" class="mt-3" id="ngaysinhantren">
                                    <label for="ngay_sinh" class="m-0">&nbsp;Ngày sinh</label>
                                    <div class="mg-b-20">
                                        <div class="input-group">
                                            <input id="for_tren" type="text" class="form-control fc-datepicker" placeholder="DD/MM/YYYY">
                                        </div>
                                    </div>
                                </div>
                            </div><!-- form-group -->
                        </div>
                        <!-- ngày sinh -->
                        <div class="mt-0" id="ngaysinhanduoi">
                            <label for="ngay_sinh" class="m-0">&nbsp;Ngày sinh</label>
                            <div class="mg-b-20">
                                <div class="input-group">
                                    <input id="for_duoi" type="text" class="form-control fc-datepicker" placeholder="DD/MM/YYYY">
                                </div>
                            </div>
                        </div>

                        @if (session('errorMail'))
                        <span class="rounded-lg p-2" style="background-color: #F2F0FE; border:#C6BCF8 1px solid; color: #402DA1;">
                            <i class="typcn typcn-info text-danger h-4" style="font-size:16px"></i>
                            <span class="text-danger">{{ session('errorMail') }}</span>
                        </span>
                        @endif
                        <div class="col-sm-6 col-md-3 p-0">
                            <button id="button" class="btn btn-primary btn-block">Tạo tài khoản mới</button>
                        </div>

                    </form>
                </div><!-- az-card-signin -->

                <div class="ht-40"></div>



            </div><!-- az-content-body -->
        </div><!-- container -->
    </div><!-- az-content -->
    @include('../common/footer')
    <script src="../lib/jquery/jquery.min.js"></script>
    <script src="../lib/jquery-ui/ui/widgets/datepicker.js"></script>

    <script src="../lib/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js"></script>
    <script src="../lib/jquery-simple-datetimepicker/jquery.simple-dtpicker.js"></script>

    <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/ionicons/ionicons.js"></script>
    <script src="../lib/chart.js/Chart.bundle.min.js"></script>
    <script src="../lib/select2/js/select2.min.js"></script>

    <script src="../js/azia.js"></script>
    <script src="../js/chart.chartjs.js"></script>
    <script src="../js/jquery.cookie.js" type="text/javascript"></script>
    <script>
        let select = document.getElementById('vai_tro');
        let show = document.getElementById('show');
        let show_import = document.getElementById('import_doc_gia');
        let ngay_tren = document.getElementById('ngaysinhantren');
        let ngay_duoi = document.getElementById('ngaysinhanduoi');
        let tren = document.getElementById('for_tren');
        let duoi = document.getElementById('for_duoi');

        function hide_show() {
            if (select.value == 3) {
                show.style.display = 'block';
                show_import.style.display = 'block';
                ngay_tren.style.display = 'block';
                ngay_duoi.style.display = 'none';
                tren.setAttribute("name", "ngay_sinh");
                tren.setAttribute("required", "");
                duoi.removeAttribute("name");
                duoi.removeAttribute("required");
            } else if (select.value == 1 || select.value == 2) {
                show.style.display = 'none';
                show_import.style.display = 'none';
                ngay_tren.style.display = 'none';
                ngay_duoi.style.display = 'block';
                duoi.setAttribute("name", "ngay_sinh");
                duoi.setAttribute("required", "");
                tren.removeAttribute("name");
                tren.removeAttribute("required");
            }
        }
        select.onchange = hide_show;
    </script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: 'Choose one',
                searchInputPlaceholder: 'Search'
            });

            $('.select2-no-search').select2({
                minimumResultsForSearch: Infinity,
                placeholder: 'Chọn vai trò'
            });
        });
    </script>
    <script>
        $('.fc-datepicker').datepicker({
            showOtherMonths: true,
            selectOtherMonths: true,
            dateFormat: 'dd/mm/yy'
        });
    </script>
</body>

</html>