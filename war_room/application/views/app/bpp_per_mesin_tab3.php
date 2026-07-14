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
  #table-bpp-mesin-pembangkit thead th,
  #table-bpp-mesin-pembangkit-modal thead th {
    white-space: normal !important;
    word-wrap: break-word;
    vertical-align: middle;
    text-align: center;
  }

  #table-bpp-mesin-pembangkit tbody td,
  #table-bpp-mesin-pembangkit-modal tbody td {
    white-space: nowrap;
  }

  /* modal-body putih -- teks tbody & label Search dipaksa hitam biar kebaca
     (beda dari halaman utama yg bg-nya gelap jadi teks putih pas di sana). */
  #table-bpp-mesin-pembangkit-modal tbody td,
  #table-bpp-mesin-pembangkit-modal_wrapper .dataTables_filter label,
  #table-bpp-mesin-pembangkit-modal_wrapper .dataTables_info {
    color: #000;
  }

  #table-bpp-mesin-pembangkit tfoot th,
  #table-bpp-mesin-pembangkit tfoot td {
    white-space: nowrap;
  }

  /* =============================================
     MODAL FULL HEIGHT (flexbox) -- modal-dialog makein tinggi viewport,
     table-scroll-wrap ngisi sisa ruang yg ada, bukan angka calc() ke-nebak.
  ============================================= */
  #modal4 .modal-dialog {
    width: 95%;
    height: 90vh;
    margin: 5vh auto;
  }
  #modal4 .modal-content {
    height: 100%;
    display: flex;
    flex-direction: column;
  }
  #modal4 .modal-body {
    flex: 1 1 auto;
    min-height: 0; /* wajib biar flex child bisa scroll, bukan malah ngedorong tinggi */
    display: flex;
    flex-direction: column;
  }

  /* =============================================
     SCROLL NATIVE buat tabel modal (bukan scrollX/scrollY DataTables)
     -- 1 tabel fisik, header nempel ke body-nya sendiri, gak mungkin geser.
  ============================================= */
  .table-scroll-wrap {
    flex: 1 1 auto;
    min-height: 0;
    overflow: auto;
  }

  #table-bpp-mesin-pembangkit-modal thead th {
    position: sticky;
    top: 0;
    z-index: 2;
    /* background/color IKUT style default app (.area-tabel.tabel-hpp .table-customize
       thead th di gaya.css) -- class-nya ditempel di wrapper .table-scroll-wrap,
       biar konsisten sama tabel lain, gak perlu hardcode warna di sini. */
  }

  /* baris TOTAL (tfoot) nempel di bawah pas scroll, kayak header nempel di atas.
     background solid wajib -- gaya.css pake rgba tembus pandang buat tfoot,
     kalo sticky konten yg discroll bakal keliatan numpuk transparan di baliknya. */
  #table-bpp-mesin-pembangkit-modal tfoot th,
  #table-bpp-mesin-pembangkit-modal tfoot td {
    position: sticky;
    bottom: 0;
    z-index: 2;
    background-color: #d9d9d9 !important;
    color: #000 !important;
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
                <li><a href="app/index/bpp_per_mesin_tab4?b=<?=$b?>&t=<?=$t?>">BPP Per Regional & Direktorat </a></li>
                <div style="width: 10%;float: right;">
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
                              <th>Regional</th>
                              <th>Jenis Pembangkit</th>
                              <th>Bahan Bakar Utama</th>
                              <th>Daya Terpasang (kW)</th>
                              <th>kWh Netto (SILM) s.d bulan berjalan</th>
                              <th>Total BPP (Rp/kWh)</th>
                              <th>Total Komp ABDE (jika tdk dpt dipecah) contoh: Sewa, KIT yg Komp C passthrough</th>
                              <th>Total Komp ABCDE (Rp)</th>
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

                        <!-- MODAL (Bootstrap Modal) -->
                        <div class="modal fade" id="modal4" tabindex="-1" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h3 class="modal-title">BPP Per Mesin Pembangkit (Rp)</h3>
                              </div>
                              <div class="modal-body">
                                <div class="area-tabel tabel-hpp table-scroll-wrap">
                                <table id="table-bpp-mesin-pembangkit-modal" class="display table table-customize" style="width:100%">
                                  <thead>
                                    <tr>
                                      <th>No</th>
                                      <th>Nama Pembangkit (SESUAI SILM)</th>
                                      <th>Distrik</th>
                                      <th>Regional</th>
                                      <th>Jenis Pembangkit</th>
                                      <th>Bahan Bakar Utama</th>
                                      <th>Daya Terpasang (kW)</th>
                                      <th>kWh Netto (SILM) s.d bulan berjalan</th>
                                      <th>Total BPP (Rp/kWh)</th>
                                      <th>Total Komp ABDE (jika tdk dpt dipecah) contoh: Sewa, KIT yg Komp C passthrough</th>
                                      <th>Total Komp ABCDE (Rp)</th>
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
                                  <tfoot></tfoot>
                                </table>
                                </div>
                              </div>
                            </div>
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
var modalDataMesin = null;

// width px per kolom, urutan sesuai <th> (No, Nama, Distrik, Regional, ...)
var COLUMN_WIDTHS = [40, 180, 90, 80, 80, 90, 100, 110, 90, 160, 110, 110, 110, 110, 110, 90, 90, 90, 90];

// kunci min-width tiap kolom lewat DataTables API (bukan CSS selector manual)
// -- api.column(i).header()/.nodes() otomatis nunjuk elemen yg BENERAN kepake
// (DataTables clone thead ke tabel terpisah pas scrollX aktif, id/class asli gak ikut ke-clone).
function applyMinWidths(api) {
  COLUMN_WIDTHS.forEach(function(w, i) {
    $(api.column(i).header()).css('min-width', w + 'px');
    $(api.column(i).nodes()).css('min-width', w + 'px');
  });
}

$(document).ready(function() {

  bln = parseInt($("#bln").val());
  thn = parseInt($("#thn").val());

  dataJsonPerMesinPembangkit();

  // =============================================
  // MODAL: buka (Bootstrap Modal)
  // Init/refresh DataTable modal di 'shown.bs.modal' -- event Bootstrap yg
  // fire PAS modal beneran full visible, bukan nebak pake setTimeout.
  // =============================================
  $('.openModalBtn4').click(function() {
    $('#modal4').modal('show');
  });

  $('#modal4').on('shown.bs.modal', function() {
    if (!modalDataMesin) return;

    if ($.fn.DataTable.isDataTable('#table-bpp-mesin-pembangkit-modal')) {
      var apiModal = $('#table-bpp-mesin-pembangkit-modal').DataTable();
      apiModal.columns.adjust();
      applyMinWidths(apiModal);
    } else {
      $('#table-bpp-mesin-pembangkit-modal tfoot').html(modalDataMesin.tabelFoot2);
      $('#table-bpp-mesin-pembangkit-modal tbody').html(modalDataMesin.tabel2);

      $('#table-bpp-mesin-pembangkit-modal').DataTable({
        searching:     true,
        ordering:      true,
        lengthChange:  false,
        paging:        false,
        // scrollX/scrollY/scrollCollapse SENGAJA gak dipake -- itu yg bikin DataTables
        // clone tabel jadi 2 (header terpisah dari body) dan gampang geser.
        // Scroll + sticky header sekarang murni CSS (.table-scroll-wrap), 1 tabel fisik.
        autoWidth:     false,  // width dikunci lewat columnDefs (getColumnDefs), jangan dihitung ulang
        columnDefs:    getColumnDefs(),
        initComplete:  function() {
          var api = this.api();
          api.columns.adjust();
          applyMinWidths(api);

          // Kotak Search DataTables ke-render DI DALAM .table-scroll-wrap (ikut
          // posisi <table> asli), jadi ikut ke-scroll pas isi tabel discroll.
          // Pindahin ke luar wrapper biar nempel di atas, gak geser.
          var $filter = $('#table-bpp-mesin-pembangkit-modal_wrapper .dataTables_filter');
          $filter.insertBefore($filter.closest('.table-scroll-wrap'));
        }
      });
    }
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
  // Wajib pakai columnDefs, bukan style="width:%" di HTML -- DataTables
  // scrollX ngukur ulang sendiri via clone dan ABAIKAN width HTML, jadi kolom
  // dengan header teks panjang (mis. "Total Komp ABDE (...)") bikin ukurannya
  // meleset jauh dari kolom lain kalau cuma dikasih width HTML.
  var defs = [
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

  COLUMN_WIDTHS.forEach(function(w, i) {
    defs.push({ targets: i, width: w + 'px' });
  });

  return defs;
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
        autoWidth:     false,  // width dikunci lewat columnDefs (getColumnDefs), jangan dihitung ulang
        columnDefs:    getColumnDefs(),
        initComplete:  function() {
          var api = this.api();
          api.columns.adjust();
          applyMinWidths(api);
        }
      });

      // -----------------------------------------
      // Tabel modal: simpan data, JANGAN init DataTable sekarang.
      // Modal masih display:none -> width kolom kehitung 0, header
      // vs body jadi geser. Init baru dilakukan saat modal dibuka.
      // -----------------------------------------
      modalDataMesin = { tabel2: jsonData.tabel2, tabelFoot2: jsonData.tabelFoot2 };

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
    a.download = 'Laporan BPP Per Mesin.xls';
    a.click();
}
</script>