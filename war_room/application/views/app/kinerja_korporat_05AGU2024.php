<?php
include_once("functions/string.func.php");
include_once("functions/date.func.php");

$vtoday= getFormattedDate(date("Y-m-d"));
$b = $this->input->get("b");
$t = $this->input->get("t");

if(empty($b)) $b=date("m");
if(empty($t)) $t=date("Y");

$this->load->model("base-admin/Page");


$apppageroleid=$this->apppageroleid;
$apppagerolekode=$this->apppagerolekode;
$appusernama=$this->appusernama;
$appuserkodehak=$this->appuserkodehak;

$set= new Page();
$set->selectByParamsMenus(array(),-1,-1," AND KODE_MODUL='030101' AND MENU = 1 ",$apppagerolekode);
// echo $set->query;exit;
$arrMenu=[];
while($set->nextRow())
{
    $arrdata= [];
    $arrdata["ID"]= $set->getField("KODE_MODUL");
    $arrdata["ID_PARENT"]= $set->getField("LEVEL_MODUL");
    $arrdata["NAMA"]= $set->getField("MENU_MODUL");
    $arrdata["NAMA_GROUP"]= $set->getField("GROUP_MODUL");
    $arrdata["LINK_MODUL"]= $set->getField("LINK_MODUL");
    $arrdata["IDMODUL"]= $set->getField("IDMODUL");
    array_push($arrMenu, $arrdata);
}



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
                                <!-- <div class="logo-pln-np pull-left"><img src="images/logo.png"></div>     -->
                                <div class="judul">
                                    <span class="ikon"><img src="images/icon-kinerja-korporat.png"></span> Kinerja Korporat
                                    <!-- <a class="selengkapnya pull-right" id='Indexkinerjakorporatdetil'><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a> -->
                                    <div class="area-logout pull-right" style="margin-right: 10px;"><a id='Indexkinerjakorporatdetil' style="background-color: indianred;" href="javascript:void(0)">Halaman Detil <i class="fa fa-arrow-right" aria-hidden="true"></i></a></div>
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
                                    <!-- <span><i class="fa fa-circle biru" aria-hidden="true"></i> On track          </span> -->
                                    <span><i class="fa fa-circle abu-abu" aria-hidden="true"></i> Belum diukur</span>
                                  </div>
                                  <div class="row" id="vpie"></div>
                                  <div class="area-sumber-data detil">
                                      <label>Sumber data : <span>PBR</span></label>
                                      <label>Last update : <span id='tgl_entri'></span></label>
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
                                              <th style="text-align:right;">Jumlah KPI</th>
                                            </tr>  
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td>≥ 100%</td>
                                              <td><i class="fa fa-circle hijau" aria-hidden="true"></i></td>
                                              <td style="text-align:right;" id='listStatus100'></td>
                                            </tr>
                                            <tr>
                                              <td>≥ 95% - < 100%</td>
                                              <td><i class="fa fa-circle kuning" aria-hidden="true"></i></td>
                                              <td style="text-align:right;" id='listStatus95'></td>
                                            </tr>
                                            <tr>
                                              <td>< 95%</td>
                                              <td><i class="fa fa-circle merah" aria-hidden="true"></i></td>
                                              <td style="text-align:right;" id='listStatus90'></td>
                                            </tr>
<!--                                             <tr>
                                              <td>On track</td>
                                              <td><i class="fa fa-circle biru" aria-hidden="true"></i></td>
                                              <td>0</td>
                                              <td>/33</td>
                                            </tr> -->
                                            <tr>
                                              <td>Belum dilakukan</td>
                                              <td><i class="fa fa-circle abu-abu" aria-hidden="true"></i></td>
                                              <td style="text-align:right;" id='listStatusBelumPenilaian'></td>
                                            </tr>
                                            <tr>
                                              <td colspan="2">Total KPI</td>
                                              <td id='totalKpi' style="text-align:right;"></td>
                                            </tr>
                                          </tbody>
                                        </table>
                                                        
                                        
                                      </div>
                                  </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="area-card">
                                      <div class="sub-judul">NKO</div>
                                      <div class="inner" id='nko_final'>
                                        
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
                                    <!-- <div class="area-card">
                                      <div class="sub-judul">Executive Summary</div>
                                      <div class="inner">
                                        Pencapaian kinerja korporat sampai dengan bulan Juni 2023, yaitu sebanyak 24 KPI memenuhi target (warna Hijau), 3 hampir memenuhi target (warna Kuning), dan 5 KPI belum memenuhi target (warna Merah).
                                      </div>
                                    </div> -->
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

<!-- HIGHCHARTS -->
<script src="lib/highcharts/highcharts.js"></script>
<script src="lib/highcharts/exporting.js"></script>
<script src="lib/highcharts/accessibility.js"></script>
<script src="lib/highcharts/export-data.js"></script>

<script type="text/javascript">
  // Data retrieved from https://netmarketshare.com
  /*Highcharts.chart('pie-economic', {
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
  });*/

  $(document).ready(function() {
    console.log(bln);
    KinerjaKorporat();
    KinerjaKorporatNKO();

    $("#bln,#thn").on('change',function(){
      $('#vlsxloading').show();
      
      bln= parseInt($("#bln").val());
      thn= parseInt($("#thn").val());

      KinerjaKorporat();
      KinerjaKorporatNKO();
    });

  })

  function KinerjaKorporat(){
    bln= parseInt($("#bln").val());
    thn= parseInt($("#thn").val());

    $.ajax({
        url : 'json-api/KinerjaKorporat_json/subcb?bln='+bln+'&thn='+thn,
        type : 'GET',
        dataType : 'text',
        success : function(text) {
          text= JSON.parse(text)
          $('#listStatusBelumPenilaian').html(text["listStatusBelumPenilaian"]);
          $('#listStatus100').html(text["listStatus100"]);
          $('#listStatus95').html(text["listStatus95"]);
          $('#listStatus90').html(text["listStatus90"]);
          $('#totalKpi').html(text["totalKpi"]);
          $('#tgl_entri').html(text["tgl_entri"]);

          arrkpigroup= text["arrkpigroup"];
          vpie= text["vpie"];
          $('#vpie').html(vpie);

          for(i=0; i<arrkpigroup.length; i++)
          {
            vgroupid= arrkpigroup[i]['id'];
            $("#keteranganchart"+vgroupid).text(arrkpigroup[i]['keterangan']);
            Highcharts.chart('chartjson'+vgroupid, {
              chart: {
                  plotBackgroundColor: null,
                  plotBorderWidth: null,
                  plotShadow: false,
                  type: 'pie',
                  // events: {
                  //   load: function(e) {
                  //       // console.log(this);
                  //       this.options.plotOptions.series.dataLabels.distance =  (this.chartHeight / 5.5) * -1;
                  //       this.series[0].update(this.options);
                  //   },
                  //   redraw: function() {
                  //    //console.log(this);   
                  //   }
                  // },
                  events: {
                    load: function() {
                      const series = this.series[0];
                      const points = series.data;
                      const chart = this;
                      
                      points.forEach(function(point) {
                          const myOffset = 25;
                          const {x: centerX, y: centerY} = point.graphic.attr();
                          const {x, y} = point.dataLabel.attr();
                          const angle = point.angle;
                          point.dataLabel.attr({
                            x: (x + Math.cos(angle) * myOffset)+1,
                            y: (y + Math.sin(angle) * myOffset)+5
                          });
                      });
                    }
                  },
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
                  // pointFormat: '{point.name}: <b>{point.y:.1f}</b>'
                  pointFormat: '<b>{point.y:.1f}</b>'
                  // pointFormat: null
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
                      // dataLabels: {
                      //   enabled: true,
                      //   // formatter: function() {
                      //   //   return Math.floor(this.percentage*100)/100 + ' %';
                      //   // },
                      //   // distance: -100,
                      //   // connectorWidth : 0,
                      //   // color: 'rgb(0, 127, 209)'
                      // }
                      /*dataLabels: {
                        enabled: true,
                        distance: -30,
                        allowOverlap: false,
                        format: '{point.percentage:.1f} %',
                      },*/
                      // dataLabels: {
                      //     enabled: false,
                      //     // format: '<b>{point.name}</b>: {point.y:.1f}'
                      // }
                      dataLabels: {
                        enabled: true,
                        distance: -40,
                        formatter: function() {
                          if(this.y!=0){
                            yNew=this.y
                          }
                          else{
                            yNew=''
                          }

                          return "<span style='font-size:15px'>"+yNew+"<span>";
                        }
                      },
                  }
              },
              series: [{
                  colorByPoint: true,
                  data: [{
                      name: '≥ 100%',
                      y: arrkpigroup[i]['v100'],
                      selected: true,
                      color: '#22b55d'
                  }, {
                      name: '≥ 95% - ≤ 100%',
                      y: arrkpigroup[i]['v95'],
                      color: '#fdc02f'
                  },  {
                      name: '<95%',
                      y: arrkpigroup[i]['v90'],
                      color: '#d93749'
                  }, {
                      name: 'Belum Dilakukan',
                      y: arrkpigroup[i]['belum'],
                      color: '#7987a0'
                  }]
              }]
            });
          }
         $('#vlsxloading').hide();
        }
    });

  }

  function KinerjaKorporatNKO(){
    $.ajax({
        url : 'json-api/KinerjaKorporatNKO_json/sub?bln='+bln+'&thn='+thn,
        type : 'GET',
        dataType : 'text',
        success : function(text) {
            text= JSON.parse(text)
            $('#nko_final').html(text["nko_final"]);
        }        
    });
  }

</script>
