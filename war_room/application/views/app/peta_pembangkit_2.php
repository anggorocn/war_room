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
  opacity: .2;
}

.slick-active {
  opacity: .5;
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
				<li>Peta Pembangkit</li>
				</ul> 
			</div>
    	</div>
      <!-- Services item -->
      <div class="col-md-6 col-lg-6 col-xs-12 padding-none">
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
                    <div class="col-md-4">
                        <div class="area-total-unit">
                            <div class="ikon"><img src="images/icon-pembangkit.png"></div>
                            <div class="nilai">151</div>
                            <div class="title">Total Unit</div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="area-peta detil">
                            <div class="judul"><i class="fa fa-map-marker" aria-hidden="true"></i> Peta Pembangkit</div>
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="display: none;">
                    <div class="col-md-12">
                        <div class="area-jenis-pembangkit">
                            <div class="inner">
                                <div class="item">
                                    <div class="title">PLTMH</div>
                                    <div class="nilai">14 unit</div>
                                </div>
                                <div class="item">
                                    <div class="title">PLTM</div>
                                    <div class="nilai">7 unit</div>
                                </div>
                                <div class="item">
                                    <div class="title">PLTD</div>
                                    <div class="nilai">59 unit</div>
                                </div>
                                <div class="item">
                                    <div class="title">PLTGU</div>
                                    <div class="nilai">7 unit</div>
                                </div>
                                <div class="item">
                                    <div class="title">PLTA</div>
                                    <div class="nilai">21 unit</div>
                                </div>
                                <div class="item">
                                    <div class="title">PLTG</div>
                                    <div class="nilai">13 unit</div>
                                </div>
                                <div class="item">
                                    <div class="title">PLTMG</div>
                                    <div class="nilai">7 unit</div>
                                </div>
                                <div class="item">
                                    <div class="title">PLTU</div>
                                    <div class="nilai">23 unit</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <!-- Services item -->
      <div class="col-md-6 col-lg-6 col-xs-12">
        <div class="services-item wow fadeInDown" data-wow-delay="0.4s">
            <div class="area-jumlah-pembangkit">
                <div class="judul">
                    <span class="ikon"><img src="images/icon-penjualan.png"></span> Jumlah Pembangkit
                    <!-- <a class="selengkapnya pull-right" href="app/index/penjualan"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a> -->
                </div>
                <div class="row inner">
                    <div class="col-md-3 padding-none">
                        <div class="item">
                            <div class="caption">
                            	PLTMH
								<div class="jumlah">14 unit</div>
							</div>
							<div class="title">Daya Terpasang</div>
							<div class="nilai">14.62 MW</div>
							<div class="title">Daya Mampu</div>
							<div class="nilai">13.00 MW</div>
                        </div>
                    </div>
                    <div class="col-md-3 padding-none">
                        <div class="item">
                            <div class="caption">
                            	PLTMH
								<div class="jumlah">14 unit</div>
							</div>
							<div class="title">Daya Terpasang</div>
							<div class="nilai">14.62 MW</div>
							<div class="title">Daya Mampu</div>
							<div class="nilai">13.00 MW</div>
                        </div>
                    </div>
                    <div class="col-md-3 padding-none">
                        <div class="item">
                            <div class="caption">
                            	PLTMH
								<div class="jumlah">14 unit</div>
							</div>
							<div class="title">Daya Terpasang</div>
							<div class="nilai">14.62 MW</div>
							<div class="title">Daya Mampu</div>
							<div class="nilai">13.00 MW</div>
                        </div>
                    </div>
                    <div class="col-md-3 padding-none">
                        <div class="item">
                            <div class="caption">
                            	PLTMH
								<div class="jumlah">14 unit</div>
							</div>
							<div class="title">Daya Terpasang</div>
							<div class="nilai">14.62 MW</div>
							<div class="title">Daya Mampu</div>
							<div class="nilai">13.00 MW</div>
                        </div>
                    </div>
                    <div class="col-md-3 padding-none">
                        <div class="item">
                            <div class="caption">
                            	PLTMH
								<div class="jumlah">14 unit</div>
							</div>
							<div class="title">Daya Terpasang</div>
							<div class="nilai">14.62 MW</div>
							<div class="title">Daya Mampu</div>
							<div class="nilai">13.00 MW</div>
                        </div>
                    </div>
                    <div class="col-md-3 padding-none">
                        <div class="item">
                            <div class="caption">
                            	PLTMH
								<div class="jumlah">14 unit</div>
							</div>
							<div class="title">Daya Terpasang</div>
							<div class="nilai">14.62 MW</div>
							<div class="title">Daya Mampu</div>
							<div class="nilai">13.00 MW</div>
                        </div>
                    </div>
                    <div class="col-md-3 padding-none">
                        <div class="item">
                            <div class="caption">
                            	PLTMH
								<div class="jumlah">14 unit</div>
							</div>
							<div class="title">Daya Terpasang</div>
							<div class="nilai">14.62 MW</div>
							<div class="title">Daya Mampu</div>
							<div class="nilai">13.00 MW</div>
                        </div>
                    </div>
                    <div class="col-md-3 padding-none">
                        <div class="item">
                            <div class="caption">
                            	PLTMH
								<div class="jumlah">14 unit</div>
							</div>
							<div class="title">Daya Terpasang</div>
							<div class="nilai">14.62 MW</div>
							<div class="title">Daya Mampu</div>
							<div class="nilai">13.00 MW</div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
      </div>
	</div>
	<div class="row">
      <!-- Services item -->
      <div class="col-md-6 col-lg-2 col-xs-12 padding-none">
        <div class="services-item wow fadeInDown" data-wow-delay="0.6s">
            <div class="gambar-pekerja-pembangkit">
            	<div class="gambar"><img src="images/img-pekerja-pembangkit.png"></div>
            	<div class="judul"><span class="ikon"><img src="images/icon-list-pembangkit.png"></span> List Pembangkit</div>
            </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-10 col-xs-12 padding-none">
        <div class="services-item wow fadeInDown" data-wow-delay="0.6s">
        	<div class="area-list-pembangkit">
        		 <section class="regular slider">
				    <div>
				    	<div class="item">
				    		<div class="data">
					    		<div class="caption">PLTA BAKARU</div>
								<div class="title">Jenis Pembangkit</div>
								<div class="nilai">PLTA</div>
								<div class="title">Sistem</div>
								<div class="nilai">Sulbagsel</div>
								<div class="title">Provinsi</div>
								<div class="nilai">Sulawesi Selatan</div>
							</div>
							<div class="area-mesin">
								<div class="title">Mesin</div>
								<div class="nilai">PLTA BAKARU #01</div>
								<div class="title">Daya Terpasang</div>
								<div class="nilai">63000 KW</div>
								<div class="title">Tahun Operasi</div>
								<div class="nilai">1990</div>
								<div class="title">Bahan Bakar</div>
								<div class="nilai">Air</div>
							</div>
							<div class="clearfix"></div>
				    	</div>
				    </div>
				    <div>
				    	<div class="item">
				    		<div class="data">
					    		<div class="caption">PLTA BAKARU</div>
								<div class="title">Jenis Pembangkit</div>
								<div class="nilai">PLTA</div>
								<div class="title">Sistem</div>
								<div class="nilai">Sulbagsel</div>
								<div class="title">Provinsi</div>
								<div class="nilai">Sulawesi Selatan</div>
							</div>
							<div class="area-mesin">
								<div class="title">Mesin</div>
								<div class="nilai">PLTA BAKARU #01</div>
								<div class="title">Daya Terpasang</div>
								<div class="nilai">63000 KW</div>
								<div class="title">Tahun Operasi</div>
								<div class="nilai">1990</div>
								<div class="title">Bahan Bakar</div>
								<div class="nilai">Air</div>
							</div>
							<div class="clearfix"></div>
				    	</div>
				    </div>
				    <div>
				    	<div class="item">
				    		<div class="data">
					    		<div class="caption">PLTA BAKARU</div>
								<div class="title">Jenis Pembangkit</div>
								<div class="nilai">PLTA</div>
								<div class="title">Sistem</div>
								<div class="nilai">Sulbagsel</div>
								<div class="title">Provinsi</div>
								<div class="nilai">Sulawesi Selatan</div>
							</div>
							<div class="area-mesin">
								<div class="title">Mesin</div>
								<div class="nilai">PLTA BAKARU #01</div>
								<div class="title">Daya Terpasang</div>
								<div class="nilai">63000 KW</div>
								<div class="title">Tahun Operasi</div>
								<div class="nilai">1990</div>
								<div class="title">Bahan Bakar</div>
								<div class="nilai">Air</div>
							</div>
							<div class="clearfix"></div>
				    	</div>
				    </div>
				    <!-- <div>
				      <img src="http://placehold.it/350x300?text=2">
				    </div>
				    <div>
				      <img src="http://placehold.it/350x300?text=3">
				    </div>
				    <div>
				      <img src="http://placehold.it/350x300?text=4">
				    </div>
				    <div>
				      <img src="http://placehold.it/350x300?text=5">
				    </div>
				    <div>
				      <img src="http://placehold.it/350x300?text=6">
				    </div> -->
				  </section>
        	</div>
        </div>
      </div>
    </div>
    
  </div>
</section>
<!-- Services Section End -->

<!-- <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script> -->
  <script src="lib/slick-1.8.1/slick/slick.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
    $(document).on('ready', function() {

      $(".regular").slick({
        dots: false,
        arrows: false,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
  		autoplaySpeed: 2000,
      });

    });
</script>
