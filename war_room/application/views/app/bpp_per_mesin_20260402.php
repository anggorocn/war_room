<?php
include_once("functions/string.func.php");
include_once("functions/date.func.php");
?>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">
<style>
  
    /* MODAL FULLSCREEN */
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
      /*color: #000;*/
      position: absolute;
      top: 25px;
      right: 25px;
      font-size: 30px;
      font-weight: bold;
      cursor: pointer;
      z-index: 200;
      background-color: red;
      /*color: rgba(255,255,255,0.6);*/
      color: #FFFFFF;
      width: 40px;
      height: 40px;
      line-height: 36px;
      text-align: center;
      border-radius: 50%;
    }
    .close-btn:hover {
      /*color: #FFFFFF;*/
      background-color: #333333;
    }

    /* Bungkus pagination & info agar sejajar */
    .dataTables_wrapper .dataTables_info,
    .dataTables_wrapper .dataTables_paginate {
      display: inline-block;
      vertical-align: middle;
      margin: 0;
    }

    /* Atur posisi agar di satu baris */
    .dataTables_wrapper .dataTables_info {
      float: left;
      padding-top: 6px;
    }

    .dataTables_wrapper .dataTables_paginate {
      float: right;
    }

    /* Hapus clearfix bawaan */
    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter {
      display: inline-block;
      vertical-align: middle;
    }

    /* Tambahan spacing */
    .dataTables_wrapper {
      padding: 5px 10px;
      background-color: #065b70; /* sesuaikan warna background kamu */
      color: #fff;
    }

    /* Style tombol pagination (lanjutan dari sebelumnya) */
    .dataTables_wrapper .dataTables_paginate .paginate_button {
      background-color: #fff;
      color: #004c80 !important;
      border: 1px solid #ccc;
      border-radius: 4px;
      margin: 0 2px;
      padding: 4px 10px;
      transition: all 0.2s ease-in-out;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
      background-color: #004c80 !important;
      color: #fff !important;
      border: 1px solid #004c80 !important;
    }

    /* Hover efek */
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
      background-color: #004c80;
      color: #fff !important;
    }

    select[name="bdd-table-large_length"]{
      color: black;
    }
    
    .table-bordered > thead > tr > th {
      background-color: #189db8; /* merah tua elegan */
    }

    .dataTables_wrapper .dataTables_filter {
      float: right;
    }

    .area-tabel .dataTables_scroll{
      border-top: none;
    }

    #Table1 th,
    #Table1 td {
      height: 10px;
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
                                <span class="ikon"><img src="images/icon-kinerja-korporat.png"></span> BPP Per Mesin
                                <!-- <a class="selengkapnya pull-right" href="app/index/kinerja_korporat_detil"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a> -->
                            </div>
                          </div>
                          
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="area-tabel">
                          <div class="judul-tabel">BPP Per Jenis Pembangkit</div>
                          <table class="table table-customize" width="100%" id='Table1'>
                            <thead>
                              <tr>
                                <th style="text-align: center;">Jenis Pembangkit</th>
                                <th style="text-align: center;">KOMP A</th>
                                <th style="text-align: center;">KOMP B</th>
                                <th style="text-align: center;">KOMP C</th>
                                <th style="text-align: center;">KOMP D</th>
                                <th style="text-align: center;">SUPPORT</th>
                                <th style="text-align: center;">TOTAL BEBAN</th>
                                <th style="text-align: center;">KWH</th>
                                <th style="text-align: center;">BPP </th>
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            </tfoot>
                          </table>
                        </div>
                        <div class="area-tabel">
                          <div class="judul-tabel">BPP Per Mesin
                            <button class="pull-right openModalBtn" data-target="#modal" style='background-color: transparent;border: none;'><i class="fa fa-search-plus"></i></button>
                          </div>
                          <table id="bdd-table" class="table table-bordered" width="100%">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Nama Pembangkit (SESUAI SILM)</th>
                                <th>ID Mesin</th>
                                <!-- <th>Nama Sentral Sesuai Silm RKAP</th> -->
                                <th>Jenis Pembangkit</th>
                                <th>Daya Terpasang (kW)</th>
                                <th>Total Komp A (Rp)</th>
                                <th>Total Komp B (Rp)</th>
                                <th>Total Komp C (Rp)</th>
                                <th>Total Komp D (Rp)</th>
                                <th>Total Komp E (Rp)</th>
                                <th>Total Komp ABDE (jika tdk dpt dipecah) contoh: Sewa, KIT yg Komp C passthrough</th>
                                <th>Total Komp ABCDE (Rp)</th>
                                <th>"kWh Netto (SILM) s.d bulan berjalan"</th>
                                <th>Total BPP (Rp/kWh)</th>
                                <th>BPP Komp A (Rp/kWh)</th>
                                <th>BPP Komp B (Rp/kWh)</th>
                                <th>BPP Komp C (Rp/kWh)</th>
                                <th>BPP Komp D (Rp/kWh)</th>
                                <th>BPP Komp E (Rp/kWh)</th>
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                    <div class="area-sumber-data detil">
                        <label>Sumber data : <span>Navitas</span></label>
                        <label>Last update : <span>4 Agustus 2023</span></label>
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
      $("#bln,#thn").on('change',function(){
          bln= parseInt($("#bln").val());
          thn= parseInt($("#thn").val());
          // dataJson();

          vurl= "app/index/bpp_per_mesin?b="+bln+"&t="+thn;
          document.location.href= vurl;
      });

      bln= parseInt($("#bln").val());
      thn= parseInt($("#thn").val());

      function cleardttable(id)
      {
        // cek apakah sudah jadi DataTable
        if ( $.fn.DataTable.isDataTable('#'+id) ) {
            $('#'+id).DataTable().clear().destroy();
        }

        // bersihkan isi tabel
        $('#'+id+' tbody').empty();
        $('#'+id+' tfoot').empty();
      }

      function dataJson(){
        cleardttable('Table1');
        $.ajax({
            url : 'json-api/Etl_dashboard_ditop_json/home?b='+bln+'&t='+thn+'&mode=jenis_pembangkit',
            type : 'GET',
            dataType : 'json',
            beforeSend: function () {
                $('#vlsxloading').show();
            },
            success : function(jsonData) {
              $('#Table1 tbody').append(jsonData.tabel1);
              $('#Table1 tfoot').append(jsonData.tabelFoot1);
               $('#Table1').DataTable({
                  columnDefs: [
                      {
                          targets: '_all',
                          render: function (data, type) {
                              if (type === 'sort' || type === 'type') {
                                  // ambil angka saja
                                  let num = data.toString().replace(/<[^>]*>/g, '');
                                  num = num.replace(/[^\d\-]/g, '');
                                  return num === '' ? 0 : parseInt(num);
                              }
                              return data;
                          }
                      },
                      {
                          targets: 0, // kolom pertama tetap string
                          render: function (data, type) {
                              return data;
                          }
                      }
                  ],
                  order: [[1, 'desc']],
                  paging: false,
                  searching: false,
                  info: false
              });
              dataJson2();
            }
        });
      }

      function dataJson2(){
        cleardttable('bdd-table');
        cleardttable('bdd-table-large');

        $.ajax({
          url: 'json-api/Etl_dashboard_ditop_json/home',
          type: 'GET',
          dataType: 'json',
          data: {
            b: bln,
            t: thn,
            mode: 'bpp_per_mesin'
          },
          success: function (jsonData) {
            // Kosongkan dulu tbody
            $('#bdd-table tbody').empty().append(jsonData.tabel2);
            $('#bdd-table-large tbody').empty().append(jsonData.tabel2);

            // Destroy DataTable lama bila sudah ada
            if ($.fn.DataTable.isDataTable('#bdd-table')) {
              $('#bdd-table').DataTable().destroy();
            }

            if ($.fn.DataTable.isDataTable('#bdd-table-large')) {
              $('#bdd-table-large').DataTable().destroy();
            }

            // Inisialisasi ulang DataTable
            const table = $('#bdd-table').DataTable({
              paging: false,
              info: false,
              // searching: false,
              scrollY: 'calc(40vh - 210px)', // tinggi area scroll
              scrollCollapse: true,
              scrollX: true, // penting jika tabel lebar
              fixedHeader: true, // ini kunci untuk header tetap
            });

            const tableLarge = $('#bdd-table-large').DataTable({
              // paging: false,
              // info: false,
              // // searching: false,
              // // scrollY: 'calc(40vh - 210px)', // tinggi area scroll
              // scrollCollapse: true,
              // scrollX: true, // penting jika tabel lebar
              fixedHeader: true, // ini kunci untuk header tetap
            });

            // Kadang perlu trigger resize agar header sinkron
            setTimeout(() => {
              table.columns.adjust().draw();
            }, 300);

            // Kadang perlu trigger resize agar header sinkron
            setTimeout(() => {
              tableLarge.columns.adjust().draw();
            }, 300);

            $('#vlsxloading').hide();
          },
          error: function (xhr, status, error) {
            console.error('AJAX Error:', status, error);
            $('#vlsxloading').hide();
          }
        });
      }

      dataJson();
      
      // fix dimensions of chart that was in a hidden element
      jQuery(document).on( 'shown.bs.tab', 'a[data-toggle="tab"]', function (e) { // on tab selection event
          jQuery( ".contains-chart" ).each(function() { // target each element with the .contains-chart class
              var chart = jQuery(this).highcharts(); // target the chart itself
              chart.reflow() // reflow that chart
          });
      })

      $(".openModalBtn").click(function () {
          let parentArea = $(this).closest(".area-grafik-bpp");
          let clonedContent = parentArea.clone();

          $("#jQueryModal").css("display", "block");
          $("#modalContentContainer").html(clonedContent);          
      });

      $(".close-btn").click(function () { closeModal(); });
      $(window).click(function (event) {
          if ($(event.target).is("#jQueryModal")) { closeModal(); }
      });

      function closeModal() {
          $("#jQueryModal").css("display", "none");
      }

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
</style>
<script src="lib/ScrollingTable/scrollingtable.js"></script>
<script>
  $('#table-bdd').ScrollingTable();
  $('#table-bdg').ScrollingTable();
  
</script>

<!-- ONCLICK TR TABLE -->
<script type="text/javascript">
  $(".area-tabel tbody td").click(function(){
  // $(".dataTable tbody tr").click(function(){
    // alert("The paragraph was clicked.");
    $('#myModal').modal('show');
  }); 
</script>

<!-- Modal -->
<style type="text/css">
  #myModal .modal-dialog.modal-lg {
    width: calc(100% - 60px);
  }
</style>
<div id="myModal" class="modal fade detil-mou" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Detail MoU</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="/action_page.php">                      
            <div class="form-group">
                <label class="control-label col-sm-2 title">Partner:</label>
                <div class="col-sm-8">
                  <label class="control-label">PT Danareksa (Persero)</label>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2 title">MoU Title:</label>
                <div class="col-sm-8">
                  <label class="control-label text-left">Rencana Kerja Sama Potensi Sinergi Dalam Mencapai Kawasan Industri yang Rendah Karbon</label>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2 title">Status:</label>
                <div class="col-sm-8">
                  <label class="control-label"><i class="fa fa-circle hijau" aria-hidden="true"></i> Berjalan</label>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2 title">Scope:</label>
                <div class="col-sm-8">
                    <textarea style="width:100%" class="form-control">Koordinasi antara Danareksa dan PLN NP dan terlaksananya kerja sama dengan skema yang akan disepakati oleh PLN NP dan Danareksa berdasarkan itikad baik dan saling menguntungkan terkait Kawasan Industri rendah karbon.</textarea>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2 title">Sign Date:</label>
                <div class="col-sm-2">
                  <label class="control-label"><i class="fa fa-calendar" aria-hidden="true"></i> 7/7/2023</label>
                </div>
                <label class="control-label col-sm-2 title">Expiration Date:</label>
                <div class="col-sm-2">
                  <label class="control-label"><i class="fa fa-calendar" aria-hidden="true"></i> 7/7/2024</label>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2 title">Remarks/ Progress:</label>
                <div class="col-sm-8">
                    <textarea style="width:100%;height: 100vh;" class="form-control">1. Sudah dilaksanakan site survey ke KIW dan KITB pada tanggal 17 Juli 2023
        2. MOU sudah ditandatangani 2 pihak
        3. Proses asesmen kebutuhan di Kawasan Industri Wijayakusuma</textarea>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2 title">Action Plan:</label>
                <div class="col-sm-8">
                    <textarea style="width:100%" class="form-control">1. Pelaksanaan site survey ke KIW dan KITB
        2. Pelaksanaan join study penyediaan energi hijau dan infrastuktur pendukungnya di KIW dan KITB.
        3. Kajian dan roadmap implementasi energi hijau dan infrastuktur pendukungnya terhadap potential project di KIW dan KITB
        4. Koordinasi dengan PLN Distribusi Jateng &amp; DIY
        5. Menyusun bisnis model yang akan dikembangkan dengan KIW.      (rencana pelaksanaan 2024-2025)</textarea>
                </div>
              </div>
            </form> 

          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- END MODAL -->



<div id="jQueryModal" class="modal">
  <div class="modal-content">
    <span class="close-btn">&times;</span>
    <div class="area-tabel" style="padding: 20px;">
      <div class="judul-tabel">BPP Per Mesin
        <!-- <button class="pull-right openModalBtn" data-target="#modal" style='background-color: transparent;border: none;'><i class="fa fa-search-plus"></i></button> -->
      </div>
      <div style="overflow:scroll;">
      <table id="bdd-table-large" class="table table-bordered" width="100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Pembangkit (SESUAI SILM)</th>
            <th>ID Mesin</th>
            <!-- <th>Nama Sentral Sesuai Silm RKAP</th> -->
            <th>Jenis Pembangkit</th>
            <th>Daya Terpasang (kW)</th>
            <th>Total Komp A (Rp)</th>
            <th>Total Komp B (Rp)</th>
            <th>Total Komp C (Rp)</th>
            <th>Total Komp D (Rp)</th>
            <th>Total Komp E (Rp)</th>
            <th>Total Komp ABDE (jika tdk dpt dipecah) contoh: Sewa, KIT yg Komp C passthrough</th>
            <th>Total Komp ABCDE (Rp)</th>
            <th>"kWh Netto (SILM) s.d bulan berjalan"</th>
            <th>Total BPP (Rp/kWh)</th>
            <th>BPP Komp A (Rp/kWh)</th>
            <th>BPP Komp B (Rp/kWh)</th>
            <th>BPP Komp C (Rp/kWh)</th>
            <th>BPP Komp D (Rp/kWh)</th>
            <th>BPP Komp E (Rp/kWh)</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
      </div>
    </div>
  </div>
</div>