<!DOCTYPE html>
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

    <title>libro - Tra cứu</title>

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
            <div class="az-content-body">
                <form class="row" action="{{ route('tim-kiem') }}" method="get">
                    <div class="col-lg">
                        <input required class="form-control" name="tim_kiem" placeholder="Tìm kiếm" type="text"
                            autocomplete="off">
                    </div><!-- col -->
                    <div class="col-lg-3">
                        <select class="form-control select2-no-search" name="sort">
                            <option value="asc_name" selected>A -> Z</option>
                            <option value="desc_name">Z -> A</option>
                            <option value="desc_year">Mới nhất</option>
                        </select>
                    </div><!-- col -->
                    <div class="col-lg-2">
                        <button class="btn btn-indigo btn-block">Search</button>
                    </div>
                </form>
                <div class="table-responsive">
                    @if (blank($ds_sach))
                        <div class="az-table-reference">Không tìm thấy kết quả!</div>
                    @else
                        <table class="table mg-b-0 az-table-reference">
                            <thead>
                                <tr>
                                    <th class="wd-5p">STT</th>
                                    <th>Sách</th>
                                    <th>Tác giả</th>
                                    <th>Vị trí</th>
                                    <th class="wd-10p">Số lượng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ds_sach as $key => $item)
                                    @foreach ($item->hasThuVien as $thu_vien)
                                        <tr>
                                            <th scope="row">
                                                {{ ++$key }}</th>
                                            <td>
                                                <style>
                                                    /* mouse over link */
                                                    ten_sach:hover {
                                                        color: blue;
                                                        text-decoration: underline;
                                                    }
                                                </style>
                                                <a style="color: black"
                                                    onMouseOver="this.style.color='blue',this.style.textDecoration='underline'"
                                                    onMouseOut="this.style.color='black',this.style.textDecoration='none'"
                                                    href="{{ route('chi-tiet-sach', ['id' => $thu_vien]) }}">{{ $thu_vien->fkSach->ten }}</a>
                                            </td>
                                            <td>{{ $thu_vien->fkSach->fkTacGia->ten }}</td>
                                            <td>{{ $thu_vien->fkTuSach->ten }},
                                                {{ $thu_vien->fkTuSach->fkKhuVuc->ten }}
                                            </td>
                                            <td>{{ $thu_vien->so_luong }}</td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                </div><!-- table-responsive -->

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
        </div>
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
                placeholder: 'Chọn trường',
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
