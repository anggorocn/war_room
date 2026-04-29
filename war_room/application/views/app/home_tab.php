<?php
include_once("functions/string.func.php");
include_once("functions/date.func.php");

$vtoday= getFormattedDate(date("Y-m-d"));
$this->load->model("base-admin/Page");


$apppageroleid=$this->apppageroleid;
$apppagerolekode=$this->apppagerolekode;
$appusernama=$this->appusernama;
$appuserkodehak=$this->appuserkodehak;

if(empty($apppageroleid))
{
     redirect("app/index/landing");
}

$b = $this->input->get("b");
$t = $this->input->get("t");

$bsebelum= "";
if(empty($b))
{
  $b=date("m");
  $b--;
  $bsebelum = $b;
  if($b == 0)
  {
    $b= 1;
  }
}

if(empty($t))
{
  $t=date("Y");

  if($bsebelum == 0) $t--;
}

$set= new Page();
$set->selectByParamsMenus(array(),-1,-1," AND MENU = 1 AND IS_DETIL IS NULL",$apppagerolekode);
// echo $set->query;exit;
$arrMenu=[];
while($set->nextRow())
{
    $arrdata= [];
    $arrdata["ID"]= $set->getField("KODE_MODUL");
    $arrdata["ID_PARENT"]= $set->getField("LEVEL_MODUL");
    $arrdata["NAMA"]= $set->getField("MENU_MODUL");
    $arrdata["NAMA_GROUP"]= $set->getField("GROUP_MODUL");
    $arrdata["LINK_MODUL"]= $set->getField("LINK_MODUL");
    $arrdata["IDMODUL"]= $set->getField("IDMODUL");
    array_push($arrMenu, $arrdata);
}

if(empty($arrMenu))
{
     redirect("app/index/landing");
}

$arridkolom=array_column($arrMenu, 'IDMODUL');
$arridkolom = array_map(function ($el) { return str_replace("Index", "", $el);}, $arridkolom);

//buat redirect jika tidak ada akses home
$adahome=0;
if( in_array( "01" ,array_column($arrMenu, 'ID') ) )
{
  $adahome=1;
}
else
{

  $filtered = array_filter($arrMenu, function ($val) { return $val['LINK_MODUL'] !== '#'; });
  $filtered = array_values(array_filter($filtered));
  if(!empty($filtered))
  {
    $linkredir=$filtered[0]["LINK_MODUL"];
    if(!empty($linkredir))
    {
      redirect("app/index/".$linkredir."?b=".$b."&t=".$t."");
    }
  }    
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- <link rel="icon" href="../../favicon.ico"> -->

        <title>Dashboard | PT PLN Nusantara Power</title>
        <base href="<?=base_url();?>" />

        <!-- Bootstrap core CSS -->
        <link href="assets/bootstrap-3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="assets/bootstrap-3.3.7/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <!-- <link href="assets/bootstrap-3.3.7/docs/examples/starter-template/starter-template.css" rel="stylesheet"> -->

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="assets/bootstrap-3.3.7/docs/assets/js/ie-emulation-modes-warning.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <script src='js/jquery.min.js'></script>

        <link rel="stylesheet" type="text/css" href="css/gaya.css">
        <link rel="stylesheet" type="text/css" href="lib/font-awesome-4.7.0/css/font-awesome.css">
    </head>

    <body class="dark">

<!-- Services Section Start -->
<section id="services" class="services section-padding home">
    <div class="container-fluid">
        <ul class="nav nav-tabs nav-home">
          <li class="active"><a data-toggle="tab" href="#home">Page 1</a></li>
          <li><a data-toggle="tab" href="#menu1">Page 2</a></li>
        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <div class="row services-wrapper">
            
                    <!-- Services item -->
                    <div class="col-md-6 col-lg-5 col-xs-12 padding-none">
                        <div class="services-item wow fadeInDown" data-wow-delay="0.2s">
                            <div class="area-peta-pembangkit">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="logo-pln-np"><img src="images/logo.png"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <a class="selengkapnya pull-right" id="detilpetapembangkit" href="javascript:void(0)"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="area-total-unit">
                                            <div class="ikon"><img src="images/icon-pembangkit.png"></div>
                                            <div class="nilai" id='TotalUnit'></div>
                                            <div class="title">Total Unit</div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="area-peta">
                                            <div class="judul"><i class="fa fa-map-marker" aria-hidden="true"></i> Peta Pembangkit</div>
                                            <div class="area-total-daya">
                                                <div class="inner">
                                                    <div class="item">
                                                        <div class="nilai" id='TotalDayaTerpasang'></div>
                                                        <div class="title">Total Daya Terpasang</div>
                                                    </div>
                                                    <div class="item mampu">
                                                        <div class="nilai" id='TotalDayaMampu'></div>
                                                        <div class="title">Total Daya Mampu</div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="area-jenis-pembangkit">
                                            <div class="inner"  id='TextJenisPembangkit'>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-md-12">
                                        <div class="area-sumber-data">
                                            <label>Sumber data : <span>Navitas</span></label>
                                            <label>Last update : <span>4 Agustus 2023</span></label>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="area-sumber-data">
                                    <label>Sumber data : <span>Navitas</span></label>
                                    <label>Last update : <span><?=$vtoday?></span></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Services item -->
                    <!-- <div class="col-md-6 col-lg-7 col-xs-12 padding-none"> -->
                    <div class="col-md-6 col-lg-7 col-xs-12">
                        <div class="services-item wow fadeInDown" data-wow-delay="0.4s">
                            <div class="area-kesiapan-pembangkit area-realtime">
                                <div class="judul">
                                    <span class="ikon"><img src="images/icon-kesiapan-pembangkit.png"></span> Kesiapan Pembangkit
                                    <a class="selengkapnya pull-right" id="detilkesiapanpembangkit" href="javascript:void(0)"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a>
                                </div>
                                <div class="row inner">
                                    <div class="col-md-2 padding-none">
                                        <div class="item">
                                            <div class="grafik-progress" id="kesiapan-daya-mampu"></div>
                                            <div class="title">Daya Mampu Net</div>
                                            <div class="nilai" id='mw_dmn'></div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 padding-none">
                                        <div class="item">
                                            <div class="grafik-progress" id="kesiapan-normal-operasi"></div>
                                            <div class="title">Normal Operasi</div>
                                            <div class="nilai" id='mw_normal_operasi'></div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 padding-none">
                                        <div class="item">
                                            <div class="grafik-progress" id="kesiapan-derating"></div>
                                            <div class="title">Derating</div>
                                            <div class="nilai" id='mw_derating_operasi'></div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 padding-none">
                                        <div class="item">
                                            <div class="grafik-progress" id="kesiapan-outage"></div>
                                            <div class="title">Outage</div>
                                            <div class="nilai" id='mw_outage'></div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 padding-none">
                                        <div class="item">
                                            <div class="grafik-progress" id="kesiapan-standby"></div>
                                            <div class="title">Standby</div>
                                            <div class="nilai"id='mw_standby'></div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 padding-none">
                                        <div class="item">
                                            <div class="grafik-progress" id="kesiapan-total"></div>
                                            <div class="title">Total Kesiapan</div>
                                            <div class="nilai"id='mw_total_kesiapan'></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="area-sumber-data">
                                    <label>Sumber data : <span>Navitas</span></label>
                                    <label>Last update : <span id='tgl_entri_kesiapanpembangkit'>4 Agustus 2023</span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row services-wrapper">

                    <!-- Services item -->
                    <div class="col-md-6 col-lg-9 col-xs-12">
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-xs-12">
                                <div class="services-item wow fadeInDown" data-wow-delay="0.6s">

                                    <div class="area-kinerja-proyek-bdd-bdg">
                                        <div class="judul">
                                            <span class="ikon"><img src="images/icon-kesiapan-pembangkit.png"></span> Kinerja Proyek BDD
                                            <a class="selengkapnya pull-right" id="" href="javascript:void(0)"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a>
                                        </div>
                                        <div class="row inner">
                                            <div class="col-md-12 padding-none">
                                                <div class="grafik-pie" id="container-pie-kinerja-proyek-bdd"></div>
                                            </div>
                                        </div>
                                        <div class="area-sumber-data">
                                            <label>Sumber data : <span>Navitas</span></label>
                                            <label>Last update : <span id='tgl_entri_kesiapanpembangkit'>4 Agustus 2023</span></label>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xs-12">
                                <div class="services-item wow fadeInDown" data-wow-delay="0.8s">

                                    <div class="area-kinerja-proyek-bdd-bdg">
                                        <div class="judul">
                                            <span class="ikon"><img src="images/icon-kesiapan-pembangkit.png"></span> Kinerja Proyek BDG
                                            <a class="selengkapnya pull-right" id="" href="javascript:void(0)"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a>
                                        </div>
                                        <div class="row inner">
                                            <div class="col-md-12 padding-none">
                                                <div class="grafik-pie" id="container-pie-kinerja-proyek-bdg"></div>
                                            </div>
                                        </div>
                                        <div class="area-sumber-data">
                                            <label>Sumber data : <span>Navitas</span></label>
                                            <label>Last update : <span id='tgl_entri_kesiapanpembangkit'>4 Agustus 2023</span></label>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- <div class="col-md-6 col-lg-6 col-xs-12 padding-none" style="border: 1px solid cyan;">
                                <div class="services-item wow fadeInDown" data-wow-delay="0.8s">
                                    <div class="area-kinerja-proyek-bdd-bdg">
                                        <div class="grafik-pie" id="container-pie-kinerja-proyek-bdg"></div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    
                    <!-- Services item -->
                    <div class="col-md-6 col-lg-3 col-xs-12 padding-none">
                        <div class="services-item wow fadeInDown" data-wow-delay="1.4s">
                            <div class="area-kinerja-proyek">
                                <div class="judul">
                                    <span class="ikon"><img src="images/icon-kinerja-proyek.png"></span> Kinerja Proyek
                                    <a class="selengkapnya pull-right" id="detilkinerjaproyek" href="javascript:void(0)"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a>
                                </div>
                                <div class="row inner">
                                    <div class="col-md-5 padding-none">
                                        <div class="gambar">
                                            <img src="images/img-kinerja-proyek.png">
                                        </div>
                                    </div>
                                    <div class="col-md-7 padding-none">
                                        <div class="grafik-kinerja-proyek" id="grafik-kinerja-proyek"></div>
                                        <div class="area-legend">
                                            <div class="inner">
                                                <div class="item late">
                                                    <div class="tanda"><i class="fa fa-circle" aria-hidden="true"></i></div>
                                                    <div class="data"  id='listStatusLate'>Late</div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="item warning-kinerja">
                                                    <div class="tanda"><i class="fa fa-circle" aria-hidden="true"></i></div>
                                                    <div class="data"  id='listStatusWarning'>Warning</div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="item on-schedule">
                                                    <div class="tanda"><i class="fa fa-circle" aria-hidden="true"></i></div>
                                                    <div class="data" id='listStatusOnSchedule'>On Schedule</div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="item not-started">
                                                    <div class="tanda"><i class="fa fa-circle" aria-hidden="true"></i></div>
                                                    <div class="data" id='listStatusNotStarted'>Not Started</div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="item completed">
                                                    <div class="tanda"><i class="fa fa-circle" aria-hidden="true"></i></div>
                                                    <div class="data" id='listStatusCompleted'>Completed</div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- <div class="row">
                                    <div class="col-md-12">
                                        <div class="area-sumber-data">
                                            <label>Sumber data : <span>Navitas</span></label>
                                            <label>Last update : <span>4 Agustus 2023</span></label>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="area-sumber-data">
                                    <label>Sumber data : <span>Prime</span></label>
                                    <label>Last update : <span id='updated_at_kinerjaproyek'><?=$vtoday?></span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!------------ TAB 2 ------------>
            <div id="menu1" class="tab-pane fade ">
                <div class="row services-wrapper">

                    <div class="col-md-9 col-lg-9 col-xs-12 padding-none">
                        <div class="row">
                            <!-- Services item -->
                            <div class="col-md-6 col-lg-6 col-xs-12">
                                <div class="services-item wow fadeInDown" data-wow-delay="0.4s">
                                    <div class="area-penjualan">
                                        <div class="judul">
                                            <span class="ikon"><img src="images/icon-penjualan.png"></span> Penjualan
                                            <a class="selengkapnya pull-right" id="detilpenjualan" href="javascript:void(0)"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a>
                                        </div>
                                        <div class="row inner" id='textPenjualan'>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="legend-penjualan">
                                                    <i class="fa fa-circle hijau" aria-hidden="true"></i> ≥ 100%          
                                                    <i class="fa fa-circle kuning" aria-hidden="true"></i> ≥ 95% - < 100%          
                                                    <i class="fa fa-circle merah" aria-hidden="true"></i> < 95%
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="area-sumber-data">
                                            <label>Sumber data : <span>Navitas</span></label>
                                            <label>Last update : <span id='tgl_entri_penjualan'>4 Agustus 2023</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Services item -->
                            <div class="col-md-6 col-lg-6 col-xs-12 padding-none">
                                <div class="services-item wow fadeInDown" data-wow-delay="0.6s">
                                    <div class="area-kinerja-korporat" style="margin-right: 15px;">
                                        <div class="judul">
                                            <span class="ikon"><img src="images/icon-kinerja-korporat.png"></span> Kinerja Korporat
                                            <a class="selengkapnya pull-right" id="detilkinerjakorporat" href="javascript:void(0)"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a>
                                        </div>
                                        <div class="row inner">
                                            <div class="col-md-6">
                                                <div class="grafik-pie-kinerja-korporat" id="grafik-pie-kinerja-korporat"></div>
                                                <div class="keterangan">
                                                    <div class="inner">
                                                        <div class="title">Jumlah KPI</div>
                                                        <div class="nilai" id='totalKpi'></div>
                                                    </div>
                                                </div>
                                                <div class="keterangan-nko">
                                                    <div class="inner">
                                                        <div class="title">NKO</div>
                                                        <div class="nilai">102.17</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="area-legend">
                                                    <div class="inner">
                                                        <div class="item">
                                                            <div class="tanda hijau">
                                                                <i class="fa fa-circle" aria-hidden="true"></i>
                                                            </div>
                                                            <div class="data">
                                                                <div class="title">≥ 100%</div>
                                                                <div class="nilai" id='listStatus100' style="text-align:right;">14</div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="tanda kuning">
                                                                <i class="fa fa-circle" aria-hidden="true"></i>
                                                            </div>
                                                            <div class="data">
                                                                <div class="title">≥ 95% - ≤ 100%</div>
                                                                <div class="nilai" id="listStatus95" style="text-align:right;">4</div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        
                                                        <div class="item">
                                                            <div class="tanda merah">
                                                                <i class="fa fa-circle" aria-hidden="true"></i>
                                                            </div>
                                                            <div class="data">
                                                                <div class="title"><95%</div>
                                                                <div class="nilai" id='listStatus90' style="text-align:right;">9</div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="tanda abu-abu">
                                                                <i class="fa fa-circle" aria-hidden="true"></i>
                                                            </div>
                                                            <div class="data">
                                                                <div class="title">Belum dilakukan</div>
                                                                <div class="nilai" id="listStatusBelumPenilaian" style="text-align:right;">6</div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="area-sumber-data">
                                            <label>Sumber data : <span>PBR</span></label>
                                            <label>Last update : <span><?=$vtoday?></span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>        
                        </div>
                        <div class="row">
                            <!-- Services item -->
                            <div class="col-md-6 col-lg-6 col-xs-12">
                                <div class="services-item wow fadeInDown" data-wow-delay="1s">
                                    <div class="area-kinerja-keuangan-korporat">
                                        <div class="judul">
                                            <span class="ikon"><img src="images/icon-kinerja-keuangan-korporat.png"></span> Kinerja Keuangan Korporat <span class="keterangan">(Rp Triliun)</span><a class="selengkapnya pull-right" id="detilkinerjakeuangankorporat" href="javascript:void(0)"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a>
                                        </div>
                                        <div class="row inner">
                                            <div class="col-md-6 kiri">
                                                <div class="item">
                                                    <div class="data">
                                                        <div class="title" id='LabaRugiKategori'>Laba Rugi</div>
                                                        <div class="nilai" id='LabaRugirealisasi'></div> 
                                                        <div class="keterangan" id='LabaRugiAlt'></div>
                                                    </div>
                                                    <div class="ikon">
                                                        <img src="images/icon-laba-rugi.png">
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>    
                                                <div class="item">
                                                    <div class="data">
                                                        <div class="title" id='PendapatanUsahaKategori'>Pendapatan Usaha</div>
                                                        <div class="nilai" id='PendapatanUsaharealisasi'></div> 
                                                        <div class="keterangan" id='PendapatanUsahaAlt'></div>
                                                    </div>
                                                    <div class="ikon">
                                                        <img src="images/icon-pendapatan-usaha.png">
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>    
                                                <div class="item">
                                                    <div class="data">
                                                        <div class="title" id='BebanUsahaKategori'>Beban Usaha</div>
                                                        <div class="nilai" id='BebanUsaharealisasi'></div>
                                                        <div class="keterangan" id='BebanUsahaAlt'></div>
                                                    </div>
                                                    <div class="ikon">
                                                        <img src="images/icon-beban-usaha.png">
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>    
                                            </div>
                                            <div class="col-md-6 kanan">
                                                <div class="item">
                                                    <div class="data">
                                                        <div class="title" id='AsetKategori'>Aset</div>
                                                        <div class="nilai" id='Asetrealisasi'></div>
                                                        <div class="keterangan" id='AsetAlt'></div>
                                                    </div>
                                                    <div class="ikon">
                                                        <img src="images/icon-aset.png">
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>    
                                                <div class="item">
                                                    <div class="data">
                                                        <div class="title" id='PiutangUsahaKategori'>Piutang Usaha</div>
                                                        <div class="nilai" id='PiutangUsaharealisasi'></div>
                                                        <div class="keterangan" id='PiutangUsahaAlt'></div>
                                                    </div>
                                                    <div class="ikon">
                                                        <img src="images/icon-piutang-usaha.png">
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>    
                                                <div class="item">
                                                    <div class="data">
                                                        <div class="title" id='SaldoKasKategori'>Saldo Kas</div>
                                                        <div class="nilai" id='SaldoKasrealisasi'></div>
                                                        <div class="keterangan" id='SaldoKasAlt'></div>
                                                    </div>
                                                    <div class="ikon">
                                                        <img src="images/icon-saldo-kas.png">
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>    
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="keterangan-kurs">Kurs USD per <span id=tgl_kurs_kinerjakeuangankorporat> </span> : Rp <span id=kurs_kinerjakeuangankorporat> </span></div>
                                            </div>
                                        </div>
                                        <div class="area-sumber-data">
                                            <label>Sumber data : <span>PBR</span></label>
                                            <label>Last update : <span id='tgl_entri_kinerjakeuangankorporat'>4 Agustus 2023</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Services item -->
                            <div class="col-md-6 col-lg-6 col-xs-12 padding-none">
                                <div class="services-item wow fadeInDown" data-wow-delay="1.2s">
                                    <div class="area-kpi-keuangan">
                                        <div class="judul">
                                            <span class="ikon"><img src="images/icon-kpi-keuangan.png"></span> KPI Keuangan
                                            <a class="selengkapnya pull-right" id="detilkpikeuangan" href="javascript:void(0)"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a>
                                        </div>
                                        <div class="inner" id='textKeuangan'>
                                        </div>
                                        <div class="area-sumber-data">
                                            <label>Sumber data : <span>PBR</span></label>
                                            <label>Last update : <span id='tgl_entri_KPIKeuangan'></span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-3 col-lg-3 col-xs-12 padding-none">
                        <div class="area-realisasi-ai">
                            <div class="judul">
                                <span class="ikon"><img src="images/icon-kpi-keuangan.png"></span> Realisasi AI
                                <a class="selengkapnya pull-right" id="detilkpikeuangan" href="javascript:void(0)"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a>
                            </div>
                            <div class="inner">
                                <div class="data-angka">
                                    <div class="judul">
                                        Penyerapan AI <br>
                                        s/d <span class='globalonebulan'></span> <span class='globalonetahun'></span> 
                                    </div>
                                    <div class="isi">
                                        <div class="item">
                                            <div class="title">Total terkontrak </div>
                                            <div class="nilai" id='total_terkontrak'></div>
                                            <div class="keterangan">dari Penetapan RKAP <span class='globalonetahun'></div>
                                        </div>
                                        <div class="item">
                                            <div class="title">Total terdisburse</div>
                                            <div class="nilai" id='total_terdisburse'></div>
                                            <div class="keterangan">dari Penetapan RKAP <span class='globalonetahun'></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="data-grafik">
                                    <div class="judul">
                                        Persentase Ketercapaian
                                        AI AKI 
                                        <div class="keterangan">per Oktober 2023 terhadap target 2023 </div>
                                    </div>
                                    <div class="grafik" id="container-persentase-ketercapaian"></div>
                                </div>
                            </div>
                            <div class="area-sumber-data">
                                <label>Sumber data : <span>PBR</span></label>
                                <label>Last update : <span id='tgl_entri_KPIKeuangan'></span></label>
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
    // Create the chart
    Highcharts.chart('kesiapan-daya-mampu', {
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
        text: `<div class=persentase id=persentase-kesiapan-daya-mampu>100%</div>`,
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
          y: 100,
          color: '#40c29c'
        }, {
          name: 'Belum Progress',
          y: 0,
        }]
      }],
    });

    // Create the chart
    Highcharts.chart('kesiapan-normal-operasi', {
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
        text: `<div class=persentase id=persentase-kesiapan-normal-operasi>100%</div>`,
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
          y: 100,
          color: '#40c29c'
        }, {
          name: 'Belum Progress',
          y: 0,
        }]
      }],
    });

    // Create the chart
    Highcharts.chart('kesiapan-derating', {
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
        text: `<div class=persentase id=persentase_derating_operasi>100%</div>`,
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
          y: 100,
          color: '#40c29c'
        }, {
          name: 'Belum Progress',
          y: 0,
        }]
      }],
    });

    // Create the chart
    Highcharts.chart('kesiapan-outage', {
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
        text: `<div class=persentase id=persentase_outage_operasi>100%</div>`,
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
          y: 100,
          color: '#40c29c'
        }, {
          name: 'Belum Progress',
          y: 0,
        }]
      }],
    });

    // Create the chart
    Highcharts.chart('kesiapan-standby', {
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
        text: `<div class=persentase id=persentase_mw_standby>100%</div>`,
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
          y: 100,
          color: '#40c29c'
        }, {
          name: 'Belum Progress',
          y: 0,
        }]
      }],
    });

    // Create the chart
    Highcharts.chart('kesiapan-total', {
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
        text: `<div class=persentase id='persentase_total_kesiapan'>100%</div>`,
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
          y: 100,
          color: '#40c29c'
        }, {
          name: 'Belum Progress',
          y: 0,
        }]
      }],
    });

    Highcharts.chart('grafik-kinerja-proyek', {
        chart: {
            type: 'column',
            backgroundColor: null,
            margin: [0,22,0,22]
        },
        exporting: {
            enabled: false
        },
        title: {
            text: null
        },
        subtitle: {
            text: null
        },
        xAxis: {
            type: 'category',
            labels: {
                autoRotation: [-45, -90],
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                },
                enabled: false
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: null
            },
            labels: {
                enabled: false
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: '<b>{point.y:.1f} Proyek </b>'
        },
        series: [{
            name: 'Jumlah Status Proyek',
            colors: [
                // '#db4349', '#6ec2e6', '#7987a0', '#0f7f12'
                '#FF0000', '#FFFF00', '#008000', '#808080', '#0000FF'
            ],
            colorByPoint: true,
            groupPadding: 0,
            data: [
                ['Late ', 7],
                ['Warning ', 7],
                ['On Schedule', 1],
                ['Not Started', 9],
                ['Completed', 4]
            ],
            dataLabels: {
                enabled: false,
                rotation: -90,
                color: '#FFFFFF',
                align: 'right',
                format: '{point.y:.1f}', // one decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });
    
    // Data retrieved from https://netmarketshare.com
    Highcharts.chart('grafik-pie-kinerja-korporat', {
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
                },
                borderWidth: 0
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: '≥ 100%',
                y: 14,
                // sliced: true,
                selected: true,
                color: '#22b55d'
            }, {
                name: '≥ 95% - ≤ 100%',
                y: 4,
                color: '#fdc02f'
            },  {
                name: '<95%',
                y: 9,
                color: '#d93749'
            }, {
                name: 'On track',
                y: 1,
                color: '#136df6'
            }, {
                name: 'On track',
                y: 6,
                color: '#7987a0'
            }]
        }]
    });

</script>

<script>
    // bln= parseInt($("#bln").val());
    // thn= parseInt($("#thn").val());
    bln= "<?=$b?>";
    thn= "<?=$t?>";
    // console.log(bln+"-"+thn);

    $(document).ready(function() {
        $("#detilkinerjakorporat, #detilpetapembangkit, #detilpenjualan, #detilkesiapanpembangkit, #detilkinerjakeuangankorporat, #detilkpikeuangan, #detilkinerjaproyek").on('click',function(){
            vbuttonid= $(this).attr('id');
            // bln= parseInt($("#bln").val());
            // thn= parseInt($("#thn").val());

            var arridkolom= <?php echo json_encode($arridkolom); ?>;
            // console.log(vbuttonid);
            // console.log(arridkolom);

            if(jQuery.inArray(vbuttonid, arridkolom) != -1) {
                // console.log("is in array");
            } else {
                alert("Anda tidak mempunyai hak akses ke halaman ini");return false;
            } 

            vurl= infoid= "";
            if(vbuttonid == "detilkinerjakorporat")
            {
                infoid= "Indexdetilkinerjakorporat";
                // vurl= "app/index/kinerja_korporat?b="+bln+"&t="+thn;
            }
            else if(vbuttonid == "detilpetapembangkit")
            {
                infoid= "Indexdetilpetapembangkit";
                // vurl= "app/index/peta_pembangkit?b="+bln+"&t="+thn;
            }
            else if(vbuttonid == "detilpenjualan")
            {
                infoid= "Indexdetilpenjualan";
                // vurl= "app/index/penjualan?b="+bln+"&t="+thn;
            }
            else if(vbuttonid == "detilkesiapanpembangkit")
            {
                infoid= "Indexdetilkesiapanpembangkit";
                // vurl= "app/index/kesiapan_pembangkit?b="+bln+"&t="+thn;
            }
            else if(vbuttonid == "detilkinerjakeuangankorporat")
            {
                infoid= "Indexdetilkinerjakeuangankorporat";
                // vurl= "app/index/kinerja_keuangan_korporat?b="+bln+"&t="+thn;
            }
            else if(vbuttonid == "detilkpikeuangan")
            {
                infoid= "Indexdetilkpikeuangan";
                // vurl= "app/index/kpi_keuangan?b="+bln+"&t="+thn;
            }
            else if(vbuttonid == "detilkinerjaproyek")
            {
                infoid= "Indexdetilkinerjaproyek";
                // vurl= "app/index/kinerja_proyek?b="+bln+"&t="+thn;
            }

            if(vurl !== "")
            {
                // document.location.href= vurl;
            }

            if(infoid !== "")
            {
                if (window.parent && window.parent.document)
                {
                    if (typeof window.parent.menudetil === 'function')
                    {
                        parent.menudetil(infoid);
                    }
                }
            }

        });

        // bln= parseInt($("#bln").val());
        PetaPembangkit();
        KesiapanPembangkit();
        KinerjaProyek();
        Penjualan();
        KinerjaProyekBdd();
        KinerjaProyekBdg();
        RalisasiAi();
        // KinerjaKorporat();
        // KinerjaKeuanganKorporat();
        // KPIKeuangan();
        $("#bln,#thn").on('change',function(){
            bln= parseInt($("#bln").val());
            thn= parseInt($("#thn").val());

            $('#vlsxloading').show();
            modifyUrl('Dashboard | PT PLN Nusantara Power', 'app?b='+bln+'&t='+thn);

            Penjualan()
            KinerjaProyekBdd();
            KinerjaProyekBdg();
            RalisasiAi();
            // KinerjaKorporat();
            // KinerjaKeuanganKorporat();
            // KPIKeuangan();

            $('#vlsxloading').hide();
        });
    })

    function PetaPembangkit(){
        $.ajax({
            url : 'json-api/PetaPembangkit_json/home',
            type : 'GET',
            dataType : 'text',
            success : function(text) {
                text= JSON.parse(text)
                $('#TotalUnit').html(text['TotalUnit']);
                $('#TotalDayaTerpasang').html(text['TotalDayaTerpasang']);
                $('#TotalDayaMampu').html(text['TotalDayaMampu']);
                $('#TextJenisPembangkit').html(text['TextJenisPembangkit']);
            }
        });
    }

    function Penjualan(){
        $.ajax({
            url : 'json-api/Penjualan_json/home?bln='+bln+'&thn='+thn,
            type : 'GET',
            dataType : 'text',
            success : function(text) {
                text= JSON.parse(text)
                $('#textPenjualan').html(text['textPenjualan']);
                $('#tgl_entri_penjualan').html(text['tgl_entri_penjualan']);

                KinerjaKorporat();
            }
        });
    }

    function KesiapanPembangkit(){
        $.ajax({
            url : 'json-api/KesiapanPembangkit_json/home',
            type : 'GET',
            dataType : 'text',
            success : function(text) {
                text= JSON.parse(text)
                $('#mw_dmn').html(text['mw_dmn']);
                $('#persentase-kesiapan-daya-mampu').html(text['per_dmn']+" %");
                $('#mw_normal_operasi').html(text['mw_normal_operasi']);
                $('#persentase-kesiapan-normal-operasi').html(text['per_normal_operasi']+" %");
                $('#mw_derating_operasi').html(text['mw_derating_operasi']);
                $('#persentase_derating_operasi').html(text['per_derating_operasi']+" %");
                $('#mw_outage').html(text['mw_outage']);
                $('#persentase_outage_operasi').html(text['per_outage_operasi']+" %");
                $('#mw_standby').html(text['mw_standby']);
                $('#persentase_mw_standby').html(text['per_mw_standby']+" %");
                $('#mw_total_kesiapan').html(text['mw_total_kesiapan']);
                $('#persentase_total_kesiapan').html(text['per_total_kesiapan']+" %");
                $('#tgl_entri_kesiapanpembangkit').html(text['tgl_entri_kesiapanpembangkit']);

                persen=parseFloat(text['per_dmn']);
                 if(persen >= 95){
                // hijau
                    warna='#47ce6b';
                } else if(persen >= 85 && persen < 95){
                // kuning
                    warna='#f6cd2f';
                } else{
                // merah
                    warna='#ce3453';
                }

                sisa=100-parseFloat(text['per_dmn']);
                chart1 = $('#kesiapan-daya-mampu').highcharts();
                chart1.series[0].update({
                    data: [{
                      name: 'Progress',
                      y: parseFloat(text['per_dmn']),
                      color: warna
                    }, {
                      name: 'Belum Progress',
                      y: sisa,
                      color: 'gray'
                    }],
                    }, false);
                chart1.redraw();

                persen=parseFloat(text['per_normal_operasi']);
                 if(persen >= 95){
                // hijau
                    warna='#47ce6b';
                } else if(persen >= 85 && persen < 95){
                // kuning
                    warna='#f6cd2f';
                } else{
                // merah
                    warna='#ce3453';
                }
                sisa=100-parseFloat(text['per_normal_operasi']);
                chart1 = $('#kesiapan-normal-operasi').highcharts();
                chart1.series[0].update({
                    data: [{
                      name: 'Progress',
                      y: parseFloat(text['per_normal_operasi']),
                      color: warna
                    }, {
                      name: 'Belum Progress',
                      y: sisa,
                      color: 'gray'
                    }],
                    }, false);
                chart1.redraw();

                persen=parseFloat(text['per_derating_operasi']);
                 if(persen >= 95){
                // hijau
                    warna='#47ce6b';
                } else if(persen >= 85 && persen < 95){
                // kuning
                    warna='#f6cd2f';
                } else{
                // merah
                    warna='#ce3453';
                }
                sisa=100-parseFloat(text['per_derating_operasi']);
                chart1 = $('#kesiapan-derating').highcharts();
                chart1.series[0].update({
                      data: [{
                      name: 'Progress',
                      y: parseFloat(text['per_derating_operasi']),
                      color: warna
                    }, {
                      name: 'Belum Progress',
                      y: sisa,
                      color: 'gray'
                    }],
                    }, false);
                chart1.redraw();

                persen=parseFloat(text['per_outage_operasi']);
                 if(persen >= 95){
                // hijau
                    warna='#47ce6b';
                } else if(persen >= 85 && persen < 95){
                // kuning
                    warna='#f6cd2f';
                } else{
                // merah
                    warna='#ce3453';
                }
                sisa=100-parseFloat(text['per_outage_operasi']);
                chart1 = $('#kesiapan-outage').highcharts();
                chart1.series[0].update({
                      data: [{
                      name: 'Progress',
                      y: parseFloat(text['per_outage_operasi']),
                      color: warna
                    }, {
                      name: 'Belum Progress',
                      y: sisa,
                      color: 'gray'
                    }],
                    }, false);
                chart1.redraw();

                persen=parseFloat(text['per_mw_standby']);
                 if(persen >= 95){
                // hijau
                    warna='#47ce6b';
                } else if(persen >= 85 && persen < 95){
                // kuning
                    warna='#f6cd2f';
                } else{
                // merah
                    warna='#ce3453';
                }
                sisa=100-parseFloat(text['per_mw_standby']);
                chart1 = $('#kesiapan-standby').highcharts();
                chart1.series[0].update({
                      data: [{
                      name: 'Progress',
                      y: parseFloat(text['per_mw_standby']),
                      color: warna
                    }, {
                      name: 'Belum Progress',
                      y: sisa,
                      color: 'gray'
                    }],
                    }, false);
                chart1.redraw();

                persen=parseFloat(text['per_total_kesiapan']);
                 if(persen >= 95){
                // hijau
                    warna='#47ce6b';
                } else if(persen >= 85 && persen < 95){
                // kuning
                    warna='#f6cd2f';
                } else{
                // merah
                    warna='#ce3453';
                }
                sisa=100-parseFloat(text['per_total_kesiapan']);
                chart1 = $('#kesiapan-total').highcharts();
                chart1.series[0].update({
                    data: [{
                      name: 'Progress',
                      y: parseFloat(text['per_total_kesiapan']),
                      color: warna
                    }, {
                      name: 'Belum Progress',
                      y: sisa,
                      color: 'gray'
                    }],
                    }, false);
                chart1.redraw();
            }
        });
    }
    
    function KinerjaKeuanganKorporat(){
        $.ajax({
            url : 'json-api/KinerjaKeuanganKorporat_json/home?bln='+bln+'&thn='+thn,
            type : 'GET',
            dataType : 'text',
            success : function(text) {
                text= JSON.parse(text)
                // alert(text["LabaRugi"]['realisasi_alt']);
                $('#LabaRugiKategori').html(text["LabaRugi"]['kategori']);
                $('#LabaRugirealisasi').html(text["LabaRugi"]['realisasi']);
                $('#LabaRugiAlt').html(text["LabaRugi"]['realisasi_alt']);
                $('#AsetKategori').html(text["Aset"]['kategori']);
                $('#Asetrealisasi').html(text["Aset"]['realisasi']);
                $('#AsetAlt').html(text["Aset"]['realisasi_alt']);
                $('#PendapatanUsahaKategori').html(text["PendapatanUsaha"]['kategori']);
                $('#PendapatanUsaharealisasi').html(text["PendapatanUsaha"]['realisasi']);
                $('#PendapatanUsahaAlt').html(text["PendapatanUsaha"]['realisasi_alt']);
                $('#PiutangUsahaKategori').html(text["PiutangUsaha"]['kategori']);
                $('#PiutangUsaharealisasi').html(text["PiutangUsaha"]['realisasi']);
                $('#PiutangUsahaAlt').html(text["PiutangUsaha"]['realisasi_alt']);
                $('#BebanUsahaKategori').html(text["BebanUsaha"]['kategori']);
                $('#BebanUsaharealisasi').html(text["BebanUsaha"]['realisasi']);
                $('#BebanUsahaAlt').html(text["BebanUsaha"]['realisasi_alt']);
                $('#SaldoKasKategori').html(text["SaldoKas"]['kategori']);
                $('#SaldoKasrealisasi').html(text["SaldoKas"]['realisasi']);
                $('#SaldoKasAlt').html(text["SaldoKas"]['realisasi_alt']);
                $('#tgl_entri_kinerjakeuangankorporat').html(text['tgl_entri_kinerjakeuangankorporat']);
                $('#tgl_kurs_kinerjakeuangankorporat').html(text['tgl_kurs_kinerjakeuangankorporat']);
                $('#kurs_kinerjakeuangankorporat').html(text['kurs_kinerjakeuangankorporat']);

                KPIKeuangan();
            }        
        });
    }

    function KPIKeuangan(){
        $.ajax({
            url : 'json-api/KPIKeuangan_json/home?bln='+bln+'&thn='+thn,
            type : 'GET',
            dataType : 'text',
            success : function(text) {
                text= JSON.parse(text)
                $('#textKeuangan').html(text["textKeuangan"]);
                $('#tgl_entri_KPIKeuangan').html(text["tgl_entri"]);

                
                // $('#vlsxloading').hide();

                if (window.parent && window.parent.document)
                {
                    if (typeof window.parent.vlsxloading === 'function')
                    {
                        parent.vlsxloading("");
                    }

                    if (typeof window.parent.setplayreset === 'function')
                    {
                        // parent.setplayreset();
                    }
                }
            }        
        });
    }

    function KinerjaProyek(){
        $.ajax({
            url : 'json-api/KinerjaProyek_json/home',
            type : 'GET',
            dataType : 'text',
            success : function(text) {
                text= JSON.parse(text)
                $('#listStatusLate').html('Late ('+text["listStatusLate"]+')');
                $('#listStatusWarning').html('Warning ('+text["listStatusWarning"]+')');
                $('#listStatusCompleted').html('Completed ('+text["listStatusCompleted"]+')');
                $('#listStatusNotStarted').html('Not Started ('+text["listStatusNotStarted"]+')');
                $('#listStatusOnSchedule').html('On Schedule ('+text["listStatusOnSchedule"]+')');
                // $('#updated_at_kinerjaproyek').html(text["updated_at_kinerjaproyek"]);

                $('#updated_at_kinerjaproyek').html("<?=$vtoday?>");

                chart1 = $('#grafik-kinerja-proyek').highcharts();
                chart1.series[0].update({
                    data: [['Late ', text["listStatusLate"]],['Warning ', text["listStatusWarning"]],['On Schedule', text["listStatusOnSchedule"]],['Not Started', text["listStatusNotStarted"]],['Completed', text["listStatusCompleted"]]]
                    }, false);
                chart1.redraw();
            }        
        });
    }

    function KinerjaKorporat(){
        $.ajax({
            url : 'json-api/KinerjaKorporat_json/home?bln='+bln+'&thn='+thn,
            type : 'GET',
            dataType : 'text',
            success : function(text) {
                text= JSON.parse(text)
                $('#listStatusBelumPenilaian').html(text["listStatusBelumPenilaian"]);
                $('#listStatus100').html(text["listStatus100"]);
                $('#listStatus95').html(text["listStatus95"]);
                $('#listStatus90').html(text["listStatus90"]);
                $('#totalKpi').html(text["totalKpi"]);

                chart1 = $('#grafik-pie-kinerja-korporat').highcharts();
                chart1.series[0].update({
                    data: [{
                        name: '≥ 100%',
                        y: text["listStatus100"],
                        // sliced: true,
                        selected: true,
                        color: '#22b55d'
                    }, {
                        name: '≥ 95% - ≤ 100%',
                        y: text["listStatus95"],
                        color: '#fdc02f'
                    },  {
                        name: '<95%',
                        y: text["listStatus90"],
                        color: '#d93749'
                    }, {
                        name: 'Belum Dilakukan',
                        y: text["listStatusBelumPenilaian"],
                        color: '#7987a0'
                    }]
                    }, false);
                chart1.redraw();

                KinerjaKeuanganKorporat();
            }        
        });
    }

    function KinerjaProyekBdd(){
        $.ajax({
            url : 'json-api/ProyekBDD_json/home?bln='+bln+'&thn='+thn,
            type : 'GET',
            dataType : 'text',
            success : function(text) {
                text= JSON.parse(text)
                chart1 = $('#container-pie-kinerja-proyek-bdd').highcharts();
                chart1.series[0].update({
                    data: [{
                        name: 'WORK EXECUTION',
                        y: text["StatusWorkExecution"],
                        // sliced: true,
                        selected: true,
                        color: 'gray'
                    }, {
                        name: 'NO GO/CANCELED/LOST',
                        y: text["StatusCanceled"],
                        color: 'red'
                    },  {
                        name: 'PROPOSAL PREPARATION',
                        y: text["StatusProposalPreparation"],
                        color: 'skyblue'
                    }, {
                        name: 'BID PROCESS',
                        y: text["StatusBidProcess"],
                        color: 'blue'
                    }, {
                        name: 'DONE',
                        y: text["StatusDone"],
                        color: 'darkgreen'
                    }]
                    }, false);
                chart1.redraw();
            }
        });
    }

    function KinerjaProyekBdg(){
        $.ajax({
            url : 'json-api/ProyekBDG_json/home?bln='+bln+'&thn='+thn,
            type : 'GET',
            dataType : 'text',
            success : function(text) {
                text= JSON.parse(text)
                chart1 = $('#container-pie-kinerja-proyek-bdg').highcharts();
                chart1.series[0].update({
                    data: [{
                        name: 'Belum Ada Progress',
                        y: text["StatusBelumAdaProgress"],
                        // sliced: true,
                        selected: true,
                        color: 'gray'
                    }, {
                        name: 'Development',
                        y: text["StatusDevelopment"],
                        color: 'red'
                    },  {
                        name: 'GRC',
                        y: text["StatusGRC"],
                        color: 'skyblue'
                    }, {
                        name: 'KKP oleh PLN',
                        y: text["StatusKKPolehPLN"],
                        color: 'blue'
                    }, {
                        name: 'Konstruksi',
                        y: text["StatusKonstruksi"],
                        color: 'darkgreen'
                    }, {
                        name: 'Pre-FS/FS',
                        y: text["StatusPreFS"],
                        color: 'pink'
                    }]
                    }, false);
                chart1.redraw();
                  $('#vlsxloading').hide();
            }
        });
    }

    function RalisasiAi(){
          $.ajax({
              url : 'json-api/RealisasiAi_json/home?bln='+bln+'&thn='+thn,
              type : 'GET',
              dataType : 'text',
              success : function(text) {
                text= JSON.parse(text);

                $(".globalonebulan").text(text['bulan']);
                $(".globalonetahun").text(thn);
                // for(i=0;i<=15;i++){
                    // $('#periode'+i).html(text['bulan']+ ' '+thn);
                // }
                console.log(text[0]['penetapan_ai']);
                for(i=0;i<4;i++){
                    penetapan_ai=parseFloat(text[i]['penetapan_ai']);
                    penetapan_aki=parseFloat(text[i]['penetapan_aki']);
                    realisasi_ai=parseFloat(text[i]['realisasi_ai']);
                    realisasi_aki=parseFloat(text[i]['realisasi_aki']);
                    prognosa_ai=parseFloat(text[i]['prognosa_ai']);
                    prognosa_aki=parseFloat(text[i]['prognosa_aki']);

                    persen_ai=(text[i]['realisasi_ai']/text[i]['penetapan_ai'])*100;
                    persen_aki=(text[i]['realisasi_aki']/text[i]['penetapan_aki'])*100;
                    persen_prognosa_ai=(text[i]['prognosa_ai']/text[i]['penetapan_ai'])*100;
                    persen_prognosa_aki=(text[i]['prognosa_aki']/text[i]['penetapan_aki'])*100;
                }

                // pengembangan start
                total_penetapan_ai=parseInt(text[0]['penetapan_ai'])+parseInt(text[1]['penetapan_ai']);

                total_penetapan_aki=parseInt(text[0]['penetapan_aki'])+parseInt(text[1]['penetapan_aki']);

                total_realisasi_ai=parseInt(text[0]['realisasi_ai'])+parseInt(text[1]['realisasi_ai']);

                total_realisasi_aki=parseInt(text[0]['realisasi_aki'])+parseInt(text[1]['realisasi_aki']);

                total_prognosa_ai=parseInt(text[0]['prognosa_ai'])+parseInt(text[1]['prognosa_ai']);

                total_prognosa_aki=parseInt(text[0]['prognosa_aki'])+parseInt(text[1]['prognosa_aki']);

                avg_persen_ai=(total_realisasi_ai/total_penetapan_ai)*100;
                val_grafik_ai_1=avg_persen_ai;

                avg_persen_aki=(total_realisasi_aki/total_penetapan_aki)*100;
                val_grafik_aki_1=avg_persen_aki;

                avg_persen_prognosa_ai=(total_prognosa_ai/total_penetapan_ai)*100;

                avg_persen_prognosa_aki=(total_prognosa_aki/total_penetapan_aki)*100;

                // pengembangan end

                // penguatan start

                total_penetapan_ai=parseInt(text[2]['penetapan_ai'])+parseInt(text[3]['penetapan_ai']);

                total_penetapan_aki=parseInt(text[2]['penetapan_aki'])+parseInt(text[3]['penetapan_aki']);

                total_realisasi_ai=parseInt(text[2]['realisasi_ai'])+parseInt(text[3]['realisasi_ai']);

                total_realisasi_aki=parseInt(text[2]['realisasi_aki'])+parseInt(text[3]['realisasi_aki']);

                total_prognosa_ai=parseInt(text[2]['prognosa_ai'])+parseInt(text[3]['prognosa_ai']);

                total_prognosa_aki=parseInt(text[2]['prognosa_aki'])+parseInt(text[3]['prognosa_aki']);

                avg_persen_ai=(total_realisasi_ai/total_penetapan_ai)*100;
                val_grafik_ai_2=avg_persen_ai;

                avg_persen_aki=(total_realisasi_aki/total_penetapan_aki)*100;
                val_grafik_aki_2=avg_persen_aki;

                avg_persen_prognosa_ai=(total_prognosa_ai/total_penetapan_ai)*100;

                avg_persen_prognosa_aki=(total_prognosa_aki/total_penetapan_aki)*100;

                // penguatan end 

                penetapan_ai=parseInt(text[0]['penetapan_ai'])+parseInt(text[1]['penetapan_ai'])+parseInt(text[2]['penetapan_ai'])+parseInt(text[3]['penetapan_ai']);

                penetapan_aki=parseInt(text[0]['penetapan_aki'])+parseInt(text[1]['penetapan_aki'])+parseInt(text[2]['penetapan_aki'])+parseInt(text[3]['penetapan_aki']);

                total_realisasi_ai=parseInt(text[0]['realisasi_ai'])+parseInt(text[1]['realisasi_ai'])+parseInt(text[2]['realisasi_ai'])+parseInt(text[3]['realisasi_ai']);
                $('#total_terkontrak').html('Rp'+total_realisasi_ai.toLocaleString('de-DE')+" M");

                total_realisasi_aki=parseInt(text[0]['realisasi_aki'])+parseInt(text[1]['realisasi_aki'])+parseInt(text[2]['realisasi_aki'])+parseInt(text[3]['realisasi_aki']);
                $('#total_terdisburse').html('Rp'+total_realisasi_aki.toLocaleString('de-DE')+" M");

                total_prognosa_ai=parseInt(text[0]['prognosa_ai'])+parseInt(text[1]['prognosa_ai'])+parseInt(text[2]['prognosa_ai'])+parseInt(text[3]['prognosa_ai']);

                total_prognosa_aki=parseInt(text[0]['prognosa_aki'])+parseInt(text[1]['prognosa_aki'])+parseInt(text[2]['prognosa_aki'])+parseInt(text[3]['prognosa_aki']);

                total_penetapan_ai=parseInt(text[0]['penetapan_ai'])+parseInt(text[1]['penetapan_ai'])+parseInt(text[2]['penetapan_ai'])+parseInt(text[3]['penetapan_ai']);
                avg_persen_ai=(total_realisasi_ai/total_penetapan_ai)*100;
                val_grafik_ai_3=avg_persen_ai;

                total_penetapan_aki=parseInt(text[0]['penetapan_aki'])+parseInt(text[1]['penetapan_aki'])+parseInt(text[2]['penetapan_aki'])+parseInt(text[3]['penetapan_aki']);
                avg_persen_aki=(total_realisasi_aki/total_penetapan_aki)*100;
                val_grafik_aki_3=avg_persen_aki;

                avg_prognosa_ai=(total_prognosa_ai/total_penetapan_ai)*100;

                avg_prognosa_aki=(total_prognosa_aki/total_penetapan_aki)*100;

                Highcharts.chart('container-persentase-ketercapaian', {
                      chart: {
                        type: 'column',
                        backgroundColor: null
                      },
                      exporting: {
                        enabled: false
                      },
                      title: {
                        text: null,
                        align: 'left'
                      },
                      subtitle: {
                        text: null,
                        align: 'left'
                      },
                      xAxis: {
                        categories: ['Pengembangan Usaha', 'Penguatan Pembangkit', 'Total'],
                        crosshair: true,
                        accessibility: {
                          description: 'Countries'
                        },
                        labels: {
                            // autoRotation: [-45, -90],
                            style: {
                                fontSize: '12px',
                                // fontFamily: 'Verdana, sans-serif',
                                color: 'white'
                            },
                            // enabled: false
                        }
                      },
                      yAxis: {
                        min: 0,
                        title: {
                          text: null
                        },
                        labels: {
                            enabled: false
                        },
                        gridLineColor: 'transparent',

                      },
                      tooltip: {
                        valueSuffix: ''
                      },
                      plotOptions: {
                        column: {
                          pointPadding: 0.2,
                          borderWidth: 0
                        },
                        series: {
                            dataLabels: {
                              enabled: true,
                              formatter: function() {
                               return Highcharts.numberFormat(this.y) + '%';
                              }
                            }
                          }
                      },
                      series: [{
                            name: 'AI',
                            data: [parseFloat(val_grafik_ai_1.toFixed(2)),parseFloat(val_grafik_ai_2.toFixed(2)),parseFloat(val_grafik_ai_3.toFixed(2))],
                            color: "#03a9f4"
                        }, {
                            name: 'AKI',
                            data: [parseFloat(val_grafik_aki_1.toFixed(2)),parseFloat(val_grafik_aki_2.toFixed(2)),parseFloat(val_grafik_aki_3.toFixed(2))],
                            color: "#66a2a3"
                        }],
                      legend: {
                        itemStyle: {
                            color: '#FFFFFF',
                            fontWeight: 'bold',
                            fontSize: '12px',
                        }
                      }
                    });

                $('#vlsxloading').hide();
              }        
          });
      }
</script>

<!-- PIE KINERJA PROYEK BDD -->
<script type="text/javascript">
    Highcharts.chart('container-pie-kinerja-proyek-bdd', {
      chart: {
        type: 'pie',
        backgroundColor: null
      },
      exporting: {
        enabled: false
      },
      title: {
        text: null
      },
      tooltip: {
        valueSuffix: '%'
      },
      subtitle: {
        text: null
      },
      plotOptions: {
        pie: {
            showInLegend: true
        },
        series: {
          allowPointSelect: true,
          cursor: 'pointer',
          dataLabels: [{
            enabled: true,
            distance: 20
          }, {
            enabled: true,
            distance: -40,
            format: '{point.percentage:.1f}%',
            style: {
              fontSize: '1.2em',
              textOutline: 'none',
              opacity: 0.7
            },
            filter: {
              operator: '>',
              property: 'percentage',
              value: 10
            }
          }]
        }
      },
      legend: {
        align: 'right',
        verticalAlign: 'top',
        layout: 'vertical',
        x: -70,
        y: 20,
        itemStyle: {
             fontSize:'12px',
             // font: '35pt Trebuchet MS, Verdana, sans-serif',
             color: '#FFFFFF'
          },
          // itemHoverStyle: {
          //    color: '#FFF'
          // },
          // itemHiddenStyle: {
          //    color: '#444'
          // }
    },
      series: [
        {
          name: 'Percentage',
          colorByPoint: true,
          data: [
            {
              name: 'WORK EXECUTION ',
              y: 0,
              color: '#808080'
            },
            {
              name: 'NO GO/CANCELED/LOST ',
              sliced: true,
              selected: true,
              y: 0,
              color: '#cc3755'
            },
            {
              name: 'PROPOSAL PREPARATION ',
              y: 0,
              color: '#6ac1e5'
            },
            {
              name: 'BID PROCESS ',
              y: 0,
              color: '#0b24fb'
            },
            {
              name: 'DONE ',
              y: 0,
              color: '#4ecc6f'
            }
          ]
        }
      ]
    });
</script>

<!-- PIE KINERJA PROYEK BDG -->
<script type="text/javascript">
    Highcharts.chart('container-pie-kinerja-proyek-bdg', {
      chart: {
        type: 'pie',
        backgroundColor: null
      },
      exporting: {
        enabled: false
      },
      title: {
        text: null
      },
      tooltip: {
        valueSuffix: '%'
      },
      subtitle: {
        text: null
      },
      plotOptions: {
        pie: {
            showInLegend: true
        },
        series: {
          allowPointSelect: true,
          cursor: 'pointer',
          dataLabels: [{
            enabled: true,
            distance: 20
          }, {
            enabled: true,
            distance: -40,
            format: '{point.percentage:.1f}%',
            style: {
              fontSize: '1.2em',
              textOutline: 'none',
              opacity: 0.7
            },
            filter: {
              operator: '>',
              property: 'percentage',
              value: 10
            }
          }]
        }
      },
      legend: {
        align: 'right',
        verticalAlign: 'top',
        layout: 'vertical',
        x: -70,
        y: 20,
        itemStyle: {
             fontSize:'12px',
             // font: '35pt Trebuchet MS, Verdana, sans-serif',
             color: '#FFFFFF'
          },
          // itemHoverStyle: {
          //    color: '#FFF'
          // },
          // itemHiddenStyle: {
          //    color: '#444'
          // }
    },
      series: [
        {
          name: 'Percentage',
          colorByPoint: true,
          data: [
            {
              name: 'Belum Ada Progress  ',
              y: 0,
              color: '#808080'
            },
            {
              name: 'Development  ',
              sliced: true,
              selected: true,
              y: 0,
              color: '#cc3755'
            },
            {
              name: 'GRC  ',
              y: 0,
              color: '#6ac1e5'
            },
            {
              name: 'KKP oleh PLN  ',
              y: 0,
              color: '#0b24fb'
            },
            {
              name: 'Konstruksi  ',
              y: 0,
              color: '#4ecc6f'
            },
            {
              name: 'Pre-FS / FS   ',
              y: 0,
              color: '#fec0cb'
            }

          ]
        }
      ]
    });
</script>

<script type="text/javascript">
    
</script>

<!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
        <script>window.jQuery || document.write('<script src="assets/bootstrap-3.3.7/docs/assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="assets/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="assets/bootstrap-3.3.7/docs/assets/js/ie10-viewport-bug-workaround.js"></script>

    </body>
</html>
