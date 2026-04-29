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
     HEADER & BODY KOLOM
     JANGAN override width DataTables di sini!
  ============================================= */
  #table-bpp-mesin-pembangkit thead th {
    white-space: normal !important;
    word-wrap: break-word;
    vertical-align: middle;
    text-align: center;
  }

  #table-bpp-mesin-pembangkit tbody td {
    white-space: nowrap;
  }

  #table-bpp-mesin-pembangkit tfoot th,
  #table-bpp-mesin-pembangkit tfoot td {
    white-space: nowrap;
  }

  /* =============================================
     MODAL
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

  table.display.table.table-customize.dataTable.no-footer th {
    vertical-align: middle;
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
     MISC
  ============================================= */
  .dataTables_wrapper.no-footer {
    /* kosong */
  }

  .area-tabel .judul-tabel {
    background: rgba(255,255,255,0.05);
  }
  .btn-export {
      background: #2f80ed;
      color: white;
      border: none;
      padding: 7px 14px;
      border-radius: 5px;
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
                <li><a href="app/index/bpp_per_mesin_tab2?b=<?=$b?>&t=<?=$t?>">BPP Per Unit Pembangkit</a></li>
                <li class="active"><a>BPP Per Mesin Pembangkit</a></li>
                <div style="width: 10%;display: none;float: right;">
                  <button onclick="exportTableToExcel()" class="btn-export">
                      <i class="fa fa-file-excel-o"></i> Export Excel
                  </button>
                </div>
              </ul>

              <div class="tab-content">
                <div class="tab-pane fade in active" id="tab3">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="area-tabel tabel-hpp">
                        <div class="judul-tabel">
                          BPP Per Mesin Pembangkit (Rp)
                          <button class="pull-right openModalBtn4" data-target="#modal4" style="background-color:transparent;border:none;">
                            <i class="fa fa-search-plus"></i>
                          </button>
                        </div>

                        <table id="table-bpp-mesin-pembangkit" class="display table table-customize" style="width:100%">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama Pembangkit (SESUAI SILM)</th>
                              <th>Distrik</th>
                              <th>Jenis Pembangkit</th>
                              <th>Total Komp ABDE (jika tdk dpt dipecah) contoh: Sewa, KIT yg Komp C passthrough</th>
                              <th>Total Komp ABCDE (Rp)</th>
                              <th>kWh Netto (SILM) s.d bulan berjalan</th>
                              <th>Total BPP (Rp/kWh)</th>
                              <th>Daya Terpasang (kW)</th>
                              <th>Total Komp A (Rp)</th>
                              <th>Total Komp B (Rp)</th>
                              <th>Total Komp C (Rp)</th>
                              <th>Total Komp D (Rp)</th>
                              <th>BPP Komp A (Rp/kWh)</th>
                              <th>BPP Komp B (Rp/kWh)</th>
                              <th>BPP Komp C (Rp/kWh)</th>
                              <th>BPP Komp D (Rp/kWh)</th>
                            </tr>
                          </thead>
                          <tbody></tbody>
                          <!-- tfoot dikosongkan, diisi dari JSON via .html() -->
                          <tfoot></tfoot>
                        </table>

                        <!-- MODAL -->
                        <div id="modal4" class="modal-custom">
                          <div class="modal-content-custom">
                            <span class="closeModal">&times;</span>
                            <h3>BPP Per Mesin Pembangkit (Rp)</h3>
                            <table id="table-bpp-mesin-pembangkit-modal" class="display table table-customize" style="width:300vw">
                              <thead>
                                <tr>
                                  <th style="width:3%">No</th>
                                  <th style="width:20%">Nama Pembangkit (SESUAI SILM)</th>
                                  <th style="width:10%">Distrik</th>
                                  <th style="width:10%">Jenis Pembangkit</th>
                                  <th style="width:8%">Total Komp ABDE</th>
                                  <th style="width:6%">Total Komp ABCDE</th>
                                  <th style="width:7%">kWh Netto</th>
                                  <th style="width:6%">Total BPP</th>
                                  <th style="width:5%">Daya Terpasang</th>
                                  <th style="width:4%">Komp A</th>
                                  <th style="width:4%">Komp B</th>
                                  <th style="width:4%">Komp C</th>
                                  <th style="width:4%">Komp D</th>
                                  <th style="width:3%">BPP A</th>
                                  <th style="width:3%">BPP B</th>
                                  <th style="width:3%">BPP C</th>
                                  <th style="width:3%">BPP D</th>
                                </tr>
                              </thead>
                              <tbody></tbody>
                              <tfoot></tfoot>
                            </table>
                          </div>
                        </div>
                        <!-- END MODAL -->

                      </div><!-- end area-tabel -->
                    </div>
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
$(document).ready(function() {

  bln = parseInt($("#bln").val());
  thn = parseInt($("#thn").val());

  dataJsonPerMesinPembangkit();

  // =============================================
  // MODAL: buka
  // =============================================
  $('.openModalBtn4').click(function() {
    $('#modal4').fadeIn();
  });

  // =============================================
  // MODAL: tutup
  // =============================================
  $('.closeModal').click(function() {
    $('#modal4').fadeOut();
  });

});

// =============================================
// PERIOD CHANGE: redirect
// =============================================
$("#bln,#thn").on('change', function() {
  bln = parseInt($("#bln").val());
  thn = parseInt($("#thn").val());
  var vurl = "app/index/bpp_per_mesin_tab3?b=" + bln + "&t=" + thn;
  document.location.href = vurl;
});

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
// HELPER: konfigurasi columnDefs sorting
// =============================================
function getColumnDefs() {
  return [
    {
      targets: '_all',
      render: function(data, type) {
        if (type === 'sort' || type === 'type') {
          var num = data.toString().replace(/<[^>]*>/g, '');
          num = num.replace(/[^\d\-]/g, '');
          return num === '' ? 0 : parseInt(num);
        }
        return data;
      }
    },
    {
      targets: 0, // kolom No tetap string
      render: function(data, type) {
        return data;
      }
    }
  ];
}

// =============================================
// MAIN: load data & init DataTable
// =============================================
function dataJsonPerMesinPembangkit() {
  cleardttable('table-bpp-mesin-pembangkit');
  cleardttable('table-bpp-mesin-pembangkit-modal');

  $.ajax({
    url: 'json-api/Etl_dashboard_ditop_json/home?b=' + bln + '&t=' + thn + '&mode=bpp_per_mesin',
    type: 'GET',
    dataType: 'json',
    success: function(jsonData) {

      // -----------------------------------------
      // Tabel utama
      // Gunakan .html() bukan .append() agar tidak dobel
      // -----------------------------------------
      $('#table-bpp-mesin-pembangkit tfoot').html(jsonData.tabelFoot2);
      $('#table-bpp-mesin-pembangkit tbody').html(jsonData.tabel2);

      var tableUtama = $('#table-bpp-mesin-pembangkit').DataTable({
        searching:     true,
        ordering:      true,
        lengthChange:  false,
        scrollX:       true,
        scrollY:       "calc(100vh - 470px)",
        scrollCollapse: true,
        paging:        false,
        autoWidth:     true,   // biarkan DataTables hitung otomatis
        columnDefs:    getColumnDefs(),
        initComplete:  function() {
          this.api().columns.adjust(); // sinkronkan header & body setelah render
        }
      });

      // -----------------------------------------
      // Tabel modal
      // -----------------------------------------
      $('#table-bpp-mesin-pembangkit-modal tfoot').html(jsonData.tabelFoot2);
      $('#table-bpp-mesin-pembangkit-modal tbody').html(jsonData.tabel2);

      $('#table-bpp-mesin-pembangkit-modal').DataTable({
        searching:     true,
        ordering:      true,
        lengthChange:  false,
        scrollX:       true,
        scrollY:       "calc(100vh - 470px)",
        scrollCollapse: true,
        paging:        false,
        autoWidth:     true,
        columnDefs:    getColumnDefs(),
        initComplete:  function() {
          this.api().columns.adjust();
        }
      });

      // adjust ulang tabel modal saat modal dibuka
      // (karena saat init modal masih display:none)
      $('.openModalBtn4').off('click.dtadjust').on('click.dtadjust', function() {
        setTimeout(function() {
          if ($.fn.DataTable.isDataTable('#table-bpp-mesin-pembangkit-modal')) {
            $('#table-bpp-mesin-pembangkit-modal').DataTable().columns.adjust();
          }
        }, 300);
      });

      $('#vlsxloading').hide();
    },

    error: function(xhr, status, error) {
      console.error('Gagal load data BPP Per Mesin:', status, error);
      $('#vlsxloading').hide();
    }
  });
}
function exportTableToExcel() {
    var table = $('#table-bpp-mesin-pembangkit').DataTable();

    var data = table.rows().data();

    var html = '<table border="1">';

    // ambil header
    html += '<tr>';
    $('#table-bpp-mesin-pembangkit thead th').each(function() {
        html += '<th>' + $(this).text() + '</th>';
    });
    html += '</tr>';

    // ambil isi
    data.each(function(row) {
        html += '<tr>';
        for (var i = 0; i < row.length; i++) {
            html += '<td>' + row[i] + '</td>';
        }
        html += '</tr>';
    });

    html += '</table>';

    var url = 'data:application/vnd.ms-excel,' + encodeURIComponent(html);

    var a = document.createElement('a');
    a.href = url;
    a.download = 'bpp_per_mesin.xls';
    a.click();
}
</script>