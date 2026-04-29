<?php
$vtoday= getFormattedDate(date("Y-m-d"));
include_once("functions/string.func.php");
include_once("functions/date.func.php");
?>
<!-- SLICK -->
<link rel="stylesheet" type="text/css" href="lib/slick-1.8.1/slick/slick.css">
<link rel="stylesheet" type="text/css" href="lib/slick-1.8.1/slick/slick-theme.css">
<style type="text/css">
  .slider {
      width: 100%;
      margin: 0px auto;
  }

  .slick-slide {
    margin: 0px 5px;
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
                    <li>Highlight Proyek</li>
                    </ul> 
                </div>
            </div>
            <div class="col-md-12">
                <div class="area-wrapper" style="height: calc(100vh - 55px);">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="header-detil">
                                <!-- <div class="logo-pln-np pull-left"><img src="images/logo.png"></div>     -->
                                <div class="judul">
                                    <span class="ikon"><img src="images/icon-kesiapan-pembangkit.png"></span> Highlight Proyek
                                    <!-- <a class="selengkapnya pull-right" href="app/index/penjualan"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="area-monitoring-proyek-akuisisi">
                          <section class="regular slider" id='output'>
                           
                          </section>
                        </div>
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

<!-- SLICK -->
<script src="lib/slick-1.8.1/slick/slick.js" type="text/javascript" charset="utf-8"></script>
 <script type="text/javascript">
  $(document).on('ready', function() {
    $.ajax({
        url : 'json-api/KinerjaProyekAcn_json/highlight',
        type : 'GET',
        dataType : 'text',
        success : function(text) {
            text= JSON.parse(text)
            $('#output').html(text["output"]);
            $('#vlsxloading').hide();
            $(".regular").slick({
              dots: false,
              infinite: true,
              slidesToShow: 5,
              slidesToScroll: 1,
              autoplay: false,
              autoplaySpeed: 2000,
            });
        }
    });
  });

  function callfunc(val){
    // console.log(val)
    bln= parseInt($("#bln").val());
    thn= parseInt($("#thn").val());
    document.location.href= "app/index/project_highlight_detil?b="+bln+"&t="+thn+"&v="+val;
  }
</script>