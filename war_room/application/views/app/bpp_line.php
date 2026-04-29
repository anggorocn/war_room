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
.area-grafik-bpp .area-tabel-legend table {
  width: 100%;
  border-collapse: collapse;
}
.area-grafik-bpp .area-tabel-legend td, 
.area-grafik-bpp .area-tabel-legend th {
  border: 1px solid #ccc;
  padding: 3px 5px;
  font-size: 7.5pt;
}

.area-grafik-bpp-large .area-tabel-legend table {
  width: 100%;
  border-collapse: collapse;
}
.area-grafik-bpp-large .area-tabel-legend td, 
.area-grafik-bpp-large .area-tabel-legend th {
  border: 1px solid #ccc;
  padding: 3px 5px;
  font-size: 7.5pt;
  text-align: right;
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
.area-grafik-bpp-large .area-tabel-legend th,
.area-grafik-bpp-large .area-tabel-legend td {
  font-size: 13px;
}
</style>

<section id="services" class="services section-padding home">
  <div class="container-fluid">
    <div class="row services-wrapper">

      <!-- =================== MINI CHART + MODAL =================== -->
      <?php 
      $charts = [
        ['title'=>'HPP vs BPP PLTA ASAHAN 1 vs BRANTAS, CIRATA 2017 - 2025'],
        ['title'=>'HPP vs BPP PLTU CILACAP 1 vs PAITON 2017 - 2025'],
        ['title'=>'HPP vs BPP PLTU BANJARSARI vs TENAYAN 2017 - 2025'],
        ['title'=>'HPP vs BPP PLTU JAWA 7 vs RMG,AWR,IDY,PCN 2017 - 2025']
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
            <div class="area-tabel-legend" id="mini-tabel-<?= $i ?>" style="overflow: scroll;height: calc(20vh - 40px);"></div>
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
  $('#vlsxloading').hide();

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
            const colors = ['#93388f','#78a55a','#7b601d','#34692e','#4e85c1'];

            jsonData.dataGrafik.forEach((seriesArray, index) => {

              // Chart mini
              Highcharts.chart(`mini-grafik-hpp-bpp-${index}`, {
                  chart:{backgroundColor:null},
                  exporting:{enabled:false},
                  title:{text:null},
                  xAxis:{categories: jsonData.categories[index]},
                  yAxis:{title:{text:null}},
                  legend:{layout:'vertical',align:'right',verticalAlign:'middle'},
                  series: seriesArray.map((s,i)=>({
                      name: s.nama,
                      data: s.data.map(v=>v===null?0:v),
                      color: colors[i % colors.length],
                      dashStyle: 'Dash',
                      lineWidth: 2,
                      dataLabels:{enabled:true,format:'{point.y}',style:{fontSize:'11px',color:'#333'}}
                  }))
              });

              // Chart modal
              Highcharts.chart(`grafik-hpp-bpp-${index}-large`, {
                  chart:{backgroundColor:null},
                  exporting:{enabled:false},
                  title:{text:null},
                  xAxis:{categories: jsonData.categories[index]},
                  yAxis:{title:{text:null}},
                  legend:{layout:'vertical',align:'right',verticalAlign:'middle'},
                  series: seriesArray.map((s,i)=>({
                      name: s.nama,
                      data: s.data.map(v=>v===null?0:v),
                      color: colors[i % colors.length],
                      dashStyle: 'Dash',
                      lineWidth: 2,
                      dataLabels:{enabled:true,format:'{point.y}',style:{fontSize:'11px',color:'#333'}}
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
