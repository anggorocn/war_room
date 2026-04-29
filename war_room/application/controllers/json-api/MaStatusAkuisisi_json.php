<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once("functions/string.func.php");
include_once("functions/date.func.php");

class MaStatusAkuisisi_json extends CI_Controller {

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
        $arrparam= ["vurl"=>"Ma_status_akuisisi"];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;

        $cari = $this->input->get("cari");
        if($cari==''){
            $cari=' ';
        }

        // print_r($set);exit;
        $last_sync=$set[0]['tgl_entri'];
        $tgl_entri=explode(' ', $last_sync);
        $tgl_entri=explode('-', $tgl_entri[0]);
        $result["LastUpdate"]= $tgl_entri[2]." ".getNameMonth(intval($tgl_entri[1]))." ".$tgl_entri[0];
        $item='';
        for($i=0;$i<count($set); $i++){
            if (stripos(strtoupper($set[$i]['potential_project']) ,strtoupper($cari)) !== false) {
                $item.='
                <div>
                  <div class="item">
                    <div class="caption" onclick="LinkDetil(`'.$set[$i]['potential_project'].'`)">
                      '.$set[$i]['potential_project'].'
                      <button type="submit" id="favouriteButton" class="pull-right" style="border: none; background-color: transparent;">
                        <span><i class="fa fa-star-o" aria-hidden="true"></i></span>
                      </button>
                    </div>
                    <div class="inner">
                      <div class="capacity">
                        <div class="ikon"><img src="images/icon-tower.png"></div>
                        <div class="data">
                          <div class="title">Capacity (MW)</div>
                          <div class="capacity-nilai">'.$set[$i]['capacity_mw'].'</div>
                        </div>
                        <div class="clearfix"></div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="title">Prospectus Assesment</div>
                          <div class="nilai">'.$set[$i]['prospectus_asesment'].'</div>
                        </div>
                        <div class="col-md-6 padding-left-none padding-right-none">
                          <div class="title">Acquisition Partner Willingness</div>
                          <div class="nilai">'.$set[$i]['acquisition_partner_willingness'].'</div>
                        </div>
                      </div>
                      
                      <div class="title">Last Activity</div>
                      <div class="nilai">'.$set[$i]['last_activity'].'</div>
                      
                      <div class="title">Next Action</div>
                      <div class="nilai">'.$set[$i]['next_action'].'</div>

                      <div class="area-progress-proyek">
                        <div class="item-progress">
                          <div class="skillbar clearfix" data-percent="'.$set[$i]['percent_fase_initiatiion'].'%">
                            <div class="skillbar-title"><span>% Initiation</span></div>
                            <div class="nilai">'.$set[$i]['percent_fase_initiatiion'].'%</div>
                            <div class="skillbar-bg"><div class="skillbar-bar" style="background: #3c8d40;"></div></div>
                            <div class="skill-bar-percent">'.$set[$i]['percent_fase_initiatiion'].'%</div>
                          </div> <!-- End Skill Bar -->
                        </div>

                        <div class="item-progress">
                          <div class="skillbar clearfix" data-percent="'.$set[$i]['percent_development'].'%">
                            <div class="skillbar-title"><span>% Development</span></div>
                            <div class="nilai">'.$set[$i]['percent_development'].'%</div>
                            <div class="skillbar-bg"><div class="skillbar-bar" style="background: #1db6c9;"></div></div>
                            <div class="skill-bar-percent">'.$set[$i]['percent_development'].'%</div>
                          </div> <!-- End Skill Bar -->
                        </div>

                        <div class="item-progress">
                          <div class="skillbar clearfix" data-percent="'.$set[$i]['percent_closing_transaction'].'%">
                            <div class="skillbar-title"><span>% Closing Transaction</span></div>
                            <div class="nilai">'.$set[$i]['percent_closing_transaction'].'%</div>
                            <div class="skillbar-bg"><div class="skillbar-bar" style="background: #ee1896;"></div></div>
                            <div class="skill-bar-percent">'.$set[$i]['percent_closing_transaction'].'%</div>
                          </div> <!-- End Skill Bar -->
                        </div>

                        <div class="item-progress">
                          <div class="skillbar clearfix" data-percent="'.$set[$i]['percent_eksekusi'].'%">
                            <div class="skillbar-title"><span>% Execution</span></div>
                            <div class="nilai">'.$set[$i]['percent_eksekusi'].'%</div>
                            <div class="skillbar-bg"><div class="skillbar-bar" style="background: #1db6c9;"></div></div>
                            <div class="skill-bar-percent">'.$set[$i]['percent_eksekusi'].'%</div>
                          </div> <!-- End Skill Bar -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>';
            }
        }
        $result["item"]= $item;
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
        $listStatusLATE=0;
        $listStatusWarning=0;
        $listStatusCOMPLETED=0;
        $listStatusNOTSTARTED=0;
        $listStatusONSCHEDULE=0;
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
                    <div class="col-md-3" style="padding-right:0;">
                      <div class="plan">
                        <div class="title">Plan</div>
                        <div class="nilai">'.$data[$i]['progress_epc_plan'].' %</div>
                      </div>
                    </div>
                    <div class="col-md-3" style="padding-right:0;">
                      <div class="actual" style="background-color:'.$warna.';border: 1px dashed dark'.$warna.';color:'.$color.'">
                        <div class="title">Actual</div>
                        <div class="nilai">'.$data[$i]['progress_epc'].' %</div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="status">
                        <div class="title">Status : <span class="nilai" style="color:'.$warna.';">'.$vewsstatus.' </span></div>
                        
                        <div class="title">Last Update</div>
                        <div class="tanggal">'.$data[$i]['updated_at'].'</div>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>';

            $textPopup .='
            <div id="myModal'.$i.'" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">'.$data[$i]['project_name'].'</h4>
                  </div>
                  <div class="modal-body area-popup">
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

                            <div id="Documentation'.$i.'" class="tabcontent">
                            </div>
                        </div>
                    </div>
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="hidden" id="proyekId'.$i.'" value="'.$data[$i]['project_id'].'">
                  </div>
                </div>

                </div>
            </div>';
            $arrdata= [];
            $arrdata[0]= "<b>".$data[$i]['project_name']."</b><br>".$data[$i]['location_name']."<br><div class='area-logout pull-right'  data-toggle='modal' data-target='#myModal".$i."' style='cursor:pointer;background-color: blue;color: white;padding: 5px 10px;border-radius: 5px;'> Detil </div>";
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

    function documentation(){
        $this->load->model('base-api/DataCombo');
        $arrdatabkn= [];
        $valProyekId = $this->input->get("valProyekId");
        $arrparam= ["vurl"=>"Kinerja_proyek_documentation?reqProyekId=".$valProyekId];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        $total=count($set);
        $total =number_format(($total/8), 0, '.', '');
        // print_r($total); exit;

        $setcityName = $this->input->get("setcityName");
        $setPage = $this->input->get("setPage");
        $pageEnd = 8*$setPage;
        $pageStart = $pageEnd-8;

        if(count($set)<$pageEnd){
            $pageEnd=count($set);
        }
        // echo count($set)."-".$pageEnd;exit;

        if($total==0){
            $showpopup='<center style="color: white">DATA KOSONG</center>';
        }
        else{

            $showpopup='
            <div class="container-fluid area-dokumentasi">
                <div class="row" style="display: flex; display: -webkit-flex; flex-wrap: wrap;">';

             for($i=$pageStart;$i<$pageEnd;$i++){
                if($set[$i]['media_type']=='image'){
                    $showpopup.='
                    <div class="col-md-3">
                        <div class="item">
                            <div class="foto"><img src="'.$set[$i]['media_url'].'"></div>
                            <div class="judul">'.substr($set[$i]['media_caption'], 0, 30).'</div>
                            <a class="fancybox fancybox.image" href="'.$set[$i]['media_url'].'" data-fancybox-group="gallery" title="'.$set[$i]['media_caption'].'"></a>
                        </div>
                    </div>
                    '; 
                }
                else if($set[$i]['media_type']=='video'){            
                    $showpopup.='
                    <div class="col-md-3">
                        <div class="item">
                            <div class="foto">

                              <iframe src="'.$set[$i]['media_url'].'" title="'.substr($set[$i]['media_caption'], 0, 30).'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                            <div class="judul">
                              '.$set[$i]['media_caption'].'
                            </div>
                            <a class="fancybox fancybox.iframe" href="'.$set[$i]['media_url'].'" data-fancybox-group="gallery" title="'.$set[$i]['media_caption'].'"></a>
                        </div>
                      </div>
                    ';
                }
                else{
                    $showpopup.='
                    <div class="col-md-3">
                        <div class="item">
                            <div class="foto"><img src="images/img-drive.jpg"></div>
                            <div class="judul">'.substr($set[$i]['media_caption'], 0, 30).'</div>
                            <a class="fancybox" href="images/img-drive.jpg" data-fancybox-group="gallery" title="<a style=background:none;border:none href='.$set[$i]['media_caption'].' target=_blank>'.$set[$i]['media_caption'].'</a>"></a>
                        </div>
                      </div>
                    ';
                }
            }

            $showpopup.='</div>';
            $showpopup.=
            '   
                    <div class="row">
                      <div class="col-md-12">
                        <ul class="pagination">';

                        if($setPage==1){
                          $aktif1='class="active"';
                        }
                        else if($setPage==2){
                          $aktif2='class="active"';
                        }
                        else if($setPage==3){
                          $aktif3='class="active"';
                        }
                        else if($setPage==4){
                          $aktif4='class="active"';
                        }
                        else if($setPage==5){
                          $aktif5='class="active"';
                        }
                        else{
                          $aktif6='class="active"';
                        }

                          
                        if(count($set)>=8){
                          $showpopup.=
                        '<li '.$aktif1.' onclick="pageSelect(1,'.$setcityName.','.$valProyekId.')" style="cursor:pointer"><a>1</a></li>';                            
                        }
                        if(count($set)>=16){
                          $showpopup.=
                        '<li '.$aktif2.' onclick="pageSelect(2,'.$setcityName.','.$valProyekId.')" style="cursor:pointer"><a>2</a></li>';
                        }
                        if(count($set)>=24){
                          $showpopup.=
                        '<li '.$aktif3.' onclick="pageSelect(3,'.$setcityName.','.$valProyekId.')" style="cursor:pointer"><a>3</a></li>';
                        }
                        if(count($set)>=32){
                          $showpopup.=
                        '<li '.$aktif4.' onclick="pageSelect(4,'.$setcityName.','.$valProyekId.')" style="cursor:pointer"><a>4</a></li>';
                        }
                        if(count($set)>=40){
                          $showpopup.=
                        '<li '.$aktif5.' onclick="pageSelect(5,'.$setcityName.','.$valProyekId.')" style="cursor:pointer"><a>5</a></li>';
                        }
                        if(count($set)>=40){
                          $showpopup.=
                        '<li ><a>...</a></li>
                          <li '.$aktif6.' onclick="pageSelect('.$total.','.$setcityName.','.$valProyekId.')" style="cursor:pointer"><a>'.$total.'</a></li>
                        ';
                        }
            $showpopup.=
            '
                        </ul> 
                      
                    </div>
                </div>
            </div>';
        }
        $result= $showpopup;
        echo json_encode($result);
        exit;
    }

}
?>