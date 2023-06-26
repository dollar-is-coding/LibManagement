<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="description" content="" />
    <meta name="author" content="" />

    <title id="title">Libro - Giỏ sách ({{ $gio_sach->count() }})</title>

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
                        <h2 class="mb-0" id="gio_sach_title">GIỎ SÁCH ({{ $gio_sach->count() }})</h2>
                    </div>
                </div>
            </div>
        </header>

        <section class="latest-podcast-section section-padding pt-2" id="section_2">
            <input type="text" id="input_gio_sach" value="{{ $gio_sach->count() }}" hidden>
            <div class="container">
                @if ($gio_sach->count() > 0)
                    <form action="{{ route('muon-sach') }}" class="row justify-content-center" id="muon_sach"
                        style="position: relative;" method="POST">
                        @csrf
                        <div style="font-family: 'Sono'">
                            <div class="d-flex justify-content-between shadow-sm border"
                                style="padding:20px 30px 20px 30px; border-radius:30px">
                                <div style="width:55%" class="d-flex align-items-center">
                                    <input style="width:1em;height:1em" type="checkbox" id="all-checked" name="all">
                                    <p class="m-0"><strong>&nbsp;Sách</strong></p>
                                </div>
                                <div style="width:10%" class="d-flex justify-content-center">
                                    <p class="m-0"><strong>Số lượng</strong></p>
                                </div>
                                <div style="width:10%" class="d-flex justify-content-center">
                                    <p class="m-0"><strong>Trạng thái</strong></p>
                                </div>
                                <div style="width:15%" class="d-flex justify-content-center">
                                    <p class="m-0"><strong>Chức năng</strong></p>
                                </div>
                            </div>
                        </div>
                        <input type="number" value="{{ 5 - $phieu_muon->count() }}" id="can-borrow" hidden>
                        <input type="number" value="0" id="checked-count" hidden>
                        @foreach ($gio_sach as $key => $sach)
                            <div class="mt-4" style="font-family: 'sono'" id="sach_{{ $sach->sach_id }}">
                                <div class="custom-block">
                                    <div class="d-flex align-items-center">
                                        <input style="width:1em;height:1em" type="checkbox" class="checkbox"
                                            name="{{ $sach->sach_id }}">
                                        <h6 class="m-0">&nbsp;{{ $sach->fkSach->ten }}</h6>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex" style="width:55%">
                                            <div class="custom-block-icon-wrap">
                                                <div class="section-overlay"></div>
                                                <a class="custom-block-image-wrap">
                                                    @if ($sach->fkSach->hinh_anh != '')
                                                        <img src="../img/books/{{ $sach->fkSach->hinh_anh }}"
                                                            class="custom-block-image img-fluid" alt="" />
                                                    @else
                                                        <img src="../img/default/no_book.jpg"
                                                            class="custom-block-image img-fluid border"
                                                            alt="" />
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="custom-block-info d-flex flex-column justify-content-between">
                                                <div><strong>
                                                        #{{ $sach->fkSach->ma_sach }} -
                                                        {{ $sach->fkSach->fkTacGia->ten }}
                                                    </strong></div>
                                                <div class="d-flex">
                                                    <p class="m-0">Thể loại:&nbsp;</p>
                                                    <div>{{ $sach->fkSach->fkTheLoai->ten }}</div>
                                                </div>
                                                <div class="d-flex">
                                                    <p class="m-0">Năm xuất bản:&nbsp;</p>
                                                    <div>{{ $sach->fkSach->nam_xuat_ban }}</div>
                                                </div>
                                                <div class="d-flex">
                                                    <p class="m-0">Nhà xuất bản:&nbsp;</p>
                                                    <div>{{ $sach->fkSach->fkNhaXuatBan->ten }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center align-items-center" style="width:10%">
                                            <div>x1</div>
                                        </div>
                                        <div class="d-flex justify-content-center align-items-center" style="width:10%">
                                            <div>
                                                {{ $sach->fkSach->hasThuVien->sl_con_lai > 0 ? 'Có sẵn' : 'Đang hết' }}
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column justify-content-evenly align-items-center"
                                            style="width:15%">
                                            <div>
                                                <a onclick="removeGioSach({{ $sach->sach_id }})"
                                                    class="btn danger-btn">Bỏ chọn</a>
                                            </div>
                                            <div>
                                                <a href="{{ route('thong-tin-sach', ['id' => $sach->sach_id]) }}"
                                                    class="btn custom-btn">Xem thông tin</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="mt-5 d-flex" style="font-family:'Sono'; position: sticky; bottom: 0;">
                            <div class="d-flex justify-content-end border flex-grow-1 bg-white shadow"
                                style="padding:20px 30px 20px 30px; border-radius:30px">
                                <div class="d-flex justify-content-center" style="margin-left: 5em">
                                    <p class="m-0">Sách được chọn:&nbsp;</p>
                                    <div id="so_luong">0 quyển</div>
                                </div>
                            </div>
                            <div class="m-3"></div>
                            <div class="d-inline-flex justify-content-center">
                                <button id="gio-sach-btn" style="pointer-events: none" type="submit"
                                    class="shadow pagination pagination-lg btn custom-btn">
                                    Vui lòng chọn sách
                                </button>
                            </div>
                            <div class="m-1"></div>
                        </div>
                    </form>
                @else
                    <div class="d-flex justify-content-center">
                        <h6>Không có quyển sách nào trong giỏ!</h6>
                    </div>
                @endif
                <div class="d-flex justify-content-center" id="no_muon" style="visibility: hidden;height: 0">
                    <h6>Không có quyển sách nào trong giỏ!</h6>
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
        var checkAllBoxes = document.getElementById('all-checked');
        var checkBoxes = document.getElementsByClassName('checkbox');
        var checkedShow = document.getElementById('so_luong');
        var canBorrow = document.getElementById('can-borrow');
        var checkedCount = document.getElementById('checked-count');
        var button = document.getElementById('gio-sach-btn');
        checkAllBoxes.addEventListener('change', function() {
            var isChecked = checkAllBoxes.checked;
            for (let i = 0; i < checkBoxes.length; i++) {
                checkBoxes[i].checked = isChecked;
            }
            checkedCount.value = isChecked ? checkBoxes.length : 0;
            checkedShow.innerHTML = Number(checkedCount.value) + ' quyển';
            handleButton()
        });
        for (let i = 0; i < checkBoxes.length; i++) {
            checkBoxes[i].addEventListener('change', function() {
                if (checkBoxes[i].checked) {
                    checkedCount.value++;
                } else {
                    checkedCount.value--;
                }
                checkedShow.innerHTML = Number(checkedCount.value) + ' quyển';
                checkAllBoxes.checked = (Number(checkedCount.value) == checkBoxes.length)
                handleButton()
            });
        }

        function handleButton() {
            if (Number(checkedCount.value) > Number(canBorrow.value)) {
                button.innerHTML = 'Vượt quá số lượng'
            } else if (Number(checkedCount.value) <= Number(canBorrow.value) && Number(checkedCount.value) > 0) {
                button.innerHTML = 'Xác nhận mượn sách'
                button.style.pointerEvents = 'fill';
            } else {
                button.innerHTML = 'Vui lòng chọn sách'
            }
        }

        function removeGioSach(sach) {
            var request = new XMLHttpRequest();
            request.open('GET', '/loai-khoi-gio-sach?id=' + encodeURIComponent(sach), true);
            request.send();
            request.onreadystatechange = function() {
                var data = JSON.parse(request.responseText);
                if (request.readyState == 4 && request.status == 200 && data.message == 'success') {
                    document.getElementById('sach_' + sach).style.display = 'none';
                    document.getElementById('input_gio_sach').value = --document.getElementById('input_gio_sach').value;
                    document.getElementById('gio_sach_title').innerHTML = 'GIỎ SÁCH (' + document.getElementById(
                        'input_gio_sach').value + ')';
                    document.getElementById('title').innerHTML = 'Libro - Giỏ sách (' + document.getElementById(
                        'input_gio_sach').value + ')';
                    document.getElementById('gio_sach').innerHTML = 'Giỏ sách (' + document.getElementById(
                        'input_gio_sach').value + ')';
                    if (document.getElementById('input_gio_sach').value == 0) {
                        document.getElementById('muon_sach').style.display = 'none';
                        document.getElementById('no_muon').style.visibility = 'visible';
                    }
                }
            }
        }
    </script>
</body>

</html>
