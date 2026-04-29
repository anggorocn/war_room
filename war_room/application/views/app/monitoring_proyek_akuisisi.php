<?php
include_once("functions/string.func.php");
include_once("functions/date.func.php");

$vtoday= getFormattedDate(date("Y-m-d"));
$b = $this->input->get("b");
$t = $this->input->get("t");

if(empty($b)) $b=date("m")-1;
if(empty($t)) $t=date("Y");
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

<!-- SKILLSET -->
<link rel="stylesheet" href="lib/skillset/skillset.css" type="text/css" />
<script>
jQuery(document).ready(function(){
  jQuery('.skillbar').each(function(){
    jQuery(this).find('.skillbar-bar').animate({
      width:jQuery(this).attr('data-percent')
    },6000);
  });
});
</script>


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
                    <li>Monitoring Proyek Akuisisi</li>
                    </ul> 
                </div>
            </div>
            <div class="col-md-12">
                <div class="area-wrapper"  style="height: calc(100vh - 55px);">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="header-detil">
                                <!-- <div class="logo-pln-np pull-left"><img src="images/logo.png"></div>     -->
                                <div class="judul">
                                    <span class="ikon"><img src="images/icon-kesiapan-pembangkit.png"></span> OVERALL ACQUISITION ACTIVITY PROGRESS MONITORING
                                    <div class="pull-right" style="margin-right: 80px;">
                                      <input type="search" placeholder="Cari nama project..." id="cari">
                                      <div class="area-logout pull-right" style="cursor: pointer; margin-top: -5px;"><a onclick="cari()">Cari</a></div>
                                    </div>
                                    <!-- <a class="selengkapnya pull-right" href="app/index/penjualan"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="area-monitoring-proyek-akuisisi">
                          <section class="regular slider" id="item">
                          </section>
                        </div>
                      </div>
                    </div>
                    <div class="area-sumber-data detil">
                          <label>Sumber data : <span>Bid CRP </span></label>
                          <label>Last update : <span id='LastUpdate'></span></label>
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
    loadData('')
  });
// <!-- STAR -->
  // $("#favouriteButton").click(function() {
  //   $("#favouriteButton span").html(
  //   $("#favouriteButton span").html() == 
  //   '<i class="fa fa-star" aria-hidden="true"></i>' ? 
  //   '<i class="fa fa-star-o" aria-hidden="true"></i>' : 
  //   '<i class="fa fa-star" aria-hidden="true"></i>');
  // });

  function loadData(valcari){
    $.ajax({
      url : 'json-api/MaStatusAkuisisi_json/home?cari='+valcari,
      type : 'GET',
      dataType : 'text', 
      beforeSend: function () {
          $('#vlsxloading').show();
      }
      ,
      success : function(text) {
        $('#vlsxloading').hide();
        text= JSON.parse(text)

        $('#LastUpdate').html(text['LastUpdate']);

        if ($('.regular').hasClass('slick-initialized')) {
          $('.regular').slick('destroy');
        }

        // lalu buat ulang
        $('#item').html(text['item']);
        slickCreate();

        jQuery('.skillbar').each(function () {
          jQuery(this).find('.skillbar-bar').animate({ width: jQuery(this).attr('data-percent') }, 6000);
        });
      }
    });
  }

  function LinkDetil(val)
  {
    bln= parseInt($("#bln").val());
    thn= parseInt($("#thn").val());
    location.href = "app/index/monitoring_proyek_akuisisi_detil?b="+bln+"&t="+thn+"&reqNama="+val;
  }


   function slickCreate(){
        $(".regular").slick({
          dots: false,
          infinite: true,
          slidesToShow: 5,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 2000,
        });
    }

    function slickCarousel() {
        $('.regular').slick({
          dots: false,
          infinite: true,
          slidesToShow: 5,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 2000,
        });
    }

  function cari() {
    valcari=$("#cari").val();
     loadData(valcari)
   }

</script>