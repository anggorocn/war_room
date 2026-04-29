<?php
include_once("functions/string.func.php");
include_once("functions/date.func.php");
$arrPetaPembangkit = json_decode(file_get_contents('http://192.168.3.116/Pbr_kinerja_operasi/'),true);
$arrJenisPembangkit=array();
$arrJenisPembangkitTotal=array();
for($i; $i<count($arrPetaPembangkit['data']);$i++){
 if(array_search($arrPetaPembangkit['data'][$i]['jenis_pembangkit'],$arrJenisPembangkit)==''){
    array_push($arrJenisPembangkit,$arrPetaPembangkit['data'][$i]['jenis_pembangkit']);
    array_push($arrJenisPembangkitTotal,'0');
 }
 else{
    $arrJenisPembangkitTotal[array_search($arrPetaPembangkit['data'][$i]['jenis_pembangkit'],$arrJenisPembangkit)]=    $arrJenisPembangkitTotal[array_search($arrPetaPembangkit['data'][$i]['jenis_pembangkit'],$arrJenisPembangkit)]+1;
 }
}

?>


<!-- Services Section Start -->
<section id="services" class="services section-padding">
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
                                    <div class="nilai"><?=count($arrPetaPembangkit['data'])?></div>
                                    <div class="title">Total Unit</div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="area-peta">
                                    <div class="judul"><i class="fa fa-map-marker" aria-hidden="true"></i> Peta Pembangkit</div>
                                    <div class="area-total-daya">
                                        <div class="inner">
                                            <div class="item">
                                                <div class="nilai"><?=$arrPetaPembangkit['total_daya'][0]['total_daya_terpasang']?> MW</div>
                                                <div class="title">Total Daya Terpasang</div>
                                            </div>
                                            <div class="item mampu">
                                                <div class="nilai"><?=$arrPetaPembangkit['total_daya'][0]['total_daya_mampu']?> MW</div>
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
                                        <?for($i=1; $i<count($arrJenisPembangkit);$i++){?>
                                        <div class="item">
                                            <div class="title"><?=$arrJenisPembangkit[$i]?></div>
                                            <div class="nilai"><?=$arrJenisPembangkitTotal[$i]?> unit</div>
                                        </div>
                                        <?}?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
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
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <div class="nilai">101,08%</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 padding-none">
                                <div class="item">
                                    <div class="caption">Pencapaian ROB (GWh)</div>
                                    <div class="title">Realisasi</div>
                                    <div class="nilai">17860.00</div>
                                    <div class="title">Target</div>
                                    <div class="nilai">17669.00</div>
                                    <div class="persen">
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <div class="nilai">101,08%</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 padding-none">
                                <div class="item">
                                    <div class="caption">Pencapaian ROB (GWh)</div>
                                    <div class="title">Realisasi</div>
                                    <div class="nilai">17860.00</div>
                                    <div class="title">Target</div>
                                    <div class="nilai">17669.00</div>
                                    <div class="persen">
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <div class="nilai">101,08%</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 padding-none">
                                <div class="item">
                                    <div class="caption">Pencapaian ROB (GWh)</div>
                                    <div class="title">Realisasi</div>
                                    <div class="nilai">17860.00</div>
                                    <div class="title">Target</div>
                                    <div class="nilai">17669.00</div>
                                    <div class="persen">
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <div class="nilai">101,08%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="area-sumber-data">
                                    <label>Sumber data : <span>Navitas</span></label>
                                    <label>Last update : <span>4 Agustus 2023</span></label>
                                </div>
                            </div>
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="area-sumber-data">
                                    <label>Sumber data : <span>Navitas</span></label>
                                    <label>Last update : <span>4 Agustus 2023</span></label>
                                </div>
                            </div>
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
                                    <span class="ikon"><img src="images/icon-kinerja-keuangan-korporat.png"></span> Kinerja Keuangan Korporat
                                    <a class="selengkapnya pull-right" href="app/index/kinerja_keuangan_korporat"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a>
                                </div>
                                <div class="row inner">
                                    <div class="col-md-6">
                                        <div class="item">
                                            <div class="data">
                                                <div class="title">Laba Rugi</div>
                                                <div class="nilai">2.6</div>
                                            </div>
                                            <div class="ikon">
                                                <img src="images/icon-laba-rugi.png">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>    
                                        <div class="item">
                                            <div class="data">
                                                <div class="title">Pendapatan Usaha</div>
                                                <div class="nilai">13.24</div>
                                            </div>
                                            <div class="ikon">
                                                <img src="images/icon-pendapatan-usaha.png">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>    
                                        <div class="item">
                                            <div class="data">
                                                <div class="title">Beban Usaha</div>
                                                <div class="nilai">10.78</div>
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
                                                <div class="title">Aset</div>
                                                <div class="nilai">265.16</div>
                                            </div>
                                            <div class="ikon">
                                                <img src="images/icon-aset.png">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>    
                                        <div class="item">
                                            <div class="data">
                                                <div class="title">Piutang Usaha</div>
                                                <div class="nilai">30.81</div>
                                            </div>
                                            <div class="ikon">
                                                <img src="images/icon-piutang-usaha.png">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>    
                                        <div class="item">
                                            <div class="data">
                                                <div class="title">Saldo Kas</div>
                                                <div class="nilai">3.08</div>
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
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="area-sumber-data">
                                            <label>Sumber data : <span>Navitas</span></label>
                                            <label>Last update : <span>4 Agustus 2023</span></label>
                                        </div>
                                    </div>
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="area-sumber-data">
                                    <label>Sumber data : <span>Navitas</span></label>
                                    <label>Last update : <span>4 Agustus 2023</span></label>
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
