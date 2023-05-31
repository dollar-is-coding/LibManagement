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

    @include('../common/header', ['view' => 3])

    <div class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40">
        <div class="container">
            <div class="az-content-left az-content-left-components">
                <div class="component-item">
                    <label>Độc giả</label>
                    <nav class="nav flex-column">
                        <a href="{{ route('cap-the-doc-gia') }}" class="nav-link">Cấp thẻ</a>
                        <a href="" class="nav-link">Quản lý</a>
                    </nav>
                    <label>Mượn sách</label>
                    <nav class="nav flex-column">
                        <a href="{{ route('hien-thi-muon-sach-giao-khoa') }}" class="nav-link">Sách giáo khoa</a>
                        <a href="#" class="nav-link active">Sách khác</a>
                    </nav>
                </div><!-- component-item -->
            </div><!-- az-content-left -->

            <div class="az-content-body pd-lg-l-40 d-flex flex-column">
                <div class="az-content-breadcrumb">
                    <span>Độc giả</span>
                    <span>Mượn sách khác</span>
                </div>
                <div class="border shadow-sm rounded p-4 az-signin-header">
                    <form action="{{ route('xu-ly-muon-sach-khac') }}" class="ml-3 mr-3" method="POST">
                        @csrf
                        <div class="row mg-b-20">
                            <div class="col-lg">
                                <label class="m-0">&nbsp;Mã số</label>
                                <select name="ma_so" class="form-control ma-so" required>
                                    <option label="Chon truong"></option>
                                    @foreach ($ds_doc_gia as $item)
                                        <option value="{{ $item->id }}">{{ $item->ma_so }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg"></div>
                        </div>
                        <input type="text" name="so_luong" value="1" hidden>
                        <div class="form-group mg-b-20">
                            <label class="m-0">&nbsp;Sách</label>
                            <select name="sach" class="form-control select2-no-search">
                                <option label="Choose one"></option>
                                @foreach ($sgk as $item)
                                    @if ($item->fkSach->the_loai_id != 1)
                                        <option value="{{ $item->id }}">{{ $item->fkSach->ten }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div><!-- col -->
                        <div class="row mg-b-30">
                            <div class="col-lg">
                                <label class="m-0">&nbsp;Ngày mượn</label>
                                <input type="text" name="ngay_muon" value="{{ date('d/m/Y') }}"
                                    placeholder="DD/MM/YYYY" class="form-control" readonly>
                            </div>
                            <div class="col-lg">
                                <label class="m-0">&nbsp;Ngày trả</label>
                                <input type="text" name="ngay_tra"
                                    value="{{ date('d/m/Y', strtotime(date('m/d/y') . ' + 14 days')) }}"
                                    placeholder="DD/MM/YYYY" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 p-0">
                            <button id="button" class="btn btn-primary btn-block">Mượn</button>
                        </div>
                    </form>
                </div>

                <div class="ht-40"></div>

                @include('../common/footer')

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
            $('.ma-so').select2({
                placeholder: 'Chọn mã số',
                searchInputPlaceholder: 'Search'
            });

            $('.ds-sach').select2({
                placeholder: 'Chọn sách',
                searchInputPlaceholder: 'Search'
            });

            $('.select2-no-search').select2({
                minimumResultsForSearch: Infinity,
                placeholder: 'Chọn sách'
            });
        });

        var ho = document.getElementById('ho');
        var ten = document.getElementById('ten');
        var button = document.getElementById('button');
        var result = document.getElementById('result');

        button.addEventListener('click', function() {
            result.innerText = ho.value + ' ' + ten.value;
        });
    </script>
</body>

</html>
