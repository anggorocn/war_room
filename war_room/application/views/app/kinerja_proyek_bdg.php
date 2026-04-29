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
                        <li><a id="detilkembalihome" href="javascript:void(0)"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                        <li>Kinerja Proyek BDG</li>
                    </ul> 
                </div>
            </div>

            <div class="col-md-12">
                <div class="area-wrapper" style="height: calc(100vh - 70px);">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="header-detil">
                                <!-- <div class="logo-pln-np pull-left"><img src="images/logo.png"></div>     -->
                                <div class="judul">
                                    <span class="ikon"><img src="images/icon-kinerja-korporat.png"></span> Kinerja Proyek BDG
                                </div>
                            </div>
                        </div>
                        <!-- Services item -->
                        <div class="col-md-6 col-lg-4 col-xs-12">
                            <div class="services-item wow fadeInDown" data-wow-delay="0.6s">
                              <div class="area-info-target area-grafik-kiri">
                                <div class="row inner">
                                  <div class="col-md-12">
                                    <div class="item">
                                      <br>
                                      <h4><center>Overview Proyek Penugasan</center></h4>
                                      <br>
                                      <div class="grafik-donut" id="grafik-pie-kinerja-korporat"></div>
                                        <div class="caption" style="margin: 0px 100px;">
                                            <table style="width:100%;">
                                                <tr>
                                                    <td style="text-align:left;height: 5px;"><i class="fa fa-circle" aria-hidden="true" style="color:#41ADF2"></i> Initiation</td>
                                                    <td style="height: 5px;" id='id-StatusBelumAdaProgress'>0</td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align:left;height: 5px;"><i class="fa fa-circle" aria-hidden="true" style="color:#F88D28"></i> Development</td>
                                                    <td style="height: 5px;" id='id-StatusDevelopment'>0</td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align:left;height: 5px;"><i class="fa fa-circle" aria-hidden="true" style="color:#17A31A;"></i> Completion</td>
                                                    <td style="height: 5px;" id='id-StatusCompletion'>0</td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align:left;height: 5px;"><i class="fa fa-circle" aria-hidden="true" style="color:#FF7D73;"></i> Execution</td>
                                                    <td style="height: 5px;" id='id-StatusExecution'>0</td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align:left;height: 5px;"></td>
                                                    <td style="height: 5px;"></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              </div>                              
                            </div>
                        </div>

                        <!-- Services item -->
                        <div class="col-md-6 col-lg-8 col-xs-12">
                            <div class="services-item wow fadeInDown" data-wow-delay="0.6s">
                              <div class="area-komponen-kpi" style="color:white;">
                                <h4>Daftar Proyek BDG</h4>
                                <div class="tab-content" id='tabContent' style="color:black;">

                                </div>
                                
                              </div>
                            </div>
                        </div>
                    </div>

                    <div class="area-sumber-data detil">
                        <label>Sumber data : <span>Bid BDG</span></label>
                        <label>Last update : <span id='last_modified'></span></label>
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

<!-- <script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script> -->

<script type="text/javascript">
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

            pointFormat: '<b style="">{point.y}</b>',
            style: {
               fontSize: '13px'
            }

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
                    format: '<b>{point.name}</b>: {point.y} %'
                },
                borderWidth: 0
            },
            series: {
                cursor: 'pointer',
                point: {
                    events: {
                        click: function () {
                            if (!this.selected) {
                                KinerjaKorporat(this.name);
                            } else {
                                KinerjaKorporat();
                            }
                            $('#vlsxloading').show();
                        }
                    }
                }
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'Belum Ada Progress',
                y:0,
                // sliced: true,
                selected: true,
                color: 'gray'
            }, {
                name: 'Development',
                y:0,
                color: 'red'
            },  {
                name: 'GRC',
                y:0,
                color: 'skyblue'
            }, {
                name: 'KKP oleh PLN',
                y:0,
                color: 'blue'
            }, {
                name: 'Konstruksi',
                y:0,
                color: 'darkgreen'
            }, {
                name: 'Pre-FS / FS',
                y:0,
                color: 'pink'
            }]
        }]
    });
</script>

<!-- SCRIPT -->
  <!-- <script src="jquery.min.js"></script> -->
  <script src="lib/ScrollingTable/scrollingtable.js"></script>
  <script>
    $('#Demo').ScrollingTable();
  </script>



<script type="text/javascript">
  bln= parseInt($("#bln").val());
  thn= parseInt($("#thn").val());

  $(document).ready(function() {
    KinerjaKorporat();

    $("#bln,#thn").on('change',function(){
      bln= parseInt($("#bln").val());
      thn= parseInt($("#thn").val());

      KinerjaKorporat();
    });

  })

  function KinerjaKorporat(val){
    $.ajax({
        url : 'json-api/ProyekBDG_json/home?bln='+bln+'&thn='+thn+'&search='+val,
        type : 'GET',
        dataType : 'text',
        success : function(text) {
            // console.log(text);
            text= JSON.parse(text);
            $('#tabContent').html(text["tabContent"]);
            $('#id-StatusBelumAdaProgress').html(text["StatusBelumAdaProgress"]);
            $('#id-StatusDevelopment').html(text["StatusDevelopment"]);
            $('#id-StatusGRC').html(text["StatusGRC"]);
            $('#id-StatusKKPolehPLN').html(text["StatusKKPolehPLN"]);
            $('#id-StatusCompletion').html(text["StatusCompletion"]);
            $('#id-StatusExecution').html(text["StatusExecution"]);
            $('#id-StatusPreFS').html(text["StatusPreFS"]);
            $('#last_modified').html(text["last_modified"]);
            $('#Demo').ScrollingTable();
            chart1 = $('#grafik-pie-kinerja-korporat').highcharts();
            chart1.series[0].update({
                data: [{
                    name: 'Initiation',
                    y: text["StatusBelumAdaProgress"],
                    // sliced: true,
                    selected: true,
                    color: '#41ADF2'
                }, {
                    name: 'Development',
                    y: text["StatusDevelopment"],
                    color: '#F88D28'
                }, {
                    name: 'Completion ',
                    y: text["StatusCompletion"],
                    color: '#17A31A'
                }, {
                    name: 'Execution',
                    y: text["StatusExecution"],
                    color: '#FF7D73'
                }]
                }, false);
            chart1.redraw();
              $('#vlsxloading').hide();
        }
    });
  }
</script>