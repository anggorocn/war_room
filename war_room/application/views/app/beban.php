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
        <div class="area-wrapper">
          <div class="row">
            <div class="col-md-6 col-lg-11 col-xs-12">
              <div class="row">
			  <iframe src="http://192.168.1.92:49002/data/perspective/client/DCR/Lapuskit_PNP"  width="100%" height="600" frameborder="0"></iframe>
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
  bln= parseInt($("#bln").val());
  thn= parseInt($("#thn").val());

  $(document).ready(function() {
    getajax();

    $("#bln,#thn").on('change',function(){
      bln= parseInt($("#bln").val());
      thn= parseInt($("#thn").val());

      $(".gantiinfobulan").text(generateZeroDate(parseInt(bln), 2) +" - "+thn);

      modifyUrl('Dashboard | PT PLN Nusantara Power', 'app/index/penjualan?b='+bln+'&t='+thn);


      getajax();
    });

  })

  function getajax()
  {
    $.ajax({
          url : 'json-api/Penjualan_json/sub?bln='+bln+'&thn='+thn,
          type : 'GET',
          dataType : 'text',
          success : function(text) {
              text= JSON.parse(text);
              // console.log(text['textPenjualan'].length);
              for(i=0;i<text['textPenjualan'].length;i++){
                $('#textPenjualan-Kategori-'+i).html(text['textPenjualan'][i]['Kategori']);
                $('#textPenjualan-Target-'+i).html(text['textPenjualan'][i]['target']);
                $('#textPenjualan-Realisasi-'+i).html(text['textPenjualan'][i]['realisasi']);

                var realisasi=text['textPenjualan'][i]['realisasi'].replace(",", ".");
                var target=text['textPenjualan'][i]['target'].replace(",", ".");

                persen=(parseFloat(realisasi)/parseFloat(target))*100;

                if(persen>=100){
                  persen=persen.toFixed(2);
                }
                else{
                  persen=persen.toFixed(2);
                }
                console.log(persen);

                // var persen=persen.replace(".", ",");

                $('#nilai-grafik-penjualan-'+i).html(persen+'%');

                sisa=100-parseFloat(persen);
                chart1 = $('#grafik-penjualan-'+i).highcharts();
                chart1.series[0].update({               
                  data: [{
                    name: 'Progress',
                    y: parseFloat(persen),
                    color: text['textPenjualan'][i]['warna']
                  }, {
                    name: 'Belum Progress',
                    y: sisa,
                    color: 'gray'
                  }],
                }, false);
                chart1.redraw();
              }

              for(i=0;i<text['textPerbandingan'].length;i++){
                $('#textPerbandingan-Kategori-'+i).html(text['textPerbandingan'][i]['Kategori']);
                $('#textPerbandingan-Target-'+i).html(text['textPerbandingan'][i]['target']);
                $('#textPerbandingan-Realisasi-'+i).html(text['textPerbandingan'][i]['realisasi']);

                persen=(parseFloat(text['textPerbandingan'][i]['realisasi'])/parseFloat(text['textPerbandingan'][i]['target']))*100;
                if(persen>100){
                   persen=persen.toFixed(2);
                }
                else{
                  persen=persen.toFixed(2);
                }

                $('#nilai-grafik-perbandingan-'+i).html(persen+'%');

                sisa=100-parseFloat(persen);
                chart1 = $('#grafik-perbandingan-'+i).highcharts();
                chart1.series[0].update({
                      
                  data: [{
                    name: 'Progress',
                    y: parseFloat(persen),
                    color: text['textPerbandingan'][i]['warna']
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
