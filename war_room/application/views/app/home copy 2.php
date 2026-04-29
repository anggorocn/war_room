<?php
include_once("functions/string.func.php");
include_once("functions/date.func.php");
?>

<!-- <div class="col-md-12">
    <div class="judul-halaman"> Halaman home</div>
    <div class="konten-area">
    	konten home
        
    </div>
</div> -->

<!-- <link rel="stylesheet" href="lib/animate/docs/animate.min.css" />
<link rel="stylesheet" href="lib/animate/docs/style.css" /> -->


<!-- <section id="main">
  <article class="main-content" style="border: 1px solid red;">
    <div class="col-md-12">
        <div class="judul-halaman"> Halaman home</div>
        <div class="konten-area">
            konten home

            <li class="animation-item" data-animation="headShake">
                <span class="animation-item--title">headShake</span>
                <button class="copy-icon" type="button">
                    <span class="tooltip">Copy class name to clipboard</span>
                </button>
            </li>
            
        </div>
    </div>
  </article>
</section> -->



<!-- Services Section Start -->
<section id="services" class="services section-padding">
  <div class="container-fluid">
    <!-- <div class="row">
      <div class="col-12">
        <div class="section-title-header text-center">
          <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">Why You Choose Us?</h1>
          <p class="wow fadeInDown" data-wow-delay="0.2s">Global Grand Event on Digital Design</p>
        </div>
      </div>
    </div> -->
    <div class="row services-wrapper">
      <!-- Services item -->
      <div class="col-md-6 col-lg-5 col-xs-12 padding-none">
        <div class="services-item wow fadeInDown" data-wow-delay="0.2s">
            <div class="area-peta-pembangkit">
                <div class="row">
                    <div class="col-md-4">
                        <div class="area-total-unit">
                            <div class="ikon"><img src="images/icon-pembangkit.png"></div>
                            <div class="nilai">151</div>
                            <div class="title">Total Unit</div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="area-peta">
                            <div class="judul"><i class="fa fa-map-marker" aria-hidden="true"></i> Peta Pembangkit</div>
                            <div class="area-total-daya">
                                <div class="inner">
                                    <div class="item">
                                        <div class="nilai">17775,23 MW</div>
                                        <div class="title">Total Daya Terpasang</div>
                                    </div>
                                    <div class="item mampu">
                                        <div class="nilai">15314,94 MW</div>
                                        <div class="title">Total Daya Mampu</div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          <!-- <div class="icon">
            <i class="lni-heart"></i>
          </div> -->
          <!-- <div class="services-content">
            <h3><a href="#">Get Inspired</a></h3>
            <p>Lorem ipsum dolor sit amet, consectetuer commodo ligula eget dolor.</p>
          </div> -->
        </div>
      </div>
      <!-- Services item -->
      <div class="col-md-6 col-lg-4 col-xs-12">
        <div class="services-item wow fadeInDown" data-wow-delay="0.4s">
            <div class="area-penjualan">
                <div class="judul"><i class="fa fa-map-marker" aria-hidden="true"></i> Penjualan</div>
                <div class="row inner">
                    <div class="col-md-6 padding-none">
                        <div class="item">
                            <div class="caption">Pencapaian ROB (GWh)</div>
                            <div class="title">Realisasi</div>
                            <div class="nilai">17860.00</div>
                            <div class="title">Target</div>
                            <div class="nilai">17669.00</div>
                            <div class="persen">
                                <i class="fa fa-circle" aria-hidden="true"></i>
                                <div class="nilai">101,08%</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 padding-none">
                        <div class="item">
                            <div class="caption">Pencapaian ROB (GWh)</div>
                            <div class="title">Realisasi</div>
                            <div class="nilai">17860.00</div>
                            <div class="title">Target</div>
                            <div class="nilai">17669.00</div>
                            <div class="persen">
                                <i class="fa fa-circle" aria-hidden="true"></i>
                                <div class="nilai">101,08%</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 padding-none">
                        <div class="item">
                            <div class="caption">Pencapaian ROB (GWh)</div>
                            <div class="title">Realisasi</div>
                            <div class="nilai">17860.00</div>
                            <div class="title">Target</div>
                            <div class="nilai">17669.00</div>
                            <div class="persen">
                                <i class="fa fa-circle" aria-hidden="true"></i>
                                <div class="nilai">101,08%</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 padding-none">
                        <div class="item">
                            <div class="caption">Pencapaian ROB (GWh)</div>
                            <div class="title">Realisasi</div>
                            <div class="nilai">17860.00</div>
                            <div class="title">Target</div>
                            <div class="nilai">17669.00</div>
                            <div class="persen">
                                <i class="fa fa-circle" aria-hidden="true"></i>
                                <div class="nilai">101,08%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          <!-- <div class="icon">
            <i class="lni-gallery"></i>
          </div>
          <div class="services-content">
            <h3><a href="#">Meet New Faces</a></h3>
            <p>Lorem ipsum dolor sit amet, consectetuer commodo ligula eget dolor.</p>
          </div> -->
        </div>
      </div>

        

      <!-- Services item -->
      <div class="col-md-6 col-lg-3 col-xs-12 padding-none">
        <div class="services-item wow fadeInDown" data-wow-delay="0.6s">
            <div class="area-kesiapan-pembangkit">
                <div class="judul">Kesiapan Pembangkit</div>
                <div class="row inner">
                    <div class="col-md-4">
                        <div class="item">
                            <div class="grafik-progress" id="kesiapan-daya-mampu"></div>
                            <div class="title">Daya Mampu Net</div>
                            <div class="nilai">15017.84 MW</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="item">
                            <div class="grafik-progress" id="kesiapan-normal-operasi"></div>
                            <div class="title">Normal Operasi</div>
                            <div class="nilai">9439.12 MW</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="item">
                            <div class="grafik-progress" id="kesiapan-derating"></div>
                            <div class="title">Derating</div>
                            <div class="nilai">273.50 MW</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="item">
                            <div class="grafik-progress" id="kesiapan-outage"></div>
                            <div class="title">Outage</div>
                            <div class="nilai">2305.82 MW</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="item">
                            <div class="grafik-progress" id="kesiapan-standby"></div>
                            <div class="title">Standby</div>
                            <div class="nilai">2999.41 MW</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="item">
                            <div class="grafik-progress" id="kesiapan-total"></div>
                            <div class="title">Total Kesiapan</div>
                            <div class="nilai">12438.53 MW</div>
                        </div>
                    </div>
                </div>
                
            </div>
          <!-- <div class="icon">
            <i class="lni-envelope"></i>
          </div>
          <div class="services-content">
            <h3><a href="#">Fresh Tech Insights</a></h3>
            <p>Lorem ipsum dolor sit amet, consectetuer commodo ligula eget dolor.</p>
          </div> -->
        </div>
      </div>
    </div>
    <div class="row services-wrapper">
      <!-- Services item -->
      <div class="col-md-6 col-lg-3 col-xs-12 padding-none">
        <div class="services-item wow fadeInDown" data-wow-delay="0.8s">
            <div class="area-kinerja-korporat">
                kinerja korporat
            </div>
          <!-- <div class="icon">
            <i class="lni-cup"></i>
          </div>
          <div class="services-content">
            <h3><a href="#">Networking Session</a></h3>
            <p>Lorem ipsum dolor sit amet, consectetuer commodo ligula eget dolor.</p>
          </div> -->
        </div>
      </div>
       <!-- Services item -->
      <div class="col-md-6 col-lg-3 col-xs-12">
        <div class="services-item wow fadeInDown" data-wow-delay="1s">
            <div class="area-kinerja-keuangan-korporat">
                kinerja-keuangan-korporat
                <div class="row inner">
                    <div class="col-md-6">
                        <div class="item">
                            <div class="data">
                                <div class="title">Laba Rugi</div>
                                <div class="nilai">2.6</div>
                            </div>
                            <div class="ikon">
                                <img src="images/icon-laba-rugi.png">
                            </div>
                            <div class="clearfix"></div>
                        </div>    
                        <div class="item">
                            <div class="data">
                                <div class="title">Pendapatan Usaha</div>
                                <div class="nilai">13.24</div>
                            </div>
                            <div class="ikon">
                                <img src="images/icon-laba-rugi.png">
                            </div>
                            <div class="clearfix"></div>
                        </div>    
                        <div class="item">
                            <div class="data">
                                <div class="title">Beban Usaha</div>
                                <div class="nilai">10.78</div>
                            </div>
                            <div class="ikon">
                                <img src="images/icon-laba-rugi.png">
                            </div>
                            <div class="clearfix"></div>
                        </div>    
                    </div>
                    <div class="col-md-6">
                        <div class="item">
                            <div class="data">
                                <div class="title">Aset</div>
                                <div class="nilai">265.16</div>
                            </div>
                            <div class="ikon">
                                <img src="images/icon-laba-rugi.png">
                            </div>
                            <div class="clearfix"></div>
                        </div>    
                        <div class="item">
                            <div class="data">
                                <div class="title">Piutang Usaha</div>
                                <div class="nilai">30.81</div>
                            </div>
                            <div class="ikon">
                                <img src="images/icon-laba-rugi.png">
                            </div>
                            <div class="clearfix"></div>
                        </div>    
                        <div class="item">
                            <div class="data">
                                <div class="title">Saldo Kas</div>
                                <div class="nilai">3.08</div>
                            </div>
                            <div class="ikon">
                                <img src="images/icon-laba-rugi.png">
                            </div>
                            <div class="clearfix"></div>
                        </div>    
                    </div>
                    
                </div>
            </div>
          <!-- <div class="icon">
            <i class="lni-user"></i>
          </div>
          <div class="services-content">
            <h3><a href="#">Global Event</a></h3>
            <p>Lorem ipsum dolor sit amet, consectetuer commodo ligula eget dolor.</p>
          </div> -->
        </div>
      </div>
       <!-- Services item -->
      <div class="col-md-6 col-lg-3 col-xs-12">
        <div class="services-item wow fadeInDown" data-wow-delay="1.2s">
            <div class="area-kpi-keuangan">
                <div class="judul">KPI Keuangan</div>
                <div class="inner">
                    <div class="item">
                        <div class="data">
                            <div class="title">BPP Pembangkit</div>
                            <div class="nilai">100%</div>
                        </div>
                        <div class="tanda">
                            <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="item kuning">
                        <div class="data">
                            <div class="title">ROIC</div>
                            <div class="nilai">85.04%</div>
                        </div>
                        <div class="tanda">
                            <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="item">
                        <div class="data">
                            <div class="title">EBITDA</div>
                            <div class="nilai">110%</div>
                        </div>
                        <div class="tanda">
                            <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="item">
                        <div class="data">
                            <div class="title">Sinergi AP</div>
                            <div class="nilai">110%</div>
                        </div>
                        <div class="tanda">
                            <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="item merah">
                        <div class="data">
                            <div class="title">Pendapatan Diluar PLN Grup</div>
                            <div class="nilai">68.07%</div>
                        </div>
                        <div class="tanda">
                            <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
          <!-- <div class="icon">
            <i class="lni-bubble"></i>
          </div>
          <div class="services-content">
            <h3><a href="#">Free Swags</a></h3>
            <p>Lorem ipsum dolor sit amet, consectetuer commodo ligula eget dolor.</p>
          </div> -->
        </div>
      </div>
       <!-- Services item -->
      <div class="col-md-6 col-lg-3 col-xs-12 padding-none">
        <div class="services-item wow fadeInDown" data-wow-delay="1.4s">
            <div class="area-kinerja-proyek">
                <div class="judul">Kinerja Proyek</div>
                <div class="inner">
                    
                    <div id="grafik-kinerja-proyek"></div>
                </div>
            </div>
          <!-- <div class="icon">
            <i class="lni-bubble"></i>
          </div>
          <div class="services-content">
            <h3><a href="#">Free Swags</a></h3>
            <p>Lorem ipsum dolor sit amet, consectetuer commodo ligula eget dolor.</p>
          </div> -->
        </div>
      </div>

    </div>
  </div>
</section>
<!-- Services Section End -->


<script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>

        
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
                text: `<div>100%</div> of Total`,
                align: "center",
                verticalAlign: "middle",
                style: {
                  "fontSize": "7px",
                  "textAlign": "center"
                },
                x: 0,
                y: -2,
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

        </script>
        <script type="text/javascript">
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
                text: `<div>100%</div> of Total`,
                align: "center",
                verticalAlign: "middle",
                style: {
                  "fontSize": "7px",
                  "textAlign": "center"
                },
                x: 0,
                y: -2,
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

        </script>
        <script type="text/javascript">
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
                text: `<div>100%</div> of Total`,
                align: "center",
                verticalAlign: "middle",
                style: {
                  "fontSize": "7px",
                  "textAlign": "center"
                },
                x: 0,
                y: -2,
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

        </script>
        <script type="text/javascript">
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
                text: `<div>100%</div> of Total`,
                align: "center",
                verticalAlign: "middle",
                style: {
                  "fontSize": "7px",
                  "textAlign": "center"
                },
                x: 0,
                y: -2,
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

        </script>
        <script type="text/javascript">
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
                text: `<div>100%</div> of Total`,
                align: "center",
                verticalAlign: "middle",
                style: {
                  "fontSize": "7px",
                  "textAlign": "center"
                },
                x: 0,
                y: -2,
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

        </script>
        <script type="text/javascript">
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
                text: `<div>100%</div> of Total`,
                align: "center",
                verticalAlign: "middle",
                style: {
                  "fontSize": "7px",
                  "textAlign": "center"
                },
                x: 0,
                y: -2,
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

        </script>

        <!-- <script src="http://code.highcharts.com/highcharts.js"></script> -->
        <!-- <script src="http://code.highcharts.com/modules/exporting.js"></script> -->
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>
        <script type="text/javascript">
            Highcharts.chart('grafik-kinerja-proyek', {
                chart: {
                    type: 'column'
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
                        }
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Population (millions)'
                    }
                },
                legend: {
                    enabled: false
                },
                tooltip: {
                    pointFormat: 'Population in 2021: <b>{point.y:.1f} millions</b>'
                },
                series: [{
                    name: 'Population',
                    colors: [
                        '#9b20d9', '#9215ac', '#861ec9', '#7a17e6', '#7010f9', '#691af3',
                        '#6225ed', '#5b30e7', '#533be1', '#4c46db', '#4551d5', '#3e5ccf',
                        '#3667c9', '#2f72c3', '#277dbd', '#1f88b7', '#1693b1', '#0a9eaa',
                        '#03c69b',  '#00f194'
                    ],
                    colorByPoint: true,
                    groupPadding: 0,
                    data: [
                        ['Tokyo', 37.33],
                        ['Delhi', 31.18],
                        ['Shanghai', 27.79],
                        ['Sao Paulo', 22.23],
                        ['Mexico City', 21.91],
                        ['Dhaka', 21.74],
                        ['Cairo', 21.32],
                        ['Beijing', 20.89],
                        ['Mumbai', 20.67],
                        ['Osaka', 19.11],
                        ['Karachi', 16.45],
                        ['Chongqing', 16.38],
                        ['Istanbul', 15.41],
                        ['Buenos Aires', 15.25],
                        ['Kolkata', 14.974],
                        ['Kinshasa', 14.970],
                        ['Lagos', 14.86],
                        ['Manila', 14.16],
                        ['Tianjin', 13.79],
                        ['Guangzhou', 13.64]
                    ],
                    dataLabels: {
                        enabled: true,
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


        </script>
