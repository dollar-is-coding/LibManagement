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

    @include('../common/header', ['view' => 2])

    <div class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40">
        <div class="container">
            <div class="az-content-body">
                <form class="row az-signin-header" action="{{route('tim-kiem-theo-tac-gia')}}" method="get">
                    <div class="col-lg">
                        <input class="form-control" name="tim_kiem" placeholder="Tìm kiếm" type="text" value="" autocomplete="off">
                    </div>
                    <div class="col-lg-2">
                        <button class="btn btn-indigo btn-block m-0">Tìm kiếm</button>
                    </div>
                </form>
                <!-- @if (session('error_r'))
                <div id="error-message" class="rounded-lg p-1 pl-2 pr-2 shadow-sm" style="background-color: #F2F0FE; border:#C6BCF8 1px solid; color: #402DA1;">
                    <i class="typcn typcn-info text-danger h-4" style="font-size:16px"></i>
                    <span class="text-danger">{{ session('error_r') }}</span>
                </div>
                @endif -->
                <div class="table-responsive" style="display: flex">
                    @foreach($sach as $item)
                    <div class="card" style="margin: 10px;">
                        @if($item->hinh_anh == '')
                        <img src="/img/avt/income.jpg" class="card-img-top">
                        @elseif($item->hinh_anh != '')
                        <img src="/img/avt/{{$item->hinh_anh}}" class="card-img-top">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{$item->ten}}</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                    @endforeach
                </div><!-- az-content-body -->
                <div style="display: flex;justify-content: center;">{{ $sach->links() }}</div>
                @include('../common/footer')
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
            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();

                var page = $(this).attr('href').split('page=')[1];

                fetch_data(page);
            });

            function fetch_data(page) {
                $.ajax({
                    url: '/danh-sach-cac-cuon-sach?page=' + page,
                    success: function(data) {
                        $('.table-responsive').html($(data).find('.table-responsive').html());
                        $('.pagination').html($(data).find('.pagination').html());
                    }
                });
            }









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