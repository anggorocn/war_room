<?php
include_once("functions/string.func.php");
include_once("functions/date.func.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- <link rel="icon" href="../../favicon.ico"> -->

        <title>Dashboard | PT PLN Nusantara Power</title>
        <base href="<?=base_url();?>" />

        <!-- Bootstrap core CSS -->
        <link href="assets/bootstrap-3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="assets/bootstrap-3.3.7/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <!-- <link href="assets/bootstrap-3.3.7/docs/examples/starter-template/starter-template.css" rel="stylesheet"> -->

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="assets/bootstrap-3.3.7/docs/assets/js/ie-emulation-modes-warning.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <script src='js/jquery.min.js'></script>

        <link rel="stylesheet" type="text/css" href="css/gaya.css">
        <link rel="stylesheet" type="text/css" href="lib/font-awesome-4.7.0/css/font-awesome.css">

        <style type="text/css">
            .area-wrapper {
                max-height: none;
                height: calc(100vh - 0px);
            }
            .area-jumlah-lokasi-pembangkit .inner {
                max-height: calc(100vh - 90px);
            }
        </style>
    </head>

    <body class="dark">
      

<!-- Services Section Start -->
<section id="services" class="services section-padding">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="area-breadcrumb pull-left">
                    <ul class="breadcrumb">
                    <li><a href="app"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                    <!-- <li><a href="#">Peta Pembangkit</a></li>
                    <li><a href="#">Summer 15</a></li> -->
                    <li>Kesiapan Pembangkit</li>
                    </ul> 
                </div>
            </div>

            <div class="col-md-12">
                <div class="area-wrapper">
                    <div class="gambar-kesiapan-pembangkit">
                        <img src="images/img-kesiapan-pembangkit.png">
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="header-detil">
                                <div class="logo-pln-np pull-left"><img src="images/logo.png"></div>    
                                <div class="judul">
                                    <span class="ikon"><img src="images/icon-kesiapan-pembangkit.png"></span> Kesiapan Pembangkit
                                    <!-- <a class="selengkapnya pull-right" href="app/index/penjualan"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a> -->
                                </div>
                            </div>
                            
                        </div>
                        
                        <!-- Services item -->
                        <div class="col-md-6 col-lg-1 col-xs-12 padding-none">
                            &nbsp;
                        </div>

                        <!-- Services item -->
                        <div class="col-md-6 col-lg-5 col-xs-12 padding-none">
                            <div class="services-item wow fadeInDown" data-wow-delay="0.6s">

                                <div class="area-kesiapan-pembangkit detil">
                                    <!-- <div class="judul">
                                        <span class="ikon"><img src="images/icon-kesiapan-pembangkit.png"></span> Kesiapan Pembangkit
                                        <a class="selengkapnya pull-right" href="app/index/kesiapan_pembangkit"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a>
                                    </div> -->
                                    <div class="row inner">
                                        <div class="col-md-4 padding-none">
                                            <div class="item">
                                                <div class="grafik-progress" id="kesiapan-daya-mampu"></div>
                                                <div class="title">Daya Mampu Net</div>
                                                <div class="nilai">15017.84 MW</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 padding-none">
                                            <div class="item">
                                                <div class="grafik-progress" id="kesiapan-normal-operasi"></div>
                                                <div class="title">Normal Operasi</div>
                                                <div class="nilai">9439.12 MW</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 padding-none">
                                            <div class="item">
                                                <div class="grafik-progress" id="kesiapan-derating"></div>
                                                <div class="title">Derating</div>
                                                <div class="nilai">273.50 MW</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 padding-none">
                                            <div class="item">
                                                <div class="grafik-progress" id="kesiapan-outage"></div>
                                                <div class="title">Outage</div>
                                                <div class="nilai">2305.82 MW</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 padding-none">
                                            <div class="item">
                                                <div class="grafik-progress" id="kesiapan-standby"></div>
                                                <div class="title">Standby</div>
                                                <div class="nilai">2999.41 MW</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 padding-none">
                                            <div class="item">
                                                <div class="grafik-progress" id="kesiapan-total"></div>
                                                <div class="title">Total Kesiapan</div>
                                                <div class="nilai">12438.53 MW</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="legend-penjualan">
                                          <i class="fa fa-circle hijau" aria-hidden="true"></i> ≥ 95%          
                                          <i class="fa fa-circle kuning" aria-hidden="true"></i> 85% - < 95%          
                                          <i class="fa fa-circle merah" aria-hidden="true"></i> < 85%
                                        </div>
                                      </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <!-- Services item -->
                        <div class="col-md-6 col-lg-6 col-xs-12 padding-none">
                            <div class="services-item wow fadeInDown" data-wow-delay="0.6s">
                                <div class="area-jumlah-lokasi-pembangkit">
                                    <!-- area-jumlah-lokasi-pembangkit -->
                                    <div class="jumlah pull-right">Jumlah : 17 lokasi pembangkit</div>
                                    <div class="clearfix"></div>
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="inner">
                                          <div class="row">

                                            <div class="col-md-4 padding-none">
                                              <div class="item">
                                                <div class="title">Lokasi Pembangkit</div>
                                                <div class="caption">UP ARUN</div>
                                                <div class="title">DMN</div>
                                                <div class="nilai">184.87 MW</div>
                                                <div class="title">Normal Operasi</div>
                                                <div class="nilai">116.76 MW   <span class="persentase pull-right">63.16%</span></div>
                                                <div class="title">Derating</div>
                                                <div class="nilai">0.00 MW     <span class="persentase pull-right">0.00%</span></div>
                                                <div class="title">Outage</div>
                                                <div class="nilai">0.00 MW     <span class="persentase pull-right">0.00%</span></div>
                                                <div class="title">Standby</div>
                                                <div class="nilai">0.00 MW     <span class="persentase pull-right">0.00%</span></div>
                                                <div class="title">Total Kesiapan</div>
                                                <div class="nilai">100.00% <span class="pull-right"><i class="fa fa-circle hijau" aria-hidden="true"></i></span></div>
                                              </div>
                                            </div>
                                            <div class="col-md-4 padding-none">
                                              <div class="item">
                                                <div class="title">Lokasi Pembangkit</div>
                                                <div class="caption">UP BRANTAS</div>
                                                <div class="title">DMN</div>
                                                <div class="nilai">184.87 MW</div>
                                                <div class="title">Normal Operasi</div>
                                                <div class="nilai">116.76 MW   <span class="persentase pull-right">63.16%</span></div>
                                                <div class="title">Derating</div>
                                                <div class="nilai">0.00 MW     <span class="persentase pull-right">0.00%</span></div>
                                                <div class="title">Outage</div>
                                                <div class="nilai">0.00 MW     <span class="persentase pull-right">0.00%</span></div>
                                                <div class="title">Standby</div>
                                                <div class="nilai">0.00 MW     <span class="persentase pull-right">0.00%</span></div>
                                                <div class="title">Total Kesiapan</div>
                                                <div class="nilai">100.00% <span class="pull-right"><i class="fa fa-circle merah" aria-hidden="true"></i></span></div>
                                              </div>
                                            </div>
                                            <div class="col-md-4 padding-none">
                                              <div class="item">
                                                <div class="title">Lokasi Pembangkit</div>
                                                <div class="caption">UP CIRATA</div>
                                                <div class="title">DMN</div>
                                                <div class="nilai">184.87 MW</div>
                                                <div class="title">Normal Operasi</div>
                                                <div class="nilai">116.76 MW   <span class="persentase pull-right">63.16%</span></div>
                                                <div class="title">Derating</div>
                                                <div class="nilai">0.00 MW     <span class="persentase pull-right">0.00%</span></div>
                                                <div class="title">Outage</div>
                                                <div class="nilai">0.00 MW     <span class="persentase pull-right">0.00%</span></div>
                                                <div class="title">Standby</div>
                                                <div class="nilai">0.00 MW     <span class="persentase pull-right">0.00%</span></div>
                                                <div class="title">Total Kesiapan</div>
                                                <div class="nilai">100.00% <span class="pull-right"><i class="fa fa-circle kuning" aria-hidden="true"></i></span></div>
                                              </div>
                                            </div>
                                            <div class="col-md-4 padding-none">
                                              <div class="item">
                                                <div class="title">Lokasi Pembangkit</div>
                                                <div class="caption">UPDK BAKARU</div>
                                                <div class="title">DMN</div>
                                                <div class="nilai">184.87 MW</div>
                                                <div class="title">Normal Operasi</div>
                                                <div class="nilai">116.76 MW   <span class="persentase pull-right">63.16%</span></div>
                                                <div class="title">Derating</div>
                                                <div class="nilai">0.00 MW     <span class="persentase pull-right">0.00%</span></div>
                                                <div class="title">Outage</div>
                                                <div class="nilai">0.00 MW     <span class="persentase pull-right">0.00%</span></div>
                                                <div class="title">Standby</div>
                                                <div class="nilai">0.00 MW     <span class="persentase pull-right">0.00%</span></div>
                                                <div class="title">Total Kesiapan</div>
                                                <div class="nilai">100.00% <span class="pull-right"><i class="fa fa-circle hijau" aria-hidden="true"></i></span></div>
                                              </div>
                                            </div>
                                            <div class="col-md-4 padding-none">
                                              <div class="item">
                                                <div class="title">Lokasi Pembangkit</div>
                                                <div class="caption">UPDK BALIKPAPAN</div>
                                                <div class="title">DMN</div>
                                                <div class="nilai">184.87 MW</div>
                                                <div class="title">Normal Operasi</div>
                                                <div class="nilai">116.76 MW   <span class="persentase pull-right">63.16%</span></div>
                                                <div class="title">Derating</div>
                                                <div class="nilai">0.00 MW     <span class="persentase pull-right">0.00%</span></div>
                                                <div class="title">Outage</div>
                                                <div class="nilai">0.00 MW     <span class="persentase pull-right">0.00%</span></div>
                                                <div class="title">Standby</div>
                                                <div class="nilai">0.00 MW     <span class="persentase pull-right">0.00%</span></div>
                                                <div class="title">Total Kesiapan</div>
                                                <div class="nilai">100.00% <span class="pull-right"><i class="fa fa-circle hijau" aria-hidden="true"></i></span></div>
                                              </div>
                                            </div>
                                            <div class="col-md-4 padding-none">
                                              <div class="item">
                                                <div class="title">Lokasi Pembangkit</div>
                                                <div class="caption">UPDK BANDAR LAMPUNG</div>
                                                <div class="title">DMN</div>
                                                <div class="nilai">184.87 MW</div>
                                                <div class="title">Normal Operasi</div>
                                                <div class="nilai">116.76 MW   <span class="persentase pull-right">63.16%</span></div>
                                                <div class="title">Derating</div>
                                                <div class="nilai">0.00 MW     <span class="persentase pull-right">0.00%</span></div>
                                                <div class="title">Outage</div>
                                                <div class="nilai">0.00 MW     <span class="persentase pull-right">0.00%</span></div>
                                                <div class="title">Standby</div>
                                                <div class="nilai">0.00 MW     <span class="persentase pull-right">0.00%</span></div>
                                                <div class="title">Total Kesiapan</div>
                                                <div class="nilai">100.00% <span class="pull-right"><i class="fa fa-circle hijau" aria-hidden="true"></i></span></div>
                                              </div>
                                            </div>
                                            <div class="col-md-4 padding-none">
                                              <div class="item">
                                                <div class="title">Lokasi Pembangkit</div>
                                                <div class="caption">TEST</div>
                                                <div class="title">DMN</div>
                                                <div class="nilai">184.87 MW</div>
                                                <div class="title">Normal Operasi</div>
                                                <div class="nilai">116.76 MW   <span class="persentase pull-right">63.16%</span></div>
                                                <div class="title">Derating</div>
                                                <div class="nilai">0.00 MW     <span class="persentase pull-right">0.00%</span></div>
                                                <div class="title">Outage</div>
                                                <div class="nilai">0.00 MW     <span class="persentase pull-right">0.00%</span></div>
                                                <div class="title">Standby</div>
                                                <div class="nilai">0.00 MW     <span class="persentase pull-right">0.00%</span></div>
                                                <div class="title">Total Kesiapan</div>
                                                <div class="nilai">100.00% <span class="pull-right"><i class="fa fa-circle hijau" aria-hidden="true"></i></span></div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="area-sumber-data detil">
                          <label>Sumber data : <span>Navitas</span></label>
                          <label>Last update : <span>4 Agustus 2023</span></label>
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
                text: `<div class=persentase>100%</div>`,
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
                text: `<div class=persentase>100%</div>`,
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
                text: `<div class=persentase>100%</div>`,
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
                text: `<div class=persentase>100%</div>`,
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
                text: `<div class=persentase>100%</div>`,
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
                text: `<div class=persentase>82.83%</div>`,
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
                  y: 82.83,
                  color: '#e23b3b'
                }, {
                  name: 'Belum Progress',
                  y: 17,
                  color: '#c7c7c7'
                }]
              }],
            });
        </script>

<!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
        <script>window.jQuery || document.write('<script src="assets/bootstrap-3.3.7/docs/assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="assets/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="assets/bootstrap-3.3.7/docs/assets/js/ie10-viewport-bug-workaround.js"></script>

    </body>
</html>

