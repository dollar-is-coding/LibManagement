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
    <link href="../lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../lib/typicons.font/typicons.css" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="../css/azia.css">

</head>

<body>

    @include('../common/header', ['view' => 3])

    <div class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40">
        <div class="container">
            <div class="az-content-left az-content-left-components">
                <div class="component-item">
                    <label>{{ $doc_gia->ho }} {{ $doc_gia->ten }}</label>
                    <nav class="nav flex-column">
                        <a href="#" class="nav-link active">Chi tiết</a>
                        <a href="#" class="nav-link">Trả sách</a>
                    </nav>
                </div><!-- component-item -->
            </div><!-- az-content-left -->

            <div class="az-content-body pd-lg-l-40 d-flex flex-column">
                <div class="az-content-breadcrumb">
                    <span>{{ $doc_gia->ho }} {{ $doc_gia->ten }}</span>
                    <span>Chi tiết</span>
                </div>
                <div class="border shadow-sm rounded p-4 pr-5">
                    <div class="ml-4">
                        <div class="row row-sm">
                            <div class="col-lg">
                                <div style="font-size: 26px" class="ml-1">
                                    {{ $doc_gia->ho }} {{ $doc_gia->ten }}
                                    <span class="font-weight-normal h6">
                                        ({{ $doc_gia->gioi_tinh ? 'Nam' : 'Nữ' }})
                                    </span>
                                </div>
                                <div style="color:gray" class="ml-1">Mã số
                                    <span class="font-italic font-weight-bold">
                                        {{ $doc_gia->ma_so }}
                                    </span>
                                </div>
                            </div>
                            <div>
                                {!! QrCode::size(80)->generate('(doc gia) ' . Str::ascii($doc_gia->ten)) !!}
                            </div>
                        </div>
                        <div class="d-flex flex-wrap ml-1 mb-2">
                            <div class="border rounded-pill pr-4 pl-3 mr-2 mt-2"
                                style="background-color: #FAFAFA; padding-top:.2em;padding-bottom:.2em">
                                <i class="typcn typcn-phone"
                                    style="color: #402DA1; font-size:16px"></i>&nbsp;{{ $doc_gia->so_dien_thoai }}
                            </div>
                            <div class="border rounded-pill pr-4 pl-3 mr-2 mt-2"
                                style="background-color: #FAFAFA; padding-top:.2em;padding-bottom:.2em">
                                <i class="typcn typcn-mortar-board"
                                    style="color: #402DA1; font-size:16px"></i>&nbsp;{{ $doc_gia->lop }}
                            </div>
                            <div class="border rounded-pill pr-4 pl-3 mr-2 mt-2"
                                style="background-color: #FAFAFA; padding-top:.2em;padding-bottom:.2em">
                                <i class="typcn typcn-calendar"
                                    style="color: #402DA1; font-size:16px"></i>&nbsp;{{ $doc_gia->ngay_sinh }}
                            </div>
                            <div class="border rounded-pill pr-4 pl-3 mr-2 mt-2"
                                style="background-color: #FAFAFA; padding-top:.2em;padding-bottom:.2em">
                                <i class="typcn typcn-location"
                                    style="color: #402DA1; font-size:16px"></i>&nbsp;{{ $doc_gia->dia_chi }}
                            </div>
                        </div>
                        <div style="background-color: #FAFAFA" class="pl-3 p-2 pr-3 rounded shadow-sm">
                            <div class="rounded-lg d-flex align-items-end">
                                <div style="color: #FF424E;font-size: 32px">
                                    {{ $doc_gia->sgk + $doc_gia->sach_khac }}
                                </div>
                                <div class="pb-2" style="color:gray">&nbsp;(Số sách đang mượn)</div>
                            </div>
                            <div class="rounded-lg p-1 pl-2 pr-2 mb-2"
                                style="background-color: #F2F0FE; border:#C6BCF8 1px solid;color: #402DA1;">
                                <i class="typcn typcn-input-checked" style="font-size:18px"></i>
                                {{ $doc_gia->sgk }} SGK - {{ $doc_gia->sach_khac }} sách khác
                            </div>
                        </div>
                        <hr>
                        <div class="az-content-label">&nbsp;Sách đang mượn</div>
                        <table class="mt-0 table az-table-reference">
                            <thead>
                                <tr>
                                    <th class="wd-5p"></th>
                                    <th>Sách</th>
                                    <th>Thời gian mượn</th>
                                    <th>Dự kiến trả</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sach as $key => $item)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td><a style="color: black"
                                                onMouseOver="this.style.color='blue',this.style.textDecoration='underline'"
                                                onMouseOut="this.style.color='black',this.style.textDecoration='none'"
                                                href="{{ route('chi-tiet-sach', ['id' => $item->sach_id]) }}">
                                                {{ $item->fkSach->ten }}
                                            </a>
                                        </td>
                                        <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->ngay_tra)->format('d/m/Y') }}</td>
                                        <td
                                            class="{{ \Carbon\Carbon::now()->format('d/m/Y') <= \Carbon\Carbon::parse($item->ngay_tra)->format('d/m/Y') ? '' : 'text-danger' }}">
                                            {{ \Carbon\Carbon::now()->format('d/m/Y') <= \Carbon\Carbon::parse($item->ngay_tra)->format('d/m/Y') ? 'Còn hạn' : 'Hết hạn' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- az-card-signin -->

                <div class="ht-40"></div>

                @include('../common/footer')

            </div><!-- az-content-body -->
        </div><!-- container -->
    </div><!-- az-content -->

    <script src="../lib/jquery/jquery.min.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/ionicons/ionicons.js"></script>
    <script src="../lib/chart.js/Chart.bundle.min.js"></script>

    <script src="../js/azia.js"></script>
    <script src="../js/chart.chartjs.js"></script>
    <script src="../js/jquery.cookie.js" type="text/javascript"></script>
</body>

</html>
