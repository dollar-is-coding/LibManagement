<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="description" content="" />
    <meta name="author" content="" />

    @if ($dieu_kien == 1)
        <title>Libro - Sách mới hàng tuần</title>
    @elseif($dieu_kien == 2)
        <title>Libro - {{ $tac_gia->ten }}</title>
    @elseif($dieu_kien == 3)
        <title>Libro - {{ $the_loai->ten }}</title>
    @endif


    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Sono:wght@200;300;400;500;700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="css/bootstrap.min.css" />

    <link rel="stylesheet" href="css/bootstrap-icons.css" />

    <link rel="stylesheet" href="css/owl.carousel.min.css" />

    <link rel="stylesheet" href="css/owl.theme.default.min.css" />

    <link href="css/templatemo-pod-talk.css" rel="stylesheet" />

    <!-- TemplateMo 584 Pod Talk https://templatemo.com/tm-584-pod-talk -->

</head>

<body>
    <main>
        @include('client.element.header', ['view' => 0])

        <header class="site-header d-flex flex-column justify-content-center align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 text-center">
                        @if ($dieu_kien == 1)
                            <h2 class="mb-0">SÁCH MỚI HÀNG TUẦN</h2>
                            <h5 class="mt-2 text-light">
                                ( {{ $bat_dau->format('d/m/Y') }} - {{ $ket_thuc->format('d/m/Y') }} )
                            </h5>
                        @elseif($dieu_kien == 2)
                            <h2 class="mb-0">{{ Str::upper($tac_gia->ten) }}</h2>
                        @elseif($dieu_kien == 3)
                            <h2 class="mb-0">{{ Str::upper($the_loai->ten) }}</h2>
                        @endif
                    </div>
                </div>
            </div>
        </header>

        <section class="latest-podcast-section section-padding pt-2" id="section_2">
            <div class="container">
                <div class="row justify-content-start">
                    <div class="col-lg-12 col-12">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">Tất cả ({{ $so_luong }})</h4>
                        </div>
                    </div>
                    @foreach ($sach as $key => $item)
                        <div class="col-lg-6 col-12 mb-4 mb-lg-0 {{ $key >= 2 ? 'mt-4' : '' }}">
                            <div class="custom-block d-flex">
                                <div>
                                    <div class="custom-block-icon-wrap">
                                        <div class="section-overlay"></div>
                                        <a href="{{ route('thong-tin-sach', ['id' => $item->id]) }}"
                                            class="custom-block-image-wrap">
                                            @if ($item->hinh_anh != '')
                                                <img src="../img/books/{{ $item->hinh_anh }}"
                                                    class="custom-block-image img-fluid" alt="" />
                                            @else
                                                <img src="../img/default/no_book.jpg"
                                                    class="custom-block-image img-fluid border" alt="" />
                                            @endif
                                        </a>
                                    </div>
                                    <div class="mt-2">
                                        @include('client.element.muon_sach_btn', [
                                            'sach' => $item,
                                            'btn' => 2,
                                        ])
                                    </div>
                                </div>
                                <div class="custom-block-info">
                                    <div class="custom-block-top d-flex mb-1">
                                        <small class="me-4">
                                            <i class="bi-clock-fill custom-icon"></i>
                                            {{ $item->nam_xuat_ban }}
                                        </small>
                                        <small class="me-4">Mã sách <span
                                                class="badge">#{{ $item->ma_sach }}</span></small>
                                        <small>Số lượng <span
                                                class="badge">{{ $item->hasThuVien->sl_con_lai }}</span></small>
                                    </div>
                                    <h5 class="mb-2">
                                        <a style="width:17em; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden;"
                                            href="{{ route('thong-tin-sach', ['id' => $item->id]) }}">
                                            {{ $item->ten }} </a>
                                    </h5>
                                    <div class="profile-block d-flex">
                                        <img src="../img/default/author.png" class="profile-block-image img-fluid"
                                            alt="" />
                                        <p>
                                            Tác giả
                                            <strong>
                                                @if ($dieu_kien == 2)
                                                    {{ $item->fkTacGia->ten }}
                                                @else
                                                    <a href="{{ route('sach-theo-chu-de', ['dieu_kien' => 2, 'tac_gia' => $item->tac_gia_id]) }}"
                                                        class="author">{{ $item->fkTacGia->ten }}</a>
                                                @endif
                                            </strong>
                                        </p>
                                    </div>
                                    @include('client.element.interact_bar', ['sach' => $item])
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div></div>
                    <div class="col-auto mr-auto mx-auto mt-5">
                        <nav aria-label="Page navigation example">
                            {{ $sach->appends(request()->input())->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('client.element.footer')

    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>
    <script>
        function handleGioSach(sach, soLuong) {
            var option = document.getElementById('sach_' + sach).innerHTML;
            var request = new XMLHttpRequest();
            request.open('GET', '/xu-ly-gio-sach?sach=' + encodeURIComponent(sach) + '&gio_sach=' + encodeURIComponent(
                option), true);
            request.send();
            if (option.trim() == 'Chọn sách') {
                request.onreadystatechange = function() {
                    if (request.readyState == 4 && request.status == 200) {
                        var data = JSON.parse(request.responseText);
                        document.getElementById('sach_' + sach).innerHTML = 'Bỏ chọn';
                        document.getElementById('sach_' + sach).classList.remove('custom-btn');
                        document.getElementById('sach_' + sach).classList.add('danger-btn');
                        document.getElementById('gio_sach_hien_tai').value = ++document.getElementById(
                            'gio_sach_hien_tai').value;
                        document.getElementById('gio_sach').innerHTML = 'Giỏ sách (' + document.getElementById(
                            'gio_sach_hien_tai').value + ')';
                    }
                }
            } else {
                request.onreadystatechange = function() {
                    if (request.readyState == 4 && request.status == 200) {
                        var data = JSON.parse(request.responseText);
                        document.getElementById('sach_' + sach).classList.add('custom-btn');
                        document.getElementById('sach_' + sach).classList.remove('danger-btn');
                        document.getElementById('gio_sach_hien_tai').value = --document.getElementById(
                            'gio_sach_hien_tai').value;
                        document.getElementById('gio_sach').innerHTML = 'Giỏ sách (' + document.getElementById(
                            'gio_sach_hien_tai').value + ')';
                        if (Number(soLuong) > 0) {
                            document.getElementById('sach_' + sach).innerHTML = 'Chọn sách';
                        } else {
                            document.getElementById('sach_' + sach).innerHTML = 'Hết sách';
                            document.getElementById('sach_' + sach).classList.add('bg-secondary');
                        }
                    }
                }
            }
        }
    </script>
</body>

</html>
