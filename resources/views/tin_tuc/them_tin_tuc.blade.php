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

    <title>libro - Tạo tài khoản</title>

    <!-- vendor css -->
    <link href="../lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="../lib/spectrum-colorpicker/spectrum.css" rel="stylesheet">
    <link href="../lib/select2/css/select2.min.css" rel="stylesheet">
    <link href="../lib/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="../lib/ion-rangeslider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <link href="../lib/amazeui-datetimepicker/css/amazeui.datetimepicker.css" rel="stylesheet">
    <link href="../lib/jquery-simple-datetimepicker/jquery.simple-dtpicker.css" rel="stylesheet">
    <link href="../lib/pickerjs/picker.min.css" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="../css/azia.css">

</head>

<body>

    @include('../common/header', ['view' => 5])

    <div class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40">
        <div class="container">
            <div class="az-content-left az-content-left-components">
                <div class="component-item">
                    <label>Tin tức</label>
                    <nav class="nav flex-column">
                        <a href="#" class="nav-link active">Thêm tin tức</a>
                        <a href="{{ route('quan-ly-tai-khoan') }}" class="nav-link ">Quản lý tin tức</a>
                    </nav>
                </div><!-- component-item -->
            </div><!-- az-content-left -->

            <div class="az-content-body pd-lg-l-40 d-flex flex-column">
                <div class="az-content-breadcrumb">
                    <span>Tin tức</span>
                    <span>Thêm tin tức</span>
                </div>
                <h3>Thêm tin tức</h3>
                <div style="display: flex;">
                    <div style="flex-basis: 30%;">
                        <div class="upload-container border rounded" style="background-image: url('/img/avt/income.jpg');margin-top: 30px;">
                            <input style="font-size: 120px; opacity: 0" type="file" id="upload-file" name="file_upload" accept="image/*" onchange="chooseFile(this)" tabindex="10" />
                            <div id="preview-container" class="preview-container">
                            </div>
                        </div>
                    </div>
                    <div style="flex-basis: 70%;">
                        <label for="">Tiêu đề</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Tiêu đề">
                    </div>
                </div>
                <label class="pt-3" for="">Nội dung</label>
                <textarea id="sample"></textarea>
                <style>
                    .upload-container {
                        position: relative;
                        width: 195px;
                        height: 283px;
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
                        object-fit: cover;
                    }
                </style>
                <div class="ht-40"></div>

                @include('../common/footer')

            </div><!-- az-content-body -->
        </div><!-- container -->
    </div><!-- az-content -->
    <link href="https://cdn.jsdelivr.net/npm/suneditor@latest/dist/css/suneditor.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/suneditor@latest/assets/css/suneditor.css" rel="stylesheet"> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/suneditor@latest/assets/css/suneditor-contents.css" rel="stylesheet"> -->
    <script src="https://cdn.jsdelivr.net/npm/suneditor@latest/dist/suneditor.min.js"></script>
    <!-- languages (Basic Language: English/en) -->
    <script src="https://cdn.jsdelivr.net/npm/suneditor@latest/src/lang/ko.js"></script>

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
        const editor = SUNEDITOR.create((document.getElementById('sample') || 'sample'), {
            // All of the plugins are loaded in the "window.SUNEDITOR" object in dist/suneditor.min.js file
            // Insert options
            // Language global object (default: en)
            lang: SUNEDITOR_LANG['ko']
        });

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