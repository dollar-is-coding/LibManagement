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
    <link href="/lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="/lib/typicons.font/typicons.css" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="/css/azia.css">

</head>

<body>

    @include('../common/header', ['view' => 2])

    <div class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40">
        <div class="container">
            <div class="az-content-left az-content-left-components">
                <div class="component-item">
                    @foreach ($sach as $item)
                    <label>{{ $item->fkSach->ten }}</label>
                    <nav class="nav flex-column">
                        <a href="#" class="nav-link active">Chi tiết</a>
                        <a href="{{ route('chinh-sua-sach', ['id' => $item->sach_id,'id_tv'=>$item->id]) }}" class="nav-link">Chỉnh
                            sửa</a>
                    </nav>
                    @endforeach
                </div><!-- component-item -->
            </div><!-- az-content-left -->

            <div class="az-content-body pd-lg-l-40 d-flex flex-column">
                <div class="az-content-breadcrumb">
                    @foreach ($sach as $item)
                    <span>{{ $item->fkSach->ten }}</span>
                    @endforeach
                    <span>Chi tiết</span>
                </div>
                <div class="border shadow-sm rounded p-4 pr-5">
                    <div class="row pl-4">
                        @foreach ($sach as $item)
                        <div class="border-right pr-4">
                            @if ($item->fkSach->hinh_anh == '')
                            <img src="/img/default/no_image_available.jpg" width="240em" height="320em" style="object-fit: cover">
                            @else
                            <img src="/img/books/{{ $item->fkSach->hinh_anh }}" width="240em" height="320em" style="object-fit: cover">
                            @endif
                        </div>
                        <div class="ml-4 col-lg p-0">
                            <div class="col-lg p-0">
                                <div class="row row-sm">
                                    <div class="col-lg">
                                        <form action="{{ route('tim-kiem-theo-tac-gia') }}" method="get" class="row align-items-center mb-0">
                                            @csrf
                                            <div class="ml-3">Tác giả: </div>
                                            <input type="hidden" name="tac_gia_id" value="{{ $item->fkSach->tac_gia_id }}">
                                            <button onMouseDown="this.style.border = 'none'" onMouseUp="this.style.border = '1px solid black'" onMouseOver="this.style.textDecoration='underline',this.style.color='blue'" onMouseOut="this.style.textDecoration='none',this.style.color='#0D6EFD'" type="submit" class="border-0 bg-white" id="myButton" style="color:#0D6EFD">
                                                {{ $item->fkSach->fkTacGia->ten }}
                                            </button>
                                        </form>
                                        <div style="font-size: 26px">{{ $item->fkSach->ten }}</div>

                                    </div>
                                    <div>
                                        {!! QrCode::size(80)->generate(
                                        '(sach) ' .
                                        Str::ascii($item->fkSach->ten) .
                                        ' | (tacgia) ' .
                                        Str::ascii($item->fkSach->fkTacGia->ten) .
                                        ' | (nhaxuatban) ' .
                                        Str::ascii($item->fkSach->FKNhaXuatBan->ten) .
                                        ' | (namxuatban) ' .
                                        Str::ascii($item->fkSach->nam_xuat_ban) .
                                        ' | (tusach) ' .
                                        Str::ascii($item->fkTuSach->ten) .
                                        ' | (khuvuc) ' .
                                        Str::ascii($item->fkTuSach->fkKhuVuc->ten),
                                        ) !!}
                                    </div>
                                </div>
                                <div style="background-color: #FAFAFA" class=" pl-3 p-2 pr-3 mt-2 mb-2">
                                    <div class="rounded-lg d-flex align-items-end">
                                        <div style="color: #FF424E;font-size: 32px">
                                            {{ $item->sl_con_lai }}
                                        </div>
                                        <div class="pb-2" style="color:gray">&nbsp;(số lượng)</div>
                                    </div>
                                    <div class="rounded-lg p-1 pl-2 pr-2 mb-2" style="background-color: #F2F0FE; border:#C6BCF8 1px solid;color: #402DA1;">
                                        <i class="typcn typcn-location" style="font-size:18px"></i>
                                        {{ $item->fkTuSach->ten }} - {{ $item->fkTusach->fkKhuVuc->ten }}
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex">
                                <div class="border rounded-pill p-1 pr-4 pl-4 mr-2" style="background-color: #FAFAFA">
                                    {{ $item->fkSach->fkTheLoai->ten }}
                                </div>
                                <div class="border rounded-pill p-1 pr-4 pl-4 mr-2" style="background-color: #FAFAFA">
                                    {{ $item->fkSach->nam_xuat_ban }}
                                </div>
                                <div class="border rounded-pill p-1 pr-4 pl-4" style="background-color: #FAFAFA">
                                    {{ $item->fkSach->fkNhaXuatBan->ten }}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div><!-- az-card-signin -->

                <div class="ht-40"></div>

                @include('../common/footer')

            </div><!-- az-content-body -->
        </div><!-- container -->
    </div><!-- az-content -->

    <script src="/lib/jquery/jquery.min.js"></script>
    <script src="/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/lib/ionicons/ionicons.js"></script>
    <script src="/lib/chart.js/Chart.bundle.min.js"></script>

    <script src="/js/azia.js"></script>
    <script src="/js/chart.chartjs.js"></script>
    <script src="/js/jquery.cookie.js" type="text/javascript"></script>
</body>

</html>