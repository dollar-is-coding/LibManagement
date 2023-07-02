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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>libro - Tra cứu</title>

    <!-- vendor css -->
    <link href="/lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="/lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="/lib/spectrum-colorpicker/spectrum.css" rel="stylesheet">
    <link href="/lib/select2/css/select2.min.css" rel="stylesheet">
    <link href="/lib/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="/lib/ion-rangeslider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <link href="/lib/amazeui-datetimepicker/css/amazeui.datetimepicker.css" rel="stylesheet">
    <link href="/lib/jquery-simple-datetimepicker/jquery.simple-dtpicker.css" rel="stylesheet">
    <link href="/lib/pickerjs/picker.min.css" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="/css/azia.css">

</head>

<body>

    @include('../common/header', ['view' => 2])

    <div class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40">
        <div class="container">
            <div class="az-content-body">
                @if (session('error'))
                <div id="error_ms" class="rounded-lg p-1 pl-2 pr-2 shadow-sm" style="background-color: #F2F0FE; border:#C6BCF8 1px solid; color: #402DA1;">
                    <i class="typcn typcn-info text-danger h-4" style="font-size:16px"></i>
                    <span class="text-danger">{{ session('error') }}</span>
                </div>
                @endif
                <h4>Quản lý kho sách</h4>
                @if($khosach->count()==0)
                <p>Hiện tại trong kho không có sách nào !!!</p>
                @else
                <h4>Số lượng sách trong kho ({{$khosach->count()}})</h4>
                @endif
                <div class="table-responsive" style="display: grid;grid-template-columns: auto auto auto auto;">
                    @foreach($khosach as $item)
                    <div class="card" style="margin: 10px;">
                        @if($item->fkSach->hinh_anh == '')
                        <img src="/img/avt/income.jpg" class="card-img-top">
                        @elseif($item->fkSach->hinh_anh != '')
                        <img src="/img/books/{{$item->hinh_anh}}" class="card-img-top">
                        @endif
                        <div class="card-body">
                            <h5 style="height: 50px;" class="card-title">{{$item->fkSach->ten}}</h5>
                            <!-- <p>Lý do {{$item->ly_do}}</p>
                            <p class="card-text">Số lượng {{$item->so_luong}}</p> -->
                            <a href="{{route('chi-tiet-kho',['id'=>$item->id])}}" class="btn btn-primary">Xem chi tiết</a>
                        </div>
                    </div>
                    @endforeach
                </div><!-- az-content-body -->

                @include('../common/footer')
            </div>

        </div><!-- az-content -->


        <script src="/lib/jquery/jquery.min.js"></script>
        <script src="/lib/jquery-ui/ui/widgets/datepicker.js"></script>

        <script src="/lib/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js"></script>
        <script src="/lib/jquery-simple-datetimepicker/jquery.simple-dtpicker.js"></script>

        <script src="/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/lib/ionicons/ionicons.js"></script>
        <script src="/lib/chart.js/Chart.bundle.min.js"></script>
        <script src="/lib/select2/js/select2.min.js"></script>

        <script src="/js/azia.js"></script>
        <script src="/js/chart.chartjs.js"></script>
        <script src="/js/jquery.cookie.js" type="text/javascript"></script>
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