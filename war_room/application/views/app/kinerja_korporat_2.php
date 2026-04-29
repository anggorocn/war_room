<?php
include_once("functions/string.func.php");
include_once("functions/date.func.php");
?>


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
                    <li>Kinerja Korporat</li>
                    </ul> 
                </div>
            </div>

            <div class="col-md-12">
                <div class="area-wrapper">
                    <!-- <div class="gambar-kesiapan-pembangkit">
                        <img src="images/img-kesiapan-pembangkit.png">
                    </div> -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="header-detil">
                                <div class="logo-pln-np pull-left"><img src="images/logo.png"></div>    
                                <div class="judul">
                                    <span class="ikon"><img src="images/icon-kinerja-korporat.png"></span> Kinerja Korporat
                                    <!-- <a class="selengkapnya pull-right" href="app/index/penjualan"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a> -->
                                </div>
                            </div>
                            
                        </div>
                        
                        <!-- Services item -->
                        <!-- <div class="col-md-6 col-lg-1 col-xs-12 padding-none">
                            test
                        </div> -->

                        <!-- Services item -->
                        <div class="col-md-6 col-lg-8 col-xs-12">
                            <div class="services-item wow fadeInDown" data-wow-delay="0.6s">

                              <div class="area-ringkasan-kontrak-kinerja">
                                
                                <div class="inner">
                                  <div class="sub-judul">Ringkasan Kontrak Kinerja</div>

                                  <div class="legend">
                                    <span><i class="fa fa-circle hijau" aria-hidden="true"></i> ≥ 100%          </span>
                                    <span><i class="fa fa-circle kuning" aria-hidden="true"></i> ≥ 95% - < 100%         </span> 
                                    <span><i class="fa fa-circle merah" aria-hidden="true"></i> < 95%          </span>
                                    <span><i class="fa fa-circle biru" aria-hidden="true"></i> On track          </span>
                                    <span><i class="fa fa-circle abu-abu" aria-hidden="true"></i> Belum diukur</span>
                                  </div>

                                  <div class="row">
                                    <div class="col-md-2">
                                      <div class="item">
                                        <div class="caption">Economic and Social Value</div>
                                        <div class="grafik-pie" id="pie-economic"></div>
                                        <div class="keterangan">EFOR Non PLTU Jawa Bali, EFOR PLTU Luar Jawa Bali, EAF PLTU Jawa Bali, EAF Non PLTU Jawa Bali, EAF PLTU Luar Jawa Bali</div>
                                      </div>
                                    </div>
                                    <div class="col-md-2">
                                      <div class="item">
                                        <div class="caption">Business Model Innovation</div>
                                        <div class="grafik-pie" id="pie-business"></div>
                                        <div class="keterangan">Jumlah Kontrak Bisnis di Luar Negeri, Strategic Partnership GenCo</div>
                                      </div>
                                    </div>
                                    <div class="col-md-2">
                                      <div class="item">
                                        <div class="caption">Technology Leadership</div>
                                        <div class="grafik-pie" id="pie-technology"></div>
                                        <div class="keterangan">&nbsp;</div>
                                      </div>
                                    </div>
                                    <div class="col-md-2">
                                      <div class="item">
                                        <div class="caption">Energize Investment</div>
                                        <div class="grafik-pie" id="pie-energize"></div>
                                        <div class="keterangan">EPC Project Completion</div>
                                      </div>
                                    </div>
                                    <div class="col-md-2">
                                      <div class="item">
                                        <div class="caption">Unleash Talent</div>
                                        <div class="grafik-pie" id="pie-talent"></div>
                                        <div class="keterangan">&nbsp;</div>
                                      </div>
                                    </div>
                                    <div class="col-md-2">
                                      <div class="item">
                                        <div class="caption">Compliance</div>
                                        <div class="grafik-pie" id="pie-compliance"></div>
                                        <div class="keterangan">&nbsp;</div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="area-ringkasan-info">
                                <div class="row">
                                  <div class="col-md-3">
                                    <div class="item merah">
                                      <div class="item-inner">
                                        <div class="caption">Beyond KWH</div>
                                        <div class="keterangan">KPI Bidang Non Kerja</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="item">
                                      <div class="item-inner">
                                        <div class="caption">Digitalisasi Power Plant</div>
                                        <div class="keterangan">KPI Bidang Non Kerja</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="item">
                                      <div class="item-inner">
                                        <div class="caption">Making Digital Talent</div>
                                        <div class="keterangan">KPI Bidang Non Kerja</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="item">
                                      <div class="item-inner">
                                        <div class="caption">Co-Firing</div>
                                        <div class="keterangan">KPI Bidang Non Kerja</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="item">
                                      <div class="item-inner">
                                        <div class="caption">EBT (Energi Baru & Terbarukan)</div>
                                        <div class="keterangan">KPI Bidang Non Kerja</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="item">
                                      <div class="item-inner">
                                        <div class="caption">Pengembangan Pembangkit</div>
                                        <div class="keterangan">KPI Bidang Non Kerja</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="item">
                                      <div class="item-inner">
                                        <div class="caption">Milestone PLTS Cirata</div>
                                        <div class="keterangan">KPI Bidang Non Kerja</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="item merah">
                                      <div class="item-inner">
                                        <div class="caption">Rasio Keuangan</div>
                                        <div class="keterangan">KPI Bidang Non Kerja</div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>

                        <!-- Services item -->
                        <div class="col-md-6 col-lg-4 col-xs-12">
                            <div class="services-item wow fadeInDown" data-wow-delay="0.6s">
                              <div class="area-kpi-korporat">
                                
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="area-card">
                                      <div class="sub-judul">KPI Korporat</div>
                                      <div class="inner">
                                        <table>
                                          <thead>
                                            <tr>
                                              <th>&nbsp;</th>
                                              <th>&nbsp;</th>
                                              <th>Jumlah KPI</th>
                                              <th>Total KPI</th>
                                            </tr>  
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td>≥ 100%</td>
                                              <td><i class="fa fa-circle hijau" aria-hidden="true"></i></td>
                                              <td>24</td>
                                              <td>/33</td>
                                            </tr>
                                            <tr>
                                              <td>≥ 95% - < 100%</td>
                                              <td><i class="fa fa-circle kuning" aria-hidden="true"></i></td>
                                              <td>3</td>
                                              <td>/33</td>
                                            </tr>
                                            <tr>
                                              <td>< 95%</td>
                                              <td><i class="fa fa-circle merah" aria-hidden="true"></i></td>
                                              <td>5</td>
                                              <td>/33</td>
                                            </tr>
                                            <tr>
                                              <td>On track</td>
                                              <td><i class="fa fa-circle biru" aria-hidden="true"></i></td>
                                              <td>0</td>
                                              <td>/33</td>
                                            </tr>
                                            <tr>
                                              <td>Belum dilakukan</td>
                                              <td><i class="fa fa-circle abu-abu" aria-hidden="true"></i></td>
                                              <td>1</td>
                                              <td>/33</td>      
                                            </tr>
                                          </tbody>
                                        </table>
                                                        
                                        
                                      </div>
                                  </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="area-card">
                                      <div class="sub-judul">NKO</div>
                                      <div class="inner">
                                        98.02
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="area-card">
                                      <div class="sub-judul">Detil</div>
                                      <div class="inner">
                                        Penjelasan terkait nilai NKO
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="area-card">
                                      <div class="sub-judul">Executive Summary</div>
                                      <div class="inner">
                                        Pencapaian kinerja korporat sampai dengan bulan Juni 2023, yaitu sebanyak 24 KPI memenuhi target (warna Hijau), 3 hampir memenuhi target (warna Kuning), dan 5 KPI belum memenuhi target (warna Merah).
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
  // Data retrieved from https://netmarketshare.com
  Highcharts.chart('pie-economic', {
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
              }
          }
      },
      series: [{
          name: 'Brands',
          colorByPoint: true,
          data: [{
              name: 'Test',
              y: 70.67,
              // sliced: true,
              selected: true,
              color: '#3fcb63'
          }, {
              name: 'Test 2',
              y: 14.77,
              color: '#f5cb2c'
          },  {
              name: 'Test 3',
              y: 4.86,
              color: '#e42517'
          }]
      }]
  });

</script>
<script type="text/javascript">
  // Data retrieved from https://netmarketshare.com
  Highcharts.chart('pie-business', {
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
              }
          }
      },
      series: [{
          name: 'Brands',
          colorByPoint: true,
          data: [{
              name: 'Test',
              y: 70.67,
              // sliced: true,
              selected: true,
              color: '#3fcb63'
          }, {
              name: 'Test 2',
              y: 14.77,
              color: '#f5cb2c'
          },  {
              name: 'Test 3',
              y: 4.86,
              color: '#e42517'
          }]
      }]
  });

</script>
<script type="text/javascript">
  // Data retrieved from https://netmarketshare.com
  Highcharts.chart('pie-technology', {
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
              }
          }
      },
      series: [{
          name: 'Brands',
          colorByPoint: true,
          data: [{
              name: 'Test',
              y: 70.67,
              // sliced: true,
              selected: true,
              color: '#3fcb63'
          }, {
              name: 'Test 2',
              y: 14.77,
              color: '#f5cb2c'
          },  {
              name: 'Test 3',
              y: 4.86,
              color: '#e42517'
          }]
      }]
  });

</script>
<script type="text/javascript">
  // Data retrieved from https://netmarketshare.com
  Highcharts.chart('pie-energize', {
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
              }
          }
      },
      series: [{
          name: 'Brands',
          colorByPoint: true,
          data: [{
              name: 'Test',
              y: 70.67,
              // sliced: true,
              selected: true,
              color: '#3fcb63'
          }, {
              name: 'Test 2',
              y: 14.77,
              color: '#f5cb2c'
          },  {
              name: 'Test 3',
              y: 4.86,
              color: '#e42517'
          }]
      }]
  });

</script>
<script type="text/javascript">
  // Data retrieved from https://netmarketshare.com
  Highcharts.chart('pie-talent', {
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
              }
          }
      },
      series: [{
          name: 'Brands',
          colorByPoint: true,
          data: [{
              name: 'Test',
              y: 70.67,
              // sliced: true,
              selected: true,
              color: '#3fcb63'
          }, {
              name: 'Test 2',
              y: 14.77,
              color: '#f5cb2c'
          },  {
              name: 'Test 3',
              y: 4.86,
              color: '#e42517'
          }]
      }]
  });

</script>
<script type="text/javascript">
  // Data retrieved from https://netmarketshare.com
  Highcharts.chart('pie-compliance', {
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
              }
          }
      },
      series: [{
          name: 'Brands',
          colorByPoint: true,
          data: [{
              name: 'Test',
              y: 70.67,
              // sliced: true,
              selected: true,
              color: '#3fcb63'
          }, {
              name: 'Test 2',
              y: 14.77,
              color: '#f5cb2c'
          },  {
              name: 'Test 3',
              y: 4.86,
              color: '#e42517'
          }]
      }]
  });

</script>
