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

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="BootstrapDash">

    <title>Azia Responsive Bootstrap 4 Dashboard Template</title>

    <!-- vendor css -->
    <link href="../lib/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
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

    <div class="az-header">
        <div class="container">
            <div class="az-header-left">
                <a href="index.html" class="az-logo"><span></span> library</a>
                <a href="" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
            </div><!-- az-header-left -->
            <div class="az-header-menu">
                <div class="az-header-menu-header">
                    <a href="index.html" class="az-logo"><span></span> azia</a>
                    <a href="" class="close">&times;</a>
                </div><!-- az-header-menu-header -->
                <ul class="nav">
                    <li class="nav-item active show">
                        <a href="index.html" class="nav-link"><i class="typcn typcn-chart-area-outline"></i>
                            Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link with-sub"><i class="typcn typcn-document"></i> Pages</a>
                        <nav class="az-menu-sub">
                            <a href="page-signin.html" class="nav-link">Sign In</a>
                            <a href="page-signup.html" class="nav-link">Sign Up</a>
                        </nav>
                    </li>
                    <li class="nav-item">
                        <a href="chart-chartjs.html" class="nav-link"><i class="typcn typcn-chart-bar-outline"></i>
                            Charts</a>
                    </li>
                    <li class="nav-item">
                        <a href="form-elements.html" class="nav-link"><i class="typcn typcn-chart-bar-outline"></i>
                            Forms</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link with-sub"><i class="typcn typcn-book"></i> Components</a>
                        <div class="az-menu-sub">
                            <div class="container">
                                <div>
                                    <nav class="nav">
                                        <a href="elem-buttons.html" class="nav-link">Buttons</a>
                                        <a href="elem-dropdown.html" class="nav-link">Dropdown</a>
                                        <a href="elem-icons.html" class="nav-link">Icons</a>
                                        <a href="table-basic.html" class="nav-link">Table</a>
                                    </nav>
                                </div>
                            </div><!-- container -->
                        </div>
                    </li>
                </ul>
            </div><!-- az-header-menu -->

            <div class="az-header-right">
                <a href="https://www.bootstrapdash.com/demo/azia-free/docs/documentation.html" target="_blank"
                    class="az-header-search-link"><i class="far fa-file-alt"></i></a>
                <a href="" class="az-header-search-link"><i class="fas fa-search"></i></a>
                <div class="az-header-message">
                    <a href="#"><i class="typcn typcn-messages"></i></a>
                </div><!-- az-header-message -->
                <div class="dropdown az-header-notification">
                    <a href="" class="new"><i class="typcn typcn-bell"></i></a>
                    <div class="dropdown-menu">
                        <div class="az-dropdown-header mg-b-20 d-sm-none">
                            <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                        </div>
                        <h6 class="az-notification-title">Notifications</h6>
                        <p class="az-notification-text">You have 2 unread notification</p>
                        <div class="az-notification-list">
                            <div class="media new">
                                <div class="az-img-user"><img src="../img/faces/face2.jpg" alt=""></div>
                                <div class="media-body">
                                    <p>Congratulate <strong>Socrates Itumay</strong> for work anniversaries</p>
                                    <span>Mar 15 12:32pm</span>
                                </div><!-- media-body -->
                            </div><!-- media -->
                            <div class="media new">
                                <div class="az-img-user online"><img src="../img/faces/face3.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <p><strong>Joyce Chua</strong> just created a new blog post</p>
                                    <span>Mar 13 04:16am</span>
                                </div><!-- media-body -->
                            </div><!-- media -->
                            <div class="media">
                                <div class="az-img-user"><img src="../img/faces/face4.jpg" alt=""></div>
                                <div class="media-body">
                                    <p><strong>Althea Cabardo</strong> just created a new blog post</p>
                                    <span>Mar 13 02:56am</span>
                                </div><!-- media-body -->
                            </div><!-- media -->
                            <div class="media">
                                <div class="az-img-user"><img src="../img/faces/face5.jpg" alt=""></div>
                                <div class="media-body">
                                    <p><strong>Adrian Monino</strong> added new comment on your photo</p>
                                    <span>Mar 12 10:40pm</span>
                                </div><!-- media-body -->
                            </div><!-- media -->
                        </div><!-- az-notification-list -->
                        <div class="dropdown-footer"><a href="">View All Notifications</a></div>
                    </div><!-- dropdown-menu -->
                </div><!-- az-header-notification -->
                <div class="dropdown az-profile-menu">
                    <a href="" class="az-img-user">
                        @if (Auth::user()->anh_dai_dien == '')
                            <img src="../img/avt/user.png" alt="">
                        @else
                            <img src="../img/avt/{{ Auth::user()->anh_dai_dien }}" alt="">
                        @endif
                    </a>
                    <div class="dropdown-menu">
                        <div class="az-dropdown-header d-sm-none">
                            <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                        </div>
                        <div class="az-header-profile">
                            <div class="az-img-user">
                                @if (Auth::user()->anh_dai_dien == '')
                                    <img src="../img/avt/user.png" alt="">
                                @else
                                    <img src="../img/avt/{{ Auth::user()->anh_dai_dien }}" alt="">
                                @endif
                            </div><!-- az-img-user -->
                            <h6>{{ Auth::user()->ho }} {{ Auth::user()->ten }}</h6>
                            <span>{{ Auth::user()->vai_tro == 1 ? 'Quản trị viên' : 'Thủ thư' }}</span>
                        </div><!-- az-header-profile -->

                        <a href="{{ route('xem-thong-tin') }}" class="dropdown-item"><i
                                class="typcn typcn-user-outline"></i> My
                            Profile</a>
                        <a href="" class="dropdown-item"><i class="typcn typcn-edit"></i> Edit Profile</a>
                        <a href="" class="dropdown-item"><i class="typcn typcn-time"></i> Activity Logs</a>
                        <a href="" class="dropdown-item"><i class="typcn typcn-cog-outline"></i> Account
                            Settings</a>
                        <a href="{{ route('xu-ly-dang-xuat') }}" class="dropdown-item"><i
                                class="typcn typcn-power-outline"></i>
                            Sign Out</a>
                    </div><!-- dropdown-menu -->
                </div>
            </div><!-- az-header-right -->

        </div><!-- container -->
    </div><!-- az-header -->

    <div class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40">
        <div class="container">
            <div class="az-content-body">
                <form class="row" action="{{ route('tim-kiem') }}" method="get">
                    <div class="col-lg">
                        <input class="form-control" name="tim_kiem" placeholder="Tìm kiếm" type="text"
                            autocomplete="off">
                    </div><!-- col -->
                    <div class="col-lg-3">
                        <select class="form-control select2-no-search" name="sort">
                            <option value="asc_name" selected>A -> Z</option>
                            <option value="desc_name">Z -> A</option>
                            <option value="desc_year">Mới nhất</option>
                        </select>
                    </div><!-- col -->
                    <div class="col-lg-2">
                        <button class="btn btn-indigo btn-block">Search</button>
                    </div>
                </form>
                <div class="table-responsive">
                    @if (blank($ds_sach))
                        <div class="az-table-reference">Không tìm thấy kết quả!</div>
                    @else
                        <table class="table mg-b-0 az-table-reference">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Sách</th>
                                    <th>Vị trí</th>
                                    <th>Số lượng</th>
                                    <th>Hình ảnh</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ds_sach as $key => $item)
                                    @foreach ($item->hasThuVien as $thu_vien)
                                        <tr>
                                            <th scope="row">{{ ++$key }}</th>
                                            <td>
                                                <style>
                                                    /* visited link */
                                                    a:visited {
                                                        color: black;
                                                    }

                                                    /* mouse over link */
                                                    a:hover {
                                                        color: blue;
                                                        text-decoration: underline;
                                                    }
                                                </style>
                                                <a href="">{{ $thu_vien->fkSach->ten }}</a>
                                            </td>
                                            <td>{{ $thu_vien->fkTuSach->ten }},
                                                {{ $thu_vien->fkTuSach->fkKhuVuc->ten }}
                                            </td>
                                            <td>{{ $thu_vien->so_luong }}</td>
                                            <td>
                                                <img src="/img/books/{{ $thu_vien->hinh_anh }}" srcset="">
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                </div><!-- table-responsive -->

                <div class="ht-40"></div>

                <div class="az-footer ht-40">
                    <div class="container ht-100p pd-t-0-f">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                            bootstrapdash.com
                            2020</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a
                                href="https://www.bootstrapdash.com/bootstrap-admin-template/"
                                target="_blank">Bootstrap admin
                                templates</a> from Bootstrapdash.com</span>
                    </div><!-- container -->
                </div><!-- az-footer -->

            </div><!-- az-content-body -->
        </div>
    </div><!-- az-content -->




    <script src="../lib/jquery/jquery.min.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/ionicons/ionicons.js"></script>
    <script src="../lib/jquery.flot/jquery.flot.js"></script>
    <script src="../lib/jquery.flot/jquery.flot.resize.js"></script>
    <script src="../lib/chart.js/Chart.bundle.min.js"></script>
    <script src="../lib/peity/jquery.peity.min.js"></script>

    <script src="../js/azia.js"></script>
    <script src="../js/chart.flot.sampledata.js"></script>
    <script src="../js/dashboard.sampledata.js"></script>
    <script src="../js/jquery.cookie.js" type="text/javascript"></script>
    <script>
        $(function() {
            'use strict'

            var plot = $.plot('#flotChart', [{
                data: flotSampleData3,
                color: '#007bff',
                lines: {
                    fillColor: {
                        colors: [{
                            opacity: 0
                        }, {
                            opacity: 0.2
                        }]
                    }
                }
            }, {
                data: flotSampleData4,
                color: '#560bd0',
                lines: {
                    fillColor: {
                        colors: [{
                            opacity: 0
                        }, {
                            opacity: 0.2
                        }]
                    }
                }
            }], {
                series: {
                    shadowSize: 0,
                    lines: {
                        show: true,
                        lineWidth: 2,
                        fill: true
                    }
                },
                grid: {
                    borderWidth: 0,
                    labelMargin: 8
                },
                yaxis: {
                    show: true,
                    min: 0,
                    max: 100,
                    ticks: [
                        [0, ''],
                        [20, '20K'],
                        [40, '40K'],
                        [60, '60K'],
                        [80, '80K']
                    ],
                    tickColor: '#eee'
                },
                xaxis: {
                    show: true,
                    color: '#fff',
                    ticks: [
                        [25, 'OCT 21'],
                        [75, 'OCT 22'],
                        [100, 'OCT 23'],
                        [125, 'OCT 24']
                    ],
                }
            });

            $.plot('#flotChart1', [{
                data: dashData2,
                color: '#00cccc'
            }], {
                series: {
                    shadowSize: 0,
                    lines: {
                        show: true,
                        lineWidth: 2,
                        fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 0.2
                            }, {
                                opacity: 0.2
                            }]
                        }
                    }
                },
                grid: {
                    borderWidth: 0,
                    labelMargin: 0
                },
                yaxis: {
                    show: false,
                    min: 0,
                    max: 35
                },
                xaxis: {
                    show: false,
                    max: 50
                }
            });

            $.plot('#flotChart2', [{
                data: dashData2,
                color: '#007bff'
            }], {
                series: {
                    shadowSize: 0,
                    bars: {
                        show: true,
                        lineWidth: 0,
                        fill: 1,
                        barWidth: .5
                    }
                },
                grid: {
                    borderWidth: 0,
                    labelMargin: 0
                },
                yaxis: {
                    show: false,
                    min: 0,
                    max: 35
                },
                xaxis: {
                    show: false,
                    max: 20
                }
            });


            //-------------------------------------------------------------//


            // Line chart
            $('.peity-line').peity('line');

            // Bar charts
            $('.peity-bar').peity('bar');

            // Bar charts
            $('.peity-donut').peity('donut');

            var ctx5 = document.getElementById('chartBar5').getContext('2d');
            new Chart(ctx5, {
                type: 'bar',
                data: {
                    labels: [0, 1, 2, 3, 4, 5, 6, 7],
                    datasets: [{
                        data: [2, 4, 10, 20, 45, 40, 35, 18],
                        backgroundColor: '#560bd0'
                    }, {
                        data: [3, 6, 15, 35, 50, 45, 35, 25],
                        backgroundColor: '#cad0e8'
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        enabled: false
                    },
                    legend: {
                        display: false,
                        labels: {
                            display: false
                        }
                    },
                    scales: {
                        yAxes: [{
                            display: false,
                            ticks: {
                                beginAtZero: true,
                                fontSize: 11,
                                max: 80
                            }
                        }],
                        xAxes: [{
                            barPercentage: 0.6,
                            gridLines: {
                                color: 'rgba(0,0,0,0.08)'
                            },
                            ticks: {
                                beginAtZero: true,
                                fontSize: 11,
                                display: false
                            }
                        }]
                    }
                }
            });

            // Donut Chart
            var datapie = {
                labels: ['Search', 'Email', 'Referral', 'Social', 'Other'],
                datasets: [{
                    data: [25, 20, 30, 15, 10],
                    backgroundColor: ['#6f42c1', '#007bff', '#17a2b8', '#00cccc', '#adb2bd']
                }]
            };

            var optionpie = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false,
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            };

            // For a doughnut chart
            var ctxpie = document.getElementById('chartDonut');
            var myPieChart6 = new Chart(ctxpie, {
                type: 'doughnut',
                data: datapie,
                options: optionpie
            });

        });
    </script>
</body>

</html>
