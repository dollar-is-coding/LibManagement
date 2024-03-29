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
    @include('/common/link')
</head>

<body style="
display: flex;
      flex-direction: column; height: 100vh;">

    @include('../common/header', ['view' => 2])
    @if(Session::has('success'))
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
        <div class="container" style="display: flex;">
            <div class="az-content-body mr-2" style="flex-basis: 60%;">
                @if (session('error'))
                <div id="error_ms" class="rounded-lg p-1 pl-2 pr-2 shadow-sm mb-2" style="background-color: #F2F0FE; border:#C6BCF8 1px solid; color: #402DA1;">
                    <i class="typcn typcn-info text-danger h-4" style="font-size:16px"></i>
                    <span class="text-danger">{{ session('error') }}</span>
                </div>
                @endif
                <h4>BÁO CÁO SÁCH HƯ</h4>
                <div class="table-responsive" style="margin-bottom: 220px;">
                    <form action="{{route('xu-ly-bo-sach-vao-kho')}}" method="post">
                        @csrf
                        <div style="display: grid;grid-template-columns: auto;">
                            <div>
                                <label for="selectBox" class="form-label">Chọn sách</label>
                                <select required class="form-control select2" name="ten_sach" id="selectBox" tabindex="1">
                                    <option disabled selected>Chọn sách bị hư</option>
                                    @foreach($sach as $item)
                                    <option value="{{$item->sach_id}}">{{$item->fkSach->ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="exampleFormControlInput1" class="form-label">Số lượng</label>
                                <input value="1" tabindex="2" name="so_luong" required type="number" min="1" class="form-control" id="exampleFormControlInput1" placeholder="Số lượng">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Lý do</label>
                                <textarea name="ly_do" tabindex="3" placeholder="Lý do" required class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="mb-3" style="display: flex;justify-content: end;">
                            <button type="submit" class="btn btn-success">Bỏ vào kho</button>
                        </div>
                    </form>
                </div><!-- az-content-body -->
            </div>
            <div style="flex-basis: 40%;" class=" rounded">
                <h4 style="text-align: center;">Thông tin sách</h4>
                <div id="showsach">
                    <div class="mt-4" style="display: flex;justify-content: center;">
                        <img id="hinhanhsach" class="border rounded" style="width: 180px;height: 250px;object-fit: contain;" src="../img/default/no_book_admin.png" alt="" srcset="">
                    </div>
                    <h4 class="mt-3" style="text-align: center;" id="tensach">Tên sách</h4>
                </div>
            </div>

        </div><!-- az-content -->
        <div style="margin-top: 100px;">
            @include('../common/footer')
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
            let selectBox = document.getElementById('selectBox');
            let viewdom = document.getElementById('showsach');
            let tensach = document.getElementById('tensach');
            let anhsach = document.getElementById("hinhanhsach");
            let soluong = document.getElementById('so_luong_sach');
            selectBox.onchange = () => {
                let val = selectBox.value;
                fetch('/xem-sach/' + val)
                    .then(response => response.json())
                    .then(data => {
                        console.log(data)
                        tensach.innerHTML = data.sach.ten;
                        if (data.sach.hinh_anh == '') {
                            anhsach.src = '../img/default/no_book_admin.png';
                        } else {
                            anhsach.src = '/img/books/' + data.sach.hinh_anh;
                        }
                    })
            }
        </script>
</body>

</html>