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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
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

    @include('../common/header', ['view' => 6])

    <div class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40">
        <div class="container">
            <div class="az-content-body">
                <h4>Quản lý phản hồi</h4>
                @if ($sl == 0)
                    <p>Hiện tại không có phản hồi nào !!!</p>
                @endif
                @foreach ($lienhe as $item)
                    <div class="border rounded mb-2 mt-2" style="display: flex;">
                        <div style="flex-basis: 100%;">
                            <div class=" mt-2 ml-2">
                                <h5>{{ $item->tieu_de }}</h5>
                                <p class="ml-3">{{ $item->noi_dung }}</p>
                            </div>
                        </div>
                        <div style="flex-basis: 13%;">
                            <div style="display: flex;">
                                <div class="form-check mt-4 mr-3">
                                    <input name="dang_chu_y" value="{{ $item->dang_chu_y }}"
                                        style="width: 20px;height: 20px;" class="form-check-input" type="checkbox"
                                        id="flexCheckDefault{{ $item->id }}"
                                        {{ $item->dang_chu_y == 1 ? 'checked' : '' }}
                                        onclick="checkBox({{ $item->id }})">
                                    <label style="padding-top: 5px;padding-left: 2px;user-select: none;"
                                        class="form-check-label" for="flexCheckDefault{{ $item->id }}">
                                        Đáng Chú ý
                                    </label>
                                </div>
                                <div>
                                    <a style="color: black;font-size: 22px;"
                                        href="{{ route('xoa-lien-he', ['id' => $item->id]) }}">
                                        <i class="fas fa-times"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @include('../common/footer')
            </div>
        </div><!-- az-content -->
    </div>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/fontawesome.js"></script>
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

        function checkBox(id) {
            var noticable = document.getElementById('flexCheckDefault' + id);
            var isChecked = noticable.checked;
            var request = new XMLHttpRequest();
            request.open('GET', '/dang-chu-y?id=' + encodeURIComponent(id) + '&check=' + encodeURIComponent(isChecked ? 1 :
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
