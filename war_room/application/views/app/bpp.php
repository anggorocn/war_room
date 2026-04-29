<?php
include_once("functions/string.func.php");
include_once("functions/date.func.php");
?>

<style>
/* MINI CHART */
.area-grafik-bpp {
    background-image: linear-gradient(to right, #c8ecfa, #FFFFFF);
    border-radius: 40px;
    padding: 20px;
    margin-bottom: 15px;
    overflow: hidden;
    border: 1px solid rgba(255,255,255,0.1);
    height: calc(50vh - 40px);
    position: relative;
}
.area-grafik-bpp .grafik {
    height: calc(100% - 120px);
}
.judul button {
    background: transparent;
    border: none;
    cursor: pointer;
}
.judul{
    text-align: center;
}
  .area-grafik-bpp .area-tabel-legend table {
    width: 100%;
    border-collapse: collapse;
  }
  .area-grafik-bpp .area-tabel-legend td, 
  .area-grafik-bpp .area-tabel-legend th {
    border: 1px solid #ccc;
    /*padding: 4px 6px;*/
    padding: 3px 5px;
    /*font-size: 10px;*/
    font-size: 7.5pt;
  }
  .area-tabel-legend th {
    /*background-color: #cfebf8;*/
    /*border-color: #93c6dc !important;*/
    
    background-color: #333333;
    color: #FFFFFF;
    text-align: center;
    
  }
  .area-tabel-legend td {
    background-color: #FFFFFF;
  }

  /****/
   /*   */
  .area-tabel-legend tr:nth-child(1) td:nth-child(1) {
    /*background-color: #2c5f7f;*/
    /*background-color: #f19938;*/
    background-color: #800000;
    color: #FFFFFF;
  } 
  .area-tabel-legend tr:nth-child(2) td:nth-child(1) {
    background-color: #00a2e9;
    color: #FFFFFF;
  } 
  .area-tabel-legend tr:nth-child(3) td:nth-child(1) {
    background-color: #32b3eb;
    color: #FFFFFF;
  } 
  .area-tabel-legend tr:nth-child(4) td:nth-child(1) {
    background-color: #63c4ee;
    color: #FFFFFF;
  } 
  .area-tabel-legend tr:nth-child(5) td:nth-child(1) {
    background-color: #9ed8f1;
    color: #FFFFFF;
  } 

/* MODAL */
.modal {
  display: none;
  position: fixed;
  z-index: 100;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  background-color: rgba(0,0,0,0.9);
}
.modal-content {
  background-color: #fff;
  height: calc(100% - 30px);
  margin: 15px;
  padding: 15px;
  box-sizing: border-box;
  position: relative;
  overflow: auto;
}
.close-btn {
  position: absolute;
  top: 25px;
  right: 25px;
  font-size: 30px;
  font-weight: bold;
  cursor: pointer;
  z-index: 200;
  background-color: red;
  color: #FFFFFF;
  width: 40px;
  height: 40px;
  line-height: 36px;
  text-align: center;
  border-radius: 50%;
}
.close-btn:hover {
  background-color: #333333;
}
.area-grafik-bpp-large {
    background-image: linear-gradient(to right, #c8ecfa, #FFFFFF);
    border-radius: 40px;
    padding: 30px;
    margin-bottom: 0px;
    overflow: hidden;
    border: 1px solid rgba(255,255,255,0.1);
    min-height: 90vh;
    position: relative;
}
.area-grafik-bpp-large .grafik {
    height: calc(70vh - 20px);
}

.area-grafik-bpp-large .area-tabel-legend table {
    width: 100%;
    border-collapse: collapse;
  }
.area-grafik-bpp-large .area-tabel-legend td, 
.area-grafik-bpp-large .area-tabel-legend th {
  border: 1px solid #ccc;
  /*padding: 4px 6px;*/
  padding: 6px 10px;
  /*font-size: 10px;*/
  font-size: 13pt;
}
</style>

<section id="services" class="services section-padding home">
  <div class="container-fluid">
    <div class="row services-wrapper">

      <!-- =================== MINI CHART + MODAL =================== -->
      <?php 
      $charts = [
        ['title'=>'HPP PLTA ASAHAN 1 vs BPP BRANTAS, CIRATA 2017 - 2026'],
        ['title'=>'HPP PLTA CILACAP 1 vs BPP PAITON 2017 - 2026'],
        ['title'=>'HPP PLTU BANJARSARI vs BPP TENAYAN 2017 - 2026'],
        ['title'=>'HPP PLTU JAWA 7 vs BPP RMG,AWR,IDY,PCN 2017 - 2026']
      ];

      foreach($charts as $i => $c): ?>
      <!-- Mini Chart -->
      <div class="col-md-6">
        <div class="services-item">
          <div class="area-grafik-bpp">
            <div class="judul">
              <?= $c['title'] ?>
              <button class="pull-right openModalBtn" data-target="#modal-<?= $i ?>"><i class="fa fa-search-plus"></i></button>
            </div>
            <div id="mini-grafik-hpp-bpp-<?= $i ?>" class="grafik contains-chart"></div>
            <div class="area-tabel-legend" id="mini-tabel-<?= $i ?>" style="overflow: scroll;height: calc(15vh - 40px);"></div>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div id="modal-<?= $i ?>" class="modal">
        <div class="modal-content">
          <span class="close-btn" data-target="#modal-<?= $i ?>">&times;</span>
          <div class="area-grafik-bpp-large">
            <div class="judul"><?= $c['title'] ?></div>
            <div id="grafik-hpp-bpp-<?= $i ?>-large" class="grafik contains-chart"></div>
            <div class="area-tabel-legend" id="tabel-<?= $i ?>-large" style="overflow: scroll;height: calc(20vh - 40px);"></div>
          </div>
        </div>
      </div>

      <?php endforeach; ?>

    </div>
  </div>
</section>

<!-- HIGHCHARTS -->
<script src="lib/highcharts/highcharts.js"></script>
<script src="lib/highcharts/exporting.js"></script>
<script src="lib/highcharts/accessibility.js"></script>
<script src="lib/highcharts/export-data.js"></script>

<script>
$(document).ready(function () {
  // Show/hide modal
  $(".openModalBtn").click(function () {
      let target = $(this).data("target");
      $(target).show();
  });
  $(".close-btn").click(function () {
      let target = $(this).data("target");
      $(target).hide();
  });
  $(window).click(function (event) {
      if ($(event.target).hasClass("modal")) {
          $(event.target).hide();
      }
  });

  // Render chart
  function dataJson(){
    $.ajax({
        url : 'json-api/Hpp_vs_bpp_json/home',
        type : 'GET',
        dataType : 'json',
        success : function(jsonData) {
            const colors = ['#800000','#00a2e9','#32b3eb','#63c4ee','#9ed8f1','#f4b400','#db4437','#0f9d58'];

            jsonData.dataGrafik.forEach((seriesArray, index) => {

              // Chart mini
              Highcharts.chart(`mini-grafik-hpp-bpp-${index}`, {
                chart: {
                  backgroundColor: null,
                  type: 'column'
                },
                exporting: { enabled: false },
                title: { text: null },
                xAxis: {
                  categories: jsonData.categories[index],
                  labels: { style: { fontSize: '12px' } }
                },
                yAxis: {
                  title: { text: null },
                  labels: { style: { fontSize: '12px' } }
                },
                legend: {
                  layout: 'vertical',
                  align: 'right',
                  verticalAlign: 'middle',
                  itemStyle: { fontSize: '10px' },
                  enabled: false // sesuai versi awal
                },
                plotOptions: {
                  column: {
                    groupPadding: 0.1, // padding antar grup bar
                    // pointPadding: 0.1,
                    // maxPointWidth: 50
                  }
                },
                tooltip: {
                  style: {
                    fontSize: '14px',
                    fontWeight: 'bold'
                  },
                  backgroundColor: 'rgba(255,255,255,0.95)',
                  borderColor: '#333',
                  borderRadius: 10,
                  shadow: true
                },
                series: seriesArray.map((s, i) => ({
                  name: s.nama,
                  data: s.data.map(v => v === null ? 0 : v),
                  color: colors[i % colors.length],
                  lineWidth: 2,
                  dataLabels: {
                    enabled: true,
                    rotation: -90,
                    verticalAlign: 'top',
                    align: 'right',
                    inside: true,
                    y: 5,
                    format: '{point.y}',
                    style: { fontSize: '11px' }
                  }
                }))
              });
              // Chart modal
              Highcharts.chart(`grafik-hpp-bpp-${index}-large`, {
                chart: {
                  backgroundColor: null,
                  type: 'column'
                },
                exporting: { enabled: false },
                title: { text: null },
                xAxis: {
                  categories: jsonData.categories[index],
                  labels: { style: { fontSize: '12px' } }
                },
                yAxis: {
                  title: { text: null },
                  labels: { style: { fontSize: '12px' } }
                },
                legend: {
                  layout: 'vertical',
                  align: 'right',
                  verticalAlign: 'middle',
                  itemStyle: { fontSize: '10px' },
                  enabled: false // sesuai versi awal
                },
                plotOptions: {
                  column: {
                    groupPadding: 0.1, // padding antar grup bar
                    // pointPadding: 0.1,
                    // maxPointWidth: 50
                  }
                },
                tooltip: {
                  style: {
                    fontSize: '14px',
                    fontWeight: 'bold'
                  },
                  backgroundColor: 'rgba(255,255,255,0.95)',
                  borderColor: '#333',
                  borderRadius: 10,
                  shadow: true
                },
                series: seriesArray.map((s, i) => ({
                  name: s.nama,
                  data: s.data.map(v => v === null ? 0 : v),
                  color: colors[i % colors.length],
                  lineWidth: 2,
                  dataLabels: {
                    enabled: true,
                    rotation: -90,
                    verticalAlign: 'top',
                    align: 'right',
                    inside: true,
                    y: 5,
                    format: '{point.y}',
                    style: { fontSize: '20px' }
                  }
                }))
              });

              // Tabel mini
              if(document.getElementById(`mini-tabel-${index}`))
                  document.getElementById(`mini-tabel-${index}`).innerHTML = jsonData.tabel[index];

              // Tabel modal
              if(document.getElementById(`tabel-${index}-large`))
                  document.getElementById(`tabel-${index}-large`).innerHTML = jsonData.tabel[index];
            });

            $('#vlsxloading').hide();
        }
    });
  }

  dataJson();
});
</script>
