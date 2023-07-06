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
    <link rel='shortcut icon' href='/img/LIBRO.png' />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="BootstrapDash">

        @include('/common/link')
</head>

<body>

    @include('../common/header', ['view' => 2])
    <style>
        textarea {
            font-family: 'Montserrat', sans-serif !important;
        }
    </style>
    <div class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40">
        <div class="container">
            <div class="az-content-left az-content-left-components">
                <div class="component-item">
                    @foreach ($sach as $item)
                    <label>{{ $item->fkSach->ten }}</label>
                    <nav class="nav flex-column">
                        <a href="{{ route('chi-tiet-sach', ['id' => $item->sach_id]) }}" class="nav-link">
                            Chi tiết</a>
                        <a href="" class="nav-link active">Chỉnh sửa</a>
                    </nav>
                    @endforeach
                </div><!-- component-item -->
            </div><!-- az-content-left -->
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
            <div class="az-content-body pd-lg-l-40 d-flex flex-column">
                <!-- đây mục trỏ-->
                <div class="az-content-breadcrumb">
                    @foreach ($sach as $item)
                    <span>{{ $item->fkSach->ten }}</span>
                    @endforeach
                    <span>Sửa sách</span>
                </div>
                <div class="border shadow-sm rounded p-4 pr-5 az-signin-header">
                    <form action="{{ route('xu-ly-sua-sach', ['id' => $item->sach_id,'id_tv'=>$item->id]) }}" id="form_them_sach" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group d-flex  align-items-center">
                            <input class="m-0" name="de_xuat" value="{{$item->fkSach->de_xuat}}" style="width: 17px;height: 17px;" {{$item->fkSach->de_xuat == 1 ? 'checked' : ''}} type="checkbox" id="checkDeXuat">
                            <label class="m-0 ml-1" id="changeContext" style="font-size: 17px;user-select: none;" for="checkDeXuat"> {{$item->fkSach->de_xuat == 1 ? 'Đề xuất' : 'Không đề xuất'}}</label>
                            <script>
                                let check = document.getElementById('checkDeXuat');
                                let text = document.getElementById('changeContext');
                                check.onchange = function() {
                                    if (check.checked === true) {
                                        text.innerHTML = 'Đề xuất'
                                    } else {
                                        text.innerHTML = 'Không đề xuất'
                                    }
                                }
                            </script>
                        </div>
                        <div style="display: flex;flex-direction: row-reverse;">
                            <!-- form -->

                            <!-- id sách ẩn -->
                            <input type="hidden" name="id_sach" value="{{ $item->fkSach->id }}">

                            <div style="flex-basis: 70%" class="mb-0">
                                <div class="form-group">
                                    <div class="d-flex justify-content-between">
                                        <label class="m-0">&nbsp;Tên sách</label>
                                        @error('ten_sach')
                                        <div style="font-style: italic;" class="text-danger">
                                            {{ $message }} *&nbsp;
                                        </div>
                                        @enderror
                                    </div>
                                    <input type="text" name="ten_sach" id="ten_sach" class="form-control" placeholder="Nhập tên sách" value="{{ $item->fkSach->ten }}" tabindex="1" autofocus=true>
                                </div>
                                <!-- form-group -->

                                <div class="form-group">
                                    <label class="m-0">&nbsp;Tác giả</label>
                                    <select name="tac_gia" class="form-control select2-no-search" tabindex="2">
                                        @foreach ($tac_gia as $item)
                                        @foreach ($sach as $single_author)
                                        <option value="{{ $item->id }}" {{ $single_author->fkSach->tac_gia_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->ten }}
                                        </option>
                                        @endforeach
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="m-0">&nbsp;Thể loại</label>
                                    <select required name="the_loai" class="form-control select2-no-search" tabindex="3">
                                        @foreach ($the_loai as $item)
                                        @foreach ($sach as $single_book)
                                        <option value="{{ $item->id }}" {{ $single_book->fkSach->the_loai_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->ten }}
                                        </option>
                                        @endforeach
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="m-0">&nbsp;Nhà xuất bản</label>
                                    <select required id="form-select" name="nha_xuat_ban" class="form-control select2-no-search" tabindex="4">
                                        @foreach ($nha_xuat_ban as $item)
                                        @foreach ($sach as $single_nxb)
                                        <option value="{{ $item->id }}" {{ $single_nxb->fkSach->nha_xuat_ban_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->ten }}
                                        </option>
                                        @endforeach
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <div class="d-flex justify-content-between">
                                        <label class="m-0">&nbsp;Năm xuất bản</label>
                                        @error('nam_xuat_ban')
                                        <div style="font-style: italic;" class="text-danger">
                                            {{ $message }} *&nbsp;
                                        </div>
                                        @enderror
                                    </div>
                                    @foreach ($sach as $item)
                                    <input type="number" min="1800" max="2024" name="nam_xuat_ban" class="form-control" placeholder="Nhập năm xuất bản" value="{{ $item->fkSach->nam_xuat_ban }}" tabindex="5" />
                                    @endforeach
                                </div>
                                <!-- form-group -->
                                <div class="form-group" style="display: grid;grid-template-columns: auto auto;">
                                    <div class="form-group mr-3">
                                        <label class="m-0">&nbsp;Tủ sách</label>
                                        <select required id="tuSachSelect" name="tu_sach" class="form-control select2-no-search" tabindex="6">
                                            @foreach ($khu_vuc as $khu_vuc_item)
                                            <optgroup label="{{ $khu_vuc_item->ten }} gồm các tủ" data-khu-vuc="{{ $khu_vuc_item->id }}" class="tuSachOptgroup">
                                                <option hidden value="{{ $item->fkTusach->fkKhuVuc->khu_vuc_id }}" selected>
                                                    {{ $item->fkTuSach->ten }}
                                                </option>
                                                @foreach ($tu_sach as $tu_sach_item)
                                                @if ($tu_sach_item->khu_vuc_id == $khu_vuc_item->id)
                                                <option value="{{ $tu_sach_item->id }}">
                                                    {{ $tu_sach_item->ten }}
                                                </option>
                                                @endif
                                                @endforeach
                                            </optgroup>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-between">
                                            <label class="m-0">&nbsp;Giá tiền</label>
                                            @error('gia_tien')
                                            <div style="font-style: italic;" class="text-danger">
                                                {{ $message }} *&nbsp;
                                            </div>
                                            @enderror
                                        </div>
                                        <input type="number" name="gia_tien" id="gia_tien" class="form-control" placeholder="Nhập giá tiền" value="{{$item->fkSach->gia_tien}}" tabindex="11">
                                    </div>
                                </div>
                            </div>
                            <!-- up ảnh -->
                            <div style="flex-basis: 30%; margin:2%" class="ml-3 mb-0">
                                @if ($item->fkSach->hinh_anh == '')
                                <div class="upload-container" style="background-size:contain;background-image: url('/img/default/no_image_available.jpg');">
                                    <input style="font-size: 120px; opacity: 0" type="file" id="upload-file" name="file" accept="image/*" onchange="chooseFile(this)" tabindex="10" />
                                    <div id="preview-container" class="preview-container"></div>
                                </div>
                                @else
                                <div class="upload-container" style="background-size:contain;background-image: url('/img/books/{{ $item->fkSach->hinh_anh }}');">
                                    <input style="font-size: 120px; opacity: 0" type="file" id="upload-file" name="file" accept="image/*" onchange="chooseFile(this)" tabindex="10" />
                                    <div id="preview-container" class="preview-container"></div>
                                </div>
                                @endif
                                <!-- số lượng -->
                                <div style="margin-top: 6%" class="form-group col-lg pl-0">
                                    <div class="d-flex justify-content-between">
                                        <label class="m-0">&nbsp;Số lượng</label>
                                        @error('so_luong')
                                        <div style="font-style: italic;" class="text-danger">{{ $message }}
                                            *&nbsp;
                                        </div>
                                        @enderror
                                    </div>
                                    <input type="number" min="1" name="so_luong" id="so_luong" class="form-control" placeholder="Số lượng" value="{{ $item->sl_con_lai }}" tabindex="7" />
                                </div>
                                <!-- khu vực -->
                                <div class="form-group col-lg pl-0">
                                    <label class="m-0">&nbsp;Khu vực</label>
                                    <select required id="khuVucSelect" name="khu_vuc" class="form-control select2-no-search" tabindex="8">
                                        @foreach ($khu_vuc as $item)
                                        @foreach ($sach as $single_area)
                                        <option value="{{ $item->id }}" {{ $single_area->fkTuSach->khu_vuc_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->ten }}
                                        </option>
                                        @endforeach
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group ml-3">
                            <label class="m-0">&nbsp;Nội dung tóm tắt</label>
                            @foreach ($sach as $item)
                            <textarea rows="10" id="sample" class="form-control" name="mo_ta" placeholder="Nhập tóm tắt nội dung sách" tabindex="9">{{ $item->fkSach->mo_ta }}</textarea>
                            @endforeach
                        </div>

                        <div style="display: flex; justify-content: end;">
                            <a href="#" class="btn btn-danger" style="margin-right: 2%">Hủy</a>
                            <!-- <a href="" class="btn btn-success rounded">Thêm</a> -->
                            <button class="btn btn-success" type="submit">
                                Sửa
                            </button>
                        </div>
                    </form>
                </div><!-- az-card-signin -->

                <div class="ht-40"></div>



            </div><!-- az-content-body -->
        </div><!-- container -->
    </div><!-- az-content -->
    @include('../common/footer')
    <style>
        .upload-container {
            position: relative;
            width: 225px;
            height: 269px;
            border: 1px border #ccc;
            display: flex;
            justify-content: center;
            align-items: center;

            /* cursor: pointer; */
        }

        .upload-label {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .preview-container {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            display: none;
        }

        .preview-container img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
    </style>
    <script src="/lib/jquery/jquery.min.js"></script>
    <script src="/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/lib/ionicons/ionicons.js"></script>
    <script src="/lib/chart.js/Chart.bundle.min.js"></script>

    <script src="/js/azia.js"></script>
    <!-- <script src="/js/chart.chartjs.js"></script> -->
    <script src="/js/jquery.cookie.js" type="text/javascript"></script>

    <script src="/lib/select2/js/select2.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/suneditor@latest/dist/css/suneditor.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/suneditor@latest/dist/suneditor.min.js"></script>
    <script>
        const editor = SUNEDITOR.create('sample', {
            buttonList: [
                ['undo', 'redo'],
                ['font', 'fontSize', 'formatBlock'],
                ['bold', 'underline', 'italic', 'strike', 'subscript', 'superscript'],
                ['fontColor', 'hiliteColor', 'textStyle'],
                ['removeFormat'],
                '/',
                ['align', 'horizontalRule', 'list', 'lineHeight'],
                ['table', 'link', 'image', 'video'],
                ['fullScreen', 'showBlocks', 'codeView'],
                ['preview'],
            ],
            width: '100%',
            height: '200px',
            placeholder: 'Nhập nội dung ở đây...'
        });

        const form = document.querySelector('form');
        const textarea = document.getElementById('sample');

        form.addEventListener('submit', function(event) {
            // Lấy nội dung từ SunEditor
            const content = editor.getContents();
            // Gán nội dung vào trường textarea
            textarea.value = content;
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#khuVucSelect")
                .val($("#khuVucSelect option:first").val())
                .trigger("change");
            $("#khuVucSelect").change(function() {
                var selectedVal = $(this).val();
                $(".tuSachOptgroup").hide();
                $('.tuSachOptgroup[data-khu-vuc="' + selectedVal + '"]').show();
                $("#tuSachSelect").val("");
                // $('.result').html('');
            });
            $(".tuSachOptgroup").hide();

            // lấy giá trị của khuVucSelect và cập nhật tuSachSelect tương ứng
            var selectedVal = $("#khuVucSelect").val();
            $(".tuSachOptgroup").hide();
            $('.tuSachOptgroup[data-khu-vuc="' + selectedVal + '"]').show();
            $("#tuSachSelect").val("");
            // $('.result').html('');
        });
    </script>
    <script>
        function chooseFile(fileinput) {
            const previewContainer = document.getElementById("preview-container");

            if (fileinput.files && fileinput.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const image = new Image();
                    image.src = e.target.result;
                    image.onload = function() {
                        previewContainer.innerHTML = "";
                        previewContainer.appendChild(image);
                        image.style.objectFit = "cover";
                        previewContainer.style.display = "block";
                    };
                }
                reader.readAsDataURL(fileinput.files[0]);
            } else {
                previewContainer.innerHTML = "";
                previewContainer.style.display = "none";
            }
            previewContainer.addEventListener("click", function(event) {
                if (event.target.closest("#preview-container")) {
                    const uploadFile = document.getElementById("upload-file");
                    uploadFile.click();
                }
            });
        }
    </script>
</body>

</html>