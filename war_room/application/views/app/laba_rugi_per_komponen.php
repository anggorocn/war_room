<?php
include_once("functions/string.func.php");
include_once("functions/date.func.php");

$b = $this->input->get("b");
$t = $this->input->get("t");

if(empty($b)) $b=date("m");
if(empty($t)) $t=date("Y");
?>

<style type="text/css">
  #vlsxloading {
    display: none;
  }
</style>

<!-- HIGHCHARTS -->
<script src="lib/highcharts/highcharts.js"></script>
<script src="lib/highcharts/exporting.js"></script>
<script src="lib/highcharts/export-data.js"></script>
<script src="lib/highcharts/accessibility.js"></script>

<!-- Services Section Start -->
<section id="services" class="services section-padding">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="area-breadcrumb pull-left">
                    <ul class="breadcrumb">
                    <li><a href="app"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                    <li><a href="app/kinerja_keuangan_korporat">Kinerja Keuangan Korporat</a></li>
                    <!-- <li><a href="#">Peta Pembangkit</a></li>
                    <li><a href="#">Summer 15</a></li> -->
                    <li>Laba Rugi Per Komponen</li>
                    </ul> 
                </div>
            </div>
            <div class="col-md-12">
                <div class="area-wrapper" style="height: calc(100vh - 60px);">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="header-detil">
                                <div class="logo-pln-np pull-left"><img src="images/logo.png"></div>    
                                <div class="judul">
                                    <span class="ikon"><img src="images/icon-kesiapan-pembangkit.png"></span> Laba Rugi Per Komponen
                                    <!-- <a class="selengkapnya pull-right" href="app/index/penjualan"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="area-laba-rugi-perkomponen">
                          <div class="row">
                            <div class="col-md-4">
                              <div class="item">
                                <div class="item-grafik">
                                  <div id="container-a" class="grafik"></div>
                                </div>
                                <div class="item-tabel">
                                  <table>
                                    <thead>
                                      <tr>
                                        <th>&nbsp;</th>
                                        <th>RKAP <?=$t?></th>
                                        <th>REALISASI <?=$t?></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>Pendapatan Komponen A </td>
                                        <td align="right" id='pendapatan_a_target'></td>
                                        <td align="right" id='pendapatan_a_realisasi'></td>
                                      </tr>
                                      <tr>
                                        <td>Beban  Komponen A </td>
                                        <td align="right" id='beban_a_target'></td>
                                        <td align="right" id='beban_a_realisasi'></td>
                                      </tr>
                                      <tr>
                                        <td>Laba / Rugi Komponen A </td>
                                        <td align="right" id='labarugi_a_target'></td>
                                        <td align="right" id='labarugi_a_realisasi'></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                                <div class="clearfix"></div>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="item">
                                <div class="item-grafik">
                                  <div id="container-b" class="grafik"></div>
                                </div>
                                <div class="item-tabel">
                                  <table>
                                    <thead>
                                      <tr>
                                        <th>&nbsp;</th>
                                        <th>RKAP <?=$t?></th>
                                        <th>REALISASI <?=$t?></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>Pendapatan Komponen B </td>
                                        <td align="right" id='pendapatan_b_target'></td>
                                        <td align="right" id='pendapatan_b_realisasi'></td>
                                      </tr>
                                      <tr>
                                        <td>Beban  Komponen B </td>
                                        <td align="right" id='beban_b_target'></td>
                                        <td align="right" id='beban_b_realisasi'></td>
                                      </tr>
                                      <tr>
                                        <td>Laba / Rugi Komponen B </td>
                                        <td align="right" id='labarugi_b_target'></td>
                                        <td align="right" id='labarugi_b_realisasi'></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                                <div class="clearfix"></div>
                              </div>
                            </div>
                            <div class="col-md-4" style="text-align: center;">
                              <!-- <div class="item">
                                <div class="item-grafik">
                                  <div id="container-e" class="grafik"></div>
                                </div>
                                <div class="item-tabel">
                                  <table>
                                    <thead>
                                      <tr>
                                        <th>&nbsp;</th>
                                        <th>RKAP <?=$t?></th>
                                        <th>REALISASI <?=$t?></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>Pendapatan Ancillary Service & Bulk</td>
                                        <td align="right" id='pendapatan_e_target'></td>
                                        <td align="right" id='pendapatan_e_realisasi'></td>
                                      </tr>
                                      <tr>
                                        <td>Beban Ancillary Service</td>
                                        <td align="right" id='beban_e_target'></td>
                                        <td align="right" id='beban_e_realisasi'></td>
                                      </tr>
                                      <tr>
                                        <td>Laba / Rugi Ancillary Service</td>
                                        <td align="right" id='labarugi_e_target'></td>
                                        <td align="right" id='labarugi_e_realisasi'></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                                <div class="clearfix"></div>
                              </div> -->
                              <img src="images/laba-rugi.png" style="width: 60%;margin-top: 70px;">
                            </div>
                            <div class="col-md-4">
                              <div class="item">
                                <div class="item-grafik">
                                  <div id="container-c" class="grafik"></div>
                                </div>
                                <div class="item-tabel">
                                  <table>
                                    <thead>
                                      <tr>
                                        <th>&nbsp;</th>
                                        <th>RKAP <?=$t?></th>
                                        <th>REALISASI <?=$t?></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>Pendapatan Komponen C </td>
                                        <td align="right" id='pendapatan_c_target'></td>
                                        <td align="right" id='pendapatan_c_realisasi'></td>
                                      </tr>
                                      <tr>
                                        <td>Beban  Komponen C </td>
                                        <td align="right" id='beban_c_target'></td>
                                        <td align="right" id='beban_c_realisasi'></td>
                                      </tr>
                                      <tr>
                                        <td>Laba / Rugi Komponen C </td>
                                        <td align="right" id='labarugi_c_target'></td>
                                        <td align="right" id='labarugi_c_realisasi'></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                                <div class="clearfix"></div>
                              </div>
                            </div>
                            <div class="col-md-4">                              
                              <div class="item">
                                <div class="item-grafik">
                                  <div id="container-d" class="grafik"></div>
                                </div>
                                <div class="item-tabel">
                                  <table>
                                    <thead>
                                      <tr>
                                        <th>&nbsp;</th>
                                        <th>RKAP <?=$t?></th>
                                        <th>REALISASI <?=$t?></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>Pendapatan Komponen D </td>
                                        <td align="right" id='pendapatan_d_target'></td>
                                        <td align="right" id='pendapatan_d_realisasi'></td>
                                      </tr>
                                      <tr>
                                        <td>Beban  Komponen D </td>
                                        <td align="right" id='beban_d_target'></td>
                                        <td align="right" id='beban_d_realisasi'></td>
                                      </tr>
                                      <tr>
                                        <td>Laba / Rugi Komponen D </td>
                                        <td align="right" id='labarugi_d_target'></td>
                                        <td align="right" id='labarugi_d_realisasi'></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                                <div class="clearfix"></div>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="item">
                                <div class="note">
                                  <div class="inner">
                                    Notes :
                                    <div id='executive_summary'>
                                      
                                    </div>
                                    <!-- <ul>
                                      <li>
                                        Harga Jual Komp A (Penyusutan, Pajak Laba) ditetapkan sesuai lorem ipsum dolor sit amet, consectetur adipiscing elit
                                      </li>
                                      <li>
                                        Harga Jual Komp B (Har, SDM, AdLorem ipsum dolor sit amet, consectetur adipiscing elit
                                      </li>
                                      <li>
                                        Harga Jual Komp C (Bahan Bakar Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                      </li>
                                      <li>
                                        Harga Jual Komp D (Pelumas Kimia) ditetapkan sesuai dengan RKAP
                                      </li>
                                    </ul> -->
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="area-sumber-data detil">
                      <label>Sumber data : <span>PBR</span></label>
                      <label>Last update : <span id='tgl_entri'></span></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services Section End -->


<script type="text/javascript">
 
  $(document).ready(function() {
      jsonlook();
     
      $("#bln,#thn").on('change',function(){
        bln= parseInt($("#bln").val());
        thn= parseInt($("#thn").val());

        jsonlook();
      });
  })

  function jsonlook(){
      bln= parseInt($("#bln").val());
      thn= parseInt($("#thn").val());
      $.ajax({
          url : 'json-api/LabaRugiKomponen_json/home?bln='+bln+'&thn='+thn,
          type : 'GET',
          dataType : 'text',
          success : function(text) {
              text= JSON.parse(text);
              $('#vlsxloading').hide();

              $('#pendapatan_a_target').html(text['pendapatan_a_target']);
              $('#pendapatan_a_realisasi').html(text['pendapatan_a_realisasi']);
              $('#beban_a_target').html(text['beban_a_target']);
              $('#beban_a_realisasi').html(text['beban_a_realisasi']);
              $('#labarugi_a_target').html(text['labarugi_a_target']);
              $('#labarugi_a_realisasi').html(text['labarugi_a_realisasi']);

              $('#pendapatan_b_target').html(text['pendapatan_b_target']);
              $('#pendapatan_b_realisasi').html(text['pendapatan_b_realisasi']);
              $('#beban_b_target').html(text['beban_b_target']);
              $('#beban_b_realisasi').html(text['beban_b_realisasi']);
              $('#labarugi_b_target').html(text['labarugi_b_target']);
              $('#labarugi_b_realisasi').html(text['labarugi_b_realisasi']);

              $('#pendapatan_c_target').html(text['pendapatan_c_target']);
              $('#pendapatan_c_realisasi').html(text['pendapatan_c_realisasi']);
              $('#beban_c_target').html(text['beban_c_target']);
              $('#beban_c_realisasi').html(text['beban_c_realisasi']);
              $('#labarugi_c_target').html(text['labarugi_c_target']);
              $('#labarugi_c_realisasi').html(text['labarugi_c_realisasi']);

              $('#pendapatan_d_target').html(text['pendapatan_d_target']);
              $('#pendapatan_d_realisasi').html(text['pendapatan_d_realisasi']);
              $('#beban_d_target').html(text['beban_d_target']);
              $('#beban_d_realisasi').html(text['beban_d_realisasi']);
              $('#labarugi_d_target').html(text['labarugi_d_target']);
              $('#labarugi_d_realisasi').html(text['labarugi_d_realisasi']);

              $('#pendapatan_e_target').html(text['pendapatan_e_target']);
              $('#pendapatan_e_realisasi').html(text['pendapatan_e_realisasi']);
              $('#beban_e_target').html(text['beban_e_target']);
              $('#beban_e_realisasi').html(text['beban_e_realisasi']);
              $('#labarugi_e_target').html(text['labarugi_e_target']);
              $('#labarugi_e_realisasi').html(text['labarugi_e_realisasi']);

              $('#executive_summary').html(text['executive_summary']);
              $('#tgl_entri').html(text['tgl_entri']);

              (function(H) {
                  H.wrap(H.Legend.prototype, 'colorizeItem', function(proceed, item, visible) {
                      var color = item.color;
                      item.color = item.options.legendColor;
                      proceed.apply(this, Array.prototype.slice.call(arguments, 1));
                      item.color = color;
                  });
              }(Highcharts));

              Highcharts.chart('container-a', {

                  chart: {
                      type: 'column',
                      backgroundColor: 'transparent'
                    },
                  exporting: {
                    enabled: false
                  },
                  title: {
                      text: null
                  },

                  xAxis: {
                    categories: ['RKAP<br><?=$t?>', 'REALISASI<br><?=$t?>'],
                    labels: {
                      style: {
                          color: '#FFFFFF',
                          fontSize: '11px'
                      }
                    }
                  },
                  yAxis: {
                    title: {
                      text: null
                    },
                    labels: {
                        style: {
                            color: '#FFFFFF',
                            fontSize: '11px'
                        }
                    },
                    gridLineWidth: 0,
                    minorGridLineWidth: 0,
                    plotLines: [{
                      value: 0,
                      width: 1,
                      color: '#aaa',
                      zIndex: 10
                    }],
                    stackLabels: {
                      enabled: true,
                    }
                  },

                  plotOptions: {
                    series: {
                        colorByPoint: true,
                        borderRadius: {
                            radius: 30
                        },
                      dataLabels: {
                        style: {
                          fontSize:  '11px',
                          textOutline: 'none',
                          color: '#FFFFFF'
                        },
                        enabled: true,
                        formatter: function() {
                                //if (this.y > 0) {
                                  return this.y;
                              //}
                          }
                        }
                    },
                    column: {
                      borderWidth: 0
                    }
                  },
                  series: [{
                    name: 'Pendapatan Komponen A',
                    legendColor: 'pink',
                    data: [parseFloat(text['pendapatan_a_target']), parseFloat(text['pendapatan_a_realisasi'])],
                    colors: ['#833c15', '#416cb5']
                  },
                  {
                     name: 'Beban Komponen A',
                     legendColor: 'purple',
                     data: [parseFloat(text['beban_a_target']), parseFloat(text['beban_a_realisasi'])],
                     colors: ['#c35a20', '#7a92cc']
                  },
                  {
                     name: 'Laba / Rugi Komponen A',
                     legendColor: 'purple',
                     data: [parseFloat(text['labarugi_a_target']), parseFloat(text['labarugi_a_realisasi'])],
                     colors: ['#f7cbaf', '#b3bfde']
                  }
                  ],
                 
                  legend: {
                    enabled: false,
                  }
              });
              
              (function(H) {
                  H.wrap(H.Legend.prototype, 'colorizeItem', function(proceed, item, visible) {
                      var color = item.color;
                      item.color = item.options.legendColor;
                      proceed.apply(this, Array.prototype.slice.call(arguments, 1));
                      item.color = color;
                  });
              }(Highcharts));

              Highcharts.chart('container-b', {

                  chart: {
                      type: 'column',
                      backgroundColor: 'transparent'
                    },
                  exporting: {
                    enabled: false
                  },
                  title: {
                      text: null
                  },

                  xAxis: {
                    categories: ['RKAP<br><?=$t?>', 'REALISASI<br><?=$t?>'],
                    labels: {
                      style: {
                          color: '#FFFFFF',
                          fontSize: '11px'
                      }
                    }
                  },
                  yAxis: {
                    title: {
                      text: null
                    },
                    stackLabels: {
                        enabled: true,
                        style: {
                            fontWeight: 'bold',
                            color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                        },
                        allowOverlap: true
                    },
                    labels: {
                        style: {
                            color: '#FFFFFF',
                            fontSize: '11px'
                        }
                    },
                    gridLineWidth: 0,
                  },

                  plotOptions: {
                     series: {
                       colorByPoint: true,
                        borderRadius: {
                            radius: 30
                        },
                        dataLabels: {
                          style: {
                            fontSize:  '11px',
                            textOutline: 'none',
                            color: '#FFFFFF'
                          },
                            
                            enabled: true,
                            formatter: function() {
                                //if (this.y > 0) {
                                  return this.y;
                              //}
                          }
                        }
                    },
                    column: {
                      borderWidth: 0
                    }
                  },

                  series: [{
                    name: 'Pendapatan Komponen B',
                    legendColor: 'pink',
                    data: [parseFloat(text['pendapatan_b_target']), parseFloat(text['pendapatan_b_realisasi'])],
                    colors: ['#833c15', '#416cb5']
                  },
                  {
                     name: 'Beban Komponen B',
                     legendColor: 'purple',
                     data: [parseFloat(text['beban_b_target']), parseFloat(text['beban_b_realisasi'])],
                     colors: ['#c35a20', '#7a92cc']
                  },
                  {
                     name: 'Laba / Rugi Komponen B',
                     legendColor: 'purple',
                     data: [parseFloat(text['labarugi_b_target']), parseFloat(text['labarugi_b_realisasi'])],
                     colors: ['#f7cbaf', '#b3bfde']
                  }
                  ],
                  legend: {
                    enabled: false,
                  }
              });

              (function(H) {
                  H.wrap(H.Legend.prototype, 'colorizeItem', function(proceed, item, visible) {
                      var color = item.color;
                      item.color = item.options.legendColor;
                      proceed.apply(this, Array.prototype.slice.call(arguments, 1));
                      item.color = color;
                  });
              }(Highcharts));

              Highcharts.chart('container-c', {

                  chart: {
                      type: 'column',
                      backgroundColor: 'transparent'
                    },
                  exporting: {
                    enabled: false
                  },
                  title: {
                      text: null
                  },

                  xAxis: {
                    categories: ['RKAP<br><?=$t?>', 'REALISASI<br><?=$t?>'],
                    labels: {
                      style: {
                          color: '#FFFFFF',
                          fontSize: '11px'
                      }
                    }
                  },
                  yAxis: {
                    title: {
                      text: null
                    },
                    stackLabels: {
                        enabled: true,
                        style: {
                            fontWeight: 'bold',
                            color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                        },
                        allowOverlap: true
                    },
                    labels: {
                        style: {
                            color: '#FFFFFF',
                            fontSize: '11px'
                        }
                    },
                    gridLineWidth: 0,
                  },

                  plotOptions: {
                     series: {
                       colorByPoint: true,
                        borderRadius: {
                            radius: 30
                        },
                        dataLabels: {
                          style: {
                            fontSize:  '11px',
                            textOutline: 'none',
                            color: '#FFFFFF'
                          },
                          

                            enabled: true,
                            formatter: function() {
                                //if (this.y > 0) {
                                  return this.y;
                              //}
                          }
                        }
                    },
                    column: {
                      borderWidth: 0
                    }
                  },

                  series: [{
                    name: 'Pendapatan Komponen C',
                    legendColor: 'pink',
                    data: [parseFloat(text['pendapatan_c_target']), parseFloat(text['pendapatan_c_realisasi'])],
                    colors: ['#833c15', '#416cb5']
                  },
                  {
                     name: 'Beban Komponen C',
                     legendColor: 'purple',
                     data: [parseFloat(text['beban_c_target']), parseFloat(text['beban_c_realisasi'])],
                     colors: ['#c35a20', '#7a92cc']
                  },
                  {
                     name: 'Laba / Rugi Komponen C',
                     legendColor: 'purple',
                     data: [parseFloat(text['labarugi_c_target']), parseFloat(text['labarugi_c_realisasi'])],
                     colors: ['#f7cbaf', '#b3bfde']
                  }
                  ],
                 
                  legend: {
                    enabled: false,
                  }
              });

              (function(H) {
                  H.wrap(H.Legend.prototype, 'colorizeItem', function(proceed, item, visible) {
                      var color = item.color;
                      item.color = item.options.legendColor;
                      proceed.apply(this, Array.prototype.slice.call(arguments, 1));
                      item.color = color;
                  });
              }(Highcharts));

              Highcharts.chart('container-d', {

                  chart: {
                      type: 'column',
                      backgroundColor: 'transparent'
                    },
                  exporting: {
                    enabled: false
                  },
                  title: {
                      text: null
                  },

                  xAxis: {
                    categories: ['RKAP<br><?=$t?>', 'REALISASI<br><?=$t?>'],
                    labels: {
                      style: {
                          color: '#FFFFFF',
                          fontSize: '11px'
                      }
                    }
                  },
                  yAxis: {
                    title: {
                      text: null
                    },
                    stackLabels: {
                        enabled: true,
                        style: {
                            fontWeight: 'bold',
                            color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                        },
                        allowOverlap: true
                    },
                    labels: {
                        style: {
                            color: '#FFFFFF',
                            fontSize: '11px'
                        }
                    },
                    gridLineWidth: 0,
                  },

                  plotOptions: {
                     series: {
                       colorByPoint: true,
                        borderRadius: {
                            radius: 30
                        },
                        dataLabels: {
                          style: {
                            fontSize:  '11px',
                            textOutline: 'none',
                            color: '#FFFFFF'
                          },
                          

                            enabled: true,
                            formatter: function() {
                                //if (this.y > 0) {
                                  return this.y;
                              //}
                          }
                        }
                    },
                    column: {
                      borderWidth: 0
                    }
                  },

                  series: [{
                    name: 'Pendapatan Komponen D',
                    legendColor: 'pink',
                    data: [parseFloat(text['pendapatan_d_target']), parseFloat(text['pendapatan_d_realisasi'])],
                    colors: ['#833c15', '#416cb5']
                  },
                  {
                     name: 'Beban Komponen D',
                     legendColor: 'purple',
                     data: [parseFloat(text['beban_d_target']), parseFloat(text['beban_d_realisasi'])],
                     colors: ['#c35a20', '#7a92cc']
                  },
                  {
                     name: 'Laba / Rugi Komponen D',
                     legendColor: 'purple',
                     data: [parseFloat(text['labarugi_d_target']), parseFloat(text['labarugi_d_realisasi'])],
                     colors: ['#f7cbaf', '#b3bfde']
                  }
                  ],
                 
                  legend: {
                    enabled: false,
                  }
              });

             (function(H) {
                  H.wrap(H.Legend.prototype, 'colorizeItem', function(proceed, item, visible) {
                      var color = item.color;
                      item.color = item.options.legendColor;
                      proceed.apply(this, Array.prototype.slice.call(arguments, 1));
                      item.color = color;
                  });
              }(Highcharts));

              Highcharts.chart('container-e', {

                  chart: {
                      type: 'column',
                      backgroundColor: 'transparent'
                    },
                  exporting: {
                    enabled: false
                  },
                  title: {
                      text: null
                  },

                  xAxis: {
                    categories: ['RKAP<br><?=$t?>', 'REALISASI<br><?=$t?>'],
                    labels: {
                      style: {
                          color: '#FFFFFF',
                          fontSize: '11px'
                      }
                    }
                  },
                  yAxis: {
                    title: {
                      text: null
                    },
                    stackLabels: {
                        enabled: true,
                        style: {
                            fontWeight: 'bold',
                            color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                        },
                        allowOverlap: true
                    },
                    labels: {
                        style: {
                            color: '#FFFFFF',
                            fontSize: '11px'
                        }
                    },
                    gridLineWidth: 0,
                  },

                  plotOptions: {
                     series: {
                       colorByPoint: true,
                        borderRadius: {
                            radius: 30
                        },
                        dataLabels: {
                          style: {
                            fontSize:  '11px',
                            textOutline: 'none',
                            color: '#FFFFFF'
                          },
                          

                            enabled: true,
                            formatter: function() {
                                //if (this.y > 0) {
                                  return this.y;
                              //}
                          }
                        }
                    },
                    column: {
                      borderWidth: 0
                    }
                  },

                  series: [{
                    name: 'Pendapatan Ancillary Service & Bulk',
                    // legendColor: 'pink',
                    data: [parseFloat(text['pendapatan_e_target']), parseFloat(text['pendapatan_e_realisasi'])],
                    colors: ['#833c15', '#416cb5']
                  },
                  {
                     name: 'Beban Ancillary Service',
                     // legendColor: 'purple',
                     data: [parseFloat(text['beban_e_target']), parseFloat(text['beban_e_realisasi'])],
                     colors: ['#c35a20', '#7a92cc']
                  },
                  {
                     name: 'Laba / Rugi Ancillary Service',
                     // legendColor: 'purple',
                     data: [parseFloat(text['labarugi_e_target']), parseFloat(text['labarugi_e_realisasi'])],
                     colors: ['#f7cbaf', '#b3bfde']
                  }
                  ],
                  legend: {
                    enabled: false,
                  }
              });

          }        
      });
  }
</script>