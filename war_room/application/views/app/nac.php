<?php
include_once("functions/string.func.php");
include_once("functions/date.func.php");


?>
<style>
    .area-grafik-bpp {
        background-image: linear-gradient(to right, #c8ecfa, #FFFFFF);

        /*-webkit-border-radius: 40px;
        -webkit-border-bottom-right-radius: 15px;
        -moz-border-radius: 40px;
        -moz-border-radius-bottomright: 15px;
        border-radius: 40px;
        border-bottom-right-radius: 15px;*/

        -webkit-border-radius: 40px;
        -moz-border-radius: 40px;
        border-radius: 40px;

        padding: 20px;
        margin-bottom: 15px;
        overflow: hidden;

        border: 1px solid rgba(255,255,255,0.1);
        /*height: calc(50vh - 40px);*/
        height: calc(100vh - 70px);
        position: relative;
    }
    .area-grafik-bpp .grafik {
        height: calc(100% - 20px);
    }
    .area-informasi-halaman {
        /*background: rgba(24,157,184,0.2);*/
        /*padding: 20px;*/
        height: calc(100vh - 70px);

        -webkit-border-radius: 40px;
        -moz-border-radius: 40px;
        border-radius: 40px;

        overflow: hidden;
        position: relative;

        /*border-image: linear-gradient(to right, #3acfd5 0%, #3a4ed5 100%) 1;*/
        /*border-radius: 5px; /* this doesn't work */
        /*border-width: 4px;*/
        /*border-style: solid;*/
        padding: 1px;

        /*width: 300px;*/
        /*height: 80px;*/
        border: solid 1px transparent;
        /*border-radius: 30px;*/
        background-image: linear-gradient(#1e4a59, #102a30),
                    linear-gradient(to right, #3acfd5, #3a4ed5);
        background-origin: border-box;
        background-clip: content-box, border-box;
    }
    .area-informasi-halaman .inner {
        padding: 20px;

        /*text-align: justify;*/
    }
    .area-informasi-halaman .inner p {
        font-size: 18px;
        color: white;
        /*font-size: 24px;*/
    }
    .area-informasi-halaman .keterangan {
        display: inline-block;
        widows: 100%;
        background: #f4f4f4;
        color: #333333;
        padding: 15px;
        margin-top: 10px;

        /*-webkit-border-radius: 20px;
        -moz-border-radius: 20px;
        border-radius: 20px;*/

        -webkit-border-radius: 20px;
        -webkit-border-top-left-radius: 10px;
        -moz-border-radius: 20px;
        -moz-border-radius-topleft: 10px;
        border-radius: 20px;
        border-top-left-radius: 10px;
    }
    .area-informasi-halaman .gambar {
        position: absolute;
        bottom: 1px;
        right: 0;
        left: auto;
        /*border: 1px solid red;*/

        background-color: rgba(0,0,0,0); /* For browsers that do not support gradients */
        background-image: linear-gradient(rgba(0,0,0,0), rgba(0,0,0,0.7));
    }
    .area-informasi-halaman .gambar img {
        width: 120%;
    }


</style>

<!-- Services Section Start -->
<section id="services" class="services section-padding home">
    <div class="container-fluid">
        <div class="row services-wrapper">
            <div class="col-md-12">
                <div class="area-breadcrumb pull-left">
                    <ul class="breadcrumb">
                    <li><a href="app"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                    <!-- <li><a href="#">Peta Pembangkit</a></li>
                    <li><a href="#">Summer 15</a></li> -->
                    <li>NAC</li>
                    </ul>
                </div>
            </div>
            <!-- Services item -->
            <div class="col-md-12">
                <div id="printableArea">
                    <div class="services-item wow fadeInDown" data-wow-delay="0.2s">
                        <div class="area-grafik-bpp">
                            <div class="judul">BPP dan NAC per Unit Kit (dalam milyar rupiah)</div>
                            <div id="grafik-nac" class="grafik"></div>
                            <!-- <div id="container" class="grafik"></div> -->
                        </div>
                    </div>
                </div>
            </div>
           <!--  <div class="col-md-2">
                <div class="services-item wow fadeInDown" data-wow-delay="0.4s">
                    <div class="area-informasi-halaman">
                        <div class="judul">
                            <img src="images/img-quote.png" width="100">
                        </div>
                        <div class="row inner">
                            <div class="col-md-12">
                                <p id='keterangan'>
                                </p>

                            </div>
                        </div>
                        <div class="gambar">
                            <img src="images/img-kincir-angin.png">
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</section>
<!-- Services Section End -->

<!-- HIGHCHARTS -->
<script src="lib/highcharts/highcharts.js"></script>
<script src="lib/highcharts/exporting.js"></script>
<script src="lib/highcharts/accessibility.js"></script>
<script src="lib/highcharts/export-data.js"></script>
<!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->
<!-- <script src="https://code.highcharts.com/modules/scrollbar.js"></script> -->

<!-- NAC -->
<style>
    #grafik-nac {

    }
</style>
<script>



    $(document).ready(function () {
        dataJson();
        $('#vlsxloading').hide();
    });



    $("#bln,#thn").on('change',function(){
      $('#vlsxloading').show();

      bln= parseInt($("#bln").val());
      thn= parseInt($("#thn").val());

      dataJson();
    });

    function dataJson(){
        bln = parseInt($("#bln").val());
        thn = parseInt($("#thn").val());

        $.ajax({
            url : 'json-api/Bpp_nac_json/home?bln='+bln+'&thn='+thn,
            type : 'GET',
            dataType : 'text',
            success : function(text) {
                text = JSON.parse(text);
                kode_distrik = text["kode_distrik"];
                executive_summary = text["executive_summary"];
                bpp_korporat = parseFloat(text["bpp_korporat"]);
                bpp = text["bpp"].map(Number);
                nac_kat_a = text["nac_kat_a"].map(Number);
                nac_kat_b = text["nac_kat_b"].map(Number);

                $('#keterangan').html(executive_summary);

                Highcharts.chart('grafik-nac', {
                    chart: {
                        backgroundColor: null,
                        type: 'column',
                        scrollablePlotArea: {
                            maxWidth: 500,
                            scrollPositionX: 0
                        }
                    },
                    exporting: { enabled: false },
                    scrollbar: {
                        enabled: true,
                        showFull: true,
                        liveRedraw: true
                    },
                    title: { text: null },
                    xAxis: {
                        categories: kode_distrik,
                        labels: {
                            style: { fontSize: '12px' }
                        }
                    },
                    yAxis: [{
                        title: { text: null },
                        labels: {
                            style: { fontSize: '12px' },
                            formatter: function () {
                                // ubah ke satuan juta (M)
                                return this.value + ' M';
                            }
                        }
                    }, {
                        title: { text: null },
                        opposite: true, // sumbu kanan
                        labels: {
                            style: { fontSize: '12px' },
                            formatter: function () {
                                // tambahkan satuan kWh
                                return this.value + ' Rp/KwH';
                            }
                        },
                        plotLines: [{
                            value: bpp_korporat, // garis horizontal
                            color: '#7f7f7f',
                            width: 2,
                            dashStyle: 'Dash',
                            label: {
                                text: '<span style="background-color:#333;padding:3px 5px;display:inline-block;">'+bpp_korporat+'</span>',
                                useHTML: true,
                                align: 'right',
                                style: {
                                    fontSize: '12px',
                                    color: 'yellow'
                                }
                            }
                        }]
                    }],
                    legend: {
                        shadow: false,
                        itemStyle: { fontSize: '12px' }
                    },
                    tooltip: { shared: true },
                    plotOptions: {
                        line: { lineWidth: 4 },
                        series: {
                            dataLabels: {
                                enabled: true,
                                style: { fontSize: '12px' }
                            }
                        },
                        column: {
                            stacking: 'normal',
                            dataLabels: {
                                enabled: true,
                                style: { fontSize: '12px' }
                            },
                            borderWidth: 0
                        }
                    },
                    series: [{
                        name: 'KAT A',
                        type: 'column',
                        data: nac_kat_a,
                        color: '#b0b9c3'
                    }, {
                        name: 'KAT B',
                        type: 'column',
                        data: nac_kat_b,
                        color: '#214760'
                    }, {
                        name: 'BPP (Rp/kWh)',
                        type: 'line',
                        yAxis: 1, // pakai sumbu kanan
                        data: bpp,
                        marker: {
                            lineWidth: 2,
                            lineColor: Highcharts.getOptions().colors[3],
                            fillColor: 'white'
                        }
                    }]
                });
                $('#vlsxloading').hide();
            }
        });
    }

</script>
