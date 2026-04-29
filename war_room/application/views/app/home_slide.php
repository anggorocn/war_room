<?php
include_once("functions/string.func.php");
include_once("functions/date.func.php");
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

        <style type="text/css">
            section.home .area-peta-pembangkit,
            section.home .area-penjualan,
            section.home .area-kesiapan-pembangkit  {
                height: calc(50vh - 20px);
            }
            /*section.home .area-penjualan {
                height: calc(50vh - 20px);
            }
            section.home .area-kesiapan-pembangkit {
                height: calc(50vh - 20px);
            }*/
            section.home .area-kinerja-korporat {
                height: calc(50vh - 0px);
            }
            section.home .area-kinerja-keuangan-korporat {
                height: calc(50vh - 0px);
            }
            section.home .area-kpi-keuangan {
                height: calc(50vh - 0px);
            }
            section.home .area-kinerja-proyek {
                height: calc(50vh - 0px);
            }
        </style>
    </head>

    <body class="dark">

        <!-- Services Section Start -->
        <section id="services" class="services section-padding home">
            <div class="container-fluid">
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
                                        <a class="selengkapnya pull-right" href="app/index/peta_pembangkit"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="area-total-unit">
                                            <div class="ikon"><img src="images/icon-pembangkit.png"></div>
                                            <div class="nilai">151</div>
                                            <div class="title">Total Unit</div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="area-peta">
                                            <div class="judul"><i class="fa fa-map-marker" aria-hidden="true"></i> Peta Pembangkit</div>
                                            <div class="area-total-daya">
                                                <div class="inner">
                                                    <div class="item">
                                                        <div class="nilai">17775,23 MW</div>
                                                        <div class="title">Total Daya Terpasang</div>
                                                    </div>
                                                    <div class="item mampu">
                                                        <div class="nilai">15314,94 MW</div>
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
                                            <div class="inner">
                                                <div class="item">
                                                    <div class="title">PLTMH</div>
                                                    <div class="nilai">14 unit</div>
                                                </div>
                                                <div class="item">
                                                    <div class="title">PLTM</div>
                                                    <div class="nilai">7 unit</div>
                                                </div>
                                                <div class="item">
                                                    <div class="title">PLTD</div>
                                                    <div class="nilai">59 unit</div>
                                                </div>
                                                <div class="item">
                                                    <div class="title">PLTGU</div>
                                                    <div class="nilai">7 unit</div>
                                                </div>
                                                <div class="item">
                                                    <div class="title">PLTA</div>
                                                    <div class="nilai">21 unit</div>
                                                </div>
                                                <div class="item">
                                                    <div class="title">PLTG</div>
                                                    <div class="nilai">13 unit</div>
                                                </div>
                                                <div class="item">
                                                    <div class="title">PLTMG</div>
                                                    <div class="nilai">7 unit</div>
                                                </div>
                                                <div class="item">
                                                    <div class="title">PLTU</div>
                                                    <div class="nilai">23 unit</div>
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
                                    <label>Sumber data : <span>Navitas</span></label>
                                    <label>Last update : <span>4 Agustus 2023</span></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Services item -->
                    <div class="col-md-6 col-lg-4 col-xs-12">
                        <div class="services-item wow fadeInDown" data-wow-delay="0.4s">
                            <div class="area-penjualan">
                                <div class="judul">
                                    <span class="ikon"><img src="images/icon-penjualan.png"></span> Penjualan
                                    <a class="selengkapnya pull-right" href="app/index/penjualan"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a>
                                </div>
                                <div class="row inner">
                                    <div class="col-md-6 padding-none">
                                        <div class="item">
                                            <div class="caption">Pencapaian ROB (GWh)</div>
                                            <div class="title">Realisasi</div>
                                            <div class="nilai">17860.00</div>
                                            <div class="title">Target</div>
                                            <div class="nilai">17669.00</div>
                                            <div class="persen">
                                                <i class="fa fa-circle kuning" aria-hidden="true"></i>
                                                <div class="nilai">101,08%</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 padding-none">
                                        <div class="item">
                                            <div class="caption">Pencapaian ROM (GWh)</div>
                                            <div class="title">Realisasi</div>
                                            <div class="nilai">17860.00</div>
                                            <div class="title">Target</div>
                                            <div class="nilai">17669.00</div>
                                            <div class="persen">
                                                <i class="fa fa-circle hijau" aria-hidden="true"></i>
                                                <div class="nilai">101,08%</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 padding-none">
                                        <div class="item">
                                            <div class="caption">Pencapaian ROH (GWh)</div>
                                            <div class="title">Realisasi</div>
                                            <div class="nilai">17860.00</div>
                                            <div class="title">Target</div>
                                            <div class="nilai">17669.00</div>
                                            <div class="persen">
                                                <i class="fa fa-circle hijau" aria-hidden="true"></i>
                                                <div class="nilai">101,08%</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 padding-none">
                                        <div class="item">
                                            <div class="caption">Market Share PLN NP (%)</div>
                                            <div class="title">Realisasi</div>
                                            <div class="nilai">17860.00</div>
                                            <div class="title">Target</div>
                                            <div class="nilai">17669.00</div>
                                            <div class="persen">
                                                <i class="fa fa-circle merah" aria-hidden="true"></i>
                                                <div class="nilai">101,08%</div>
                                            </div>
                                        </div>
                                    </div>
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
                                    <label>Last update : <span>4 Agustus 2023</span></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Services item -->
                    <div class="col-md-6 col-lg-3 col-xs-12 padding-none">
                        <div class="services-item wow fadeInDown" data-wow-delay="0.6s">
                            <div class="area-kesiapan-pembangkit">
                                <div class="judul">
                                    <span class="ikon"><img src="images/icon-kesiapan-pembangkit.png"></span> Kesiapan Pembangkit
                                    <a class="selengkapnya pull-right" href="app/index/kesiapan_pembangkit"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a>
                                </div>
                                <div class="row inner">
                                    <div class="col-md-4 padding-none">
                                        <div class="item">
                                            <div class="grafik-progress" id="kesiapan-daya-mampu"></div>
                                            <div class="title">Daya Mampu Net</div>
                                            <div class="nilai">15017.84 MW</div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 padding-none">
                                        <div class="item">
                                            <div class="grafik-progress" id="kesiapan-normal-operasi"></div>
                                            <div class="title">Normal Operasi</div>
                                            <div class="nilai">9439.12 MW</div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 padding-none">
                                        <div class="item">
                                            <div class="grafik-progress" id="kesiapan-derating"></div>
                                            <div class="title">Derating</div>
                                            <div class="nilai">273.50 MW</div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 padding-none">
                                        <div class="item">
                                            <div class="grafik-progress" id="kesiapan-outage"></div>
                                            <div class="title">Outage</div>
                                            <div class="nilai">2305.82 MW</div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 padding-none">
                                        <div class="item">
                                            <div class="grafik-progress" id="kesiapan-standby"></div>
                                            <div class="title">Standby</div>
                                            <div class="nilai">2999.41 MW</div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 padding-none">
                                        <div class="item">
                                            <div class="grafik-progress" id="kesiapan-total"></div>
                                            <div class="title">Total Kesiapan</div>
                                            <div class="nilai">12438.53 MW</div>
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
                                    <label>Last update : <span>4 Agustus 2023</span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row services-wrapper">

                    <!-- Services item -->
                    <div class="col-md-6 col-lg-3 col-xs-12 padding-none">
                        <div class="services-item wow fadeInDown" data-wow-delay="0.8s">
                            <div class="area-kinerja-korporat">
                                <div class="judul">
                                    <span class="ikon"><img src="images/icon-kinerja-korporat.png"></span> Kinerja Korporat
                                    <a class="selengkapnya pull-right" href="app/index/kinerja_korporat"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a>
                                </div>
                                <div class="row inner">
                                    <div class="col-md-6">
                                        <div class="grafik-pie-kinerja-korporat" id="grafik-pie-kinerja-korporat"></div>
                                        <div class="keterangan">
                                            <div class="inner">
                                                <div class="title">Jumlah KPI</div>
                                                <div class="nilai">33</div>
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
                                                        <div class="nilai">14</div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="item">
                                                    <div class="tanda kuning">
                                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="data">
                                                        <div class="title">≥ 95% - ≤ 100%</div>
                                                        <div class="nilai">4</div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                
                                                <div class="item">
                                                    <div class="tanda merah">
                                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="data">
                                                        <div class="title"><95%</div>
                                                        <div class="nilai">9</div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                
                                                <div class="item">
                                                    <div class="tanda biru">
                                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="data">
                                                        <div class="title">On track</div>
                                                        <div class="nilai">0</div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                
                                                <div class="item">
                                                    <div class="tanda abu-abu">
                                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="data">
                                                        <div class="title">Belum dilakukan</div>
                                                        <div class="nilai">6</div>
                                                    </div>
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
                                    <label>Sumber data : <span>Navitas</span></label>
                                    <label>Last update : <span>4 Agustus 2023</span></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-6 col-xs-12">
                        <div class="row">

                            <!-- Services item -->
                            <div class="col-md-6 col-lg-7 col-xs-12">
                                <div class="services-item wow fadeInDown" data-wow-delay="1s">
                                    <div class="area-kinerja-keuangan-korporat">
                                        <div class="judul">
                                            <span class="ikon"><img src="images/icon-kinerja-keuangan-korporat.png"></span> Kinerja Keuangan Korporat <span class="keterangan">(Rp Trilliun)</span>
                                            <a class="selengkapnya pull-right" href="app/index/kinerja_keuangan_korporat"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a>
                                        </div>
                                        <div class="row inner">
                                            <div class="col-md-6 kiri">
                                                <div class="item">
                                                    <div class="data">
                                                        <div class="title">Laba (Rugi) Bersih</div>
                                                        <div class="nilai">9,08</div>
                                                        <div class="keterangan">USD 585 juta</div>
                                                    </div>
                                                    <div class="ikon">
                                                        <img src="images/icon-laba-rugi.png">
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>    
                                                <div class="item">
                                                    <div class="data">
                                                        <div class="title">Pendapatan Usaha</div>
                                                        <div class="nilai">62,49</div>
                                                        <div class="keterangan">USD 4,04 milyar</div>
                                                    </div>
                                                    <div class="ikon">
                                                        <img src="images/icon-pendapatan-usaha.png">
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>    
                                                <div class="item">
                                                    <div class="data">
                                                        <div class="title">Beban Usaha</div>
                                                        <div class="nilai">53,52</div>
                                                        <div class="keterangan">USD 3,44 milyar</div>
                                                    </div>
                                                    <div class="ikon">
                                                        <img src="images/icon-beban-usaha.png">
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>    
                                            </div>
                                            <div class="col-md-6">
                                                <div class="item">
                                                    <div class="data">
                                                        <div class="title">Aset Tetap</div>
                                                        <div class="nilai">265,58</div>
                                                        <div class="keterangan">USD 17,10 milyar</div>
                                                    </div>
                                                    <div class="ikon">
                                                        <img src="images/icon-aset.png">
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>    
                                                <div class="item">
                                                    <div class="data">
                                                        <div class="title">Piutang Usaha</div>
                                                        <div class="nilai">38,11</div>
                                                        <div class="keterangan">USD 2,45 milyar</div>
                                                    </div>
                                                    <div class="ikon">
                                                        <img src="images/icon-piutang-usaha.png">
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>    
                                                <div class="item">
                                                    <div class="data">
                                                        <div class="title">Saldo Kas</div>
                                                        <div class="nilai">1,64</div>
                                                        <div class="keterangan">USD 105 juta</div>
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
                                                <div class="keterangan-kurs">
                                                    Kurs USD per <span id=tgl_kurs_kinerjakeuangankorporat> </span> : Rp <span id=kurs_kinerjakeuangankorporat> </span>
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
                                            <label>Last update : <span>4 Agustus 2023</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Services item -->
                            <div class="col-md-6 col-lg-5 col-xs-12 padding-none">
                                <div class="services-item wow fadeInDown" data-wow-delay="1.2s">
                                    <div class="area-kpi-keuangan">
                                        <div class="judul">
                                            <span class="ikon"><img src="images/icon-kpi-keuangan.png"></span> KPI Keuangan
                                            <a class="selengkapnya pull-right" href="app/index/kpi_keuangan"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a>
                                        </div>
                                        <div class="inner">
                                            <div class="item">
                                                <div class="data">
                                                    <div class="title">BPP Pembangkit</div>
                                                    <div class="nilai">100%</div>
                                                </div>
                                                <div class="tanda hijau">
                                                    <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="item">
                                                <div class="data">
                                                    <div class="title">ROIC</div>
                                                    <div class="nilai">85.04%</div>
                                                </div>
                                                <div class="tanda kuning">
                                                    <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="item">
                                                <div class="data">
                                                    <div class="title">EBITDA</div>
                                                    <div class="nilai">110%</div>
                                                </div>
                                                <div class="tanda hijau">
                                                    <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="item">
                                                <div class="data">
                                                    <div class="title">Sinergi AP</div>
                                                    <div class="nilai">110%</div>
                                                </div>
                                                <div class="tanda hijau">
                                                    <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="item">
                                                <div class="data">
                                                    <div class="title">Pendapatan Diluar PLN Grup</div>
                                                    <div class="nilai">68.07%</div>
                                                </div>
                                                <div class="tanda merah">
                                                    <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                                </div>
                                                <div class="clearfix"></div>
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
                                            <label>Last update : <span>4 Agustus 2023</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Services item -->
                    <div class="col-md-6 col-lg-3 col-xs-12 padding-none">
                        <div class="services-item wow fadeInDown" data-wow-delay="1.4s">
                            <div class="area-kinerja-proyek">
                                <div class="judul">
                                    <span class="ikon"><img src="images/icon-kinerja-proyek.png"></span> Kinerja Proyek
                                    <a class="selengkapnya pull-right" href="app/index/kinerja_proyek"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a>
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
                                                    <div class="data">Late (7)</div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="item on-schedule">
                                                    <div class="tanda"><i class="fa fa-circle" aria-hidden="true"></i></div>
                                                    <div class="data">On Schedule (0)</div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="item not-started">
                                                    <div class="tanda"><i class="fa fa-circle" aria-hidden="true"></i></div>
                                                    <div class="data">Not Started (9)</div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="item completed">
                                                    <div class="tanda"><i class="fa fa-circle" aria-hidden="true"></i></div>
                                                    <div class="data">Completed (4)</div>
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
                                    <label>Sumber data : <span>Navitas</span></label>
                                    <label>Last update : <span>4 Agustus 2023</span></label>
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
                text: `<div class=persentase>100%</div>`,
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
        </script>

        <script type="text/javascript">
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
                text: `<div class=persentase>100%</div>`,
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
        </script>

        <script type="text/javascript">
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
                text: `<div class=persentase>100%</div>`,
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
        </script>

        <script type="text/javascript">
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
                text: `<div class=persentase>100%</div>`,
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
        </script>

        <script type="text/javascript">
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
                text: `<div class=persentase>100%</div>`,
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
        </script>

        <script type="text/javascript">
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
                text: `<div class=persentase>100%</div>`,
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
        </script>



        <script type="text/javascript">
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
                    pointFormat: 'Population in 2021: <b>{point.y:.1f} millions</b>'
                },
                series: [{
                    name: 'Population',
                    colors: [
                        '#db4349', '#6ec2e6', '#7987a0', '#0f7f12'
                    ],
                    colorByPoint: true,
                    groupPadding: 0,
                    data: [
                        ['Late ', 7],
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


        </script>

        <script type="text/javascript">
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
