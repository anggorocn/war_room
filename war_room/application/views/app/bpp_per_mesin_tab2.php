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
    overflow: auto;
  }

  /* =============================================
     FIX: Header-Footer-Body alignment
  ============================================= */
  .dataTables_scrollHeadInner,
  .dataTables_scrollHead table,
  .dataTables_scrollBody table,
  .dataTables_scrollFoot table,
  .dataTables_scrollFootInner {
    width: 100% !important;
    box-sizing: border-box;
  }

  .dataTables_scrollHead,
  .dataTables_scrollFoot {
    overflow: hidden !important;
  }

  .dataTables_scrollBody {
    overflow-y: auto !important;
    overflow-x: hidden !important;
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
    overflow-y: auto;
  }
  .modal-content-custom {
    background: #fff;
    padding: 20px;
    margin: 15px;
    border-radius: 8px;
    min-width: 320px;
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

  /* =============================================
     RESPONSIVE
  ============================================= */
  .area-tabel {
    width: 100%;
    overflow: hidden;
  }
  .dataTables_wrapper {
    width: 100% !important;
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
                <li><a href="app/index/bpp_per_mesin?b=<?=$b?>&t=<?=$t?>">BPP Per Jenis Pembangkit</a></li>
                <li class="active"><a href="app/index/bpp_per_mesin_tab2?b=<?=$b?>&t=<?=$t?>">BPP Per Unit Pembangkit</a></li>
                <li><a href="app/index/bpp_per_mesin_tab3?b=<?=$b?>&t=<?=$t?>">BPP Per Mesin Pembangkit</a></li>
              </ul>

              <div class="tab-content">
                <div class="tab-pane fade in active" id="tab2">
                  <div class="row">

                    <!-- ========================
                         TABEL KIRI
                    ========================= -->
                    <div class="col-md-6">
                      <div class="area-tabel tabel-hpp">
                        <div class="judul-tabel">
                          BPP Per Unit Pembangkit (Rp)
                          <button class="pull-right openModalBtn3" data-target="#modal3" style="background-color:transparent;border:none;">
                            <i class="fa fa-search-plus"></i>
                          </button>
                        </div>

                        <table id="table-bpp-per-unit-pembangkit" class="display table table-customize" style="width:100%">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>UNIT KIT</th>
                              <th>BPP</th>
                              <th>TOTAL BEBAN (Ribu)</th>
                              <th>TOTAL MWH</th>
                            </tr>
                          </thead>
                          <tbody></tbody>
                          <tfoot></tfoot>
                        </table>
                      </div>

                      <!-- MODAL TABEL -->
                      <div id="modal3" class="modal-custom">
                        <div class="modal-content-custom">
                          <span class="closeModal">&times;</span>
                          <h3>BPP Per Unit Pembangkit (Rp)</h3>
                          <table id="table-bpp-per-unit-pembangkit-modal" class="display table table-customize" style="width:100%">
                            <thead>
                              <tr>
                                <th width="5%">No</th>
                                <th width="20%">UNIT KIT</th>
                                <th width="25%">BPP</th>
                                <th width="25%">TOTAL BEBAN (Ribu)</th>
                                <th width="25%">TOTAL MWH</th>
                              </tr>
                            </thead>
                            <tbody></tbody>
                            <tfoot></tfoot>
                          </table>
                        </div>
                      </div>
                      <!-- END MODAL TABEL -->

                    </div>
                    <!-- END TABEL KIRI -->

                    <!-- ========================
                         GRAFIK KANAN
                    ========================= -->
                    <div class="col-md-6">
                      <div class="area-tabel tabel-hpp">
                        <div class="judul-tabel">
                          BPP Per Unit Pembangkit (Rp)
                          <button class="pull-right openModalBtnGrafik"
                            data-toggle="modal"
                            data-target="#modal-grafik"
                            style="background-color:transparent;border:none;">
                            <i class="fa fa-search-plus"></i>
                          </button>
                        </div>

                        <div class="toolbar">
                          <button id="btnAsc" class="sort-btn active" onclick="sortChart('asc', this)">
                            Terkecil &rarr; Terbesar
                          </button>
                          <button id="btnDesc" class="sort-btn" onclick="sortChart('desc', this)">
                            Terbesar &rarr; Terkecil
                          </button>
                        </div>

                        <div id="grafik-bpp-per-unit-pembangkit"></div>

                        <!-- MODAL GRAFIK -->
                        <div class="modal fade" id="modal-grafik">
                          <div class="modal-dialog modal-xl modal-customize">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">BPP Per Unit Pembangkit (Rp)</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body">
                                <div id="modalContentGrafik"></div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Template grafik modal (hidden) -->
                        <div id="templateGrafik" style="display:none;">
                          <div class="toolbar">
                            <button class="sort-btn active btnAsc">Terkecil &rarr; Terbesar</button>
                            <button class="sort-btn btnDesc">Terbesar &rarr; Terkecil</button>
                          </div>
                          <div class="containerChart" style="height:calc(100vh - 240px);"></div>
                        </div>

                      </div>
                    </div>
                    <!-- END GRAFIK KANAN -->

                  </div>
                </div>
              </div>

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
  // DATA GRAFIK
  // =============================================
  var rawDataBPP = [];
  var chartBPP   = null;

  // =============================================
  // HELPER: sort data grafik
  // =============================================
  function sortData(type) {
    var sorted = rawDataBPP.slice();
    sorted.sort(function(a, b) {
      return type === 'asc' ? a[1] - b[1] : b[1] - a[1];
    });
    return sorted;
  }

  // =============================================
  // HELPER: update chart utama
  // =============================================
  function sortChart(type, btn) {
    if (chartBPP) {
      chartBPP.series[0].setData(sortData(type), true);
    }
    if (btn) {
      document.querySelectorAll('.sort-btn').forEach(function(b) {
        b.classList.remove('active');
      });
      btn.classList.add('active');
    }
  }

  // =============================================
  // HELPER: config Highcharts (reusable)
  // =============================================
  function getChartConfig(container, minHeight) {
    return {
      chart: {
        type: 'bar',
        renderTo: container,
        backgroundColor: null,
        scrollablePlotArea: { minHeight: minHeight || 1200 }
      },
      title: { text: null },
      xAxis: { type: 'category', labels: { style: { fontSize: '12px' } } },
      yAxis: { title: { text: null }, labels: { style: { fontSize: '12px' } } },
      legend: { enabled: false },
      tooltip: {
        pointFormatter: function() {
          return '<b>Rp ' + this.y.toLocaleString('id-ID') + '</b>';
        },
        style: { fontSize: '14px', fontWeight: 'bold' }
      },
      plotOptions: {
        series: {
          borderRadius: 5,
          dataLabels: {
            enabled: true,
            inside: false,
            align: 'left',
            x: 5,
            formatter: function() {
              return 'Rp ' + this.y.toLocaleString('id-ID');
            },
            style: {
              fontSize: '11px',
              fontWeight: 'bold',
              textOutline: 'none',
              color: '#333'
            }
          }
        }
      },
      series: [{ data: sortData('asc') }]
    };
  }

  // =============================================
  // HELPER: columnDefs sorting (reusable)
  // =============================================
  function getColumnDefs() {
    return [
      {
        targets: '_all',
        render: function(data, type, row, meta) {
          if (meta.col === 1) return data;
          if (type === 'sort' || type === 'type') {
            var num = data.toString()
              .replace(/<[^>]*>/g, '').trim()
              .replace(/\./g, '')
              .replace(',', '.');
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
  // HELPER: init DataTable dengan kolom sejajar
  // =============================================
  function initDataTable(id, scrollY) {
    var dt = $('#' + id).DataTable({
      searching:      false,
      ordering:       true,
      lengthChange:   false,
      info:           false,
      paging:         false,
      autoWidth:      false,
      scrollY:        scrollY || 'calc(100vh - 350px)',
      scrollCollapse: true,
      columnDefs:     getColumnDefs(),
      initComplete: function() {
        var api = this.api();
        setTimeout(function() {
          api.columns.adjust().draw();
        }, 50);
      }
    });
    return dt;
  }

  // =============================================
  // DOCUMENT READY
  // =============================================
  $(document).ready(function() {

    bln = parseInt($("#bln").val());
    thn = parseInt($("#thn").val());

    dataJsonUnitPembangkit();

    // Init chart utama (kosong, diisi setelah AJAX)
    chartBPP = Highcharts.chart(getChartConfig('grafik-bpp-per-unit-pembangkit', 1200));

    // ------------------------------------------------
    // MODAL TABEL: buka
    // ------------------------------------------------
    $('.openModalBtn3').click(function() {
      $('#modal3').fadeIn(200, function() {
        if ($.fn.DataTable.isDataTable('#table-bpp-per-unit-pembangkit-modal')) {
          setTimeout(function() {
            $('#table-bpp-per-unit-pembangkit-modal').DataTable().columns.adjust().draw();
          }, 100);
        }
      });
    });

    // ------------------------------------------------
    // MODAL TABEL: tutup (tombol X)
    // ------------------------------------------------
    $('.closeModal').click(function() {
      $('#modal3').fadeOut();
    });

    // ------------------------------------------------
    // MODAL TABEL: tutup (klik di luar konten)
    // ------------------------------------------------
    $('#modal3').click(function(e) {
      if ($(e.target).is('#modal3')) {
        $('#modal3').fadeOut();
      }
    });

    // ------------------------------------------------
    // MODAL GRAFIK: buka & render chart
    // ------------------------------------------------
    $('.openModalBtnGrafik').click(function() {
      var html = $('#templateGrafik').html();
      $('#modalContentGrafik').html(html);

      var container = $('#modalContentGrafik .containerChart')[0];
      var chartModal = Highcharts.chart(getChartConfig(container, 1500));

      $('#modalContentGrafik .btnAsc').click(function() {
        chartModal.series[0].setData(sortData('asc'));
        $('#modalContentGrafik .sort-btn').removeClass('active');
        $(this).addClass('active');
      });

      $('#modalContentGrafik .btnDesc').click(function() {
        chartModal.series[0].setData(sortData('desc'));
        $('#modalContentGrafik .sort-btn').removeClass('active');
        $(this).addClass('active');
      });
    });

    // ------------------------------------------------
    // MODAL GRAFIK Bootstrap: reflow chart setelah tampil
    // ------------------------------------------------
    $('#modal-grafik').on('shown.bs.modal', function() {
      Highcharts.charts.forEach(function(c) {
        if (c) c.reflow();
      });
    });

    // ------------------------------------------------
    // TAB SWITCH: adjust DataTable
    // ------------------------------------------------
    $('a[data-toggle="tab"]').on('shown.bs.tab', function() {
      setTimeout(function() {
        $($.fn.dataTable.tables(true)).DataTable().columns.adjust().draw();
      }, 200);
    });

    // ------------------------------------------------
    // PERIOD CHANGE: redirect
    // ------------------------------------------------
    $("#bln,#thn").on('change', function() {
      bln = parseInt($("#bln").val());
      thn = parseInt($("#thn").val());
      document.location.href = "app/index/bpp_per_mesin_tab2?b=" + bln + "&t=" + thn;
    });

    // ------------------------------------------------
    // KLIK BARIS tabel bpp-jenis-pembangkit
    // ------------------------------------------------
    $('#table-bpp-jenis-pembangkit tbody').on('click', 'tr', function() {
      bln = parseInt($("#bln").val());
      thn = parseInt($("#thn").val());
      var tableInstance = $('#table-bpp-jenis-pembangkit').DataTable();
      var data = tableInstance.row(this).data();
      window.location.href = "app/index/bpp_per_jenis_pembangkit_detil?b=" + bln + "&t=" + thn + "&reqId=" + data[0];
    });

    // ------------------------------------------------
    // WINDOW RESIZE: recalculate semua tabel
    // ------------------------------------------------
    var resizeTimer;
    $(window).on('resize', function() {
      clearTimeout(resizeTimer);
      resizeTimer = setTimeout(function() {
        $($.fn.dataTable.tables(true)).DataTable().columns.adjust().draw();
      }, 250);
    });

  });

  // =============================================
  // AJAX: load data unit pembangkit
  // =============================================
  function dataJsonUnitPembangkit() {
    cleardttable('table-bpp-per-unit-pembangkit');
    cleardttable('table-bpp-per-unit-pembangkit-modal');

    $.ajax({
      url: 'json-api/Etl_dashboard_ditop_json/home?b=' + bln + '&t=' + thn + '&mode=distrik_nama',
      type: 'GET',
      dataType: 'json',
      beforeSend: function() {
        $('#vlsxloading').show();
      },
      success: function(jsonData) {

        // Isi tbody & tfoot dulu SEBELUM init DataTable
        $('#table-bpp-per-unit-pembangkit tbody').html(jsonData.tabel1);
        $('#table-bpp-per-unit-pembangkit tfoot').html(jsonData.tabelFoot1);
        $('#table-bpp-per-unit-pembangkit-modal tbody').html(jsonData.tabel1);
        $('#table-bpp-per-unit-pembangkit-modal tfoot').html(jsonData.tabelFoot1);

        // Init tabel utama
        initDataTable('table-bpp-per-unit-pembangkit', 'calc(100vh - 350px)');

        // Init tabel modal
        initDataTable('table-bpp-per-unit-pembangkit-modal', 'calc(100vh - 280px)');

        // Update data grafik
        var arr = jsonData.Arrgrafik;
        if (arr) {
          rawDataBPP = Object.keys(arr)
            .filter(function(key) { return key !== 'ALL'; })
            .sort()
            .map(function(key) {
              return [
                arr[key].nama,
                parseFloat(
                  (arr[key].bpp || '0')
                    .toString()
                    .replace(/\./g, '')
                    .replace(',', '.')
                ) || 0
              ];
            });

          sortChart('asc');
        }

        $('#vlsxloading').hide();
      },

      error: function(xhr, status, error) {
        console.error('Gagal load data Unit Pembangkit:', status, error);
        $('#vlsxloading').hide();
      }
    });
  }

</script>