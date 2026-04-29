<?php
include_once("functions/string.func.php");
include_once("functions/date.func.php");

$b = $this->input->get("b");
$t = $this->input->get("t");

if(empty($b)) $b=date("m")-1;
if(empty($t)) $t=date("Y");
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
                    <li><a id="detilkembalihome" href="javascript:void(0)"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                    <!-- <li><a href="#">Peta Pembangkit</a></li>
                    <li><a href="#">Summer 15</a></li> -->
                    <li>KPI Keuangan</li>
                    </ul> 
                </div>
            </div>

            <div class="col-md-12">
                <div class="area-wrapper">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="header-detil">
                                <!-- <div class="logo-pln-np pull-left"><img src="images/logo.png"></div>     -->
                                <div class="judul">
                                    <span class="ikon"><img src="images/icon-kpi-keuangan.png"></span> KPI Keuangan
                                    <!-- <a class="selengkapnya pull-right" href="app/index/penjualan"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a> -->
                                </div>
                            </div>
                            
                        </div>

                        <!-- Services item -->
                        <div class="col-md-6 col-lg-1 col-xs-12">
                          <div class="gambar-kpi-keuangan">
                            <img src="images/img-kpi-keuangan.png">
                          </div>
                        </div>

                        <!-- Services item -->
                        <div class="col-md-6 col-lg-3 col-xs-12">
                            <div class="services-item wow fadeInDown" data-wow-delay="0.6s">
                              <div class="area-komponen-kpi-keuangan">
                                <div class="inner" id='textKeuangan'>
                                  
                                  <div class="item">
                                    <div class="caption">BPP Pembangkit</div>
                                    <div class="data-wrapper">
                                      <div class="data">
                                        <div class="title">Realisasi</div>
                                        <div class="nilai">Rp1.008,83/kWh</div>
                                        <div class="title">Target</div>
                                        <div class="nilai">Rp1.366,29/kWh</div>
                                      </div>
                                      <div class="persen">
                                        110%
                                        <div class="tanda hijau"><span><i class="fa fa-circle" aria-hidden="true"></i></span></div>
                                      </div>
                                      <div class="clearfix"></div>
                                    </div>
                                  </div>

                                  <div class="item">
                                    <div class="caption">ROIC</div>
                                    <div class="data-wrapper">
                                      <div class="data">
                                        <div class="title">Realisasi</div>
                                        <div class="nilai">Rp1.008,83/kWh</div>
                                        <div class="title">Target</div>
                                        <div class="nilai">Rp1.366,29/kWh</div>
                                      </div>
                                      <div class="persen">
                                        85.04%
                                        <div class="tanda kuning"><span><i class="fa fa-circle" aria-hidden="true"></i></span></div>
                                      </div>
                                      <div class="clearfix"></div>
                                    </div>
                                  </div>

                                  <div class="item">
                                    <div class="caption">EBITDA</div>
                                    <div class="data-wrapper">
                                      <div class="data">
                                        <div class="title">Realisasi</div>
                                        <div class="nilai">Rp1.008,83/kWh</div>
                                        <div class="title">Target</div>
                                        <div class="nilai">Rp1.366,29/kWh</div>
                                      </div>
                                      <div class="persen">
                                        110%
                                        <div class="tanda hijau"><span><i class="fa fa-circle" aria-hidden="true"></i></span></div>
                                      </div>
                                      <div class="clearfix"></div>
                                    </div>
                                  </div>

                                  <div class="item">
                                    <div class="caption">Sinergi AP</div>
                                    <div class="data-wrapper">
                                      <div class="data">
                                        <div class="title">Realisasi</div>
                                        <div class="nilai">Rp1.008,83/kWh</div>
                                        <div class="title">Target</div>
                                        <div class="nilai">Rp1.366,29/kWh</div>
                                      </div>
                                      <div class="persen">
                                        110%
                                        <div class="tanda hijau"><span><i class="fa fa-circle" aria-hidden="true"></i></span></div>
                                      </div>
                                      <div class="clearfix"></div>
                                    </div>
                                  </div>

                                  <div class="item">
                                    <div class="caption">Pendapatan Diluar PLN Group</div>
                                    <div class="data-wrapper">
                                      <div class="data">
                                        <div class="title">Realisasi</div>
                                        <div class="nilai">Rp1.008,83/kWh</div>
                                        <div class="title">Target</div>
                                        <div class="nilai">Rp1.366,29/kWh</div>
                                      </div>
                                      <div class="persen">
                                        68.07%
                                        <div class="tanda merah"><span><i class="fa fa-circle" aria-hidden="true"></i></span></div>
                                      </div>
                                      <div class="clearfix"></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>

                        <!-- Services item -->
                        <div class="col-md-6 col-lg-8 col-xs-12">
                          <div class="services-item wow fadeInDown" data-wow-delay="0.6s" style="border: solid white 0.5px;border-radius: 41px;">
                            <div class="area-rasio" style="border: none;">
                              <div class="inner" id='textDetilKeuangan'></div>
                              
                            </div>
                            <div class="area-sumber-data detil" style="position: initial;border-radius: 0px 0px 450px 450px;margin: 0px 2px; border: solid white 0.5px; border-top-width: 0.5px; border-top-style: solid;   border-top-color: white; border-top: none;">
                                <div class="row">
                                  <div class="col-md-12">
                                    <label>Sumber data : <span>PBR</span></label>
                                     <label>Last update : <span id='tgl_entri_KPIKeuangan'>4 Agustus 2023</span></label>
                                  </div>
                                </div>
                              </div>
                          </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>


    </div>
</section>
<!-- Services Section End -->


<script>
  bln= parseInt($("#bln").val());
  thn= parseInt($("#thn").val());

  $(document).ready(function() {
      KPIKeuangan();

      $("#bln,#thn").on('change',function(){
        $('#vlsxloading').show();
        
        bln= parseInt($("#bln").val());
        thn= parseInt($("#thn").val());
        
        KPIKeuangan();
      });
  })

  function KPIKeuangan(){
      $.ajax({
          url : 'json-api/KPIKeuangan_json/sub?bln='+bln+'&thn='+thn,
          type : 'GET',
          dataType : 'text',
          success : function(text) {
              text= JSON.parse(text)
              $('#textKeuangan').html(text["textKeuangan"]);
              $('#tgl_entri_KPIKeuangan').html(text["tgl_entri"]);
              $('#textDetilKeuangan').html(text["textDetilKeuangan"]);

              $('#vlsxloading').hide();
          }        
      });
  }
</script>
