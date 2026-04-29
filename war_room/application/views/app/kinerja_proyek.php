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
else
{
  $b=$b-1;
}
  
if(empty($t)) $t=date("Y");

if($this->darkmode=='true' || $this->darkmode==''){
  $warna='white';
}
else{
  $warna='black';
}
?>

<link rel="stylesheet" type="text/css" href="lib/slick-1.8.1/slick/slick.css">
<link rel="stylesheet" type="text/css" href="lib/slick-1.8.1/slick/slick-theme.css">
<script src="js/leaflet.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="lib/leaflet/leaflet.css">
<style type="text/css">
/*html, body {
  margin: 0;
  padding: 0;
}

* {
  box-sizing: border-box;
}*/

.slider {
    width: 100%;
    margin: 0px auto;
}

.slick-slide {
  margin: 0px 20px;
}

.slick-slide img {
  width: 100%;
}

.slick-prev:before,
.slick-next:before {
  color: black;
}


.slick-slide {
  transition: all ease-in-out .3s;
  opacity: 1;
}

.slick-active {
  opacity: 1;
}

.slick-current {
  opacity: 1;
}

.slick-track {
/*  margin-top: 100px;*/
}
/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}

  .highcharts-figure,
.highcharts-data-table table {
    min-width: 310px;
    max-width: 800px;
    margin: 1em auto;
}

#container {
    height: 400px;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}

.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}

.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
    padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}

.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

.highcharts-exporting-group{
  display: none;
}

.leaflet-popup-content{
  margin: 13px 24px 26px 20px;
}
.leaflet-popup-content{
    font-size: 7px;
}
.leaflet-right{
    display: none;
}
.leaflet-left{
    display: none;
}
.pagination {
    list-style-type: none;
    padding: 0;
    margin:  0;
    display: flex;
    justify-content: center;
}
.pagination li {
    display: inline;
    margin-right: 5px;
    cursor: pointer;
}
.pagination li a {
    text-decoration: none;
    padding: 5px 10px;
    background-color: #f0f0f0;
    color: #333;
    border: 1px solid #ccc;
    border-radius: 3px;
}
.pagination li a:hover {
    background-color: #e0e0e0;
}
.pagination .active a {
    background-color: #007bff;
    color: #fff;
    border-color: #007bff;
}
</style>

<!-- Services Section Start -->
<section id="services" class="services section-padding">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="area-breadcrumb pull-left">
                    <ul class="breadcrumb">
                    <li><a id="detilkembalihome" href="javascript:void(0)"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                    <!-- <li><a href="#">Peta Pembangkit</a></li>
                    <li><a href="#">Summer 15</a></li> -->
                    <li>Kinerja Proyek</li>
                    </ul> 
                </div>
            </div>

            <div class="col-md-12">
                <div class="area-wrapper">
                    <!-- <div class="gambar-kesiapan-pembangkit">
                        <img src="images/img-kesiapan-pembangkit.png">
                    </div> -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="header-detil">
                                <!-- <div class="logo-pln-np pull-left"><img src="images/logo.png"></div>     -->
                                <div class="judul">
                                    <span class="ikon"><img src="images/icon-kinerja-proyek.png"></span> Kinerja Proyek
                                    <div style="float:right;">
                                      <span style="font-size: 15px;text-transform: capitalize;">Search </span>
                                      <input type="text" id='search' style="width: 15vw;border: 1px solid rgba(255,255,255,0.2); background-color: transparent;  margin-left: 5px;  -webkit-border-radius: 4px;  -moz-border-radius: 4px;  border-radius: 4px;margin-left: 10px;font-size: 15px;" value="<?=$cari?>">
                                      <button style="color: black;font-size: 15px;" onclick="cari()">⌕</button>
                                      <!-- <input type="submit" value="⌕"  style="color: black;" /> -->

                                    </div>
                                    <!-- <a class="selengkapnya pull-right" href="app/index/penjualan"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a> -->
                                </div>
                            </div>
                            
                        </div>

                        
                        <!-- Services item -->
                        <div class="col-md-6 col-lg-8 col-xs-12">
                            <div class="services-item wow fadeInDown" data-wow-delay="0.6s">
                              <div class="area-peta-proyek">
                                <div id="map" style="height:100%;"></div>
                                <!-- &nbsp; -->
                              </div>
                              <div class="area-peta-proyek-keterangan">
                                <div class="row">
                                  <div class="col-md-7">
                                    Keterangan :        
                                    <span><i class="fa fa-map-marker initiation" aria-hidden="true"></i>Initiation        </span>
                                    <span><i class="fa fa-map-marker development" aria-hidden="true"></i>Development        </span>
                                    <span><i class="fa fa-map-marker execution" aria-hidden="true"></i>Execution        </span>
                                    <span><i class="fa fa-map-marker completion" aria-hidden="true"></i>Completion</span>
                                  </div>
                                  <div class="col-md-5" style="text-align: right;">
                                    <label>Sumber data : <span>Prime</span></label>
                                    <label>Last update : <span><?=$vtoday?></span></label>                          
                                  </div>
                                </div>
                              </div>

                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="area-tabel-kinerja-proyek">
                                        <div class="table-responsive" id='loading'>
                                          <table style="width: 100%;">
                                            <tr>
                                              <td style="text-align:center;">
                                                <img src="images/loading-new.gif" style="width:25%">
                                              </td>
                                            </tr>
                                            <tr>
                                              <td style="text-align:center;">
                                                <br>
                                                LOADING ....
                                              </td>
                                            </tr>
                                          </table>
                                        </div>
                                        <div class="table-responsive" style="display:none;" id='datatable'>
                                          <table class="table">
                                            <thead>
                                              <tr>
                                                <th>Nama Proyek</th>
                                                <th>Last Update</th>
                                                <th>&nbsp;</th>
                                              </tr>
                                            </thead>
                                            <tbody id='tbodyTable'>
                                            </tbody>
                                            <tfoot id='tfootTable'>
                                            </tfoot>
                                          </table>

                                          <!-- Modal -->
                                          <div id="myModal" class="modal fade" role="dialog">
                                            <div class="modal-dialog modal-lg">

                                              <!-- Modal content-->
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                  <h4 class="modal-title">Modal Header</h4>
                                                </div>
                                                <div class="modal-body">
                                                  <iframe width="100%" height="486" src="https://www.youtube.com/embed/YOFDIjbBtcM" title="Compro PLN Nusantara Power 2024" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                              </div>

                                            </div>
                                          </div>

                                        </div> 
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="area-ringkasan-status">
                                      <div class="grafik" id="pie-compliance"></div>
                                      <!-- <div class="legend">
                                        <div class="caption">Ringkasan Status</div>
                                        <div class="item" style="color:black;"><i class="fa fa-square late" aria-hidden="true" id='listStatusINITIATION'></i></div>
                                        <div class="item" style="color:black;"><i class="fa fa-square on-schedule" aria-hidden="true" id='listStatusCOMPLETION'></i></div>
                                        <div class="item" style="color:black;"><i class="fa fa-square not-started" aria-hidden="true" id='listStatusDEVELOPMENT'></i></div>
                                        <div class="item"><i class="fa fa-square completed" aria-hidden="true" id='listStatusEXECUTION'></i></div>
                                      </div> -->
                                      <div class="clearfix"></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>

                        <!-- Services item -->
                        <div class="col-md-6 col-lg-4 col-xs-12" >
                          <div class="services-item wow fadeInDown" data-wow-delay="0.6s">
                            <div class="area-peringatan-dini-proyek">
                              <div class="judul">
                                <span style="padding-right: 100px;">Peringatan Dini Proyek</span>

                                <label class="switch-check">
                                  <input type="checkbox" <? if($nt == 1) echo 'checked'?> id="slider-started">
                                  <span style="padding-right: 30px; height: 28px;" class="slider-check round"></span>
                                </label>

                                <div class="ikon pull-right"><img src="images/icon-siren.png"></div>
<!--                                 <div class="ikon pull-right" style="padding-top: 4px;">
                                  <input type="text" id='search' style="width: 8vw;height: 35px;margin-top: -10px;" placeholder="cari" value="<?=$cari?>">
                                  <button style="height: 35px;" onclick="cari()">cari</button>
                                </div> -->

                                

                              </div>
                              <div class="inner">
                                <section class="vertical slider" id='drawDetil'>
                                </section>
                              </div>
                            </div>
                          </div>
                        </div>

                        
                        
                        <!-- Services item -->
                        <!-- <div class="col-md-6 col-lg-1 col-xs-12 padding-none">
                            test
                        </div> -->

                        <!-- Services item -->
                        <div class="col-md-5ths col-xs-6" style="display: none;">
                          <div class="area-kelompok-keuangan wow fadeInDown" data-wow-delay="0.6s">
                            <div class="item">
                              <div class="caption">Laba (Rugi) Bersih</div>
                              <div class="info-nilai hijau">
                                <div class="nilai">4,88</div>
                                <div class="title">s/d Des 2021</div>
                              </div>
                              <div class="data">
                                <table>
                                  <tr>
                                    <td>s/d Des 2021  </td><td>5,82</td>
                                  </tr>
                                  <tr>
                                    <td>RKAP s/d Des 2022 </td><td>4,06</td>
                                  </tr>
                                  <tr>
                                    <td>s/d Nov 2021  </td><td>4,51</td>
                                  </tr>
                                </table>
                              </div>
                              <div class="clearfix"></div>
                            </div>
                          </div>

                          <div class="area-kelompok-keuangan wow fadeInDown" data-wow-delay="0.8s">
                            <div class="item">
                              <div class="caption">Pendapatan Usaha</div>
                              <div class="info-nilai merah">
                                <div class="nilai">4,88</div>
                                <div class="title">s/d Des 2021</div>
                              </div>
                              <div class="data">
                                <table>
                                  <tr>
                                    <td>s/d Des 2021  </td><td>5,82</td>
                                  </tr>
                                  <tr>
                                    <td>RKAP s/d Des 2022 </td><td>4,06</td>
                                  </tr>
                                  <tr>
                                    <td>s/d Nov 2021  </td><td>4,51</td>
                                  </tr>
                                </table>
                              </div>
                              <div class="clearfix"></div>
                            </div>
                            <div class="area-kelompok-sub pendapatan">
                                <div class="item sub">
                                  <div class="caption">Pendapatan Tenaga Listrik</div>
                                  <div class="info-nilai hijau">
                                    <div class="nilai">4,88</div>
                                    <div class="title">s/d Des 2021</div>
                                  </div>
                                  <div class="data">
                                    <table>
                                      <tr>
                                        <td>s/d Des 2021  </td><td>5,82</td>
                                      </tr>
                                      <tr>
                                        <td>RKAP s/d Des 2022 </td><td>4,06</td>
                                      </tr>
                                      <tr>
                                        <td>s/d Nov 2021  </td><td>4,51</td>
                                      </tr>
                                    </table>
                                  </div>
                                  <div class="clearfix"></div>
                                </div>

                                <div class="item sub">
                                  <div class="caption">Pendapatan Jasa O&M</div>
                                  <div class="info-nilai merah">
                                    <div class="nilai">4,88</div>
                                    <div class="title">s/d Des 2021</div>
                                  </div>
                                  <div class="data">
                                    <table>
                                      <tr>
                                        <td>s/d Des 2021  </td><td>5,82</td>
                                      </tr>
                                      <tr>
                                        <td>RKAP s/d Des 2022 </td><td>4,06</td>
                                      </tr>
                                      <tr>
                                        <td>s/d Nov 2021  </td><td>4,51</td>
                                      </tr>
                                    </table>
                                  </div>
                                  <div class="clearfix"></div>
                                </div>

                                <div class="item sub">
                                  <div class="caption">Pendapatan EPC</div>
                                  <div class="info-nilai merah">
                                    <div class="nilai">4,88</div>
                                    <div class="title">s/d Des 2021</div>
                                  </div>
                                  <div class="data">
                                    <table>
                                      <tr>
                                        <td>s/d Des 2021  </td><td>5,82</td>
                                      </tr>
                                      <tr>
                                        <td>RKAP s/d Des 2022 </td><td>4,06</td>
                                      </tr>
                                      <tr>
                                        <td>s/d Nov 2021  </td><td>4,51</td>
                                      </tr>
                                    </table>
                                  </div>
                                  <div class="clearfix"></div>
                                </div>

                                <div class="item sub">
                                  <div class="caption">Pendapatan Usaha Lainnya</div>
                                  <div class="info-nilai merah">
                                    <div class="nilai">4,88</div>
                                    <div class="title">s/d Des 2021</div>
                                  </div>
                                  <div class="data">
                                    <table>
                                      <tr>
                                        <td>s/d Des 2021  </td><td>5,82</td>
                                      </tr>
                                      <tr>
                                        <td>RKAP s/d Des 2022 </td><td>4,06</td>
                                      </tr>
                                      <tr>
                                        <td>s/d Nov 2021  </td><td>4,51</td>
                                      </tr>
                                    </table>
                                  </div>
                                  <div class="clearfix"></div>
                                </div>
                            </div>

                          </div>

                        </div>


                        <div class="col-md-40ths col-xs-6" style="display: none;">
                          <div class="area-kelompok-keuangan wow fadeInDown" data-wow-delay="1.0s">
                            <div class="item">
                              <div class="caption">BPP (Rp/kWh)</div>
                              <div class="info-nilai merah">
                                <div class="nilai">4,88</div>
                                <div class="title">s/d Des 2021</div>
                              </div>
                              <div class="data">
                                <table>
                                  <tr>
                                    <td>s/d Des 2021  </td><td>5,82</td>
                                  </tr>
                                  <tr>
                                    <td>RKAP s/d Des 2022 </td><td>4,06</td>
                                  </tr>
                                  <tr>
                                    <td>s/d Nov 2021  </td><td>4,51</td>
                                  </tr>
                                </table>
                              </div>
                              <div class="clearfix"></div>
                            </div>

                            <div class="area-kelompok-sub bpp">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="item sub">
                                    <div class="caption">Pembelian Tenaga Listrik</div>
                                    <div class="info-nilai hijau">
                                      <div class="nilai">4,88</div>
                                      <div class="title">s/d Des 2021</div>
                                    </div>
                                    <div class="data">
                                      <table>
                                        <tr>
                                          <td>s/d Des 2021  </td><td>5,82</td>
                                        </tr>
                                        <tr>
                                          <td>RKAP s/d Des 2022 </td><td>4,06</td>
                                        </tr>
                                        <tr>
                                          <td>s/d Nov 2021  </td><td>4,51</td>
                                        </tr>
                                      </table>
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>

                                  <div class="item sub">
                                    <div class="caption">Bahan Bakar & Pelumas</div>
                                    <div class="info-nilai kuning">
                                      <div class="nilai">4,88</div>
                                      <div class="title">s/d Des 2021</div>
                                    </div>
                                    <div class="data">
                                      <table>
                                        <tr>
                                          <td>s/d Des 2021  </td><td>5,82</td>
                                        </tr>
                                        <tr>
                                          <td>RKAP s/d Des 2022 </td><td>4,06</td>
                                        </tr>
                                        <tr>
                                          <td>s/d Nov 2021  </td><td>4,51</td>
                                        </tr>
                                      </table>
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>

                                  <div class="item sub">
                                    <div class="caption">Pemeliharaan</div>
                                    <div class="info-nilai hijau">
                                      <div class="nilai">4,88</div>
                                      <div class="title">s/d Des 2021</div>
                                    </div>
                                    <div class="data">
                                      <table>
                                        <tr>
                                          <td>s/d Des 2021  </td><td>5,82</td>
                                        </tr>
                                        <tr>
                                          <td>RKAP s/d Des 2022 </td><td>4,06</td>
                                        </tr>
                                        <tr>
                                          <td>s/d Nov 2021  </td><td>4,51</td>
                                        </tr>
                                      </table>
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>

                                  <div class="item sub">
                                    <div class="caption">Biaya O&M</div>
                                    <div class="info-nilai hijau">
                                      <div class="nilai">4,88</div>
                                      <div class="title">s/d Des 2021</div>
                                    </div>
                                    <div class="data">
                                      <table>
                                        <tr>
                                          <td>s/d Des 2021  </td><td>5,82</td>
                                        </tr>
                                        <tr>
                                          <td>RKAP s/d Des 2022 </td><td>4,06</td>
                                        </tr>
                                        <tr>
                                          <td>s/d Nov 2021  </td><td>4,51</td>
                                        </tr>
                                      </table>
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="item sub">
                                    <div class="caption">Kepegawaian</div>
                                    <div class="info-nilai hijau">
                                      <div class="nilai">4,88</div>
                                      <div class="title">s/d Des 2021</div>
                                    </div>
                                    <div class="data">
                                      <table>
                                        <tr>
                                          <td>s/d Des 2021  </td><td>5,82</td>
                                        </tr>
                                        <tr>
                                          <td>RKAP s/d Des 2022 </td><td>4,06</td>
                                        </tr>
                                        <tr>
                                          <td>s/d Nov 2021  </td><td>4,51</td>
                                        </tr>
                                      </table>
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>

                                  <div class="item sub">
                                    <div class="caption">Penyusutan</div>
                                    <div class="info-nilai hijau">
                                      <div class="nilai">4,88</div>
                                      <div class="title">s/d Des 2021</div>
                                    </div>
                                    <div class="data">
                                      <table>
                                        <tr>
                                          <td>s/d Des 2021  </td><td>5,82</td>
                                        </tr>
                                        <tr>
                                          <td>RKAP s/d Des 2022 </td><td>4,06</td>
                                        </tr>
                                        <tr>
                                          <td>s/d Nov 2021  </td><td>4,51</td>
                                        </tr>
                                      </table>
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>

                                  <div class="item sub">
                                    <div class="caption">Administrasi</div>
                                    <div class="info-nilai hijau">
                                      <div class="nilai">4,88</div>
                                      <div class="title">s/d Des 2021</div>
                                    </div>
                                    <div class="data">
                                      <table>
                                        <tr>
                                          <td>s/d Des 2021  </td><td>5,82</td>
                                        </tr>
                                        <tr>
                                          <td>RKAP s/d Des 2022 </td><td>4,06</td>
                                        </tr>
                                        <tr>
                                          <td>s/d Nov 2021  </td><td>4,51</td>
                                        </tr>
                                      </table>
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>

                                  <div class="item sub">
                                    <div class="caption">Biaya EPC</div>
                                    <div class="info-nilai hijau">
                                      <div class="nilai">4,88</div>
                                      <div class="title">s/d Des 2021</div>
                                    </div>
                                    <div class="data">
                                      <table>
                                        <tr>
                                          <td>s/d Des 2021  </td><td>5,82</td>
                                        </tr>
                                        <tr>
                                          <td>RKAP s/d Des 2022 </td><td>4,06</td>
                                        </tr>
                                        <tr>
                                          <td>s/d Nov 2021  </td><td>4,51</td>
                                        </tr>
                                      </table>
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>

                                  <div class="item sub">
                                    <div class="caption">Biaya Usaha Lainnya</div>
                                    <div class="info-nilai hijau">
                                      <div class="nilai">4,88</div>
                                      <div class="title">s/d Des 2021</div>
                                    </div>
                                    <div class="data">
                                      <table>
                                        <tr>
                                          <td>s/d Des 2021  </td><td>5,82</td>
                                        </tr>
                                        <tr>
                                          <td>RKAP s/d Des 2022 </td><td>4,06</td>
                                        </tr>
                                        <tr>
                                          <td>s/d Nov 2021  </td><td>4,51</td>
                                        </tr>
                                      </table>
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>

                                </div>
                              </div>
                                
                            </div>

                          </div>
                        </div>
                        <!-- <div class="col-md-5ths col-xs-6">
                          haii3
                        </div> -->
                        <div class="col-md-5ths col-xs-6" style="display: none;">
                          <div class="area-kelompok-keuangan wow fadeInDown" data-wow-delay="1.2s">
                            <!-- <div class="item">
                              <div class="caption">Pendapatan Usaha</div>
                              <div class="info-nilai merah">
                                <div class="nilai">4,88</div>
                                <div class="title">s/d Des 2021</div>
                              </div>
                              <div class="data">
                                <table>
                                  <tr>
                                    <td>s/d Des 2021  </td><td>5,82</td>
                                  </tr>
                                  <tr>
                                    <td>RKAP s/d Des 2022 </td><td>4,06</td>
                                  </tr>
                                  <tr>
                                    <td>s/d Nov 2021  </td><td>4,51</td>
                                  </tr>
                                </table>
                              </div>
                              <div class="clearfix"></div>
                            </div> -->
                            <div class="area-kelompok-sub aset">
                                <div class="item sub">
                                  <div class="caption">Aset Tetap</div>
                                  <div class="info-nilai hijau">
                                    <div class="nilai">4,88</div>
                                    <div class="title">s/d Des 2021</div>
                                  </div>
                                  <div class="data">
                                    <table>
                                      <tr>
                                        <td>s/d Des 2021  </td><td>5,82</td>
                                      </tr>
                                      <tr>
                                        <td>RKAP s/d Des 2022 </td><td>4,06</td>
                                      </tr>
                                      <tr>
                                        <td>s/d Nov 2021  </td><td>4,51</td>
                                      </tr>
                                    </table>
                                  </div>
                                  <div class="clearfix"></div>
                                </div>

                                <div class="item sub">
                                  <div class="caption">Persediaan</div>
                                  <div class="info-nilai kuning">
                                    <div class="nilai">4,88</div>
                                    <div class="title">s/d Des 2021</div>
                                  </div>
                                  <div class="data">
                                    <table>
                                      <tr>
                                        <td>s/d Des 2021  </td><td>5,82</td>
                                      </tr>
                                      <tr>
                                        <td>RKAP s/d Des 2022 </td><td>4,06</td>
                                      </tr>
                                      <tr>
                                        <td>s/d Nov 2021  </td><td>4,51</td>
                                      </tr>
                                    </table>
                                  </div>
                                  <div class="clearfix"></div>
                                </div>

                                <div class="item sub">
                                  <div class="caption">Piutang Usaha</div>
                                  <div class="info-nilai hijau">
                                    <div class="nilai">4,88</div>
                                    <div class="title">s/d Des 2021</div>
                                  </div>
                                  <div class="data">
                                    <table>
                                      <tr>
                                        <td>s/d Des 2021  </td><td>5,82</td>
                                      </tr>
                                      <tr>
                                        <td>RKAP s/d Des 2022 </td><td>4,06</td>
                                      </tr>
                                      <tr>
                                        <td>s/d Nov 2021  </td><td>4,51</td>
                                      </tr>
                                    </table>
                                  </div>
                                  <div class="clearfix"></div>
                                </div>

                                <div class="item sub">
                                  <div class="caption">Penyertaan</div>
                                  <div class="info-nilai hijau">
                                    <div class="nilai">4,88</div>
                                    <div class="title">s/d Des 2021</div>
                                  </div>
                                  <div class="data">
                                    <table>
                                      <tr>
                                        <td>s/d Des 2021  </td><td>5,82</td>
                                      </tr>
                                      <tr>
                                        <td>RKAP s/d Des 2022 </td><td>4,06</td>
                                      </tr>
                                      <tr>
                                        <td>s/d Nov 2021  </td><td>4,51</td>
                                      </tr>
                                    </table>
                                  </div>
                                  <div class="clearfix"></div>
                                </div>
                            </div>

                          </div>
                        </div>
                        <div class="col-md-5ths col-xs-6" style="display: none;">
                          <div class="area-kelompok-keuangan wow fadeInDown" data-wow-delay="1.4s">
                            <!-- <div class="item">
                              <div class="caption">Pendapatan Usaha</div>
                              <div class="info-nilai merah">
                                <div class="nilai">4,88</div>
                                <div class="title">s/d Des 2021</div>
                              </div>
                              <div class="data">
                                <table>
                                  <tr>
                                    <td>s/d Des 2021  </td><td>5,82</td>
                                  </tr>
                                  <tr>
                                    <td>RKAP s/d Des 2022 </td><td>4,06</td>
                                  </tr>
                                  <tr>
                                    <td>s/d Nov 2021  </td><td>4,51</td>
                                  </tr>
                                </table>
                              </div>
                              <div class="clearfix"></div>
                            </div> -->
                            <div class="area-kelompok-sub arus-kas">
                                <div class="item sub">
                                  <div class="caption">Arus Kas Operasi</div>
                                  <div class="info-nilai hijau">
                                    <div class="nilai">4,88</div>
                                    <div class="title">s/d Des 2021</div>
                                  </div>
                                  <div class="data">
                                    <table>
                                      <tr>
                                        <td>s/d Des 2021  </td><td>5,82</td>
                                      </tr>
                                      <tr>
                                        <td>RKAP s/d Des 2022 </td><td>4,06</td>
                                      </tr>
                                      <tr>
                                        <td>s/d Nov 2021  </td><td>4,51</td>
                                      </tr>
                                    </table>
                                  </div>
                                  <div class="clearfix"></div>
                                </div>

                                <div class="item sub">
                                  <div class="caption">Arus Kas Investasi</div>
                                  <div class="info-nilai merah">
                                    <div class="nilai">4,88</div>
                                    <div class="title">s/d Des 2021</div>
                                  </div>
                                  <div class="data">
                                    <table>
                                      <tr>
                                        <td>s/d Des 2021  </td><td>5,82</td>
                                      </tr>
                                      <tr>
                                        <td>RKAP s/d Des 2022 </td><td>4,06</td>
                                      </tr>
                                      <tr>
                                        <td>s/d Nov 2021  </td><td>4,51</td>
                                      </tr>
                                    </table>
                                  </div>
                                  <div class="clearfix"></div>
                                </div>

                                <div class="item sub">
                                  <div class="caption">Arus Kas Pendanaan</div>
                                  <div class="info-nilai merah">
                                    <div class="nilai">4,88</div>
                                    <div class="title">s/d Des 2021</div>
                                  </div>
                                  <div class="data">
                                    <table>
                                      <tr>
                                        <td>s/d Des 2021  </td><td>5,82</td>
                                      </tr>
                                      <tr>
                                        <td>RKAP s/d Des 2022 </td><td>4,06</td>
                                      </tr>
                                      <tr>
                                        <td>s/d Nov 2021  </td><td>4,51</td>
                                      </tr>
                                    </table>
                                  </div>
                                  <div class="clearfix"></div>
                                </div>

                                <div class="item sub">
                                  <div class="caption">Saldo Kas</div>
                                  <div class="info-nilai hijau">
                                    <div class="nilai">4,88</div>
                                    <div class="title">s/d Des 2021</div>
                                  </div>
                                  <div class="data">
                                    <table>
                                      <tr>
                                        <td>s/d Des 2021  </td><td>5,82</td>
                                      </tr>
                                      <tr>
                                        <td>RKAP s/d Des 2022 </td><td>4,06</td>
                                      </tr>
                                      <tr>
                                        <td>s/d Nov 2021  </td><td>4,51</td>
                                      </tr>
                                    </table>
                                  </div>
                                  <div class="clearfix"></div>
                                </div>
                            </div>

                          </div>
                        </div>

                        <div class="col-md-40ths col-xs-6" style="display: none;">
                          <div class="area-keterangan-keuangan wow fadeInDown" data-wow-delay="1.6s">
                            <ol>
                              <li>Laba Bersih lebih baik 20,28%, terutama karena laba PTL yang lebih baik.</li>
                              <li>BPP lebih baik 9,68% terutama karena efisiensi biaya usaha.</li>
                              <li>Pendapatan Usaha dibawah RKAP dikarenakan capaian pendapatan OM, EPC, stockies,
                                MRO dan lainnya belum sesuai target karena prioritisasi investasi & pemeliharaan 
                                dilingkungan PLN</li>
                              <li>Kenaikan Biaya Bahan Bakar dan pelumas seiring dengan meningkatnya kWh jual.</li>
                              <li>Biaya pembelian TL, Biaya Pemeliharaan, Biaya Kepegawaian, Biaya Penyusutan, Biaya
                                Administrasi dan Biaya Usaha Lainnya dapat dioptimalkan dibawah RKAP.</li>
                              <li>Aset Tetap tercapai dibawah RKAP terutama karena mundurnya COD Add On MTW</li>
                              <li>Persediaan lebih tinggi dari RKAP terutama pada BBM untuk cadangan operasional</li>
                              <li>Saldo Kas secara keseluruhan tercapai lebih baik dari RKAP. Arus Kas Investasi & 
                                Pendanaan dibawah RKAP terutama karena penerimaan SHL lebih kecil dari RKAP
                                seiring dengan progress Add On MTW.</li>
                            </ol>
                          </div>
                        </div>

                        <!-- Services item -->
                        <div class="col-md-6 col-lg-8 col-xs-12" style="display: none;">
                            <div class="services-item wow fadeInDown" data-wow-delay="0.6s">

                              <div class="area-ringkasan-kontrak-kinerja">
                                
                                <div class="inner">
                                  <div class="sub-judul">Ringkasan Kontrak Kinerja</div>

                                  <div class="legend">
                                    <span><i class="fa fa-circle hijau" aria-hidden="true"></i> ≥ 100%          </span>
                                    <span><i class="fa fa-circle kuning" aria-hidden="true"></i> ≥ 95% - < 100%         </span> 
                                    <span><i class="fa fa-circle merah" aria-hidden="true"></i> < 95%          </span>
                                    <span><i class="fa fa-circle biru" aria-hidden="true"></i> On track          </span>
                                    <span><i class="fa fa-circle abu-abu" aria-hidden="true"></i> Belum diukur</span>
                                  </div>

                                  <div class="row">
                                    <div class="col-md-2">
                                      <div class="item">
                                        <div class="caption">Economic and Social Value</div>
                                        <div class="grafik-pie" id="pie-economic"></div>
                                        <div class="keterangan">EFOR Non PLTU Jawa Bali, EFOR PLTU Luar Jawa Bali, EAF PLTU Jawa Bali, EAF Non PLTU Jawa Bali, EAF PLTU Luar Jawa Bali</div>
                                      </div>
                                    </div>
                                    <div class="col-md-2">
                                      <div class="item">
                                        <div class="caption">Business Model Innovation</div>
                                        <div class="grafik-pie" id="pie-business"></div>
                                        <div class="keterangan">Jumlah Kontrak Bisnis di Luar Negeri, Strategic Partnership GenCo</div>
                                      </div>
                                    </div>
                                    <div class="col-md-2">
                                      <div class="item">
                                        <div class="caption">Technology Leadership</div>
                                        <div class="grafik-pie" id="pie-technology"></div>
                                        <div class="keterangan">&nbsp;</div>
                                      </div>
                                    </div>
                                    <div class="col-md-2">
                                      <div class="item">
                                        <div class="caption">Energize Investment</div>
                                        <div class="grafik-pie" id="pie-energize"></div>
                                        <div class="keterangan">EPC Project Completion</div>
                                      </div>
                                    </div>
                                    <div class="col-md-2">
                                      <div class="item">
                                        <div class="caption">Unleash Talent</div>
                                        <div class="grafik-pie" id="pie-talent"></div>
                                        <div class="keterangan">&nbsp;</div>
                                      </div>
                                    </div>
                                    <div class="col-md-2">
                                      <div class="item">
                                        <div class="caption">Compliance</div>
                                        <!-- <div class="grafik-pie" id="pie-compliance"></div> -->
                                        <div class="keterangan">&nbsp;</div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="area-ringkasan-info">
                                <div class="row">
                                  <div class="col-md-3">
                                    <div class="item merah">
                                      <div class="item-inner">
                                        <div class="caption">Beyond KWH</div>
                                        <div class="keterangan">KPI Bidang Non Kerja</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="item">
                                      <div class="item-inner">
                                        <div class="caption">Digitalisasi Power Plant</div>
                                        <div class="keterangan">KPI Bidang Non Kerja</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="item">
                                      <div class="item-inner">
                                        <div class="caption">Making Digital Talent</div>
                                        <div class="keterangan">KPI Bidang Non Kerja</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="item">
                                      <div class="item-inner">
                                        <div class="caption">Co-Firing</div>
                                        <div class="keterangan">KPI Bidang Non Kerja</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="item">
                                      <div class="item-inner">
                                        <div class="caption">EBT (Energi Baru & Terbarukan)</div>
                                        <div class="keterangan">KPI Bidang Non Kerja</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="item">
                                      <div class="item-inner">
                                        <div class="caption">Pengembangan Pembangkit</div>
                                        <div class="keterangan">KPI Bidang Non Kerja</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="item">
                                      <div class="item-inner">
                                        <div class="caption">Milestone PLTS Cirata</div>
                                        <div class="keterangan">KPI Bidang Non Kerja</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="item merah">
                                      <div class="item-inner">
                                        <div class="caption">Rasio Keuangan</div>
                                        <div class="keterangan">KPI Bidang Non Kerja</div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>

                        <!-- Services item -->
                        <div class="col-md-6 col-lg-4 col-xs-12" style="display: none;">
                            <div class="services-item wow fadeInDown" data-wow-delay="0.6s">
                              <div class="area-kpi-korporat">
                                
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="area-card">
                                      <div class="sub-judul">KPI Korporat</div>
                                      <div class="inner">
                                        <table>
                                          <thead>
                                            <tr>
                                              <th>&nbsp;</th>
                                              <th>&nbsp;</th>
                                              <th>Jumlah KPI</th>
                                              <th>Total KPI</th>
                                            </tr>  
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td>≥ 100%</td>
                                              <td><i class="fa fa-circle hijau" aria-hidden="true"></i></td>
                                              <td>24</td>
                                              <td>/33</td>
                                            </tr>
                                            <tr>
                                              <td>≥ 95% - < 100%</td>
                                              <td><i class="fa fa-circle kuning" aria-hidden="true"></i></td>
                                              <td>3</td>
                                              <td>/33</td>
                                            </tr>
                                            <tr>
                                              <td>< 95%</td>
                                              <td><i class="fa fa-circle merah" aria-hidden="true"></i></td>
                                              <td>5</td>
                                              <td>/33</td>
                                            </tr>
                                            <tr>
                                              <td>On track</td>
                                              <td><i class="fa fa-circle biru" aria-hidden="true"></i></td>
                                              <td>0</td>
                                              <td>/33</td>
                                            </tr>
                                            <tr>
                                              <td>Belum dilakukan</td>
                                              <td><i class="fa fa-circle abu-abu" aria-hidden="true"></i></td>
                                              <td>1</td>
                                              <td>/33</td>      
                                            </tr>
                                          </tbody>
                                        </table>
                                                        
                                        
                                      </div>
                                  </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="area-card">
                                      <div class="sub-judul">NKO</div>
                                      <div class="inner">
                                        98.02
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="area-card">
                                      <div class="sub-judul">Detil</div>
                                      <div class="inner">
                                        Penjelasan terkait nilai NKO
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="area-card">
                                      <div class="sub-judul">Executive Summary</div>
                                      <div class="inner">
                                        Pencapaian kinerja korporat sampai dengan bulan Juni 2023, yaitu sebanyak 24 KPI memenuhi target (warna Hijau), 3 hampir memenuhi target (warna Kuning), dan 5 KPI belum memenuhi target (warna Merah).
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
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
  // Data retrieved from https://netmarketshare.com
  Highcharts.chart('pie-economic', {
      chart: {
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false,
          type: 'pie',
          backgroundColor: null,
          margin: [0,0,0,0]
      },
      exporting: {
        enabled: false
      },
      title: {
          text: null,
          align: 'left'
      },
      tooltip: {
          pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      accessibility: {
          point: {
              valueSuffix: '%'
          }
      },
      plotOptions: {
          pie: {
              allowPointSelect: true,
              cursor: 'pointer',
              dataLabels: {
                  enabled: false,
                  format: '<b>{point.name}</b>: {point.percentage:.1f} %'
              }
          }
      },
      series: [{
          name: 'Brands',
          colorByPoint: true,
          data: [{
              name: 'Test',
              y: 70.67,
              // sliced: true,
              selected: true,
              color: '#3fcb63'
          }, {
              name: 'Test 2',
              y: 14.77,
              color: '#f5cb2c'
          },  {
              name: 'Test 3',
              y: 4.86,
              color: '#e42517'
          }]
      }]
  });

</script>
<script type="text/javascript">
  // Data retrieved from https://netmarketshare.com
  Highcharts.chart('pie-business', {
      chart: {
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false,
          type: 'pie',
          backgroundColor: null,
          margin: [0,0,0,0]
      },
      exporting: {
        enabled: false
      },
      title: {
          text: null,
          align: 'left'
      },
      tooltip: {
          pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      accessibility: {
          point: {
              valueSuffix: '%'
          }
      },
      plotOptions: {
          pie: {
              allowPointSelect: true,
              cursor: 'pointer',
              dataLabels: {
                  enabled: false,
                  format: '<b>{point.name}</b>: {point.percentage:.1f} %'
              }
          }
      },
      series: [{
          name: 'Brands',
          colorByPoint: true,
          data: [{
              name: 'Test',
              y: 70.67,
              // sliced: true,
              selected: true,
              color: '#3fcb63'
          }, {
              name: 'Test 2',
              y: 14.77,
              color: '#f5cb2c'
          },  {
              name: 'Test 3',
              y: 4.86,
              color: '#e42517'
          }]
      }]
  });

</script>
<script type="text/javascript">
  // Data retrieved from https://netmarketshare.com
  Highcharts.chart('pie-technology', {
      chart: {
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false,
          type: 'pie',
          backgroundColor: null,
          margin: [0,0,0,0]
      },
      exporting: {
        enabled: false
      },
      title: {
          text: null,
          align: 'left'
      },
      tooltip: {
          pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      accessibility: {
          point: {
              valueSuffix: '%'
          }
      },
      plotOptions: {
          pie: {
              allowPointSelect: true,
              cursor: 'pointer',
              dataLabels: {
                  enabled: false,
                  format: '<b>{point.name}</b>: {point.percentage:.1f} %'
              }
          }
      },
      series: [{
          name: 'Brands',
          colorByPoint: true,
          data: [{
              name: 'Test',
              y: 70.67,
              // sliced: true,
              selected: true,
              color: '#3fcb63'
          }, {
              name: 'Test 2',
              y: 14.77,
              color: '#f5cb2c'
          },  {
              name: 'Test 3',
              y: 4.86,
              color: '#e42517'
          }]
      }]
  });

</script>
<script type="text/javascript">
  // Data retrieved from https://netmarketshare.com
  Highcharts.chart('pie-energize', {
      chart: {
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false,
          type: 'pie',
          backgroundColor: null,
          margin: [0,0,0,0]
      },
      exporting: {
        enabled: false
      },
      title: {
          text: null,
          align: 'left'
      },
      tooltip: {
          pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      accessibility: {
          point: {
              valueSuffix: '%'
          }
      },
      plotOptions: {
          pie: {
              allowPointSelect: true,
              cursor: 'pointer',
              dataLabels: {
                  enabled: false,
                  format: '<b>{point.name}</b>: {point.percentage:.1f} %'
              }
          }
      },
      series: [{
          name: 'Brands',
          colorByPoint: true,
          data: [{
              name: 'Test',
              y: 70.67,
              // sliced: true,
              selected: true,
              color: '#3fcb63'
          }, {
              name: 'Test 2',
              y: 14.77,
              color: '#f5cb2c'
          },  {
              name: 'Test 3',
              y: 4.86,
              color: '#e42517'
          }]
      }]
  });

</script>
<script type="text/javascript">
  // Data retrieved from https://netmarketshare.com
  Highcharts.chart('pie-talent', {
      chart: {
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false,
          type: 'pie',
          backgroundColor: null,
          margin: [0,0,0,0]
      },
      exporting: {
        enabled: false
      },
      title: {
          text: null,
          align: 'left'
      },
      tooltip: {
          pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      accessibility: {
          point: {
              valueSuffix: '%'
          }
      },
      plotOptions: {
          pie: {
              allowPointSelect: true,
              cursor: 'pointer',
              dataLabels: {
                  enabled: false,
                  format: '<b>{point.name}</b>: {point.percentage:.1f} %'
              }
          }
      },
      series: [{
          name: 'Brands',
          colorByPoint: true,
          data: [{
              name: 'Test',
              y: 70.67,
              // sliced: true,
              selected: true,
              color: '#3fcb63'
          }, {
              name: 'Test 2',
              y: 14.77,
              color: '#f5cb2c'
          },  {
              name: 'Test 3',
              y: 4.86,
              color: '#e42517'
          }]
      }]
  });

</script>
<!-- <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyBVxdDuDwdMa8Iq5FFZcrILAYyQ5zeVeXU'></script> -->

<!-- SLICK -->
<!-- <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script> -->
  <script src="lib/slick-1.8.1/slick/slick.js" type="text/javascript" charset="utf-8"></script>
  <!-- Modal -->
<div id='modal-template'>
    
</div>
<div id='modal-template-video'>
    
</div>
<script type="text/javascript">
  $(document).on('ready', function() {

    $("#slider-started").click(function () {
      cari= $("#search").val()  
      bln= parseInt($("#bln").val());
      thn= parseInt($("#thn").val());

      vurl= "app/index/kinerja_proyek?b="+bln+"&t="+thn+"&cari="+cari;
      if($("#slider-started").prop('checked')) 
      {
        vurl+= "&nt=1";
        // console.log("checked");
      }
      else
      {
        // console.log("not checked"); 
      }

      document.location.href= vurl;
    });

    $.ajax({
        url : 'json-api/KinerjaProyekAcn_json/sub?nt=<?=$nt?>&cari=<?=$cari?>',
        type : 'GET',
        dataType : 'text',
        success : function(text) {
            text= JSON.parse(text)
            $('#listStatusINITIATION').html(' Late ('+text["listStatusINITIATION"]+')');
            $('#listStatusEXECUTION').html(' Completed ('+text["listStatusEXECUTION"]+')');

            <?
            if(empty($nt))
            {
            ?>
            $('#listStatusDEVELOPMENT').html(' Not Started ('+text["listStatusDEVELOPMENT"]+')');
            <?
            }
            ?>

            $('#listStatusCOMPLETION').html(' On Schedule ('+text["listStatusCOMPLETION"]+')');
            $('#drawDetil').html(text["drawDetil"]);
            $('#modal-template').html(text['textPopup']);
            var locations = text['textPetaPembangkit'];
            // console.log(locations);
            var map = L.map('map').setView([-0.8917, 117.8707], 4);
            var OpenStreetMap_Mapnik = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            function addRowTable(code, coords){
              var tr = document.createElement("tr");
              var td = document.createElement("td");
              td.textContent = code;
              tr.appendChild(td);
              tr.onclick = function(){map.flyTo(coords, 17);};
            }
            var buffers = [];

            function addMarker(code,lat,lng,stagename){
              var pinColor = "FE7569";
              if(stagename=="Initiation")
              {
                pinColor="41ADF2";
              }
              else if(stagename=="Development")
              {
                pinColor="F88D28";
              }
              else if(stagename=="Execution")
              {
                pinColor="FF7D73";
              }
              else if(stagename=="Completion")
              {
                pinColor="17A31A";
              }

              let customIcon = {
                  iconUrl:"images/marker/marker"+pinColor.toUpperCase()+".png",
                  // iconUrl:"images/coba.png",
                  iconAnchor: [10, 34],
                   popupAnchor: [1, -34],
                  // iconSize:[20,40]
              }

              let myIcon = L.icon(customIcon);
              //let myIcon = L.divIcon();

              let iconOptions = {
                  // title:"company name",
                  // draggable:true,
                  icon:myIcon
              }

              var p = L.marker([lat,lng],iconOptions);
              // var p = L.marker([lat,lng]);
              p.title = code;
              p.alt = code;
              p.bindPopup(code);
              p.addTo(map);
              
              addRowTable(code, [lat,lng]);
              
              var c = L.circle([lat,lng], {
                color: pinColor,
                fillColor: '#f03',
                fillOpacity: 0.5,
                radius: 0
              }).addTo(map);
              
              buffers.push(c);
            }

            $(document).ready(function (){
              for (var i=0; i < locations.length; i++){
                addMarker(locations[i][0],locations[i][1],locations[i][2],locations[i][5]);
              }
            });

            L.control.scale({maxWidth:240, metric:true, position: 'bottomleft'}).addTo(map);

            $("#range").change(function(e){
              var radius = parseInt($(this).val())
              buffers.forEach(function(e){
                e.setRadius(radius);
                e.addTo(map);
              });
            });


            Highcharts.chart('pie-compliance', {
              chart: {
                  type: 'column',
                  height: (9 / 16 * 100) + '%',
                  backgroundColor: null,
                  style: {
                      color: '<?=$warna?>',
                      fontSize:15
                  },
              },
              title: {
                  align: 'center',
                  text: 'Ringkasan Status',
                  style: {
                      color: '<?=$warna?>'
                  },
              },
              exporting: {
                enabled: false
              },
              accessibility: {
                  announceNewData: {
                      enabled: true
                  }
              },
              xAxis: {
                  type: 'category',
                  labels: {
                      style: {
                        color: '<?=$warna?>',
                        fontSize:20
                      }
                    }
              },
              yAxis: {
                  title: {
                      text: '<span style="font-size:11px; color:<?=$warna?>"><b>JUMLAH</b></span><br>'
                  },
                  labels: {
                      style: {
                        color: '<?=$warna?>',
                      }
                    }
              },
              legend: {
                  enabled: false
              },


              plotOptions: {
                  series: {
                      borderWidth: 0,
                      dataLabels: {
                          enabled: true,
                          format: '<span style="font-size:11px"><b>{point.y}</b></span><br>',
                      }
                  },
                  style: {
                     color: "white"
                  },
              },

              tooltip: {
                  headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                  pointFormat: '<span style="color:{point.color}">{point.name}</span style="font-size:20px">: <b>{point.y}</b><br/>'
              },

              series: [
                  {
                    name: '',
                    colors: [
                        // '#db4349', '#6ec2e6', '#7987a0', '#0f7f12'
                        'skyblue'
                        , 'green'
                        , 'orange'
                        , '#FF7D73'
                    ],
                    colorByPoint: true,
                    data: [
                        ['<span style="font-size:9px"><b>INITIATION</b></span><br> ', text["listStatusINITIATION"]],
                        ['<span style="font-size:9px"><b>COMPLETION</b></span><br>', text["listStatusCOMPLETION"]],
                        <?
                        if(empty($nt))
                        {
                        ?>
                        ['<span style="font-size:9px"><b>DEVELOPMENT</b></span><br>', text["listStatusDEVELOPMENT"]],
                        <?
                        }
                        ?>
                        ['<span style="font-size:9px"><b>EXECUTION</b></span><br>', text["listStatusEXECUTION"]]
                    ],
                  }
              ]
              
            });

            $(".vertical").slick({
              dots: false,
              // arrows: false,
              vertical: true,
              slidesToShow: 4,
              slidesToScroll: 1,
              autoplay: true,
              autoplaySpeed: 2000
            });

            $('#vlsxloading').hide();
            showVideo(1);
        }
    });
    // $('#vlsxloading').hide();
  });

function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  // if(cityName.includes("Documentation")==false){
    
  // }
  // else
  // {
  if(cityName.includes("Documentation")==true){
    id=cityName.replace("Documentation", "");
    valProyekId=$("#proyekId"+id).val();
    pageSelect(1,cityName,valProyekId);
  }

  if(cityName.includes("Performance")==true){
    id=cityName.replace("Performance", "");
    valProyekId=$("#proyekId"+id).val();
    // console.log(valProyekId);
    // return false;
    pageSelectGrafik(1,cityName,id,valProyekId);
  }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  // }

}

function pageSelectGrafik(page,cityName,id,valProyekId){
  $('#vlsxloading').show();
  // console.log('xxx'); return false;

  if(cityName['id']==undefined){
    cityName=cityName
  }
  else{
    cityName=cityName['id'];
  }

  $.ajax({
    url : 'json-api/KinerjaProyekAcn_json/createGrafik?valProyekId='+valProyekId,
    type : 'GET',
    dataType : 'text',
    success : function(text) {
        text= JSON.parse(text);
        // console.log(text);
        // $('#'+cityName).html(text);
        Highcharts.chart('popupchart'+id, {
            title: {
                text: '',
            },
            xAxis: {
                categories: text["GarisX"],
                // categories: 'xxxx',
                labels: {
                  formatter () {
                    return `<span style="font-size:12px; color: #FFFFFF;">${this.value}</span>`
                  }
                }
            },
            yAxis: {
                title: {
                    text: ''
                },
                labels: {
                  formatter () {
                    return `<span style="font-size:12px; color: #FFFFFF;">${this.value}</span>`
                  }
                }
            },
            tooltip: {
                // valueSuffix: ' million liters'
              style: {
                fontSize:'12px'
              }
            },
            plotOptions: {
                series: {
                    borderRadius: '25%'
                }
            },
            legend: {
                labelFormat: '<span style="font-size:12px; color: #FFFFFF;">{name}</span>'
            },
            chart: {
                renderTo: 'containter',
                // borderWidth: 1,
                backgroundColor: null,
                height: 600,
            },
            series: [{
                type: 'column',
                name: 'Plan Monthly',
                data: text["plan_total_arr"].map(Number),
                color: 'pink',
                style: {
                  color: 'black',
               }        
            }, {
                type: 'column',
                name: 'Actual Monthly',
                data: text["act_total_arr"].map(Number),
                color: 'blue'
            }, {
                type: 'spline',
                step: 'center',
                name: 'Plan Accumulated',
                data: text["plan_line_arr"].map(Number),
                color: 'pink',
                marker: {
                    lineWidth: 2,
                    lineColor: Highcharts.getOptions().colors[3],
                    fillColor: 'red'
                }
            }, {
                type: 'spline',
                step: 'center',
                name: 'Actual Accumulated',
                data: text["act_line_arr"].map(Number),
                color: 'blue',
                marker: {
                    lineWidth: 2,
                    lineColor: Highcharts.getOptions().colors[3],
                    fillColor: 'red'
                }
            }]
        });
        $('#vlsxloading').hide();
    }
  })

}

function pageSelect(page,cityName,valProyekId){
  $('#vlsxloading').show();

  if(cityName['id']==undefined){
    cityName=cityName
  }
  else{
    cityName=cityName['id'];
  }

  $.ajax({
    url : 'json-api/KinerjaProyekAcn_json/documentation?setPage='+page+'&setcityName='+cityName+'&valProyekId='+valProyekId,
    type : 'GET',
    dataType : 'text',
    success : function(text) {
        text= JSON.parse(text);
        // console.log(text);
        $('#'+cityName).html(text);
        $('#vlsxloading').hide();
    }
  })

}

function cari(){
  cari= $("#search").val();  
  console.log(cari);
  bln= parseInt($("#bln").val());
  thn= parseInt($("#thn").val());
  vurl= "app/index/kinerja_proyek?b="+bln+"&t="+thn+"&cari="+cari;
  document.location.href= vurl;
}

// Using jQuery.

$(function() {
  $("#search").keypress(function(e) {
      // Enter pressed?
      if(e.which == 10 || e.which == 13) {
         cari();
      }
  });
});

function showVideo(page){

  $.ajax({
    url : 'json-api/KinerjaProyekAcn_json/subVideo?page='+page,
    type : 'GET',
    dataType : 'text',
    success : function(text) {
        text= JSON.parse(text);
        var scntDiv = document.getElementById('tbodyTable')
        var elm = $(text['table']).appendTo(scntDiv); 

        var scntDiv = document.getElementById('tfootTable')
        var elm = $(text['page']).appendTo(scntDiv); 
        
        $('#modal-template-video').html(text['textPopup']);
        $("#loading").hide();
        $("#datatable").show();

    }
  })
}

function gotopage(page){
  $(".tableVidio").hide();
  $(".page"+page).show();
}

function closepopup(val){
  $("#close-"+val).click();
  var video = document.getElementById('myVideo'+val);
  video.pause();
}
</script>

<!-- FANCYBOX -->
<script type="text/javascript" src="lib/fancyBox/source/jquery.fancybox.js?v=2.1.4"></script>
<link rel="stylesheet" type="text/css" href="lib/fancyBox/source/jquery.fancybox.css?v=2.1.4" media="screen" />
<script type="text/javascript">
  $(document).ready(function() {
    $('.fancybox').fancybox();
  });

</script>
<style type="text/css">
  .fancybox-custom .fancybox-skin {
    box-shadow: 0 0 50px #222;
  }
</style>

<style>
.switch-check {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch-check input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider-check {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider-check:before {
  position: absolute;
  content: "";
  height: 20px;
  width: 20px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider-check {
  background-color: #2196F3;
}

input:focus + .slider-check {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider-check:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

.slider-check.round {
  border-radius: 34px;
}

.slider-check.round:before {
  border-radius: 50%;
}

.area-peringatan-dini-proyek .slick-prev, .area-peringatan-dini-proyek .slick-next {
    top: -38px !important;
}
</style>
