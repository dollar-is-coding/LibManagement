<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Pod Talk Free CSS Template by TemplateMo</title>

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
    <!--Template Mo 584 Pod Talk https://templatemo.com/tm-584-pod-talk -->
</head>

<body>
    <main>
        @include('client.element.header', ['view' => 0])

        <header class="site-header d-flex flex-column justify-content-center align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 text-center">
                        <h2 class="mb-0">THÔNG TIN SÁCH</h2>
                    </div>
                </div>
            </div>
        </header>

        <section class="latest-podcast-section section-padding pt-2 pb-5" id="section_2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-12">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">{{ $sach->fkTheLoai->ten }}</h4>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-12">
                                <div class="custom-block-icon-wrap">
                                    <div class="custom-block-image-wrap custom-block-image-detail-page">
                                        @if ($sach->hinh_anh != '')
                                            <img src="../img/books/{{ $sach->hinh_anh }}"
                                                class="custom-block-image img-fluid" />
                                        @else
                                            <img src="../img/default/no_book.jpg"
                                                class="custom-block-image img-fluid border" />
                                        @endif
                                    </div>
                                </div>
                                <div class="custom-block-bottom d-flex justify-content-between"
                                    style="margin: 16px 8px">
                                    <a class="bi-eye">
                                        <span>{{ $sach->luot_xem }}</span>
                                    </a>
                                    @include('client.element.love_btn', [
                                        'yeu_thich' => $sach->hasYeuThich,
                                    ])
                                    <a class="bi-chat">
                                        <span>{{ $sach->luot_binh_luan }}</span>
                                    </a>
                                </div>
                                <div class="sach-info">
                                    <ul class="first">
                                        <li>Vị trí</li>
                                        <li>Có sẵn</li>
                                        <li>Đang mượn</li>
                                        <li>Đã mượn</li>
                                    </ul>
                                    <ul class="second">
                                        <li>
                                            {{ $sach->hasThuVien->fkTuSach->ten }},
                                            {{ $sach->hasThuVien->fkTuSach->ten }}
                                        </li>
                                        <li class="li">{{ $sach->hasThuVien->sl_con_lai }} quyển</li>
                                        <li>{{ $sach->hasThuVien->dang_muon }} quyển</li>
                                        <li class="li">{{ $sach->hasThuVien->da_muon }} lần</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-9 col-12">
                                <div class="custom-block-info">
                                    <div class="custom-block-top d-flex mb-1">
                                        <small class="" style="width:100%">Mã sách
                                            <span class="badge">#{{ $sach->ma_sach }}</span>
                                        </small>
                                        <div style="white-space: nowrap;">
                                            <small class="me-4">
                                                <i class="bi-clock-fill custom-icon"></i>
                                                {{ $sach->nam_xuat_ban }}
                                            </small>
                                            <small class="me-4">
                                                <i class="bi-person-circle custom-icon"></i>
                                                {{ $sach->fkTacGia->ten }}
                                            </small>
                                            <small>
                                                <i class="bi-printer-fill custom-icon"></i>
                                                {{ $sach->fkNhaXuatBan->ten }}
                                            </small>
                                        </div>
                                    </div>
                                    <h2 class="mb-2">{{ $sach->ten }}
                                        @include('client.element.muon_sach_btn', [
                                            'sach' => $sach,
                                            'btn' => 1,
                                        ])
                                    </h2>
                                    <h6>Mô tả</h6>
                                    <p>{{ $sach->mo_ta }}</p>
                                    @include('client.element.comment_box', ['binh_luan' => $binh_luan])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @if ($cung_tac_gia->count() > 1)
            <section class="related-podcast-section section-padding pt-0 pb-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="section-title-wrap mb-5">
                                <h4 class="section-title" id="scroll-here">Cùng tác giả</h4>
                            </div>
                        </div>
                        @foreach ($cung_tac_gia as $key => $item)
                            <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                                <div class="custom-block custom-block-full">
                                    <div class="custom-block-image-wrap">
                                        <a href="{{ route('thong-tin-sach', ['id' => $sach->id]) }}">
                                            @if ($sach->hinh_anh != '')
                                                <img src="../img/books/{{ $sach->hinh_anh }}"
                                                    class="custom-block-image img-fluid" />
                                            @else
                                                <img src="../img/default/no_book.jpg"
                                                    class="custom-block-image img-fluid border" />
                                            @endif
                                        </a>
                                    </div>
                                    <div class="custom-block-info">
                                        <h5 class="mb-2">
                                            <a href="{{ route('thong-tin-sach', ['id' => $sach->id]) }}">
                                                {{ $item->ten }}</a>
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
                            @if ($key == 2)
                            @break
                        @endif
                    @endforeach
                    @if ($cung_tac_gia->count() > 3)
                        <div class="col-lg-4 col-12 mx-auto">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination pagination-lg justify-content-center mt-5">
                                    <h4>
                                        <a href="" onMouseOver="this.style.textDecoration='underline'"
                                            onMouseOut="this.style.textDecoration='none'">
                                            Xem tất cả</a>
                                    </h4>
                                </ul>
                            </nav>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @else
        <section class="related-podcast-section section-padding pt-0 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">Liên quan</h4>
                        </div>
                    </div>
                    @foreach ($lien_quan as $key => $item)
                        <div class="col-lg-4 col-12 mb-4 mb-lg-0 {{ $key > 2 ? 'mt-4' : '' }} ">
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
                                <div class="custom-block-info">
                                    <h5 class="mb-2">
                                        <a href="{{ route('thong-tin-sach', ['id' => $item->fkSach->id]) }}">
                                            {{ $item->fkSach->ten }}</a>
                                    </h5>
                                    <div class="profile-block d-flex">
                                        <img src="../img/default/author.png"
                                            class="profile-block-image img-fluid" />
                                        <p>
                                            Tác giả
                                            <strong><a
                                                    href="{{ route('sach-theo-chu-de', ['dieu_kien' => 2, 'tac_gia' => $item->fkSach->tac_gia_id]) }}">
                                                    {{ $item->fkSach->fkTacGia->ten }}</a></strong>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    @if ($ds_da_xem)
        @include('client.element.history', ['ds_da_xem' => $ds_da_xem])
    @endif
</main>

@include('client.element.footer')

<!-- JAVASCRIPT FILES -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/custom.js"></script>
<script>
    var commentInput = document.getElementById('comment-input');
    commentInput.addEventListener('input', function() {
        this.style.height = 'auto';
        this.style.height = this.scrollHeight + 'px';
    });

    function showButton() {
        if (commentInput.value.trim() !== '') {
            document.getElementById('binh_luan').style.display = 'block';
        } else {
            document.getElementById('binh_luan').style.display = 'none';
        }
    }

    function showReply(reply) {
        var replyInput = document.getElementById('reply_' + reply);
        if (replyInput.value.trim() !== '') {
            document.getElementById('btn_' + reply).style.display = 'block';
        } else {
            document.getElementById('btn_' + reply).style.display = 'none';
        }
    }

    function reply(id) {
        var x = document.getElementById(id);
        if (document.getElementById(id).style.visibility == "hidden") {
            document.getElementById(id).style.visibility = "visible";
            document.getElementById(id).style.maxHeight = "initial";
            document.getElementById(id).style.marginTop = "10px";
        }
        var array = <?php echo json_encode($binh_luan); ?>;
        for (let index = 0; index < array.length; index++) {
            if (id != index) {
                if (document.getElementById(index).style.visibility != "hidden") {
                    document.getElementById(index).style.visibility = "hidden";
                    document.getElementById(index).style.maxHeight = "0";
                    document.getElementById(index).style.marginTop = "0px";
                }
            }
        }
    }

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

    function handleLike(sach) {
        var like = document.getElementById('like_not_like');
        var loveBtn = document.getElementById('love_btn');
        var luotThich = document.getElementById('luot_thich').innerHTML;
        var request = new XMLHttpRequest();
        request.open('GET', '/yeu-thich?sach=' + encodeURIComponent(sach), true);
        request.send();
        request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200) {
                if (like.value == 1) {
                    loveBtn.classList.add('bi-heart');
                    loveBtn.classList.remove('bi-heart-fill');
                    like.value = 0;
                    document.getElementById('luot_thich').innerHTML = --luotThich;
                } else {
                    loveBtn.classList.add('bi-heart-fill');
                    loveBtn.classList.remove('bi-heart');
                    like.value = 1;
                    document.getElementById('luot_thich').innerHTML = ++luotThich;
                }
            }
        }
        console.log(like.value + ', ' + luotThich);
    }

    window.addEventListener('DOMContentLoaded', function() {
        var urlParams = new URLSearchParams(window.location.search);
        var shouldScroll = urlParams.get('binh_luan');
        var element = document.getElementById('binh_luan_' + shouldScroll).offsetTop;
        element.scrollIntoView({
            behavior: 'smooth',
        });
    });
</script>
</body>

</html>
