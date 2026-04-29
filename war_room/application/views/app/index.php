<?
include_once("functions/string.func.php");
include_once("functions/date.func.php");

$darkmode= $this->darkmode;

$this->load->model("base-admin/Page");


$apppageroleid=$this->apppageroleid;
$apppagerolekode=$this->apppagerolekode;
$appusernama=$this->appusernama;
$appuserkodehak=$this->appuserkodehak;
$appconnect=$this->appautoconnect;

// print_r($apppagerolekode);exit;


$class='dark';
$checked='checked';
if ($darkmode=='false') 
{
    $class='';
    $checked='';
}


$b = $this->input->get("b");
$t = $this->input->get("t");
$kode = $this->input->get("kode");

$bsebelum= "";
if(empty($b))
{
  $b=date("m");
  $h=date("d");
  // echo $b;exit;
  if($h<=15){
    $b=$b-2;
  }
  else{
    $b--;
  }

  if($b<0){
    $b=12+$b;
    $t=date("Y")-1;
  }
  $bsebelum = $b;
  if($b <= 0)
  {
    $b= 12;
  }
}

if(empty($t))
{
  $t=date("Y");

  if($bsebelum <= 0) $t--;
}

// echo $b."-".$t; exit;
$set= new Page();
$set->selectByParamsMenus(array(),-1,-1," AND MENU = 1 AND IS_DETIL IS NULL",$apppagerolekode);
// echo $set->query;exit;
$arrMenu=[];
while($set->nextRow())
{
    $arrdata= [];
    $arrdata["ID"]= $set->getField("KODE_MODUL");
    $arrdata["ID_PARENT"]= $set->getField("LEVEL_MODUL");
    $arrdata["NAMA"]= $set->getField("MENU_MODUL");
    $arrdata["NAMA_GROUP"]= $set->getField("GROUP_MODUL");
    $arrdata["LINK_MODUL"]= $set->getField("LINK_MODUL");
    $arrdata["IDMODUL"]= $set->getField("IDMODUL");
    array_push($arrMenu, $arrdata);
}



if($pg=='peta_pembangkit' || $pg=='kesiapan_pembangkit' || $pg=='kinerja_proyek'|| $pg=='kinerja_proyek_detil' || $pg=='kinerja_proyek_bdd' || $pg=='kinerja_proyek_bdg' || $pg=='rekap_mou'|| $pg=='monitoring_proyek_akuisisi'|| $pg=='monitoring_proyek_akuisisi_detil'|| $pg=='bpp'){
  $stylePeriode='style="display:none"';
}

if($pg!='penjualan'){
  $styleRegional='style="display:none"';
}
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
    <link rel="icon" href="images/favicon.ico">

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

    <!-- GRAND PRO OPL -->
          <!-- Bootstrap CSS -->
          <!-- <link rel="stylesheet" type="text/css" href="lib/grand-pro-opl/assets/css/bootstrap.min.css" > -->
          <!-- Icon -->
          <!-- <link rel="stylesheet" type="text/css" href="lib/grand-pro-opl/assets/fonts/line-icons.css"> -->
          <!-- Slicknav -->
          <!-- <link rel="stylesheet" type="text/css" href="lib/grand-pro-opl/assets/css/slicknav.css"> -->
          <!-- Nivo Lightbox -->
          <!-- <link rel="stylesheet" type="text/css" href="lib/grand-pro-opl/assets/css/nivo-lightbox.css" > -->
          <!-- Animate -->
          <!-- <link rel="stylesheet" type="text/css" href="lib/grand-pro-opl/assets/css/animate.css"> -->
          <!-- Main Style -->
          <!-- <link rel="stylesheet" type="text/css" href="lib/grand-pro-opl/assets/css/main.css"> -->
          <!-- Responsive Style -->
          <!-- <link rel="stylesheet" type="text/css" href="lib/grand-pro-opl/assets/css/responsive.css"> -->


    <link rel="stylesheet" type="text/css" href="css/gaya.css">
    <link rel="stylesheet" type="text/css" href="lib/font-awesome-4.7.0/css/font-awesome.css">
  </head>

  <body class="<?=$class?>">
    <? if($pg=='bpp'){ ?>
      <div id="printableArea">
    <? } else{ ?>
      <div>
    <? } ?>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-default">                
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
          	<ul class="nav navbar-nav">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars" aria-hidden="true"></i> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <!-- <li class="<?/* if($pg == "" || $pg == "home"){?>active<? } ?>"><a href="app/index/home">Home</a></li>
                        <li>Kinerja Operasi
                            <ul>
                                <li class="<? if($pg == "peta_pembangkit"){?>active<? } ?>"><a id='Indexdetilpetapembangkit'>Peta Pembangkit</a></li>
                                <li class="<? if($pg == "penjualan"){?>active<? } ?>"><a id='Indexdetilpenjualan'>Penjualan</a></li>
                                <li class="<? if($pg == "kesiapan_pembangkit"){?>active<? } ?>"><a id='Indexdetilkesiapanpembangkit'>Kesiapan Pembangkit</a></li>          
                            </ul>
                        </li>
                        <li>Kinerja Keuangan
                            <ul>
                                <li class="<? if($pg == "kinerja_korporat"){?>active<? } ?>"><a id='Indexdetilkinerjakorporat'>Kinerja Korporat</a></li>
                                <li class="<? if($pg == "kinerja_keuangan_korporat"){?>active<? } ?>"><a id='Indexdetilkinerjakeuangankorporat'>Kinerja Keuangan Korporat</a></li>
                                <li class="<? if($pg == "kpi_keuangan"){?>active<? } ?>"><a id='Indexdetilkpikeuangan'>KPI Keuangan</a></li>
                            </ul>
                        </li>
                        <li>Kinerja Niaga
                            <ul>
                                <li class="<? if($pg == "kinerja_proyek"){?>active<? } ?>"><a id='Indexdetilkinerjaproyek'>Kinerja Proyek</a></li> 
                                <li class="<? if($pg == "kinerja_proyek_bdd"){?>active<? } ?>"><a id='Indexdetilkinerjaproyekbdd'>Kinerja Proyek BDD</a></li> 
                                <li class="<? if($pg == "kinerja_proyek_bdg"){?>active<? } */?>"><a id='Indexdetilkinerjaproyekbdg'>Kinerja Proyek BDG</a></li>        
                            </ul>
                        </li> -->
                      <?
                      function getmenubyparent($infoid, $arrMenu, $infolinkmodul)
                      {
                        $arrayKey= [];
                        $arrayKey= in_array_column($infoid, "ID_PARENT", $arrMenu);
                        foreach ($arrayKey as $valkey => $indexkey) 
                        {
                          $infoid= $arrMenu[$indexkey]["ID"];
                          $infonama= $arrMenu[$indexkey]["NAMA"];
                          $infolink= $arrMenu[$indexkey]["LINK_MODUL"];
                          $infoidmodul= $arrMenu[$indexkey]["IDMODUL"];

                         
                          ?>
                          <li class="<? if($pg == $infolink){?>active<? } ?>" style="cursor: pointer;">
                            <a id='<?=$infoidmodul?>'><?=$infonama?></a>
                          </li>
                          <?
                        }
                      }
                      ?>
                   
                      <?
                      $arrayKey= [];
                      $arrayKey= in_array_column("0", "ID_PARENT", $arrMenu);
                      // print_r($arrayKey);exit;
                      foreach ($arrayKey as $valkey => $indexkey) 
                      {
                          $infoid= $arrMenu[$indexkey]["ID"];
                          $infogroupmodul= $arrMenu[$indexkey]["NAMA_GROUP"];
                          $infonama= $arrMenu[$indexkey]["NAMA"];
                          $infolink= $arrMenu[$indexkey]["LINK_MODUL"];

                      ?>
                        <?
                        if($infoid=="01"||$infoid=="05"||$infoid=="06")
                        {

                        ?>
                          <li class="<? if($pg == "" || $pg == $infolink){?>active<? } ?>>"><a href="app/index/<?=$infolink?>"><?=$infonama?></a></li>
                        <?
                        }
                        else
                        {
                        ?>
                          <li ><?=$infonama?>
                              <ul >
                                <?=getmenubyparent($infoid, $arrMenu, $infolinkmodul);?>
                              </ul>
                          </li>
                        <?
                        }
                        ?>
                        
                      <?
                      }
                      ?>
                    </ul>  
                </li>
            </ul>
            
            <!-- <div class="header-logo">
            	<img src="images/logo.png"> 
            	<span>EXECUTIVE DASHBOARD</span>
            </div> -->

            <ul class="nav navbar-nav navbar-right">
            	<li>
            		<div class="area-nama-app">EXECUTIVE DASHBOARD</div>
            	</li>
              <?
              if(($apppagerolekode=="ADMIN" || $apppageroleid=="1") && ($pg != 'kinerja_proyek_detil'))
              {
              ?>
                <li>
                  <div class="area-logout pull-right" style="margin-right: 10px;"><a href="admin/index" style="background-color: #3933ff;">Halaman Admin <i class="fa fa-sign-in" aria-hidden="true"></i></a>
                  </div>
                </li>
              <?
              }
              ?>
                <li>
                    <div class="area-periode" <?=$styleRegional?>>
                      Regional
                      <select id='kode'>
                        <option <?if ($kode==0||$kode==''){ echo "selected";}?> value='0'>Total</option>
                        <option <?if ($kode==1){ echo "selected";}?> value='1'>Sumatera</option>
                        <option <?if ($kode==2){ echo "selected";}?> value='2'>Jawa Bali</option>
                        <option <?if ($kode==3){ echo "selected";}?> value='3'>Kalimantan</option>
                        <option <?if ($kode==4){ echo "selected";}?> value='4'>Sulawesi</option>
                      </select>
                    </div>
                </li>

                <li>
                    <div class="area-periode" <?=$stylePeriode?> id='Periode'>
                        Periode
                        <select id='bln'>
                            <?
                            $arrbulan=setBulanLoop();
                            for($i=0;$i<count($arrbulan);$i++){
                            ?>    
                            <option <?if ($b==$arrbulan[$i]){ echo "selected";}?> value='<?=(int)$arrbulan[$i]?>'><?=getNameMonth((int)$arrbulan[$i])?></option>
                            <?}?>
                        </select>
                        <select id='thn'>     
                            <?
                            $arrtahun=setTahunLoop(0,5);
                            for($i=0;$i<count($arrtahun);$i++){
                            ?>                               
                            <option <?if ($t==$arrtahun[$i]){ echo "selected";}?> value='<?=$arrtahun[$i]?>' ><?=$arrtahun[$i]?></option>
                            <?}?>
                        </select>
                    </div>
                </li>
                <li>
                    <div class="area-ganti-mode">
                        <input type="checkbox" class="checkbox" id="checkbox" <?=$checked?>>
                        <label for="checkbox" class="checkbox-label">
                            <i class="fa fa-moon-o" aria-hidden="true"></i>
                            <i class="fa fa-sun-o" aria-hidden="true"></i>
                            <span class="ball"></span>
                        </label>
                    </div>
                </li>
                <?if($pg=='home'||$pg==''){?>
                  <li>
                      <div class="area-logout pull-right" style="margin-right: 10px;">
                        <a onclick="stopslide()" id='stopslide' style="display:none;background-color: #3933ff;cursor: pointer;">Stop Autoplay <i class="fa fa-stop-circle" aria-hidden="true"></i></a>
                      </div>
                      <div class="area-logout pull-right" style="margin-right: 10px;">
                        <a onclick="startslide()" id='startslide' style="background-color: #3933ff;cursor: pointer;">Start Autoplay <i class="fa fa-play-circle" aria-hidden="true"></i></a>
                      </div>
                  </li>
                <?}?>
                <?if($pg=='bpp'||$pg=='nac'){?>

                <li>
                  <div class="area-logout pull-right" style="margin-right: 10px;">
                    <a class="no-print" onclick="CreatePDFfromHTML()" style="background-color: #3933ff;cursor: pointer;">Cetak</a>
                  </div>
                </li>
                <?}?>
                
                <li>
                    <div class="area-akun">
                        <!-- <i class="fa fa-user" aria-hidden="true"></i>&nbsp;Indra&nbsp;Wijaya&nbsp;(Administrator) -->
                        <i class="fa fa-user" aria-hidden="true"></i>&nbsp;<?=$appusernama?> &nbsp; (<?=$apppagerolekode?>)
                    </div>
                </li>
                <li>
                    <!-- <div class="area-logout pull-right"><a href="login/logout">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></a></div> -->
                    <div class="area-logout pull-right link-logout"><a href="login/logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a></div>
                </li>
                <li>
                	<div class="area-logo-kanan">
                		<img src="images/logo.png">
                	</div>
                </li>                  
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
      <div class="container-dashboard">
        
        <?=($content ? $content:'')?>  
      </div>

      <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
      <script>window.jQuery || document.write('<script src="assets/bootstrap-3.3.7/docs/assets/js/vendor/jquery.min.js"><\/script>')</script>
      <script src="assets/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
      <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
      <script src="assets/bootstrap-3.3.7/docs/assets/js/ie10-viewport-bug-workaround.js"></script>

      <!-- GRAND PRO OPL -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <!-- <script src="lib/grand-pro-opl/assets/js/jquery-min.js"></script> -->
      <!-- <script src="lib/grand-pro-opl/assets/js/popper.min.js"></script> -->
      <!-- <script src="lib/grand-pro-opl/assets/js/bootstrap.min.js"></script> -->
      <!-- <script src="lib/grand-pro-opl/assets/js/jquery.countdown.min.js"></script>
      <script src="lib/grand-pro-opl/assets/js/jquery.nav.js"></script>
      <script src="lib/grand-pro-opl/assets/js/jquery.easing.min.js"></script>
      <script src="lib/grand-pro-opl/assets/js/wow.js"></script>
      <script src="lib/grand-pro-opl/assets/js/jquery.slicknav.js"></script>
      <script src="lib/grand-pro-opl/assets/js/nivo-lightbox.js"></script>
      <script src="lib/grand-pro-opl/assets/js/main.js"></script>
      <script src="lib/grand-pro-opl/assets/js/form-validator.min.js"></script>
      <script src="lib/grand-pro-opl/assets/js/contact-form-script.min.js"></script> -->
      <!-- <script src="lib/grand-pro-opl/assets/js/map.js"></script> -->
      <!-- <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyCsa2Mi2HqyEcEnM1urFSIGEpvualYjwwM"></script> -->
      <!-- GANTI MODE -->
      <script type="text/javascript">
            const checkbox = document.getElementById("checkbox")
            checkbox.addEventListener("change", () => 
            {
                vals= $('#checkbox').is(':checked');
                // alert("hai");
                // document.body.classList.toggle("dark")
                $.get("login/ganti_darkmode?checkbox="+vals, function(data, status){
                    // console.log(data)
                    window.location.reload();
                });
            })
      </script>
    </div>
  </body>

  <style type="text/css">
    .loading {
      position: fixed;
      z-index: 999;
      height: 2em;
      width: 2em;
      overflow: show;
      margin: auto;
      top: 0;
      left: 0;
      bottom: 0;
      right: 0;
    }

    /* Transparent Overlay */
    .loading:before {
      content: '';
      display: block;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0, .8));

      background: -webkit-radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0,.8));
    }

    /* :not(:required) hides these rules from IE9 and below */
    .loading:not(:required) {
      /* hide "loading..." text */
      font: 0/0 a;
      color: transparent;
      text-shadow: none;
      background-color: transparent;
      border: 0;
    }

    .loading:not(:required):after {
      content: '';
      display: block;
      font-size: 10px;
      width: 1em;
      height: 1em;
      margin-top: -0.5em;
      -webkit-animation: spinner 150ms infinite linear;
      -moz-animation: spinner 150ms infinite linear;
      -ms-animation: spinner 150ms infinite linear;
      -o-animation: spinner 150ms infinite linear;
      animation: spinner 150ms infinite linear;
      border-radius: 0.5em;
      -webkit-box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
      box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
    }

    /* Animation */

    @-webkit-keyframes spinner {
      0% {
        -webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
      }
      100% {
        -webkit-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -ms-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        transform: rotate(360deg);
      }
    }
    @-moz-keyframes spinner {
      0% {
        -webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
      }
      100% {
        -webkit-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -ms-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        transform: rotate(360deg);
      }
    }
    @-o-keyframes spinner {
      0% {
        -webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
      }
      100% {
        -webkit-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -ms-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        transform: rotate(360deg);
      }
    }
    @keyframes spinner {
      0% {
        -webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
      }
      100% {
        -webkit-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -ms-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        transform: rotate(360deg);
      }
    }
      @media print {
      .no-print { display: none; } /* tombolnya sembunyi waktu dicetak */
    }
  </style>

  <div class="loading" id='vlsxloading'>Loading&#8230;</div>

  <script type="text/javascript">
    $(document).ready(function(){
        <?
        // $arrload= array("", "home");
        // if(in_array($pg, $arrload)){}
        // else
        // {
        ?>
            // $('#vlsxloading').hide();
        <?
        // }
        ?>
        <?
        if($pg=="landing")
        {
        ?>
            $('#vlsxloading').hide();
        <?
        }
        ?>
    });
  </script>
  <!-- <div id="loaderdefault" style=" z-index: 10000;opacity: 0.5;position: fixed; top:0; left:0; width:100%; height: 100%; background: url('images/loader.gif') center center #efefef"></div>
  <script type="text/javascript">
    $(document).ready(function() 
    {
      $('#loaderdefault').hide();
    })
  </script> -->

  <script type="text/javascript">
    function undf(vundefined)
    {
      if(typeof vundefined == "undefined")
      {
        vundefined= "";
      }
      return vundefined;
    }
    // var bln= thn= "";

    $(document).ready(function() {
        $("#Indexdetilkinerjakorporat, #Indexdetilpetapembangkit, #Indexdetilpenjualan, #Indexdetilkesiapanpembangkit, #Indexdetilkinerjakeuangankorporat, #Indexdetilkpikeuangan, #Indexdetilkinerjaproyek, #Indexkinerjakorporatdetil, #Indexdetilkinerjaproyekbdd, #Indexdetilkinerjaproyekbdg, #Indexrekaprealisasiai, #Indexdetilrekapmou, #Indexmonitoringbebanpembangkit,#Indexproyekakuisisi,#Indexprojecthighlight,#Indexbpp,#Indexnac,#Indexbpppermesin").on('click',function(){
            vbuttonid= $(this).attr('id');
            bln= parseInt($("#bln").val());
            thn= parseInt($("#thn").val());

            vurl= "";
            if(vbuttonid == "Indexdetilkinerjakorporat")
            {
                vurl= "app/index/kinerja_korporat?b="+bln+"&t="+thn;
            }
            else if(vbuttonid == "Indexdetilpetapembangkit")
            {
                vurl= "app/index/peta_pembangkit?b="+bln+"&t="+thn;
            }
            else if(vbuttonid == "Indexdetilpenjualan")
            {
                vurl= "app/index/penjualan?b="+bln+"&t="+thn;
            }
            else if(vbuttonid == "Indexdetilkesiapanpembangkit")
            {
                vurl= "app/index/kesiapan_pembangkit?b="+bln+"&t="+thn;
            }
            else if(vbuttonid == "Indexdetilkinerjakeuangankorporat")
            {
                vurl= "app/index/kinerja_keuangan_korporat?b="+bln+"&t="+thn;
            }
            else if(vbuttonid == "Indexdetilkpikeuangan")
            {
                vurl= "app/index/kpi_keuangan?b="+bln+"&t="+thn;
            }
            else if(vbuttonid == "Indexdetilkinerjaproyek")
            {
                vurl= "app/index/kinerja_proyek?b="+bln+"&t="+thn;
            }
            else if(vbuttonid == "Indexkinerjakorporatdetil")
            {
                vurl= "app/index/kinerja_korporat_detil?b="+bln+"&t="+thn;
            }
            else if(vbuttonid == "Indexdetilkinerjaproyekbdd")
            {
                vurl= "app/index/kinerja_proyek_bdd?b="+bln+"&t="+thn;
            }
            else if(vbuttonid == "Indexdetilkinerjaproyekbdg")
            {
                vurl= "app/index/kinerja_proyek_bdg?b="+bln+"&t="+thn;
            }
            else if(vbuttonid == "Indexrekaprealisasiai")
            {
                vurl= "app/index/rekap_realisasi_ai?b="+bln+"&t="+thn;
            }
            else if(vbuttonid == "Indexdetilrekapmou")
            {
                vurl= "app/index/rekap_mou?b="+bln+"&t="+thn;
            }
            else if(vbuttonid == "Indexproyekakuisisi")
            {
                vurl= "app/index/monitoring_proyek_akuisisi?b="+bln+"&t="+thn;
            }
            else if(vbuttonid == "Indexprojecthighlight")
            {
                vurl= "app/index/project_highlight?b="+bln+"&t="+thn;
            }
            else if(vbuttonid == "Indexbpp")
            {
                vurl= "app/index/bpp?b="+bln+"&t="+thn;
            }
            else if(vbuttonid == "Indexnac")
            {
                vurl= "app/index/nac?b="+bln+"&t="+thn;
            }
            else if(vbuttonid == "Indexbpppermesin")
            {
                vurl= "app/index/bpp_per_mesin?b="+bln+"&t="+thn;
            }
            else if(vbuttonid == "Indexmonitoringbebanpembangkit")
            {
                // vurl= "app/index/monitoring_beban_pembangkit?b="+bln+"&t="+thn;
              window.open('http://icore.plnnusantarapower.co.id/data/perspective/client/DCR/lapuskitz', '_blank');
              return false;
            }

            if(vurl !== "")
            {
                document.location.href= vurl;
            }
        });

        $("#detilkembalihome").on('click',function(){
          bln= parseInt($("#bln").val());
          thn= parseInt($("#thn").val());
            
          bln= undf(bln);
          if(bln == "")
          {
            bln= "<?=$b?>";
          }

          thn= undf(thn);
          if(thn == "")
          {
            thn= "<?=$t?>";
          }
          
          vurl= "app?b="+bln+"&t="+thn;
          document.location.href= vurl;
        });
    })

    function modifyUrl(title, url) {
        if (typeof (history.pushState) != "undefined") {
            var obj = {
                Title: title,
                Url: url
            };
            history.pushState(obj, obj.Title, obj.Url);
        }
    }

    function generateZeroDate(varId, digitGroup, digitCompletor = "0")
    {
      var newId = "";
      
      var lengthZero = digitGroup - String(varId).length;
      
      for(var i = 0; i < lengthZero; i++)
      {
        newId = newId + digitCompletor;
      }
      
      newId = newId+varId;
      
      return newId;
    }

    var autoconnect='<?=$appconnect?>';
    // console.log(autoconnect);
    function resetsession() {
      $.ajax({
        url: 'login/resetsess',
        beforeSend: function(){},
        success: function(data){
          console.info(data);
        }
      });
    }

    window.onload = function() {
      if(autoconnect==1)
      {
        setInterval(resetsession, 15 * 60 * 1000); 
      }
    };

    function menudetil(infoid) {
      $( "#"+infoid ).trigger( "click" );
    }
  </script>
  <!-- jsPDF + html2canvas -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<script>
async function CreatePDFfromHTML() {
    const { jsPDF } = window.jspdf;
    <? if($pg=='nac'){ ?>
      const element = document.querySelector('#printableArea');
    <?} else {?>
      const element = document.body;  // atau #printableArea
    <?}?>


    if (!element) {
        alert("Elemen tidak ditemukan!");
        return;
    }

    // Tampilkan loading overlay dulu
    const loadingEl = document.getElementById('vlsxloading');
    if (loadingEl) loadingEl.style.display = 'block';

    try {
        // 👇 sebelum screenshot, pastikan overlay disembunyikan
        if (loadingEl) loadingEl.style.visibility = 'hidden';

        const canvas = await html2canvas(element, { 
            scale: 2,
            useCORS: true,
            allowTaint: true,
            backgroundColor: null
        });

        if (loadingEl) loadingEl.style.visibility = 'visible';

        const imgData = canvas.toDataURL("image/png", 1.0);

        const pdf = new jsPDF("l", "mm", "a4");
        const pdfWidth = pdf.internal.pageSize.getWidth();
        const pdfHeight = pdf.internal.pageSize.getHeight();

        const imgProps = pdf.getImageProperties(imgData);
        const imgWidth = pdfWidth;
        const imgHeight = (imgProps.height * imgWidth) / imgProps.width;

        let heightLeft = imgHeight;
        let position = 0;

        pdf.addImage(imgData, "PNG", 0, position, imgWidth, imgHeight);
        heightLeft -= pdfHeight;

        while (heightLeft > 0) {
            position -= pdfHeight;
            pdf.addPage();
            pdf.addImage(imgData, "PNG", 0, position, imgWidth, imgHeight);
            heightLeft -= pdfHeight;
        }
        // pdf.output("dataurlnewwindow");
          const blobUrl = pdf.output("bloburl");
          window.open(blobUrl, "_blank");
        // pdf.save("laporan.pdf");
    } catch (err) {
        console.error("Gagal generate PDF:", err);
        alert("Terjadi error saat membuat PDF. Coba lagi.");
    } finally {
        // Matikan loading overlay
        if (loadingEl) loadingEl.style.display = 'none';
    }
}

</script>
<!------------------------------------------------------------------------------------->

