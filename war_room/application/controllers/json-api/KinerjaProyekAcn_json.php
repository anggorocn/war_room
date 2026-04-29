<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once("functions/string.func.php");
include_once("functions/date.func.php");

class KinerjaProyekAcn_json extends CI_Controller {

    function __construct() {
        parent::__construct();

        if($this->session->userdata("appuserid") == "")
        {
            redirect('login');
        }

        $this->arrContextOptions=array(
          "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
          ),
        );
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
        $listStatusLATE=0;
        $listStatusCOMPLETED=0;
        $listStatusNOTSTARTED=0;
        $listStatusONSCHEDULE=0;
        for($i=0;$i<count($data);$i++){
            if($data[$i]['ews_status']=='LATE'){
                $listStatusLATE=$listStatusLATE+1;
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
        $result["listStatusCompleted"]= $listStatusCOMPLETED;
        $result["listStatusNotStarted"]= $listStatusNOTSTARTED;
        $result["listStatusOnSchedule"]= $listStatusONSCHEDULE;
        $result["updated_at_kinerjaproyek"]= $data[count($data)-1]['updated_at'];
        echo json_encode($result);
        exit;
    }

    function detil(){
        $this->load->model('base-api/DataCombo');
        $reqId = $this->input->get("reqId");
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
        for($i=0;$i<count($data);$i++){

            if($reqId==$data[$i]['project_id']){
                $project_custom_info=$data[$i]['project_custom_info'];
                $project_custom_isulog=$data[$i]['project_custom_isulog'];
                $project_name=$data[$i]['project_name'];

                $risks=
                '<table class="table table-bordered">
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
                           $risks .='
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
                $risks .='
                </table>';
            }

        }
        // print_r($textPetaPembangkit);exit;

        $result["textPopup"]= $textPopup;
        $result["project_custom_info"]=$project_custom_info;
        $result["project_custom_isulog"]=$project_custom_isulog;
        $result["risks"]=$risks;
        $result["project_name"]=$project_name;
        echo json_encode($result);
        exit;
    }

    function subOld(){
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

    function createGrafik(){
        $this->load->model('base-api/DataCombo');        
        $valProyekId = $this->input->get("valProyekId");
        $arrparamChart= ["vurl"=>"Kinerja_proyek_grafik?reqProyekId=".$valProyekId];
        $setChart= new DataCombo();
        $setChart->selectdata($arrparamChart, "", "allrow");
        $setChart= $setChart->rowResult;

        // print_r($setChart['data']); exit;

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

        $result["plan_total_arr"]= $plan_total;
        $result["act_total_arr"]= $act_total;
        $result["plan_line_arr"]= $plan_line;
        $result["act_line_arr"]= $act_line;
        $result["GarisX"]= $GarisX;
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

    function highlight(){
        $this->load->model('base-api/DataCombo');
        $this->load->model("base-admin/Crud");
        
        $arrparam= ["vurl"=>"Kinerja_proyek"];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        $data=$set['data'];
        // print_r($data);exit;
        $arrLoadSearch=array();
        for($i=0;$i<count($data);$i++){
            array_push($arrLoadSearch, $data[$i]['project_id']);
        }
        // print_r($arrLoadSearch);exit;
        $set= new Crud();
        $set->selectByParamsPilihanKinerja(array(), -1, -1, $statement);
        // $arrPilih=array();
        $output='';
        while ($set->nextRow()) {

            // array_push($arrPilih, $set->getField("Kinerja_id"));
            $x=array_search($set->getField("Kinerja_id"),$arrLoadSearch);

            $dataexplode=explode('<tr style="">',$data[$x]['project_custom_info']);
            $searchword='Kontraktor EPC';
            foreach($dataexplode as $k=>$v) {
                if(preg_match("/\b$searchword\b/i", $v)) {
                    $matches = $v;
                }
            }
            
            $matches=explode('<td style="">',$matches); 
            $matches=str_replace('</td>', '', $matches[2]);
            $matches=str_replace('</tr>', '', $matches);
            // print_r($matches);exit;

            $tgl_entri=explode('-', $data[$x]['project_plan_finish']);
            $tgl_entri= $tgl_entri[2]." ".getNameMonth(intval($tgl_entri[1]))." ".$tgl_entri[0];

            $output.='<div onclick="callfunc('.$set->getField("Kinerja_id").')">
                          <div class="item item-highlight">
                            <div class="caption">'.$data[$x]['project_name'].'</div>
                            <div class="inner" onclick="callfunc('.$set->getField("Kinerja_id").')">
                              <div class="capacity">
                                <div class="ikon"><img src="images/icon-tower.png"></div>
                                <div class="data">
                                  <div class="title">Capacity</div>
                                  <div class="capacity-nilai">'.$data[$x]['power_capacity'].'</div>
                                </div>
                                <div class="clearfix"></div>
                              </div>

                              <div class="title">Lokasi</div>
                              <div class="nilai">'.$data[$x]['location_name'].'
                              </div>

                              <div class="title">COD</div>
                              <div class="nilai">'.$tgl_entri.'</div>
                              
                              <div class="title">Kontraktor EPC</div>
                              <div class="nilai">'.$matches.'
                              </div>

                              <div class="nilai-proyek">
                                <div class="title">Nilai Proyek</div>
                                <div class="nilai">Rp <span>'.$data[$x]['project_value'].'</span></div>  
                              </div>
                            </div>
                          </div>
                        </div>';
            // echo $x."-";
        }
        // $arrdatabkn= [];
        // echo count($data);exit;
        $result["output"]= $output;
        echo json_encode($result);
        exit;
    }

    function img($b64url)
    {
      $url = urldecode($b64url);
      $url = base64_decode($url);
      if(isset($_GET['str_append'])){$url = $url.$_GET['str_append']; } 
      $headers = get_headers ($url, 1);
      if (!$headers || !isset($headers['Content-Type'])) { 
          exit('Failed to retrieve headers');
      }

      header('Content-Type:' . $headers['Content-Type']); 
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $data = curl_exec($ch);
      if (curl_errno($ch)) {
      x.exit('Failed to fetch data: '.curl_error($ch));
      }
      curl_close($ch);
      header('Access-Control-Allow-Origin: *');
      header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
      header('Access-Control-Allow-Headers: X-Requested-With, Authorization, Content-Type');
      header('Access-Control-Max-Age: 86400');
      echo $data; exit;
    }

    function highlightDetilold(){
        $this->load->model('base-api/DataCombo');
        $x = $this->input->get("v");
        $arrparam= ["vurl"=>"Kinerja_proyek"];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        $data=$set['data'];
        $dataexplode=explode('<tr style="">',$data[$x]['project_custom_info']);
        $searchword='Kontraktor EPC';
        foreach($dataexplode as $k=>$v) {
            if(preg_match("/\b$searchword\b/i", $v)) {
                $matches = $v;
            }
        }
        $matches=explode('<td style="">',$matches); 
        $matches=str_replace('</td>', '', $matches[2]);
        $matches=str_replace('</tr>', '', $matches);
        // print_r($matches); exit;
        // $data
        $result["location_name"]=$data[$x]['location_name'];
        $result["cod_ruptl"]=$data[$x]['cod_ruptl'];
        $result["project_name"]=$data[$x]['project_name'];
        $result["power_capacity"]=$data[$x]['power_capacity'];
        $result["project_value"]="Rp.<span>".$data[$x]['project_value']."</span>";
        $result["KontraktorEpc"]=$matches;

        $arrparam= ["vurl"=>"Project_highlight"];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        $datesaveLast='';
        $totalData=count($set);
        for($i=0;$i<$totalData;$i++){
            $date=explode(' ', $set[($totalData-($i+1))]['media_date']);
            if($datesaveLast!=$date[0]){
                $datesaveLast=$date[0];
            }
        }
        // print_r($set); exit;
        $temp_date='<ol>';
        $temp_content='<ol>';
        $datesave='';
        $totalData=count($set);
        $clastdata= "";
        $xdata= 0;
        for($i=0;$i<$totalData;$i++){
            $date=explode(' ', $set[($totalData-($i+1))]['media_date']);
            if($datesave!=$date[0] && $date[0]!=''){
                $dateVal= explode('-',$date[0]);
                $href='#'.$i;
                $xdata++;

                if($i==0){
                    $temp_date .='<li><a href="'.$href.'" data-date="'.$dateVal[2].'/'.$dateVal[1].'/'.$dateVal[0].'" class="older-event">'.$date[0].'</a></li>';
                    $temp_content .=' <li data-date="'.$dateVal[2].'/'.$dateVal[1].'/'.$dateVal[0].'">
                                      <div class="row">
                                        <div class="col-md-7">
                                          <div style="text-align:center;">
                                            <div style="display:none;margin:0 auto;" class="html5gallery" data-skin="horizontal" data-width="480" data-height="272" data-resizemode="fill">';
                                            $tanggal_Sebelum=$dateVal[2].'/'.$dateVal[1].'/'.$dateVal[0];
                                            $judul_Sebelum=$set[($totalData-($i+1))]['media_caption'];
                                            $capton_Sebelum=$set[($totalData-($i+1))]['media_description'];
                }
                else{
                    if($datesaveLast==$date[0]){
                        // $class2='class="selected"';
                        // $class1='class="selected"';

                        // untuk triger ke last data
                        $clastdata= "selected clastdata";
                    }
                    else{
                        // $class2='class="older-event"';
                        // $class1='';

                        // untuk triger ke last data
                        $clastdata= "";
                    }
                    $temp_date .='<li><a class="'.$clastdata.'" href="'.$href.'" data-date="'.$dateVal[2].'/'.$dateVal[1].'/'.$dateVal[0].'" '.$class2.'>'.$date[0].'</a></li>';        
                    $temp_content .=' </div>
                                          </div>
                                        </div>
                                        <div class="col-md-5">
                                          <div class="konten-deskripsi">
                                            <h2>'.$judul_Sebelum.'</h2> 
                                            <em>'.$tanggal_Sebelum.'</em>
                                            <p>'.$capton_Sebelum.'</p>
                                          </div>
                                        </div>
                                      </div>
                                      
                                    </li>';
                    $temp_content .=' <li data-date="'.$dateVal[2].'/'.$dateVal[1].'/'.$dateVal[0].'" '.$class2.'>
                                      <div class="row">
                                        <div class="col-md-7">
                                          <div style="text-align:center;">
                                            <div style="display:none;margin:0 auto;" class="html5gallery" data-skin="horizontal" data-width="480" data-height="272" data-resizemode="fill">';     
                    // $temp_content .=' <a href="/war_room_dev/images/img-highlight1.jpg"><img src="/war_room_dev/images/img-highlight1.jpg" alt="Trees"></a>';
                    // $imgurl = base_url().'json-api/KinerjaProyekAcn_json/img/'.urlencode(base64_encode($set[($totalData-($i+1))]['media_url']));
                    // $temp_content .=' <a href="'.str_replace('=', '', $imgurl).'"><img src="'.str_replace('=', '', $imgurl).'" alt="'.$set[($totalData-($i+1))]['media_caption'].'"></a>';                
                    $temp_content .=' <a href="'.$set[($totalData-($i+1))]['media_url'].'"><img src="'.$set[($totalData-($i+1))]['media_url'].'" alt="'.$set[($totalData-($i+1))]['media_caption'].'"></a>';                

                    $tanggal_Sebelum=$dateVal[2].'/'.$dateVal[1].'/'.$dateVal[0];
                    $judul_Sebelum=$set[($totalData-($i+1))]['media_caption'];
                    $capton_Sebelum=$set[($totalData-($i+1))]['media_description'];
                }
                $datesave=$date[0];
            }
            else if($date[0]==''){

            }
            else{
                    // $imgurl = base_url().'json-api/KinerjaProyekAcn_json/img/'.urlencode(base64_encode($set[($totalData-($i+1))]['media_url']));

                // $temp_content .=' <a href="'.$imgurl.'"><img src="'.str_replace('=', '', $imgurl).'" alt="'.$set[($totalData-($i+1))]['media_caption'].'"></a>';                
                $temp_content .=' <a href="'.$set[($totalData-($i+1))]['media_url'].'"><img src="'.str_replace('=', '', $set[($totalData-($i+1))]['media_url']).'" alt="'.$set[($totalData-($i+1))]['media_caption'].'"></a>';                
            }
                                            
                                            
        }
        $temp_date .='</ol>
                                      <span class="filling-line" aria-hidden="true"></span>
        ';
        $temp_content.='</div>

                                          </div>
                                          <!-- GALLERY END -->

                                        </div>
                                        <div class="col-md-5">
                                          <div class="konten-deskripsi">
                                            <h2>'.$judul_Sebelum.'</h2> 
                                            <em>'.$tanggal_Sebelum.'</em>
                                            <p>'.$capton_Sebelum.'</p>
                                          </div>
                                        </div>
                                      </div>
                                      
                                    </li>';
        $temp_content.='</ol>';


        $result["temp_date"]= $temp_date;
        $result["temp_date2"]= '
                                      <ol>
                                        <li><a href="#0" data-date="16/01/2014" class="selected">16 Jan</a></li>
                                        <li><a href="#0" data-date="28/02/2014">28 Feb</a></li>
                                        <li><a href="#0" data-date="20/04/2014">20 Mar</a></li>
                                        <li><a href="#0" data-date="20/05/2014">20 May</a></li>
                                        <li><a href="#0" data-date="09/07/2014">09 Jul</a></li>
                                        <li><a href="#0" data-date="30/08/2014">30 Aug</a></li>
                                        <li><a href="#0" data-date="15/09/2014">15 Sep</a></li>
                                        <li><a href="#0" data-date="01/11/2014">01 Nov</a></li>
                                        <li><a href="#0" data-date="10/12/2014">10 Dec</a></li>
                                        <li><a href="#0" data-date="19/01/2015">29 Jan</a></li>
                                        <li><a href="#0" data-date="03/03/2015">3 Mar</a></li>
                                      </ol>

                                      <span class="filling-line" aria-hidden="true"></span>
                                    ';

                                    // echo $temp_date; exit;
        $result["temp_content"]= $temp_content;
        $result["xdata"]= $xdata;
        // $data=$set['data'];

        // $arrparam= ["vurl"=>"Kinerja_proyek_documentation?reqProyekId=".$data[$x]['project_id']];
        // $set= new DataCombo();
        // $set->selectdata($arrparam, "", "allrow");
        // $set= $set->rowResult;
        // print_r($set);exit;
        echo json_encode($result);
        exit;
    }

    function highlightdetilcb(){
        $this->load->model('base-api/DataCombo');
        $x = $this->input->get("v");
        $arrparam= ["vurl"=>"Kinerja_proyek"];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        $data=$set['data'];
        $dataexplode=explode('<tr style="">',$data[$x]['project_custom_info']);
        $searchword='Kontraktor EPC';
        foreach($dataexplode as $k=>$v) {
            if(preg_match("/\b$searchword\b/i", $v)) {
                $matches = $v;
            }
        }
        $matches=explode('<td style="">',$matches); 
        $matches=str_replace('</td>', '', $matches[2]);
        $matches=str_replace('</tr>', '', $matches);
        // print_r($matches); exit;
        // $data
        $result["location_name"]= $data[$x]['location_name'];
        $result["cod_ruptl"]= $data[$x]['cod_ruptl'];
        $result["project_name"]= $data[$x]['project_name'];
        $result["power_capacity"]= $data[$x]['power_capacity'];
        $result["project_value"]= "Rp.<span>".$data[$x]['project_value']."</span>";
        $result["KontraktorEpc"]= $matches;

        $arrparam= ["vurl"=>"Project_highlight"];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        $datesaveLast='';
        $totalData=count($set);
        for($i=0;$i<$totalData;$i++)
        {
            $date=explode(' ', $set[($totalData-($i+1))]['media_date']);
            if($datesaveLast!=$date[0])
            {
                $datesaveLast=$date[0];
            }
        }
        // print_r($set); exit;

        $temp_date='<ol>';
        $temp_content='<ol>';
        $datesave='';
        $totalData=count($set);
        $clastdata= "";
        $xdata= 0;
        $indexdate= 0;
        for($i=0;$i<$totalData;$i++)
        {
            $date=explode(' ', $set[($totalData-($i+1))]['media_date']);
            
            $vinfodate= $date[0];
            if($datesave!=$vinfodate && $vinfodate!='')
            {
                $dateVal= explode('-',$vinfodate);

                $dateval0= $dateVal[0];
                $dateval1= $dateVal[1];
                $dateval2= $dateVal[2];

                $vinfodatadate= $dateval2.'/'.$dateval1.'/'.$dateval0;
                $hrefinfodatadateid= str_replace("/", "_", $vinfodatadate);

                $href='#'.$i;
                $xdata++;

                if($i==0)
                {
                    $temp_date.='<li><a class="older-event" href="'.$href.'" onClick="vhref(`'.$hrefinfodatadateid.'`)" data-date="'.$vinfodatadate.'">'.$vinfodate.'</a></li>';
                    $temp_content.=' <li data-date="'.$vinfodatadate.'">
                                      <div class="row">
                                        <div class="col-md-7">
                                          <div style="text-align:center;">
                                            <div style="display:none;margin:0 auto;" class="html5gallery" data-skin="horizontal" data-width="480" data-height="272" data-resizemode="fill">';

                    $indextotaldata= ($totalData-($i+1));
                    $tanggal_Sebelum= $vinfodatadate;
                    $judul_Sebelum= $set[$indextotaldata]['media_caption'];
                    $capton_Sebelum= $set[$indextotaldata]['media_description'];
                }
                else
                {
                    if($datesaveLast==$vinfodate){
                        // $class2='class="selected"';
                        // $class1='class="selected"';

                        // untuk triger ke last data
                        $clastdata= "selected clastdata";
                    }
                    else
                    {
                        // $class2='class="older-event"';
                        // $class1='';

                        // untuk triger ke last data
                        $clastdata= "";
                    }

                    $temp_date .='<li><a class="'.$clastdata.'" href="'.$href.'" onClick="vhref(`'.$hrefinfodatadateid.'`)" data-date="'.$vinfodatadate.'" '.$class2.'>'.$vinfodate.'</a></li>';
                    $temp_content .=' </div>
                                          </div>
                                        </div>
                                        <div class="col-md-5">
                                          <div class="konten-deskripsi">
                                            <h2>'.$judul_Sebelum.'</h2> 
                                            <em>'.$tanggal_Sebelum.'</em>
                                            <p>'.$capton_Sebelum.'</p>
                                          </div>
                                        </div>
                                      </div>
                                      
                                    </li>';
                    $temp_content .=' <li data-date="'.$vinfodatadate.'" '.$class2.'>
                                      <div class="row">
                                        <div class="col-md-7">
                                          <div style="text-align:center;">
                                            <div style="display:none;margin:0 auto;" class="html5gallery" data-skin="horizontal" data-width="480" data-height="272" data-resizemode="fill">';

                    // $temp_content .=' <a href="'.$set[$indextotaldata]['media_url'].'"><img src="'.$set[$indextotaldata]['media_url'].'" alt="'.$set[$indextotaldata]['media_caption'].'"></a>';

                    $indextotaldata= ($totalData-($i+1));
                    $vinfodatadateid= $hrefinfodatadateid."_".$indexdate;
                    $indexdate++;
                    $temp_content .='
                    <input type="hidden" id="dthiddenmediaurl'.$vinfodatadateid.'" value="'.$set[$indextotaldata]['media_url'].'" />
                    <a id="vhref'.$vinfodatadateid.'"><img id="vhrefimg'.$vinfodatadateid.'" alt="'.$set[$indextotaldata]['media_caption'].'"></a>
                    ';
                    
                    $tanggal_Sebelum= $vinfodatadate;
                    $judul_Sebelum= $set[$indextotaldata]['media_caption'];
                    $capton_Sebelum =$set[$indextotaldata]['media_description'];
                }

                $datesave=$vinfodate;
            }
            else if($vinfodate==''){

            }
            else
            {
                // $temp_content .=' <a href="'.$set[$indextotaldata]['media_url'].'"><img src="'.str_replace('=', '', $set[$indextotaldata]['media_url']).'" alt="'.$set[$indextotaldata]['media_caption'].'"></a>';

                $indextotaldata= ($totalData-($i+1));
                $vinfodatadateid= $hrefinfodatadateid."_".$indexdate;
                $indexdate++;

                $temp_content .='
                <input type="hidden" id="dthiddenmediaurl'.$vinfodatadateid.'" value="'.$set[$indextotaldata]['media_url'].'" />
                <a id="vhref'.$vinfodatadateid.'"><img id="vhrefimg'.$vinfodatadateid.'" alt="'.$set[$indextotaldata]['media_caption'].'"></a>
                ';
            }
        }
        $temp_date .='</ol>
                                      <span class="filling-line" aria-hidden="true"></span>
        ';
        $temp_content.='</div>

                                          </div>
                                          <!-- GALLERY END -->

                                        </div>
                                        <div class="col-md-5">
                                          <div class="konten-deskripsi">
                                            <h2>'.$judul_Sebelum.'</h2> 
                                            <em>'.$tanggal_Sebelum.'</em>
                                            <p>'.$capton_Sebelum.'</p>
                                          </div>
                                        </div>
                                      </div>
                                      
                                    </li>';
        $temp_content.='</ol>';

        $result["temp_date"]= $temp_date;
        $result["temp_content"]= $temp_content;
        $result["xdata"]= $xdata;
        echo json_encode($result);
        exit;
    }

    function highlightdetilslick(){
        $this->load->model('base-api/DataCombo');
        $x = $this->input->get("v");
        $cekquery = $this->input->get("c");
        $arrparam= ["vurl"=>"Kinerja_proyek"];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        $data=$set['data'];
        if($cekquery == 1)
        {
            print_r($data);exit;
        }
        // $dataexplode=explode('<tr style="">',$data[$x]['project_custom_info']);
        // $searchword='Kontraktor EPC';
        // foreach($dataexplode as $k=>$v) {
        //     if(preg_match("/\b$searchword\b/i", $v)) {
        //         $matches = $v;
        //     }
        // }
        // $matches=explode('<td style="">',$matches); 
        // $matches=str_replace('</td>', '', $matches[2]);
        // $matches=str_replace('</tr>', '', $matches);
        // print_r($data); exit;
        // $data

        for($i=0; $i<count($data);$i++){
            if($x==$data[$i]['project_id']){
                $matches = $i;
            }
        }
        $result["location_name"]= $data[$matches]['location_name'];

        $tgl_entri=explode('-', $data[$matches]['project_plan_finish']);
        $tgl_entri= $tgl_entri[2]." ".getNameMonth(intval($tgl_entri[1]))." ".$tgl_entri[0];
        $result["cod_ruptl"]= $tgl_entri;

        $result["project_name"]= $data[$matches]['project_name'];
        $result["power_capacity"]= $data[$matches]['power_capacity'];
        $result["project_value"]= "Rp.<span>".$data[$matches]['project_value']."</span>";

        $dataexplode=explode('<tr style="">',$data[$matches]['project_custom_info']);
        $searchword='Kontraktor EPC';
        foreach($dataexplode as $k=>$v) {
            if(preg_match("/\b$searchword\b/i", $v)) {
                $matches = $v;
            }
        }
        
        $matches=explode('<td style="">',$matches); 
        $matches=str_replace('</td>', '', $matches[2]);
        $matches=str_replace('</tr>', '', $matches);

        $result["KontraktorEpc"]= $matches;

        $arrparam= ["vurl"=>"Project_highlight?v=".$x];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        // print_r($set);exit;

        $arrinfo= [];
        foreach ($set as $key => $varr) {
            $vmediadate= $varr["media_date"];
            $vproject_id= $varr["project_id"];
            $vmedia_caption= $varr["media_caption"];
            $vmedia_description= $varr["media_description"];
            $vmedia_type= $varr["media_type"];
            $vmedia_url= $varr["media_url"];
            $vcreated_at= $varr["created_at"];
            $vtanggal= datetimeToPage($vmediadate, "date");
            if(!empty($vtanggal))
            {
                $infocarikey= $vtanggal;
                $arrcheck= in_array_column($infocarikey, "tanggal", $arrinfo);
                if(empty($arrcheck))
                {
                    $arrdata= [];
                    $arrdata["orderby"]= strtotime($vmediadate);
                    $arrdata["tanggal"]= $vtanggal;
                    $arrdata["tanggal_format"]= getYear($vtanggal)." ".getExtMonth((int)getMonth($vtanggal))." ".getDay($vtanggal);
                    $arrdata["infodetil"]= [];
                    array_push($arrinfo, $arrdata);

                    $infocarikey= $vtanggal;
                    $arrcheck= in_array_column($infocarikey, "tanggal", $arrinfo);
                    // insert data detil
                    $indx= $arrcheck[0];
                    $arrdata= [];
                    $arrdata["project_id"]= $vproject_id;
                    $arrdata["media_caption"]= $vmedia_caption;
                    $arrdata["media_description"]= $vmedia_description;
                    $arrdata["media_type"]= $vmedia_type;
                    $arrdata["media_url"]= $vmedia_url;
                    $arrdata["created_at"]= $vcreated_at;
                    $arrdata["orderby"]= strtotime($vcreated_at);
                    array_push($arrinfo[$indx]["infodetil"], $arrdata);
                }
                else
                {
                    // insert data detil
                    $indx= $arrcheck[0];
                    $arrdata= [];
                    $arrdata["project_id"]= $vproject_id;
                    $arrdata["media_caption"]= $vmedia_caption;
                    $arrdata["media_description"]= $vmedia_description;
                    $arrdata["media_type"]= $vmedia_type;
                    $arrdata["media_url"]= $vmedia_url;
                    $arrdata["created_at"]= $vcreated_at;
                    $arrdata["orderby"]= strtotime($vcreated_at);
                    array_push($arrinfo[$indx]["infodetil"], $arrdata);
                }
            }
        }

        $key_values= array_column($arrinfo, 'orderby');
        // array_multisort($key_values, SORT_DESC, $arrinfo);
        array_multisort($key_values, SORT_ASC, $arrinfo);
        // print_r($arrinfo);exit;

        $temp_date= '<ol>';
        $temp_content= '<ol>';
        foreach ($arrinfo as $k => $v) {
            // print_r($v);exit;
            $href='#'.$k;
            $vinfodate= $v["tanggal_format"];
            $vinfodate= explode(" ",$v["tanggal_format"]);
            $vinfodate= $vinfodate[0]." ".$vinfodate[1]."<br>".$vinfodate[2];
            $vinfodatadate= str_replace("-", "/", dateToPageCheck($v["tanggal"]));
            $hrefinfodatadateid= str_replace("/", "_", $vinfodatadate);

            $vcreated_at= $v["created_at"];

            $temp_date.='<li><a href="'.$href.'" class="lihref" id="lihref'.$hrefinfodatadateid.'" onClick="vhref(`'.$hrefinfodatadateid.'`)" data-date="'.$vinfodatadate.'">'.$vinfodate.'</a></li>';

            $vinfodetil= $v["infodetil"];
            foreach ($vinfodetil as $kd => $vd)
            {
                $vdetilmediaurl= $vd["media_url"];
                if(!is_file($vdetilmediaurl))
                {
                    // $vdetilmediaurl= "images/img-no.png";
                }

                // if($vd["media_type"]!='image'){

                //     $vdetilmediaurl= "images/img-no.png";
                // }
                $vdetilmediacaption= $vd["media_caption"];
                $vdetilmediadescription= $vd["media_description"];
                $vdetilmediatype= $vd["media_type"];
                $vinfodatadateid= $hrefinfodatadateid."_".$kd;

                if($kd == 0)
                {
                // echo $vdetilmediaurl;exit;
                    $temp_content.='
                    <li data-date="'.$vinfodatadate.'">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="area-galeri-project">
                                    <div class="videos-slider" id="slick'.$hrefinfodatadateid.'">
                                        <div>
                                            <div class="bs-overlay foto">
                                                <input type="hidden" id="dthiddenmediaurl'.$vinfodatadateid.'" value="'.$vdetilmediaurl.'" />
                                                <img onClick="vhrefimg(`'.$vinfodatadateid.'`)" id="vhrefimg'.$vinfodatadateid.'" alt="'.$vdetilmediacaption.'" />
                                                <div class="bs-overlay-panel bs-overlay-background bs-overlay-top text-center text-uppercase">
                                                    <h4>"'.$vdetilmediacaption.'"</h4>
                                                </div>
                                            </div>
                                        </div>
                                ';   
                }
                else
                {
                                        $temp_content .='
                                        <div>
                                            <div class="bs-overlay foto">
                                                <input type="hidden" id="dthiddenmediaurl'.$vinfodatadateid.'" value="'.$vdetilmediaurl.'" />
                                                <img onClick="vhrefimg(`'.$vinfodatadateid.'`)" id="vhrefimg'.$vinfodatadateid.'" alt="'.$vdetilmediacaption.'" />
                                                <div class="bs-overlay-panel bs-overlay-background bs-overlay-top text-center text-uppercase">
                                                    <h4>"'.$vdetilmediacaption.'"</h4>
                                                </div>
                                            </div>
                                        </div>
                                        ';
                }
            }

            if(!empty($vinfodetil))
            {
                                    $temp_content .='
                                    </div>

                                    <div class="slider-nav-thumbnails">
                                    ';
                                    $i=0;
                                    // print_r($vinfodetil);exit;
                                    foreach ($vinfodetil as $km => $vm)
                                    {
                                        $vdetilmediaurl= $vm["media_url"];
                                        $vdetilmediacaption= $vm["media_caption"];
                                        $vdetilmediatype= $vm["media_type"];
                                        // if($vdetilmediatype=='image' && $i==0){
                                        //     $vdetilmediacaptionStart= $vm["media_caption"];
                                        // }
                                        // else if($vdetilmediatype=='image'){
                                        //     $i++;
                                        // }
                                        $vdetilmediadescription= $vm["media_description"];
                                        $vdetilCreate= $vm["created_at"];
                                        $vinfodatadateid= $hrefinfodatadateid."_".$km;
                                        $style='';
                                        if($i==0){
                                            $vdetilmediacaptionStart= $vdetilmediacaption;
                                            $style=' style="border:solid red"';
                                            // echo $vdetilmediacaption;exit;
                                        }

                                        if($vdetilmediatype=='image'){
                                            $temp_content .='
                                            <div>
                                                <img  onclick="changeJudul(`'.$hrefinfodatadateid.'`,'.$i.')" id="vhrefdetilimg'.$vinfodatadateid.'" '.$style.' alt="'.$vdetilmediacaption.'"/>
                                                <input  id="vhrefdetilimgval'.$vinfodatadateid.'" type="hidden" value="'.$vdetilmediacaption.'">
                                                <input  id="vhrefdetilimgdate'.$vinfodatadateid.'" type="hidden" value="'.$vdetilCreate.'">
                                                <input  id="vhrefdetilimgdesc'.$vinfodatadateid.'" type="hidden" value="'.$vdetilmediadescription.'">
                                            </div>
                                            ';
                                            $i++;

                                        }
                                    }

                                    $temp_content .='
                                    </div>
                                    ';
            }

            $lastjudul= $vdetilmediacaptionStart;
            $lasttanggal= $vcreated_at;
            $lastdescription= $vdetilmediadescription;

                    $temp_content .='
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="konten-deskripsi">
                                <h2 id="Val'.$hrefinfodatadateid.'">'.$lastjudul.'</h2> 
                                <em id="Date'.$hrefinfodatadateid.'">'.$lasttanggal.'</em>
                                <p id="Desc'.$hrefinfodatadateid.'">'.$lastdescription.'</p>
                            </div>
                        </div>
                    </li>';
        }

        $temp_date .='</ol><span class="filling-line" aria-hidden="true"></span>';
        $temp_content .='</ol>';
        // echo $temp_content;exit;

        $result["temp_date"]= $temp_date;
        $result["temp_content"]= $temp_content;
        // print_r($result);exit;
        echo json_encode($result);
        exit;
    }

    function highlightdetilnewcb(){
        $this->load->model('base-api/DataCombo');
        $x = $this->input->get("v");
        $arrparam= ["vurl"=>"Kinerja_proyek"];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        $data=$set['data'];
        $dataexplode=explode('<tr style="">',$data[$x]['project_custom_info']);
        $searchword='Kontraktor EPC';
        foreach($dataexplode as $k=>$v) {
            if(preg_match("/\b$searchword\b/i", $v)) {
                $matches = $v;
            }
        }
        $matches=explode('<td style="">',$matches); 
        $matches=str_replace('</td>', '', $matches[2]);
        $matches=str_replace('</tr>', '', $matches);
        // print_r($matches); exit;
        // $data
        $result["location_name"]= $data[$x]['location_name'];
        $result["cod_ruptl"]= $data[$x]['cod_ruptl'];
        $result["project_name"]= $data[$x]['project_name'];
        $result["power_capacity"]= $data[$x]['power_capacity'];
        $result["project_value"]= "Rp.<span>".$data[$x]['project_value']."</span>";
        $result["KontraktorEpc"]= $matches;

        $arrparam= ["vurl"=>"Project_highlight"];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        $datesaveLast='';
        $totalData=count($set);
        for($i=0;$i<$totalData;$i++)
        {
            $date=explode(' ', $set[($totalData-($i+1))]['media_date']);
            if($datesaveLast!=$date[0])
            {
                $datesaveLast=$date[0];
            }
        }
        // print_r($set); exit;

        $temp_date='<ol>';
        $temp_content='<ol>';
        $datesave='';
        $totalData=count($set);
        $clastdata= "";
        $xdata= 0;
        $indexdate= 0;

        for($i=0;$i<$totalData;$i++)
        {
            $date=explode(' ', $set[($totalData-($i+1))]['media_date']);
            
            $vinfodate= $date[0];
            if($datesave!=$vinfodate && $vinfodate!='')
            {
                $dateVal= explode('-',$vinfodate);

                $dateval0= $dateVal[0];
                $dateval1= $dateVal[1];
                $dateval2= $dateVal[2];

                $vinfodatadate= $dateval2.'/'.$dateval1.'/'.$dateval0;
                $hrefinfodatadateid= str_replace("/", "_", $vinfodatadate);

                $href='#'.$i;
                $xdata++;

                if($i==0)
                {
                    $temp_date.='<li><a href="'.$href.'" onClick="vhref(`'.$hrefinfodatadateid.'`)" data-date="'.$vinfodatadate.'">'.$vinfodate.'</a></li>';

                    $indextotaldata= ($totalData-($i+1));
                    $tanggal_Sebelum= $vinfodatadate;
                    $judul_Sebelum= $set[$indextotaldata]['media_caption'];
                    $capton_Sebelum= $set[$indextotaldata]['media_description'];

                    $temp_content.=' <li class="xselected" data-date="'.$vinfodatadate.'">
                          <div class="row">
                            <div class="col-md-7">

                              <div class="area-unite-gallery">
                                <div id="gallery'.$hrefinfodatadateid.'" style="display:none;">
                                    <input type="hidden" id="dthiddenmediaurl'.$vinfodatadateid.'" value="'.$set[$indextotaldata]['media_url'].'" />
                                    <img alt="Preview Image 1" src="images/img-highlight1.jpg" data-image="images/img-highlight1.jpg" data-description="Preview Image 1 Description">
                                ';
                    
                }
                else
                {
                    if($datesaveLast==$vinfodate){

                        // untuk triger ke last data
                        // $clastdata= "selected clastdata";
                    }
                    else
                    {
                        // untuk triger ke last data
                        $clastdata= "";
                    }

                    $temp_date .='<li><a class="'.$clastdata.'" href="'.$href.'" onClick="vhref(`'.$hrefinfodatadateid.'`)" data-date="'.$vinfodatadate.'" '.$class2.'>'.$vinfodate.'</a></li>';

                    $indextotaldata= ($totalData-($i+1));
                    $vinfodatadateid= $hrefinfodatadateid."_".$indexdate;
                    $indexdate++;

                    $temp_content .=' 
                    </div>
                        </div>
                            </div>
                            <div class="col-md-5">
                              <h2>'.$judul_Sebelum.'</h2>
                              <em>'.$tanggal_Sebelum.'</em>
                              <p>'.$capton_Sebelum.'</p>
                            </div>
                        </div>
                    ';

                    $temp_content .=' 
                    </li>
                    <li class="xselected" data-date="'.$vinfodatadate.'">
                    ';

                    $temp_content .=' 
                          <div class="row">
                            <div class="col-md-7">

                              <div class="area-unite-gallery">
                                <div id="gallery'.$hrefinfodatadateid.'" style="display:none;">
                                    <input type="hidden" id="dthiddenmediaurl'.$vinfodatadateid.'" value="'.$set[$indextotaldata]['media_url'].'" />
                                    <img id="vhrefimg'.$vinfodatadateid.'" alt="'.$set[$indextotaldata]['media_caption'].'">
                    ';

                    // <img alt="Preview Image 1" src="images/img-highlight1.jpg" data-image="images/img-highlight1.jpg" data-description="Preview Image 1 Description">
                    
                    $tanggal_Sebelum= $vinfodatadate;
                    $judul_Sebelum= $set[$indextotaldata]['media_caption'];
                    $capton_Sebelum =$set[$indextotaldata]['media_description'];
                }

                $datesave=$vinfodate;
            }
            else if($vinfodate==''){

            }
            else
            {
                $indextotaldata= ($totalData-($i+1));
                $vinfodatadateid= $hrefinfodatadateid."_".$indexdate;
                $indexdate++;

                $temp_content .='
                <input type="hidden" id="dthiddenmediaurl'.$vinfodatadateid.'" value="'.$set[$indextotaldata]['media_url'].'" />
                <img id="vhrefimg'.$vinfodatadateid.'" alt="'.$set[$indextotaldata]['media_caption'].'">
                ';
            }
        }
        $temp_date .='</ol><span class="filling-line" aria-hidden="true"></span>';
        

        $result["temp_date"]= $temp_date;
        $result["temp_content"]= $temp_content;
        $result["xdata"]= $xdata;
        echo json_encode($result);
        exit;
    }

    function file_content()
    {
        $reqUrl= $this->input->get("reqUrl");
        $index= $this->input->get("index");
        // print_r($this->arrContextOptions);

        $urllink= $reqUrl;
        // $urllink= str_replace($this->settingurlupload, "", $urllink);
        // echo $urllink;exit;
        
        $vblob= file_get_contents($urllink, false, stream_context_create($this->arrContextOptions));
        // $vblob= "data:image/jpg;base64,".base64_encode($vblob);
        $vblob= base64_encode($vblob);
        // print_r($vblob);exit;

        echo json_encode($vblob);
        // echo $vblob;

        /*$code_base64 = str_replace('data:image/png;base64,','',$vblob);
        $code_binary = base64_decode($code_base64);
        $image= imagecreatefromstring($code_binary);
        header('Content-Type: image/png');
        imagejpeg($image);
        imagedestroy($image);*/
    }

    function highlightDetil(){
        $this->load->model('base-api/DataCombo');
        $x = $this->input->get("v");
        $arrparam= ["vurl"=>"Kinerja_proyek"];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        $data=$set['data'];
        $dataexplode=explode('<tr style="">',$data[$x]['project_custom_info']);
        $searchword='Kontraktor EPC';
        foreach($dataexplode as $k=>$v) {
            if(preg_match("/\b$searchword\b/i", $v)) {
                $matches = $v;
            }
        }
        $matches=explode('<td style="">',$matches); 
        $matches=str_replace('</td>', '', $matches[2]);
        $matches=str_replace('</tr>', '', $matches);
        // print_r($matches); exit;
        // $data
        $result["location_name"]=$data[$x]['location_name'];
        $result["cod_ruptl"]=$data[$x]['cod_ruptl'];
        $result["project_name"]=$data[$x]['project_name'];
        $result["power_capacity"]=$data[$x]['power_capacity'];
        $result["project_value"]="Rp.<span>".$data[$x]['project_value']."</span>";
        $result["KontraktorEpc"]=$matches;

        $arrparam= ["vurl"=>"Project_highlight"];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        $datesaveLast='';
        $totalData=count($set);
        for($i=0;$i<$totalData;$i++){
            $date=explode(' ', $set[($totalData-($i+1))]['media_date']);
            if($datesaveLast!=$date[0]){
                $datesaveLast=$date[0];
            }
        }
        // print_r($set);
        $temp_date='<ol>';
        $datesave='';
        $totalData=count($set);
        $clastdata= "";
        $xdata= 0;
        for($i=0;$i<$totalData;$i++){
            $date=explode(' ', $set[($totalData-($i+1))]['media_date']);

            if($datesave!=$date[0]&&$date[0]!=''){
                $dateVal= explode('-',$date[0]);
                $href='#'.$i;
                $xdata++;

                if($i==0){
                    $temp_date .='<li><a href="'.$href.'" data-date="'.$dateVal[2].'/'.$dateVal[1].'/'.$dateVal[0].'" class="older-event">'.$date[0].'</a></li>';
                                            $tanggal_Sebelum=$dateVal[2].'/'.$dateVal[1].'/'.$dateVal[0];
                                            $judul_Sebelum=$set[($totalData-($i+1))]['media_caption'];
                                            $capton_Sebelum=$set[($totalData-($i+1))]['media_description'];
                }
                else{
                    if($datesaveLast==$date[0]){
                        // untuk triger ke last data
                        $clastdata= "clastdata";
                    }
                    else{
                        // untuk triger ke last data
                        $clastdata= "classdatanext";
                    }
                    $temp_date .='<li><a class="'.$clastdata.'" href="'.$href.'" data-date="'.$dateVal[2].'/'.$dateVal[1].'/'.$dateVal[0].'" '.$class2.'>'.$date[0].'</a></li>';        

                    $tanggal_Sebelum=$dateVal[2].'/'.$dateVal[1].'/'.$dateVal[0];
                    $judul_Sebelum=$set[($totalData-($i+1))]['media_caption'];
                    $capton_Sebelum=$set[($totalData-($i+1))]['media_description'];
                }
                $datesave=$date[0];
            }                   
        }
        $temp_date .='</ol>
                                      <span class="filling-line" aria-hidden="true"></span>
        ';

                // print_r($set);
        $temp_content='<ol>';
        $datesave='';
        $totalData=count($set);
        $clastdata= "";
        $xdata= 0;
        for($i=0;$i<$totalData;$i++){
            $date=explode(' ', $set[($totalData-($i+1))]['media_date']);
            if($datesaveLast==$date[0]){

                if($datesave!=$date[0]){
                    $dateVal= explode('-',$date[0]);
                    $href='#'.$i;
                    $xdata++;

                    if($i==0){
                        $temp_content .=' <li data-date="'.$dateVal[2].'/'.$dateVal[1].'/'.$dateVal[0].'" style="list-style-type: none;">
                                          <div class="row">
                                            <div class="col-md-7">
                                              <div style="text-align:center;">
                                                <div style="display:none;margin:0 auto;" class="html5gallery" data-skin="horizontal" data-width="480" data-height="272" data-resizemode="fill">';
                                                $tanggal_Sebelum=$dateVal[2].'/'.$dateVal[1].'/'.$dateVal[0];
                                                $judul_Sebelum=$set[($totalData-($i+1))]['media_caption'];
                                                $capton_Sebelum=$set[($totalData-($i+1))]['media_description'];
                    }
                    else{
                        if($datesaveLast==$date[0]){
                            // untuk triger ke last data
                            $clastdata= "classdatanext clastdata";
                        }
                        else{
                            // untuk triger ke last data
                            $clastdata= "classdatanext";
                        }
                        $temp_content .=' </div>
                                              </div>
                                            </div>
                                            <div class="col-md-5">
                                              <div class="konten-deskripsi">
                                                <h2>'.$judul_Sebelum.'</h2> 
                                                <em>'.$tanggal_Sebelum.'</em>
                                                <p>'.$capton_Sebelum.'</p>
                                              </div>
                                            </div>
                                          </div>
                                          
                                        </li>';
                        $temp_content .=' <li data-date="'.$dateVal[2].'/'.$dateVal[1].'/'.$dateVal[0].'" '.$class2.' style="list-style-type: none;">
                                          <div class="row">
                                            <div class="col-md-7">
                                              <div style="text-align:center;">
                                                <div style="display:none;margin:0 auto;" class="html5gallery" data-skin="horizontal" data-width="480" data-height="272" data-resizemode="fill">';     
                        $imgurl= "";
                        if($datesaveLast==$date[0])
                        {
                            $imgurl = $set[($totalData-($i+1))]['media_url'];
                            $temp_content .=' <a href="'.$imgurl.'"><img src="'.$imgurl.'" alt="'.$set[($totalData-($i+1))]['media_caption'].'"></a>';
                            // $cbimg= urlencode(base64_encode($this->imgcb()));
                            // $cbimg= urlencode('data:image/png;base64,' . base64_encode($this->imgcb()));
                            // $cbimg= urlencode($this->imgcb());
                            // print_r($cbimg);exit;
                        }
                        else
                        {
                            // $temp_content .=' <a id="tanggalanggoro-'.$date[0].'"><img id="imganggoro-'.$date[0].'" src="" alt=""></a>'; 
                             $temp_content .=' <a href="'.$imgurl.'"><img src="'.$imgurl.'" alt="'.$set[($totalData-($i+1))]['media_caption'].'"></a>';
                        }

                        $tanggal_Sebelum=$dateVal[2].'/'.$dateVal[1].'/'.$dateVal[0];
                        $judul_Sebelum=$set[($totalData-($i+1))]['media_caption'];
                        $capton_Sebelum=$set[($totalData-($i+1))]['media_description'];
                    }
                    $datesave=$date[0];
                }
                else{
                    $imgurl= "";
                    if($datesaveLast==$date[0])
                    {
                        // $imgurl = base_url().'json-api/KinerjaProyekAcn_json/img/'.urlencode(base64_encode($set[($totalData-($i+1))]['media_url']));
                        $imgurl = $set[($totalData-($i+1))]['media_url'];

                        $temp_content .=' <a href="'.$imgurl.'"><img src="'.$imgurl.'" alt="'.$set[($totalData-($i+1))]['media_caption'].'"></a>';
                    }
                    else
                    {
                        if($tempcheck !== $date[0])
                        {
                            $temp_content .=' <a id="tanggalanggoro-'.$date[0].'"><img id="imganggoro-'.$date[0].'" src="" alt=""></a>'; 
                        }
                        $tempcheck= $date[0];
                    }
                }  
            }                             
        }
        $temp_content.='</div>

                                          </div>
                                          <!-- GALLERY END -->

                                        </div>
                                        
                                      </div>
                                      
                                    </li>';
        $temp_content.='</ol>';



        $result["temp_date"]= $temp_date;
        $result["temp_content"]= $temp_content;
        $result["xdata"]= $xdata;
        $result["cbimg"]= $cbimg;

        echo json_encode($result);
        exit;
    }

    function infotanggal($vtgl)
    {
        $vreturn= "";
        if($vtgl == "0000-00-00"){}
        else $vreturn= getFormattedDate($vtgl);

        return $vreturn;
    }

    function sub(){
        $this->load->model('base-api/DataCombo');
        $cekquery = $this->input->get("c");

        $lihatdata= "";
        if($cekquery == "url") $lihatdata= "url";
        $arrdatabkn= [];
        $arrparam= ["vurl"=>"Kinerja_proyek"];
        $set= new DataCombo();
        $set->selectdata($arrparam, $lihatdata, "allrow");
        $set= $set->rowResult;
        $cari = $this->input->get("cari");
        $nt = $this->input->get("nt");
        // print_r($set); exit;
        $data=$set['data'];
        $listStatusLATE=0;
        $listStatusWarning=0;
        $listStatusCOMPLETED=0;
        $listStatusNOTSTARTED=0;
        $listStatusONSCHEDULE=0;
        
        $listStatusINITIATION=0;
        $listStatusDEVELOPMENT=0;
        $listStatusEXECUTION=0;
        $listStatusCOMPLETION=0;

        $drawDetil='';
        $textPopup='';
        $textPetaPembangkit=array();
        $plan_total_arr=array();
        $act_total_arr=array();
        $plan_line_arr=array();
        $act_line_arr=array();
        $GarisX_arr=array();
        for($i=0;$i<count($data);$i++){
            if($cari=='' || count(explode(strtoupper($cari), strtoupper($data[$i]['project_name'])))>1){

                $color='white';

                $vewsstatus= $data[$i]['stage_name'];

                // if($vewsstatus=='LATE'){
                //     // if($data[$i]['progress_epc_deviation']<5){
                //     if(abs($data[$i]['progress_epc_deviation'])<5){
                //         $warna='yellow';
                //         $color='black';
                //         $vewsstatus= "WARNING";
                //         $listStatusWarning=$listStatusWarning+1;
                //     }
                //     else
                //     {
                //         $warna='red';
                //         $listStatusLATE=$listStatusLATE+1;
                //     }
                // }
                // else if($vewsstatus=='NOT STARTED'){
                //     $listStatusNOTSTARTED=$listStatusNOTSTARTED+1;
                //     $warna='gray';

                //     if(!empty($nt))
                //         continue;
                // }
                // else if($vewsstatus=='COMPLETED'){
                //     $listStatusCOMPLETED=$listStatusCOMPLETED+1;
                //     $warna='blue';
                // }
                // else{
                //     $listStatusONSCHEDULE=$listStatusONSCHEDULE+1;
                //     $warna='green';
                // }
                if(strtoupper($vewsstatus)=='INITIATION'){
                    // if($data[$i]['progress_epc_deviation']<5){
                    $warna='skyblue';
                    $listStatusINITIATION=$listStatusINITIATION+1;
                }
                else if(strtoupper($vewsstatus)=='DEVELOPMENT'){
                    $listStatusDEVELOPMENT=$listStatusDEVELOPMENT+1;
                    $warna='orange';
                }
                else if(strtoupper($vewsstatus)=='EXECUTION'){
                    $listStatusEXECUTION=$listStatusEXECUTION+1;
                    $warna='#FF7D73';
                }
                else{
                    $listStatusCOMPLETION=$listStatusCOMPLETION+1;
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

                $ppa_signing= $this->infotanggal($data[$i]['ppa_signing']);
                $ppa_efektif= $this->infotanggal($data[$i]['ppa_efektif']);
                $financial_close= $this->infotanggal($data[$i]['financial_close']);
                $cod_estimasi= $this->infotanggal($data[$i]['cod_estimasi']);

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
                                    <p>
                                        <div class="card">
                                            <table class="table table-bordered" style="">
                                                <tbody style="">
                                                    <tr style="">
                                                        <td style=""> Project Owner</td>
                                                        <td style="">'.$data[$i]['project_owner'].'</td>
                                                    </tr>
                                                    <tr style="">
                                                        <td style="">Pemegang Saham</td>
                                                        <td style="">'.$data[$i]['stackholder'].'</td>
                                                    </tr>
                                                    <tr style="">
                                                        <td style="">Kapasitas</td>
                                                        <td style="">'.$data[$i]['power_capacity'].'</td>
                                                    </tr>
                                                    <tr style="">
                                                        <td style="">Lokasi</td>
                                                        <td style="">'.$data[$i]['location_name'].'</td>
                                                    </tr>
                                                    <tr style="">
                                                        <td>Evakuasi Daya</td>
                                                        <td style="">'.$data[$i]['tapping_point'].'</td>
                                                    </tr>
                                                    
                                                    
                                                    <tr style="">
                                                        <td style="">PPA Signing</td>
                                                        <td style="">'.$ppa_signing.'</td>
                                                    </tr>
                                                    <tr style="">
                                                        <td style="">Skema Proyek</td>
                                                        <td style="">'.$data[$i]['scheme_description'].'</td>
                                                    </tr>
                                                    <tr style="">
                                                        <td style="">PPA Efektif</td>
                                                        <td style="">'.$ppa_efektif.'</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="">Financial Close</td>
                                                        <td style="">'.$financial_close.'</td>
                                                    </tr>
                                                    <tr style="">
                                                        <td >COD Estimation</td>
                                                        <td style="">'.$cod_estimasi.'</td>
                                                    </tr>
                                                    <tr style="">
                                                        <td style="">Kontraktor EPC</td>
                                                        <td style="">'.$data[$i]['project_epc_contractor'].'</td>
                                                    </tr>
                                                    <tr style="">
                                                        <td style="">Nilai Proyek (IDR)</td>
                                                        <td style="">'.$data[$i]['project_value'].'</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </p>
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
            }

        }
        // print_r($textPetaPembangkit);exit;

        $result["listStatusLate"]= $listStatusLATE;
        $result["listStatusWarning"]= $listStatusWarning;
        $result["listStatusCompleted"]= $listStatusCOMPLETED;
        $result["listStatusNotStarted"]= $listStatusNOTSTARTED;
        $result["listStatusOnSchedule"]= $listStatusONSCHEDULE;
        $result["listStatusINITIATION"]= $listStatusINITIATION;
        $result["listStatusDEVELOPMENT"]= $listStatusDEVELOPMENT;
        $result["listStatusEXECUTION"]= $listStatusEXECUTION;
        $result["listStatusCOMPLETION"]= $listStatusCOMPLETION;
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
    
    function subVideo(){
        $this->load->model('base-api/DataCombo');
        $page = $this->input->get("page");
        if($page==''){
            $page=1;
        }
        $arrparam= ["vurl"=>"Kinerja_proyek_video"];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        // print_r($set); exit;
        $table='';
        $textPopup='';
        $endpage=1;
        $pagenow=1;
        for($i=0;$i<count($set);$i++){
            if($set[$i]['media_type']=='video'){
                $style='';
                if($pagenow!=1){
                    $style="style='display:none'";
                }
                $tanggal=explode(" ", $set[$i]['media_date']);
                $tgl_entri=explode('-', $tanggal[0]);
                $tgl_entri= $tgl_entri[2]." ".getNameMonth(intval($tgl_entri[1]))." ".$tgl_entri[0];
                $table.="<tr class='tableVidio page".$pagenow."' id='page".$pagenow."' ".$style.">
                    <td>".$set[$i]['media_caption']."</td>
                    <td>".$tgl_entri."</td>
                    <td>
                      <button type='button' class='btn btn-info btn-xs' data-toggle='modal' data-target='#myModalVidio".$set[$i]['id']."'>
                        <i class='fa fa-video-camera' aria-hidden='true'></i>
                      </button>
                    </td>
                  </tr>";
                $textPopup .='
                <div id="myModalVidio'.$set[$i]['id'].'" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <a class="close" data-dismiss="modal"  id="close-'.$set[$i]['id'].'" style="display:none">&times;</a>
                                <h4 class="modal-title">'.$set[$i]['media_caption'].'</h4>
                            </div>
                            <div class="modal-body area-popup">
                                <div class="container-fluid">
                                    <div class="row" style="text-align: center;">
                                    ';
                        if($set[$i]['media_type']=='video'){
                        $textPopup .='
                                    <video height="600px" controls id="myVideo'.$set[$i]['id'].'">
                                        <source src="'.$set[$i]['media_url_ori'].'" type="video/mp4">
                                        <source src="'.$set[$i]['media_url_ori'].'" type="video/ogg">
                                    </video>'; 
                        }else{
                        $textPopup.='  
                                    <img src="'.$set[$i]['media_url_ori'].'" style="width:100%">';
                        }

                        $textPopup.='
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a class="btn btn-default" onClick="closepopup('.$set[$i]['id'].')">Close</a>
                            </div>
                        </div>
                    </div>
                </div>';
                if($endpage==3){
                    $endpage=1;
                    $pagenow++;
                }
                else{
                    $endpage++;
                }
            }
        }
        // echo $pagenow;exit;
        $drawpage='<tr>
                <td colspan="3">
                  <ul class="pagination">
                    <li style="display:none"><a onclick="gotopage(2)">></a></li>';

        if($pagenow>5){
            $pageloop=5;
            $styleend="";
        }
        else{
            $pageloop=$pagenow;
            $styleend="display:none";
        }
        for($i=1;$i<=$pageloop;$i++){
            if($i==5){
                $drawpage.='<li> ... </li>';
                $drawpage.='<li><a onclick="gotopage('.($pagenow).')">'.($pagenow).'</a></li>';
            }
            else{
                $drawpage.='<li><a onclick="gotopage('.$i.')">'.$i.'</a></li>';
            }
        }

        $drawpage.='
                    <li><a onclick="gotopage(2)" '.$styleend.'> ></a></li>
                    </ul>
                </td>
              </tr>';

        $result["table"]= $table;
        $result["page"]= $drawpage;
        $result["textPopup"]= $textPopup;
        // print_r($set);exit;
        echo json_encode($result);
        exit;
    }

}
?>