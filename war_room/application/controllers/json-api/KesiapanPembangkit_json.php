<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once("functions/string.func.php");
include_once("functions/date.func.php");

class KesiapanPembangkit_json extends CI_Controller {

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
        $arrparam= ["vurl"=>"Kesiapan_pembangkit"];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        // print_r($set); exit;
       
        $result["mw_dmn"]= numberformatnew($set["total_kesiapan_pembangkit"][0]['mw_dmn'])." MW";
        $result["per_dmn"]= numberformatnew($set["total_kesiapan_pembangkit"][0]['per_dmn'])."";
        $result["mw_normal_operasi"]= numberformatnew($set["total_kesiapan_pembangkit"][0]['mw_normal_operasi'])." MW";
        $result["per_normal_operasi"]= numberformatnew($set["total_kesiapan_pembangkit"][0]['per_normal_operasi'])."";
        $result["mw_derating_operasi"]= numberformatnew($set["total_kesiapan_pembangkit"][0]['mw_derating_operasi'])." MW";
        $result["per_derating_operasi"]= numberformatnew($set["total_kesiapan_pembangkit"][0]['per_derating_operasi'])."";
        $result["mw_outage"]= numberformatnew($set["total_kesiapan_pembangkit"][0]['mw_outage'])." MW";
        $result["per_outage_operasi"]= numberformatnew($set["total_kesiapan_pembangkit"][0]['per_outage_operasi'])."";
        $result["mw_standby"]= numberformatnew($set["total_kesiapan_pembangkit"][0]['mw_standby'])." MW";
        $result["per_mw_standby"]= numberformatnew($set["total_kesiapan_pembangkit"][0]['per_mw_standby'])."";
        $result["mw_total_kesiapan"]= numberformatnew($set["total_kesiapan_pembangkit"][0]['mw_total_kesiapan'])." MW";
        $result["per_total_kesiapan"]= numberformatnew($set["total_kesiapan_pembangkit"][0]['per_total_kesiapan'])."";
        $last_sync=$set["kesiapan_pembangkit"][0]['last_sync'];
        $tgl_entri=explode(' ', $last_sync);
        $tgl_entri=explode('-', $tgl_entri[0]);
        $result["tgl_entri_kesiapanpembangkit"]= $tgl_entri[2]." ".getNameMonth(intval($tgl_entri[1]))." ".$tgl_entri[0];
        echo json_encode($result);
        exit;
    }

    function sub(){
        $this->load->model('base-api/DataCombo');
        $arrdatabkn= [];
        $arrparam= ["vurl"=>"Kesiapan_pembangkit"];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        // print_r($set); exit;

        $listPembangkit='';
        $data=$set['kesiapan_pembangkit'];
        for($i=0;$i<count($data);$i++){
            if($data[$i]['total_kesiapan'] >= 100){
                $classBunder='hijau';
            } else if($data[$i]['total_kesiapan'] >= 95 && $data[$i]['total_kesiapan'] < 100){
                $classBunder='kuning';
            } else{
                $classBunder='merah';
            }
            $listPembangkit .= '
            <div class="col-md-4 padding-none" data-toggle="modal" data-target="#myModal'.$i.'" style="cursor:pointer">
              <div class="item">
                <div class="title">Lokasi Pembangkit</div>
                <div class="caption">'.$data[$i]['rdistrik_nama'].'</div>
                <div class="title">DMN</div>
                <div class="nilai">'.$data[$i]['dmn'].' MW</div>
                <div class="title">Normal Operasi</div>
                <div class="nilai">'.$data[$i]['mw_normal_operasi'].' MW   <span class="persentase pull-right">'.$data[$i]['per_normal_operasi'].' %</span></div>
                <div class="title">Derating</div>
                <div class="nilai">'.$data[$i]['mw_derating_operasi'].' MW   <span class="persentase pull-right">'.$data[$i]['per_derating_operasi'].' %</span></div>
                <div class="title">Outage</div>
                <div class="nilai">'.$data[$i]['mw_outage'].' MW   <span class="persentase pull-right">'.$data[$i]['per_outage'].' %</span></div>
                <div class="title">Standby</div>
                <div class="nilai">'.$data[$i]['mw_standby'].' MW   <span class="persentase pull-right">'.$data[$i]['per_standby'].' %</span></div>
                <div class="title">Total Kesiapan</div>
                <div class="nilai">'.$data[$i]['total_kesiapan'].'% <span class="pull-right"><i class="fa fa-circle '.$classBunder.'" aria-hidden="true"></i></span></div>
              </div>
            </div>';

            $arrparam= ["vurl"=>"Detail_kesiapan_pembangkit?reqCode=".$data[$i]['rdistrik_kode']];
            $setPopup= new DataCombo();
            $setPopup->selectdata($arrparam, "", "allrow");
            $setPopup= $setPopup->rowResult;
            
            $dataPopup=$setPopup['detail_kesiapan_pembangkit'];

            $textPopup .='
            <div id="myModal'.$i.'" class="modal fade" role="dialog" >
                <div class="modal-dialog" style="width: 1250px;">

                <!-- Modal content-->
                <div class="modal-content" style="width: 1250px;">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Unit '.$data[$i]['rdistrik_nama'].'</h4>
                  </div>
                  <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="">';
                                    if ($dataPopup) 
                                    {
                                        $textPopup .='
                                        <table style="width: 100%">
                                            <tr>
                                                <td>Nama Unit</td>
                                                <td>Keterangan Status</td>
                                                <td>Tanggal Kejadian</td>
                                                <td>Jam Kejadian</td>
                                                <td>Derating MW</td>
                                                <td>Catatan</td>
                                            </tr>';
                                            for($j=0; $j<count($dataPopup);$j++){

                                                $textPopup .='
                                                <tr>
                                                    <td>'.$dataPopup[$j]['runit_nama'].'</td>
                                                    <td>'.$dataPopup[$j]['rstatkin_nama'].'</td>
                                                    <td>'.$dataPopup[$j]['tukin_tgl'].'</td>
                                                    <td>'.$dataPopup[$j]['tukin_jam'].'</td>
                                                    <td>'.$dataPopup[$j]['tukin_derate'].'</td>
                                                    <td>'.$dataPopup[$j]['tukin_notes'].'</td>
                                                </tr>';                            
                                            }
                                        $textPopup .='
                                        </table>';
                                    }
                                    else
                                    {
                                        $textPopup .='
                                        Tidak Ada Data.';
                                    }
                                $textPopup .='  
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
            </div>';
        }
       
        $result["listPembangkit"]= $listPembangkit;
        $result["textPopup"]= $textPopup;
       
        $result["mw_dmn"]= numberformatnew($set["total_kesiapan_pembangkit"][0]['mw_dmn'])." MW";
        $result["per_dmn"]= numberformatnew($set["total_kesiapan_pembangkit"][0]['per_dmn'])."";
        $result["mw_normal_operasi"]= numberformatnew($set["total_kesiapan_pembangkit"][0]['mw_normal_operasi'])." MW";
        $result["per_normal_operasi"]= numberformatnew($set["total_kesiapan_pembangkit"][0]['per_normal_operasi'])."";
        $result["mw_derating_operasi"]= numberformatnew($set["total_kesiapan_pembangkit"][0]['mw_derating_operasi'])." MW";
        $result["per_derating_operasi"]= numberformatnew($set["total_kesiapan_pembangkit"][0]['per_derating_operasi'])."";
        $result["mw_outage"]= numberformatnew($set["total_kesiapan_pembangkit"][0]['mw_outage'])." MW";
        $result["per_outage_operasi"]= numberformatnew($set["total_kesiapan_pembangkit"][0]['per_outage_operasi'])."";
        $result["mw_standby"]= numberformatnew($set["total_kesiapan_pembangkit"][0]['mw_standby'])." MW";
        $result["per_mw_standby"]= numberformatnew($set["total_kesiapan_pembangkit"][0]['per_mw_standby'])."";
        $result["mw_total_kesiapan"]= numberformatnew($set["total_kesiapan_pembangkit"][0]['mw_total_kesiapan'])." MW";
        $result["per_total_kesiapan"]= numberformatnew($set["total_kesiapan_pembangkit"][0]['per_total_kesiapan'])."";
        $result["total_pembangkit"]= count($data);
        $last_sync=$set["kesiapan_pembangkit"][0]['last_sync'];
        $tgl_entri=explode(' ', $last_sync);
        $tgl_entri=explode('-', $tgl_entri[0]);
        $result["tgl_entri_kesiapanpembangkit"]= $tgl_entri[2]." ".getNameMonth(intval($tgl_entri[1]))." ".$tgl_entri[0];
        echo json_encode($result);
        exit;
    }

}
?>