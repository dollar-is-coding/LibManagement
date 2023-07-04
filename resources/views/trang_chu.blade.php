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

    <title>libro - Trang chủ</title>
    <link rel='shortcut icon' href='/img/LIBRO.png' />
    <!-- vendor css -->
    <link href="../lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="../lib/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="../css/azia.css">

</head>

<body>

    @include('../common/header', ['view' => 1])

    <div class="az-content az-content-dashboard">
        <div class="container">
            <div class="az-content-body">
                <div class="az-dashboard-one-title">
                    <div>
                        <h2 class="az-dashboard-title">Hi, {{$ten}} welcome back!</h2>
                        <!-- <p class="az-dashboard-text">Your web analytics dashboard template.</p> -->
                    </div>
                    <!-- export -->
                    <div>
                        <form action="{{route('export')}}" method="POST">
                            @csrf
                            <input type="submit" value="Export Excel" name="export_csv" class="btn btn-success">
                        </form>
                    </div>
                    <div style="display: none;" class="az-content-header-right">
                        <div class="media">
                            <div class="media-body">
                                <label>Start Date</label>
                                <h6>Oct 10, 2018</h6>
                            </div><!-- media-body -->
                        </div><!-- media -->
                        <div class="media">
                            <div class="media-body">
                                <label>End Date</label>
                                <h6>Oct 23, 2018</h6>
                            </div><!-- media-body -->
                        </div><!-- media -->
                        <div class="media">
                            <div class="media-body">
                                <label>Event Category</label>
                                <h6>All Categories</h6>
                            </div><!-- media-body -->
                        </div><!-- media -->
                        <a href="" class="btn btn-purple">Export</a>
                    </div>
                </div><!-- az-dashboard-one-title -->

                <div style="display: none;" class="az-dashboard-nav">
                    <nav class="nav">
                        <a class="nav-link active" data-toggle="tab" href="#">Overview</a>
                        <a class="nav-link" data-toggle="tab" href="#">Audiences</a>
                        <a class="nav-link" data-toggle="tab" href="#">Demographics</a>
                        <a class="nav-link" data-toggle="tab" href="#">More</a>
                    </nav>

                    <nav class="nav">
                        <a class="nav-link" href="#"><i class="far fa-save"></i> Save Report</a>
                        <a class="nav-link" href="#"><i class="far fa-file-pdf"></i> Export to PDF</a>
                        <a class="nav-link" href="#"><i class="far fa-envelope"></i>Send to Email</a>
                        <a class="nav-link" href="#"><i class="fas fa-ellipsis-h"></i></a>
                    </nav>
                </div>
                <!-- thong ke -->
                <div style="display: flex;">
                    <div class="card" style="width: 400px;">
                        <div class="card-body">
                            <h5 class="card-title">Số lượng Sách</h5>
                            <p style="font-size: 30px; font-weight: bold;" class="card-text">{{$slsach}}</p>
                            <a href="{{route('hien-thi-sach')}}" class="btn btn-primary">Xem chi tiết</a>
                        </div>
                    </div>
                    <div class="card" style="width: 400px;">
                        <div class="card-body">
                            <h5 class="card-title">Số lượng độc giả</h5>
                            <p style="font-size: 30px; font-weight: bold;" class="card-text">{{$sldocgia}}</p>
                            <a href="{{route('quan-ly-tai-khoan')}}" class="btn btn-primary">Xem chi tiết</a>
                        </div>
                    </div>
                    <div class="card" style="width: 400px;">
                        <div class="card-body">
                            <h5 class="card-title">Số lượng thủ thư</h5>
                            <p style="font-size: 30px; font-weight: bold;" class="card-text">{{$slthuthu}}</p>
                            <a href="{{route('quan-ly-tai-khoan')}}" class="btn btn-primary">Xem chi tiết</a>
                        </div>
                    </div>
                </div>

                <!-- two -->
                <div style="display: flex;">
                    <div class="card" style="width: 400px;">
                        <div class="card-body">
                            <h5 class="card-title">Số lượng tin tức</h5>
                            <p style="font-size: 30px; font-weight: bold;" class="card-text">{{$sltintuc}}</p>
                            <a href="{{route('danh-sach-tin-tuc')}}" class="btn btn-primary">Xem chi tiết</a>
                        </div>
                    </div>
                    <div class="card" style="width: 400px;">
                        <div class="card-body">
                            <h5 class="card-title">Số lượng sách mượn cần duyệt</h5>
                            <p style="font-size: 30px; font-weight: bold;" class="card-text">{{$slsachduyet}}</p>
                            <a href="{{route('phe-duyet-muon-sach')}}" class="btn btn-primary">Xem chi tiết</a>
                        </div>
                    </div>
                    <div class="card" style="width: 400px;">
                        <div class="card-body">
                            <h5 class="card-title">Số lượng Phản hồi</h5>
                            <p style="font-size: 30px; font-weight: bold;" class="card-text">{{$slphanhoi}}</p>
                            <a href="{{route('quan-ly-lien-he')}}" class="btn btn-primary">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
                <!-- end thong ke -->
                <div class="row row-sm mg-b-20">
                    <!-- <div class="col-lg-7 ht-lg-100p">
                        <div class="card card-dashboard-one">
                            <div class="card-header">
                                <div>
                                    <p style="font-size: 20px;" class="card-title">Bảng thống kê</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card-body-top">
                                    <div>
                                        <label class="mg-b-0">Số lượng sách</label>
                                       
                                    </div>
                                    <div>
                                        <label class="mg-b-0">Số lượng độc giả</label>
                                        
                                    </div>

                                </div>
                                <div class="flot-chart-wrapper">
                                    <div id="flotChart" class="flot-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="col-lg-5 mg-t-20 mg-lg-t-0">
                        <div class="row row-sm">
                            <div class="col-sm-6">
                                <div class="card card-dashboard-two">
                                    <div class="card-header">
                                        <h6>33.50% <i class="icon ion-md-trending-up tx-success"></i>
                                            <small>18.02%</small>
                                        </h6>
                                        <p>Bounce Rate</p>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart-wrapper">
                                            <div id="flotChart1" class="flot-chart"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 mg-t-20 mg-sm-t-0">
                                <div class="card card-dashboard-two">
                                    <div class="card-header">
                                        <h6>86k <i class="icon ion-md-trending-down tx-danger"></i>
                                            <small>0.86%</small>
                                        </h6>
                                        <p>Total Users</p>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart-wrapper">
                                            <div id="flotChart2" class="flot-chart"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 mg-t-20">
                                <div class="card card-dashboard-three">
                                    <div class="card-header">
                                        <p>All Sessions</p>
                                        <h6>16,869 <small class="tx-success"><i class="icon ion-md-arrow-up"></i>
                                                2.87%</small></h6>
                                        <small>The total number of sessions within the date range. It is the period time
                                            a user is actively engaged with your website, page or app, etc.</small>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart"><canvas id="chartBar5"></canvas></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <h4 class="mt-2">Bảng thống kê</h4>
                    <div class="border" style="width: 100%;">
                        <canvas id="barChart"></canvas>
                    </div>
                    <!--col -->
                </div>


            </div><!-- az-content-body -->
        </div>
    </div><!-- az-content -->

    <div class="az-footer ht-40">
        <div class="container ht-100p pd-t-0-f">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com
                2020</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin
                    templates</a> from Bootstrapdash.com</span>
        </div><!-- container -->
    </div><!-- az-footer -->


    <script src="../lib/jquery/jquery.min.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/ionicons/ionicons.js"></script>
    <script src="../lib/jquery.flot/jquery.flot.js"></script>
    <script src="../lib/jquery.flot/jquery.flot.resize.js"></script>
    <!-- <script src="../lib/chart.js/Chart.bundle.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../lib/peity/jquery.peity.min.js"></script>

    <script src="../js/azia.js"></script>
    <script src="../js/chart.flot.sampledata.js"></script>
    <script src="../js/dashboard.sampledata.js"></script>
    <script src="../js/jquery.cookie.js" type="text/javascript"></script>
    <script>
        var data = [{{$thang1}},{{$thang2}}, {{$thang3}}, {{$thang4}}, {{$thang5}}, {{$thang6}}, {{$thang7}}, {{$thang8}}, {{$thang9}},{{$thang10}}, {{$thang11}}, {{$thang12}}];

        var ctx = document.getElementById('barChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
                datasets: [{
                    label: 'Số lượng',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
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