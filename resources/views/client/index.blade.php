<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Libro - Trang chủ</title>

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
    <link rel="stylesheet" href="https://code.jquery.com/jquery-3.6.0.min.js">

    <link href="css/templatemo-pod-talk.css" rel="stylesheet" />

    <!-- TemplateMo 584 Pod Talk https://templatemo.com/tm-584-pod-talk -->
</head>

<body>
    <main>
        @include('client.element.header', ['view' => 1])
        <section class="hero-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="text-center mb-5 pb-2">
                            <h1 class="text-white">Sách là tri thức</h1>

                            <div class="row justify-content-center">
                                <p class="text-white col-lg-5 col-5">
                                    Một nghiên cứu năm 2014 của Đại học
                                    Toronto cho thấy, việc đọc sách có thể
                                    ảnh hưởng tích cực đến tính cách của
                                    chúng ta bởi cách nó mở rộng quan điểm
                                    của chúng ta…
                                </p>
                            </div>

                            <a href="#section_2" class="btn custom-btn smoothscroll mt-3">Khám phá</a>
                        </div>

                        <div class="owl-carousel owl-theme">
                            @foreach ($de_xuat as $sach)
                                <div class="owl-carousel-info-wrap item">
                                    @if ($sach->hinh_anh == '')
                                        <img src="../img/default/no_book_slider.png"
                                            class="owl-carousel-image img-fluid" />
                                    @else
                                        <img src="../img/books/{{ $sach->hinh_anh }}"
                                            class="owl-carousel-image img-fluid" width="150px"/>
                                    @endif
                                    <div class="owl-carousel-info">
                                        <h4 class="mb-2">
                                            <a href="{{ route('thong-tin-sach', ['id' => $sach->id]) }}"
                                                class="slide">{{ $sach->ten }}</a>
                                        </h4>
                                        <span class="badge">{{ $sach->fkTacGia->ten }}</span>
                                        <span class="badge">#{{ $sach->ma_sach }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @if ($sach_moi->count() > 0)
            <section class="latest-podcast-section section-padding pb-5" id="section_2">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-12">
                            <div class="section-title-wrap mb-5">
                                <h4 class="section-title">Sách mới hàng tuần</h4>
                            </div>
                        </div>
                        @foreach ($sach_moi as $key => $item)
                            <div class="col-lg-6 col-12 mb-4 mb-lg-0 {{ $key >= 2 ? 'mt-4' : '' }}">
                                <div class="custom-block d-flex">
                                    <div>
                                        <div class="custom-block-icon-wrap">
                                            <div class="section-overlay"></div>
                                            <a href="{{ route('thong-tin-sach', ['id' => $item->id]) }}"
                                                class="custom-block-image-wrap">
                                                @if ($item->hinh_anh != '')
                                                    <img src="../img/books/{{ $item->hinh_anh }}"
                                                        class="custom-block-image img-fluid" />
                                                @else
                                                    <img src="../img/default/no_book.jpg"
                                                        class="custom-block-image img-fluid border" />
                                                @endif
                                            </a>
                                        </div>
                                        <div class="mt-2">
                                            @include('client.element.muon_sach_btn', [
                                                'sach' => $item,
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
                                            <img src="../img/default/author.png"
                                                class="profile-block-image img-fluid" />
                                            <p>
                                                Tác giả
                                                <strong>
                                                    <a href="{{ route('sach-theo-chu-de', ['dieu_kien' => 2, 'tac_gia' => $item->tac_gia_id]) }}"
                                                        class="author">{{ $item->fkTacGia->ten }}</a>
                                                </strong>
                                            </p>
                                        </div>
                                        @include('client.element.interact_bar', ['sach' => $item])
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-lg-4 col-12 mx-auto">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination pagination-lg justify-content-center mt-5">
                                    <h4>
                                        <a href="{{ route('sach-theo-chu-de', ['dieu_kien' => 1]) }}"
                                            onMouseOver="this.style.textDecoration='underline'"
                                            onMouseOut="this.style.textDecoration='none'" href="">Xem tất
                                            cả</a>
                                    </h4>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        <section
            class="topics-section section-padding {{ $xu_huong->count() > 0 ? 'pb-5' : '' }} {{ $sach_moi->count() > 0 ? 'pt-0' : '' }}"
            id="section_3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">Thể loại</h4>
                        </div>
                    </div>
                    @foreach ($the_loai as $key => $item)
                        <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0 {{ $key > 3 ? 'mt-3' : '' }}">
                            <div class="custom-block custom-block-overlay">
                                <a href="{{ route('sach-theo-chu-de', ['dieu_kien' => 3, 'the_loai' => $item->the_loai_id]) }}"
                                    class="custom-block-image-wrap">
                                    @if ($item->the_loai_id == 1)
                                        <img src="../img/default/bia_sach_giao_khoa.jpg"
                                            class="custom-block-image img-fluid" />
                                    @endif
                                    @if ($item->the_loai_id == 2)
                                        <img src="../img/default/bia_tham_khao.jpg"
                                            class="custom-block-image img-fluid" />
                                    @endif
                                    @if ($item->the_loai_id == 3)
                                        <img src="../img/default/bia_phat_trien.jpg"
                                            class="custom-block-image img-fluid" />
                                    @endif
                                    @if ($item->the_loai_id == 4)
                                        <img src="../img/default/bia_tap_chi.jpg"
                                            class="custom-block-image img-fluid" />
                                    @endif
                                    @if ($item->the_loai_id == 5)
                                        <img src="../img/default/bia_khoa_hoc.jpg"
                                            class="custom-block-image img-fluid" />
                                    @endif
                                    @if ($item->the_loai_id == 6)
                                        <img src="../img/default/bia_van_hoc.jpg"
                                            class="custom-block-image img-fluid" />
                                    @endif
                                </a>
                                <div class="custom-block-info custom-block-overlay-info">
                                    <h5 class="mb-1">
                                        <a
                                            href="{{ route('sach-theo-chu-de', ['dieu_kien' => 3, 'the_loai' => $item->the_loai_id]) }}">
                                            {{ $item->fkTheLoai->ten }}
                                        </a>
                                    </h5>
                                    <p class="badge mb-0">
                                        {{ $item->total }} đầu sách
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        @if ($xu_huong->count() > 0)
            <section class="trending-podcast-section section-padding pt-0">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="section-title-wrap mb-5">
                                <h4 class="section-title">
                                    Tháng này mọi người đọc gì?
                                </h4>
                            </div>
                        </div>

                        @foreach ($xu_huong as $key => $item)
                            <div class="col-lg-4 col-12 mb-4 mb-lg-0 {{ $key > 2 ? 'mt-4' : '' }}">
                                <div class="custom-block custom-block-full">
                                    <div class="custom-block-image-wrap">
                                        <a href="{{ route('thong-tin-sach', ['id' => $item->fkSach->id]) }}">
                                            @if ($item->fkSach->hinh_anh != '')
                                                <img src="../img/books/{{ $item->fkSach->hinh_anh }}"
                                                    class="custom-block-image img-fluid" />
                                            @else
                                                <img src="../img/default/no_book.jpg"
                                                    class="custom-block-image img-fluid border" />
                                            @endif
                                        </a>
                                    </div>
                                    <div class="social-share d-flex flex-column ms-auto">
                                        <div class="badge ms-auto">
                                            Top {{ ++$key }}
                                        </div>
                                    </div>
                                    <div class="custom-block-info">
                                        <h5 class="mb-2">
                                            <a style="width:13em; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden;"
                                                href="{{ route('thong-tin-sach', ['id' => $item->fkSach->id]) }}">
                                                {{ $item->fkSach->ten }}</a>
                                        </h5>
                                        <div class="profile-block d-flex">
                                            <img src="../img/default/author.png"
                                                class="profile-block-image img-fluid" />
                                            <p>
                                                Tác giả
                                                <strong>
                                                    <a href="{{ route('sach-theo-chu-de', ['dieu_kien' => 2, 'tac_gia' => $item->fkSach->tac_gia_id]) }}"
                                                        class="author">{{ $item->fkSach->fkTacGia->ten }}</a>
                                                </strong>
                                            </p>
                                        </div>
                                        @include('client.element.interact_bar', [
                                            'sach' => $item->fkSach,
                                        ])
                                    </div>
                                </div>
                            </div>
                            @if ($key == 3)
                            @break
                        @endif
                    @endforeach
                    @if ($xu_huong->count() > 3)
                        <div class="col-lg-4 col-12 mx-auto">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination pagination-lg justify-content-center mt-5">
                                    <h4>
                                        <a href="{{ route('thang-nay-doc-gi') }}"
                                            onMouseOver="this.style.textDecoration='underline'"
                                            onMouseOut="this.style.textDecoration='none'" href="">
                                            Xem tất cả</a>
                                    </h4>
                                </ul>
                            </nav>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif
</main>

@include('client.element.footer')

<!-- JAVASCRIPT FILES -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/custom.js"></script>

<script>
    function handleGioSach(sach) {
        var option = document.getElementById('sach_' + sach).innerHTML;
        var request = new XMLHttpRequest();
        request.open('GET', '/xu-ly-gio-sach?sach=' + encodeURIComponent(sach) + '&gio_sach=' + encodeURIComponent(
            option), true);
        request.send();
        if (option == 'Chọn sách') {
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
                    document.getElementById('sach_' + sach).innerHTML = 'Chọn sách';
                    document.getElementById('sach_' + sach).classList.add('custom-btn');
                    document.getElementById('sach_' + sach).classList.remove('danger-btn');
                    document.getElementById('gio_sach_hien_tai').value = --document.getElementById(
                        'gio_sach_hien_tai').value;
                    document.getElementById('gio_sach').innerHTML = 'Giỏ sách (' + document.getElementById(
                        'gio_sach_hien_tai').value + ')';
                }
            }
        }
    }
</script>
</body>

</html>
