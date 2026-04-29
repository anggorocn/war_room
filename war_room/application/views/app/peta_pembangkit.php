<!-- <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA==" crossorigin=""></script> -->
<script src="js/leaflet.js" type="text/javascript" charset="utf-8"></script>
    <!-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css" /> -->
    <link rel="stylesheet" type="text/css" href="lib/leaflet/leaflet.css">
<!-- <script src="https://unpkg.com/jquery"></script> -->
<?php
include_once("functions/string.func.php");
include_once("functions/date.func.php");

$vtoday= getFormattedDate(date("Y-m-d"));
$b = $this->input->get("b");
$t = $this->input->get("t");

if(empty($b)) $b=date("m")-1;
if(empty($t)) $t=date("Y");
?>
<style type="text/css">
    .gmnoprint{
        display: none;
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
</style>

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
  margin: 0px 20px;
}

.slick-slide img {
  width: 100%;
}

.slick-prev:before,
.slick-next:before {
  color: red;
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
.none{
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
				<li><a id="" href="app/index/home"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
				<!-- <li><a href="#">Peta Pembangkit</a></li>
				<li><a href="#">Summer 15</a></li> -->
				<li>Peta Pembangkit</li>
				</ul> 
			</div>
    	</div>
      <!-- Services item -->
      <div class="col-md-6 col-lg-7 col-xs-12 padding-none">
        <div class="services-item wow fadeInDown" data-wow-delay="0.2s">
            <div class="area-peta-pembangkit">
                <div class="row">
                    <div class="col-md-6">
                        <!-- <div class="logo-pln-np"><img src="images/logo.png"></div> -->
                        <div class="judul">Peta Pembangkit</div>
                    </div>
                    <div class="col-md-6">
                        <!-- <a class="selengkapnya pull-right" href="app/index/peta_pembangkit"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a> -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="area-peta detil">
                            <div id="map" style="height:100%;"></div>
                            <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16302015.452801218!2d113.25133303320045!3d-4.023621863404312!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c4c07d7496404b7%3A0xe37b4de71badf485!2sIndonesia!5e0!3m2!1sen!2sid!4v1693205882738!5m2!1sen!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                            <!-- <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=indonesia&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://gachanymph.com/">Gacha Nymph APK</a></div><style>.mapouter{position:relative;text-align:right;width:600px;height:400px;}.gmap_canvas {overflow:hidden;background:none!important;width:600px;height:400px;}.gmap_iframe {width:600px!important;height:400px!important;}</style></div> -->
                            <!-- <div class="judul"><i class="fa fa-map-marker" aria-hidden="true"></i> Peta Pembangkit</div>
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
                            </div> -->
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                              <div class="area-sumber-data">
                                  <label>Sumber data : <span>Navitas</span></label>
                                  <label>Last update : <span><?=$vtoday?></span></label>
                              </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <!-- Services item -->
      <div class="col-md-6 col-lg-5 col-xs-12">
        <div class="services-item wow fadeInDown" data-wow-delay="0.4s">
            <div class="area-jumlah-pembangkit">
                <div class="judul">
                    <span class="ikon" style="cursor: pointer;" onclick="filterPembangkit('')"><img src="images/icon-penjualan.png"></span> Jumlah Pembangkit
                    <!-- <a class="selengkapnya pull-right" href="app/index/penjualan"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a> -->
                </div>
                <div class="row inner" id='TextJenisPembangkit'>
                </div>
            </div>
        </div>
      </div>
	</div>
	<div class="row">
      <!-- Services item -->
      <div class="col-md-6 col-lg-3 col-xs-12 padding-none">
        <div class="services-item wow fadeInDown" data-wow-delay="0.6s">
            <!-- <div class="gambar-pekerja-pembangkit">
            	<div class="gambar"><img src="images/img-pekerja-pembangkit.png"></div>
            	<div class="judul"><span class="ikon"><img src="images/icon-list-pembangkit.png"></span> List Pembangkit</div>
            </div> -->
            <div class="row">
                <div class="col-md-12">
                    <div class="area-total-unit-daya">
                        <div class="area-total-unit">
                            <div class="ikon"><img src="images/icon-pembangkit.png"></div>
                            <div class="nilai" id='TotalUnit'></div>
                            <div class="title">Total Unit</div>
                        </div>
                        <div class="area-total-daya">
                            <div class="inner">
                                <div class="item">
                                    <div class="nilai" id='TotalDayaTerpasang'> </div>
                                    <div class="title">Total Daya Terpasang</div>
                                </div>
                                <div class="item mampu">
                                    <div class="nilai" id='TotalDayaMampu'></div>
                                    <div class="title">Total Daya Mampu</div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-9 col-xs-12 padding-none">
        <div class="services-item wow fadeInDown" data-wow-delay="0.8s">
        	<div class="area-list-pembangkit">
        		 <section class="regular slider" id='TextListPembangkit' style="width: 90%;">
				  </section>
        	</div>
        </div>
      </div>
    </div>
    
  </div>
</section>
<!-- Services Section End -->

<script src="lib/slick-1.8.1/slick/slick.js" type="text/javascript" charset="utf-8"></script>
<!-- <script src='https://maps.google.com/maps/api/js?'></script> -->
<!-- <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyBVxdDuDwdMa8Iq5FFZcrILAYyQ5zeVeXU'></script> -->



<!-- Modal -->
<div id='modal-template'>
    
</div>

<script type="text/javascript">
    $(document).on('ready', function() {
        loadData('')
    });
    function filterPembangkit(val){
        loadData(val)
    }

    var map;
    function loadData(val){

        $.ajax({
            url : 'json-api/PetaPembangkit_json/sub?filter='+val,
            type : 'GET',
            dataType : 'text', 
            beforeSend: function () {
                $('#vlsxloading').show();
            }
            ,
            success : function(text) {
                $('#vlsxloading').hide();
                $(".leaflet-marker-icon").addClass("no");
                text= JSON.parse(text)

                $('#TextJenisPembangkit').html(text['TextJenisPembangkit']);
                $('#TotalDayaTerpasang').html(text['TotalDayaTerpasang']);
                $('#TotalDayaMampu').html(text['TotalDayaMampu']);
                $('#TotalUnit').html(text['TotalUnit']);
                $('#modal-template').html(text['textPopup']);

                // untuk reset data
                if ($('.regular').hasClass('slick-initialized')) {
                    $('.regular').slick('destroy');
                }

                // lalu buat ulang
                $('#TextListPembangkit').html(text['TextListPembangkit']);
                slickCreate();

                var locations = text['textPetaPembangkit'];
                console.log(locations);
                
                // untuk reninit
                if (map != undefined)
                {
                    map.remove();
                }

                map = L.map('map').setView([-0.8917, 117.8707], 4);
                var OpenStreetMap_Mapnik = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(map);

                // Check is map already has this layer group
                // $(".leaflet-marker-icon").remove(); $(".leaflet-popup").remove();

                function addRowTable(code, coords){
                  var tr = document.createElement("tr");
                  var td = document.createElement("td");
                  td.textContent = code;
                  tr.appendChild(td);
                  tr.onclick = function(){map.flyTo(coords, 17);};
                }

                var buffers = [];
                function addMarker(code,lat,lng,color){
                    var pinColor = "FE7569";
                    if (color=='pltmh') 
                    {
                        pinColor = "189db8";
                    }
                    else if (color=='pltm') 
                    {
                        pinColor = "14647a";
                    }
                    else if (color=='pltd') 
                    {
                        pinColor = "18b8a0";
                    }
                    else if (color=='pltgu') 
                    {
                        pinColor = "2bb818";
                    }
                    else if (color=='plta') 
                    {
                        pinColor = "b8a318";
                    }
                    else if (color=='pltg') 
                    {
                        pinColor = "b87218";
                    }
                    else if (color=='pltmg') 
                    {
                        pinColor = "6318b8";
                    }
                    else if (color=='pltu') 
                    {
                        pinColor = "b818af";
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
                    addMarker(locations[i][0],locations[i][1],locations[i][2],locations[i][4]);
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

            }
        });
    }

    function slickCreate(){
        $(".regular").slick({
            dots: false,
            arrows: true,
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
        });
    }

    function slickCarousel() {
        $('.regular').slick({
            dots: false,
            arrows: true,
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
        });
    }
</script>