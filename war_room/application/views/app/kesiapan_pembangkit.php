<?php
include_once("functions/string.func.php");
include_once("functions/date.func.php");

$vtoday= getFormattedDate(date("Y-m-d"));
$b = $this->input->get("b");
$t = $this->input->get("t");

if(empty($b))
{
  $b=date("m");
} 
else
{
  $b=$b;
}
  
if(empty($t)) $t=date("Y");
?>

<!-- Services Section Start -->
<section id="services" class="services section-padding">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="area-breadcrumb pull-left">
                    <ul class="breadcrumb">
                    <li><a id="detilkembalihome" href="javascript:void(0)"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
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
                                <!-- <div class="logo-pln-np pull-left"><img src="images/logo.png"></div>     -->
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
                                                <div class="nilai" id='mw_outage'>2305.82 MW</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 padding-none">
                                            <div class="item">
                                                <div class="grafik-progress" id="kesiapan-standby"></div>
                                                <div class="title">Standby</div>
                                                <div class="nilai" id='mw_standby'>2999.41 MW</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 padding-none">
                                            <div class="item">
                                                <div class="grafik-progress" id="kesiapan-total"></div>
                                                <div class="title">Total Kesiapan</div>
                                                <div class="nilai" id='mw_total_kesiapan'>12438.53 MW</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-5">
                                        <div class="legend-penjualan">
                                          <i class="fa fa-circle hijau" aria-hidden="true"></i> ≥ 95%          
                                          <i class="fa fa-circle kuning" aria-hidden="true"></i> 85% - < 95%          
                                          <i class="fa fa-circle merah" aria-hidden="true"></i> < 85%
                                        </div>
                                      </div>
                                      <div class="col-md-7">
                                         <div class="legend-penjualan" style="text-align: right;">
                                              <label>Sumber data : <span>Navitas</span></label>
                                              <!-- <label>Last update : <span id='tgl_entri_kesiapanpembangkit'>4 Agustus 2023</span></label> -->
                                              <label>Last update : <span><?=$vtoday?></span></label>
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
                                    <div class="jumlah pull-right">Jumlah : <span id='total_pembangkit'></span> lokasi pembangkit</div>
                                    <div class="clearfix"></div>
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="inner">
                                          <div class="row" id='listPembangkit'>
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
        text: `<div class=persentase id=persentase_total_kesiapan>82.83%</div>`,
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
<!-- Modal -->
<div id='modal-template'>
    
</div>

<script type="text/javascript">
    $(document).ready(function() {
        KesiapanPembangkit();
      
        $("#bln,#thn").on('change',function(){
            bln= parseInt($("#bln").val());
            thn= parseInt($("#thn").val());
        });
    })
    
    function KesiapanPembangkit(){
        $.ajax({
            url : 'json-api/KesiapanPembangkit_json/sub',
            type : 'GET',
            dataType : 'text',
            beforeSend: function () {
                $('#vlsxloading').show();
            }
            ,
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
                $('#total_pembangkit').html(text['total_pembangkit']);

                persen=parseFloat(text['per_dmn']);
                 if(persen >= 95){
                // hijau
                    warna='#47ce6b';
                } else if(persen >= 85 && persen < 95){
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
                 if(persen >= 95){
                // hijau
                    warna='#47ce6b';
                } else if(persen >= 85 && persen < 95){
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
                 if(persen >= 95){
                // hijau
                    warna='#47ce6b';
                } else if(persen >= 85 && persen < 95){
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
                 if(persen >= 95){
                // hijau
                    warna='#47ce6b';
                } else if(persen >= 85 && persen < 95){
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
                if(persen >= 95){
                // hijau
                    warna='#47ce6b';
                } else if(persen >= 85 && persen < 95){
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
                 if(persen >= 95){
                // hijau
                    warna='#47ce6b';
                } else if(persen >= 85 && persen < 95){
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

                $('#listPembangkit').html(text['listPembangkit']);
                $('#modal-template').html(text['textPopup']);
               $('#vlsxloading').hide();

            }
        });        
    }
</script>


