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
    <link rel='shortcut icon' href='/img/LIBRO.png' />
    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="BootstrapDash">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    @include('/common/link')
</head>

<body>

    @include('../common/header', ['view' => 6])
    @if (Session::has('success'))
        <script>
            setTimeout(function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Thành công',
                    text: `{{ Session::get('success') }}`,
                    showConfirmButton: false,
                    timer: 1000 // Hiển thị trong 5 giây
                });
            }, 100);
        </script>
    @endif
    <div class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40">
        <div class="container">
            <div class="az-content-body">
                @if ($sl == 0)
                    <h4>HIỆN TẠI KHÔNG CÓ PHẢN HỒI NÀO !!</h4>
                @else
                    <h4>QUẢN LÝ PHẢN HỒI ({{ $sl }})</h4>
                    @foreach ($lienhe as $item)
                        <div class="rounded mb-2 mt-2 pl-2 border" style="display: flex;">
                            <div class="flex-fill">
                                <div class="mt-2 ml-2">
                                    <h5>{{ $item->tieu_de }}</h5>
                                    <p class="mb-2">{{ $item->noi_dung }}</p>
                                </div>
                            </div>
                            <div class="d-flex m-2 mr-3">
                                <div class="d-flex align-items-center">
                                    <div class="form-check">
                                        <input name="dang_chu_y" value="{{ $item->dang_chu_y }}"
                                            style="width: 18px;height: 18px;" class="form-check-input" type="checkbox"
                                            id="flexCheckDefault{{ $item->id }}"
                                            {{ $item->dang_chu_y == 1 ? 'checked' : '' }}
                                            onclick="checkBox({{ $item->id }})">
                                        <label style="padding-top: 5px;padding-left: 2px;user-select: none;"
                                            class="form-check-label" for="flexCheckDefault{{ $item->id }}">
                                            Đáng Chú ý
                                        </label>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <a style="color: grey;font-size: 16px;"
                                        href="{{ route('xoa-lien-he', ['id' => $item->id]) }}">
                                        <i class="fas fa-times"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
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
