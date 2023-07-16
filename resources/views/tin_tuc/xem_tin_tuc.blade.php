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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="BootstrapDash">

    <title>libro - Tạo tài khoản</title>

    @include('/common/link')

</head>

<body style="
    display: flex;
      flex-direction: column; height: 100vh;">

    @include('../common/header', ['view' => 5])
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
        <div class="container">
            <div class="az-content-left az-content-left-components">
                <div class="component-item">
                    <label style="font-size: 20px;">Tin tức</label>
                    <nav class="nav flex-column">
                        <a style="font-size: 18px;" href="{{route('them-tin-tuc')}}" class="nav-link ">Thêm tin tức</a>
                        <a style="font-size: 18px;" href="{{ route('danh-sach-tin-tuc') }}" class="nav-link active">Quản lý tin tức</a>
                    </nav>
                </div><!-- component-item -->
            </div><!-- az-content-left -->

            <div class="az-content-body pd-lg-l-40 d-flex flex-column">
                <div class="az-content-breadcrumb mt-3">
                    <span>Tin tức</span>
                    <span>Quản lý tin tức</span>
                </div>
                <div class="">
                    @if($sltintuc == 0)
                    <h4>HIỆN KHÔNG CÓ TIN TỨC NÀO !!</h4>
                    @else
                    <h3 class="ml-3 mt-3">QUẢN LÝ TIN TỨC ({{$sltintuc}})</h3>
                    <div class="table-responsive" style="display: grid;grid-template-columns: repeat(3, minmax(0, 1fr));">
                        @foreach ($tintuc as $key => $item)
                        <div class="card" style="width: 18rem;margin: 10px;">
                            @if($item->anh_bia == '')
                            <img height="310px" src="/img/avt/income.jpg" class="card-img-top">
                            @elseif($item->anh_bia != '')
                            <img height="310px" src="/img/news/{{$item->anh_bia}}" class="card-img-top">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{$item->ten}}</h5>
                                <a href="{{route('chi-tiet-tin-tuc',['id'=>$item->id])}}" class="btn btn-primary">Chi tiết</a>
                                <a href="{{route('xoa-tin-tuc',['id'=>$item->id])}}" class="btn btn-danger delete-link">Xóa</a>
                                <a href="{{route('sua-tin-tuc',['id'=>$item->id])}}" class="btn btn-success">Sửa</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>

        </div><!-- container -->
    </div><!-- az-content -->
    @include('../common/footer')
    <link href="https://cdn.jsdelivr.net/npm/suneditor@latest/dist/css/suneditor.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/suneditor@latest/dist/suneditor.min.js"></script>


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
        $(document).on("click", ".delete-link", function(event) {
            event.preventDefault();
            var link = this;

            Swal.fire({
                title: "Bạn có muốn xóa không?",
                imageUrl: "/img/war.png",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Xóa",
                cancelButtonText: "Hủy",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link.href;
                }
            });
        });
    </script>
</body>

</html>