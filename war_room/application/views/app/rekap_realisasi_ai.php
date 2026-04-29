<?php
include_once("functions/string.func.php");
include_once("functions/date.func.php");
$b = $this->input->get("b");
$t = $this->input->get("t");

if(empty($b)) $b=date("m");
if(empty($t)) $t=date("Y");
?>

<link rel="stylesheet" type="text/css" href="lib/slick-1.8.1/slick/slick.css">
<link rel="stylesheet" type="text/css" href="lib/slick-1.8.1/slick/slick-theme.css">
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
  margin: 0px 20px 0px 0px;
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
</style>

<!-- Services Section Start -->
<section id="services" class="services section-padding">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="area-breadcrumb pull-left">
                    <ul class="breadcrumb">
                    <li><a href="app"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                    <!-- <li><a href="#">Peta Pembangkit</a></li>
                    <li><a href="#">Summer 15</a></li> -->
                    <li>Rekap Realisasi AI</li>
                    </ul> 
                </div>
            </div>

            <div class="col-md-12">
                <div class="area-wrapper" style="min-height: 0;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="header-detil">
                                <!-- <div class="logo-pln-np pull-left"><img src="images/logo.png"></div>     -->
                                <div class="judul">
                                    <span class="ikon"><img src="images/icon-kesiapan-pembangkit.png"></span> Rekap Realisasi AI Periode sd 
                                    <span class='globalonebulan'></span> <span class='globalonetahun'></span> <span class="keterangan">(dalam Rp Miliar)</span>
                                    <!-- <a class="selengkapnya pull-right" href="app/index/penjualan"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="area-rekap-realisasi-ai">
                                <section class="regular slider">
                                    <div>
                                        <div class="judul-item">Pengembangan Usaha</div>
                                        <div class="item">
                                            <div class="wrapper-sub-item">
                                                <div class="sub-item">
                                                    <div class="caption">Lanjutan</div>
                                                    <div class="inner">
                                                        <div class="title">Penetapan RKAP <span class='globalonetahun'></span></div>
                                                        <div class="nilai" id='penetapan_ai-0'></div>
                                                        <div class="nilai" id='penetapan_aki-0'></div>
                                                        <div class="title">Realisasi s/d <span class='globalonebulan'></span> <span class='globalonetahun'></span></div>
                                                        <div class="nilai" id='realisasi_ai-0'></div>
                                                        <div class="nilai" id='realisasi_aki-0'></div>
                                                        <div class="title">Prognosa s/d Desember <span class='globalonetahun'></div>
                                                        <div class="nilai" id='prognosa_ai-0'></div>
                                                        <div class="nilai" id='prognosa_aki-0'></div>
                                                        <div class="title">% Realisasi <span class='globalonebulan'></span> thd RKAP <span class='globalonetahun'></div>
                                                        <div class="nilai" id='persen_ai-0'></div>
                                                        <div class="nilai" id='persen_aki-0'></div>
                                                        <div class="title">% Prognosa thd RKAP <span class='globalonetahun'></div>
                                                        <div class="nilai" id='persen_prognosa_ai-0'></div>
                                                        <div class="nilai" id='persen_prognosa_aki-0'></div>
                                                    </div>
                                                </div>
                                                <div class="sub-item">
                                                    <div class="caption">Murni</div>
                                                    <div class="inner">
                                                        <div class="title">Penetapan RKAP <span class='globalonetahun'></div>
                                                        <div class="nilai" id='penetapan_ai-1'></div>
                                                        <div class="nilai" id='penetapan_aki-1'></div>
                                                        <div class="title">Realisasi s/d <span class='globalonebulan'></span> <span class='globalonetahun'></span></div>
                                                        <div class="nilai" id='realisasi_ai-1'></div>
                                                        <div class="nilai" id='realisasi_aki-1'></div>
                                                        <div class="title">Prognosa s/d Desember <span class='globalonetahun'></div>
                                                        <div class="nilai" id='prognosa_ai-1'></div>
                                                        <div class="nilai" id='prognosa_aki-1'></div>
                                                        <div class="title">% Realisasi <span class='globalonebulan'></span> thd RKAP <span class='globalonetahun'></div>
                                                        <div class="nilai" id='persen_ai-1'></div>
                                                        <div class="nilai" id='persen_aki-1'></div>
                                                        <div class="title">% Prognosa thd RKAP <span class='globalonetahun'></div>
                                                        <div class="nilai" id='persen_prognosa_ai-1'></div>
                                                        <div class="nilai" id='persen_prognosa_aki-1'></div>
                                                    </div>
                                                </div>
                                                <div class="sub-item total">
                                                    <div class="caption">Total</div>
                                                    <div class="inner">
                                                        <div class="title">Penetapan RKAP <span class='globalonetahun'></div>
                                                        <div class="nilai" id='total_pengembangan_penetapan_ai'></div>
                                                        <div class="nilai" id='total_pengembangan_penetapan_aki'></div>
                                                        <div class="title">Realisasi s/d <span class='globalonebulan'></span> <span class='globalonetahun'></div>
                                                        <div class="nilai" id='total_pengembangan_realisasi_ai'></div>
                                                        <div class="nilai" id='total_pengembangan_realisasi_aki'></div>
                                                        <div class="title">Prognosa s/d Desember <span class='globalonetahun'></div>
                                                        <div class="nilai" id='total_pengembangan_prognosa_ai'></div>
                                                        <div class="nilai" id='total_pengembangan_prognosa_aki'></div>
                                                        <div class="title">% Realisasi <span class='globalonebulan'></span> thd RKAP <span class='globalonetahun'></div>
                                                        <div class="nilai" id='avg_pengembangan_total_persen_ai'></div>
                                                        <div class="nilai" id='avg_pengembangan_total_persen_aki'></div>
                                                        <div class="title">% Prognosa thd RKAP <span class='globalonetahun'></div>
                                                        <div class="nilai" id='avg_pengembangan_total_persen_prognosa_ai'></div>
                                                        <div class="nilai" id='avg_pengembangan_total_persen_prognosa_aki'></div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="judul-item">Penguatan Pembangkitan</div>
                                        <div class="item">
                                            <div class="wrapper-sub-item">
                                                <div class="sub-item">
                                                    <div class="caption">Lanjutan</div>
                                                    <div class="inner">
                                                        <div class="title">Penetapan RKAP <span class='globalonetahun'></div>
                                                        <div class="nilai" id='penetapan_ai-2'></div>
                                                        <div class="nilai" id='penetapan_aki-2'></div>
                                                        <div class="title">Realisasi s/d <span class='globalonebulan'></span> <span class='globalonetahun'></span></div>
                                                        <div class="nilai" id='realisasi_ai-2'></div>
                                                        <div class="nilai" id='realisasi_aki-2'></div>
                                                        <div class="title">Prognosa s/d Desember <span class='globalonetahun'></div>
                                                        <div class="nilai" id='prognosa_ai-2'></div>
                                                        <div class="nilai" id='prognosa_aki-2'></div>
                                                        <div class="title">% Realisasi <span class='globalonebulan'></span> thd RKAP <span class='globalonetahun'></div>
                                                        <div class="nilai" id='persen_ai-2'></div>
                                                        <div class="nilai" id='persen_aki-2'></div>
                                                        <div class="title">% Prognosa thd RKAP <span class='globalonetahun'></div>
                                                        <div class="nilai" id='persen_prognosa_ai-2'></div>
                                                        <div class="nilai" id='persen_prognosa_aki-2'></div>
                                                    </div>
                                                </div>
                                                <div class="sub-item">
                                                    <div class="caption">Murni</div>
                                                    <div class="inner">
                                                        <div class="title">Penetapan RKAP <span class='globalonetahun'></div>
                                                        <div class="nilai" id='penetapan_ai-3'></div>
                                                        <div class="nilai" id='penetapan_aki-3'></div>
                                                        <div class="title">Realisasi s/d <span class='globalonebulan'></span> <span class='globalonetahun'></span></div>
                                                        <div class="nilai" id='realisasi_ai-3'></div>
                                                        <div class="nilai" id='realisasi_aki-3'></div>
                                                        <div class="title">Prognosa s/d Desember <span class='globalonetahun'></div>
                                                        <div class="nilai" id='prognosa_ai-3'></div>
                                                        <div class="nilai" id='prognosa_aki-3'></div>
                                                        <div class="title">% Realisasi <span class='globalonebulan'></span> <span class='globalonetahun'></span> thd RKAP <span class='globalonetahun'></div>
                                                        <div class="nilai" id='persen_ai-3'></div>
                                                        <div class="nilai" id='persen_aki-3'></div>
                                                        <div class="title">% Prognosa thd RKAP <span class='globalonetahun'></div>
                                                        <div class="nilai" id='persen_prognosa_ai-3'></div>
                                                        <div class="nilai" id='persen_prognosa_aki-3'></div>
                                                    </div>
                                                </div>
                                                <div class="sub-item total">
                                                    <div class="caption">Total</div>
                                                    <div class="inner">
                                                        <div class="title">Penetapan RKAP <span class='globalonetahun'></div>
                                                        <div class="nilai" id='total_penguatan_penetapan_ai'></div>
                                                        <div class="nilai" id='total_penguatan_penetapan_aki'></div>
                                                        <div class="title">Realisasi s/d <span class='globalonebulan'></span> <span class='globalonetahun'></span> </div>
                                                        <div class="nilai" id='total_penguatan_realisasi_ai'></div>
                                                        <div class="nilai" id='total_penguatan_realisasi_aki'></div>
                                                        <div class="title">Prognosa s/d Desember <span class='globalonetahun'></div>
                                                        <div class="nilai" id='total_penguatan_prognosa_ai'></div>
                                                        <div class="nilai" id='total_penguatan_prognosa_aki'></div>
                                                        <div class="title">% Realisasi <span class='globalonebulan'></span> <span class='globalonetahun'></span> thd RKAP <span class='globalonetahun'></div>
                                                        <div class="nilai" id='avg_penguatan_total_persen_ai'></div>
                                                        <div class="nilai" id='avg_penguatan_total_persen_aki'></div>
                                                        <div class="title">% Prognosa thd RKAP <span class='globalonetahun'></div>
                                                        <div class="nilai" id='avg_penguatan_total_persen_prognosa_ai'></div>
                                                        <div class="nilai" id='avg_penguatan_total_persen_prognosa_aki'></div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div>
                                      <img src="http://placehold.it/350x300?text=2">
                                    </div> -->
                                    <!-- <div>
                                      <img src="http://placehold.it/350x300?text=3">
                                    </div> -->
                                </section>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="area-rekap-realisasi-ai grand-total">
                                <div class="judul-item">Grand Total</div>
                                <div class="item">
                                    <div class="wrapper-sub-item">
                                        <div class="sub-item">
                                            <div class="caption">Grand Total</div>
                                            <div class="inner">
                                                <div class="title">Penetapan RKAP <span class='globalonetahun'></div>
                                                <div class="nilai" id='grand_total_ai'><span></div>
                                                <div class="nilai" id='grand_total_aki'><span></div>
                                                <div class="title">Realisasi s/d <span class='globalonebulan'></span> <span class='globalonetahun'></span> </div>
                                                <div class="nilai" id='grand_realisasi_total_ai'></div>
                                                <div class="nilai" id='grand_realisasi_total_aki'></div>
                                                <div class="title">Prognosa s/d Desember <span class='globalonetahun'></div>
                                                <div class="nilai" id='grand_pragnosa_total_ai'></div>
                                                <div class="nilai" id='grand_pragnosa_total_aki'></div>
                                                <div class="title">% Realisasi <span class='globalonebulan'></span> thd RKAP <span class='globalonetahun'></div>
                                                <div class="nilai" id='grand_realisasi_persen_total_ai'></div>
                                                <div class="nilai" id='grand_realisasi_persen_total_aki'></div>
                                                <div class="title">% Prognosa thd RKAP <span class='globalonetahun'></div>
                                                <div class="nilai" id='grand_pragnosa_persen_total_ai'></div>
                                                <div class="nilai" id='grand_pragnosa_persen_total_aki'></div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="area-sumber-data detil">
                          <label>Sumber data : <span>Navitas</span></label>
                          <label>Last update : <span>4 Agustus 2023</span></label>
                      </div> -->
                      <div class="col-md-6">
                        <div class="area-penyerapan-ai">
                            
                            <div class="inner">
                                <div class="caption">Penyerapan AI s/d <span class='globalonebulan'></span> <span class='globalonetahun'></span> :</div>
                                <section class="penyerapan slider">
                                    <div>
                                        <div class="item">
                                            <div class="title">Total terkontrak </div>
                                            <div class="nilai" id='total_terkontrak'></div>
                                            <div class="keterangan">dari Penetapan RKAP <span class='globalonetahun'></div>
                                            <div class="persentase" id='persen_terkontrak'></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="item">
                                            <div class="title">Total terdisburse</div>
                                            <div class="nilai" id='total_terdisburse'></div>
                                            <div class="keterangan">dari Penetapan RKAP <span class='globalonetahun'></div>
                                            <div class="persentase" id='persen_terdisburse'></div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <div class="catatan">
                                Catatan : Angka Penetapan dan Prognosa AI dan AKI include Relokasi Jakabaring dan Batanghari
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="area-grafik-penyerapan-ai">
                            <div class="caption">
                                Persentase 
                                Ketercapaian 
                                AI AKI
                                <span>per <span class='globalonebulan'></span> <span class='globalonetahun'></span>
                                terhadap target <span class='globalonetahun'></span>
                            </div>
                            <div class="grafik" id="container" style="height: calc(25vh - 20px);"></div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="area-penyerapan-ai">
                            
                            <div class="inner">
                                <div class="caption">Penyerapan AI s/d <span class='globalonebulan'></span> <span class='globalonetahun'></span> :</div>
                                <section class="penyerapan slider">
                                    <div>
                                        <div class="item">
                                            <div class="title">Total terkontrak </div>
                                            <div class="nilai" id='total_terkontrak'></div>
                                            <div class="keterangan">dari Penetapan RKAP <span class='globalonetahun'></div>
                                            <div class="persentase" id='persen_terkontrak'></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="item">
                                            <div class="title">Total terdisburse</div>
                                            <div class="nilai" id='total_terdisburse'></div>
                                            <div class="keterangan">dari Penetapan RKAP <span class='globalonetahun'></div>
                                            <div class="persentase" id='persen_terdisburse'></div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <div class="catatan">
                                Catatan : Angka Penetapan dan Prognosa AI dan AKI include Relokasi Jakabaring dan Batanghari
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="area-grafik-penyerapan-ai">
                            <div class="caption">
                                Persentase 
                                Ketercapaian 
                                AI AKI
                                <span>per <span class='globalonebulan'></span> <span class='globalonetahun'></span>
                                terhadap target <span class='globalonetahun'></span>
                            </div>
                            <div class="grafik" id="container" style="height: calc(25vh - 20px);"></div>
                            <div class="clearfix"></div>
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

<!-- <script type="text/javascript">
    $(function() {
          'use strict';
        (function(factory) {
            if(typeof module === 'object' && module.exports) {
                module.exports = factory;
            } else {
                factory(Highcharts);
            }
        }(function(Highcharts) {
            (function(H) {
                H.wrap(H.seriesTypes.column.prototype, 'translate', function(proceed) {
                    const options = this.options;
                    const topMargin = options.topMargin || 0;
                    const bottomMargin = options.bottomMargin || 0;

                    proceed.call(this);

                    H.each(this.points, function(point) {
                        if(options.borderRadiusTopLeft || options.borderRadiusTopRight || options.borderRadiusBottomRight || options.borderRadiusBottomLeft) {
                            const w = point.shapeArgs.width;
                            const h = point.shapeArgs.height;
                            const x = point.shapeArgs.x;
                            const y = point.shapeArgs.y;

                            let radiusTopLeft = H.relativeLength(options.borderRadiusTopLeft || 0, w);
                            let radiusTopRight = H.relativeLength(options.borderRadiusTopRight || 0, w);
                            let radiusBottomRight = H.relativeLength(options.borderRadiusBottomRight || 0, w);
                            let radiusBottomLeft = H.relativeLength(options.borderRadiusBottomLeft || 0, w);

                            const maxR = Math.min(w, h) / 2

                            radiusTopLeft = radiusTopLeft > maxR ? maxR : radiusTopLeft;
                            radiusTopRight = radiusTopRight > maxR ? maxR : radiusTopRight;
                            radiusBottomRight = radiusBottomRight > maxR ? maxR : radiusBottomRight;
                            radiusBottomLeft = radiusBottomLeft > maxR ? maxR : radiusBottomLeft;

                            point.dlBox = point.shapeArgs;

                            point.shapeType = 'path';
                            point.shapeArgs = {
                                d: [
                                    'M', x + radiusTopLeft, y + topMargin,
                                    'L', x + w - radiusTopRight, y + topMargin,
                                    'C', x + w - radiusTopRight / 2, y, x + w, y + radiusTopRight / 2, x + w, y + radiusTopRight,
                                    'L', x + w, y + h - radiusBottomRight,
                                    'C', x + w, y + h - radiusBottomRight / 2, x + w - radiusBottomRight / 2, y + h, x + w - radiusBottomRight, y + h + bottomMargin,
                                    'L', x + radiusBottomLeft, y + h + bottomMargin,
                                    'C', x + radiusBottomLeft / 2, y + h, x, y + h - radiusBottomLeft / 2, x, y + h - radiusBottomLeft,
                                    'L', x, y + radiusTopLeft,
                                    'C', x, y + radiusTopLeft / 2, x + radiusTopLeft / 2, y, x + radiusTopLeft, y,
                                    'Z'
                                ]
                            };
                        }

                    });
                });
            }(Highcharts));
        }));

        Highcharts.chart('container', {
            chart: {
                type: 'column',
                backgroundColor: null,
                marginRight: 140
            },
            legend: {
                floating: true,
                align: 'right',
                itemMarginBottom: 15,
                width: 90,
                x: 25,
                itemWidth: 90,
                itemStyle: {
                    fontSize:'13px',
                    color: '#A0A0A0'
                },
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
                categories: [
                  'Pengembangan Usaha',
                  'Penguatan Pembangkit',
                  'Total'
                ],
                crosshair: true,
                labels: {
                    style: {
                        color: '#FFFFFF'
                    }
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

                gridLineWidth: 0,
                minorGridLineWidth: 0,
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#aaa',
                    zIndex: 10
                }],
                stackLabels: {
                    enabled: true,
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                  '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
          
            plotOptions: {
                column: {
                    // grouping: false,
                    borderRadiusTopLeft: 10,
                    borderRadiusTopRight: 10,
                    // pointPadding: 0.2,
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true
                    }
                },
                series: {
                    dataLabels: {
                        enabled: true,
                        formatter: function () {
                            var mychart = $('#container').highcharts();
                            var mytotal = 0;

                            for (i = 0; i < mychart.series.length; i++) {
                                if (mychart.series[i].visible) {
                                    mytotal += parseInt(mychart.series[i].yData[0]);
                                }
                            }
                            var pcnt = (this.y / mytotal) * 100;
                            return Highcharts.numberFormat(pcnt) + '%';
                        }
                    }
                }
            },
            series: [{
                name: 'AI',
                data: [49.9, 71.5, 106.4],
                color: "#03a9f4"

            }, {
                name: 'AKI',
                data: [83.6, 78.8, 98.5],
                color: "#66a2a3"

            }]
        });
    });
</script> -->

<script type="text/javascript">
    $(function() {
          'use strict';
        (function(factory) {
            if(typeof module === 'object' && module.exports) {
                module.exports = factory;
            } else {
                factory(Highcharts);
            }
        }(function(Highcharts) {
            (function(H) {
                H.wrap(H.seriesTypes.column.prototype, 'translate', function(proceed) {
                    const options = this.options;
                    const topMargin = options.topMargin || 0;
                    const bottomMargin = options.bottomMargin || 0;

                    proceed.call(this);

                    H.each(this.points, function(point) {
                        if(options.borderRadiusTopLeft || options.borderRadiusTopRight || options.borderRadiusBottomRight || options.borderRadiusBottomLeft) {
                            const w = point.shapeArgs.width;
                            const h = point.shapeArgs.height;
                            const x = point.shapeArgs.x;
                            const y = point.shapeArgs.y;

                            let radiusTopLeft = H.relativeLength(options.borderRadiusTopLeft || 0, w);
                            let radiusTopRight = H.relativeLength(options.borderRadiusTopRight || 0, w);
                            let radiusBottomRight = H.relativeLength(options.borderRadiusBottomRight || 0, w);
                            let radiusBottomLeft = H.relativeLength(options.borderRadiusBottomLeft || 0, w);

                            const maxR = Math.min(w, h) / 2

                            radiusTopLeft = radiusTopLeft > maxR ? maxR : radiusTopLeft;
                            radiusTopRight = radiusTopRight > maxR ? maxR : radiusTopRight;
                            radiusBottomRight = radiusBottomRight > maxR ? maxR : radiusBottomRight;
                            radiusBottomLeft = radiusBottomLeft > maxR ? maxR : radiusBottomLeft;

                            point.dlBox = point.shapeArgs;

                            point.shapeType = 'path';
                            point.shapeArgs = {
                                d: [
                                    'M', x + radiusTopLeft, y + topMargin,
                                    'L', x + w - radiusTopRight, y + topMargin,
                                    'C', x + w - radiusTopRight / 2, y, x + w, y + radiusTopRight / 2, x + w, y + radiusTopRight,
                                    'L', x + w, y + h - radiusBottomRight,
                                    'C', x + w, y + h - radiusBottomRight / 2, x + w - radiusBottomRight / 2, y + h, x + w - radiusBottomRight, y + h + bottomMargin,
                                    'L', x + radiusBottomLeft, y + h + bottomMargin,
                                    'C', x + radiusBottomLeft / 2, y + h, x, y + h - radiusBottomLeft / 2, x, y + h - radiusBottomLeft,
                                    'L', x, y + radiusTopLeft,
                                    'C', x, y + radiusTopLeft / 2, x + radiusTopLeft / 2, y, x + radiusTopLeft, y,
                                    'Z'
                                ]
                            };
                        }

                    });
                });
            }(Highcharts));
        }));


       
    });
</script>

<!-- SLICK -->
<!-- <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script> -->
<script src="lib/slick-1.8.1/slick/slick.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
$(document).on('ready', function() {
  
  $(".regular").slick({
    dots: true,
    infinite: true,
    slidesToShow: 2,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
  });
  $(".penyerapan").slick({
    dots: true,
    infinite: true,
    slidesToShow: 2,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
  });

   $(document).ready(function() {
      RalisasiAi();
     
      $("#bln,#thn").on('change',function(){
        bln= parseInt($("#bln").val());
        thn= parseInt($("#thn").val());

        RalisasiAi();
      });
  })

  function RalisasiAi(){
      bln= parseInt($("#bln").val());
      thn= parseInt($("#thn").val());
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
                $('#penetapan_ai-'+i).html('<span>AI</span><label style=\'text-align: right; width: 30%;\'>'+penetapan_ai.toLocaleString('de-DE')+'</label>');
                $('#penetapan_aki-'+i).html('<span>AKI</span><label style=\'text-align: right; width: 30%;\'>'+penetapan_aki.toLocaleString('de-DE')+'</label>');
                $('#realisasi_ai-'+i).html('<span>AI</span><label style=\'text-align: right; width: 30%;\'>'+realisasi_ai.toLocaleString('de-DE')+'</label>');
                $('#realisasi_aki-'+i).html('<span>AKI</span><label style=\'text-align: right; width: 30%;\'>'+realisasi_aki.toLocaleString('de-DE')+'</label>');
                $('#prognosa_ai-'+i).html('<span>AI</span><label style=\'text-align: right; width: 30%;\'>'+prognosa_ai.toLocaleString('de-DE')+'</label>');
                $('#prognosa_aki-'+i).html('<span>AKI</span><label style=\'text-align: right; width: 30%;\'>'+prognosa_aki.toLocaleString('de-DE')+'</label>');
                persen_ai=(text[i]['realisasi_ai']/text[i]['penetapan_ai'])*100;
                persen_aki=(text[i]['realisasi_aki']/text[i]['penetapan_aki'])*100;
                $('#persen_ai-'+i).html('<span>AI</span><label style=\'text-align: right; width: 30%;\'>'+Math.round(persen_ai)+ ' %</label>');
                $('#persen_aki-'+i).html('<span>AKI</span><label style=\'text-align: right; width: 30%;\'>'+Math.round(persen_aki)+ ' %</label>');
                persen_prognosa_ai=(text[i]['prognosa_ai']/text[i]['penetapan_ai'])*100;
                persen_prognosa_aki=(text[i]['prognosa_aki']/text[i]['penetapan_aki'])*100;
                $('#persen_prognosa_ai-'+i).html('<span>AI</span><label style=\'text-align: right; width: 30%;\'>'+Math.round(persen_prognosa_ai)+ ' %</label>');
                $('#persen_prognosa_aki-'+i).html('<span>AKI</span><label style=\'text-align: right; width: 30%;\'>'+Math.round(persen_prognosa_aki)+ ' %</label>');
            }

            // pengembangan start
            total_penetapan_ai=parseInt(text[0]['penetapan_ai'])+parseInt(text[1]['penetapan_ai']);
            $('#total_pengembangan_penetapan_ai').html('<span>AI</span><label style=\'text-align: right; width: 30%;\'>'+total_penetapan_ai.toLocaleString('de-DE')+'</label>');

            total_penetapan_aki=parseInt(text[0]['penetapan_aki'])+parseInt(text[1]['penetapan_aki']);
            $('#total_pengembangan_penetapan_aki').html('<span>AI</span><label style=\'text-align: right; width: 30%;\'>'+total_penetapan_aki.toLocaleString('de-DE')+'</label>');

            total_realisasi_ai=parseInt(text[0]['realisasi_ai'])+parseInt(text[1]['realisasi_ai']);
            $('#total_pengembangan_realisasi_ai').html('<span>AI</span><label style=\'text-align: right; width: 30%;\'>'+total_realisasi_ai.toLocaleString('de-DE')+'</label>');

            total_realisasi_aki=parseInt(text[0]['realisasi_aki'])+parseInt(text[1]['realisasi_aki']);
            $('#total_pengembangan_realisasi_aki').html('<span>AI</span><label style=\'text-align: right; width: 30%;\'>'+total_realisasi_aki.toLocaleString('de-DE')+'</label>');

            total_prognosa_ai=parseInt(text[0]['prognosa_ai'])+parseInt(text[1]['prognosa_ai']);
            $('#total_pengembangan_prognosa_ai').html('<span>AI</span><label style=\'text-align: right; width: 30%;\'>'+total_prognosa_ai.toLocaleString('de-DE')+'</label>');

            total_prognosa_aki=parseInt(text[0]['prognosa_aki'])+parseInt(text[1]['prognosa_aki']);
            $('#total_pengembangan_prognosa_aki').html('<span>AI</span><label style=\'text-align: right; width: 30%;\'>'+total_prognosa_aki.toLocaleString('de-DE')+'</label>');

            avg_persen_ai=(total_realisasi_ai/total_penetapan_ai)*100;
            val_grafik_ai_1=avg_persen_ai;
            $('#avg_pengembangan_total_persen_ai').html('<span>AI</span><label style=\'text-align: right; width: 30%;\'>'+Math.round(avg_persen_ai)+ ' %</label>');

            avg_persen_aki=(total_realisasi_aki/total_penetapan_aki)*100;
            val_grafik_aki_1=avg_persen_aki;
            $('#avg_pengembangan_total_persen_aki').html('<span>AKI</span><label style=\'text-align: right; width: 30%;\'>'+Math.round(avg_persen_aki)+ ' %</label>');

            avg_persen_prognosa_ai=(total_prognosa_ai/total_penetapan_ai)*100;
            $('#avg_pengembangan_total_persen_prognosa_ai').html('<span>AI</span><label style=\'text-align: right; width: 30%;\'>'+Math.round(avg_persen_prognosa_ai)+ ' %</label>');

            avg_persen_prognosa_aki=(total_prognosa_aki/total_penetapan_aki)*100;
            $('#avg_pengembangan_total_persen_prognosa_aki').html('<span>AKI</span><label style=\'text-align: right; width: 30%;\'>'+Math.round(avg_persen_prognosa_aki)+ ' %</label>');

            // pengembangan end

            // penguatan start

            total_penetapan_ai=parseInt(text[2]['penetapan_ai'])+parseInt(text[3]['penetapan_ai']);
            $('#total_penguatan_penetapan_ai').html('<span>AI</span><label style=\'text-align: right; width: 30%;\'>'+total_penetapan_ai.toLocaleString('de-DE')+'</label>');

            total_penetapan_aki=parseInt(text[2]['penetapan_aki'])+parseInt(text[3]['penetapan_aki']);
            $('#total_penguatan_penetapan_aki').html('<span>AI</span><label style=\'text-align: right; width: 30%;\'>'+total_penetapan_aki.toLocaleString('de-DE')+'</label>');

            total_realisasi_ai=parseInt(text[2]['realisasi_ai'])+parseInt(text[3]['realisasi_ai']);
            $('#total_penguatan_realisasi_ai').html('<span>AI</span><label style=\'text-align: right; width: 30%;\'>'+total_realisasi_ai.toLocaleString('de-DE')+'</label>');

            total_realisasi_aki=parseInt(text[2]['realisasi_aki'])+parseInt(text[3]['realisasi_aki']);
            $('#total_penguatan_realisasi_aki').html('<span>AI</span><label style=\'text-align: right; width: 30%;\'>'+total_realisasi_aki.toLocaleString('de-DE')+'</label>');

            total_prognosa_ai=parseInt(text[2]['prognosa_ai'])+parseInt(text[3]['prognosa_ai']);
            $('#total_penguatan_prognosa_ai').html('<span>AI</span><label style=\'text-align: right; width: 30%;\'>'+total_prognosa_ai.toLocaleString('de-DE')+'</label>');

            total_prognosa_aki=parseInt(text[2]['prognosa_aki'])+parseInt(text[3]['prognosa_aki']);
            $('#total_penguatan_prognosa_aki').html('<span>AI</span><label style=\'text-align: right; width: 30%;\'>'+total_prognosa_aki.toLocaleString('de-DE')+'</label>');

            avg_persen_ai=(total_realisasi_ai/total_penetapan_ai)*100;
            val_grafik_ai_2=avg_persen_ai;
            $('#avg_penguatan_total_persen_ai').html('<span>AI</span><label style=\'text-align: right; width: 30%;\'>'+Math.round(avg_persen_ai)+ ' %</label>');

            avg_persen_aki=(total_realisasi_aki/total_penetapan_aki)*100;
            val_grafik_aki_2=avg_persen_aki;
            $('#avg_penguatan_total_persen_aki').html('<span>AKI</span><label style=\'text-align: right; width: 30%;\'>'+Math.round(avg_persen_aki)+ ' %</label>');

            avg_persen_prognosa_ai=(total_prognosa_ai/total_penetapan_ai)*100;
            $('#avg_penguatan_total_persen_prognosa_ai').html('<span>AI</span><label style=\'text-align: right; width: 30%;\'>'+Math.round(avg_persen_prognosa_ai)+ ' %</label>');

            avg_persen_prognosa_aki=(total_prognosa_aki/total_penetapan_aki)*100;
            $('#avg_penguatan_total_persen_prognosa_aki').html('<span>AKI</span><label style=\'text-align: right; width: 30%;\'>'+Math.round(avg_persen_prognosa_aki)+ ' %</label>');

            // penguatan end 

            penetapan_ai=parseInt(text[0]['penetapan_ai'])+parseInt(text[1]['penetapan_ai'])+parseInt(text[2]['penetapan_ai'])+parseInt(text[3]['penetapan_ai']);
            $('#grand_total_ai').html('<span>AI</span><label style=\'text-align: right; width: 30%;\'>'+penetapan_ai.toLocaleString('de-DE')+'</label>');

            penetapan_aki=parseInt(text[0]['penetapan_aki'])+parseInt(text[1]['penetapan_aki'])+parseInt(text[2]['penetapan_aki'])+parseInt(text[3]['penetapan_aki']);
            $('#grand_total_aki').html('<span>AKI</span><label style=\'text-align: right; width: 30%;\'>'+penetapan_aki.toLocaleString('de-DE')+'</label>');

            total_realisasi_ai=parseInt(text[0]['realisasi_ai'])+parseInt(text[1]['realisasi_ai'])+parseInt(text[2]['realisasi_ai'])+parseInt(text[3]['realisasi_ai']);
            $('#total_terkontrak').html('Rp'+total_realisasi_ai.toLocaleString('de-DE')+" M");
            $('#grand_realisasi_total_ai').html('<span>AI</span><label style=\'text-align: right; width: 30%;\'>'+total_realisasi_ai.toLocaleString('de-DE')+'</label>');

            total_realisasi_aki=parseInt(text[0]['realisasi_aki'])+parseInt(text[1]['realisasi_aki'])+parseInt(text[2]['realisasi_aki'])+parseInt(text[3]['realisasi_aki']);
            $('#total_terdisburse').html('Rp'+total_realisasi_aki.toLocaleString('de-DE')+" M");
            $('#grand_realisasi_total_aki').html('<span>AKI</span><label style=\'text-align: right; width: 30%;\'>'+total_realisasi_aki.toLocaleString('de-DE')+'</label>');

            total_prognosa_ai=parseInt(text[0]['prognosa_ai'])+parseInt(text[1]['prognosa_ai'])+parseInt(text[2]['prognosa_ai'])+parseInt(text[3]['prognosa_ai']);
            $('#grand_pragnosa_total_ai').html('<span>AI</span><label style=\'text-align: right; width: 30%;\'>'+total_prognosa_ai.toLocaleString('de-DE')+'</label>');

            total_prognosa_aki=parseInt(text[0]['prognosa_aki'])+parseInt(text[1]['prognosa_aki'])+parseInt(text[2]['prognosa_aki'])+parseInt(text[3]['prognosa_aki']);
            $('#grand_pragnosa_total_aki').html('<span>AKI</span><label style=\'text-align: right; width: 30%;\'>'+total_prognosa_aki.toLocaleString('de-DE')+'</label>');

            total_penetapan_ai=parseInt(text[0]['penetapan_ai'])+parseInt(text[1]['penetapan_ai'])+parseInt(text[2]['penetapan_ai'])+parseInt(text[3]['penetapan_ai']);
            avg_persen_ai=(total_realisasi_ai/total_penetapan_ai)*100;
            val_grafik_ai_3=avg_persen_ai;
            $('#persen_terkontrak').html(Math.round(avg_persen_ai)+ '<span>%<span>');
            $('#grand_realisasi_persen_total_ai').html('<span>AI</span><label style=\'text-align: right; width: 30%;\'>'+Math.round(avg_persen_ai)+ ' %</label>');

            total_penetapan_aki=parseInt(text[0]['penetapan_aki'])+parseInt(text[1]['penetapan_aki'])+parseInt(text[2]['penetapan_aki'])+parseInt(text[3]['penetapan_aki']);
            avg_persen_aki=(total_realisasi_aki/total_penetapan_aki)*100;
            val_grafik_aki_3=avg_persen_aki;
            $('#persen_terdisburse').html(Math.round(avg_persen_aki)+ '<span>%<span>');
            $('#grand_realisasi_persen_total_aki').html('<span>AKI</span><label style=\'text-align: right; width: 30%;\'>'+Math.round(avg_persen_aki)+ ' %</label>');

            avg_prognosa_ai=(total_prognosa_ai/total_penetapan_ai)*100;
            $('#grand_pragnosa_persen_total_ai').html('<span>AI</span><label style=\'text-align: right; width: 30%;\'>'+Math.round(avg_prognosa_ai)+ ' %</label>');

            avg_prognosa_aki=(total_prognosa_aki/total_penetapan_aki)*100;
            $('#grand_pragnosa_persen_total_aki').html('<span>AKI</span><label style=\'text-align: right; width: 30%;\'>'+Math.round(avg_prognosa_aki)+ ' %</label>');

            // console.log(val_grafik_ai_1.toFixed(2)+","+val_grafik_ai_2.toFixed(2)+","+val_grafik_ai_3.toFixed(2));
            // console.log(val_grafik_aki_1.toFixed(2)+","+val_grafik_aki_2.toFixed(2)+","+val_grafik_aki_3.toFixed(2));

            Highcharts.chart('container', {
            chart: {
                type: 'column',
                backgroundColor: null,
                marginRight: 140
            },
            legend: {
                floating: true,
                align: 'right',
                itemMarginBottom: 15,
                width: 90,
                x: 25,
                itemWidth: 90,
                itemStyle: {
                    fontSize:'13px',
                    color: '#A0A0A0'
                },
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
                categories: [
                  'Pengembangan Usaha',
                  'Penguatan Pembangkit',
                  'Total'
                ],
                crosshair: true,
                labels: {
                    style: {
                        color: '#FFFFFF',
                        fontSize:'13px',
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                  text: null
                },
                labels: {
                    enabled: false,
                    fontSize:'13px',
                },

                gridLineWidth: 0,
                minorGridLineWidth: 0,
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#aaa',
                    zIndex: 10
                }],
                stackLabels: {
                    enabled: true,
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                  '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
          
            plotOptions: {
                column: {
                    // grouping: false,
                    borderRadiusTopLeft: 15,
                    borderRadiusTopRight: 15,
                    // pointPadding: 0.2,
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true
                    }
                },
                series: {
                    dataLabels: {
                        enabled: true,
                        style: {
                                color: '#FFFFFF',
                                fontSize:'13px',
                            },
                        formatter: function () {
                            return Highcharts.numberFormat(this.y) + '%';
                            
                        },

                        // formatter: function () {
                        //     var mychart = $('#container').highcharts();
                        //     var mytotal = 0;

                        //     for (i = 0; i < mychart.series.length; i++) {
                        //         if (mychart.series[i].visible) {
                        //             mytotal += parseInt(mychart.series[i].yData[0]);
                        //         }
                        //     }
                        //     var pcnt = (this.y / mytotal) * 100;
                        //     return Highcharts.numberFormat(pcnt) + '%';
                        // }
                    }
                }
            },
            series: [{
                name: 'AI',
                data: [parseFloat(val_grafik_ai_1),parseFloat(val_grafik_ai_2),parseFloat(val_grafik_ai_3)],
                color: "#03a9f4"
            }, {
                name: 'AKI',
                data: [parseFloat(val_grafik_aki_1),parseFloat(val_grafik_aki_2),parseFloat(val_grafik_aki_3)],
                color: "#66a2a3"
            }]
        });

            $('#vlsxloading').hide();
          }        
      });
  }
     
});
</script>

        

