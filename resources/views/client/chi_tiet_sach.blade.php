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
        @include('client.header', ['view' => 0])

        <header class="site-header d-flex flex-column justify-content-center align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 text-center">
                        <h2 class="mb-0">Chi tiết</h2>
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
                                                class="custom-block-image img-fluid" alt="" />
                                        @else
                                            <img src="../img/default/no_book.jpg"
                                                class="custom-block-image img-fluid border" alt="" />
                                        @endif
                                    </div>
                                </div>
                                <div class="custom-block-bottom d-flex justify-content-between"
                                    style="margin: 16px 8px">
                                    <a class="bi-eye">
                                        <span>{{ $sach->luot_xem }}</span>
                                    </a>
                                    @foreach ($sach->hasYeuThich as $key => $lich_su)
                                        @if ($lich_su->da_thich == 1 && $lich_su->doc_gia_id == Auth::user()->id)
                                            <a href="{{ route('yeu-thich', ['sach' => $sach->id]) }}"
                                                class="bi-heart-fill">
                                                <span>{{ $sach->luot_thich }}</span>
                                            </a>
                                        @break
                                    @endif
                                    @if ($sach->hasYeuThich->count() - 1 == $key)
                                        <a href="{{ route('yeu-thich', ['sach' => $sach->id]) }}" class="bi-heart">
                                            <span>{{ $sach->luot_thich }}</span>
                                        </a>
                                    @endif
                                @endforeach
                                @if ($sach->hasYeuThich->count() == 0)
                                    <a href="{{ route('yeu-thich', ['sach' => $sach->id]) }}" class="bi-heart">
                                        <span>{{ $sach->luot_thich }}</span>
                                    </a>
                                @endif
                                <a href="#" class="bi-chat">
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
                                    @foreach ($sach->hasGioSach as $key => $detail)
                                        @if ($detail->doc_gia_id == Auth::user()->id)
                                            <a href="{{ route('loai-khoi-gio-sach', ['id' => $sach->id]) }}"
                                                class="bi-cart-dash btn danger-btn smoothscroll align-self-end">
                                                Bỏ chọn</a>
                                        @break
                                    @endif
                                    @if ($sach->hasGioSach->count() - 1 == $key)
                                        <a href="{{ route('them-sach-vao-gio', ['sach' => $sach->id]) }}"
                                            class="bi-cart-plus btn comment-btn smoothscroll align-self-end">
                                            Chọn sách</a>
                                    @endif
                                @endforeach
                                @if ($sach->hasGioSach->count() == 0)
                                    <a href="{{ route('them-sach-vao-gio', ['sach' => $sach->id]) }}"
                                        class="bi-cart-plus btn comment-btn smoothscroll align-self-end">
                                        Chọn sách</a>
                                @endif
                            </h2>
                            <h6>Mô tả</h6>
                            <p>{{ $sach->mo_ta }} Lorem ipsum dolor, sit amet consectetur adipisicing
                                elit.
                                Corporis eum dignissimos consequatur maxime qui recusandae ipsum. Hic
                                aliquid
                                culpa consequatur, in eius nobis non sequi est, pariatur harum corporis
                                cumque.
                            </p>
                            <p>{{ $sach->mo_ta }} Lorem ipsum dolor, sit amet consectetur adipisicing
                                elit.
                                Corporis eum dignissimos consequatur maxime qui recusandae ipsum. Hic
                                aliquid
                                culpa consequatur, in eius nobis non sequi est, pariatur harum corporis
                                cumque.
                            </p>
                            <p>{{ $sach->mo_ta }} Lorem ipsum dolor, sit amet consectetur adipisicing
                                elit.
                                Corporis eum dignissimos consequatur maxime qui recusandae ipsum. Hic
                                aliquid
                                culpa consequatur, in eius nobis non sequi est, pariatur harum corporis
                                cumque.
                            </p>
                            <p>{{ $sach->mo_ta }} Lorem ipsum dolor, sit amet consectetur adipisicing
                                elit.
                                Corporis eum dignissimos consequatur maxime qui recusandae ipsum. Hic
                                aliquid
                                culpa consequatur, in eius nobis non sequi est, pariatur harum corporis
                                cumque.
                            </p>
                            <form action="{{ route('binh-luan', ['sach' => $sach->id]) }}" method="POST"
                                class="d-flex flex-column" style="font-size: .9em">
                                @csrf
                                <div class="d-flex">
                                    <img src="../img/default/author.png" class="profile-block-image img-fluid"
                                        style="width:44px;height:44px">
                                    <div class="comment-container">
                                        <textarea id="comment-input" name="binh_luan" rows="1" placeholder="Suy nghĩ về cuốn sách này..."></textarea>
                                    </div>
                                </div>
                                <button class="btn comment-btn smoothscroll align-self-end"
                                    style="font-size: .9em" type="submit">
                                    Bình luận</button>
                            </form>
                            @foreach ($binh_luan as $key => $item)
                                <div class="d-flex mt-3" style="font-size: .9em">
                                    <img src="../img/default/author.png" class="profile-block-image img-fluid"
                                        style="width:44px;height:44px">
                                    <div style="width:100%">
                                        <div class="comment-block">
                                            <div class="d-flex">
                                                <div><strong>
                                                        {{ $item->fkNguoiDung->ho }}
                                                        {{ $item->fkNguoiDung->ten }}
                                                        &nbsp;
                                                    </strong></div>
                                            </div>
                                            <div>{{ $item->noi_dung }}</div>
                                        </div>
                                        <div class="d-flex align-items-center mt-1" style="margin-left:10px;">
                                            <a class="bi-chat custom-icon" style="color: #717275"
                                                onclick="reply({{ $key }})">
                                                <span>&nbsp;{{ $item->hasReply->count() }}</span>
                                            </a>
                                            <div class="bi-dot"
                                                style="margin-left: 4px; margin-right: 4px; color:#717275">
                                            </div>
                                            <a style="color:#717275">
                                                @if (Carbon\Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y') == $item->updated_at->format('d/m/Y'))
                                                    Hôm nay
                                                @else
                                                    {{ Carbon\Carbon::now('Asia/Ho_Chi_Minh')->startOfDay()->diffIndays($item->updated_at->startOfDay()) }}
                                                    ngày trước
                                                @endif
                                            </a>
                                        </div>
                                        @foreach ($item->hasReply as $reply)
                                            <div class="d-flex mt-3">
                                                <img src="../img/default/author.png"
                                                    class="profile-block-image img-fluid"
                                                    style="width:44px;height:44px">
                                                <div style="width:100%">
                                                    <div class="comment-block">
                                                        <div class="d-flex">
                                                            <div><strong>
                                                                    {{ $reply->fkNguoiDung->ho }}
                                                                    {{ $reply->fkNguoiDung->ten }}
                                                                </strong></div>
                                                            <div class="bi-dot"
                                                                style="margin-left: 4px; margin-right: 4px; color:#717275">
                                                            </div>
                                                            <a style="color:#717275">
                                                                @if (Carbon\Carbon::now('Asia/Ho_Chi_Minh')->format('Y/m/d') == $reply->updated_at->format('Y/m/d'))
                                                                    Hôm nay
                                                                @else
                                                                    {{ Carbon\Carbon::now('Asia/Ho_Chi_Minh')->startOfDay()->diffIndays($reply->updated_at->startOfDay()) }}
                                                                    ngày trước
                                                                @endif
                                                            </a>
                                                        </div>
                                                        <div>{{ $reply->noi_dung }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        @if (Auth::id() != null)
                                            <form
                                                action="{{ route('binh-luan', ['tra_loi' => $item->id, 'sach' => $sach->id]) }}"
                                                method="POST" id="{{ $key }}"
                                                style="visibility:hidden;max-height:0;"
                                                class="d-flex flex-column">
                                                @csrf
                                                <div class="d-flex">
                                                    <img src="../img/default/author.png"
                                                        class="profile-block-image img-fluid"
                                                        style="width:44px;height:44px">
                                                    <div class="comment-container">
                                                        <textarea id="comment-input" name="binh_luan" rows="1" placeholder="Phản hồi..."></textarea>
                                                    </div>
                                                </div>
                                                <button class="btn comment-btn smoothscroll align-self-end"
                                                    style="font-size: .9em" type="submit">
                                                    Phản hồi</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@if ($cung_tac_gia)
    <section class="related-podcast-section section-padding pt-0 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="section-title-wrap mb-5">
                        <h4 class="section-title">Cùng tác giả</h4>
                    </div>
                </div>
                @foreach ($cung_tac_gia as $key => $item)
                    <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                        <div class="custom-block custom-block-full">
                            <div class="custom-block-image-wrap">
                                <a href="detail-page.html">
                                    @if ($sach->hinh_anh != '')
                                        <img src="../img/books/{{ $sach->hinh_anh }}"
                                            class="custom-block-image img-fluid" alt="" />
                                    @else
                                        <img src="../img/default/no_book.jpg"
                                            class="custom-block-image img-fluid border" alt="" />
                                    @endif
                                </a>
                            </div>
                            <div class="custom-block-info">
                                <h5 class="mb-2">
                                    <a href="detail-page.html">{{ $item->ten }}</a>
                                </h5>
                                <div class="profile-block d-flex">
                                    <img src="../img/default/author.png" class="profile-block-image img-fluid"
                                        alt="" />
                                    <p>
                                        Tác giả
                                        <strong>{{ $item->fkTacGia->ten }}</strong>
                                    </p>
                                </div>
                                <div class="custom-block-bottom d-flex justify-content-between">
                                    <a href="#" class="bi-eye me-1">
                                        <span>{{ $item->luot_xem }}</span>
                                    </a>
                                    <a href="#" class="bi-heart me-1">
                                        <span>{{ $item->luot_thich }}</span>
                                    </a>
                                    <a href="#" class="bi-chat me-1">
                                        <span>{{ $item->luot_binh_luan }}</span>
                                    </a>
                                </div>
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
                                <a href="{{ route('tim-kiem-tac-gia', ['tac_gia' => $sach->tac_gia_id]) }}"
                                    onMouseOver="this.style.textDecoration='underline'"
                                    onMouseOut="this.style.textDecoration='none'" href="">Xem tất
                                    cả</a>
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
            <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                <div class="custom-block custom-block-full">
                    <div class="custom-block-image-wrap">
                        <a href="detail-page.html">
                            <img src="images/podcast/27376480_7326766.jpg"
                                class="custom-block-image img-fluid" alt="" />
                        </a>
                    </div>
                    <div class="custom-block-info">
                        <h5 class="mb-2">
                            <a href="detail-page.html"> Vintage Show </a>
                        </h5>
                        <div class="profile-block d-flex">
                            <img src="images/profile/woman-posing-black-dress-medium-shot.jpg"
                                class="profile-block-image img-fluid" alt="" />
                            <p>
                                Elsa
                                <strong>Influencer</strong>
                            </p>
                        </div>
                        <div class="custom-block-bottom d-flex justify-content-between">
                            <a href="#" class="bi-headphones me-1">
                                <span>100k</span>
                            </a>
                            <a href="#" class="bi-heart me-1">
                                <span>2.5k</span>
                            </a>
                            <a href="#" class="bi-chat me-1">
                                <span>924k</span>
                            </a>
                        </div>
                    </div>
                    <div class="social-share d-flex flex-column ms-auto">
                        <a href="#" class="badge ms-auto">
                            <i class="bi-heart"></i>
                        </a>
                        <a href="#" class="badge ms-auto">
                            <i class="bi-bookmark"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@if ($ds_da_xem)
<section class="related-podcast-section section-padding pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="section-title-wrap mb-5">
                    <h4 class="section-title">Đã xem gần đây</h4>
                </div>
            </div>
            @foreach ($ds_da_xem as $key => $item)
                <div class="col-lg-4 col-12 mb-4 mb-lg-0 {{ $key > 2 ? 'mt-4' : '' }} ">
                    <div class="custom-block custom-block-full">
                        <div class="custom-block-image-wrap">
                            <a href="detail-page.html">
                                @if ($item->fkSach->hinh_anh != '')
                                    <img src="../img/books/{{ $sach->fkSach->hinh_anh }}"
                                        class="custom-block-image img-fluid" alt="" />
                                @else
                                    <img src="../img/default/no_book.jpg"
                                        class="custom-block-image img-fluid border" alt="" />
                                @endif
                            </a>
                        </div>
                        <div class="custom-block-info">
                            <h5 class="mb-2">
                                <a href="detail-page.html">{{ $item->fkSach->ten }}</a>
                            </h5>
                            <div class="profile-block d-flex">
                                <img src="../img/default/author.png" class="profile-block-image img-fluid"
                                    alt="" />
                                <p>
                                    Tác giả
                                    <strong>{{ $item->fkSach->fkTacGia->ten }}</strong>
                                </p>
                            </div>
                            <div class="custom-block-bottom d-flex justify-content-between">
                                <a href="#" class="bi-eye me-1">
                                    <span>{{ $item->fkSach->luot_xem }}</span>
                                </a>
                                <a href="#" class="bi-heart me-1">
                                    <span>{{ $item->fkSach->luot_thich }}</span>
                                </a>
                                <a href="#" class="bi-chat me-1">
                                    <span>{{ $item->fkSach->luot_binh_luan }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
</main>

<footer class="site-footer">
<div class="container">
<div class="row">
    <div class="col-lg-6 col-12 mb-5 mb-lg-0">
        <div class="subscribe-form-wrap">
            <h6>Subscribe. Every weekly.</h6>

            <form class="custom-form subscribe-form" action="#" method="get" role="form">
                <input type="email" name="subscribe-email" id="subscribe-email"
                    pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email Address"
                    required="" />

                <div class="col-lg-12 col-12">
                    <button type="submit" class="form-control" id="submit">
                        Subscribe
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-12 mb-4 mb-md-0 mb-lg-0">
        <h6 class="site-footer-title mb-3">Contact</h6>

        <p class="mb-2">
            <strong class="d-inline me-2">Phone:</strong> 010-020-0340
        </p>

        <p>
            <strong class="d-inline me-2">Email:</strong>
            <a href="#">inquiry@pod.co</a>
        </p>
    </div>

    <div class="col-lg-3 col-md-6 col-12">
        <h6 class="site-footer-title mb-3">Download Mobile</h6>

        <div class="site-footer-thumb mb-4 pb-2">
            <div class="d-flex flex-wrap">
                <a href="#">
                    <img src="images/app-store.png" class="me-3 mb-2 mb-lg-0 img-fluid" alt="" />
                </a>

                <a href="#">
                    <img src="images/play-store.png" class="img-fluid" alt="" />
                </a>
            </div>
        </div>

        <h6 class="site-footer-title mb-3">Social</h6>

        <ul class="social-icon">
            <li class="social-icon-item">
                <a href="#" class="social-icon-link bi-instagram"></a>
            </li>

            <li class="social-icon-item">
                <a href="#" class="social-icon-link bi-twitter"></a>
            </li>

            <li class="social-icon-item">
                <a href="#" class="social-icon-link bi-whatsapp"></a>
            </li>
        </ul>
    </div>
</div>
</div>

<div class="container pt-5">
<div class="row align-items-center">
    <div class="col-lg-2 col-md-3 col-12">
        <a class="navbar-brand" href="index.html">
            <img src="images/pod-talk-logo.png" class="logo-image img-fluid" alt="templatemo pod talk" />
        </a>
    </div>

    <div class="col-lg-7 col-md-9 col-12">
        <ul class="site-footer-links">
            <li class="site-footer-link-item">
                <a href="#" class="site-footer-link">Homepage</a>
            </li>

            <li class="site-footer-link-item">
                <a href="#" class="site-footer-link">Browse episodes</a>
            </li>

            <li class="site-footer-link-item">
                <a href="#" class="site-footer-link">Help Center</a>
            </li>

            <li class="site-footer-link-item">
                <a href="#" class="site-footer-link">Contact Us</a>
            </li>
        </ul>
    </div>

    <div class="col-lg-3 col-12">
        <p class="copyright-text mb-0">
            Copyright © 2036 Talk Pod Company <br /><br />
            Design:
            <a rel="nofollow" href="https://templatemo.com/page/1" target="_parent">TemplateMo</a>
        </p>
        Distribution:
        <a rel="nofollow" href="https://themewagon.com" target="_blank">ThemeWagon</a>
    </div>
</div>
</div>
</footer>

<!-- JAVASCRIPT FILES -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/custom.js"></script>
<script>
    const commentInput = document.getElementById('comment-input');

    commentInput.addEventListener('input', function() {
        this.style.height = 'auto';
        this.style.height = this.scrollHeight + 'px';
    });
</script>
<script>
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
</script>
</body>

</html>
