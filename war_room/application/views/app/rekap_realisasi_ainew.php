<?php
include_once("functions/string.func.php");
include_once("functions/date.func.php");
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
                                <div class="logo-pln-np pull-left"><img src="images/logo.png"></div>    
                                <div class="judul">
                                    <span class="ikon"><img src="images/icon-kesiapan-pembangkit.png"></span> Rekap Realisasi AI Periode sd Agustus 2023 <span class="keterangan">(dalam Rp Miliar)</span>
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
                                                        <div class="title">Penetapan RKAP 2023</div>
                                                        <div class="nilai"><span>AI</span>                  2.556</div>
                                                        <div class="nilai"><span>AKI</span>             1.093</div>
                                                        <div class="title">Realisasi s/d Agustus 2023</div>
                                                        <div class="nilai"><span>AI</span>                  2.556</div>
                                                        <div class="nilai"><span>AKI</span>             1.093</div>
                                                        <div class="title">Prognosa s/d Desember 2023</div>
                                                        <div class="nilai"><span>AI</span>                  2.556</div>
                                                        <div class="nilai"><span>AKI</span>             1.093</div>
                                                        <div class="title">% Realisasi Agustus thd RKAP 2023</div>
                                                        <div class="nilai"><span>AI</span>                  2.556</div>
                                                        <div class="nilai"><span>AKI</span>             1.093</div>
                                                        <div class="title">% Prognosa thd RKAP 2023</div>
                                                        <div class="nilai"><span>Prog AI</span>     2.556</div>
                                                        <div class="nilai"><span>Prog AKI</span>        1.093</div>
                                                    </div>
                                                </div>
                                                <div class="sub-item">
                                                    <div class="caption">Murni</div>
                                                    <div class="inner">
                                                        <div class="title">Penetapan RKAP 2023</div>
                                                        <div class="nilai"><span>AI</span>                  2.556</div>
                                                        <div class="nilai"><span>AKI</span>             1.093</div>
                                                        <div class="title">Realisasi s/d Agustus 2023</div>
                                                        <div class="nilai"><span>AI</span>                  2.556</div>
                                                        <div class="nilai"><span>AKI</span>             1.093</div>
                                                        <div class="title">Prognosa s/d Desember 2023</div>
                                                        <div class="nilai"><span>AI</span>                  2.556</div>
                                                        <div class="nilai"><span>AKI</span>             1.093</div>
                                                        <div class="title">% Realisasi Agustus thd RKAP 2023</div>
                                                        <div class="nilai"><span>AI</span>                  2.556</div>
                                                        <div class="nilai"><span>AKI</span>             1.093</div>
                                                        <div class="title">% Prognosa thd RKAP 2023</div>
                                                        <div class="nilai"><span>Prog AI</span>     2.556</div>
                                                        <div class="nilai"><span>Prog AKI</span>        1.093</div>
                                                    </div>
                                                </div>
                                                <div class="sub-item total">
                                                    <div class="caption">Total</div>
                                                    <div class="inner">
                                                        <div class="title">Penetapan RKAP 2023</div>
                                                        <div class="nilai"><span>AI</span>                  2.556</div>
                                                        <div class="nilai"><span>AKI</span>             1.093</div>
                                                        <div class="title">Realisasi s/d Agustus 2023</div>
                                                        <div class="nilai"><span>AI</span>                  2.556</div>
                                                        <div class="nilai"><span>AKI</span>             1.093</div>
                                                        <div class="title">Prognosa s/d Desember 2023</div>
                                                        <div class="nilai"><span>AI</span>                  2.556</div>
                                                        <div class="nilai"><span>AKI</span>             1.093</div>
                                                        <div class="title">% Realisasi Agustus thd RKAP 2023</div>
                                                        <div class="nilai"><span>AI</span>                  2.556</div>
                                                        <div class="nilai"><span>AKI</span>             1.093</div>
                                                        <div class="title">% Prognosa thd RKAP 2023</div>
                                                        <div class="nilai"><span>Prog AI</span>     2.556</div>
                                                        <div class="nilai"><span>Prog AKI</span>        1.093</div>
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
                                                        <div class="title">Penetapan RKAP 2023</div>
                                                        <div class="nilai"><span>AI</span>                  2.556</div>
                                                        <div class="nilai"><span>AKI</span>             1.093</div>
                                                        <div class="title">Realisasi s/d Agustus 2023</div>
                                                        <div class="nilai"><span>AI</span>                  2.556</div>
                                                        <div class="nilai"><span>AKI</span>             1.093</div>
                                                        <div class="title">Prognosa s/d Desember 2023</div>
                                                        <div class="nilai"><span>AI</span>                  2.556</div>
                                                        <div class="nilai"><span>AKI</span>             1.093</div>
                                                        <div class="title">% Realisasi Agustus thd RKAP 2023</div>
                                                        <div class="nilai"><span>AI</span>                  2.556</div>
                                                        <div class="nilai"><span>AKI</span>             1.093</div>
                                                        <div class="title">% Prognosa thd RKAP 2023</div>
                                                        <div class="nilai"><span>Prog AI</span>     2.556</div>
                                                        <div class="nilai"><span>Prog AKI</span>        1.093</div>
                                                    </div>
                                                </div>
                                                <div class="sub-item">
                                                    <div class="caption">Murni</div>
                                                    <div class="inner">
                                                        <div class="title">Penetapan RKAP 2023</div>
                                                        <div class="nilai"><span>AI</span>                  2.556</div>
                                                        <div class="nilai"><span>AKI</span>             1.093</div>
                                                        <div class="title">Realisasi s/d Agustus 2023</div>
                                                        <div class="nilai"><span>AI</span>                  2.556</div>
                                                        <div class="nilai"><span>AKI</span>             1.093</div>
                                                        <div class="title">Prognosa s/d Desember 2023</div>
                                                        <div class="nilai"><span>AI</span>                  2.556</div>
                                                        <div class="nilai"><span>AKI</span>             1.093</div>
                                                        <div class="title">% Realisasi Agustus thd RKAP 2023</div>
                                                        <div class="nilai"><span>AI</span>                  2.556</div>
                                                        <div class="nilai"><span>AKI</span>             1.093</div>
                                                        <div class="title">% Prognosa thd RKAP 2023</div>
                                                        <div class="nilai"><span>Prog AI</span>     2.556</div>
                                                        <div class="nilai"><span>Prog AKI</span>        1.093</div>
                                                    </div>
                                                </div>
                                                <div class="sub-item total">
                                                    <div class="caption">Total</div>
                                                    <div class="inner">
                                                        <div class="title">Penetapan RKAP 2023</div>
                                                        <div class="nilai"><span>AI</span>                  2.556</div>
                                                        <div class="nilai"><span>AKI</span>             1.093</div>
                                                        <div class="title">Realisasi s/d Agustus 2023</div>
                                                        <div class="nilai"><span>AI</span>                  2.556</div>
                                                        <div class="nilai"><span>AKI</span>             1.093</div>
                                                        <div class="title">Prognosa s/d Desember 2023</div>
                                                        <div class="nilai"><span>AI</span>                  2.556</div>
                                                        <div class="nilai"><span>AKI</span>             1.093</div>
                                                        <div class="title">% Realisasi Agustus thd RKAP 2023</div>
                                                        <div class="nilai"><span>AI</span>                  2.556</div>
                                                        <div class="nilai"><span>AKI</span>             1.093</div>
                                                        <div class="title">% Prognosa thd RKAP 2023</div>
                                                        <div class="nilai"><span>Prog AI</span>     2.556</div>
                                                        <div class="nilai"><span>Prog AKI</span>        1.093</div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <? /* ?>
                                    <div>
                                        <div class="judul-item">Test Title</div>
                                        <div class="item">
                                            <div class="wrapper-sub-item">
                                                <div class="sub-item">
                                                    <div class="caption">Lanjutan</div>
                                                    <div class="inner">
                                                        <div class="title">Penetapan RKAP 2023</div>
                                                        <div class="nilai"><span>AI</span>                  2.556</div>
                                                        <div class="nilai"><span>AKI</span>             1.093</div>
                                                        <div class="title">Realisasi s/d Agustus 2023</div>
                                                        <div class="nilai"><span>AI</span>                  2.556</div>
                                                        <div class="nilai"><span>AKI</span>             1.093</div>
                                                        <div class="title">Prognosa s/d Desember 2023</div>
                                                        <div class="nilai"><span>AI</span>                  2.556</div>
                                                        <div class="nilai"><span>AKI</span>             1.093</div>
                                                        <div class="title">% Realisasi Agustus thd RKAP 2023</div>
                                                        <div class="nilai"><span>AI</span>                  2.556</div>
                                                        <div class="nilai"><span>AKI</span>             1.093</div>
                                                        <div class="title">% Prognosa thd RKAP 2023</div>
                                                        <div class="nilai"><span>Prog AI</span>     2.556</div>
                                                        <div class="nilai"><span>Prog AKI</span>        1.093</div>
                                                    </div>
                                                </div>
                                                <div class="sub-item">
                                                    <div class="caption">Murni</div>
                                                    <div class="inner">
                                                        <div class="title">Penetapan RKAP 2023</div>
                                                        <div class="nilai"><span>AI</span>                  2.556</div>
                                                        <div class="nilai"><span>AKI</span>             1.093</div>
                                                        <div class="title">Realisasi s/d Agustus 2023</div>
                                                        <div class="nilai"><span>AI</span>                  2.556</div>
                                                        <div class="nilai"><span>AKI</span>             1.093</div>
                                                        <div class="title">Prognosa s/d Desember 2023</div>
                                                        <div class="nilai"><span>AI</span>                  2.556</div>
                                                        <div class="nilai"><span>AKI</span>             1.093</div>
                                                        <div class="title">% Realisasi Agustus thd RKAP 2023</div>
                                                        <div class="nilai"><span>AI</span>                  2.556</div>
                                                        <div class="nilai"><span>AKI</span>             1.093</div>
                                                        <div class="title">% Prognosa thd RKAP 2023</div>
                                                        <div class="nilai"><span>Prog AI</span>     2.556</div>
                                                        <div class="nilai"><span>Prog AKI</span>        1.093</div>
                                                    </div>
                                                </div>
                                                <div class="sub-item total">
                                                    <div class="caption">Total</div>
                                                    <div class="inner">
                                                        <div class="title">Penetapan RKAP 2023</div>
                                                        <div class="nilai"><span>AI</span>                  2.556</div>
                                                        <div class="nilai"><span>AKI</span>             1.093</div>
                                                        <div class="title">Realisasi s/d Agustus 2023</div>
                                                        <div class="nilai"><span>AI</span>                  2.556</div>
                                                        <div class="nilai"><span>AKI</span>             1.093</div>
                                                        <div class="title">Prognosa s/d Desember 2023</div>
                                                        <div class="nilai"><span>AI</span>                  2.556</div>
                                                        <div class="nilai"><span>AKI</span>             1.093</div>
                                                        <div class="title">% Realisasi Agustus thd RKAP 2023</div>
                                                        <div class="nilai"><span>AI</span>                  2.556</div>
                                                        <div class="nilai"><span>AKI</span>             1.093</div>
                                                        <div class="title">% Prognosa thd RKAP 2023</div>
                                                        <div class="nilai"><span>Prog AI</span>     2.556</div>
                                                        <div class="nilai"><span>Prog AKI</span>        1.093</div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <? */ ?>

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
                                                <div class="title">Penetapan RKAP 2023</div>
                                                <div class="nilai"><span>AI</span>10.380</div>
                                                <div class="nilai"><span>AKI</span>5.287</div>
                                                <div class="title">Realisasi s/d Agustus 2023</div>
                                                <div class="nilai"><span>AI</span>5.963</div>
                                                <div class="nilai"><span>AKI</span>1.566</div>
                                                <div class="title">Prognosa s/d Desember 2023</div>
                                                <div class="nilai"><span>AI</span>8.513</div>
                                                <div class="nilai"><span>AKI</span>4.059</div>
                                                <div class="title">% Realisasi Agustus thd RKAP 2023</div>
                                                <div class="nilai"><span>AI</span>57%</div>
                                                <div class="nilai"><span>AKI</span>30%</div>
                                                <div class="title">% Prognosa thd RKAP 2023</div>
                                                <div class="nilai"><span>Prog AI</span>82%</div>
                                                <div class="nilai"><span>Prog AKI</span>77%</div>
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
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="area-penyerapan-ai">
                            
                            <div class="inner">
                                <div class="caption">Penyerapan AI s/d Agustus 2023 :</div>
                                <section class="penyerapan slider">
                                    <div>
                                        <div class="item">
                                            <div class="title">Total terkontrak </div>
                                            <div class="nilai">Rp5.963 M</div>
                                            <div class="keterangan">dari Penetapan RKAP 2023</div>
                                            <div class="persentase">57<span>%<span></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="item">
                                            <div class="title">Total terdisburse</div>
                                            <div class="nilai">Rp1.566 M</div>
                                            <div class="keterangan">dari Penetapan RKAP 2023</div>
                                            <div class="persentase">30<span>%</span></div>
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
                                <span>per Agt 2023 
                                terhadap target 2023</span>
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


        Highcharts.chart('container', {
            // chart: {
            //     type: 'column'
            // },
            // xAxis: {
            //     categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            // },

            // plotOptions: {
            //         column: {
            //             grouping: false,
            //             borderRadiusTopLeft: 10,
            //                 borderRadiusTopRight: 10
            //         }
            //     },

            // series: [{
            //     data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
            // }]

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
                        formatter: function () {
                            return Highcharts.numberFormat(this.y,1) + '%';;
                        }
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
                data: [49.9, 71.5, 106.4],
                color: "#03a9f4"

            }, {
                name: 'AKI',
                data: [83.6, 78.8, 98.5],
                color: "#66a2a3"

            }]
        });
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
  
  
});
</script>

        

