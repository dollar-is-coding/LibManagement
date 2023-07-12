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

<body>

    @include('../common/header', ['view' => 2])

    <div class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40">
        <div class="container">
            <div class="az-content-body">
                <form class="row az-signin-header" action="{{ route('tim-kiem-theo-tac-gia') }}" method="get">
                    <div class="col-lg">
                        <input required class="form-control" name="tim_kiem" placeholder="Tìm kiếm" type="text" value="{{ old('tim_kiem', isset($tim_kiem) ? $tim_kiem : '') }}" autocomplete="off">
                    </div>
                    <div class="col-lg-2">
                        <button class="btn btn-indigo btn-block m-0">Tìm kiếm</button>
                    </div>
                </form>

                @if (session('error'))
                <div id="error_ms" class="rounded-lg p-1 pl-2 pr-2 shadow-sm" style="background-color: #F2F0FE; border:#C6BCF8 1px solid; color: #402DA1;">
                    <i class="typcn typcn-info text-danger h-4" style="font-size:16px"></i>
                    <span class="text-danger">{{ session('error') }}</span>
                </div>
                @endif

                @if ($slsach > 0)
                <h4 class="mt-3">SỐ LƯỢNG SÁCH HIỆN CÓ ({{ $slsach }})</h4>
                @endif
                @if ($slsach == 0)
                <h4 class="mt-2">HIỆN KHÔNG CÓ SÁCH NÀO !!</h4>
                @endif
                <div class="table-responsive" style="display: grid;grid-template-columns: repeat(5, minmax(0, 1fr));">
                    @foreach ($sach as $item)
                    <div class="card" style="margin: 10px;width: 208px;">
                        @if ($item->hinh_anh == '')
                        <img style="width: 207px !important;height: 250px !important;" src="../img/default/no_book_admin.png" class="card-img-top">
                        @elseif($item->hinh_anh != '')
                        <img style="width: 207px !important;height: 250px !important;" src="/img/books/{{ $item->hinh_anh }}" class="card-img-top">
                        @endif
                        <div class="card-body">
                            <div style="height: 80px;">
                                <h5 style="width:10em; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;" class="card-title">{{ $item->ten }}</h5>
                            </div>
                            <div class="form-group d-flex align-items-center">
                                <input {{ $item->de_xuat == 1 ? 'checked' : '' }} class="mb-0" style="width: 17px;height: 17px;" type="checkbox" name="de_xuat" id="checkDeXuat{{ $item->id }}" onclick="handleCheck({{ $item->id }})">
                                <label class="mb-0 pl-1" id="changeContext" style="font-size: 17px;user-select: none;" for="checkDeXuat{{ $item->id }}">Đề xuất</label>
                            </div>
                            <a href="{{ route('chi-tiet-sach', ['id' => $item->id]) }}" class="btn btn-primary">Chi tiết</a>
                        </div>
                    </div>
                    @endforeach
                </div><!-- az-content-body -->
                <div style="display: flex;justify-content: center;">{{ $sach->links() }}</div>

            </div>
        </div><!-- az-content -->
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

            function handleCheck(sach) {
                var noticable = document.getElementById('checkDeXuat' + sach);
                var isChecked = noticable.checked;
                var request = new XMLHttpRequest();
                request.open('GET', '/xu-ly-de-xuat?sach=' + encodeURIComponent(sach) + '&check=' + encodeURIComponent(
                        isChecked ?
                        1 :
                        0),
                    true);
                request.send();
                request.onreadystatechange = function() {
                    if (request.readyState == 4 && request.status == 200) {
                        noticable.checked = isChecked;
                    }
                }
            }
        </script>
</body>

</html>