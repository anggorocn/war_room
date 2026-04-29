<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once("functions/string.func.php");
include_once("functions/date.func.php");

class PetaPembangkit_json extends CI_Controller {

    function __construct() {
        parent::__construct();

        if($this->session->userdata("appuserid") == "")
        {
            redirect('login');
        }
    }

    function home(){
        $this->load->model('base-api/DataCombo');
        $arrdatabkn= [];
        $arrparam= ["vurl"=>"Pbr_kinerja_operasi"];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;

        // print_r($set);exit;
        $arrJenisPembangkit=array();
        $arrJenisPembangkitTotal=array();
        // list pembangkit dan total

        $textJenisPembangkit='';
        $JumlahPembangkit=$set['jumlah_pembangkit_jenis'];
        for($i=0; $i<count($set['jumlah_pembangkit_jenis']);$i++){
            $textJenisPembangkit .=
            "<div class='item'>
                <div class='title'>".$JumlahPembangkit[$i]['jenis_pembangkit']."</div>
                <div class='nilai'>".$JumlahPembangkit[$i]['jumlah']." unit</div>
            </div>";
        }

        $result["TotalUnit"]= numberformatnew($set['jumlah_pembangkit'][0]['jumlah_pembangkit_all']);
        $result["TotalDayaTerpasang"]= numberformatnew($set['total_daya'][0]['total_daya_terpasang'])."MW";
        $result["TotalDayaMampu"]= numberformatnew($set['total_daya'][0]['total_daya_mampu'])."MW";
        $result["TextJenisPembangkit"]= $textJenisPembangkit;
        echo json_encode($result);
        exit;
    }

    function sub(){
        $this->load->model('base-api/DataCombo');
        $arrdatabkn= [];
        $arrparam= ["vurl"=>"Pbr_kinerja_operasi"];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;

        // print_r($set);exit;
        $arrJenisPembangkit=array();
        $arrJenisPembangkitTotal=array();
        $filter = $this->input->get("filter");

        // list pembangkit dan total

        $textJenisPembangkit='';
        $JumlahPembangkit=$set['jumlah_pembangkit_jenis'];
        // print_r($JumlahPembangkit);exit;
        for($i=0; $i < count($JumlahPembangkit); $i++)
        {
            $jenispembangkit= $JumlahPembangkit[$i]['jenis_pembangkit'];
            $class= strtolower($jenispembangkit);
            $textJenisPembangkit .=
            '<div class="col-md-3 padding-none">
                <div class="item '.$class.'" style="cursor: pointer;" onclick="filterPembangkit(`'.$jenispembangkit.'`)" >
                    <div class="caption">
                        <span>'.$jenispembangkit.'</span>
                        <div class="jumlah">'.$JumlahPembangkit[$i]['jumlah'].' unit</div>
                    </div>
                    <div class="title">Daya Terpasang</div>
                    <div class="nilai">'.$JumlahPembangkit[$i]['daya_terpasang'].' MW</div>
                    <div class="title">Daya Mampu</div>
                    <div class="nilai">'.$JumlahPembangkit[$i]['daya_mampu'].' MW</div>
                </div>
            </div>';
        }

        $textListPembangkit='';
        $textPetaPembangkit=array();
        $listPembangkit=$set['data'];
        // print_r($listPembangkit);exit;

        for($i=0; $i<count($listPembangkit);$i++){
            $daya_terpasang=0;

            $jenispembangkit= $listPembangkit[$i]['jenis_pembangkit'];
            if(empty($filter) || $filter == $jenispembangkit )
            {
                $textPopup .='
                <div id="myModal'.$i.'" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Mesin '.$listPembangkit[$i]['pembangkit'].'</h4>
                      </div>
                      <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">';
                            for($j=0; $j<count($listPembangkit[$i]['mesin']);$j++){
                                $daya_terpasang=$daya_terpasang+$listPembangkit[$i]['mesin'][$j]['daya_terpasang'];
                                $textPopup .='
                                <div class="col-md-4">
                                    <div class="item-mesin">
                                        <div class="title">Nama Mesin</div>
                                        <div class="caption">'.$listPembangkit[$i]['mesin'][$j]['nama_mesin'].'</div>
                                        <div class="title">Daya Terpasang </div>
                                        <div class="nilai">'.$listPembangkit[$i]['mesin'][$j]['daya_terpasang'].' KW       </div>
                                        <div class="title">Tahun Operasi  </div>
                                        <div class="nilai">'.$listPembangkit[$i]['mesin'][$j]['tahun_operasi'].'           </div>
                                        <div class="title">Bahan Bakar    </div>
                                        <div class="nilai">'.$listPembangkit[$i]['mesin'][$j]['bahan_bakar'].'            </div>
                                        <div class="title">Merk Mesin    </div>
                                        <div class="nilai">'.$listPembangkit[$i]['mesin'][$j]['merk'].'            </div>
                                    </div>
                                </div>';                            
                            }

                            $textPopup .='    
                            </div>
                        </div>
                        
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>

                    </div>
                </div>';

                $textListPembangkit .=
                '<div>
                    <div class="item">
                        <div class="data">
                            <div class="caption">'.$listPembangkit[$i]['pembangkit'].'</div>
                            <div class="title">Jenis Pembangkit</div>
                            <div class="nilai">'.$jenispembangkit.'</div>
                            <div class="title">Sistem</div>
                            <div class="nilai">'.$listPembangkit[$i]['sistem'].'</div>
                            <div class="title">Provinsi</div>
                            <div class="nilai">'.$listPembangkit[$i]['provinsi'].'</div>
                        </div>
                        <div class="area-mesin" data-toggle="modal" data-target="#myModal'.$i.'" style="cursor:pointer">
                            <div class="title">Jumlah Mesin</div>
                            <div class="nilai">'.count($listPembangkit[$i]['mesin']).'</div>
                            <div class="title">Daya Terpasang Total</div>
                            <div class="nilai">'.numberformatnew($daya_terpasang).' KW</div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>';

                $unitmesin= $datanamemesin= $dayaterpasang= $datadaya= "";
                for ($lp=0; $lp < count($listPembangkit[$i]['mesin']); $lp++) 
                {
                    $datanamemesin= $listPembangkit[$i]['mesin'][$lp]['nama_mesin'];
                    $dayaterpasang= $listPembangkit[$i]['mesin'][$lp]['daya_terpasang'];

                    if(empty($unitmesin))
                        $unitmesin= $datanamemesin;
                    else
                    {
                        $unitmesin= "&nbsp;".$unitmesin."<br>&nbsp;".$datanamemesin;
                    }

                    if(empty($unitmesin))
                        $dayaterpasang= $dayaterpasang;
                    else
                    {
                        $dayaterpasang= "&nbsp;".$dayaterpasang."<br>&nbsp;".$dayaterpasang;
                    }
                }

                $arrdata= [];
                $arrdata[0]= "<table border='0' style='color:black'>
                                <tr>
                                    <td colspan='4'><b>".$listPembangkit[$i]['pembangkit']."</b></td>
                                </tr>
                                <tr>
                                    <td>Wilayah &nbsp;</td>
                                    <td>:</td>
                                    <td colspan='2'> &nbsp; ".$listPembangkit[$i]['wilayah']."</td>
                                </tr>
                                <tr>
                                    <td>Sistem &nbsp;</td>
                                    <td>:</td>
                                    <td colspan='2'> &nbsp; ".$listPembangkit[$i]['sistem']."</td>
                                </tr>
                                <tr>
                                    <td>Provinsi &nbsp;</td>
                                    <td>:</td>
                                    <td colspan='2'> &nbsp; ".$listPembangkit[$i]['provinsi']."</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td> &nbsp; <b>Unit Mesin</b></td>
                                    <td> &nbsp; <b>Daya Terpasang</b></td>
                                </tr>
                                <tr>
                                    <td>Mesin &nbsp;</td>
                                    <td>:</td>
                                    <td>".$unitmesin."</td>
                                    <td align='right'>".$dayaterpasang."</td>
                                </tr>
                            </table>";

//                             No space<br>
// &#8201;Thin space<br>
// &#8194;En space<br>
// &#8195;Em space<br>

                //okes
                $arrdata[1]= $listPembangkit[$i]['latitude'];
                $arrdata[2]= $listPembangkit[$i]['longitude'];
                $arrdata[3]= $i;
                $arrdata[4]= strtolower($jenispembangkit);
                array_push($textPetaPembangkit, $arrdata);
            }
        }

        $result["TextJenisPembangkit"]= $textJenisPembangkit;
        $result["TextListPembangkit"]= $textListPembangkit;
        $result["TotalUnit"]= numberformatnew($set['jumlah_pembangkit'][0]['jumlah_pembangkit_all']);
        $result["TotalDayaTerpasang"]= numberformatnew($set['total_daya'][0]['total_daya_terpasang'])."MW";
        $result["TotalDayaMampu"]= numberformatnew($set['total_daya'][0]['total_daya_mampu'])."MW";
        $result["textPetaPembangkit"]= $textPetaPembangkit;
        $result["textPopup"]= $textPopup;
        echo json_encode($result);
        exit;
    }

}
?>