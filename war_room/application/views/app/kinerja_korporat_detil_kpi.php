<?php
include_once("functions/string.func.php");
include_once("functions/date.func.php");

$vtoday= getFormattedDate(date("Y-m-d"));
$b = $this->input->get("b");
$t = $this->input->get("t");
$reqId = $this->input->get("reqId");

if(empty($b)) $b=date("m");
if(empty($t)) $t=date("Y");

$this->load->model("base-admin/Page");

if($this->darkmode=='true'||$this->darkmode==''){
  $warna='white';
}
else{
  $warna='black';
}

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

<style>
  .highcharts-figure,
.highcharts-data-table table {
    min-width: 310px;
    max-width: 800px;
    margin: 1em auto;
}

#container {
    height: 400px;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}

.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}

.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
    padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}

.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

.highcharts-exporting-group{
  display: none;
}
</style>

<!-- Services Section Start -->
<section id="services" class="services section-padding">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="area-breadcrumb pull-left">
                    <ul class="breadcrumb">
                    <li><a id="detilkembalihome" href="javascript:void(0)"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                    <li><a id="Indexdetilkinerjakorporat"  href="javascript:void(0)">Kinerja Korporat</a></li> 
                    <li><a id="Indexkinerjakorporatdetil"  href="javascript:void(0)">Kinerja Korporat Level 1</a></li>
                    <li>Kinerja Korporat Level 2</li>
                    </ul> 
                </div>
            </div>

            <div class="col-md-12">
                <div class="area-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="header-detil">
                                <div class="logo-pln-np pull-left"><img src="images/logo.png"></div>    
                                <div class="judul">
                                    <span class="ikon"><img src="images/icon-kinerja-korporat.png"></span> Kinerja Korporat - Level 2
                                    <!-- <div class="area-logout pull-right" style="margin-right: 10px;"><a id='Indexkinerjakorporatdetil' style="background-color: indianred;" href="javascript:void(0)">Halaman Detil <i class="fa fa-arrow-right" aria-hidden="true"></i></a></div> -->
                                </div>
                            </div>                            
                        </div>

                         <!-- Services item -->
                        <div class="col-md-6 col-lg-3 col-xs-12">
                            <div class="services-item wow fadeInDown" data-wow-delay="0.6s">
                              <div class="area-kpi-korporat">                                
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="area-card">
                                      <div class="sub-judul" id='kpi_master'></div>
                                      <div class="inner">
                                        <div class="legend">
                                          <span>PIC: • Unit: Rp Miliar</span>
                                        </div>
                                        <br>
                                        <table>
                                          <tbody>
                                            <tr>
                                              <td><i class="fa fa-circle" aria-hidden="true" style="color: gray;"></i></td>
                                              <td>Target 2023</td>
                                              <td style="text-align:right;" id='target_rkap'></td>
                                            </tr>
                                            <tr>
                                              <td><i class="fa fa-circle" aria-hidden="true" style="color: gray;"></i></td>
                                              <td>Rencana</td>
                                              <td style="text-align:right;" id='target_bulan'></td>
                                            </tr>
                                            <tr>
                                              <td><i class="fa fa-circle merah" aria-hidden="true"></i></td>
                                              <td>Realisasi</td>
                                              <td style="text-align:right;" id='realisasi_bulan'></td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <br>
                                        <div class="legend">
                                          <span><i class="fa fa-circle hijau" aria-hidden="true"></i> On Track        </span>
                                          <span><i class="fa fa-circle kuning" aria-hidden="true"></i> < 5%         </span> 
                                          <span><i class="fa fa-circle merah" aria-hidden="true"></i> > 5%          </span>
                                        </div>
                                      </div>
                                  </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-9 col-xs-12">
                            <div class="services-item wow fadeInDown" data-wow-delay="0.6s">
                              <div class="area-kpi-korporat">                                
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="area-card">
                                      <div class="sub-judul">Projection</div>
                                      <div class="inner">
                                        <div id="container" style="height:175px"></div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-12 col-xs-12">
                            <div class="services-item wow fadeInDown" data-wow-delay="0.6s">
                              <div class="area-kpi-korporat">                                
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="area-card">
                                      <div class="sub-judul">
                                        <span onclick="rowSelect('1')" style="cursor: pointer;" id='head1'>Explanation</span> 
                                        || 
                                        <span onclick="rowSelect('2')" style="cursor: pointer; color:black;" id='head2'>Next Action</span>
                                      </div>
                                      <div class="row" id='val1' style="padding: 0px 20px; height: 250px;">
                                        <div class="col-md-6 col-lg-3 col-xs-12">
                                          <div class="services-item wow fadeInDown" data-wow-delay="0.6s">
                                            <div class="area-kpi-korporat">                                
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <div class="area-card" style="border: solid white;">
                                                    <div class="sub-judul" style="text-align:center;">Explanation</div>
                                                    <div class="inner">
                                                      <div class="legend">
                                                        <textarea id='explanation' style="color:black;width: 100%; overflow-x:hidden; height:175px; -ms-overflow-style: none; scrollbar-width: none;" class="form-control" disabled></textarea>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3 col-xs-12">
                                          <div class="services-item wow fadeInDown" data-wow-delay="0.6s">
                                            <div class="area-kpi-korporat">                                
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <div class="area-card" style="border: solid white;">
                                                    <div class="sub-judul" style="text-align:center;">Previous Action Steps</div>
                                                    <div class="inner">
                                                      <div class="legend">
                                                        <textarea id='prev_action_steps' style="color:black;width: 100%; overflow-x:hidden; height:175px; -ms-overflow-style: none; scrollbar-width: none;" class="form-control" disabled></textarea>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3 col-xs-12">
                                          <div class="services-item wow fadeInDown" data-wow-delay="0.6s">
                                            <div class="area-kpi-korporat">                                
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <div class="area-card" style="border: solid white;">
                                                    <div class="sub-judul" style="text-align:center;">Impact</div>
                                                    <div class="inner">
                                                      <div class="legend">
                                                        <textarea id='action_impact' style="color:black;width: 100%; overflow-x:hidden; height:175px; -ms-overflow-style: none; scrollbar-width: none;" class="form-control" disabled></textarea>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3 col-xs-12">
                                          <div class="services-item wow fadeInDown" data-wow-delay="0.6s">
                                            <div class="area-kpi-korporat">                                
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <div class="area-card" style="border: solid white;">
                                                    <div class="sub-judul" style="text-align:center;">Status</div>
                                                    <div class="inner">
                                                      <div class="legend">
                                                        <textarea id='action_status' style="color:black;width: 100%; overflow-x:hidden; height:175px; -ms-overflow-style: none; scrollbar-width: none;" class="form-control" disabled></textarea>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row" id='val2' style="display:none;padding: 0px 20px;height: 250px;">
                                        <div class="col-md-6 col-lg-4 col-xs-12">
                                          <div class="services-item wow fadeInDown" data-wow-delay="0.6s">
                                            <div class="area-kpi-korporat">                                
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <div class="area-card" style="border: solid white;">
                                                    <div class="sub-judul" style="text-align:center;">Next Action</div>
                                                    <div class="inner">
                                                      <div class="legend">
                                                        <textarea id='next_action_step' style="color:black;width: 100%; overflow-x:hidden; height:175px; -ms-overflow-style: none; scrollbar-width: none;" class="form-control" disabled></textarea>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4 col-xs-12">
                                          <div class="services-item wow fadeInDown" data-wow-delay="0.6s">
                                            <div class="area-kpi-korporat">                                
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <div class="area-card" style="border: solid white;">
                                                    <div class="sub-judul" style="text-align:center;">Due Date</div>
                                                    <div class="inner">
                                                      <div class="legend">
                                                        <textarea id='due_date' style="color:black;width: 100%; overflow-x:hidden; height:175px; -ms-overflow-style: none; scrollbar-width: none;" class="form-control" disabled></textarea>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4 col-xs-12">
                                          <div class="services-item wow fadeInDown" data-wow-delay="0.6s">
                                            <div class="area-kpi-korporat">                                
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <div class="area-card" style="border: solid white;">
                                                    <div class="sub-judul" style="text-align:center;">PIC</div>
                                                    <div class="inner">
                                                      <div class="legend">
                                                        <!-- <span id='pic'></span> -->
                                                        <textarea id='pic' style="color:black;width: 100%; overflow-x:hidden; height:175px; -ms-overflow-style: none; scrollbar-width: none;" class="form-control" disabled></textarea>
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
  $.ajax({
        url : 'json-api/KinerjaKorporat_json/subTracker?bln='+bln+'&thn='+thn+'&reqId=<?=$reqId?>',
        type : 'GET',
        dataType : 'text',
        success : function(text) {
            text= JSON.parse(text)
            $('#explanation').html(text["explanation"]);
            $('#prev_action_steps').html(text["prev_action_steps"]);
            $('#action_impact').html(text["action_impact"]);
            $('#action_status').html(text["action_status"]);
            $('#next_action_step').html(text["next_action_step"]);
            $('#due_date').html(text["due_date"]);
            $('#pic').html(text["pic"]);
            $('#target_rkap').html(text["target_rkap"]);
            $('#realisasi_bulan').html(text["realisasi_bulan"]);
            $('#target_bulan').html(text["target_bulan"]);
            $('#kpi_master').html(text["kpi_master"]);

            target_rkap=parseFloat(text["target_rkap"]);

            Highcharts.chart('container', {
                title: {
                    text: '',
                },
                xAxis: {
                    categories: ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'],
                    labels: {
                      formatter () {
                        return `<span style="color: <?=$warna?>;font-size:12px">${this.value}</span>`
                      }
                    }
                },
                yAxis: {
                    title: {
                        text: ''
                    },
                    labels: {
                      formatter () {
                        return `<span style="color: <?=$warna?>;font-size:12px">${this.value}</span>`
                      }
                    }
                },
                tooltip: {
                    // valueSuffix: ' million liters'
                  style: {
                    fontSize:'12px'
                  }
                },
                plotOptions: {
                    series: {
                        borderRadius: '25%'
                    }
                },
                legend: {
                    labelFormat: '<span style="color:<?=$warna?>;font-size:12px">{name}</span>'
                },
                chart: {
                    renderTo: 'containter',
                    // borderWidth: 1,
                    backgroundColor: null,
                    height: 200,
                },
                series: [{
                    type: 'column',
                    name: 'Revised Forecast',
                    data: [target_rkap,target_rkap,target_rkap,target_rkap,target_rkap,target_rkap,target_rkap,target_rkap,target_rkap,target_rkap,target_rkap,target_rkap],
                    color: 'gray'
                }, {
                    type: 'column',
                    name: 'Actual',
                    data: [parseFloat(text["realisasi_bulan_arr"][0]),parseFloat(text["realisasi_bulan_arr"][1]),parseFloat(text["realisasi_bulan_arr"][2]),parseFloat(text["realisasi_bulan_arr"][3]),parseFloat(text["realisasi_bulan_arr"][4]),parseFloat(text["realisasi_bulan_arr"][5]),parseFloat(text["realisasi_bulan_arr"][6]),parseFloat(text["realisasi_bulan_arr"][7]),parseFloat(text["realisasi_bulan_arr"][8]),parseFloat(text["realisasi_bulan_arr"][9]),parseFloat(text["realisasi_bulan_arr"][10]),parseFloat(text["realisasi_bulan_arr"][11])],
                    color: 'blue'
                }, {
                    type: 'line',
                    step: 'center',
                    name: 'RKAP',
                    data: [target_rkap,target_rkap,target_rkap,target_rkap,target_rkap,target_rkap,target_rkap,target_rkap,target_rkap,target_rkap,target_rkap,target_rkap],
                    color: 'red',
                    marker: {
                        lineWidth: 2,
                        lineColor: Highcharts.getOptions().colors[3],
                        fillColor: 'red'
                    }
                }]
            });

            $('#vlsxloading').hide();
        }
    });
}

function rowSelect(argument) {
  if (argument==1){
    $('#val2').hide();
    $('#val1').show();
    $('#head1').attr('style','color:white;cursor:pointer;');
    $('#head2').attr('style','color:black;cursor:pointer;');
  }
  else{
    $('#val1').hide();
    $('#val2').show(); 
    $('#head2').attr('style','color:white;cursor:pointer;');
    $('#head1').attr('style','color:black;cursor:pointer;');
  }
}

</script>
