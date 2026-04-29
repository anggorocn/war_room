<?php
include_once("functions/string.func.php");
include_once("functions/date.func.php");

$vtoday= getFormattedDate(date("Y-m-d"));
?>
<!-- Services Section Start -->
<section id="services" class="services section-padding home">
    <div class="container-fluid">
        <div class="row services-wrapper">
            
            <!-- Services item -->
            <div class="col-md-6 col-lg-5 col-xs-12 padding-none">
                <div class="services-item wow fadeInDown" data-wow-delay="0.2s">
                    <div class="area-peta-pembangkit">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="logo-pln-np"><img src="images/logo.png"></div>
                            </div>
                            <div class="col-md-6">
                                <a class="selengkapnya pull-right" id="detilpetapembangkit" href="javascript:void(0)"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="area-total-unit">
                                    <div class="ikon"><img src="images/icon-pembangkit.png"></div>
                                    <div class="nilai" id='TotalUnit'></div>
                                    <div class="title">Total Unit</div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="area-peta">
                                    <div class="judul"><i class="fa fa-map-marker" aria-hidden="true"></i> Peta Pembangkit</div>
                                    <div class="area-total-daya">
                                        <div class="inner">
                                            <div class="item">
                                                <div class="nilai" id='TotalDayaTerpasang'></div>
                                                <div class="title">Total Daya Terpasang</div>
                                            </div>
                                            <div class="item mampu">
                                                <div class="nilai" id='TotalDayaMampu'></div>
                                                <div class="title">Total Daya Mampu</div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="area-jenis-pembangkit">
                                    <div class="inner">
                                        <div class="item">
                                            <div class="title">PLTMH</div>
                                            <div class="nilai">14 unit</div>
                                        </div>
                                        <div class="item">
                                            <div class="title">PLTM</div>
                                            <div class="nilai">7 unit</div>
                                        </div>
                                        <div class="item">
                                            <div class="title">PLTD</div>
                                            <div class="nilai">59 unit</div>
                                        </div>
                                        <div class="item">
                                            <div class="title">PLTGU</div>
                                            <div class="nilai">7 unit</div>
                                        </div>
                                        <div class="item">
                                            <div class="title">PLTA</div>
                                            <div class="nilai">21 unit</div>
                                        </div>
                                        <div class="item">
                                            <div class="title">PLTG</div>
                                            <div class="nilai">13 unit</div>
                                        </div>
                                        <div class="item">
                                            <div class="title">PLTMG</div>
                                            <div class="nilai">7 unit</div>
                                        </div>
                                        <div class="item">
                                            <div class="title">PLTU</div>
                                            <div class="nilai">23 unit</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-md-12">
                                <div class="area-sumber-data">
                                    <label>Sumber data : <span>Navitas</span></label>
                                    <label>Last update : <span>4 Agustus 2023</span></label>
                                </div>
                            </div>
                        </div> -->
                        <div class="area-sumber-data">
                            <label>Sumber data : <span>Navitas</span></label>
                            <label>Last update : <span>4 Agustus 2023</span></label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Services item -->
            <div class="col-md-6 col-lg-4 col-xs-12">
                <div class="services-item wow fadeInDown" data-wow-delay="0.4s">
                    <div class="area-penjualan">
                        <div class="judul">
                            <span class="ikon"><img src="images/icon-penjualan.png"></span> Penjualan
                            <a class="selengkapnya pull-right" id="detilpenjualan" href="javascript:void(0)"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a>
                        </div>
                        <div class="row inner" id='textPenjualan'>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="legend-penjualan">
                                    <i class="fa fa-circle hijau" aria-hidden="true"></i> ≥ 100%          
                                    <i class="fa fa-circle kuning" aria-hidden="true"></i> ≥ 95% - < 100%          
                                    <i class="fa fa-circle merah" aria-hidden="true"></i> < 95%
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-md-12">
                                <div class="area-sumber-data">
                                    <label>Sumber data : <span>Navitas</span></label>
                                    <label>Last update : <span>4 Agustus 2023</span></label>
                                </div>
                            </div>
                        </div> -->

                        <div class="area-sumber-data">
                            <label>Sumber data : <span>Navitas</span></label>
                            <label>Last update : <span id='tgl_entri_penjualan'>4 Agustus 2023</span></label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Services item -->
            <div class="col-md-6 col-lg-3 col-xs-12 padding-none">
                <div class="services-item wow fadeInDown" data-wow-delay="0.6s">
                    <div class="area-kesiapan-pembangkit">
                        <div class="judul">
                            <span class="ikon"><img src="images/icon-kesiapan-pembangkit.png"></span> Kesiapan Pembangkit
                            <a class="selengkapnya pull-right" id="detilkesiapanpembangkit" href="javascript:void(0)"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a>
                        </div>
                        <div class="row inner">
                            <div class="col-md-4 padding-none">
                                <div class="item">
                                    <div class="grafik-progress" id="kesiapan-daya-mampu"></div>
                                    <div class="title">Daya Mampu Net</div>
                                    <div class="nilai" id='mw_dmn'>15017.84 MW</div>
                                </div>
                            </div>
                            <div class="col-md-4 padding-none">
                                <div class="item">
                                    <div class="grafik-progress" id="kesiapan-normal-operasi"></div>
                                    <div class="title">Normal Operasi</div>
                                    <div class="nilai" id='mw_normal_operasi'>9439.12 MW</div>
                                </div>
                            </div>
                            <div class="col-md-4 padding-none">
                                <div class="item">
                                    <div class="grafik-progress" id="kesiapan-derating"></div>
                                    <div class="title">Derating</div>
                                    <div class="nilai" id='mw_derating_operasi'>273.50 MW</div>
                                </div>
                            </div>
                            <div class="col-md-4 padding-none">
                                <div class="item">
                                    <div class="grafik-progress" id="kesiapan-outage"></div>
                                    <div class="title">Outage</div>
                                    <div class="nilai" id='per_outage_operasi'>2305.82 MW</div>
                                </div>
                            </div>
                            <div class="col-md-4 padding-none">
                                <div class="item">
                                    <div class="grafik-progress" id="kesiapan-standby"></div>
                                    <div class="title">Standby</div>
                                    <div class="nilai"id='mw_standby'>2999.41 MW</div>
                                </div>
                            </div>
                            <div class="col-md-4 padding-none">
                                <div class="item">
                                    <div class="grafik-progress" id="kesiapan-total"></div>
                                    <div class="title">Total Kesiapan</div>
                                    <div class="nilai"id='mw_total_kesiapan'>12438.53 MW</div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-md-12">
                                <div class="area-sumber-data">
                                    <label>Sumber data : <span>Navitas</span></label>
                                    <label>Last update : <span>4 Agustus 2023</span></label>
                                </div>
                            </div>
                        </div> -->
                        <div class="area-sumber-data">
                            <label>Sumber data : <span>Navitas</span></label>
                            <label>Last update : <span id='tgl_entri_kesiapanpembangkit'>4 Agustus 2023</span></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row services-wrapper">
            <!-- Services item -->
            <div class="col-md-6 col-lg-3 col-xs-12 padding-none">
                <div class="services-item wow fadeInDown" data-wow-delay="0.8s">
                    <div class="area-kinerja-korporat">
                        <div class="judul">
                            <span class="ikon"><img src="images/icon-kinerja-korporat.png"></span> Kinerja Korporat
                            <a class="selengkapnya pull-right" id="detilkinerjakooporat" href="javascript:void(0)"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a>
                        </div>
                        <div class="row inner">
                            <div class="col-md-6">
                                <div class="grafik-pie-kinerja-korporat" id="grafik-pie-kinerja-korporat"></div>
                                <div class="keterangan">
                                    <div class="inner">
                                        <div class="title">Jumlah KPI</div>
                                        <div class="nilai" id='totalKpi'></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="area-legend">
                                    <div class="inner">
                                        <div class="item">
                                            <div class="tanda hijau">
                                                <i class="fa fa-circle" aria-hidden="true"></i>
                                            </div>
                                            <div class="data">
                                                <div class="title">≥ 100%</div>
                                                <div class="nilai" id='listStatus100' style="text-align:right;">14</div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="item">
                                            <div class="tanda kuning">
                                                <i class="fa fa-circle" aria-hidden="true"></i>
                                            </div>
                                            <div class="data">
                                                <div class="title">≥ 95% - ≤ 100%</div>
                                                <div class="nilai" id="listStatus95" style="text-align:right;">4</div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        
                                        <div class="item">
                                            <div class="tanda merah">
                                                <i class="fa fa-circle" aria-hidden="true"></i>
                                            </div>
                                            <div class="data">
                                                <div class="title"><95%</div>
                                                <div class="nilai" id='listStatus90' style="text-align:right;">9</div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="item">
                                            <div class="tanda abu-abu">
                                                <i class="fa fa-circle" aria-hidden="true"></i>
                                            </div>
                                            <div class="data">
                                                <div class="title">Belum dilakukan</div>
                                                <div class="nilai" id="listStatusBelumPenilaian" style="text-align:right;">6</div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-md-12">
                                <div class="area-sumber-data">
                                    <label>Sumber data : <span>Navitas</span></label>
                                    <label>Last update : <span>4 Agustus 2023</span></label>
                                </div>
                            </div>
                        </div> -->
                        <div class="area-sumber-data">
                            <label>Sumber data : <span>PBR</span></label>
                            <label>Last update : <span>4 Agustus 2023</span></label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-6 col-xs-12">
                <div class="row">

                    <!-- Services item -->
                    <div class="col-md-6 col-lg-7 col-xs-12">
                        <div class="services-item wow fadeInDown" data-wow-delay="1s">
                            <div class="area-kinerja-keuangan-korporat">
                                <div class="judul">
                                    <span class="ikon"><img src="images/icon-kinerja-keuangan-korporat.png"></span> Kinerja Keuangan Korporat
                                    <a class="selengkapnya pull-right" id="detilkinerjakeuangankorporat" href="javascript:void(0)"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a>
                                </div>
                                <div class="row inner">
                                    <div class="col-md-6">
                                        <div class="item">
                                            <div class="data">
                                                <div class="title" id='LabaRugiKategori'>Laba Rugi</div>
                                                <div class="nilai" id='LabaRugirealisasi'>2.6</div>
                                            </div>
                                            <div class="ikon">
                                                <img src="images/icon-laba-rugi.png">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>    
                                        <div class="item">
                                            <div class="data">
                                                <div class="title" id='PendapatanUsahaKategori'>Pendapatan Usaha</div>
                                                <div class="nilai" id='PendapatanUsaharealisasi'>13.24</div>
                                            </div>
                                            <div class="ikon">
                                                <img src="images/icon-pendapatan-usaha.png">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>    
                                        <div class="item">
                                            <div class="data">
                                                <div class="title" id='BebanUsahaKategori'>Beban Usaha</div>
                                                <div class="nilai" id='BebanUsaharealisasi'>10.78</div>
                                            </div>
                                            <div class="ikon">
                                                <img src="images/icon-beban-usaha.png">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>    
                                    </div>
                                    <div class="col-md-6">
                                        <div class="item">
                                            <div class="data">
                                                <div class="title" id='AsetKategori'>Aset</div>
                                                <div class="nilai" id='Asetrealisasi'>265.16</div>
                                            </div>
                                            <div class="ikon">
                                                <img src="images/icon-aset.png">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>    
                                        <div class="item">
                                            <div class="data">
                                                <div class="title" id='PiutangUsahaKategori'>Piutang Usaha</div>
                                                <div class="nilai" id='PiutangUsaharealisasi'>30.81</div>
                                            </div>
                                            <div class="ikon">
                                                <img src="images/icon-piutang-usaha.png">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>    
                                        <div class="item">
                                            <div class="data">
                                                <div class="title" id='SaldoKasKategori'>Saldo Kas</div>
                                                <div class="nilai" id='SaldoKasrealisasi'>3.08</div>
                                            </div>
                                            <div class="ikon">
                                                <img src="images/icon-saldo-kas.png">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>    
                                    </div>
                                    
                                </div>
                                <!-- <div class="row">
                                    <div class="col-md-12">
                                        <div class="area-sumber-data">
                                            <label>Sumber data : <span>Navitas</span></label>
                                            <label>Last update : <span>4 Agustus 2023</span></label>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="area-sumber-data">
                                    <label>Sumber data : <span>PBR</span></label>
                                    <label>Last update : <span id='tgl_entri_kinerjakeuangankorporat'>4 Agustus 2023</span></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Services item -->
                    <div class="col-md-6 col-lg-5 col-xs-12 padding-none">
                        <div class="services-item wow fadeInDown" data-wow-delay="1.2s">
                            <div class="area-kpi-keuangan">
                                <div class="judul">
                                    <span class="ikon"><img src="images/icon-kpi-keuangan.png"></span> KPI Keuangan
                                    <a class="selengkapnya pull-right" id="detilkpikeuangan" href="javascript:void(0)"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a>
                                </div>
                                <div class="inner" id='textKeuangan'>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-md-12">
                                        <div class="area-sumber-data">
                                            <label>Sumber data : <span>Navitas</span></label>
                                            <label>Last update : <span>4 Agustus 2023</span></label>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="area-sumber-data">
                                    <label>Sumber data : <span>PBR</span></label>
                                    <label>Last update : <span id='tgl_entri_KPIKeuangan'></span></label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Services item -->
            <div class="col-md-6 col-lg-3 col-xs-12 padding-none">
                <div class="services-item wow fadeInDown" data-wow-delay="1.4s">
                    <div class="area-kinerja-proyek">
                        <div class="judul">
                            <span class="ikon"><img src="images/icon-kinerja-proyek.png"></span> Kinerja Proyek
                            <a class="selengkapnya pull-right" id="detilkinerjaproyek" href="javascript:void(0)"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a>
                        </div>
                        <div class="row inner">
                            <div class="col-md-5 padding-none">
                                <div class="gambar">
                                    <img src="images/img-kinerja-proyek.png">
                                </div>
                            </div>
                            <div class="col-md-7 padding-none">
                                <div class="grafik-kinerja-proyek" id="grafik-kinerja-proyek"></div>
                                <div class="area-legend">
                                    <div class="inner">
                                        <div class="item late">
                                            <div class="tanda"><i class="fa fa-circle" aria-hidden="true"></i></div>
                                            <div class="data"  id='listStatusLate'>Late</div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="item on-schedule">
                                            <div class="tanda"><i class="fa fa-circle" aria-hidden="true"></i></div>
                                            <div class="data" id='listStatusOnSchedule'>On Schedule</div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="item not-started">
                                            <div class="tanda"><i class="fa fa-circle" aria-hidden="true"></i></div>
                                            <div class="data" id='listStatusNotStarted'>Not Started</div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="item completed">
                                            <div class="tanda"><i class="fa fa-circle" aria-hidden="true"></i></div>
                                            <div class="data" id='listStatusCompleted'>Completed</div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <!-- <div class="row">
                            <div class="col-md-12">
                                <div class="area-sumber-data">
                                    <label>Sumber data : <span>Navitas</span></label>
                                    <label>Last update : <span>4 Agustus 2023</span></label>
                                </div>
                            </div>
                        </div> -->
                        <div class="area-sumber-data">
                            <label>Sumber data : <span>Prime</span></label>
                            <label>Last update : <span id='updated_at_kinerjaproyek'><?=$vtoday?></span></label>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Services Section End -->

<!-- HIGHCHARTS -->
<script src="lib/highcharts/highcharts.js"></script>
<script src="lib/highcharts/exporting.js"></script>
<script src="lib/highcharts/accessibility.js"></script>
<script src="lib/highcharts/export-data.js"></script>

<script type="text/javascript">
    // Create the chart
    Highcharts.chart('kesiapan-daya-mampu', {
      chart: {
        type: 'pie',
        margin: [0,0,0,0],
        backgroundColor: null
      },
      exporting: {
        enabled: false
      },
      title: {
        text: null
      },
      subtitle: {
        text: `<div class=persentase id=persentase-kesiapan-daya-mampu>100%</div>`,
        align: "center",
        verticalAlign: "middle",
        style: {
          "fontSize": "7px",
          "textAlign": "center"
        },
        x: 0,
        y: 10,
        useHTML: true
      },
      plotOptions: {
        pie: {
          shadow: false,
          center: ["50%", "50%"],
          dataLabels: {
            enabled: false
          },
          states: {
            hover: {
              enabled: false
            }
          },
          size: "100%",
          innerSize: "95%",
          borderColor: null,
          borderWidth: 0
        }

      },
      tooltip: {
        valueSuffix: '%'
      },
      series: [{
        innerSize: '60%',
        data: [{
          name: 'Progress',
          y: 100,
          color: '#40c29c'
        }, {
          name: 'Belum Progress',
          y: 0,
        }]
      }],
    });

    // Create the chart
    Highcharts.chart('kesiapan-normal-operasi', {
      chart: {
        type: 'pie',
        margin: [0,0,0,0],
        backgroundColor: null
      },
      exporting: {
        enabled: false
      },
      title: {
        text: null
      },
      subtitle: {
        text: `<div class=persentase id=persentase-kesiapan-normal-operasi>100%</div>`,
        align: "center",
        verticalAlign: "middle",
        style: {
          "fontSize": "7px",
          "textAlign": "center"
        },
        x: 0,
        y: 10,
        useHTML: true
      },
      plotOptions: {
        pie: {
          shadow: false,
          center: ["50%", "50%"],
          dataLabels: {
            enabled: false
          },
          states: {
            hover: {
              enabled: false
            }
          },
          size: "100%",
          innerSize: "95%",
          borderColor: null,
          borderWidth: 0
        }

      },
      tooltip: {
        valueSuffix: '%'
      },
      series: [{
        innerSize: '60%',
        data: [{
          name: 'Progress',
          y: 100,
          color: '#40c29c'
        }, {
          name: 'Belum Progress',
          y: 0,
        }]
      }],
    });

    // Create the chart
    Highcharts.chart('kesiapan-derating', {
      chart: {
        type: 'pie',
        margin: [0,0,0,0],
        backgroundColor: null
      },
      exporting: {
        enabled: false
      },
      title: {
        text: null
      },
      subtitle: {
        text: `<div class=persentase id=persentase_derating_operasi>100%</div>`,
        align: "center",
        verticalAlign: "middle",
        style: {
          "fontSize": "7px",
          "textAlign": "center"
        },
        x: 0,
        y: 10,
        useHTML: true
      },
      plotOptions: {
        pie: {
          shadow: false,
          center: ["50%", "50%"],
          dataLabels: {
            enabled: false
          },
          states: {
            hover: {
              enabled: false
            }
          },
          size: "100%",
          innerSize: "95%",
          borderColor: null,
          borderWidth: 0
        }

      },
      tooltip: {
        valueSuffix: '%'
      },
      series: [{
        innerSize: '60%',
        data: [{
          name: 'Progress',
          y: 100,
          color: '#40c29c'
        }, {
          name: 'Belum Progress',
          y: 0,
        }]
      }],
    });

    // Create the chart
    Highcharts.chart('kesiapan-outage', {
      chart: {
        type: 'pie',
        margin: [0,0,0,0],
        backgroundColor: null
      },
      exporting: {
        enabled: false
      },
      title: {
        text: null
      },
      subtitle: {
        text: `<div class=persentase id=persentase_outage_operasi>100%</div>`,
        align: "center",
        verticalAlign: "middle",
        style: {
          "fontSize": "7px",
          "textAlign": "center"
        },
        x: 0,
        y: 10,
        useHTML: true
      },
      plotOptions: {
        pie: {
          shadow: false,
          center: ["50%", "50%"],
          dataLabels: {
            enabled: false
          },
          states: {
            hover: {
              enabled: false
            }
          },
          size: "100%",
          innerSize: "95%",
          borderColor: null,
          borderWidth: 0
        }

      },
      tooltip: {
        valueSuffix: '%'
      },
      series: [{
        innerSize: '60%',
        data: [{
          name: 'Progress',
          y: 100,
          color: '#40c29c'
        }, {
          name: 'Belum Progress',
          y: 0,
        }]
      }],
    });

    // Create the chart
    Highcharts.chart('kesiapan-standby', {
      chart: {
        type: 'pie',
        margin: [0,0,0,0],
        backgroundColor: null
      },
      exporting: {
        enabled: false
      },
      title: {
        text: null
      },
      subtitle: {
        text: `<div class=persentase id=persentase_mw_standby>100%</div>`,
        align: "center",
        verticalAlign: "middle",
        style: {
          "fontSize": "7px",
          "textAlign": "center"
        },
        x: 0,
        y: 10,
        useHTML: true
      },
      plotOptions: {
        pie: {
          shadow: false,
          center: ["50%", "50%"],
          dataLabels: {
            enabled: false
          },
          states: {
            hover: {
              enabled: false
            }
          },
          size: "100%",
          innerSize: "95%",
          borderColor: null,
          borderWidth: 0
        }

      },
      tooltip: {
        valueSuffix: '%'
      },
      series: [{
        innerSize: '60%',
        data: [{
          name: 'Progress',
          y: 100,
          color: '#40c29c'
        }, {
          name: 'Belum Progress',
          y: 0,
        }]
      }],
    });

    // Create the chart
    Highcharts.chart('kesiapan-total', {
      chart: {
        type: 'pie',
        margin: [0,0,0,0],
        backgroundColor: null
      },
      exporting: {
        enabled: false
      },
      title: {
        text: null
      },
      subtitle: {
        text: `<div class=persentase id='persentase_total_kesiapan'>100%</div>`,
        align: "center",
        verticalAlign: "middle",
        style: {
          "fontSize": "7px",
          "textAlign": "center"
        },
        x: 0,
        y: 10,
        useHTML: true
      },
      plotOptions: {
        pie: {
          shadow: false,
          center: ["50%", "50%"],
          dataLabels: {
            enabled: false
          },
          states: {
            hover: {
              enabled: false
            }
          },
          size: "100%",
          innerSize: "95%",
          borderColor: null,
          borderWidth: 0
        }

      },
      tooltip: {
        valueSuffix: '%'
      },
      series: [{
        innerSize: '60%',
        data: [{
          name: 'Progress',
          y: 100,
          color: '#40c29c'
        }, {
          name: 'Belum Progress',
          y: 0,
        }]
      }],
    });

    Highcharts.chart('grafik-kinerja-proyek', {
        chart: {
            type: 'column',
            backgroundColor: null,
            margin: [0,22,0,22]
        },
        exporting: {
            enabled: false
        },
        title: {
            text: null
        },
        subtitle: {
            text: null
        },
        xAxis: {
            type: 'category',
            labels: {
                autoRotation: [-45, -90],
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                },
                enabled: false
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: null
            },
            labels: {
                enabled: false
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: '<b>{point.y:.1f} Proyek </b>'
        },
        series: [{
            name: 'Jumlah Status Proyek',
            colors: [
                '#db4349', '#6ec2e6', '#7987a0', '#0f7f12'
            ],
            colorByPoint: true,
            groupPadding: 0,
            data: [
                ['Late ', 7],
                ['On Schedule', 1],
                ['Not Started', 9],
                ['Completed', 4]
            ],
            dataLabels: {
                enabled: false,
                rotation: -90,
                color: '#FFFFFF',
                align: 'right',
                format: '{point.y:.1f}', // one decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });
    
    // Data retrieved from https://netmarketshare.com
    Highcharts.chart('grafik-pie-kinerja-korporat', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie',
            backgroundColor: null,
            margin: [0,0,0,0]
        },
        exporting: {
            enabled: false
        },
        title: {
            text: null,
            align: 'left'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                },
                borderWidth: 0
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: '≥ 100%',
                y: 14,
                // sliced: true,
                selected: true,
                color: '#22b55d'
            }, {
                name: '≥ 95% - ≤ 100%',
                y: 4,
                color: '#fdc02f'
            },  {
                name: '<95%',
                y: 9,
                color: '#d93749'
            }, {
                name: 'On track',
                y: 1,
                color: '#136df6'
            }, {
                name: 'On track',
                y: 6,
                color: '#7987a0'
            }]
        }]
    });

</script>

<script>
    bln= parseInt($("#bln").val());
    thn= parseInt($("#thn").val());

    $(document).ready(function() {
        $("#detilkinerjakooporat, #detilpetapembangkit, #detilpenjualan, #detilkesiapanpembangkit, #detilkinerjakeuangankorporat, #detilkpikeuangan, #detilkinerjaproyek").on('click',function(){
            vbuttonid= $(this).attr('id');
            bln= parseInt($("#bln").val());
            thn= parseInt($("#thn").val());

            vurl= "";
            if(vbuttonid == "detilkinerjakooporat")
            {
                vurl= "app/index/kinerja_korporat?b="+bln+"&t="+thn;
            }
            else if(vbuttonid == "detilpetapembangkit")
            {
                vurl= "app/index/peta_pembangkit?b="+bln+"&t="+thn;
            }
            else if(vbuttonid == "detilpenjualan")
            {
                vurl= "app/index/penjualan?b="+bln+"&t="+thn;
            }
            else if(vbuttonid == "detilkesiapanpembangkit")
            {
                vurl= "app/index/kesiapan_pembangkit?b="+bln+"&t="+thn;
            }
            else if(vbuttonid == "detilkinerjakeuangankorporat")
            {
                vurl= "app/index/kinerja_keuangan_korporat?b="+bln+"&t="+thn;
            }
            else if(vbuttonid == "detilkpikeuangan")
            {
                vurl= "app/index/kpi_keuangan?b="+bln+"&t="+thn;
            }
            else if(vbuttonid == "detilkinerjaproyek")
            {
                vurl= "app/index/kinerja_proyek?b="+bln+"&t="+thn;
            }

            if(vurl !== "")
            {
                document.location.href= vurl;
            }
        });

        bln= parseInt($("#bln").val());
        PetaPembangkit();
        Penjualan();
        KesiapanPembangkit();
        KinerjaProyek();
        KinerjaKorporat();
        KinerjaKeuanganKorporat();
        KPIKeuangan();

        $("#bln,#thn").on('change',function(){
            bln= parseInt($("#bln").val());
            thn= parseInt($("#thn").val());

            $('#vlsxloading').show();
            modifyUrl('Dashboard | PT PLN Nusantara Power', 'app?b='+bln+'&t='+thn);

            Penjualan()
            KinerjaKorporat();
            KinerjaKeuanganKorporat();
            KPIKeuangan();

            $('#vlsxloading').hide();
        });
    })

    function PetaPembangkit(){
        $.ajax({
            url : 'json-api/PetaPembangkit_json/home',
            type : 'GET',
            dataType : 'text',
            success : function(text) {
                text= JSON.parse(text)
                $('#TotalUnit').html(text['TotalUnit']);
                $('#TotalDayaTerpasang').html(text['TotalDayaTerpasang']);
                $('#TotalDayaMampu').html(text['TotalDayaMampu']);
                $('#TextJenisPembangkit').html(text['TextJenisPembangkit']);
            }
        });
    }

    function Penjualan(){
        $.ajax({
            url : 'json-api/Penjualan_json/home?bln='+bln+'&thn='+thn,
            type : 'GET',
            dataType : 'text',
            success : function(text) {
                text= JSON.parse(text)
                $('#textPenjualan').html(text['textPenjualan']);
                $('#tgl_entri_penjualan').html(text['tgl_entri_penjualan']);
            }
        });
    }

    function KesiapanPembangkit(){
        $.ajax({
            url : 'json-api/KesiapanPembangkit_json/home',
            type : 'GET',
            dataType : 'text',
            success : function(text) {
                text= JSON.parse(text)
                $('#mw_dmn').html(text['mw_dmn']);
                $('#persentase-kesiapan-daya-mampu').html(text['per_dmn']+" %");
                $('#mw_normal_operasi').html(text['mw_normal_operasi']);
                $('#persentase-kesiapan-normal-operasi').html(text['per_normal_operasi']+" %");
                $('#mw_derating_operasi').html(text['mw_derating_operasi']);
                $('#persentase_derating_operasi').html(text['per_derating_operasi']+" %");
                $('#mw_outage').html(text['mw_outage']);
                $('#persentase_outage_operasi').html(text['per_outage_operasi']+" %");
                $('#mw_standby').html(text['mw_standby']);
                $('#persentase_mw_standby').html(text['per_mw_standby']+" %");
                $('#mw_total_kesiapan').html(text['mw_total_kesiapan']);
                $('#persentase_total_kesiapan').html(text['per_total_kesiapan']+" %");
                $('#tgl_entri_kesiapanpembangkit').html(text['tgl_entri_kesiapanpembangkit']);

                persen=parseFloat(text['per_dmn']);
                if(persen >= 100){
                // hijau
                    warna='#47ce6b';
                } else if(persen >= 95 && persen < 100){
                // kuning
                    warna='#f6cd2f';
                } else{
                // merah
                    warna='#ce3453';
                }

                sisa=100-parseFloat(text['per_dmn']);
                chart1 = $('#kesiapan-daya-mampu').highcharts();
                chart1.series[0].update({
                    data: [{
                      name: 'Progress',
                      y: parseFloat(text['per_dmn']),
                      color: warna
                    }, {
                      name: 'Belum Progress',
                      y: sisa,
                      color: 'gray'
                    }],
                    }, false);
                chart1.redraw();

                persen=parseFloat(text['per_normal_operasi']);
                if(persen >= 100){
                // hijau
                    warna='#47ce6b';
                } else if(persen >= 95 && persen < 100){
                // kuning
                    warna='#f6cd2f';
                } else{
                // merah
                    warna='#ce3453';
                }
                sisa=100-parseFloat(text['per_normal_operasi']);
                chart1 = $('#kesiapan-normal-operasi').highcharts();
                chart1.series[0].update({
                    data: [{
                      name: 'Progress',
                      y: parseFloat(text['per_normal_operasi']),
                      color: warna
                    }, {
                      name: 'Belum Progress',
                      y: sisa,
                      color: 'gray'
                    }],
                    }, false);
                chart1.redraw();

                persen=parseFloat(text['per_derating_operasi']);
                if(persen >= 100){
                // hijau
                    warna='#47ce6b';
                } else if(persen >= 95 && persen < 100){
                // kuning
                    warna='#f6cd2f';
                } else{
                // merah
                    warna='#ce3453';
                }
                sisa=100-parseFloat(text['per_derating_operasi']);
                chart1 = $('#kesiapan-derating').highcharts();
                chart1.series[0].update({
                      data: [{
                      name: 'Progress',
                      y: parseFloat(text['per_derating_operasi']),
                      color: warna
                    }, {
                      name: 'Belum Progress',
                      y: sisa,
                      color: 'gray'
                    }],
                    }, false);
                chart1.redraw();

                persen=parseFloat(text['per_outage_operasi']);
                if(persen >= 100){
                // hijau
                    warna='#47ce6b';
                } else if(persen >= 95 && persen < 100){
                // kuning
                    warna='#f6cd2f';
                } else{
                // merah
                    warna='#ce3453';
                }
                sisa=100-parseFloat(text['per_outage_operasi']);
                chart1 = $('#kesiapan-outage').highcharts();
                chart1.series[0].update({
                      data: [{
                      name: 'Progress',
                      y: parseFloat(text['per_outage_operasi']),
                      color: warna
                    }, {
                      name: 'Belum Progress',
                      y: sisa,
                      color: 'gray'
                    }],
                    }, false);
                chart1.redraw();

                persen=parseFloat(text['per_mw_standby']);
                if(persen >= 100){
                // hijau
                    warna='#47ce6b';
                } else if(persen >= 95 && persen < 100){
                // kuning
                    warna='#f6cd2f';
                } else{
                // merah
                    warna='#ce3453';
                }
                sisa=100-parseFloat(text['per_mw_standby']);
                chart1 = $('#kesiapan-standby').highcharts();
                chart1.series[0].update({
                      data: [{
                      name: 'Progress',
                      y: parseFloat(text['per_mw_standby']),
                      color: warna
                    }, {
                      name: 'Belum Progress',
                      y: sisa,
                      color: 'gray'
                    }],
                    }, false);
                chart1.redraw();

                persen=parseFloat(text['per_total_kesiapan']);
                if(persen >= 100){
                // hijau
                    warna='#47ce6b';
                } else if(persen >= 95 && persen < 100){
                // kuning
                    warna='#f6cd2f';
                } else{
                // merah
                    warna='#ce3453';
                }
                sisa=100-parseFloat(text['per_total_kesiapan']);
                chart1 = $('#kesiapan-total').highcharts();
                chart1.series[0].update({
                    data: [{
                      name: 'Progress',
                      y: parseFloat(text['per_total_kesiapan']),
                      color: warna
                    }, {
                      name: 'Belum Progress',
                      y: sisa,
                      color: 'gray'
                    }],
                    }, false);
                chart1.redraw();
            }
        });
    }
    
    function KinerjaKeuanganKorporat(){
        $.ajax({
            url : 'json-api/KinerjaKeuanganKorporat_json/home?bln='+bln+'&thn='+thn,
            type : 'GET',
            dataType : 'text',
            success : function(text) {
                text= JSON.parse(text)
                $('#LabaRugiKategori').html(text["LabaRugi"]['kategori']);
                $('#LabaRugirealisasi').html(text["LabaRugi"]['realisasi']);
                $('#AsetKategori').html(text["Aset"]['kategori']);
                $('#Asetrealisasi').html(text["Aset"]['realisasi']);
                $('#PendapatanUsahaKategori').html(text["PendapatanUsaha"]['kategori']);
                $('#PendapatanUsaharealisasi').html(text["PendapatanUsaha"]['realisasi']);
                $('#PiutangUsahaKategori').html(text["PiutangUsaha"]['kategori']);
                $('#PiutangUsaharealisasi').html(text["PiutangUsaha"]['realisasi']);
                $('#BebanUsahaKategori').html(text["BebanUsaha"]['kategori']);
                $('#BebanUsaharealisasi').html(text["BebanUsaha"]['realisasi']);
                $('#SaldoKasKategori').html(text["SaldoKas"]['kategori']);
                $('#SaldoKasrealisasi').html(text["SaldoKas"]['realisasi']);
                $('#tgl_entri_kinerjakeuangankorporat').html(text['tgl_entri_kinerjakeuangankorporat']);
            }        
        });
    }

    function KPIKeuangan(){
        $.ajax({
            url : 'json-api/KPIKeuangan_json/home?bln='+bln+'&thn='+thn,
            type : 'GET',
            dataType : 'text',
            success : function(text) {
                text= JSON.parse(text)
                $('#textKeuangan').html(text["textKeuangan"]);
                $('#tgl_entri_KPIKeuangan').html(text["tgl_entri"]);
            }        
        });
    }

    function KinerjaProyek(){
        $.ajax({
            url : 'json-api/KinerjaProyek_json/home',
            type : 'GET',
            dataType : 'text',
            success : function(text) {
                text= JSON.parse(text)
                $('#listStatusLate').html('Late ('+text["listStatusLate"]+')');
                $('#listStatusCompleted').html('Completed ('+text["listStatusCompleted"]+')');
                $('#listStatusNotStarted').html('Not Started ('+text["listStatusNotStarted"]+')');
                $('#listStatusOnSchedule').html('On Schedule ('+text["listStatusOnSchedule"]+')');
                // $('#updated_at_kinerjaproyek').html(text["updated_at_kinerjaproyek"]);

                $('#updated_at_kinerjaproyek').html("<?=$vtoday?>");

                chart1 = $('#grafik-kinerja-proyek').highcharts();
                chart1.series[0].update({
                    data: [['Late ', text["listStatusLate"]],['On Schedule', text["listStatusOnSchedule"]],['Not Started', text["listStatusNotStarted"]],['Completed', text["listStatusCompleted"]]]
                    }, false);
                chart1.redraw();
            }        
        });
    }

    function KinerjaKorporat(){
        $.ajax({
            url : 'json-api/KinerjaKorporat_json/home?bln='+bln+'&thn='+thn,
            type : 'GET',
            dataType : 'text',
            success : function(text) {
                text= JSON.parse(text)
                $('#listStatusBelumPenilaian').html(text["listStatusBelumPenilaian"]);
                $('#listStatus100').html(text["listStatus100"]);
                $('#listStatus95').html(text["listStatus95"]);
                $('#listStatus90').html(text["listStatus90"]);
                $('#totalKpi').html(text["totalKpi"]);

                chart1 = $('#grafik-pie-kinerja-korporat').highcharts();
                chart1.series[0].update({
                    data: [{
                        name: '≥ 100%',
                        y: text["listStatus100"],
                        // sliced: true,
                        selected: true,
                        color: '#22b55d'
                    }, {
                        name: '≥ 95% - ≤ 100%',
                        y: text["listStatus95"],
                        color: '#fdc02f'
                    },  {
                        name: '<95%',
                        y: text["listStatus90"],
                        color: '#d93749'
                    }, {
                        name: 'Belum Dilakukan',
                        y: text["listStatusBelumPenilaian"],
                        color: '#7987a0'
                    }]
                    }, false);
                chart1.redraw();
            }        
        });
    }
</script>