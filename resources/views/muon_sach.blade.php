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
    <link href="../lib/spectrum-colorpicker/spectrum.css" rel="stylesheet">
    <link href="../lib/select2/css/select2.min.css" rel="stylesheet">
    <link href="../lib/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="../lib/ion-rangeslider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <link href="../lib/amazeui-datetimepicker/css/amazeui.datetimepicker.css" rel="stylesheet">
    <link href="../lib/jquery-simple-datetimepicker/jquery.simple-dtpicker.css" rel="stylesheet">
    <link href="../lib/pickerjs/picker.min.css" rel="stylesheet">

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
                        <nav class="nav flex-column">
                            <a href="{{ route('chi-tiet-sach', ['id' => $item->sach_id]) }}" class="nav-link">
                                Chi tiết</a>
                            <a href="#" class="nav-link active">Mượn sách</a>
                            <a href="{{ route('chinh-sua-sach', ['id' => $item->sach_id]) }}" class="nav-link">
                                Chỉnh sửa</a>
                        </nav>
                    @endforeach
                </div><!-- component-item -->
            </div><!-- az-content-left -->

            <div class="az-content-body pd-lg-l-40 d-flex flex-column">
                <div class="az-content-breadcrumb">
                    @foreach ($sach as $item)
                        <span>{{ $item->fkSach->ten }}</span>
                    @endforeach
                    <span>Mượn sách</span>
                </div>
                <div class="border shadow-sm rounded p-4 pr-5">
                    <div class="row pl-4 az-signin-header">
                        @foreach ($sach as $item)
                            <div class="border-right pr-4">
                                @if (Auth::user()->anh_dai_dien != '')
                                    <img src="../img/books/{{ $item->fkSach->hinh_anh }}" width="240em" height="320em"
                                        style="object-fit: cover">
                                @else
                                    <img src="../img/default/no_image_available.jpg" width="240em" height="320em"
                                        style="object-fit: cover">
                                @endif
                            </div>
                            <div class="ml-4 col-lg p-0">
                                <form action="{{route('xu-ly-muon-sach')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="sach" value="{{$item->id}}">
                                    <div class="d-flex mg-b-10">
                                        <div class="border rounded-pill p-1 pr-4 pl-4 mr-2"
                                            style="background-color: #FAFAFA">
                                            {{ $item->fkSach->fkTacGia->ten }}</div>
                                        <div class="border rounded-pill p-1 pr-4 pl-4 mr-2"
                                            style="background-color: #FAFAFA">
                                            {{ $item->fkSach->fkTheLoai->ten }}</div>
                                        <div class="border rounded-pill p-1 pr-4 pl-4"
                                            style="background-color: #FAFAFA">
                                            {{ $item->fkSach->fkNhaXuatBan->ten }}</div>
                                    </div>
                                    <div class="form-group">
                                        <label class="m-0">&nbsp;Mã số</label>
                                        <select name="ma_so" class="form-control select2" required>
                                            <option label="Chọn mã số"></option>
                                            @foreach ($ds_doc_gia as $doc_gia)
                                                <option value="{{ $doc_gia->id }}">{{ $doc_gia->ma_so }}</option>
                                            @endforeach
                                        </select>
                                    </div><!-- col-4 -->
                                    <div class="row row-sm">
                                        <div class="form-group col-lg">
                                            <label class="m-0">&nbsp;Ngày mượn</label>
                                            <input type="text" name="ngay_muon" class="form-control"
                                                placeholder="DD/MM/YYYY" autocomplete="off"
                                                value="{{ date('d/m/yy') }}" readonly>
                                        </div>
                                        <div class="form-group col-lg">
                                            <label class="m-0">&nbsp;Ngày trả</label>
                                            <input type="text" name="ngay_tra" id="datetimepicker"
                                                class="form-control" placeholder="DD/MM/YYYY" autocomplete="off"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row row-sm">
                                        <div class="col-lg flex-column mg-b-20">
                                            <div class="form-group">
                                                <label class="m-0">&nbsp;Số lượng</label>
                                                <input type="number" min="1" name="so_luong"
                                                    class="form-control" placeholder="Nhập số lượng" value="1"
                                                    required>
                                            </div>
                                            <div class="col-lg-6 pl-0">
                                                <button class="btn btn-az-primary btn-block">
                                                    Cho mượn
                                                </button>
                                            </div>
                                        </div>
                                        <div>
                                            {!! QrCode::size(120)->generate(
                                                '(sach) ' .
                                                    Str::ascii($item->fkSach->ten) .
                                                    ' | (tacgia) ' .
                                                    Str::ascii($item->fkSach->fkTacGia->ten) .
                                                    ' | (nhaxuatban) ' .
                                                    Str::ascii($item->fkSach->FKNhaXuatBan->ten) .
                                                    ' | (namxuatban) ' .
                                                    Str::ascii($item->fkSach->nam_xuat_ban) .
                                                    ' | (tusach) ' .
                                                    Str::ascii($item->fkTuSach->ten) .
                                                    ' | (khuvuc) ' .
                                                    Str::ascii($item->fkTuSach->fkKhuVuc->ten),
                                            ) !!}
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div><!-- az-card-signin -->

                <div class="ht-40"></div>

                <div class="az-footer ht-40">
                    <div class="container ht-100p pd-t-0-f">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">
                            Copyright © bootstrapdash.com 2020
                        </span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free
                            <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">
                                Bootstrap admin templates
                            </a>
                            from Bootstrapdash.com
                        </span>
                    </div><!-- container -->
                </div><!-- az-footer -->
            </div><!-- az-content-body -->
        </div><!-- container -->
    </div><!-- az-content -->

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
        $(function() {
            // Datepicker
            $('.fc-datepicker').datepicker({
                showOtherMonths: true,
                selectOtherMonths: true
            });

            $('#datepickerNoOfMonths').datepicker({
                showOtherMonths: true,
                selectOtherMonths: true,
                numberOfMonths: 2
            });

            // AmazeUI Datetimepicker
            $('#datetimepicker').datepicker({
                format: 'mm-dd-yyyy',
                autoclose: true, // close the datepicker when a date is selected
                todayHighlight: true, // highlight today's date
                dateFormat: 'dd/mm/yy'
            });
        });

        $(document).ready(function() {
            $('.select2').select2({
                placeholder: 'Chọn mã số độc giả',
                searchInputPlaceholder: 'Search'
            });

            $('.select2-no-search').select2({
                minimumResultsForSearch: Infinity,
                placeholder: 'Choose one'
            });
        });
    </script>
</body>

</html>
