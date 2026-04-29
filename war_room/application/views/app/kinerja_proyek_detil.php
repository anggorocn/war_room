<?php
include_once("functions/string.func.php");
include_once("functions/date.func.php");

$vtoday= getFormattedDate(date("Y-m-d"));
$b = $this->input->get("b");
$t = $this->input->get("t");
$reqId = $this->input->get("reqId");

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
<style type="text/css">
/*html, body {
  margin: 0;
  padding: 0;
}

* {
  box-sizing: border-box;
}*/

.card{
  color: white;
}

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
  margin-top: 100px;
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
</style>

<!-- Services Section Start -->
<section id="services" class="services section-padding">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="area-breadcrumb pull-left">
                    <ul class="breadcrumb">
                    <li><a id="detilkembalihome" href="javascript:void(0)"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                    <li><a id="Indexdetilkinerjaproyek" href="javascript:void(0)"> Kinerja Proyek</a></li>
                    <!-- <li><a href="#">Peta Pembangkit</a></li>
                    <li><a href="#">Summer 15</a></li> -->
                    <li>Kinerja Proyek Detil</li>
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
                                    <span class="ikon"><img src="images/icon-kinerja-proyek.png"></span>
                                    <span id='project_name'>Kinerja Proyek</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="tab">
                          <button class="tablinks active" onclick="openCity(event, `Profil<?=$reqId?>`)">Profil</button>
                          <button class="tablinks" onclick="openCity(event, `Performance<?=$reqId?>`)">Performance</button>
                          <button class="tablinks" onclick="openCity(event, `Issue<?=$reqId?>`)">Issue</button>
                          <button class="tablinks" onclick="openCity(event, `Risk<?=$reqId?>`)">Risk</button>
                          <button class="tablinks" onclick="openCity(event, `Documentation<?=$reqId?>`)">Documentation</button>
                        </div>

                        <div id="Profil<?=$reqId?>" class="tabcontent" style="display: block;">
                          <p id='project_custom_info'></p>
                        </div>

                        <div id="Issue<?=$reqId?>" class="tabcontent">
                          <p id='project_custom_isulog'></p> 
                        </div>

                        <div id="Performance<?=$reqId?>" class="tabcontent">
                            <div id="popupchart<?=$reqId?>"></div>
                        </div>

                        <div id="Risk<?=$reqId?>" class="tabcontent">
                            <p id='risks'></p>
                        </div>
                        <div id="Documentation<?=$reqId?>" class="tabcontent">
                        </div>
                    </div>
                    <div class="area-sumber-data detil">
                        <label>Sumber data : <span>Prime</span></label>
                        <label>Last update : <span><?=$vtoday?></span></label>
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
$(document).on('ready', function() {
  $.ajax({
      url : 'json-api/KinerjaProyekAcn_json/detil?reqId=<?=$reqId?>',
      type : 'GET',
      dataType : 'text',
      success : function(text) {
          text= JSON.parse(text)
          $('#project_custom_info').html(text['project_custom_info']);
          $('#project_custom_isulog').html(text['project_custom_isulog']);
          $('#risks').html(text['risks']);
          $('#project_name').html('Kinerja Proyek '+text['project_name']);
          $('#vlsxloading').hide();
      }
  });
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
    url : 'json-api/KinerjaProyekAcn_json/createGrafik?valProyekId=<?=$reqId?>',
    type : 'GET',
    dataType : 'text',
    success : function(text) {
        text= JSON.parse(text);
        // console.log(text);
        // $('#'+cityName).html(text);
        Highcharts.chart('popupchart<?=$reqId?>', {
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
    url : 'json-api/KinerjaProyekAcn_json/documentation?setPage='+page+'&setcityName='+cityName+'&valProyekId=<?=$reqId?>',
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
