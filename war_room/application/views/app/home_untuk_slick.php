<?php
include_once("functions/string.func.php");
include_once("functions/date.func.php");
?>
<?  ?>
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

        <style type="text/css">
          section.regular.slider {
              
          }
          iframe {
              
              border: none;
              display: block;
              width: 100%;
              height: calc(100vh - 60px);
          }
          .slick-prev.slick-arrow,
          .slick-next.slick-arrow {
              z-index: 1;
              top: calc(50% - 10px);
          }
          .slick-prev.slick-arrow {
              left: -10px;
          }
          .slick-next.slick-arrow {
              right: -10px;
          }
          .slick-prev::before, 
          .slick-next::before {
              color: #f6cd2f !important;
          }
      </style>

    </head>

    <body class="dark">

        <div class="main">
          <!-- <div class="slider slider-for">
            <div><h3>1</h3></div>
            <div><h3>2</h3></div>
            <div><h3>3</h3></div>
            <div><h3>4</h3></div>
            <div><h3>5</h3></div>
          </div> -->
          <div class="slider slider-nav" style="visibility: hidden; height: 0px; margin-bottom: 0px;">
            <div><h3>1</h3></div>
            <div><h3>2</h3></div>
            <div><h3>3</h3></div>
            <div><h3>4</h3></div>
            <div><h3>5</h3></div>
            <div><h3>6</h3></div>
            <div><h3>7</h3></div>
            <div><h3>8</h3></div>
            <div><h3>9</h3></div>
            <div><h3>10</h3></div>
          </div>
          <!-- <div class="action">
            <a href="#" data-slide="1">Home</a>
            <a href="#" data-slide="2">Peta Pembangkit</a>
            <a href="#" data-slide="3">Penjualan</a>
            <a href="#" data-slide="4">Kesiapan Pembangkit</a>
          </div> -->
        </div>

        <section class="regular slider slider-for">
            <div>
                <!-- <iframe id="myFrame1" onclick="rubahMode('myFrame1')" src="app/loadUrl/app/home_slide"></iframe> -->
                <iframe id="myFrame" src="app/loadUrl/app/home_slide"></iframe>
                <!-- <iframe id="myFrame" src="app/loadUrl/app/home"></iframe> -->
            </div>
            <!-- <div>
                <iframe src="app/loadUrl/app/peta_pembangkit"></iframe>
            </div>
            <div>
                <iframe src="app/loadUrl/app/kesiapan_pembangkit"></iframe>
            </div> -->

            <!-- KINERJA OPERASI -->
            <div>
                <iframe src="app/loadUrl/app/peta_pembangkit_slide"></iframe>
            </div>
            <div>
                <iframe src="app/loadUrl/app/penjualan_slide"></iframe>
            </div>
            <div>
                <iframe src="app/loadUrl/app/kesiapan_pembangkit_slide"></iframe>
            </div>

            <!-- Kinerja Keuangan -->
            <!-- <div>
                <iframe src="app/loadUrl/app/kinerja_korporat_slide"></iframe>
            </div>
            <div>
                <iframe src="app/loadUrl/app/kinerja_keuangan_korporat_slide"></iframe>
            </div>
            <div>
                <iframe src="app/loadUrl/app/kpi_keuangan_slide"></iframe>
            </div> -->
                
                
            <!-- Kinerja Niaga -->
            <!-- <div>
                <iframe src="app/loadUrl/app/kinerja_proyek_slide"></iframe>
            </div>
            <div>
                <iframe src="app/loadUrl/app/rekap_realisasi_ai_slide"></iframe>
            </div>
            <div>
                <iframe src="app/loadUrl/app/rekap_mou_slide"></iframe>
            </div> -->

        </section>







        

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
        <script>window.jQuery || document.write('<script src="assets/bootstrap-3.3.7/docs/assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="assets/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="assets/bootstrap-3.3.7/docs/assets/js/ie10-viewport-bug-workaround.js"></script>

        <!-- SLICK -->
        <link rel="stylesheet" type="text/css" href="lib/slick-1.8.1/slick/slick.css">
        <link rel="stylesheet" type="text/css" href="lib/slick-1.8.1/slick/slick-theme.css">
        <style type="text/css">
          .slider {
              width: 100%;
              margin: 0px auto;
          }

          .slick-slide {
            margin: 0px 0px;
          }

          .slick-slide img {
            width: 100%;
            height: calc(100vh - 100px);
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
      <!-- <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script> -->
        <script src="lib/slick-1.8.1/slick/slick.js" type="text/javascript" charset="utf-8"></script>
        <script type="text/javascript">
          // $(document).on('ready', function() {
          //   $(".regular").slick({
          //     dots: false,
          //     infinite: true,
          //     slidesToShow: 1,
          //     slidesToScroll: 1,
          //     // slidesToShow: 3,
          //     // slidesToScroll: 1,
          //     autoplay: false,
          //     autoplaySpeed: 2000,
          //     // arrows: false
          //   });
          // });
      </script>

      <script type="text/javascript">
          $(function() {
              
              var $slideshow = $('.slider-for');
              // var ImagePauses = [6000, 2000, 3000, 10000, 4000];
              var ImagePauses = [10000];

              // Init
              $slideshow.slick({
                initialSlide: 0,
                autoplay: true,
                autoplaySpeed: ImagePauses[0],
                dots: false,
                // fade: true
              });

              // Sliding settings
              $slideshow.on('afterChange', function(event, slick, currentSlide) {
                // Console log, can be removed
                console.log('Current slide: ' + currentSlide + '. Setting speed to: ' + ImagePauses[currentSlide]);

                // Update autoplay speed according to slide index
                $slideshow.slick('slickSetOption', 'autoplaySpeed', ImagePauses[currentSlide], true);
              });
          });
          // $('.slider-for').slick({
          //     slidesToShow: 1,
          //     slidesToScroll: 1,
          //     arrows: false,
          //     // fade: true,
          //     asNavFor: '.slider-nav',
          //     autoplay: true,
          //     autoplaySpeed: 2000,
          // });
          $('.slider-nav').slick({
              slidesToShow: 3,
              slidesToScroll: 1,
              asNavFor: '.slider-for',
              dots: true,
              focusOnSelect: true
          });

          $('a[data-slide]').click(function(e) {
              e.preventDefault();
              var slideno = $(this).data('slide');
              $('.slider-nav').slick('slickGoTo', slideno - 1);
          });
      </script>

      <script type="text/javascript">
            // $(document).on('ready', function() {

            //   $slideshow.on('afterChange', function(event, slick, currentSlide) {
            //       $slideshow.slick('slickSetOption', 'autoplaySpeed', ImagePauses[currentSlide], true);
            //   });

            //   $(".regular").slick({
            //     dots: false,
            //     infinite: true,
            //     slidesToShow: 1,
            //     slidesToScroll: 1,
            //     autoplay: true,
            //     autoplaySpeed: 2000,
            //   });
            // });


          </script>

    </body>
</html>
<?  ?>



