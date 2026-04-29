<?php
include_once("functions/string.func.php");
include_once("functions/date.func.php");
?>
<!-- <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"> -->
  <!-- <title>Highcharts Fullscreen Modal</title> -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> -->
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

  <style>
    .area-grafik-bpp {
        background-image: linear-gradient(to right, #c8ecfa, #FFFFFF);
        border-radius: 40px;
        padding: 20px;
        margin-bottom: 15px;
        overflow: hidden;
        border: 1px solid rgba(255,255,255,0.1);
        height: calc(50vh - 40px);
        position: relative;
    }
    .area-grafik-bpp .grafik {
        height: calc(100% - 120px);
    }
    .judul button {
        background: transparent;
        border: none;
        cursor: pointer;
    }
    .area-grafik-bpp .judul {
      text-align: center;
    }
    .area-grafik-bpp .area-tabel-legend table {
      width: 100%;
      border-collapse: collapse;
    }
    .area-grafik-bpp .area-tabel-legend td, 
    .area-grafik-bpp .area-tabel-legend th {
      border: 1px solid #ccc;
      /*padding: 4px 6px;*/
      padding: 3px 5px;
      /*font-size: 10px;*/
      font-size: 7.5pt;
    }
    .area-tabel-legend th {
      /*background-color: #cfebf8;*/
      /*border-color: #93c6dc !important;*/
      
      background-color: #333333;
      color: #FFFFFF;
      text-align: center;
      
    }
    .area-tabel-legend td {
      background-color: #FFFFFF;
    }

    /****/
     /*   */
    .area-tabel-legend tr:nth-child(1) td:nth-child(1) {
      /*background-color: #2c5f7f;*/
      /*background-color: #f19938;*/
      background-color: #800000;
      color: #FFFFFF;
    } 
    .area-tabel-legend tr:nth-child(2) td:nth-child(1) {
      background-color: #00a2e9;
      color: #FFFFFF;
    } 
    .area-tabel-legend tr:nth-child(3) td:nth-child(1) {
      background-color: #32b3eb;
      color: #FFFFFF;
    } 
    .area-tabel-legend tr:nth-child(4) td:nth-child(1) {
      background-color: #63c4ee;
      color: #FFFFFF;
    } 
    .area-tabel-legend tr:nth-child(5) td:nth-child(1) {
      background-color: #9ed8f1;
      color: #FFFFFF;
    } 

    /* #2c5f7f , #00a2e9 , #32b3eb , #63c4ee , #9ed8f1 */

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
    #jQueryModal .area-grafik-bpp {
      /*background: #fff !important;    */
      background-image: linear-gradient(to right, #c8ecfa, #FFFFFF);
      border-radius: 40px;
      /*border-radius: 0 !important;    */
      /*border: none !important;        */
      border: 1px solid #c8ecfa;
      height: auto !important;        
      min-height: calc(90vh + 30px);               
      padding: 30px !important;
      margin-bottom: 0px;       
    }
    #jQueryModal .area-grafik-bpp .grafik {
      height: calc(70vh - 20px) !important;        
    }
    #jQueryModal .openModalBtn {
      display: none;
    }
    #jQueryModal .area-grafik-bpp .area-tabel-legend th,
    #jQueryModal .area-grafik-bpp .area-tabel-legend td {
      /*background-color: #FFFFFF;*/
      font-size: 13px;
    }
    #jQueryModal .highcharts-axis-labels.highcharts-xaxis-labels text {
        font-size: 14px !important; /* Adjust the pixel value as needed */
        /*color: red !important;*/
    }
    #jQueryModal .highcharts-axis-labels {
        font-size: 18px !important; /* Adjust the value as needed */
        /* Other font styles can also be applied here, e.g., font-weight: bold; */
        /*color: green !important;*/
        font-weight: bold !important;
    }
    #jQueryModal .highcharts-legend-item text {
        font-size: 14px !important; /* Adjust this value as needed */
        /*color: blue !important;*/
    }
    #jQueryModal .highcharts-axis-labels.highcharts-xaxis-labels text {
        /*font-size: 15px !important; /* Adjust the pixel value as needed */
    }
    #jQueryModal .highcharts-label.highcharts-data-label text { 
      /*font-size: 14px !important; /* Adjust the pixel value as needed */*/
    }
    #jQueryModal .highcharts-data-label { 
      font-size: 16px !important; /* Adjust the pixel value as needed */
    }
    .highcharts-scrollable-mask {
      fill: none !important;
      /* or fill: transparent !important; */
    }

  </style>
<!-- </head>
<body> -->

<section id="services" class="services section-padding home">
  <div class="container-fluid">
    <div class="row services-wrapper">

      <!-- Chart 1 -->
      <div class="col-md-6">
        <div class="services-item">
          <div class="area-grafik-bpp">
            <div class="judul">
              HPP vs BPP PLTA ASAHAN 1 vs BRANTAS, CIRATA 2017 - 2025
              <button class="pull-right openModalBtn"><i class="fa fa-search-plus"></i></button>
            </div>
            <div id="grafik-hpp-bpp-1" class="grafik contains-chart"></div>
            <div class="area-tabel-legend">
              <table>
                <thead>
                  <tr>
                    <th>KET</th>
                    <th>2017</th><th>2018</th><th>2019</th><th>2020</th><th>2021</th>
                    <th>2022</th><th>2023</th><th>2024</th><th>MAR&nbsp;2025</th><th>JUN&nbsp;2025</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>HPP PLTA ASAHAN 1 (BDSN 180mw)</td>
                    <td align="right">517.70</td><td align="right">544.85</td><td align="right">502.39</td><td align="right">514.52</td><td align="right">506.93</td>
                    <td align="right">563.96</td><td align="right">545.48</td><td align="right">559.29</td><td align="right">793.64</td><td align="right">563.62</td>
                  </tr>
                  <tr>
                    <td>BPP PLTA BRANTAS (NP 190MW)</td>
                    <td align="right">1178.87</td><td align="right">1374.92</td><td align="right">440.86</td><td align="right">356.66</td><td align="right">303.66</td>
                    <td align="right">270.88</td><td align="right">314.71</td><td align="right">341.01</td><td align="right">260.46</td><td align="right">266.44</td>
                  </tr>
                  <tr>
                    <td>
                      <div class="text-container">
                        <span class="truncated-text">BPP PLTA CIRATA (NP 948MW)</span>
                      </div>
                    </td>
                    <td align="right">452.19</td><td align="right">593.95</td><td align="right">774.25</td><td align="right">511.20</td><td align="right">497.64</td>
                    <td align="right">386.87</td><td align="right">474.09</td><td align="right">441.94</td><td align="right">372.63</td><td align="right">373.87</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- Chart 2 -->
      <div class="col-md-6">
        <div class="services-item">
          <div class="area-grafik-bpp">
            <div class="judul">
              HPP vs BPP PLTU CILACAP 1 vs PAITON 2017 - 2025
              <button class="pull-right openModalBtn"><i class="fa fa-search-plus"></i></button>
            </div>
            <div id="grafik-hpp-bpp-2" class="grafik contains-chart" style="height: calc(100% - 100px);"></div>
            <div class="area-tabel-legend">
              <table>
                <thead>
                  <tr>
                    <th>KET</th><th>2017</th><th>2018</th><th>2019</th><th>2020</th><th>2021</th><th>2022</th><th>2023</th><th>2024</th><th>MAR&nbsp;2025</th><th>JUN&nbsp;2025</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>HPP PLTU CILACAP (S2P 2.260MW)</td>
                    <td align="right">1,007.33</td><td align="right">961.18</td><td align="right">1,016.62</td><td align="right">1,009.93</td><td align="right">967.62</td>
                    <td align="right">1,103.28</td><td align="right">1,216.09</td><td align="right">1,307.54</td><td align="right">1,377.56</td><td align="right">1,336.59</td>
                  </tr>
                  <tr>
                    <td>BPP PLTU PAITON (NP 1.355MW)</td>
                    <td align="right">509.83</td><td align="right">532.64</td><td align="right">545.30</td><td align="right">500.71</td><td align="right">555.89</td>
                    <td align="right">633.94</td><td align="right">695.22</td><td align="right">746.36</td><td align="right">756.81</td><td align="right">764.79</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- Chart 3 -->
      <div class="col-md-6">
        <div class="services-item">
          <div class="area-grafik-bpp">
            <div class="judul">
              HPP vs BPP PLTU BANJARSARI vs TENAYAN 2017 - 2025
              <button class="pull-right openModalBtn"><i class="fa fa-search-plus"></i></button>
            </div>
            <div id="grafik-hpp-bpp-3" class="grafik contains-chart" style="height: calc(100% - 100px);"></div>
            <div class="area-tabel-legend">
              <table>
                <thead>
                  <tr>
                    <th>KET</th><th>2017</th><th>2018</th><th>2019</th><th>2020</th><th>2021</th><th>2022</th><th>2023</th><th>2024</th><th>MAR 2025</th><th>JUN 2025</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>HPP PLTU BANJARSARI (BPI 270MW)</td>
                    <td align="right">1,228.84</td><td align="right">1,138.43</td><td align="right">926.24</td><td align="right">926.11</td><td align="right">759.12</td>
                    <td align="right">754.95</td><td align="right">717.76</td><td align="right">732.83</td><td align="right">746.12</td><td align="right">637.07</td>
                  </tr>
                  <tr>
                    <td>BPP PLTU TENAYAN 1&2 (NP 262MW)</td>
                    <td align="right">641.21</td><td align="right">918.90</td><td align="right">912.72</td><td align="right">901.88</td><td align="right">1,040.79</td>
                    <td align="right">1,194.66</td><td align="right">1,287.45</td><td align="right">1,366.92</td><td align="right">1,389.67</td><td align="right">1,344.98</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- Chart 4 -->
      <div class="col-md-6">
        <div class="services-item">
          <div class="area-grafik-bpp">
            <div class="judul">
              HPP vs BPP PLTU JAWA 7 vs RMG,AWR,IDY,PCN 2017 - 2025
              <button class="pull-right openModalBtn"><i class="fa fa-search-plus"></i></button>
            </div>
            <div id="grafik-hpp-bpp-4" class="grafik contains-chart" style="height: calc(100% - 170px);"></div>
            <div class="area-tabel-legend">
              <table>
                <thead>
                  <tr>
                    <th>KET</th><th>2017</th><th>2018</th><th>2019</th><th>2020</th><th>2021</th><th>2022</th><th>2023</th><th>2024</th><th>MAR 2025</th><th>JUN 2025</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>HPP PLTU JAWA 7 (SGPJB 2.100MW)</td>
                    <td align="right"> </td><td align="right"> </td><td align="right"> </td><td align="right">836.34</td><td align="right">571.22</td><td align="right">654.85</td>
                    <td align="right">647.49</td><td align="right">668.23</td><td align="right">546.94</td><td align="right">556.41</td>
                  </tr>
                  <tr>
                    <td>BPP PLTU REMBANG (NP 560MW)</td>
                    <td align="right">635.38</td><td align="right">569.33</td><td align="right">497.74</td><td align="right">519.96</td><td align="right">485.22</td>
                    <td align="right">583.29</td><td align="right">733.77</td><td align="right">780.18</td><td align="right">832.12</td><td align="right">813.27</td>
                  </tr>
                  <tr>
                    <td>BPP PLTU AWAR-AWAR (NP 646MW)</td>
                    <td align="right">615.71</td><td align="right">604.89</td><td align="right">574.78</td><td align="right">566.38</td><td align="right">604.86</td>
                    <td align="right">692.97</td><td align="right">733.51</td><td align="right">755.20</td><td align="right">736.24</td><td align="right">780.78</td>
                  </tr>
                  <tr>
                    <td>BPP PLTU INDRAMAYU (NP 870MW)</td>
                    <td align="right">523.47</td><td align="right">555.50</td><td align="right">558.77</td><td align="right">519.18</td><td align="right">609.34</td>
                    <td align="right">719.00</td><td align="right">759.29</td><td align="right">833.66</td><td align="right">872.99</td><td align="right">875.01</td>
                  </tr>
                  <tr>
                    <td>BPP PLTU PACITAN (NP 560MW)</td>
                    <td align="right">613.12</td><td align="right">708.10</td><td align="right">619.79</td><td align="right">612.53</td><td align="right">695.82</td>
                    <td align="right">764.22</td><td align="right">789.38</td><td align="right">838.63</td><td align="right">879.22</td><td align="right">859.80</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- HIGHCHARTS -->
<script src="lib/highcharts/highcharts.js"></script>
<script src="lib/highcharts/exporting.js"></script>
<script src="lib/highcharts/accessibility.js"></script>
<script src="lib/highcharts/export-data.js"></script>

<script>
  // simpan semua konfigurasi chart
  const chartConfigs = {
    "grafik-hpp-bpp-1": {
      chart: {
        backgroundColor: null,
        type: 'column' // Change this from 'line' to 'column'
      },
      exporting: { enabled: false },
      title: { text: null },
      xAxis: { categories: ['2017','2018','2019','2020','2021','2022','2023','2024','Maret 2025','Juni 2025'], labels: { style: { fontSize: '12px' } } },
      yAxis: { title: { text: null }, labels: { style: { fontSize: '12px' } } },
      // legend: { layout: 'vertical', align: 'right', verticalAlign: 'middle', itemStyle: { fontSize: '13px' } },
      legend: {
        layout: 'vertical', 
        align: 'right', 
        verticalAlign: 'middle', 
        itemStyle: {
          fontSize: '10px'
        } ,
        enabled: false
      },
      plotOptions: {
        series: {
            // pointWidth: 15,
            // groupPadding: 0.05
        },
        column: {
        //     // maxPointWidth: 50, // Ensures columns do not exceed 50px in width
        //     pointWidth: 20, // Sets a fixed width of 20 pixels for each column
            groupPadding: 0.1, // Adjusts padding between groups of bars
        //     pointPadding: 0.1, // Adjusts padding between individual bars
        //     // pointWidth: 120,
        }
      },
      tooltip: {
          style: {
              fontSize: '14px' // Set your desired font size here
          }
      },
      series: [
          {
            name: 'HPP PLTA ASAHAN 1 (BDSN 180MW)', 
            data: [517.70,544.85,502.39,514.52,506.93,563.96,545.48,559.29,793.64,563.62], 
            color: '#800000', 
            // color: {
            //     linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 }, // Vertical gradient
            //     stops: [
            //         [0, '#85acc5'], // Light blue at the top
            //         [1, '#2c5f7f']  // Steel blue at the bottom
            //     ]
            // },
            lineWidth: 2,
            dataLabels: {
                enabled: true, // Enable data labels
                rotation: -90,
                verticalAlign: 'top', // Align to the top of the bar
                align: 'right', // Center horizontally relative to the bar
                y: 5, // Optional: adjust vertical position slightly above the bar
                inside: true,
                // align: 'high',
                
                format: '{point.y}', // Display the y-value
                style: {
                  fontSize: '11px', // Set font size to 14px
                  // color: '#333'
                }
            }
          },
          { name: 'BPP PLTA BRANTAS (NP 190 MW)', data: [1178.87,1374.92,440.86,356.66,303.66,270.88,314.71,341.01,260.46,266.44], 
            color: '#00a2e9', 
            // color: {
            //     linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 }, // Vertical gradient
            //     stops: [
            //         [0, '#ebc5b1'], // Light blue at the top
            //         [1, '#da7742']  // Steel blue at the bottom
            //     ]
            // },
            lineWidth: 2,
            dataLabels: {
                enabled: true, // Enable data labels
                rotation: -90,
                verticalAlign: 'top', // Align to the top of the bar
                align: 'right', // Center horizontally relative to the bar
                y: 5, // Optional: adjust vertical position slightly above the bar
                inside: true,
                // align: 'high',
                
                format: '{point.y}', // Display the y-value
                style: {
                  fontSize: '11px', // Set font size to 14px
                  // color: '#333'
                }
            }
          },
          { name: 'BPP PLTA CIRATA (NP 948MW)', data: [452.19,593.95,774.25,511.20,497.64,386.87,474.09,441.94,372.63,373.87], 
            color: '#32b3eb', 
            // color: {
            //     linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 }, // Vertical gradient
            //     stops: [
            //         [0, '#acd6a7'], // Light blue at the top
            //         [1, '#34692e']  // Steel blue at the bottom
            //     ]
            // },
            lineWidth: 2,
            dataLabels: {
                enabled: true, // Enable data labels
                rotation: -90,
                verticalAlign: 'top', // Align to the top of the bar
                align: 'right', // Center horizontally relative to the bar
                y: 5, // Optional: adjust vertical position slightly above the bar
                inside: true,
                // align: 'high',
                
                format: '{point.y}', // Display the y-value
                style: {
                  fontSize: '11px', // Set font size to 14px
                  // color: '#333'
                }
            }
          }
      ]
    },


    "grafik-hpp-bpp-2": {
      chart: { backgroundColor: null, type: 'column' },
      exporting: { enabled: false },
      title: { text: null },
      xAxis: { categories: ['2017','2018','2019','2020','2021','2022','2023','2024','Maret 2025','Juni 2025'], labels: { style: { fontSize: '12px' } } },
      yAxis: { title: { text: null }, labels: { style: { fontSize: '12px' } } },
      // legend: { layout: 'vertical', align: 'right', verticalAlign: 'middle', itemStyle: { fontSize: '13px' } },
      legend: {
        layout: 'vertical', 
        align: 'right', 
        verticalAlign: 'middle', 
        itemStyle: {
          fontSize: '10px'
        } ,
        enabled: false
      },
      tooltip: {
          style: {
              fontSize: '14px' // Set your desired font size here
          }
      },
      
      series: [
          { name: 'HPP PLTU CILACAP 1', data: [1007.33,  961.18,  1016.62,  1009.93,  967.62,  1103.28,  1216.09,  1307.54,  1377.56,  1336.59], color: '#800000', lineWidth: 2,
            dataLabels: {
                enabled: true, // Enable data labels
                rotation: -90,
                verticalAlign: 'top', // Align to the top of the bar
                align: 'right', // Center horizontally relative to the bar
                y: 5, // Optional: adjust vertical position slightly above the bar
                inside: true,
                // align: 'high',
                
                format: '{point.y}', // Display the y-value
                style: {
                  fontSize: '11px', // Set font size to 14px
                  // color: '#333'
                }
            }
          },
          { name: 'BPP PLTU PAITON', data: [509.83,  532.64,  545.30,  500.71,  555.89,  633.94,  695.22,  746.36,  756.81,  764.79], color: '#00a2e9', lineWidth: 2,
            dataLabels: {
                enabled: true, // Enable data labels
                rotation: -90,
                verticalAlign: 'top', // Align to the top of the bar
                align: 'right', // Center horizontally relative to the bar
                y: 5, // Optional: adjust vertical position slightly above the bar
                inside: true,
                // align: 'high',
                
                format: '{point.y}', // Display the y-value
                style: {
                  fontSize: '11px', // Set font size to 14px
                  // color: '#333'
                }
            }
          }
      ]
    },

    
    "grafik-hpp-bpp-3": {
      chart: { backgroundColor: null, type: 'column' },
      exporting: { enabled: false },
      title: { text: null },
      xAxis: { categories: ['2017','2018','2019','2020','2021','2022','2023','2024','Maret 2025','Juni 2025'], labels: { style: { fontSize: '12px' } } },
      yAxis: { title: { text: null }, labels: { style: { fontSize: '12px' } } },
      // legend: { layout: 'vertical', align: 'right', verticalAlign: 'middle', itemStyle: { fontSize: '13px' } },
      legend: {
        layout: 'vertical', 
        align: 'right', 
        verticalAlign: 'middle', 
        itemStyle: {
          fontSize: '10px'
        } ,
        enabled: false
      },
      tooltip: {
          style: {
              fontSize: '14px' // Set your desired font size here
          }
      },
      
      series: [
          { name: 'HPP PLTU BANJARSARI', data: [1228.84,  1138.43,  926.24,  926.11,  759.12,  754.95,  717.76,  732.83,  746.12,  637.07], color: '#800000', lineWidth: 2,
            dataLabels: {
                enabled: true, // Enable data labels
                rotation: -90,
                verticalAlign: 'top', // Align to the top of the bar
                align: 'right', // Center horizontally relative to the bar
                y: 5, // Optional: adjust vertical position slightly above the bar
                inside: true,
                // align: 'high',
                
                format: '{point.y}', // Display the y-value
                style: {
                  fontSize: '11px', // Set font size to 14px
                  // color: '#333'
                }
            }
          },
          { name: 'BPP PLTU TENAYAN', data: [641.21,  918.90,  912.72,  901.88,  1040.79,  1194.66,  1287.45,  1366.92,  1389.67,  1344.98], color: '#00a2e9', lineWidth: 2,
            dataLabels: {
                enabled: true, // Enable data labels
                rotation: -90,
                verticalAlign: 'top', // Align to the top of the bar
                align: 'right', // Center horizontally relative to the bar
                y: 5, // Optional: adjust vertical position slightly above the bar
                inside: true,
                // align: 'high',

                format: '{point.y}', // Display the y-value
                style: {
                  fontSize: '11px', // Set font size to 14px
                  // color: '#333'
                }
            }
          }
      ]
    },

    "grafik-hpp-bpp-4": {
      chart: {
        backgroundColor: null, 
        type: 'column' ,
        scrollablePlotArea: {
          minWidth: 1000, // Minimum width of the plot area, triggering scroll if smaller
          scrollPositionX: 0, // Optional: initial scroll position
        }
      },
      navigator: {
          enabled: true
      },
      exporting: { enabled: false },
      title: { text: null },
      xAxis: {
        scrollbar: {
            enabled: true
        },
        categories: ['2017','2018','2019','2020','2021','2022','2023','2024','Maret 2025','Juni 2025'] , labels: { style: { fontSize: '12px' } }
      },
      yAxis: {
        title: { text: null }, labels: { style: { fontSize: '12px' } } ,
        labels: {
            // Set the background color to transparent
            style: {
                backgroundColor: "red"
            }
        }
      },
      legend: {
        layout: 'vertical', 
        align: 'right', 
        verticalAlign: 'middle', 
        itemStyle: {
          fontSize: '10px'
        } ,
        enabled: false
      },
      plotOptions: {
        // series: {
            // pointWidth: 15,
            // groupPadding: 0.05
        // },
        column: {
        //     // maxPointWidth: 50, // Ensures columns do not exceed 50px in width
        //     pointWidth: 20, // Sets a fixed width of 20 pixels for each column
            groupPadding: 0.03, // Adjusts padding between groups of bars
        //     pointPadding: 0.1, // Adjusts padding between individual bars
        //     // pointWidth: 120,
        }
      },
      tooltip: {
          style: {
              fontSize: '14px' // Set your desired font size here
          }
      },
      
      series: [
          { name: 'HPP PLTU JAWA 7', data: [0,      0,      0,      836.34,  571.22,  654.85,  647.49,  668.23,  546.94,  556.41], color: '#800000', lineWidth: 2,
            // groupPadding: 0.1, // Adjusts padding between groups of bars
            // pointPadding: 0.2, // Adjusts padding between individual bars
            // pointWidth: 30,

            dataLabels: {
                enabled: true, // Enable data labels
                rotation: -90,
                verticalAlign: 'top', // Align to the top of the bar
                align: 'right', // Center horizontally relative to the bar
                y: 5, // Optional: adjust vertical position slightly above the bar
                inside: true,
                // align: 'high',
                
                format: '{point.y}', // Display the y-value
                style: {
                  fontSize: '11px', // Set font size to 14px
                  // color: '#333'
                },
                formatter: function () {
                    // Approximate character width (adjust as needed)
                    const charWidth = 26;
                    const labelWidth = this.point.name.length * charWidth; 
                    const barWidth = this.point.shapeArgs.width; // Get the actual bar width

                    if (labelWidth > barWidth) {
                        return ''; // Hide the label if it's too wide
                    }
                    return this.y;
                }
            }
          },
          { name: 'BPP PLTU REMBANG', data: [635.38,  569.33,  497.74,  519.96,  485.22,  583.29,  733.77,  780.18,  832.12,  813.27], color: '#00a2e9', lineWidth: 2,
            // groupPadding: 0.1, // Adjusts padding between groups of bars
            // pointPadding: 0.2, // Adjusts padding between individual bars
            // pointWidth: 30,
            dataLabels: {
                enabled: true, // Enable data labels
                rotation: -90,
                verticalAlign: 'top', // Align to the top of the bar
                align: 'right', // Center horizontally relative to the bar
                y: 5, // Optional: adjust vertical position slightly above the bar
                inside: true,
                // align: 'high',
                
                format: '{point.y}', // Display the y-value
                style: {
                  fontSize: '11px', // Set font size to 14px
                  // color: '#333'
                },
                formatter: function () {
                    // Approximate character width (adjust as needed)
                    const charWidth = 26;
                    const labelWidth = this.point.name.length * charWidth; 
                    const barWidth = this.point.shapeArgs.width; // Get the actual bar width

                    if (labelWidth > barWidth) {
                        return ''; // Hide the label if it's too wide
                    }
                    return this.y;
                }
            }
          },
          { name: 'BPP PLTU AWAR-AWAR', data: [615.71,  604.89,  574.78,  566.38,  604.86,  692.97,  733.51,  755.20,  736.24,  780.78], color: '#32b3eb', lineWidth: 2, 
            // groupPadding: 0.1, // Adjusts padding between groups of bars
            // pointPadding: 0.2, // Adjusts padding between individual bars
            // pointWidth: 30,
            dataLabels: {
                enabled: true, // Enable data labels
                rotation: -90,
                verticalAlign: 'top', // Align to the top of the bar
                align: 'right', // Center horizontally relative to the bar
                y: 5, // Optional: adjust vertical position slightly above the bar
                inside: true,
                // align: 'high',
                
                format: '{point.y}', // Display the y-value
                style: {
                  fontSize: '11px', // Set font size to 14px
                  // color: '#333'
                },
                formatter: function () {
                    // Approximate character width (adjust as needed)
                    const charWidth = 26;
                    const labelWidth = this.point.name.length * charWidth; 
                    const barWidth = this.point.shapeArgs.width; // Get the actual bar width

                    if (labelWidth > barWidth) {
                        return ''; // Hide the label if it's too wide
                    }
                    return this.y;
                }
            }
          },
          { name: 'BPP PLTU INDRAMAYU', data: [523.47,  555.50,  558.77,  519.18,  609.34,  719.00,  759.29,  833.66,  872.99,  875.01], color: '#63c4ee', lineWidth: 2,
            // groupPadding: 0.1, // Adjusts padding between groups of bars
            // pointPadding: 0.2, // Adjusts padding between individual bars
            // pointWidth: 30,
            dataLabels: {
                enabled: true, // Enable data labels
                rotation: -90,
                verticalAlign: 'top', // Align to the top of the bar
                align: 'right', // Center horizontally relative to the bar
                y: 5, // Optional: adjust vertical position slightly above the bar
                inside: true,
                // align: 'high',
                
                format: '{point.y}', // Display the y-value
                style: {
                  fontSize: '11px', // Set font size to 14px
                  // color: '#333'
                },
                formatter: function () {
                    // Approximate character width (adjust as needed)
                    const charWidth = 26;
                    const labelWidth = this.point.name.length * charWidth; 
                    const barWidth = this.point.shapeArgs.width; // Get the actual bar width

                    if (labelWidth > barWidth) {
                        return ''; // Hide the label if it's too wide
                    }
                    return this.y;
                }
            }
          },
          { name: 'BPP PLTU PACITAN', data: [613.12,  708.10,  619.79,  612.53,  695.82,  764.22,  789.38,  838.63,  879.22,  859.80], color: '#9ed8f1', lineWidth: 2,
            // groupPadding: 0.1, // Adjusts padding between groups of bars
            // pointPadding: 0.2, // Adjusts padding between individual bars
            // pointWidth: 30,
            dataLabels: {
                enabled: true, // Enable data labels
                rotation: -90,
                verticalAlign: 'top', // Align to the top of the bar
                align: 'right', // Center horizontally relative to the bar
                y: 5, // Optional: adjust vertical position slightly above the bar
                inside: true,
                // align: 'high',
                
                format: '{point.y}', // Display the y-value
                style: {
                  fontSize: '11px', // Set font size to 14px
                  // color: '#333'
                },
                formatter: function () {
                    // Approximate character width (adjust as needed)
                    const charWidth = 26;
                    const labelWidth = this.point.name.length * charWidth; 
                    const barWidth = this.point.shapeArgs.width; // Get the actual bar width

                    if (labelWidth > barWidth) {
                        return ''; // Hide the label if it's too wide
                    }
                    return this.y;
                }
            }
          }

      ]
    }
  };

  // render semua chart utama
  Object.keys(chartConfigs).forEach(id => {
    Highcharts.chart(id, chartConfigs[id]);
  });

  // Modal logic
  $(document).ready(function () {
    $(".openModalBtn").click(function () {
        let parentArea = $(this).closest(".area-grafik-bpp");
        let clonedContent = parentArea.clone();

        $("#jQueryModal").css("display", "block");
        $("#modalContentContainer").html(clonedContent);

        // render ulang chart di modal
        $("#modalContentContainer .grafik").each(function () {
            let chartId = $(this).attr("id");
            let newId = chartId + "-modal";
            $(this).attr("id", newId);

            if (chartConfigs[chartId]) {
                Highcharts.chart(newId, chartConfigs[chartId]);
            }
        });
        
        Object.keys(chartConfigs).forEach(id => {
          Highcharts.chart(id, chartConfigs[id]);
        });
    });

    $(".close-btn").click(function () { closeModal(); });
    $(window).click(function (event) {
        if ($(event.target).is("#jQueryModal")) { closeModal(); }
    });

    function closeModal() {
        $("#jQueryModal").css("display", "none");
        $("#modalContentContainer").html("");
    }
            $('#vlsxloading').hide();
  });
</script>

<!-- Modal Fullscreen -->
<div id="jQueryModal" class="modal">
  <div class="modal-content">
    <span class="close-btn">&times;</span>
    <div id="modalContentContainer"></div>
  </div>
</div>

<!-- </body>
</html>
 -->