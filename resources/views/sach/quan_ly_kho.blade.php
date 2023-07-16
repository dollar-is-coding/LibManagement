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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <title>libro - Tra cứu</title>

    <!-- vendor css -->
    @include('/common/link')

</head>

<body style="
display: flex;
      flex-direction: column; height: 100vh;">
    @include('../common/header', ['view' => 2])
    <div class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40">
        <div class="container">
            <div class="az-content-body">
                @if ($khosach->count() == 0)
                <h4>HIỆN TẠI TRONG KHO KHÔNG CÓ SÁCH NÀO!!</h4>
                @else
                <!-- <form class="row az-signin-header" action="" method="get">
                    <div class="col-lg">
                        <input required class="form-control" name="tim_kiem" placeholder="Tìm kiếm" type="text" value="{{ old('tim_kiem', isset($tim_kiem) ? $tim_kiem : '') }}" autocomplete="off">
                    </div>
                    <div class="col-lg-2">
                        <button class="btn btn-indigo btn-block m-0">Tìm kiếm</button>
                    </div>
                </form> -->
                @if (session('error'))
                <div id="error_ms" class="rounded-lg p-1 pl-2 pr-2 shadow-sm" style="background-color: #F2F0FE; border:#C6BCF8 1px solid; color: #402DA1;">
                    <i class="typcn typcn-info text-danger h-4" style="font-size:16px"></i>
                    <span class="text-danger">{{ session('error') }}</span>
                </div>
                @endif
                <h4 class="mt-2">QUẢN LÝ KHO SÁCH ({{ $khosach->count() }})</h4>
                @endif
                <div class="table-responsive" style="display: grid;grid-template-columns: repeat(5, minmax(0, 1fr));">
                    @foreach ($khosach as $item)
                    <div class="card" style="margin: 10px;">
                        @if ($item->fkSach->hinh_anh == '')
                        <img style="width: 207px !important;height: 250px !important;" src="../img/default/no_book_admin.png" class="card-img-top">
                        @elseif($item->fkSach->hinh_anh != '')
                        <img style="width: 207px !important;height: 250px !important;" src="/img/books/{{ $item->fkSach->hinh_anh }}" class="card-img-top">
                        @endif
                        <div class="card-body">
                            <div style="height: 80px;">
                                <h5 style="height: 50px;" class="card-title">{{ $item->fkSach->ten }}</h5>
                            </div>
                            <a href="{{ route('chi-tiet-kho', ['id' => $item->id]) }}" class="btn btn-primary">Chi
                                tiết</a>
                        </div>
                    </div>
                    @endforeach
                </div><!-- az-content-body -->
            </div>

        </div><!-- az-content -->
    </div>
    @include('../common/footer')

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