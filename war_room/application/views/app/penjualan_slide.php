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
    				<li>Penjualan</li>
  				</ul> 
  			</div>
      </div>

      <div class="col-md-12">
        <div class="area-wrapper">
          <div class="row">
            <!-- Services item -->
            <div class="col-md-6 col-lg-1 col-xs-12">
              <div class="services-item wow fadeInDown" data-wow-delay="0.4s">
                  <div class="area-woman-penjualan">
                    <img src="images/img-woman-penjualan.png">
                  </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-11 col-xs-12">
              <div class="row">
                <!-- Services item -->
                <div class="col-md-6 col-lg-6 col-xs-12">
                  <div class="services-item wow fadeInDown" data-wow-delay="0.4s">
                      <div class="area-penjualan detil">
                          <div class="judul">
                              <span class="ikon"><img src="images/icon-penjualan.png"></span> Penjualan
                              <!-- <a class="selengkapnya pull-right" href="app/index/penjualan"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a> -->
                          </div>
                          <div class="sub-judul">Penjualan Sistem Jawa Bali | Periode : 06 - 2023</div>
                          <div class="row inner">
                              <div class="col-md-6 padding-none">
                                  <div class="item">
                                    <div class="inner">
                                          <div class="caption">Pencapaian ROB (GWh)</div>
                                          <div class="title">Realisasi</div>
                                          <div class="nilai">17860.00</div>
                                          <div class="title">Target</div>
                                          <div class="nilai">17669.00</div>
                                          <div class="grafik-progress" id="grafik-rob"></div>
                                          <div class="clearfix"></div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6 padding-none">
                                  <div class="item">
                                    <div class="inner">
                                          <div class="caption">Pencapaian ROM (GWh)</div>
                                          <div class="title">Realisasi</div>
                                          <div class="nilai">17860.00</div>
                                          <div class="title">Target</div>
                                          <div class="nilai">17669.00</div>
                                          <div class="grafik-progress" id="grafik-rom"></div>
                                          <div class="clearfix"></div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6 padding-none">
                                  <div class="item">
                                    <div class="inner">
                                          <div class="caption">Pencapaian ROH (GWh)</div>
                                          <div class="title">Realisasi</div>
                                          <div class="nilai">17860.00</div>
                                          <div class="title">Target</div>
                                          <div class="nilai">17669.00</div>
                                          <div class="grafik-progress" id="grafik-roh"></div>
                                          <div class="clearfix"></div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6 padding-none">
                                  <div class="item">
                                    <div class="inner">
                                          <div class="caption">Market Share PLN NP (GWh)</div>
                                          <div class="title">Realisasi</div>
                                          <div class="nilai">17860.00</div>
                                          <div class="title">Target</div>
                                          <div class="nilai">17669.00</div>
                                          <div class="grafik-progress" id="grafik-market-share"></div>
                                          <div class="clearfix"></div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="legend-penjualan">
                            <i class="fa fa-circle hijau" aria-hidden="true"></i> ≥ 100%          
                            <i class="fa fa-circle kuning" aria-hidden="true"></i> ≥ 95% - < 100%          
                            <i class="fa fa-circle merah" aria-hidden="true"></i> < 95%

                            <div class="keterangan">
                              Catatan : Informasi diatas hanya menampilkan hasil pengolahan penjualan sistem kelistrikan besar di Jawa-Bali
                            </div>
                          </div>
                      </div>
                  </div>
                  
                </div>

                <!-- Services item -->
                <div class="col-md-6 col-lg-6 col-xs-12">
                  <div class="services-item wow fadeInDown" data-wow-delay="0.4s">
                      <div class="area-penjualan detil">
                          <div class="judul">&nbsp;
                              <!-- <span class="ikon"><img src="images/icon-penjualan.png"></span> Penjualan -->
                              <!-- <a class="selengkapnya pull-right" href="app/index/penjualan"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a> -->
                          </div>
                          <div class="sub-judul">Perbandingan Penjualan Sistem Jawa Bali dengan Kompetitor | Periode : 06 - 2023</div>
                          <div class="row inner">
                              <div class="col-md-6 padding-none">
                                  <div class="item">
                                    <div class="inner">
                                          <div class="caption">PLN Nusantara Power (GWh)</div>
                                          <div class="title">Realisasi</div>
                                          <div class="nilai">17860.00</div>
                                          <div class="title">Target</div>
                                          <div class="nilai">17669.00</div>
                                          <div class="grafik-progress" id="grafik-pln-np"></div>
                                          <div class="clearfix"></div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6 padding-none">
                                  <div class="item">
                                    <div class="inner">
                                          <div class="caption">PLN Indonesia Power (GWh)</div>
                                          <div class="title">Realisasi</div>
                                          <div class="nilai">17860.00</div>
                                          <div class="title">Target</div>
                                          <div class="nilai">17669.00</div>
                                          <div class="grafik-progress" id="grafik-pln-ip"></div>
                                          <div class="clearfix"></div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6 padding-none">
                                  <div class="item">
                                    <div class="inner">
                                          <div class="caption">PT PLN (Persero) (GWh)</div>
                                          <div class="title">Realisasi</div>
                                          <div class="nilai">17860.00</div>
                                          <div class="title">Target</div>
                                          <div class="nilai">17669.00</div>
                                          <div class="grafik-progress" id="grafik-pln"></div>
                                          <div class="clearfix"></div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6 padding-none">
                                  <div class="item">
                                    <div class="inner">
                                          <div class="caption">Independent Power Producers (GWh)</div>
                                          <div class="title">Realisasi</div>
                                          <div class="nilai">17860.00</div>
                                          <div class="title">Target</div>
                                          <div class="nilai">17669.00</div>
                                          <div class="grafik-progress" id="grafik-ipp"></div>
                                          <div class="clearfix"></div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="legend-penjualan">
                            <i class="fa fa-circle hijau" aria-hidden="true"></i> ≥ 100%          
                            <i class="fa fa-circle kuning" aria-hidden="true"></i> ≥ 95% - < 100%          
                            <i class="fa fa-circle merah" aria-hidden="true"></i> < 95%

                            <div class="keterangan">
                              Catatan : Informasi diatas hanya menampilkan hasil pengolahan penjualan sistem kelistrikan besar di Jawa-Bali
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
            Highcharts.chart('grafik-rob', {
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
                text: `<div class=persentase>102,50%</div>`,
                align: "center",
                verticalAlign: "middle",
                style: {
                  "fontSize": "7px",
                  "textAlign": "center"
                },
                x: 2,
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
            Highcharts.chart('grafik-rom', {
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
                x: 2,
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
            Highcharts.chart('grafik-roh', {
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
                x: 2,
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
            Highcharts.chart('grafik-market-share', {
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
                x: 2,
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

        <!-- PERBANDINGAN -->
        <script type="text/javascript">
            // Create the chart
            Highcharts.chart('grafik-pln-np', {
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
                x: 2,
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
            Highcharts.chart('grafik-pln-ip', {
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
                text: `<div class=persentase>93.38%</div>`,
                align: "center",
                verticalAlign: "middle",
                style: {
                  "fontSize": "7px",
                  "textAlign": "center"
                },
                x: 2,
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
                  y: 93.38,
                  color: '#e23b3b'
                }, {
                  name: 'Belum Progress',
                  y: 7,
                  color: '#c7c7c7'
                }]
              }],
            });
        </script>
        <script type="text/javascript">
            // Create the chart
            Highcharts.chart('grafik-pln', {
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
                text: `<div class=persentase>87.69%</div>`,
                align: "center",
                verticalAlign: "middle",
                style: {
                  "fontSize": "7px",
                  "textAlign": "center"
                },
                x: 2,
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
                  y: 87.69,
                  color: '#e23b3b'
                }, {
                  name: 'Belum Progress',
                  y: 12,
                  color: '#c7c7c7'
                }]
              }],
            });
        </script>
        <script type="text/javascript">
            // Create the chart
            Highcharts.chart('grafik-ipp', {
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
                x: 2,
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
