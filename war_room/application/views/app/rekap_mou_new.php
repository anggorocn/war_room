<style type="text/css">
    /*.area-tabel table{
        width: 235vh !important;
    }*/
</style>
<?php
include_once("functions/string.func.php");
include_once("functions/date.func.php");
?>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>


<!-- Services Section Start -->
<section id="services" class="services section-padding">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="area-breadcrumb pull-left">
                    <ul class="breadcrumb">
                    <li><a href="app"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                    <!-- <li><a href="#">Peta Pembangkit</a></li>-->
                    <!-- <li><a href="app/index/kinerja_korporat">Kinerja Korporat</a></li>  -->
                    <li>Rekap MoU Dit Aga for Monitoring</li>
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
                                <span class="ikon"><img src="images/icon-kinerja-korporat.png"></span> Monitoring MoU Pengembangan Bisnis
                                <!-- <a class="selengkapnya pull-right" href="app/index/kinerja_korporat_detil"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a> -->
                            </div>
                          </div>
                          
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <ul class="nav nav-tabs nav-tabs-pln">
                            <li class="active"><a href="#tab2" data-toggle="tab">BDD</a></li>
                            <li><a href="#tab3" data-toggle="tab">BDG</a></li>
                        </ul>
                        <div class="tab-content">

                            <!-- BDD Pane -->
                            <div class="tab-pane fade in active" id="tab2">
                                <div class="row">
                                    <div class="col-md-3">
                                      
                                      <div class="area-info-target area-grafik-kiri">
                                        
                                        <div class="inner">
                                          <div class="item" style="padding-bottom: 20px;text-align:center;">
                                            <h4>Status MoU</h4>
                                            <div id="grafik-bdd" class="grafik-donut contains-chart" style="width: 100%; min-height: 350px; margin: 0 auto; position: relative;"></div>
                                            <span style="">Total Data <span id='total_bdd'> </span></span>
                                            <br>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-9">
                                      <div class="area-datatabel">
                                        <table id="bdd-table" class="table table-bordered" width="100%">
                                          <thead>
                                            <tr>
                                            <th class="headerHor" style="width:30%">Partner</th>
                                            <th class="headerHor" style="width:30%">Mou Title</th>
                                            <th class="headerHor" style="width:30%">Scope</th>
                                            <th class="headerHor" style="width:10%">Status</th>
                                            </tr>
                                          </thead>
                                         </table>
                                      </div>
                                    </div>
                                </div>
                            </div>

                            <!-- BDG Pane -->
                            <div class="tab-pane fade" id="tab3">
                              <div class="row">
                                <div class="col-md-3">
                                  
                                  <div class="area-info-target area-grafik-kiri">
                                    
                                    <div class="inner">
                                      <div class="item" style="padding-bottom: 20px;text-align:center;">
                                        <h4>Status MoU</h4>
                                        <div id="grafik-bdg" class="grafik-donut contains-chart" style="width: 100%; min-height: 350px; margin: 0 auto; position: relative;"></div>
                                        <span style="">Total Data <span id='total_bdg'> </span></span>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-9">
                                  <div class="area-datatabel">
                                     <table id="bdg-table" class="table table-bordered" width="100%">
                                      <thead>
                                        <tr>
                                        <th class="headerHor" style="width:30%">Partner</th>
                                        <th class="headerHor" style="width:30%">Mou Title</th>
                                        <th class="headerHor" style="width:30%">Scope</th>
                                        <th class="headerHor" style="width:10%">Status</th>
                                        </tr>
                                      </thead>
                                     </table>
                                  </div>
                                </div>
                              </div>
                                
                            </div>
                        </div><!-- tab content -->
                      </div>
                    </div>

                    <div class="area-sumber-data detil">
                        <label>Sumber data : <span>BDG BDD</span></label>
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

<!-- <script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script> -->

<!-- GRAFIK INSIDE TAB -->
<script>

    jQuery(document).ready(function () {

        // Build a chart
        jQuery('#grafik-bdd').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                backgroundColor: null,
            },
            exporting: {
              enabled: false
            },
            title: {
                text: null
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false,
                        // distance: -40,
                        // formatter: function() {
                        //   return this.y + '%';
                        // }
                    },
                    showInLegend: true,
                    colors: [
                      '#cc3755',
                      '#4ecc6f',
                    ],
                    size: '70%'
                }
            },
            series: [{
                type: 'pie',
                data: [
                    ['Perlu tindak lanjut',0],
                    ['Berjalan',0]
                ],
                dataLabels: {
                  verticalAlign: 'top',
                  enabled: true,
                  color: '#FFFFFF',
                  connectorWidth: 1,
                  distance: -45,
                  connectorColor: '#000000',
                  // formatter: function () {
                  //     return Math.round(this.percentage) + ' %' + '({point.y})';
                  // },
                  // format: '<b>{point.name}</b>:<br>{point.percentage:.1f} %<br>total: {point.y}',
                  format: '<br>{point.percentage:.1f} %<br>({point.y}) ',
                  style: {
                    fontSize: '16px',
                    textOutline: 0
                  }
                },
                point: {
                    events: {
                        click: function () {
                            if (!this.selected) {
                              if(this.name=='Berjalan'){
                                search='ok';
                              }
                              else{
                                search='nok';
                              }
                              var table = $('#bdd-table').DataTable();
                              table.column(6).search(search).draw();
                            } else {
                                // RekapMou();
                            }
                        }
                    }
                }
            }],
            legend: {
              itemStyle: {
                 fontSize:'14px',
                 // font: '35pt Trebuchet MS, Verdana, sans-serif',
                 color: '#FFFFFF'
              },
            }
        });

        // Build a chart
        jQuery('#grafik-bdg').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                backgroundColor: null
            },
            exporting: {
              enabled: false
            },
            title: {
                text: null
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true,
                    colors: [
                      '#cc3755',
                      '#4ecc6f',
                    ],
                    size: '70%'
                }
            },
            series: [{
                type: 'pie',
                data: [
                    ['Perlu tindak lanjut', 0],
                    ['Berjalan',0]
                ],
                dataLabels: {
                  verticalAlign: 'top',
                  enabled: true,
                  color: '#FFFFFF',
                  connectorWidth: 1,
                  distance: -45,
                  connectorColor: '#000000',
                  // formatter: function () {
                  //     return Math.round(this.percentage) + ' %';
                  // },
                  format: '<br>{point.percentage:.1f} %<br>({point.y}) ',
                  style: {
                    fontSize: '16px',
                    textOutline: 0
                  }
                },
                point: {
                    events: {
                        click: function () {
                            if (!this.selected) {
                              if(this.name=='Berjalan'){
                                search='ok';
                              }
                              else{
                                search='nok';
                              }
                              console.log(search);
                              var table = $('#bdg-table').DataTable();
                              table.column(6).search(search).draw();
                            } else {
                                // RekapMou();
                            }
                        }
                    }
                }
            }],
            legend: {
              itemStyle: {
                 fontSize:'14px',
                 // font: '35pt Trebuchet MS, Verdana, sans-serif',
                 color: '#FFFFFF'
              },
            }
        });

    // fix dimensions of chart that was in a hidden element
    jQuery(document).on( 'shown.bs.tab', 'a[data-toggle="tab"]', function (e) { // on tab selection event
        jQuery( ".contains-chart" ).each(function() { // target each element with the .contains-chart class
            var chart = jQuery(this).highcharts(); // target the chart itself
            chart.reflow() // reflow that chart
        });
    })

    });

</script>

<!-- ScrollingTable -->
<!-- <script src="jquery.min.js"></script> -->
<link rel="stylesheet" href="lib/ScrollingTable/style.css" />
<style type="text/css">
  .scrollingTable {
    margin: auto;
    width: 100%;
    height: calc(100vh - 220px);
    scrollbar-color: #189db8 rgba(0,0,0,0);
  }
  .dataTables_scrollHeadInner{
    width: 100% !important;
  }
</style>
<script src="lib/ScrollingTable/scrollingtable.js"></script>
<script>
  $('#table-bdd').ScrollingTable();
  $('#table-bdg').ScrollingTable();
  
</script>

<!-- ONCLICK TR TABLE -->
<script type="text/javascript">
    // alert("The paragraph was clicked.");
  function showpopup(val){;
    $('#myModal'+val).modal('show');
  }
</script>

<!-- Modal -->
<style type="text/css">
  .modal-dialog.modal-lg {
    width: calc(100% - 60px);
  }
</style>

<div id='modal'></div>
<!-- END MODAL -->
<script type="text/javascript">
   $(document).ready(function() {
      RekapMou();
     
      $("#bln,#thn").on('change',function(){
            $('#vlsxloading').show();

        bln= parseInt($("#bln").val());
        thn= parseInt($("#thn").val());

        RekapMou();
      });

      $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
        // console.log(e.target.hash)
        if (e.target.hash == '#tab3') {
          $('#bdg-table').DataTable().order([0, 'desc']).draw();
        }
      })
  })

   // tab2

  function RekapMou(tipe,search){
      bln= parseInt($("#bln").val());
      thn= parseInt($("#thn").val());
      $.ajax({
          url : 'json-api/RekapMou_json/home?bln='+bln+'&thn='+thn+'&tipe='+tipe+'&search='+search,
          type : 'GET',
          dataType : 'text',
          success : function(text) {
            text= JSON.parse(text);
            console.log(text['table-bdd']);
            $('#bdd-table').DataTable({
                 "data" : text['table-bdd'],
                 columns : [
                  {"data" : "partner","width": "30%"},
                  {"data" : "mou_title","width": "30%"},
                  {"data" : "scope","width": "30%"},
                  {"data" : "warna","width": "10%"}
                 ],
                 paging: false,
                 scrollCollapse: true,
                 scrollY: 'calc(100vh - 315px)'
            });
            $('#bdg-table').DataTable({
                 "data" : text['table-bdg'],
                 columns : [
                   {"data" : "partner","width": "30%"},
                  {"data" : "mou_title","width": "30%"},
                  {"data" : "scope","width": "30%"},
                  {"data" : "warna","width": "10%"}
                 ],
                 paging: false,
                 scrollCollapse: true,
                 scrollY: 'calc(100vh - 315px)'
            });

            $('#bdg-table').DataTable().order([0, 'desc']).draw();
            
            $('#tgl_entri').html(text['tgl_entri']);
            $('#total_bdg').html(parseFloat(text['bdgMerah'])+parseFloat(text['bdgHijau']));
            $('#total_bdd').html(parseFloat(text['bddHijau'])+parseFloat(text['bddMerah']));
            $('#modal').html(text['modal']);

            chart1 = $('#grafik-bdd').highcharts();
            chart1.series[0].update({
                data: [
                    ['Perlu tindak lanjut', text['bddHijau']],
                    ['Berjalan', text['bddMerah']]
                ]}, false);
            chart1.redraw();

            chart1 = $('#grafik-bdg').highcharts();
            chart1.series[0].update({
                data: [
                    ['Perlu tindak lanjut', text['bdgMerah']],
                    ['Berjalan', text['bdgHijau']]
                ]}, false);
            chart1.redraw();
            $('#vlsxloading').hide();
          }        
      });
  }
</script>


