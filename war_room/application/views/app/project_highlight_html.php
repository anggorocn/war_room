<?php
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
                    <li>Project Highlight</li>
                    </ul> 
                </div>
            </div>
            <div class="col-md-12">
                <div class="area-wrapper" style="height: calc(100vh - 55px);">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="header-detil">
                                <div class="logo-pln-np pull-left"><img src="images/logo.png"></div>    
                                <div class="judul">
                                    <span class="ikon"><img src="images/icon-kesiapan-pembangkit.png"></span> Project Highlight
                                    <!-- <a class="selengkapnya pull-right" href="app/index/penjualan"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="area-monitoring-proyek-akuisisi">
                          <section class="regular slider">
                            <div>
                              <div class="item item-highlight" onclick="location.href='app/index/project_highlight_detil';">
                                <div class="caption">PLTA Batang Toru</div>
                                <div class="inner" onclick="LinkDetil(1)">
                                  <div class="capacity">
                                    <div class="ikon"><img src="images/icon-tower.png"></div>
                                    <div class="data">
                                      <div class="title">Capacity (MW)</div>
                                      <div class="capacity-nilai">510</div>
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>

                                  <div class="title">Lokasi</div>
                                  <div class="nilai">Desa Sipirok, 
                                    Kabupaten Tapanuli Selatan, 
                                    Provinsi Sumatera Utara
                                  </div>

                                  <div class="title">COD</div>
                                  <div class="nilai">16 September 2023 </div>
                                  
                                  <div class="title">Kontraktor EPC</div>
                                  <div class="nilai">
                                  - Onshore EPC :
                                    Powerchina Sinohydro - PT NEM
                                  - Offshore EPC : 
                                    Powerchina Huadong Design 
                                    Engineering Abu Dhabi
                                  </div>

                                  <div class="nilai-proyek">
                                    <div class="title">Nilai Proyek</div>
                                    <div class="nilai">USD 143.000.000</div>  
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div>
                              <div class="item item-highlight">
                                <div class="caption">PLTA Test 2</div>
                                <div class="inner" onclick="LinkDetil(1)">
                                  <div class="capacity">
                                    <div class="ikon"><img src="images/icon-tower.png"></div>
                                    <div class="data">
                                      <div class="title">Capacity (MW)</div>
                                      <div class="capacity-nilai">510</div>
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>

                                  <div class="title">Lokasi</div>
                                  <div class="nilai">Desa Sipirok, 
                                    Kabupaten Tapanuli Selatan, 
                                    Provinsi Sumatera Utara
                                  </div>

                                  <div class="title">COD</div>
                                  <div class="nilai">16 September 2023 </div>
                                  
                                  <div class="title">Kontraktor EPC</div>
                                  <div class="nilai">
                                  - Onshore EPC :
                                    Powerchina Sinohydro - PT NEM
                                  - Offshore EPC : 
                                    Powerchina Huadong Design 
                                    Engineering Abu Dhabi

                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
                                  </div>

                                  <div class="nilai-proyek">
                                    <div class="title">Nilai Proyek</div>
                                    <div class="nilai">USD 143.000.000</div>  
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div>
                              <div class="item item-highlight">
                                <div class="caption">PLTA Test 3</div>
                                <div class="inner" onclick="LinkDetil(1)">
                                  <div class="capacity">
                                    <div class="ikon"><img src="images/icon-tower.png"></div>
                                    <div class="data">
                                      <div class="title">Capacity (MW)</div>
                                      <div class="capacity-nilai">510</div>
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>

                                  <div class="title">Lokasi</div>
                                  <div class="nilai">Desa Sipirok, 
                                    Kabupaten Tapanuli Selatan, 
                                    Provinsi Sumatera Utara
                                  </div>

                                  <div class="title">COD</div>
                                  <div class="nilai">16 September 2023 </div>
                                  
                                  <div class="title">Kontraktor EPC</div>
                                  <div class="nilai">
                                  - Onshore EPC :
                                    Powerchina Sinohydro - PT NEM
                                  - Offshore EPC : 
                                    Powerchina Huadong Design 
                                    Engineering Abu Dhabi
                                  </div>

                                  <div class="nilai-proyek">
                                    <div class="title">Nilai Proyek</div>
                                    <div class="nilai">USD 143.000.000</div>  
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div>
                              <div class="item item-highlight">
                                <div class="caption">PLTA Test 4</div>
                                <div class="inner" onclick="LinkDetil(1)">
                                  <div class="capacity">
                                    <div class="ikon"><img src="images/icon-tower.png"></div>
                                    <div class="data">
                                      <div class="title">Capacity (MW)</div>
                                      <div class="capacity-nilai">510</div>
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>

                                  <div class="title">Lokasi</div>
                                  <div class="nilai">Desa Sipirok, 
                                    Kabupaten Tapanuli Selatan, 
                                    Provinsi Sumatera Utara
                                  </div>

                                  <div class="title">COD</div>
                                  <div class="nilai">16 September 2023 </div>
                                  
                                  <div class="title">Kontraktor EPC</div>
                                  <div class="nilai">
                                  - Onshore EPC :
                                    Powerchina Sinohydro - PT NEM
                                  - Offshore EPC : 
                                    Powerchina Huadong Design 
                                    Engineering Abu Dhabi
                                  </div>

                                  <div class="nilai-proyek">
                                    <div class="title">Nilai Proyek</div>
                                    <div class="nilai">USD 143.000.000</div>  
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div>
                              <div class="item item-highlight">
                                <div class="caption">PLTA Test 5</div>
                                <div class="inner" onclick="LinkDetil(1)">
                                  <div class="capacity">
                                    <div class="ikon"><img src="images/icon-tower.png"></div>
                                    <div class="data">
                                      <div class="title">Capacity (MW)</div>
                                      <div class="capacity-nilai">510</div>
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>

                                  <div class="title">Lokasi</div>
                                  <div class="nilai">Desa Sipirok, 
                                    Kabupaten Tapanuli Selatan, 
                                    Provinsi Sumatera Utara
                                  </div>

                                  <div class="title">COD</div>
                                  <div class="nilai">16 September 2023 </div>
                                  
                                  <div class="title">Kontraktor EPC</div>
                                  <div class="nilai">
                                  - Onshore EPC :
                                    Powerchina Sinohydro - PT NEM
                                  - Offshore EPC : 
                                    Powerchina Huadong Design 
                                    Engineering Abu Dhabi
                                  </div>

                                  <div class="nilai-proyek">
                                    <div class="title">Nilai Proyek</div>
                                    <div class="nilai">USD 143.000.000</div>  
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div>
                              <div class="item item-highlight">
                                <div class="caption">PLTA Test 6</div>
                                <div class="inner" onclick="LinkDetil(1)">
                                  <div class="capacity">
                                    <div class="ikon"><img src="images/icon-tower.png"></div>
                                    <div class="data">
                                      <div class="title">Capacity (MW)</div>
                                      <div class="capacity-nilai">510</div>
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>

                                  <div class="title">Lokasi</div>
                                  <div class="nilai">Desa Sipirok, 
                                    Kabupaten Tapanuli Selatan, 
                                    Provinsi Sumatera Utara
                                  </div>

                                  <div class="title">COD</div>
                                  <div class="nilai">16 September 2023 </div>
                                  
                                  <div class="title">Kontraktor EPC</div>
                                  <div class="nilai">
                                  - Onshore EPC :
                                    Powerchina Sinohydro - PT NEM
                                  - Offshore EPC : 
                                    Powerchina Huadong Design 
                                    Engineering Abu Dhabi
                                  </div>

                                  <div class="nilai-proyek">
                                    <div class="title">Nilai Proyek</div>
                                    <div class="nilai">USD 143.000.000</div>  
                                  </div>
                                </div>
                              </div>
                            </div>
                          </section>
                        </div>
                      </div>
                    </div>
                    <div class="area-sumber-data detil">
                      <label>Sumber data : <span>Prime</span></label>
                      <label>Last update : <span>4 Agustus 2023</span></label>
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
    $(".regular").slick({
      dots: false,
      infinite: true,
      slidesToShow: 5,
      slidesToScroll: 1,
      autoplay: false,
      autoplaySpeed: 2000,
    });


    $(document).on('ready', function() {
      $.ajax({
          url : 'json-api/KinerjaProyekAcn_json/highlight',
          type : 'GET',
          dataType : 'text',
          success : function(text) {
              text= JSON.parse(text)
              $('#listStatusLate').html(' Late ('+text["listStatusLate"]+')');
              $('#listStatusCompleted').html(' Completed ('+text["listStatusCompleted"]+')');
              $('#listStatusNotStarted').html(' Not Started ('+text["listStatusNotStarted"]+')');
              $('#listStatusOnSchedule').html(' On Schedule ('+text["listStatusOnSchedule"]+')');
              $('#drawDetil').html(text["drawDetil"]);
                $('#modal-template').html(text['textPopup']);

              $('#vlsxloading').hide();
          }
      });
});
</script>