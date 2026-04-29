<?php
include_once("functions/string.func.php");
include_once("functions/date.func.php");
$reqId = $_GET['reqId'];
?>

<style>
  /* =============================================
     MODAL CUSTOM
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
     HEADER TABEL
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

  table.display.table.table-customize.dataTable.no-footer th {
    vertical-align: middle;
  }

  /* =============================================
     MISC
  ============================================= */
  .area-tabel .judul-tabel {
    background: rgba(255,255,255,0.05);
  }
</style>

<!-- Services Section Start -->
<section id="services" class="services section-padding">
  <div class="container-fluid">

    <div class="row">
      <div class="col-md-12">
        <div class="area-breadcrumb pull-left">
          <ul class="breadcrumb">
            <li><a href="app"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
            <li><a href="app/index/bpp_per_mesin">BPP Per Jenis Pembangkit</a></li>
            <li>BPP Per Jenis Pembangkit Detil</li>
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
                      <!-- tfoot dikosongkan, diisi dari JSON -->
                      <tfoot></tfoot>
                    </table>
                  </div>

                  <!-- MODAL -->
                  <div id="modal4" class="modal-custom">
                    <div class="modal-content-custom">
                      <span class="closeModal">&times;</span>
                      <h3>BPP Per Mesin Pembangkit (Rp)</h3>
                      <table id="table-bpp-mesin-pembangkit-modal" class="display table table-customize" style="width:100%">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Pembangkit (SESUAI SILM)</th>
                            <th>Distrik</th>
                            <th>Jenis Pembangkit</th>
                            <th>Total Komp ABDE</th>
                            <th>Total Komp ABCDE (Rp)</th>
                            <th>kWh Netto</th>
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
                        <tfoot></tfoot>
                      </table>
                    </div>
                  </div>
                  <!-- END MODAL -->

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
  // HELPER: columnDefs sorting (reusable)
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
        targets: 0,
        render: function(data, type) {
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
  // DOCUMENT READY
  // =============================================
  $(document).ready(function() {

    dataJsonPerMesinPembangkit();

    // ------------------------------------------------
    // MODAL: buka
    // ------------------------------------------------
    $('.openModalBtn4').click(function() {
      $('#modal4').fadeIn();
      // adjust kolom modal setelah tampil (modal awalnya display:none)
      setTimeout(function() {
        if ($.fn.DataTable.isDataTable('#table-bpp-mesin-pembangkit-modal')) {
          $('#table-bpp-mesin-pembangkit-modal').DataTable().columns.adjust();
        }
      }, 300);
    });

    // ------------------------------------------------
    // MODAL: tutup
    // ------------------------------------------------
    $('.closeModal').click(function() {
      $('#modal4').fadeOut();
    });

  });

  // =============================================
  // AJAX: load data per mesin pembangkit
  // =============================================
  function dataJsonPerMesinPembangkit() {
    var bln = parseInt($("#bln").val());
    var thn = parseInt($("#thn").val());

    cleardttable('table-bpp-mesin-pembangkit');
    cleardttable('table-bpp-mesin-pembangkit-modal');

    $.ajax({
      url: 'json-api/Etl_dashboard_ditop_json/home?b=' + bln + '&t=' + thn + '&mode=bpp_per_mesin&reqId=<?=$reqId?>',
      type: 'GET',
      dataType: 'json',
      beforeSend: function() {
        $('#vlsxloading').show();
      },
      success: function(jsonData) {

        // -----------------------------------------
        // Tabel utama — gunakan .html() bukan .append()
        // -----------------------------------------
        $('#table-bpp-mesin-pembangkit tfoot').html(jsonData.tabelFoot2);
        $('#table-bpp-mesin-pembangkit tbody').html(jsonData.tabel2);

        $('#table-bpp-mesin-pembangkit').DataTable({
          searching:      true,
          ordering:       true,
          lengthChange:   false,
          scrollX:        true,
          scrollY:        "calc(100vh - 500px)",
          scrollCollapse: true,
          paging:         false,
          autoWidth:      true,
          columnDefs:     getColumnDefs(),
          initComplete:   function() {
            this.api().columns.adjust();
          }
        });

        // -----------------------------------------
        // Tabel modal — isi data yang sama
        // -----------------------------------------
        $('#table-bpp-mesin-pembangkit-modal tfoot').html(jsonData.tabelFoot2);
        $('#table-bpp-mesin-pembangkit-modal tbody').html(jsonData.tabel2);

        $('#table-bpp-mesin-pembangkit-modal').DataTable({
          searching:      true,
          ordering:       true,
          lengthChange:   false,
          scrollX:        true,
          scrollY:        "calc(100vh - 380px)",
          scrollCollapse: true,
          paging:         false,
          autoWidth:      true,
          columnDefs:     getColumnDefs(),
          initComplete:   function() {
            this.api().columns.adjust();
          }
        });

        $('#vlsxloading').hide();
      },

      error: function(xhr, status, error) {
        console.error('Gagal load data BPP Per Mesin Detil:', status, error);
        $('#vlsxloading').hide();
      }
    });
  }

</script>