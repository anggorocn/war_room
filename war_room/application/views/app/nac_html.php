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
            <div class="col-md-10">
                <div class="services-item wow fadeInDown" data-wow-delay="0.2s">
                    <div class="area-grafik-bpp">
                        <div class="judul">BPP dan NAC per Unit Kit (dalam milyar rupiah)</div>
                        <div id="grafik-nac" class="grafik"></div>
                        <!-- <div id="container" class="grafik"></div> -->
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="services-item wow fadeInDown" data-wow-delay="0.4s">
                    <div class="area-informasi-halaman">
                        <div class="judul">
                            <img src="images/img-quote.png" width="100">
                            <!-- <span class="ikon"><img src="images/icon-penjualan.png"></span> Keterangan -->
                            <!-- <a class="selengkapnya pull-right" href="app/index/penjualan"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a> -->
                        </div>
                        <div class="row inner">
                            <div class="col-md-12">
                                <p>Terdapat 15 unit (dari 31) dengan BPP > BPP korporat, <span class="keterangan">dimana 7 unitnya merupakan 10 besar NAC</span></p>
                                
                            </div>
                        </div>
                        <div class="gambar">
                            <img src="images/img-kincir-angin.png">
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
<!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->
<!-- <script src="https://code.highcharts.com/modules/scrollbar.js"></script> -->

<!-- NAC -->
<style>
    #grafik-nac {
      
    }
</style>
<script>
    Highcharts.chart('grafik-nac', {
        chart: {
            backgroundColor: null,
            type: 'column',
            scrollablePlotArea: {
                // minWidth: 1000, // Adjust this based on your data and column width
                maxWidth: 500, // Adjust this based on your data and column width
                scrollPositionX: 0
            }
        },
        exporting: {
            enabled: false
        },
        scrollbar: {
            enabled: true, // Enable the scrollbar
            showFull: true, // Display the full scrollbar, not just the handle
            liveRedraw: true, // Redraw the chart while scrolling
            // Other scrollbar-specific options like height, barBackgroundColor, etc.
        },
      title: {
        text: null
      },
      xAxis: {
        categories: [
            'SGRK', 'SPTN', 'UPMK', 'UPMT', 'UPBW', 'UBRS', 'UPNR', 'UPBA', 'UCRT', 'UPSB', 
            'UPPR', 'UJIN', 'SGRK', 'SPTN', 'UPMK', 'UPMT', 'UPBW', 'UBRS', 'UPNR', 'UPBA', 
            'UCRT', 'UPSB', 'UPPR', 'UJIN', 'SGRK', 'SPTN', 'UPMK', 'UPMT', 'UPBW', 'UBRS', 
            'UPNR', 'UPBA', 'UCRT', 'UPSB', 'UPPR', 'UJIN', 'UCRT', 'UPSB', 'UPPR', 'UJIN'
        ],
        labels: {
            style: {
                // color: 'white', // Sets the color of the x-axis labels
                fontSize: '12px'
            }
        }
      },
      yAxis: [{
        title: {
          text: null
        },
        labels: {
            style: {
                // color: 'white', // Sets the color of the x-axis labels
                fontSize: '12px'
            }
        },
        plotLines: [{
            value: 3.3, // The y-axis value where the plot line will be drawn
            color: '#7f7f7f', // Color of the plot line
            width: 2, // Width of the plot line
            dashStyle: 'Dash', // Set the dash style (e.g., 'Solid', 'Dot', 'Dash', 'LongDash', etc.)
            label: {
                text: '<span style="background-color: #333; padding: 3px 5px; display: inline-block;">3.3</span>',
                align: 'left',
                // x: 10,
                useHTML: true, // Enable HTML rendering for the label
                // text: '3.3', // Optional label for the plot line
                // align: 'left',
                x: -35,
                style: {
                    fontSize: '12px',
                    color: 'yellow'
                }
            }
        }]
      }, {
        title: {
          text: null
        },
        opposite: true, // Display on the right side
        labels: {
            style: {
                // color: 'white', // Sets the color of the x-axis labels
                fontSize: '12px'
            }
        }
      }],
      legend: {
        shadow: false,
        itemStyle: {
            fontSize: '12px', // Set the desired font size here
            // color: 'white'
        }
      },
      tooltip: {
        shared: true
      },
      plotOptions: {
        line: {
            lineWidth: 4 // Sets default line width for all line series
        },
        series: {
            dataLabels: {
                enabled: true,
                style: {
                    fontSize: '12px' // Set the desired font size
                }
            }
        },
        column: {
            stacking: 'normal',
            dataLabels: {
                enabled: true, // Enable data labels
                // Optional customizations:
                // color: 'black',
                // inside: true,
                // align: 'left',
                // format: '{point.y:.1f}' // Format the value
                style: {
                    fontSize: '12px' // Set the desired font size
                }
            },
            borderWidth: 0, // This removes the border
            // pointWidth: 40 // Sets column width to 20 pixels
        }
      },  
      series: [{
        name: 'KAT A',
        type: 'column',
        data: [
            5, 3, 4, 7, 2, 8, 4, 3, 5, 2, 
            7, 9, 5, 3, 4, 7, 2, 8, 4, 3, 
            5, 2, 7, 9, 5, 3, 4, 7, 2, 8, 
            4, 3, 5, 2, 7, 9, 5, 3, 4, 7
        ],
        color: '#b0b9c3'
      }, {
        name: 'KAT B',
        type: 'column',
        data: [
            2, 2, 3, 2, 1, 5, 6, 2, 3, 4, 
            1, 3, 2, 2, 3, 2, 1, 5, 6, 2, 
            4, 1, 3, 2, 2, 3, 2, 1, 5, 6, 
            3, 4, 1, 3, 2, 2, 3, 2, 1, 5, 
        ],
        color: '#214760'
      }, {
        name: 'BPP (Rp/kWh)',
        type: 'line',
        yAxis: 1, // Link to the right yAxis
        data: [
            3, 2.67, 3, 6.33, 3.33, 4.2, 5, 2.8, 4.3, 3, 
            4.1, 5.5, 3, 2.67, 3, 6.33, 3.33, 4.2, 5, 2.8, 
            4.3, 3, 4.1, 5.5, 3, 2.67, 3, 6.33, 3.33, 4.2, 
            5, 2.8, 4.3, 3, 4.1, 5.5, 3, 2.67, 3, 6.33
        ],
        marker: {
          lineWidth: 2,
          lineColor: Highcharts.getOptions().colors[3],
          fillColor: 'white'
        }
      }]
    });
    
    $(document).ready(function () {
    
         $('#vlsxloading').hide();
    
    });
</script>