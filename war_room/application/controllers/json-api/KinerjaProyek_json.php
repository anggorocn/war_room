<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once("functions/string.func.php");
include_once("functions/date.func.php");

class KinerjaProyek_json extends CI_Controller {

    function __construct() {
        parent::__construct();

        if($this->session->userdata("appuserid") == "")
        {
            redirect('login');
        }
    }

    function homeOld(){
        $this->load->model('base-api/DataCombo');
        $arrdatabkn= [];
        $arrparam= ["vurl"=>"Kinerja_proyek"];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        // print_r($set);exit;
        $data=$set['data'];

        $listStatusLATE= $listStatusWarning= $listStatusCOMPLETED= $listStatusNOTSTARTED= $listStatusONSCHEDULE=0;
        for($i=0;$i<count($data);$i++){
            if($data[$i]['ews_status']=='LATE'){
                if(abs($data[$i]['progress_epc_deviation'])<5){
                    $listStatusWarning=$listStatusWarning+1;
                }
                else
                {
                    $listStatusLATE=$listStatusLATE+1;
                }
            }
            else if($data[$i]['ews_status']=='NOT STARTED'){
                $listStatusNOTSTARTED=$listStatusNOTSTARTED+1;
            }
            else if($data[$i]['ews_status']=='COMPLETED'){
                $listStatusCOMPLETED=$listStatusCOMPLETED+1;
            }
            else{
                $listStatusONSCHEDULE=$listStatusONSCHEDULE+1;
            }
        }
        $result["listStatusLate"]= $listStatusLATE;
        $result["listStatusWarning"]= $listStatusWarning;
        $result["listStatusCompleted"]= $listStatusCOMPLETED;
        $result["listStatusNotStarted"]= $listStatusNOTSTARTED;
        $result["listStatusOnSchedule"]= $listStatusONSCHEDULE;
        $result["updated_at_kinerjaproyek"]= $data[count($data)-1]['updated_at'];
        echo json_encode($result);
        exit;
    }

    function home(){
        $this->load->model('base-api/DataCombo');
        $arrdatabkn= [];
        $arrparam= ["vurl"=>"Kinerja_proyek"];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        // print_r($set);exit;
        $data=$set['data'];

        $listStatusINITIATION= $listStatusDEVELOPMENT= $listStatusEXECUTION= $listStatusCOMPLETION=0;
        for($i=0;$i<count($data);$i++){
            // if($data[$i]['ews_status']=='LATE'){
            //     if(abs($data[$i]['progress_epc_deviation'])<5){
            //         $listStatusWarning=$listStatusWarning+1;
            //     }
            //     else
            //     {
            //         $listStatusLATE=$listStatusLATE+1;
            //     }
            // }
            // else if($data[$i]['ews_status']=='NOT STARTED'){
            //     $listStatusNOTSTARTED=$listStatusNOTSTARTED+1;
            // }
            // else if($data[$i]['ews_status']=='COMPLETED'){
            //     $listStatusCOMPLETED=$listStatusCOMPLETED+1;
            // }
            // else{
            //     $listStatusONSCHEDULE=$listStatusONSCHEDULE+1;
            // }
            
            $vewsstatus= $data[$i]['stage_name'];

            if(strtoupper($vewsstatus)=='INITIATION'){
                $listStatusINITIATION=$listStatusINITIATION+1;
            }
            else if(strtoupper($vewsstatus)=='DEVELOPMENT'){
                $listStatusDEVELOPMENT=$listStatusDEVELOPMENT+1;
            }
            else if(strtoupper($vewsstatus)=='EXECUTION'){
                $listStatusEXECUTION=$listStatusEXECUTION+1;               
            }
            else{
                $listStatusCOMPLETION=$listStatusCOMPLETION+1;                
            }
        }
        $result["listStatusINITIATION"]= $listStatusINITIATION;
        $result["listStatusDEVELOPMENT"]= $listStatusDEVELOPMENT;
        $result["listStatusEXECUTION"]= $listStatusEXECUTION;
        $result["listStatusCOMPLETION"]= $listStatusCOMPLETION;
        $result["updated_at_kinerjaproyek"]= $data[count($data)-1]['updated_at'];
        echo json_encode($result);
        exit;
    }

    function sub(){
        $this->load->model('base-api/DataCombo');
        $arrdatabkn= [];
        $arrparam= ["vurl"=>"Kinerja_proyek"];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        // print_r($set); exit;
        $data=$set['data'];
        $listStatusLATE= $listStatusWarning= $listStatusCOMPLETED= $listStatusNOTSTARTED= $listStatusONSCHEDULE=0;
        $drawDetil='';
        $textPopup='';
        $textPetaPembangkit=array();
        $plan_total_arr=array();
        $act_total_arr=array();
        $plan_line_arr=array();
        $act_line_arr=array();
        $GarisX_arr=array();
        for($i=0;$i<count($data);$i++){
            $color='white';

            $vewsstatus= $data[$i]['ews_status'];

            if($vewsstatus=='LATE'){
                // if($data[$i]['progress_epc_deviation']<5){
                if(abs($data[$i]['progress_epc_deviation'])<5){
                    $warna='yellow';
                    $color='black';
                    $vewsstatus= "WARNING";
                    $listStatusWarning=$listStatusWarning+1;
                }
                else
                {
                    $warna='red';
                    $listStatusLATE=$listStatusLATE+1;
                }
            }
            else if($vewsstatus=='NOT STARTED'){
                $listStatusNOTSTARTED=$listStatusNOTSTARTED+1;
                $warna='gray';
            }
            else if($vewsstatus=='COMPLETED'){
                $listStatusCOMPLETED=$listStatusCOMPLETED+1;
                $warna='blue';
            }
            else{
                $listStatusONSCHEDULE=$listStatusONSCHEDULE+1;
                $warna='green';
            }

            $drawDetil .='<div>
                <div class="item late"  data-toggle="modal" data-target="#myModal'.$i.'" style="cursor:pointer">
                  <div class="caption">'.$data[$i]['project_name'].'</div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="plan">
                        <div class="title">Plan</div>
                        <div class="nilai">'.$data[$i]['progress_epc_plan'].' %</div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="actual" style="background-color:'.$warna.';border: 1px dashed dark'.$warna.';color:'.$color.'">
                        <div class="title">Actual</div>
                        <div class="nilai">'.$data[$i]['progress_epc'].' %</div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="status">
                        <div class="title">Status</div>
                        <div class="nilai" style="color:'.$warna.';">'.$vewsstatus.' </div>
                        <div class="title">Last Update</div>
                        <div class="tanggal">'.$data[$i]['updated_at'].'</div>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>';

            $textPopup .='
            <div id="myModal'.$i.'" class="modal fade" role="dialog">
                <div class="modal-dialog" style="width: 1500px;">

                <!-- Modal content-->
                <div class="modal-content" style="width: 1500px;">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">'.$data[$i]['project_name'].'</h4>
                  </div>
                  <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="tab">
                              <button class="tablinks active" onclick="openCity(event, `Profil'.$i.'`)">Profil</button>
                              <button class="tablinks" onclick="openCity(event, `Performance'.$i.'`)">Performance</button>
                              <button class="tablinks" onclick="openCity(event, `Issue'.$i.'`)">Issue</button>
                              <button class="tablinks" onclick="openCity(event, `Risk'.$i.'`)">Risk</button>
                              <button class="tablinks" onclick="openCity(event, `Documentation'.$i.'`)">Documentation</button>
                            </div>

                            <div id="Profil'.$i.'" class="tabcontent" style="display: block;">
                              <p>'.$data[$i]['project_custom_info'].'</p>
                            </div>

                            <div id="Issue'.$i.'" class="tabcontent">
                              <p>'.$data[$i]['project_custom_isulog'].'</p> 
                            </div>

                            <div id="Performance'.$i.'" class="tabcontent">
                                <div id="popupchart'.$i.'"></div>
                            </div>

                            <div id="Risk'.$i.'" class="tabcontent">
                                <p>
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>Kode</td>
                                            <td>Risiko</td>
                                            <td>Inheren</td>
                                            <td>Paska Kontrol</td>
                                            <td>Actual Real</td>
                                            <td>Residual</td>
                                            <td>Activity</td>
                                            <td>Created</td>
                                        </tr>
                                        ';
                                        if(count($data[$i]['risks'])==0){
                                            $textPopup .='
                                            <tr>
                                                <td colspan="8" style="text-align:center">Data Kosong</td>
                                            </tr>';
                                        }
                                        else{
                                            for($j=0;$j<count($data[$i]['risks']);$j++){
                                               $textPopup .='
                                               <tr>
                                                    <td>Kode</td>
                                                    <td>Risiko</td>
                                                    <td>Inheren</td>
                                                    <td>Paska Kontrol</td>
                                                    <td>Actual Real</td>
                                                    <td>Residual</td>
                                                    <td>Activity</td>
                                                    <td>Created</td>
                                                </tr>'; 
                                            }                                            
                                        }
                                    $textPopup .='
                                    </table>
                                </p>
                            </div>

                            <div id="Documentation'.$i.'" class="tabcontent area-popup">
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
            $arrdata= [];
            $arrdata[0]= "'<b>".$data[$i]['project_name']."</b><br>".$data[$i]['location_name']."<br>'";
            $arrdata[1]= $data[$i]['lat'];
            $arrdata[2]= $data[$i]['long'];
            $arrdata[3]= $i;
            $arrdata[4]= strtolower($jenispembangkit);
            $arrdata[5]= $data[$i]['stage_name'];
            array_push($textPetaPembangkit, $arrdata);

            $arrparamChart= ["vurl"=>"Kinerja_proyek_grafik?reqProyekId=".$data[$i]['project_id']];
            $setChart= new DataCombo();
            $setChart->selectdata($arrparamChart, "", "allrow");
            $setChart= $setChart->rowResult;
            // print_r("Kinerja_proyek_grafik?reqProyekId=".$data[$i]['project_id']);

            $dataChart=$setChart['data'];
            $plan_total=array();
            $act_total=array();
            $plan_line=array();
            $act_line=array();
            $GarisX=array();
            for($j=0;$j<count($dataChart['labels']);$j++){
                array_push($plan_total,$dataChart['datasets'][0]['data'][$j]);
                array_push($act_total,$dataChart['datasets'][1]['data'][$j]);
                array_push($plan_line,$dataChart['datasets'][2]['data'][$j]);
                array_push($act_line,$dataChart['datasets'][3]['data'][$j]);
                array_push($GarisX,$dataChart['labels'][$j]);
            }
            
            array_push($plan_total_arr,$plan_total);
            array_push($act_total_arr,$act_total);
            array_push($plan_line_arr,$plan_line);
            array_push($act_line_arr,$act_line);
            array_push($GarisX_arr,$GarisX);

        }
        // print_r($textPetaPembangkit);exit;

        $result["listStatusLate"]= $listStatusLATE;
        $result["listStatusWarning"]= $listStatusWarning;
        $result["listStatusCompleted"]= $listStatusCOMPLETED;
        $result["listStatusNotStarted"]= $listStatusNOTSTARTED;
        $result["listStatusOnSchedule"]= $listStatusONSCHEDULE;
        $result["drawDetil"]= $drawDetil;
        $result["textPetaPembangkit"]= $textPetaPembangkit;
        $result["textPopup"]= $textPopup;
        $result["plan_total_arr"]= $plan_total_arr;
        $result["act_total_arr"]= $act_total_arr;
        $result["plan_line_arr"]= $plan_line_arr;
        $result["act_line_arr"]= $act_line_arr;
        $result["GarisX"]= $GarisX_arr;
        echo json_encode($result);
        exit;
    }

    /*function documentation(){
        $this->load->model('base-api/DataCombo');
        $arrdatabkn= [];
        $arrparam= ["vurl"=>"Kinerja_proyek_documentation"];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        print_r($set); exit;
        $showpopup='
        <div class="container-fluid area-dokumentasi">
            <div class="row" style="display: flex; display: -webkit-flex; flex-wrap: wrap;">';

        for($i=0;$i<10$i++){
            $showpopup.='
            <div class="col-md-3">
                <div class="item">
                  <a href="#" data-toggle="modal" data-target="#myModalFoto">
                    <div class="foto"><img src="uploads/foto/img-dok-1.jpg"></div>
                    <div class="judul">Lorem ipsum dolor sit amet consectetur adipiscing elit</div>
                  </a>
                </div>
            </div>
            ';
        }

        $showpopup.=
        '   </div>
        </div>'
        $result= $showpopup;
        echo json_encode($result);
        exit;
    }*/

}
?>