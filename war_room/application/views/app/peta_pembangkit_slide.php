<?php
include_once("functions/string.func.php");
include_once("functions/date.func.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- <link rel="icon" href="../../favicon.ico"> -->

        <title>Dashboard | PT PLN Nusantara Power</title>
        <base href="<?=base_url();?>" />

        <!-- Bootstrap core CSS -->
        <link href="assets/bootstrap-3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="assets/bootstrap-3.3.7/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <!-- <link href="assets/bootstrap-3.3.7/docs/examples/starter-template/starter-template.css" rel="stylesheet"> -->

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="assets/bootstrap-3.3.7/docs/assets/js/ie-emulation-modes-warning.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <script src='js/jquery.min.js'></script>

        <link rel="stylesheet" type="text/css" href="css/gaya.css">
        <link rel="stylesheet" type="text/css" href="lib/font-awesome-4.7.0/css/font-awesome.css">
    </head>

    <body class="dark">

<link rel="stylesheet" type="text/css" href="lib/slick-1.8.1/slick/slick.css">
<link rel="stylesheet" type="text/css" href="lib/slick-1.8.1/slick/slick-theme.css">
<style type="text/css">

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
      <div class="col-md-6 col-lg-7 col-xs-12 padding-none">
        <div class="services-item wow fadeInDown" data-wow-delay="0.2s">
            <div class="area-peta-pembangkit">
                <div class="row">
                    <div class="col-md-6">
                        <div class="logo-pln-np"><img src="images/logo.png"></div>
                    </div>
                    <div class="col-md-6">
                        <!-- <a class="selengkapnya pull-right" href="app/index/peta_pembangkit"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a> -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="area-peta detil">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16302015.452801218!2d113.25133303320045!3d-4.023621863404312!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c4c07d7496404b7%3A0xe37b4de71badf485!2sIndonesia!5e0!3m2!1sen!2sid!4v1693205882738!5m2!1sen!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                              <div class="area-sumber-data">
                                  <label>Sumber data : <span>Navitas</span></label>
                                  <label>Last update : <span>4 Agustus 2023</span></label>
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
                    <span class="ikon"><img src="images/icon-penjualan.png"></span> Jumlah Pembangkit
                    <!-- <a class="selengkapnya pull-right" href="app/index/penjualan"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a> -->
                </div>
                <div class="row inner">
                    <div class="col-md-3 padding-none">
                        <div class="item pltmh">
                            <div class="caption">
                            	<span>PLTMH</span>
								<div class="jumlah">14 unit</div>
							</div>
							<div class="title">Daya Terpasang</div>
							<div class="nilai">14.62 MW</div>
							<div class="title">Daya Mampu</div>
							<div class="nilai">13.00 MW</div>
                        </div>
                    </div>
                    <div class="col-md-3 padding-none">
                        <div class="item pltm">
                            <div class="caption">
                            	<span>PLTMH</span>
								<div class="jumlah">14 unit</div>
							</div>
							<div class="title">Daya Terpasang</div>
							<div class="nilai">14.62 MW</div>
							<div class="title">Daya Mampu</div>
							<div class="nilai">13.00 MW</div>
                        </div>
                    </div>
                    <div class="col-md-3 padding-none">
                        <div class="item pltd">
                            <div class="caption">
                            	<span>PLTMH</span>
								<div class="jumlah">14 unit</div>
							</div>
							<div class="title">Daya Terpasang</div>
							<div class="nilai">14.62 MW</div>
							<div class="title">Daya Mampu</div>
							<div class="nilai">13.00 MW</div>
                        </div>
                    </div>
                    <div class="col-md-3 padding-none">
                        <div class="item pltgu">
                            <div class="caption">
                            	<span>PLTMH</span>
								<div class="jumlah">14 unit</div>
							</div>
							<div class="title">Daya Terpasang</div>
							<div class="nilai">14.62 MW</div>
							<div class="title">Daya Mampu</div>
							<div class="nilai">13.00 MW</div>
                        </div>
                    </div>
                    <div class="col-md-3 padding-none">
                        <div class="item plta">
                            <div class="caption">
                            	<span>PLTMH</span>
								<div class="jumlah">14 unit</div>
							</div>
							<div class="title">Daya Terpasang</div>
							<div class="nilai">14.62 MW</div>
							<div class="title">Daya Mampu</div>
							<div class="nilai">13.00 MW</div>
                        </div>
                    </div>
                    <div class="col-md-3 padding-none">
                        <div class="item pltg">
                            <div class="caption">
                            	<span>PLTMH</span>
								<div class="jumlah">14 unit</div>
							</div>
							<div class="title">Daya Terpasang</div>
							<div class="nilai">14.62 MW</div>
							<div class="title">Daya Mampu</div>
							<div class="nilai">13.00 MW</div>
                        </div>
                    </div>
                    <div class="col-md-3 padding-none">
                        <div class="item pltmg">
                            <div class="caption">
                            	<span>PLTMH</span>
								<div class="jumlah">14 unit</div>
							</div>
							<div class="title">Daya Terpasang</div>
							<div class="nilai">14.62 MW</div>
							<div class="title">Daya Mampu</div>
							<div class="nilai">13.00 MW</div>
                        </div>
                    </div>
                    <div class="col-md-3 padding-none">
                        <div class="item pltu">
                            <div class="caption">
                            	<span>PLTMH</span>
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
      <div class="col-md-6 col-lg-3 col-xs-12 padding-none">
        <div class="services-item wow fadeInDown" data-wow-delay="0.6s">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="area-total-unit-daya">
                        <div class="area-total-unit">
                            <div class="ikon"><img src="images/icon-pembangkit.png"></div>
                            <div class="nilai">151</div>
                            <div class="title">Total Unit</div>
                        </div>
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
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-9 col-xs-12 padding-none">
        <div class="services-item wow fadeInDown" data-wow-delay="0.8s">
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
								<div class="title">Jumlah Mesin <span class="detil pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-info-circle" aria-hidden="true"></i></span></div>
								<div class="nilai">1</div>
								<div class="title">Daya Terpasang Total</div>
								<div class="nilai">63000 KW</div>
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
                                <div class="title">Jumlah Mesin <span class="detil pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-info-circle" aria-hidden="true"></i></span></div>
                                <div class="nilai">3</div>
                                <div class="title">Daya Terpasang Total</div>
                                <div class="nilai">63000 KW</div>
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
                                <div class="title">Jumlah Mesin <span class="detil pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-info-circle" aria-hidden="true"></i></span></div>
                                <div class="nilai">1</div>
                                <div class="title">Daya Terpasang Total</div>
                                <div class="nilai">63000 KW</div>
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
                                <div class="title">Jumlah Mesin <span class="detil pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-info-circle" aria-hidden="true"></i></span></div>
                                <div class="nilai">2</div>
                                <div class="title">Daya Terpasang Total</div>
                                <div class="nilai">63000 KW</div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
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

<!-- Trigger the modal with a button -->
<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Mesin</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="item-mesin">
                        <div class="title">Nama Mesin</div>
                        <div class="caption">PLTA BAKARU #01</div>
                        <div class="title">Daya Terpasang </div>
                        <div class="nilai">63000 KW       </div>
                        <div class="title">Tahun Operasi  </div>
                        <div class="nilai">1990           </div>
                        <div class="title">Bahan Bakar    </div>
                        <div class="nilai">Air            </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="item-mesin">
                        <div class="title">Nama Mesin</div>
                        <div class="caption">PLTA BAKARU #01</div>
                        <div class="title">Daya Terpasang </div>
                        <div class="nilai">63000 KW       </div>
                        <div class="title">Tahun Operasi  </div>
                        <div class="nilai">1990           </div>
                        <div class="title">Bahan Bakar    </div>
                        <div class="nilai">Air            </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="item-mesin">
                        <div class="title">Nama Mesin</div>
                        <div class="caption">PLTA BAKARU #01</div>
                        <div class="title">Daya Terpasang </div>
                        <div class="nilai">63000 KW       </div>
                        <div class="title">Tahun Operasi  </div>
                        <div class="nilai">1990           </div>
                        <div class="title">Bahan Bakar    </div>
                        <div class="nilai">Air            </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="item-mesin">
                        <div class="title">Nama Mesin</div>
                        <div class="caption">PLTA BAKARU #01</div>
                        <div class="title">Daya Terpasang </div>
                        <div class="nilai">63000 KW       </div>
                        <div class="title">Tahun Operasi  </div>
                        <div class="nilai">1990           </div>
                        <div class="title">Bahan Bakar    </div>
                        <div class="nilai">Air            </div>
                    </div>
                </div>
            </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
        <script>window.jQuery || document.write('<script src="assets/bootstrap-3.3.7/docs/assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="assets/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="assets/bootstrap-3.3.7/docs/assets/js/ie10-viewport-bug-workaround.js"></script>

    </body>
</html>
