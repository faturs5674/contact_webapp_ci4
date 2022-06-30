<?= $this->extend('template/administrator') ?>


<?= $this->section('content') ?>
<div class="main-content">
    <script src="/assets/js/plugins/echarts.min.js"></script>
    <script src="/assets/js/scripts/echart.options.min.js"></script>
    <style type="text/css">
        .rekap-container {
            overflow-x: scroll;
            display: inline-block;
            white-space: nowrap;
            width: 88vw;
            margin-bottom: 20px;
        }

        .rekap {
            display: inline-block;
            margin: 0px 10px;
            min-width: 280px;
        }

        .grafik-container {
            display: block;
        }

        .grafik {
            display: block;
        }

        .grafik .card {
            height: 480px;
        }

        /* width */
        ::-webkit-scrollbar {
            width: 10px;
            height: 10px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #888;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
    <div id="content-view">
        <div class="rekap-container">
            <a href="#" class="text-dark">
                <div class="rekap">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-3">
                        <div class="card-body text-center"><i class="fa fa-poll fa-4x"></i>
                            <div class="content">
                                <p class="text-muted mt-2 mb-0 font-weight-bold">Layanan expired</p>
                                <p class="text-dark text-24 line-height-1 mb-2" id="exp"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/clientTransaksi" class="text-dark">
                <div class="rekap">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-3">
                        <div class="card-body text-center"><i class="fa fa-poll fa-4x"></i>
                            <div class="content">
                                <p class="text-muted mt-2 mb-0 font-weight-bold">customer perbulan</p>
                                <p class="text-dark text-24 line-height-1 mb-2" id="customer_perbulan"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/client" class="text-dark">
                <div class="rekap">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-3">
                        <div class="card-body text-center"><i class="fa fa-poll fa-4x"></i>
                            <div class="content">
                                <p class="text-muted mt-2 mb-0 font-weight-bold">total customer</p>
                                <p class="text-dark text-24 line-height-1 mb-2" id='total_customers'></p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title mb-0"><i class="fa fa-paperclip"></i>Layanan expired</div>
                    <div class="grafik-data" data="0" style="height: 300px;"></div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title mb-0"><i class="fa fa-paperclip"></i>customer perbulan
                        <div class="breadcrumb d-flex justify-content-between">
                            <div class="d-flex justify-content-start">
                                <div class="btn-group">
                                    <a onclick="left(1)" class="btn btn-info"><i class="fa fa-caret-left"></i></a>
                                    <div class="dropdown">
                                        <button class="btn btn-info dropdown rounded-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> </button>
                                        <form id="form_tahun">
                                            <input type="hidden" name="tahun" class="tahun" id="tahun">
                                        </form>
                                    </div>
                                    <a onclick="right(1)" class="btn btn-info"><i class="fa fa-caret-right"></i></a>
                                </div>
                                <div class="info">

                                </div>
                                <div class="ml-2" id="buttons">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grafik-data" data="1" style="height: 300px;"></div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title mb-0"><i class="fa fa-paperclip"></i>Total Customers</div>
                    <div class="grafik-data" data="2" style="height: 300px;"></div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            let q = new Date().getFullYear();
            $('#dropdownMenuButton').text(q);
            $('#tahun').val(q);
            $.ajax({
                url: '/home/grafik',
                type: 'GET',
                data: $('#form_tahun').serialize(),
                dataType: "JSON",
                success: function(data) {

                    // console.log(data.tabel2)
                    $('#exp').text(data.tabel1[0].set_invoice_cooldown)
                    $('#total_customers').text(data.tabel[0].client_nama)
                    echartLine(
                        '.grafik-data[data="0"]',
                        ["total layanan berakhir"],
                        [data.tabel1[0].set_invoice_cooldown]);
                    echartLine(
                        '.grafik-data[data="2"]', ["total Customers"], [data.tabel[0].client_nama]);
                    echartLine(
                        '.grafik-data[data="1"]',
                        [data.tabel2[0].label, data.tabel2[1].label, data.tabel2[2].label, data.tabel2[3].label, data.tabel2[4].label, data.tabel2[5].label, data.tabel2[6].label, data.tabel2[7].label,
                            data.tabel2[8].label, data.tabel2[9].label, data.tabel2[10].label, data.tabel2[11].label
                        ], [data.tabel2[0].jumlah[0].client_tgl_daftar, data.tabel2[1].jumlah[0].client_tgl_daftar, data.tabel2[2].jumlah[0].client_tgl_daftar, data.tabel2[3].jumlah[0].client_tgl_daftar, data.tabel2[4].jumlah[0].client_tgl_daftar, data.tabel2[5].jumlah[0].client_tgl_daftar, data.tabel2[6].jumlah[0].client_tgl_daftar, data.tabel2[7].jumlah[0].client_tgl_daftar, data.tabel2[8].jumlah[0].client_tgl_daftar, data.tabel2[9].jumlah[0].client_tgl_daftar, data.tabel2[10].jumlah[0].client_tgl_daftar, data.tabel2[11].jumlah[0].client_tgl_daftar]);
                }

            })



            function echartLine(selector, label, data) {
                var element = document.querySelector(selector);
                var echartBar = echarts.init(element);
                echartBar.setOption({
                    legend: {
                        borderRadius: 0,
                        orient: 'horizontal',
                        x: 'right',
                    },
                    grid: {
                        left: '8px',
                        right: '8px',
                        bottom: '0',
                        containLabel: true
                    },
                    tooltip: {
                        show: true,
                        backgroundColor: 'rgba(0, 0, 0, .8)'
                    },
                    xAxis: [{
                        type: 'category',
                        data: label,
                        axisTick: {
                            alignWithLabel: true
                        },
                        splitLine: {
                            show: false
                        },
                        axisLine: {
                            show: true
                        }
                    }],
                    yAxis: [{
                        type: 'value',
                        axisLabel: {
                            formatter: '{value}'
                        },
                        axisLine: {
                            show: false
                        },
                        splitLine: {
                            show: true,
                            interval: 'auto'
                        }
                    }],
                    series: [{
                        data: data,
                        label: {
                            show: false,
                            color: '#0168c1'
                        },
                        type: 'bar',
                        barGap: 0,
                        color: '#663399',
                        smooth: false,
                        itemStyle: {
                            emphasis: {
                                shadowBlur: 10,
                                shadowOffsetX: 0,
                                shadowOffsetY: -2,
                                shadowColor: 'rgba(0, 0, 0, 0.3)'
                            }
                        }
                    }]
                });
            }

            function right(t) {
                q = q + t
                $('#dropdownMenuButton').text(q);
                $('#tahun').val(q);
                $.ajax({
                    url: '/home/grafik',
                    type: 'GET',
                    data: $('#form_tahun').serialize(),
                    dataType: "JSON",
                    success: function(data) {

                        // console.log(data.tabel2)
                        $('#exp').text(data.tabel1[0].set_invoice_cooldown)
                        $('#total_customers').text(data.tabel[0].client_nama)
                        echartLine(
                            '.grafik-data[data="0"]',
                            ["total layanan berakhir"],
                            [data.tabel1[0].set_invoice_cooldown]);
                        echartLine(
                            '.grafik-data[data="2"]', ["total Customers"], [data.tabel[0].client_nama]);
                        echartLine(
                            '.grafik-data[data="1"]',
                            [data.tabel2[0].label, data.tabel2[1].label, data.tabel2[2].label, data.tabel2[3].label, data.tabel2[4].label, data.tabel2[5].label, data.tabel2[6].label, data.tabel2[7].label,
                                data.tabel2[8].label, data.tabel2[9].label, data.tabel2[10].label, data.tabel2[11].label
                            ], [data.tabel2[0].jumlah[0].client_tgl_daftar, data.tabel2[1].jumlah[0].client_tgl_daftar, data.tabel2[2].jumlah[0].client_tgl_daftar, data.tabel2[3].jumlah[0].client_tgl_daftar, data.tabel2[4].jumlah[0].client_tgl_daftar, data.tabel2[5].jumlah[0].client_tgl_daftar, data.tabel2[6].jumlah[0].client_tgl_daftar, data.tabel2[7].jumlah[0].client_tgl_daftar, data.tabel2[8].jumlah[0].client_tgl_daftar, data.tabel2[9].jumlah[0].client_tgl_daftar, data.tabel2[10].jumlah[0].client_tgl_daftar, data.tabel2[11].jumlah[0].client_tgl_daftar]);
                    }

                })
            }

            function left(e) {
                q = q - e
                $('#dropdownMenuButton').text(q);
                $('#tahun').val(q);
                $.ajax({
                    url: '/home/grafik',
                    type: 'GET',
                    data: $('#form_tahun').serialize(),
                    dataType: "JSON",
                    success: function(data) {

                        // console.log(data.tabel2)
                        $('#exp').text(data.tabel1[0].set_invoice_cooldown)
                        $('#total_customers').text(data.tabel[0].client_nama)
                        echartLine(
                            '.grafik-data[data="0"]',
                            ["total layanan berakhir"],
                            [data.tabel1[0].set_invoice_cooldown]);
                        echartLine(
                            '.grafik-data[data="2"]', ["total Customers"], [data.tabel[0].client_nama]);
                        echartLine(
                            '.grafik-data[data="1"]',
                            [data.tabel2[0].label, data.tabel2[1].label, data.tabel2[2].label, data.tabel2[3].label, data.tabel2[4].label, data.tabel2[5].label, data.tabel2[6].label, data.tabel2[7].label,
                                data.tabel2[8].label, data.tabel2[9].label, data.tabel2[10].label, data.tabel2[11].label
                            ], [data.tabel2[0].jumlah[0].client_tgl_daftar, data.tabel2[1].jumlah[0].client_tgl_daftar, data.tabel2[2].jumlah[0].client_tgl_daftar, data.tabel2[3].jumlah[0].client_tgl_daftar, data.tabel2[4].jumlah[0].client_tgl_daftar, data.tabel2[5].jumlah[0].client_tgl_daftar, data.tabel2[6].jumlah[0].client_tgl_daftar, data.tabel2[7].jumlah[0].client_tgl_daftar, data.tabel2[8].jumlah[0].client_tgl_daftar, data.tabel2[9].jumlah[0].client_tgl_daftar, data.tabel2[10].jumlah[0].client_tgl_daftar, data.tabel2[11].jumlah[0].client_tgl_daftar]);
                    }

                })
            }
        </script>
        <?= $this->endSection() ?>