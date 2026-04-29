<?php
include_once("functions/string.func.php");
include_once("functions/date.func.php");
?>
<!-- Services Section Start -->
<section id="services" class="services section-padding ">
  <div class="container-fluid gantifont">
    
    <div class="row">
      <div class="col-md-12">
        <div class="area-breadcrumb pull-left">
          <ul class="breadcrumb">
            <li><a id="detilkembalihome" href="javascript:void(0)"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
            <!-- <li><a href="#">Peta Pembangkit</a></li>
            <li><a href="#">Summer 15</a></li> -->
            <li>Penjualan</li>
          </ul>   
        </div>
      </div>

      <div class="col-md-12">
        <div class="area-wrapper" style="height: calc(100vh - 60px);">
          <div class="row">
            <div class="col-md-6 col-lg-12 col-xs-12">
              <div class="services-item wow fadeInDown" data-wow-delay="0.4s">
                <div class="area-penjualan detil">
                  <div class="judul">
                      <span class="ikon"><img src="images/icon-penjualan.png"></span> Pencapaian Penjualan PNP (Gwh)
                      <!-- <a class="selengkapnya pull-right" href="app/index/penjualan"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a> -->
                  </div>
                  <div class="sub-judul">
                    Realisasi vs RKAP
                    <!-- Penjualan Sistem <span id='judulkiri'><?=$resultRegion?></span> | 
                    Periode : <span class="gantiinfobulan"><?=generateZeroDate($b,2)?> - <?=$t?></span> -->
                  </div>
                  <div class="row inner">
                    <div class="col-md-4">
                      <div class="area-grafik-penjualan-detil">
                        <div id="grafik-pencapaian-penjualan-pnp" class="grafik"></div>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="area-grafik-penjualan-detil">
                        <div id="grafik-realisasi-rkap" class="grafik"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="area-sumber-data detil">
              <label>Sumber data : <span>Navitas</span></label>
              <label>Last update : <span><?=$vtoday?></span></label>
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
    $(function () {
        $('#grafik-pencapaian-penjualan-pnp').highcharts({
            chart: {
                type: 'column',
                backgroundColor: null,
                // margin: [20,20,20,25]
            },
            exporting: {
                enabled: false
            },
            title: {
                text: null
            },
            xAxis: {
                categories: ['RKAP', 'Beyond', 'Realisasi'],
                labels: {
                  style: {
                      color: 'white',
                      fontSize: '12px'
                  }
                }
            },
            yAxis: {
                title: {
                  text: null
                },
                labels: {
                  style: {
                      color: 'white',
                      fontSize: '12px'
                  }
                }
            },

            plotOptions: {
              series: {
                  dataLabels: {
                      enabled: true,
                      color: '#FFFFFF',
                      // style: {fontWeight: 'bolder'},
                      formatter: function() {return this.x + ': ' + this.y},
                      // formatter: function() {return this.x},
                      inside: true,
                      rotation: 270,
                      // format: '{point.y:.1f}%',
                      style: {
                        fontWeight: 'bold',
                        fontSize: '14px',
                        textOutline: 'none',

                      }
                  },
                  pointPadding: 0.1,
                  groupPadding: 0,
                  borderWidth: 0,
              },
              // bar: {
              //   borderWidth: '0px'
              // }
            },
            

            // series: [{
            //     data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
            // }],

            series: [{
                name: '',
                data: [{
                  name: "RKAP",
                  y: 4,
                  color: "#92d8f9"
                }, {
                  name: "Beyond",
                  y: 7,
                  color: "#73a5fc"
                }, {
                  name: "Realisasi",
                  y: 9,
                  // color: "#1a4f6c"
                  color: "#0481c6"
                }],
                // colorByPoint: true
            }],
            legend: {
              enabled: false
            },
        });
    });
</script>
<script type="text/javascript">
  Highcharts.chart('grafik-realisasi-rkap', {
  chart: {
    type: 'column',
    backgroundColor: null
  },
  exporting: {
      enabled: false
  },
  title: {
    text: null,
    align: 'left'
  },
  subtitle: {
    text: null,
    align: 'left'
  },
  xAxis: {
    categories: ['MKR', 'MTW', 'CRT', 'RMBNG', 'PTN', 'GRSK', 'BRTS', 'PCTN'],
    crosshair: true,
    accessibility: {
      description: 'Countries'
    },
    labels: {
      style: {
          color: 'white',
          fontSize: '12px'
      }
    }
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Gwh',
      style: {
        color: 'white',
        fontSize: '12px'
      }
    },
    labels: {
      style: {
          color: 'white',
          fontSize: '12px'
      }
    }
  },
  tooltip: {
    valueSuffix: ' (1000 MT)'
  },
  plotOptions: {
    column: {
      pointPadding: 0.2,
      borderWidth: 0
    }
  },
  series: [
    {
      name: 'RKAP',
      data: [187749, 280000, 129000, 64300, 54000, 34300, 15000, 19000],
      color: "#92d8f9"
    },
    {
      name: 'BEYOND',
      data: [45321, 140000, 10000, 140500, 19500, 113500, 20000, 30000],
      color: "#73a5fc"
    },
    {
      name: 'Realisasi',
      data: [35321, 10000, 15000, 10500, 39500, 13500, 60000, 20000],
      // color: "#1a4f6c"
      color: "#0481c6"
    }
  ],
  legend: {
    enabled: false
  }
});
</script>

<script type="text/javascript">  
  $(document).ready(function() {
    $('#vlsxloading').hide();
  })
</script>