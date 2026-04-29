<?php
include_once("functions/string.func.php");
include_once("functions/date.func.php");

$vtoday= getFormattedDate(date("Y-m-d"));
$bln = $this->input->get("b");
$thn = $this->input->get("t");

?>


<!-- Services Section Start -->
<section id="services" class="services section-padding">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="area-breadcrumb pull-left">
                    <ul class="breadcrumb">
                    <!-- <li><a href="app"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li> -->
                    <li><a id="detilkembalihome" href="javascript:void(0)"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>

                    <!-- <li><a href="#">Peta Pembangkit</a></li>
                    -->
                    <li><a id="Indexdetilkinerjakorporat"  href="javascript:void(0)">Kinerja Korporat</a></li> 
                    <li>Kinerja Korporat Level 1</li>
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
                                    <span class="ikon"><img src="images/icon-kinerja-korporat.png"></span> Kinerja Korporat - Level 1
                                    <!-- <a class="selengkapnya pull-right" href="app/index/kinerja_korporat_detil"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a> -->
                                </div>
                            </div>
                            
                        </div>
                        
                        <!-- Services item -->
                        <!-- <div class="col-md-6 col-lg-1 col-xs-12 padding-none">
                            test
                        </div> -->

                        <!-- Services item -->
                        <div class="col-md-6 col-lg-4 col-xs-12">
                            <div class="services-item wow fadeInDown" data-wow-delay="0.6s">

                              <div class="area-info-target">
                                <div class="row inner">
                                  <div class="col-md-6">
                                    <div class="item sudah-memenuhi-target">
                                      <div class="grafik-donut" id="pie-sudah-memenuhi-target"></div>
                                      <div class="caption">Sudah Memenuhi Target</div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="item hampir-memenuhi-target">
                                      <div class="grafik-donut" id="pie-hampir-memenuhi-target"></div>
                                      <div class="caption">Hampir Memenuhi Target</div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="item belum-memenuhi-target">
                                      <div class="grafik-donut" id="pie-belum-memenuhi-target"></div>
                                      <div class="caption">Belum Memenuhi Target</div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="item belum-dilakukan-penilaian">
                                      <div class="grafik-donut" id="pie-belum-dilakukan-penilaian"></div>
                                      <div class="caption">Belum Dilakukan Penilaian</div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              
                            </div>
                        </div>

                        <!-- Services item -->
                        <div class="col-md-6 col-lg-8 col-xs-12">
                            <div class="services-item wow fadeInDown" data-wow-delay="0.6s">
                              <div class="area-komponen-kpi">
                                <ul class="nav nav-tabs" id='tablist'>
                                  
                                </ul>

                                <div class="tab-content" id='tabContent'>

                                </div>
                                
                              </div>
                            </div>
                        </div>
                    </div>

                    <div class="area-sumber-data detil">
                        <label>Sumber data : <span>PBR</span></label>
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

<!-- <script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script> -->

<script type="text/javascript">
;
</script>

<script type="text/javascript">
 
</script>

<script type="text/javascript">

</script>

<script type="text/javascript">
  
</script>

<!-- SCRIPT -->
  <!-- <script src="jquery.min.js"></script> -->
  <script src="lib/ScrollingTable/scrollingtable.js"></script>
  <script>
    $('#Demo').ScrollingTable();
  </script>



<script type="text/javascript">
  
  $(document).ready(function() {
    bln= parseInt($("#bln").val());
    thn= parseInt($("#thn").val());
    KinerjaKorporat(bln,thn);

    $("#bln,#thn").on('change',function(){
      bln= parseInt($("#bln").val());
      thn= parseInt($("#thn").val());

      KinerjaKorporat(bln,thn);
    });

  })

  function KinerjaKorporat(bln,thn){
    // console.log(bln);
    $.ajax({
        url : 'json-api/KinerjaKorporat_json/subDetil?bln='+bln+'&thn='+thn,
        type : 'GET',
        dataType : 'text',
        success : function(text) {
            text= JSON.parse(text)
            $('#tablist').html(text["tablist"]);
            $('#tabContent').html(text["tabContent"]);
            $('#Demo').ScrollingTable();
        }
    });

    $.ajax({
        url : 'json-api/KinerjaKorporat_json/home?bln='+bln+'&thn='+thn,
        type : 'GET',
        dataType : 'text',
        success : function(text) {
            text= JSON.parse(text)
            $('#listStatus100').html(text["listStatus100"]);
            $('#listStatus95').html(text["listStatus95"]);
            $('#listStatus90').html(text["listStatus90"]);
            $('#totalKpi').html(text["totalKpi"]);
            $('#listStatusBelumPenilaian').html(text["listStatusBelumPenilaian"]);
          
                Highcharts.chart('pie-sudah-memenuhi-target', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: 0,
                        plotShadow: false,
                        backgroundColor: null,
                    },
                    exporting: {
                      enabled: false
                    },
                    title: {
                      text: ''
                    },
                    exporting: {
                      enabled: false
                    },
                    credits: {
                      enabled: false
                    },
                    title: {
                        text: (parseInt(text["listStatus100"])/parseInt(text["totalKpi"]) * 100).toFixed(2)+'%',
                        align: 'center',
                        verticalAlign: 'middle',
                        y: 10,

                    },
                    plotOptions: {
                        pie: {
                            dataLabels: {
                                enabled: true,
                                distance: -75,
                                y: -2,
                                format: "{y}",
                                style: {
                                    fontWeight: 'bold',
                                    color: 'black',
                                    fontSize: '24px'
                                },
                               filter: {
                                    property: 'name',
                                    operator: '===',
                                    value: 'Firefox'
                                },
                            },
                             borderWidth: 2
                        },
                        series: {
                          animation: false
                        }
                    },
                    series: [{
                        type: 'pie',
                        name: 'Sudah Memenuhi Target',
                        innerSize: '60%',
                        data: [
                            { name: '', y: parseInt(text["listStatus100"]), color: '#1aaf54' },
                            { name: '', y: parseInt(text["totalKpi"])-parseInt(text["listStatus100"]), color: "#7f7f7f" },
                        ]
                    }]
                });
                Highcharts.chart('pie-hampir-memenuhi-target', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: 0,
                        plotShadow: false,
                        backgroundColor: null,
                    },
                    exporting: {
                      enabled: false
                    },
                    title: {
                      text: ''
                    },
                    exporting: {
                      enabled: false
                    },
                    credits: {
                      enabled: false
                    },
                    title: {
                        text: (parseInt(text["listStatus95"])/parseInt(text["totalKpi"]) * 100).toFixed(2)+'%',
                        align: 'center',
                        verticalAlign: 'middle',
                        y: 10,

                    },
                    plotOptions: {
                        pie: {
                            dataLabels: {
                                enabled: true,
                                distance: -75,
                                y: -2,
                                format: "{y}",
                                style: {
                                    fontWeight: 'bold',
                                    color: 'black',
                                    fontSize: '24px'
                                },
                               filter: {
                                    property: 'name',
                                    operator: '===',
                                    value: 'Firefox'
                                },
                            },
                             borderWidth: 2
                        },
                        series: {
                          animation: false
                        }
                    },
                    series: [{
                        type: 'pie',
                        name: 'Hampir Memenuhi Target',
                        innerSize: '60%',
                        data: [
                        { name: '', y: parseInt(text["listStatus95"]), color: '#fdbf2d' },
                        { name: '', y: parseInt(text["totalKpi"])-parseInt(text["listStatus95"]), color: "#7f7f7f" },
                        ]
                    }]
                });
                Highcharts.chart('pie-belum-memenuhi-target', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: 0,
                        plotShadow: false,
                        backgroundColor: null,
                    },
                    exporting: {
                      enabled: false
                    },
                    title: {
                      text: ''
                    },
                    exporting: {
                      enabled: false
                    },
                    credits: {
                      enabled: false
                    },
                    title: {
                        text: (parseInt(text["listStatus90"])/parseInt(text["totalKpi"]) * 100).toFixed(2)+'%',
                        align: 'center',
                        verticalAlign: 'middle',
                        y: 10,

                    },
                    plotOptions: {
                        pie: {
                            dataLabels: {
                                enabled: true,
                                distance: -75,
                                y: -2,
                                format: "{y}",
                                style: {
                                    fontWeight: 'bold',
                                    color: 'black',
                                    fontSize: '24px'
                                },
                               filter: {
                                    property: 'name',
                                    operator: '===',
                                    value: 'Firefox'
                                },
                            },
                             borderWidth: 2
                        },
                        series: {
                          animation: false
                        }
                    },
                    series: [{
                        type: 'pie',
                        name: 'Belum Memenuhi Target',
                        innerSize: '60%',
                        data: [
                            { name: '', y: parseInt(text["listStatus90"]), color: '#fc0d1b' },
                            { name: '', y: parseInt(text["totalKpi"])-parseInt(text["listStatus90"]), color: "#7f7f7f" },
                        ]
                    }]
                });
                Highcharts.chart('pie-belum-dilakukan-penilaian', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: 0,
                        plotShadow: false,
                        backgroundColor: null,
                    },
                    exporting: {
                      enabled: false
                    },
                    title: {
                      text: ''
                    },
                    exporting: {
                      enabled: false
                    },
                    credits: {
                      enabled: false
                    },
                    title: {
                        text: (parseInt(text["listStatusBelumPenilaian"])/parseInt(text["totalKpi"]) * 100).toFixed(2)+'%',
                        align: 'center',
                        verticalAlign: 'middle',
                        y: 10,

                    },
                    plotOptions: {
                        pie: {
                            dataLabels: {
                                enabled: true,
                                distance: -75,
                                y: -2,
                                format: "{y}",
                                style: {
                                    fontWeight: 'bold',
                                    color: 'black',
                                    fontSize: '24px'
                                },
                               filter: {
                                    property: 'name',
                                    operator: '===',
                                    value: 'Firefox'
                                },
                            },
                             borderWidth: 2
                        },
                        series: {
                          animation: false
                        }
                    },
                    series: [{
                        type: 'pie',
                        name: 'Belum Dilakukan',
                        innerSize: '60%',
                        data: [
                            { name: '', y: parseInt(text["listStatusBelumPenilaian"]), color: '#135a70' },
                            { name: '', y: parseInt(text["totalKpi"])-parseInt(text["listStatusBelumPenilaian"]), color: "#7f7f7f" },
                        ]
                    }]
                });
               $('#vlsxloading').hide();
                
            }
        });
  }
</script>

