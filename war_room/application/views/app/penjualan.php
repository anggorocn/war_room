<?php
include_once("functions/string.func.php");
include_once("functions/date.func.php");

$vtoday= getFormattedDate(date("Y-m-d"));
$b = $this->input->get("b");
$t = $this->input->get("t");
$kode = $this->input->get("kode");

if($kode==0||$kode==''){
    $resultRegion= 'Keseluruhan';
}
else if($kode==1){
    $resultRegion= 'Sumatera';
}
else if($kode==2){
    $resultRegion= 'Jawa Bali';
}
else if($kode==3){
    $resultRegion= 'Kalimantan';
}
else if($kode==4){
    $resultRegion= 'Sulawesi';            
}

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


<style type="text/css">
  .gantifont
  {
    font-size: 12pt;
  }
</style>
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
            <!-- Services item -->
            <div class="col-md-6 col-lg-1 col-xs-12">
              <div class="services-item wow fadeInDown" data-wow-delay="0.4s">
                  <div class="area-woman-penjualan">
                    <img src="images/img-woman-penjualan.png" style="width: 400px;bottom: -25px;">
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
                          <div class="sub-judul " >Penjualan Sistem <span id='judulkiri'><?=$resultRegion?></span> | Periode : <span class="gantiinfobulan"><?=generateZeroDate($b,2)?> - <?=$t?></span></div>
                          <div class="row inner">
                              <?for($i=0;$i<4;$i++){?>
                              <div class="col-md-6 padding-none" id="kotak-penjualan-<?=$i?>">
                                  <div class="item">
                                    <div class="inner">
                                          <div class="caption" id='textPenjualan-Kategori-<?=$i?>'></div>
                                          <div class="title ">Realisasi</div>
                                          <div class="nilai" id='textPenjualan-Realisasi-<?=$i?>'></div>
                                          <div class="title ">Target</div>
                                          <div class="nilai" id='textPenjualan-Target-<?=$i?>'></div>
                                          <div class="grafik-progress" id="grafik-penjualan-<?=$i?>"></div>
                                          <div class="clearfix"></div>
                                      </div>
                                  </div>
                              </div>
                              <?}?>
                          </div>
                          <div class="legend-penjualan">
                            <i class="fa fa-circle hijau" aria-hidden="true"></i> ≥ 100%          
                            <i class="fa fa-circle kuning" aria-hidden="true"></i> ≥ 95% - < 100%          
                            <i class="fa fa-circle merah" aria-hidden="true"></i> < 95%

                            <div class="keterangan">
                              <!-- Catatan : Informasi diatas hanya menampilkan hasil pengolahan penjualan sistem kelistrikan besar di <span id='ketkiri'><?=$resultRegion?></span> -->
                            </div>
                          </div>
                      </div>
                  </div>
                  
                </div>

                <!-- Services item -->
                <div class="col-md-6 col-lg-6 col-xs-12" id='fieldkanan'>
                  <div class="services-item wow fadeInDown" data-wow-delay="0.4s">
                      <div class="area-penjualan detil">
                          <div class="judul">&nbsp;
                              <!-- <span class="ikon"><img src="images/icon-penjualan.png"></span> Penjualan -->
                              <!-- <a class="selengkapnya pull-right" href="app/index/penjualan"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a> -->
                          </div>
                          <div class="sub-judul ">Perbandingan Penjualan Sistem <span id='judulkanan'><?=$resultRegion?></span> dengan Kompetitor | Periode : <span class="gantiinfobulan"><?=generateZeroDate($b,2)?> - <?=$t?></span></div>
                          <div class="row inner">
                              <?for($i=0;$i<4;$i++){?>
                              <div class="col-md-6 padding-none" id="kotak-perbandingan-<?=$i?>">
                                  <div class="item">
                                    <div class="inner">
                                          <div class="caption" id='textPerbandingan-Kategori-<?=$i?>'></div>
                                          <div class="title ">Realisasi</div>
                                          <div class="nilai" id='textPerbandingan-Realisasi-<?=$i?>'></div>
                                          <div class="title ">Target</div>
                                          <div class="nilai" id='textPerbandingan-Target-<?=$i?>'></div>
                                          <div class="grafik-progress" id="grafik-perbandingan-<?=$i?>"></div>
                                          <div class="clearfix"></div>
                                      </div>
                                  </div>
                              </div>
                              <?}?>
                          </div>
                          <div class="legend-penjualan ">
                            <i class="fa fa-circle hijau" aria-hidden="true"></i> ≥ 100%          
                            <i class="fa fa-circle kuning" aria-hidden="true"></i> ≥ 95% - < 100%          
                            <i class="fa fa-circle merah" aria-hidden="true"></i> < 95%

                            <div class="keterangan">
                              <!-- Catatan : Informasi diatas hanya menampilkan hasil pengolahan penjualan sistem kelistrikan besar di <span id='ketkanan'><?=$resultRegion?></span> -->
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
  bln= parseInt($("#bln").val());
  thn= parseInt($("#thn").val());
  kode= parseInt($("#kode").val());

  $(document).ready(function() {
    getajax();

    $("#bln,#thn,#kode").on('change',function(){
      bln= parseInt($("#bln").val());
      thn= parseInt($("#thn").val());
      kode= parseInt($("#kode").val());

      $(".gantiinfobulan").text(generateZeroDate(parseInt(bln), 2) +" - "+thn);

      modifyUrl('Dashboard | PT PLN Nusantara Power', 'app/index/penjualan?b='+bln+'&t='+thn+'&kode='+kode);


      getajax();
    });

  })

  function getajax()
  {
    $('#vlsxloading').show();
    $.ajax({
          url : 'json-api/Penjualan_json/sub?bln='+bln+'&thn='+thn+"&kode="+kode,
          type : 'GET',
          dataType : 'text',
          success : function(text) {
              text= JSON.parse(text);
              // console.log(text['textPenjualan'].length);

              if(text['textPenjualan'].length>4){
                $('#fieldkanan').show();
              }
              else{
                $('#fieldkanan').hide();
              }

              $('#judulkiri').html(text['region']);
              $('#judulkanan').html(text['region']);
              $('#ketkiri').html(text['region']);
              $('#ketkanan').html(text['region']);
              
              for(i=0;i<4;i++){
                $('#textPenjualan-Kategori-'+i).html('');
                $('#textPenjualan-Target-'+i).html(0);
                $('#textPenjualan-Realisasi-'+i).html(0);
              }
              
              const valkategori=['0','0','0','0'];
              const valtarget=['0','0','0','0'];
              const valrealisasi=['0','0','0','0'];
              const valcolor=['white','white','white','white'];

              for(i=0;i<text['textPenjualan'].length;i++){
                valkategori[i]=text['textPenjualan'][i].Kategori;

                ntarget= text['textPenjualan'][i].target;
                nrealisasi= text['textPenjualan'][i].realisasi;
                
                valtarget[i]= ntarget;
                valrealisasi[i]= nrealisasi;
                valcolor[i]=text['textPenjualan'][i].warna;
              }

              for(i=0;i<4;i++){
                $('#textPenjualan-Kategori-'+i).html(valkategori[i]);
                $('#textPenjualan-Target-'+i).html(valtarget[i]);
                $('#textPenjualan-Realisasi-'+i).html(valrealisasi[i]);

                var realisasi=valrealisasi[i].replace(",", ".");
                var target=valtarget[i].replace(",", ".");

                persen=(parseFloat(realisasi)/parseFloat(target))*100;

                $("#kotak-penjualan-"+i).show();
                if(target == 0 && realisasi == 0)
                {
                  $("#kotak-penjualan-"+i).hide();
                }

                if(persen>=100){
                  persen=persen.toFixed(2);
                }
                else{
                  persen=persen.toFixed(2);
                }

                if (persen=='NaN'){
                  persen=0;
                }
                if (persen==''){
                  persen=0;
                }

                // console.log("xxx"+persen+"yyy");

                // var persen=persen.replace(".", ",");

                $('#nilai-grafik-penjualan-'+i).html(persen+'%');

                sisa=100-parseFloat(persen);
                chart1 = $('#grafik-penjualan-'+i).highcharts();
                chart1.series[0].update({               
                  data: [{
                    name: 'Progress',
                    y: parseFloat(persen),
                    color: valcolor[i],
                  }, {
                    name: 'Belum Progress',
                    y: sisa,
                    color: 'gray'
                  }],
                }, false);
                chart1.redraw();
              }

              const valperbandingankategori=['0','0','0','0'];
              const valperbandingantarget=['0','0','0','0'];
              const valperbandinganrealisasi=['0','0','0','0'];
              const valperbandinganwarna=['white','white','white','white'];
              for(i=0;i<text['textPerbandingan'].length;i++){
                valperbandingankategori[i]=text['textPerbandingan'][i].Kategori;

                ntarget= text['textPerbandingan'][i].target;
                nrealisasi= text['textPerbandingan'][i].realisasi;

                valperbandingantarget[i]= ntarget;
                valperbandinganrealisasi[i]= nrealisasi;
                valperbandinganwarna[i]=text['textPerbandingan'][i].warna;
              }
              // console.log(valperbandinganwarna);

              for(i=0;i<4;i++){
                $('#textPerbandingan-Kategori-'+i).html(valperbandingankategori[i]);
                $('#textPerbandingan-Target-'+i).html(valperbandingantarget[i]);
                $('#textPerbandingan-Realisasi-'+i).html(valperbandinganrealisasi[i]);

                persen=(parseFloat(valperbandinganrealisasi[i])/parseFloat(valperbandingantarget[i]))*100;

                $("#kotak-perbandingan-"+i).show();
                if(valperbandingantarget[i] == 0 && valperbandinganrealisasi[i] == 0)
                {
                  $("#kotak-perbandingan-"+i).hide();
                }

                if(persen>100){
                   persen=persen.toFixed(2);
                }
                else{
                  persen=persen.toFixed(2);
                }

                 if (persen=='NaN'){
                  persen=0;
                }
                if (persen==''){
                  persen=0;
                }

                $('#nilai-grafik-perbandingan-'+i).html(persen+'%');

                sisa=100-parseFloat(persen);
                chart1 = $('#grafik-perbandingan-'+i).highcharts();
                chart1.series[0].update({
                      
                  data: [{
                    name: 'Progress',
                    y: parseFloat(persen),
                    color: valperbandinganwarna[i]
                  }, {
                    name: 'Belum Progress',
                    y: sisa,
                    color: 'gray'
                  }],
                }, false);
                chart1.redraw();
              }
          
                $('#vlsxloading').hide();
          }
      });
      // Create the chart
      for(i=0;i<4;i++){
        Highcharts.chart('grafik-penjualan-'+i, {
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
            text: `<div class=persentase id=nilai-grafik-penjualan-`+i+`>0%</div>`,
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
              y: 0,
              color: '#40c29c'
            }, {
              name: 'Belum Progress',
              y: 0,
            }]
          }],
        });
      }

      for(i=0;i<4;i++){
        Highcharts.chart('grafik-perbandingan-'+i, {
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
            text: `<div class=persentase id=nilai-grafik-perbandingan-`+i+`>0%</div>`,
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
              y: 0,
              color: '#40c29c'
            }, {
              name: 'Belum Progress',
              y: 0,
            }]
          }],
        });
      }
    }

</script>
