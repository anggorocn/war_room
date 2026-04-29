<?php
include_once("functions/string.func.php");
include_once("functions/date.func.php");

$b = $this->input->get("b");
$t = $this->input->get("t");

if(empty($b)) $b=date("m");
if(empty($t)) $t=date("Y");
?>
<!-- Services Section Start -->
<section id="services" class="services section-padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="area-breadcrumb pull-left">
                    <ul class="breadcrumb">
                      <li><a id="detilkembalihome" href="app"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                      <li>Kinerja Keuangan Korporat</li>
                    </ul> 
                </div>
            </div>

            <div class="col-md-12">
                <div class="area-wrapper" style="height: calc(100vh - 70px);">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="header-detil">
                                <!-- <div class="logo-pln-np pull-left"><img src="images/logo.png"></div>     -->
                                <div class="judul">
                                    <span class="ikon"><img src="images/icon-kinerja-keuangan-korporat.png"></span> Kinerja Keuangan Korporat <span class="keterangan" style="font-family: 'Lexend-Light';font-size: 13px;">(Rp Triliun)</span>
                                    <!-- <a class="selengkapnya pull-right" href="app/index/penjualan"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a> -->
                                </div>
                            </div>
                            
                        </div>
                    
                        <!-- Services item -->
                        <div class="col-md-5ths col-xs-6">
                          <div class="area-kelompok-keuangan wow fadeInDown" data-wow-delay="0.6s">
                            <div class="item">
                              <div class="caption">
                                Laba (Rugi) Bersih
                                <a class="lihat-detil" href="app/index/laba_rugi_per_komponen"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                <div class="clearfix"></div>
                              </div>
                              <div class="info-nilai hijau" id='field-0'>
                                <div class="nilai" id='nilai-0'></div>
                                <div class="title" id='Textnilai-0' ></div>
                              </div>
                              <div class="data">
                                <table style="width:100%">
                                   <tr>
                                    <td id='Textnilai2-0'></td><td id='nilai2-0'></td>
                                  </tr>
                                  <tr>
                                    <td id='Textrkap2-0'></td><td id='rkap2-0'></td>
                                  </tr>
                                  <tr>
                                    <td id='Textnilai3-0'></td><td id='nilai3-0'></td>
                                  </tr>
                                </table>
                              </div>
                              <div class="clearfix"></div>
                            </div>
                          </div>

                          <div class="area-kelompok-keuangan wow fadeInDown" data-wow-delay="0.8s">
                            <div class="item">
                              <div class="caption">Pendapatan Usaha</div>
                              <div class="info-nilai hijau" id='field-1'>
                                <div class="nilai" id='nilai-1'></div>
                                <div class="title" id='Textnilai-1' ></div>
                              </div>
                              <div class="data">
                                <table style="width:100%">
                                   <tr>
                                    <td id='Textnilai2-1'></td><td id='nilai2-1'></td>
                                  </tr>
                                  <tr>
                                    <td id='Textrkap2-1'> </td><td id='rkap2-1'></td>
                                  </tr>
                                  <tr>
                                    <td id='Textnilai3-1'>  </td><td id='nilai3-1'></td>
                                  </tr>
                                </table>
                              </div>
                              <div class="clearfix"></div>
                            </div>
                            <div class="area-kelompok-sub pendapatan">
                                <!-- <div class="item sub">
                                  <div class="caption">Beban Usaha</div>
                                  <div class="info-nilai hijau" id='field-6'>
                                    <div class="nilai" id='nilai-6'></div>
                                    <div class="title" id='Textnilai-6' ></div>
                                  </div>
                                  <div class="data">
                                    <table style="width:100%">
                                      <tr>
                                        <td id='Textnilai2-6'></td><td id='nilai2-6'></td>
                                      </tr>
                                      <tr>
                                        <td id='Textrkap2-6'> </td><td id='rkap2-6'></td>
                                      </tr>
                                      <tr>
                                        <td id='Textnilai3-6'>  </td><td id='nilai3-6'></td>
                                      </tr>
                                    </table>
                                  </div>
                                  <div class="clearfix"></div>
                                </div> -->

                                <div class="item sub">
                                  <div class="caption">Pendapatan Tenaga Listrik</div>
                                  <div class="info-nilai hijau" id='field-2'>
                                    <div class="nilai" id='nilai-2'></div>
                                    <div class="title" id='Textnilai-2' ></div>
                                  </div>
                                  <div class="data">
                                    <table style="width:100%">
                                      <tr>
                                        <td id='Textnilai2-2'></td><td id='nilai2-2'></td>
                                      </tr>
                                      <tr>
                                        <td id='Textrkap2-2'> </td><td id='rkap2-2'></td>
                                      </tr>
                                      <tr>
                                        <td id='Textnilai3-2'>  </td><td id='nilai3-2'></td>
                                      </tr>
                                    </table>
                                  </div>
                                  <div class="clearfix"></div>
                                </div>

                                <div class="item sub">
                                  <div class="caption">Pendapatan Jasa O&M</div>
                                  <div class="info-nilai hijau" id='field-3'>
                                    <div class="nilai" id='nilai-3'></div>
                                    <div class="title" id='Textnilai-3' ></div>
                                  </div>
                                  <div class="data">
                                    <table style="width:100%">
                                      <tr>
                                        <td id='Textnilai2-3'></td><td id='nilai2-3'></td>
                                      </tr>
                                      <tr>
                                        <td id='Textrkap2-3'> </td><td id='rkap2-3'></td>
                                      </tr>
                                      <tr>
                                        <td id='Textnilai3-3'>  </td><td id='nilai3-3'></td>
                                      </tr>
                                    </table>
                                  </div>
                                  <div class="clearfix"></div>
                                </div>

                                <div class="item sub">
                                  <div class="caption">Pendapatan EPC</div>
                                  <div class="info-nilai hijau" id='field-4'>
                                    <div class="nilai" id='nilai-4'></div>
                                    <div class="title" id='Textnilai-4' ></div>
                                  </div>
                                  <div class="data">
                                    <table style="width:100%">
                                      <tr>
                                        <td id='Textnilai2-4'></td><td id='nilai2-4'></td>
                                      </tr>
                                      <tr>
                                        <td id='Textrkap2-4'> </td><td id='rkap2-4'></td>
                                      </tr>
                                      <tr>
                                        <td id='Textnilai3-4'>  </td><td id='nilai3-4'></td>
                                      </tr>
                                    </table>
                                  </div>
                                  <div class="clearfix"></div>
                                </div>

                                <div class="item sub">
                                  <div class="caption">Pendapatan Usaha Lainnya</div>
                                  <div class="info-nilai hijau" id='field-5'>
                                    <div class="nilai" id='nilai-5'></div>
                                    <div class="title" id='Textnilai-5' ></div>
                                  </div>
                                  <div class="data">
                                    <table style="width:100%">
                                      <tr>
                                        <td id='Textnilai2-5'></td><td id='nilai2-5'></td>
                                      </tr>
                                      <tr>
                                        <td id='Textrkap2-5'> </td><td id='rkap2-5'></td>
                                      </tr>
                                      <tr>
                                        <td id='Textnilai3-5'>  </td><td id='nilai3-5'></td>
                                      </tr>
                                    </table>
                                  </div>
                                  <div class="clearfix"></div>
                                </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-40ths col-xs-6">
                          <div class="area-kelompok-keuangan wow fadeInDown" data-wow-delay="1.0s">
                            <div class="item">
                              <div class="caption">BPP (Rp/kWh)</div>
                              <div class="info-nilai hijau" id='field-11'>
                                <div class="nilai" id='nilai-11'></div>
                                <div class="title" id='Textnilai-11' ></div>
                              </div>
                              <div class="data">
                                <table style="width:100%">
                                   <tr>
                                    <td id='Textnilai2-11'></td><td id='nilai2-11'></td>
                                  </tr>
                                  <tr>
                                    <td id='Textrkap2-11'> </td><td id='rkap2-11'></td>
                                  </tr>
                                  <tr>
                                    <td id='Textnilai3-11'>  </td><td id='nilai3-11'></td>
                                  </tr>
                                </table>
                              </div>
                              <div class="clearfix"></div>
                            </div>

                            <div class="area-kelompok-sub bpp">
                              <div class="row">
                                <div class="col-md-6">

                                  <div class="item sub">
                                    <div class="caption">Beban Usaha</div>
                                    <div class="info-nilai hijau" id='field-6'>
                                      <div class="nilai" id='nilai-6'></div>
                                      <div class="title" id='Textnilai-6' ></div>
                                    </div>
                                    <div class="data">
                                      <table style="width:100%">
                                        <tr>
                                          <td id='Textnilai2-6'></td><td id='nilai2-6'></td>
                                        </tr>
                                        <tr>
                                          <td id='Textrkap2-6'> </td><td id='rkap2-6'></td>
                                        </tr>
                                        <tr>
                                          <td id='Textnilai3-6'>  </td><td id='nilai3-6'></td>
                                        </tr>
                                      </table>
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>

                                  <div class="item sub">
                                    <div class="caption">Pembelian Tenaga Listrik</div>
                                    <div class="info-nilai hijau" id='field-7'>
                                      <div class="nilai" id='nilai-7'></div>
                                      <div class="title" id='Textnilai-7' ></div>
                                    </div>
                                    <div class="data">
                                      <table style="width:100%">
                                        <tr>
                                          <td id='Textnilai2-7'></td><td id='nilai2-7'></td>
                                        </tr>
                                        <tr>
                                          <td id='Textrkap2-7'> </td><td id='rkap2-7'></td>
                                        </tr>
                                        <tr>
                                          <td id='Textnilai3-7'>  </td><td id='nilai3-7'></td>
                                        </tr>
                                      </table>
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>

                                  <div class="item sub">
                                    <div class="caption">Beban Emisi</div>
                                    <div class="info-nilai hijau" id='field-8'>
                                      <div class="nilai" id='nilai-8'></div>
                                      <div class="title" id='Textnilai-8' ></div>
                                    </div>
                                    <div class="data">
                                      <table style="width:100%">
                                        <tr>
                                          <td id='Textnilai2-8'></td><td id='nilai2-8'></td>
                                        </tr>
                                        <tr>
                                          <td id='Textrkap2-8'> </td><td id='rkap2-8'></td>
                                        </tr>
                                        <tr>
                                          <td id='Textnilai3-8'>  </td><td id='nilai3-8'></td>
                                        </tr>
                                      </table>
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>

                                  <div class="item sub">
                                    <div class="caption">Beban Sewa</div>
                                    <div class="info-nilai hijau" id='field-8'>
                                      <div class="nilai" id='nilai-8'></div>
                                      <div class="title" id='Textnilai-8' ></div>
                                    </div>
                                    <div class="data">
                                      <table style="width:100%">
                                        <tr>
                                          <td id='Textnilai2-8'></td><td id='nilai2-8'></td>
                                        </tr>
                                        <tr>
                                          <td id='Textrkap2-8'> </td><td id='rkap2-8'></td>
                                        </tr>
                                        <tr>
                                          <td id='Textnilai3-8'>  </td><td id='nilai3-8'></td>
                                        </tr>
                                      </table>
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>

                                  <div class="item sub">
                                    <div class="caption">Bahan Bakar & Pelumas</div>
                                    <div class="info-nilai hijau" id='field-8'>
                                      <div class="nilai" id='nilai-8'></div>
                                      <div class="title" id='Textnilai-8' ></div>
                                    </div>
                                    <div class="data">
                                      <table style="width:100%">
                                        <tr>
                                          <td id='Textnilai2-8'></td><td id='nilai2-8'></td>
                                        </tr>
                                        <tr>
                                          <td id='Textrkap2-8'> </td><td id='rkap2-8'></td>
                                        </tr>
                                        <tr>
                                          <td id='Textnilai3-8'>  </td><td id='nilai3-8'></td>
                                        </tr>
                                      </table>
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>

                                  <div class="item sub">
                                    <div class="caption">Pemeliharaan</div>
                                    <div class="info-nilai hijau" id='field-9'>
                                      <div class="nilai" id='nilai-9'></div>
                                      <div class="title" id='Textnilai-9' ></div>
                                    </div>
                                    <div class="data">
                                      <table style="width:100%">
                                        <tr>
                                          <td id='Textnilai2-9'></td><td id='nilai2-9'></td>
                                        </tr>
                                        <tr>
                                          <td id='Textrkap2-9'> </td><td id='rkap2-9'></td>
                                        </tr>
                                        <tr>
                                          <td id='Textnilai3-9'>  </td><td id='nilai3-9'></td>
                                        </tr>
                                      </table>
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>
                                </div>
                                <div class="col-md-6">

                                  <div class="item sub">
                                    <div class="caption">Biaya O&M</div>
                                    <div class="info-nilai hijau" id='field-10'>
                                      <div class="nilai" id='nilai-10'></div>
                                      <div class="title" id='Textnilai-10' ></div>
                                    </div>
                                    <div class="data">
                                      <table style="width:100%">
                                        <tr>
                                          <td id='Textnilai2-10'></td><td id='nilai2-10'></td>
                                        </tr>
                                        <tr>
                                          <td id='Textrkap2-10'> </td><td id='rkap2-10'></td>
                                        </tr>
                                        <tr>
                                          <td id='Textnilai3-10'>  </td><td id='nilai3-10'></td>
                                        </tr>
                                      </table>
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>
                                  <div class="item sub">
                                    <div class="caption">Kepegawaian</div>
                                    <div class="info-nilai hijau" id='field-12'>
                                      <div class="nilai" id='nilai-12'></div>
                                      <div class="title" id='Textnilai-12' ></div>
                                    </div>
                                    <div class="data">
                                      <table style="width:100%">
                                        <tr>
                                          <td id='Textnilai2-12'></td><td id='nilai2-12'></td>
                                        </tr>
                                        <tr>
                                          <td id='Textrkap2-12'> </td><td id='rkap2-12'></td>
                                        </tr>
                                        <tr>
                                          <td id='Textnilai3-12'>  </td><td id='nilai3-12'></td>
                                        </tr>
                                      </table>
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>

                                  <div class="item sub">
                                    <div class="caption">Penyusutan</div>
                                    <div class="info-nilai hijau" id='field-13'>
                                      <div class="nilai" id='nilai-13'></div>
                                      <div class="title" id='Textnilai-13' ></div>
                                    </div>
                                    <div class="data">
                                      <table style="width:100%">
                                        <tr>
                                          <td id='Textnilai2-13'></td><td id='nilai2-13'></td>
                                        </tr>
                                        <tr>
                                          <td id='Textrkap2-13'> </td><td id='rkap2-13'></td>
                                        </tr>
                                        <tr>
                                          <td id='Textnilai3-13'>  </td><td id='nilai3-13'></td>
                                        </tr>
                                      </table>
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>

                                  <div class="item sub">
                                    <div class="caption">Administrasi</div>
                                    <div class="info-nilai hijau" id='field-14'>
                                      <div class="nilai" id='nilai-14'></div>
                                      <div class="title" id='Textnilai-14' ></div>
                                    </div>
                                    <div class="data">
                                      <table style="width:100%">
                                        <tr>
                                          <td id='Textnilai2-14'></td><td id='nilai2-14'></td>
                                        </tr>
                                        <tr>
                                          <td id='Textrkap2-14'> </td><td id='rkap2-14'></td>
                                        </tr>
                                        <tr>
                                          <td id='Textnilai3-14'>  </td><td id='nilai3-14'></td>
                                        </tr>
                                      </table>
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>

                                  <div class="item sub">
                                    <div class="caption">Biaya EPC</div>
                                    <div class="info-nilai hijau" id='field-15'>
                                      <div class="nilai" id='nilai-15'></div>
                                      <div class="title" id='Textnilai-15' ></div>
                                    </div>
                                    <div class="data">
                                      <table style="width:100%">
                                        <tr>
                                          <td id='Textnilai2-15'></td><td id='nilai2-15'></td>
                                        </tr>
                                        <tr>
                                          <td id='Textrkap2-15'> </td><td id='rkap2-15'></td>
                                        </tr>
                                        <tr>
                                          <td id='Textnilai3-15'>  </td><td id='nilai3-15'></td>
                                        </tr>
                                      </table>
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>

                                  <div class="item sub">
                                    <div class="caption">Biaya Usaha Lainnya</div>
                                    <div class="info-nilai hijau" id='field-16'>
                                      <div class="nilai" id='nilai-16'></div>
                                      <div class="title" id='Textnilai-16' ></div>
                                    </div>
                                    <div class="data">
                                      <table style="width:100%">
                                        <tr>
                                          <td id='Textnilai2-16'></td><td id='nilai2-16'></td>
                                        </tr>
                                        <tr>
                                          <td id='Textrkap2-16'> </td><td id='rkap2-16'></td>
                                        </tr>
                                        <tr>
                                          <td id='Textnilai3-16'>  </td><td id='nilai3-16'></td>
                                        </tr>
                                      </table>
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>
                                </div>
                              </div>                                
                            </div>
                          </div>
                        </div>
                        <!-- <div class="col-md-5ths col-xs-6">
                          haii3
                        </div> -->
                        <div class="col-md-5ths col-xs-6">
                          <div class="area-kelompok-keuangan wow fadeInDown" data-wow-delay="1.2s">
                            <!-- <div class="item">
                              <div class="caption">Pendapatan Usaha</div>
                              <div class="info-nilai hijau" id='field-0'>
                                <div class="nilai"></div>
                                <div class="title" id='Textnilai-0' ></div>
                              </div>
                              <div class="data">
                                <table style="width:100%">
                                   <tr>
                                    <td id='Textnilai2-0'></td><td id='nilai2-0'></td>
                                  </tr>
                                  <tr>
                                    <td id='Textrkap2-0'> </td><td id='rkap2-0'></td>
                                  </tr>
                                  <tr>
                                    <td id='Textnilai3-0'>  </td><td id='nilai3-0'></td>
                                  </tr>
                                </table>
                              </div>
                              <div class="clearfix"></div>
                            </div> -->
                            <div class="area-kelompok-sub aset">
                                <div class="item sub">
                                  <div class="caption">Aset Tetap</div>
                                  <div class="info-nilai hijau" id='field-17'>
                                    <div class="nilai" id='nilai-17'></div>
                                    <div class="title" id='Textnilai-17' ></div>
                                  </div>
                                  <div class="data">
                                    <table style="width:100%">
                                      <tr>
                                        <td id='Textnilai2-17'></td><td id='nilai2-17'></td>
                                      </tr>
                                      <tr>
                                        <td id='Textrkap2-17'> </td><td id='rkap2-17'></td>
                                      </tr>
                                      <tr>
                                        <td id='Textnilai3-17'>  </td><td id='nilai3-17'></td>
                                      </tr>
                                    </table>
                                  </div>
                                  <div class="clearfix"></div>
                                </div>

                                <div class="item sub">
                                  <div class="caption">Persediaan</div>
                                  <div class="info-nilai hijau" id='field-18'>
                                    <div class="nilai" id='nilai-18'></div>
                                    <div class="title" id='Textnilai-18' ></div>
                                  </div>
                                  <div class="data">
                                    <table style="width:100%">
                                      <tr>
                                        <td id='Textnilai2-18'></td><td id='nilai2-18'></td>
                                      </tr>
                                      <tr>
                                        <td id='Textrkap2-18'> </td><td id='rkap2-18'></td>
                                      </tr>
                                      <tr>
                                        <td id='Textnilai3-18'>  </td><td id='nilai3-18'></td>
                                      </tr>
                                    </table>
                                  </div>
                                  <div class="clearfix"></div>
                                </div>

                                <div class="item sub">
                                  <div class="caption">Piutang Usaha</div>
                                  <div class="info-nilai hijau" id='field-19'>
                                    <div class="nilai" id='nilai-19'></div>
                                    <div class="title" id='Textnilai-19' ></div>
                                  </div>
                                  <div class="data">
                                    <table style="width:100%">
                                      <tr>
                                        <td id='Textnilai2-19'></td><td id='nilai2-19'></td>
                                      </tr>
                                      <tr>
                                        <td id='Textrkap2-19'> </td><td id='rkap2-19'></td>
                                      </tr>
                                      <tr>
                                        <td id='Textnilai3-19'>  </td><td id='nilai3-19'></td>
                                      </tr>
                                    </table>
                                  </div>
                                  <div class="clearfix"></div>
                                </div>

                                <div class="item sub">
                                  <div class="caption">Penyertaan</div>
                                  <div class="info-nilai hijau" id='field-20'>
                                    <div class="nilai" id='nilai-20'></div>
                                    <div class="title" id='Textnilai-20' ></div>
                                  </div>
                                  <div class="data">
                                    <table style="width:100%">
                                      <tr>
                                        <td id='Textnilai2-20'></td><td id='nilai2-20'></td>
                                      </tr>
                                      <tr>
                                        <td id='Textrkap2-20'> </td><td id='rkap2-20'></td>
                                      </tr>
                                      <tr>
                                        <td id='Textnilai3-20'>  </td><td id='nilai3-20'></td>
                                      </tr>
                                    </table>
                                  </div>
                                  <div class="clearfix"></div>
                                </div>
                            </div>

                          </div>
                        </div>
                        <div class="col-md-5ths col-xs-6">
                          <div class="area-kelompok-keuangan wow fadeInDown" data-wow-delay="1.4s">
                            <!-- <div class="item">
                              <div class="caption">Pendapatan Usaha</div>
                              <div class="info-nilai hijau" id='field-0'>
                                <div class="nilai"></div>
                                <div class="title" id='Textnilai-0' ></div>
                              </div>
                              <div class="data">
                                <table style="width:100%">
                                   <tr>
                                    <td id='Textnilai2-0'></td><td id='nilai2-0'></td>
                                  </tr>
                                  <tr>
                                    <td id='Textrkap2-0'> </td><td id='rkap2-0'></td>
                                  </tr>
                                  <tr>
                                    <td id='Textnilai3-0'>  </td><td id='nilai3-0'></td>
                                  </tr>
                                </table>
                              </div>
                              <div class="clearfix"></div>
                            </div> -->
                            <div class="area-kelompok-sub arus-kas">
                                <div class="item sub">
                                  <div class="caption">Arus Kas Operasi</div>
                                  <div class="info-nilai hijau" id='field-21'>
                                    <div class="nilai" id='nilai-21'></div>
                                    <div class="title" id='Textnilai-21' ></div>
                                  </div>
                                  <div class="data">
                                    <table style="width:100%">
                                      <tr>
                                        <td id='Textnilai2-21'></td><td id='nilai2-21'></td>
                                      </tr>
                                      <tr>
                                        <td id='Textrkap2-21'> </td><td id='rkap2-21'></td>
                                      </tr>
                                      <tr>
                                        <td id='Textnilai3-21'>  </td><td id='nilai3-21'></td>
                                      </tr>
                                    </table>
                                  </div>
                                  <div class="clearfix"></div>
                                </div>

                                <div class="item sub">
                                  <div class="caption">Arus Kas Investasi</div>
                                  <div class="info-nilai hijau" id='field-22'>
                                    <div class="nilai" id='nilai-22'></div>
                                    <div class="title" id='Textnilai-22' ></div>
                                  </div>
                                  <div class="data">
                                    <table style="width:100%">
                                      <tr>
                                        <td id='Textnilai2-22'></td><td id='nilai2-22'></td>
                                      </tr>
                                      <tr>
                                        <td id='Textrkap2-22'> </td><td id='rkap2-22'></td>
                                      </tr>
                                      <tr>
                                        <td id='Textnilai3-22'>  </td><td id='nilai3-22'></td>
                                      </tr>
                                    </table>
                                  </div>
                                  <div class="clearfix"></div>
                                </div>

                                <div class="item sub">
                                  <div class="caption">Arus Kas Pendanaan</div>
                                  <div class="info-nilai hijau" id='field-23'>
                                    <div class="nilai" id='nilai-23'></div>
                                    <div class="title" id='Textnilai-23' ></div>
                                  </div>
                                  <div class="data">
                                    <table style="width:100%">
                                      <tr>
                                        <td id='Textnilai2-23'></td><td id='nilai2-23'></td>
                                      </tr>
                                      <tr>
                                        <td id='Textrkap2-23'> </td><td id='rkap2-23'></td>
                                      </tr>
                                      <tr>
                                        <td id='Textnilai3-23'>  </td><td id='nilai3-23'></td>
                                      </tr>
                                    </table>
                                  </div>
                                  <div class="clearfix"></div>
                                </div>

                                <div class="item sub">
                                  <div class="caption">Saldo Kas</div>
                                  <div class="info-nilai hijau" id='field-24'>
                                    <div class="nilai" id='nilai-24'></div>
                                    <div class="title" id='Textnilai-24' ></div>
                                  </div>
                                  <div class="data">
                                    <table style="width:100%">
                                      <tr>
                                        <td id='Textnilai2-24'></td><td id='nilai2-24'></td>
                                      </tr>
                                      <tr>
                                        <td id='Textrkap2-24'> </td><td id='rkap2-24'></td>
                                      </tr>
                                      <tr>
                                        <td id='Textnilai3-24'>  </td><td id='nilai3-24'></td>
                                      </tr>
                                    </table>
                                  </div>
                                  <div class="clearfix"></div>
                                </div>
                            </div>

                          </div>
                        </div>

                        <!-- <div class="col-md-40ths col-xs-6">
                          <div class="area-keterangan-keuangan wow fadeInDown" data-wow-delay="1.6s">
                            <ol>
                              <li>Laba Bersih lebih baik 20,28%, terutama karena laba PTL yang lebih baik.</li>
                              <li>BPP lebih baik 9,68% terutama karena efisiensi biaya usaha.</li>
                              <li>Pendapatan Usaha dibawah RKAP dikarenakan capaian pendapatan OM, EPC, stockies,
                                MRO dan lainnya belum sesuai target karena prioritisasi investasi & pemeliharaan 
                                dilingkungan PLN</li>
                              <li>Kenaikan Biaya Bahan Bakar dan pelumas seiring dengan meningkatnya kWh jual.</li>
                              <li>Biaya pembelian TL, Biaya Pemeliharaan, Biaya Kepegawaian, Biaya Penyusutan, Biaya
                                Administrasi dan Biaya Usaha Lainnya dapat dioptimalkan dibawah RKAP.</li>
                              <li>Aset Tetap tercapai dibawah RKAP terutama karena mundurnya COD Add On MTW</li>
                              <li>Persediaan lebih tinggi dari RKAP terutama pada BBM untuk cadangan operasional</li>
                              <li>Saldo Kas secara keseluruhan tercapai lebih baik dari RKAP. Arus Kas Investasi & 
                                Pendanaan dibawah RKAP terutama karena penerimaan SHL lebih kecil dari RKAP
                                seiring dengan progress Add On MTW.</li>
                            </ol>
                          </div>
                        </div> -->

                        <!-- Services item -->
                        <div class="col-md-6 col-lg-8 col-xs-12" style="display: none;">
                            <div class="services-item wow fadeInDown" data-wow-delay="0.6s">

                              <div class="area-ringkasan-kontrak-kinerja">
                                
                                <div class="inner">
                                  <div class="sub-judul">Ringkasan Kontrak Kinerja</div>

                                  <div class="legend">
                                    <span><i class="fa fa-circle hijau" aria-hidden="true"></i> ≥ 100%          </span>
                                    <span><i class="fa fa-circle kuning" aria-hidden="true"></i> ≥ 95% - < 100%         </span> 
                                    <span><i class="fa fa-circle merah" aria-hidden="true"></i> < 95%          </span>
                                    <span><i class="fa fa-circle biru" aria-hidden="true"></i> On track          </span>
                                    <span><i class="fa fa-circle abu-abu" aria-hidden="true"></i> Belum diukur</span>
                                  </div>

                                  <div class="row">
                                    <div class="col-md-2">
                                      <div class="item">
                                        <div class="caption">Economic and Social Value</div>
                                        <div class="grafik-pie" id="pie-economic"></div>
                                        <div class="keterangan">EFOR Non PLTU Jawa Bali, EFOR PLTU Luar Jawa Bali, EAF PLTU Jawa Bali, EAF Non PLTU Jawa Bali, EAF PLTU Luar Jawa Bali</div>
                                      </div>
                                    </div>
                                    <div class="col-md-2">
                                      <div class="item">
                                        <div class="caption">Business Model Innovation</div>
                                        <div class="grafik-pie" id="pie-business"></div>
                                        <div class="keterangan">Jumlah Kontrak Bisnis di Luar Negeri, Strategic Partnership GenCo</div>
                                      </div>
                                    </div>
                                    <div class="col-md-2">
                                      <div class="item">
                                        <div class="caption">Technology Leadership</div>
                                        <div class="grafik-pie" id="pie-technology"></div>
                                        <div class="keterangan">&nbsp;</div>
                                      </div>
                                    </div>
                                    <div class="col-md-2">
                                      <div class="item">
                                        <div class="caption">Energize Investment</div>
                                        <div class="grafik-pie" id="pie-energize"></div>
                                        <div class="keterangan">EPC Project Completion</div>
                                      </div>
                                    </div>
                                    <div class="col-md-2">
                                      <div class="item">
                                        <div class="caption">Unleash Talent</div>
                                        <div class="grafik-pie" id="pie-talent"></div>
                                        <div class="keterangan">&nbsp;</div>
                                      </div>
                                    </div>
                                    <div class="col-md-2">
                                      <div class="item">
                                        <div class="caption">Compliance</div>
                                        <div class="grafik-pie" id="pie-compliance"></div>
                                        <div class="keterangan">&nbsp;</div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="area-ringkasan-info">
                                <div class="row">
                                  <div class="col-md-3">
                                    <div class="item merah">
                                      <div class="item-inner">
                                        <div class="caption">Beyond KWH</div>
                                        <div class="keterangan">KPI Bidang Non Kerja</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="item">
                                      <div class="item-inner">
                                        <div class="caption">Digitalisasi Power Plant</div>
                                        <div class="keterangan">KPI Bidang Non Kerja</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="item">
                                      <div class="item-inner">
                                        <div class="caption">Making Digital Talent</div>
                                        <div class="keterangan">KPI Bidang Non Kerja</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="item">
                                      <div class="item-inner">
                                        <div class="caption">Co-Firing</div>
                                        <div class="keterangan">KPI Bidang Non Kerja</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="item">
                                      <div class="item-inner">
                                        <div class="caption">EBT (Energi Baru & Terbarukan)</div>
                                        <div class="keterangan">KPI Bidang Non Kerja</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="item">
                                      <div class="item-inner">
                                        <div class="caption">Pengembangan Pembangkit</div>
                                        <div class="keterangan">KPI Bidang Non Kerja</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="item">
                                      <div class="item-inner">
                                        <div class="caption">Milestone PLTS Cirata</div>
                                        <div class="keterangan">KPI Bidang Non Kerja</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="item merah">
                                      <div class="item-inner">
                                        <div class="caption">Rasio Keuangan</div>
                                        <div class="keterangan">KPI Bidang Non Kerja</div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>

                        <!-- Services item -->
                        <div class="col-md-6 col-lg-4 col-xs-12" style="display: none;">
                            <div class="services-item wow fadeInDown" data-wow-delay="0.6s">
                              <div class="area-kpi-korporat">
                                
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="area-card">
                                      <div class="sub-judul">KPI Korporat</div>
                                      <div class="inner">
                                        <table style="width:100%">
                                          <thead>
                                            <tr>
                                              <th>&nbsp;</th>
                                              <th>&nbsp;</th>
                                              <th>Jumlah KPI</th>
                                              <th>Total KPI</th>
                                            </tr>  
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td>≥ 100%</td>
                                              <td><i class="fa fa-circle hijau" aria-hidden="true"></i></td>
                                              <td>24</td>
                                              <td>/33</td>
                                            </tr>
                                            <tr>
                                              <td>≥ 95% - < 100%</td>
                                              <td><i class="fa fa-circle kuning" aria-hidden="true"></i></td>
                                              <td>3</td>
                                              <td>/33</td>
                                            </tr>
                                            <tr>
                                              <td>< 95%</td>
                                              <td><i class="fa fa-circle merah" aria-hidden="true"></i></td>
                                              <td>5</td>
                                              <td>/33</td>
                                            </tr>
                                            <tr>
                                              <td>On track</td>
                                              <td><i class="fa fa-circle biru" aria-hidden="true"></i></td>
                                              <td>0</td>
                                              <td>/33</td>
                                            </tr>
                                            <tr>
                                              <td>Belum dilakukan</td>
                                              <td><i class="fa fa-circle abu-abu" aria-hidden="true"></i></td>
                                              <td>1</td>
                                              <td>/33</td>      
                                            </tr>
                                          </tbody>
                                        </table>
                                                        
                                        
                                      </div>
                                  </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="area-card">
                                      <div class="sub-judul">NKO</div>
                                      <div class="inner">
                                        98.02
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="area-card">
                                      <div class="sub-judul">Detil</div>
                                      <div class="inner">
                                        Penjelasan terkait nilai NKO
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="area-card">
                                      <div class="sub-judul">Executive Summary</div>
                                      <div class="inner">
                                        Pencapaian kinerja korporat sampai dengan bulan Juni 2023, yaitu sebanyak 24 KPI memenuhi target (warna Hijau), 3 hampir memenuhi target (warna Kuning), dan 5 KPI belum memenuhi target (warna Merah).
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="gambar-kincir-angin">
                      <img src="images/img-kincir-angin.png">
                    </div>

                    <div class="area-sumber-data detil">
                        <label>Sumber data : <span>PBR</span></label>
                        <label>Last update : <span id='tgl_entri_kinerjakeuangankorporat'></span></label>
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

<script type="text/javascript">
  // Data retrieved from https://netmarketshare.com
  Highcharts.chart('pie-economic', {
      chart: {
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false,
          type: 'pie',
          backgroundColor: null,
          margin: [0,0,0,0]
      },
      exporting: {
        enabled: false
      },
      title: {
          text: null,
          align: 'left'
      },
      tooltip: {
          pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      accessibility: {
          point: {
              valueSuffix: '%'
          }
      },
      plotOptions: {
          pie: {
              allowPointSelect: true,
              cursor: 'pointer',
              dataLabels: {
                  enabled: false,
                  format: '<b>{point.name}</b>: {point.percentage:.1f} %'
              }
          }
      },
      series: [{
          name: 'Brands',
          colorByPoint: true,
          data: [{
              name: 'Test',
              y: 70.67,
              // sliced: true,
              selected: true,
              color: '#3fcb63'
          }, {
              name: 'Test 2',
              y: 14.77,
              color: '#f5cb2c'
          },  {
              name: 'Test 3',
              y: 4.86,
              color: '#e42517'
          }]
      }]
  });

</script>
<script type="text/javascript">
  // Data retrieved from https://netmarketshare.com
  Highcharts.chart('pie-business', {
      chart: {
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false,
          type: 'pie',
          backgroundColor: null,
          margin: [0,0,0,0]
      },
      exporting: {
        enabled: false
      },
      title: {
          text: null,
          align: 'left'
      },
      tooltip: {
          pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      accessibility: {
          point: {
              valueSuffix: '%'
          }
      },
      plotOptions: {
          pie: {
              allowPointSelect: true,
              cursor: 'pointer',
              dataLabels: {
                  enabled: false,
                  format: '<b>{point.name}</b>: {point.percentage:.1f} %'
              }
          }
      },
      series: [{
          name: 'Brands',
          colorByPoint: true,
          data: [{
              name: 'Test',
              y: 70.67,
              // sliced: true,
              selected: true,
              color: '#3fcb63'
          }, {
              name: 'Test 2',
              y: 14.77,
              color: '#f5cb2c'
          },  {
              name: 'Test 3',
              y: 4.86,
              color: '#e42517'
          }]
      }]
  });

</script>
<script type="text/javascript">
  // Data retrieved from https://netmarketshare.com
  Highcharts.chart('pie-technology', {
      chart: {
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false,
          type: 'pie',
          backgroundColor: null,
          margin: [0,0,0,0]
      },
      exporting: {
        enabled: false
      },
      title: {
          text: null,
          align: 'left'
      },
      tooltip: {
          pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      accessibility: {
          point: {
              valueSuffix: '%'
          }
      },
      plotOptions: {
          pie: {
              allowPointSelect: true,
              cursor: 'pointer',
              dataLabels: {
                  enabled: false,
                  format: '<b>{point.name}</b>: {point.percentage:.1f} %'
              }
          }
      },
      series: [{
          name: 'Brands',
          colorByPoint: true,
          data: [{
              name: 'Test',
              y: 70.67,
              // sliced: true,
              selected: true,
              color: '#3fcb63'
          }, {
              name: 'Test 2',
              y: 14.77,
              color: '#f5cb2c'
          },  {
              name: 'Test 3',
              y: 4.86,
              color: '#e42517'
          }]
      }]
  });

</script>
<script type="text/javascript">
  // Data retrieved from https://netmarketshare.com
  Highcharts.chart('pie-energize', {
      chart: {
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false,
          type: 'pie',
          backgroundColor: null,
          margin: [0,0,0,0]
      },
      exporting: {
        enabled: false
      },
      title: {
          text: null,
          align: 'left'
      },
      tooltip: {
          pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      accessibility: {
          point: {
              valueSuffix: '%'
          }
      },
      plotOptions: {
          pie: {
              allowPointSelect: true,
              cursor: 'pointer',
              dataLabels: {
                  enabled: false,
                  format: '<b>{point.name}</b>: {point.percentage:.1f} %'
              }
          }
      },
      series: [{
          name: 'Brands',
          colorByPoint: true,
          data: [{
              name: 'Test',
              y: 70.67,
              // sliced: true,
              selected: true,
              color: '#3fcb63'
          }, {
              name: 'Test 2',
              y: 14.77,
              color: '#f5cb2c'
          },  {
              name: 'Test 3',
              y: 4.86,
              color: '#e42517'
          }]
      }]
  });

</script>
<script type="text/javascript">
  // Data retrieved from https://netmarketshare.com
  Highcharts.chart('pie-talent', {
      chart: {
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false,
          type: 'pie',
          backgroundColor: null,
          margin: [0,0,0,0]
      },
      exporting: {
        enabled: false
      },
      title: {
          text: null,
          align: 'left'
      },
      tooltip: {
          pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      accessibility: {
          point: {
              valueSuffix: '%'
          }
      },
      plotOptions: {
          pie: {
              allowPointSelect: true,
              cursor: 'pointer',
              dataLabels: {
                  enabled: false,
                  format: '<b>{point.name}</b>: {point.percentage:.1f} %'
              }
          }
      },
      series: [{
          name: 'Brands',
          colorByPoint: true,
          data: [{
              name: 'Test',
              y: 70.67,
              // sliced: true,
              selected: true,
              color: '#3fcb63'
          }, {
              name: 'Test 2',
              y: 14.77,
              color: '#f5cb2c'
          },  {
              name: 'Test 3',
              y: 4.86,
              color: '#e42517'
          }]
      }]
  });

</script>
<script type="text/javascript">
  // Data retrieved from https://netmarketshare.com
  Highcharts.chart('pie-compliance', {
      chart: {
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false,
          type: 'pie',
          backgroundColor: null,
          margin: [0,0,0,0]
      },
      exporting: {
        enabled: false
      },
      title: {
          text: null,
          align: 'left'
      },
      tooltip: {
          pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      accessibility: {
          point: {
              valueSuffix: '%'
          }
      },
      plotOptions: {
          pie: {
              allowPointSelect: true,
              cursor: 'pointer',
              dataLabels: {
                  enabled: false,
                  format: '<b>{point.name}</b>: {point.percentage:.1f} %'
              }
          }
      },
      series: [{
          name: 'Brands',
          colorByPoint: true,
          data: [{
              name: 'Test',
              y: 70.67,
              // sliced: true,
              selected: true,
              color: '#3fcb63'
          }, {
              name: 'Test 2',
              y: 14.77,
              color: '#f5cb2c'
          },  {
              name: 'Test 3',
              y: 4.86,
              color: '#e42517'
          }]
      }]
  });

 $(document).ready(function() {
      KinerjaKeuanganKorporat();
     
      $("#bln,#thn").on('change',function(){
        bln= parseInt($("#bln").val());
        thn= parseInt($("#thn").val());

        KinerjaKeuanganKorporat();
      });
  })

  function KinerjaKeuanganKorporat(){
      bln= parseInt($("#bln").val());
      thn= parseInt($("#thn").val());
      $.ajax({
          url : 'json-api/KinerjaKeuanganKorporat_json/sub?bln='+bln+'&thn='+thn,
          type : 'GET',
          dataType : 'text',
          success : function(text) {
              text= JSON.parse(text);
              for(i=0;i<text.length;i++){

                $('#nilai-'+i).html(text[i]['realisasi']);
                $('#Textnilai-'+i).html("s/d "+text[i]['TextDateLastYear']);
                $('#Textnilai2-'+i).html("s/d "+text[i]['TextDateNow']);
                $('#Textrkap2-'+i).html("RKAP s/d "+text[i]['TextDateLastYear']);
                $('#Textnilai3-'+i).html("s/d "+text[i]['TextDateNext']);
                $('#rkap2-'+i).html(text[i]['rkap2']);
                $('#nilai2-'+i).html(text[i]['realisasi2']);
                $('#nilai3-'+i).html(text[i]['realisasi3']);
                $('#field-'+i).removeClass("hijau");
                $('#field-'+i).removeClass("merah");
                $('#field-'+i).removeClass("kuning");
                $('#field-'+i).addClass(text[i]['classWarna']);

                $('#tgl_entri_kinerjakeuangankorporat').html(text[i]['tgl_entri']);

                // khusus beban usaha 
                if(i == 6)
                {
                  indexid= 61;
                  $('#nilai-'+indexid).html(text[i]['realisasi']);
                  $('#Textnilai-'+indexid).html("s/d "+text[i]['TextDateLastYear']);
                  $('#Textnilai2-'+indexid).html("s/d "+text[i]['TextDateNow']);
                  $('#Textrkap2-'+indexid).html("RKAP s/d "+text[i]['TextDateLastYear']);
                  $('#Textnilai3-'+indexid).html("s/d "+text[i]['TextDateNext']);
                  $('#rkap2-'+indexid).html(text[i]['rkap2']);
                  $('#nilai2-'+indexid).html(text[i]['realisasi2']);
                  $('#nilai3-'+indexid).html(text[i]['realisasi3']);
                  $('#field-'+indexid).removeClass("hijau");
                  $('#field-'+indexid).removeClass("merah");
                  $('#field-'+indexid).removeClass("kuning");
                  $('#field-'+indexid).addClass(text[i]['classWarna']);
                }
              }
               $('#vlsxloading').hide();

          }        
      });
  }

</script>
