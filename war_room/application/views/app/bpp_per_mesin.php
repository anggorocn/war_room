<?php
include_once("functions/string.func.php");
include_once("functions/date.func.php");
$vtoday= getFormattedDate(date("Y-m-d"));
$b = $this->input->get("b");
$t = $this->input->get("t");
$nt = $this->input->get("nt");
$cari = $this->input->get("cari");

if(empty($b))
{
  $b=date("m")-1;
}

if(empty($t))
{
  $t=date("Y");
}
?>

<style>
  /* =============================================
     WRAPPER OVERFLOW
  ============================================= */
  #table-bpp-mesin-pembangkit_wrapper,
  #table-bpp-per-unit-pembangkit_wrapper,
  #table-bpp-jenis-pembangkit_wrapper,
  #table-bpp-jenis-bahan-bakar_wrapper {
    overflow: scroll;
  }

  /* =============================================
     DARK MODE HIGHCHARTS
  ============================================= */
  body.dark .highcharts-legend-item:hover text {
    fill: #FFFFFF !important;
  }
  body.dark .highcharts-legend-item.highcharts-series-hidden text {
    fill: #FFFFFF !important;
  }

  /* =============================================
     GRAFIK KOMPONEN
  ============================================= */
  #grafik-biaya-per-komponen-jenis-pembangkit {
    width: 100%;
    height: calc(100vh - 320px);
  }
  #grafik-bpp-per-unit-pembangkit {
    width: 100%;
    height: calc(100vh - 320px);
  }

  /* =============================================
     TOOLBAR & SORT BUTTONS
  ============================================= */
  .toolbar {
    margin-bottom: 10px;
    padding-left: 10px;
  }
  .sort-btn {
    padding: 6px 14px;
    border: 1px solid #ccc;
    background: #f5f5f5;
    cursor: pointer;
    margin-right: 5px;
    border-radius: 4px;
    color: #333;
  }
  .sort-btn.active {
    background: #1f6fb2;
    color: white;
    border-color: #1f6fb2;
  }

  /* =============================================
     MODAL CUSTOM (tabel)
  ============================================= */
  .modal-custom {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100vw;
    height: 100vh;
    background: rgba(0,0,0,0.5);
  }
  .modal-content-custom {
    background: #fff;
    padding: 20px;
    margin: 15px;
    border-radius: 8px;
  }
  .closeModal {
    float: right;
    font-size: 22px;
    cursor: pointer;
  }

  /* =============================================
     MODAL GRAFIK KOMPONEN
  ============================================= */
  #modalKomponen {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0; top: 0;
    width: 100%; height: 100%;
    background: rgba(0,0,0,0.6);
  }
  #modalKomponen .modal-content {
    background: #fff;
    margin: 4% auto;
    padding: 20px;
    width: 95%;
    height: 85vh;
    border-radius: 8px;
  }
  #modalKomponen .close {
    float: right;
    font-size: 22px;
    cursor: pointer;
  }

  /* =============================================
     MODAL GRAFIK BPP UNIT (Bootstrap modal)
  ============================================= */
  .modal-dialog.modal-xl.modal-customize {
    width: calc(100vw - 0px);
  }
  .modal-dialog.modal-xl.modal-customize .modal-content {
    margin: 0 auto;
    height: calc(100vh - 60px);
  }

  /* =============================================
     MISC
  ============================================= */
  table.display.table.table-customize.dataTable.no-footer th {
    vertical-align: middle;
  }
  .area-tabel .judul-tabel {
    background: rgba(255,255,255,0.05);
  }
  #table-bpp-jenis-pembangkit tbody tr {
    cursor: pointer;
}
</style>

<script src="lib/highcarts-baru/highcharts.js"></script>

<!-- Services Section Start -->
<section id="services" class="services section-padding">
  <div class="container-fluid">

    <div class="row">
      <div class="col-md-12">
        <div class="area-breadcrumb pull-left">
          <ul class="breadcrumb">
            <li><a href="app"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
            <li>BPP Per Mesin</li>
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
                  <span class="ikon"><img src="images/icon-kinerja-korporat.png"></span> BPP Per Mesin
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <ul class="nav nav-tabs nav-tabs-pln">
                <li class="active"><a href="#tab1" data-toggle="tab">BPP Per Jenis Pembangkit</a></li>
                <li><a href="app/index/bpp_per_mesin_tab2?b=<?=$b?>&t=<?=$t?>">BPP Per Unit Pembangkit</a></li>
                <li><a href="app/index/bpp_per_mesin_tab3?b=<?=$b?>&t=<?=$t?>">BPP Per Mesin Pembangkit</a></li>
              </ul>

              <div class="tab-content">

                <!-- ========================
                     TAB 1: JENIS PEMBANGKIT
                ========================= -->
                <div class="tab-pane fade in active" id="tab1">
                  <div class="row">

                    <!-- KIRI: tabel + bahan bakar -->
                    <div class="col-md-7">

                      <!-- Tabel Jenis Pembangkit -->
                      <div class="area-tabel tabel-hpp">
                        <div class="judul-tabel">
                          BPP Per Jenis Pembangkit (Rp)
                          <button class="pull-right openModalBtn" data-target="#modal" style="background-color:transparent;border:none;">
                            <i class="fa fa-search-plus"></i>
                          </button>
                        </div>
                        <table id="table-bpp-jenis-pembangkit" class="display table table-customize" style="width:100%">
                          <thead>
                            <tr>
                              <th>Jenis Pembangkit</th>
                              <th>BPP</th>
                              <th>KWH</th>
                              <th>KOMP A</th>
                              <th>KOMP B</th>
                              <th>KOMP C</th>
                              <th>KOMP D</th>
                              <th>TOTAL BEBAN</th>
                            </tr>
                          </thead>
                          <tbody></tbody>
                          <!-- tfoot dikosongkan, diisi dari JSON -->
                          <tfoot></tfoot>
                        </table>
                      </div>

                      <!-- Modal Jenis Pembangkit -->
                      <div id="modal" class="modal-custom">
                        <div class="modal-content-custom">
                          <span class="closeModal">&times;</span>
                          <h3>BPP Per Jenis Pembangkit (Rp)</h3>
                          <table id="tableModal" class="display table table-customize" style="width:100%"></table>
                        </div>
                      </div>

                      <!-- Tabel Bahan Bakar -->
                      <div class="area-tabel tabel-hpp">
                        <div class="judul-tabel">
                          BPP Per Jenis Bahan Bakar (Rp)
                          <button class="pull-right openModalBtn2" data-target="#modal2" style="background-color:transparent;border:none;">
                            <i class="fa fa-search-plus"></i>
                          </button>
                        </div>
                        <table id="table-bpp-jenis-bahan-bakar" class="display table table-customize" style="width:100%">
                          <thead>
                            <tr>
                              <th>BAHAN BAKAR</th>
                              <th>BPP Rp/kWh</th>
                              <th>TOTAL kWH</th>
                              <th>TOTAL BEBAN</th>
                            </tr>
                          </thead>
                          <tbody></tbody>
                          <tfoot></tfoot>
                        </table>
                      </div>

                      <!-- Modal Bahan Bakar -->
                      <div id="modal2" class="modal-custom">
                        <div class="modal-content-custom">
                          <span class="closeModal">&times;</span>
                          <h3>BPP Per Jenis Bahan Bakar (Rp)</h3>
                          <table id="tableModal2" class="display table table-customize" style="width:100%"></table>
                        </div>
                      </div>

                    </div>
                    <!-- END KIRI -->

                    <!-- KANAN: grafik komponen -->
                    <div class="col-md-5">
                      <div class="area-tabel tabel-hpp">
                        <div class="judul-tabel">
                          Biaya Per Komponen Jenis Pembangkit (Rp)
                          <button id="openModalKomponen" style="float:right;border:none;background:transparent;cursor:pointer">
                            <i class="fa fa-search-plus"></i>
                          </button>
                        </div>
                        <div class="toolbar">
                          <button id="sortDesc" class="sort-btn active">Total ▼</button>
                          <button id="sortAsc" class="sort-btn">Total ▲</button>
                        </div>
                        <div id="grafik-biaya-per-komponen-jenis-pembangkit"></div>
                      </div>

                      <!-- Modal Grafik Komponen -->
                      <div id="modalKomponen">
                        <div class="modal-content">
                          <span class="close close-btn">&times;</span>
                          <h3 align="center">Biaya Per Komponen Jenis Pembangkit (Rp)</h3>
                          <div class="toolbar">
                            <button id="sortDescModal" class="sort-btn active">Total ▼</button>
                            <button id="sortAscModal" class="sort-btn">Total ▲</button>
                          </div>
                          <div id="grafik-komponen-modal" style="height:calc(100vh - 320px);"></div>
                        </div>
                      </div>
                    </div>
                    <!-- END KANAN -->

                  </div>
                </div>
                <!-- END TAB 1 -->

              </div><!-- end tab-content -->
            </div>
          </div>

          <div class="area-sumber-data detil"></div>

        </div>
      </div>
    </div>

  </div>
</section>
<!-- Services Section End -->

<!-- DATATABLE -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>

  // =============================================
  // VARIABEL GLOBAL
  // =============================================
  var chartKomponen      = null;
  var chartModalKomponen = null;
  var dataKomponen       = [];

  // =============================================
  // HELPER: columnDefs sorting (reusable)
  // =============================================
function getColumnDefs() {
  return [
    {
      targets: '_all',
      render: function(data, type, row, meta) {

        // skip kolom 0 (text)
        if (meta.col === 0) {
          return data;
        }

        if (type === 'sort' || type === 'type') {
          var num = data.toString().replace(/<[^>]*>/g, '').trim();

          num = num.replace(/\./g, '');
          num = num.replace(',', '.');

          return isNaN(num) || num === '' ? 0 : parseFloat(num);
        }

        return data;
      }
    }
  ];
}

  // =============================================
  // HELPER: destroy & clear DataTable
  // =============================================
  function cleardttable(id) {
    if ($.fn.DataTable.isDataTable('#' + id)) {
      $('#' + id).DataTable().clear().destroy();
    }
    $('#' + id + ' tbody').empty();
    $('#' + id + ' tfoot').empty();
  }

  // =============================================
  // HELPER: config Highcharts stacked column
  // =============================================
  function getKomponenChartConfig(containerId, data) {
    return {
      chart: {
        type: 'column',
        renderTo: containerId,
        animation: true,
        backgroundColor: null
      },
      title: { text: null },
      xAxis: {
        categories: data.map(function(i) { return i.cat; }),
        labels: { style: { fontSize: '12px' } }
      },
      yAxis: {
        labels: { style: { fontSize: '12px' } }
      },
      legend: {
        itemStyle: { fontSize: '14px' }
      },
      tooltip: {
        shared: true,
        useHTML: true,
        headerFormat: '<div style="font-size:14px; margin-bottom:5px;"><b>{point.key}</b></div>',
        pointFormat: '<span style="color:{series.color}">●</span> {series.name}: <b>{point.y}</b><br/>',
        style: { fontSize: '14px', fontWeight: 'bold' },
        backgroundColor: 'rgba(255,255,255,0.95)',
        borderColor: '#333',
        borderRadius: 10,
        shadow: true
      },
      plotOptions: {
        column: {
          stacking: 'normal',
          dataLabels: {
            enabled: true,
            style: { fontSize: '12px' }
          }
        },
        series: {
          animation: { duration: 700 }
        }
      },
      series: [
        { name: 'Komp A', color: '#0a2463', data: data.map(function(i) { return i.A; }) },
        { name: 'Komp B', color: '#1e6fbf', data: data.map(function(i) { return i.B; }) },
        { name: 'Komp C', color: '#5bb8f5', data: data.map(function(i) { return i.C; }) },
        { name: 'Komp D', color: '#bde0fa', data: data.map(function(i) { return i.D; }) }
      ]
    };
  }

  // =============================================
  // HELPER: update chart komponen
  // =============================================
  function updateKomponenChart(chart) {
    chart.xAxis[0].setCategories(dataKomponen.map(function(i) { return i.cat; }));
    chart.series[0].setData(dataKomponen.map(function(i) { return i.A; }), false);
    chart.series[1].setData(dataKomponen.map(function(i) { return i.B; }), false);
    chart.series[2].setData(dataKomponen.map(function(i) { return i.C; }), false);
    chart.series[3].setData(dataKomponen.map(function(i) { return i.D; }), false);
    chart.redraw();
  }

  // =============================================
  // HELPER: sort komponen chart
  // =============================================
  function sortChartKomponen(desc) {
    dataKomponen.sort(function(a, b) {
      var totalA = a.A + a.B + a.C + a.D;
      var totalB = b.A + b.B + b.C + b.D;
      return desc ? totalB - totalA : totalA - totalB;
    });
    if (chartKomponen)      updateKomponenChart(chartKomponen);
    if (chartModalKomponen) updateKomponenChart(chartModalKomponen);
  }

  // =============================================
  // DOCUMENT READY
  // =============================================
  $(document).ready(function() {

    bln = parseInt($("#bln").val());
    thn = parseInt($("#thn").val());
    $('#vlsxloading').hide();

    dataJson();

    // ------------------------------------------------
    // PERIOD CHANGE
    // ------------------------------------------------
    $("#bln,#thn").on('change', function() {
      bln = parseInt($("#bln").val());
      thn = parseInt($("#thn").val());
      document.location.href = "app/index/bpp_per_mesin?b=" + bln + "&t=" + thn;
    });

    // ------------------------------------------------
    // TAB SWITCH: adjust DataTable
    // ------------------------------------------------
    $('a[data-toggle="tab"]').on('shown.bs.tab', function() {
      setTimeout(function() {
        $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
      }, 200);
    });

    // ------------------------------------------------
    // MODAL: Jenis Pembangkit (clone approach)
    // ------------------------------------------------
    $('.openModalBtn').click(function() {
      if ($.fn.DataTable.isDataTable('#tableModal')) {
        $('#tableModal').DataTable().destroy();
      }
      var tableHTML = $('#table-bpp-jenis-pembangkit').clone();
      tableHTML.attr('id', 'tableModal');
      $('#tableModal').replaceWith(tableHTML);
      $('#modal').fadeIn();
      $('#tableModal thead th').removeClass('sorting sorting_asc sorting_desc');
      var t = $('#tableModal').DataTable({ destroy: true, order: [], autoWidth: false,columnDefs: getColumnDefs()  });
      t.columns.adjust().draw();
    });

    // ------------------------------------------------
    // MODAL: Bahan Bakar (clone approach)
    // ------------------------------------------------
    $('.openModalBtn2').click(function() {
      if ($.fn.DataTable.isDataTable('#tableModal2')) {
        $('#tableModal2').DataTable().destroy();
      }
      var tableHTML = $('#table-bpp-jenis-bahan-bakar').clone();
      tableHTML.attr('id', 'tableModal2');
      $('#tableModal2').replaceWith(tableHTML);
      $('#modal2').fadeIn();
      $('#tableModal2 thead th').removeClass('sorting sorting_asc sorting_desc');
      var t = $('#tableModal2').DataTable({ destroy: true, order: [], autoWidth: false,columnDefs: getColumnDefs()  });
      t.columns.adjust().draw();
    });

    // ------------------------------------------------
    // MODAL: tutup semua
    // ------------------------------------------------
    $('.closeModal').click(function() {
      $('.modal-custom').fadeOut();
    });

    // ------------------------------------------------
    // MODAL GRAFIK KOMPONEN: buka
    // ------------------------------------------------
    document.getElementById('openModalKomponen').onclick = function() {
      document.getElementById('modalKomponen').style.display = 'block';
      chartModalKomponen = Highcharts.chart(
        getKomponenChartConfig('grafik-komponen-modal', dataKomponen)
      );
    };

    // MODAL GRAFIK KOMPONEN: tutup
    document.querySelector('#modalKomponen .close').onclick = function() {
      document.getElementById('modalKomponen').style.display = 'none';
    };
    window.addEventListener('click', function(e) {
      if (e.target.id === 'modalKomponen') {
        document.getElementById('modalKomponen').style.display = 'none';
      }
    });

    // ------------------------------------------------
    // SORT BUTTONS — main chart komponen
    // ------------------------------------------------
    document.getElementById('sortDesc').onclick = function() {
      sortChartKomponen(true);
      this.classList.add('active');
      document.getElementById('sortAsc').classList.remove('active');
    };
    document.getElementById('sortAsc').onclick = function() {
      sortChartKomponen(false);
      this.classList.add('active');
      document.getElementById('sortDesc').classList.remove('active');
    };

    // SORT BUTTONS — modal chart komponen
    document.getElementById('sortDescModal').onclick = function() {
      sortChartKomponen(true);
      this.classList.add('active');
      document.getElementById('sortAscModal').classList.remove('active');
    };
    document.getElementById('sortAscModal').onclick = function() {
      sortChartKomponen(false);
      this.classList.add('active');
      document.getElementById('sortDescModal').classList.remove('active');
    };

    // ------------------------------------------------
    // KLIK BARIS jenis pembangkit → detail
    // ------------------------------------------------
    $('#table-bpp-jenis-pembangkit tbody').on('dblclick', 'tr', function() {
      bln = parseInt($("#bln").val());
      thn = parseInt($("#thn").val());
      var tableInstance = $('#table-bpp-jenis-pembangkit').DataTable();
      var data = tableInstance.row(this).data();
      window.location.href = "app/index/bpp_per_jenis_pembangkit_detil?b=" + bln + "&t=" + thn + "&reqId=" + data[0];
    });

  });

  // =============================================
  // AJAX: load data jenis pembangkit
  // =============================================
  function dataJson() {
    cleardttable('table-bpp-jenis-pembangkit');

    $.ajax({
      url: 'json-api/Etl_dashboard_ditop_json/home?b=' + bln + '&t=' + thn + '&mode=jenis_pembangkit',
      type: 'GET',
      dataType: 'json',
      beforeSend: function() {
        $('#vlsxloading').show();
      },
      success: function(jsonData) {

        // -----------------------------------------
        // Tabel — gunakan .html() bukan .append()
        // -----------------------------------------
        $('#table-bpp-jenis-pembangkit tbody').html(jsonData.tabel1);
        $('#table-bpp-jenis-pembangkit tfoot').html(jsonData.tabelFoot1);

        $('#table-bpp-jenis-pembangkit').DataTable({
          columnDefs:    getColumnDefs(),
          order:         [[1, 'desc']],
          paging:        false,
          searching:     false,
          info:          false,
          autoWidth:     true,
          scrollY:       'calc(50vh - 200px)',  // ← ubah dari '15vh' ke ini
          scrollX:       true,
          initComplete:  function() {
            this.api().columns.adjust();
          }
        });

        // -----------------------------------------
        // Grafik komponen
        // -----------------------------------------
        var arr = jsonData.Arrgrafik;
        if (!arr || typeof arr !== 'object' || Object.keys(arr).length === 0) {
          console.warn('Arrgrafik kosong / null / invalid');
          document.getElementById('grafik-biaya-per-komponen-jenis-pembangkit').innerHTML =
            "<p style='text-align:center'>Data tidak tersedia</p>";
        } else {
          dataKomponen = Object.keys(arr)
            .filter(function(key) { return arr[key] && arr[key].nama !== 'ALL'; })
            .map(function(key) {
              return {
                cat: arr[key].nama,
                A: Number(arr[key].vkoma) || 0,
                B: Number(arr[key].vkomb) || 0,
                C: Number(arr[key].vkomc) || 0,
                D: Number(arr[key].vkomd) || 0
              };
            })
            .sort(function(a, b) {
              return (b.A + b.B + b.C + b.D) - (a.A + a.B + a.C + a.D);
            });

          chartKomponen = Highcharts.chart(
            getKomponenChartConfig('grafik-biaya-per-komponen-jenis-pembangkit', dataKomponen)
          );
        }

        // lanjut load bahan bakar
        dataJsonBahanBakar();
      },

      error: function(xhr, status, error) {
        console.error('Gagal load data Jenis Pembangkit:', status, error);
        $('#vlsxloading').hide();
      }
    });
  }

  // =============================================
  // AJAX: load data bahan bakar
  // =============================================
  function dataJsonBahanBakar() {
    cleardttable('table-bpp-jenis-bahan-bakar');

    $.ajax({
      url: 'json-api/Etl_dashboard_ditop_json/home?b=' + bln + '&t=' + thn + '&mode=jenis_bahan_bakar',
      type: 'GET',
      dataType: 'json',
      beforeSend: function() {
        $('#vlsxloading').show();
      },
      success: function(jsonData) {

        // gunakan .html() bukan .append()
        $('#table-bpp-jenis-bahan-bakar tbody').html(jsonData.tabel1);
        $('#table-bpp-jenis-bahan-bakar tfoot').html(jsonData.tabelFoot1);

        $('#table-bpp-jenis-bahan-bakar').DataTable({
          columnDefs:    getColumnDefs(),
          order:         [[1, 'desc']],
          paging:        false,
          searching:     false,
          info:          false,
          autoWidth:     true,
          scrollY:       'calc(50vh - 270px)',  // ← ubah dari '15vh' ke ini
          scrollX:       true,
          initComplete:  function() {
            this.api().columns.adjust();
          }
        });

        $('#vlsxloading').hide();
      },

      error: function(xhr, status, error) {
        console.error('Gagal load data Bahan Bakar:', status, error);
        $('#vlsxloading').hide();
      }
    });
  }

</script>