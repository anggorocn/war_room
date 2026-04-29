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

            $output.='<div onclick="callfunc('.$x.')">
                          <div class="item item-highlight">
                            <div class="caption">'.$data[$x]['project_name'].'</div>
                            <div class="inner" onclick="callfunc('.$x.')">
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
                              <div class="nilai">'.$data[$x]['cod_ruptl'].'</div>
                              
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
        // print_r($set);
        $temp_date='<ol>';
        $temp_content='<ol>';
        $datesave='';
        $totalData=count($set);
        $clastdata= "";
        $xdata= 0;
        for($i=0;$i<$totalData;$i++){

        // $url = base64_decode($set[($totalData-($i+1))]['media_url']);
        // if(isset($_GET['str_append'])){$url = $url.$_GET['str_append']; } 
        // $headers = get_headers ($url, 1);
        // if (!$headers || !isset($headers['Content-Type'])) { 
        //     exit('Failed to retrieve headers');
        // }

        // header('Content-Type:' . $headers['Content-Type']); 
        // $ch = curl_init($url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // $data = curl_exec($ch);
        // if (curl_errno($ch)) {
        // x.exit('Failed to fetch data: '.curl_error($ch));
        // }
        // curl_close($ch);
        // header('Access-Control-Allow-Origin: *');
        // header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        // header('Access-Control-Allow-Headers: X-Requested-With, Authorization, Content-Type');
        // header('Access-Control-Max-Age: 86400');
        // echo $data; exit;

            // echo $totalData-($i+1);exit;
            $date=explode(' ', $set[($totalData-($i+1))]['media_date']);
            if($datesave!=$date[0]){
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
                        $clastdata= "classdatanext clastdata";
                    }
                    else{
                        // $class2='class="older-event"';
                        // $class1='';

                        // untuk triger ke last data
                        $clastdata= "classdatanext";
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
                    $imgurl = base_url().'json-api/KinerjaProyekAcn_json/img/'.urlencode(base64_encode($set[($totalData-($i+1))]['media_url']));
                    $temp_content .=' <a href="'.str_replace('=', '', $imgurl).'"><img src="'.str_replace('=', '', $imgurl).'" alt="'.$set[($totalData-($i+1))]['media_caption'].'"></a>';                

                    $tanggal_Sebelum=$dateVal[2].'/'.$dateVal[1].'/'.$dateVal[0];
                    $judul_Sebelum=$set[($totalData-($i+1))]['media_caption'];
                    $capton_Sebelum=$set[($totalData-($i+1))]['media_description'];
                }
                $datesave=$date[0];
            }
            else{
                    $imgurl = base_url().'json-api/KinerjaProyekAcn_json/img/'.urlencode(base64_encode($set[($totalData-($i+1))]['media_url']));

                $temp_content .=' <a href="'.$imgurl.'"><img src="'.str_replace('=', '', $imgurl).'" alt="'.$set[($totalData-($i+1))]['media_caption'].'"></a>';                
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
        // $data=$set['data'];

        // $arrparam= ["vurl"=>"Kinerja_proyek_documentation?reqProyekId=".$data[$x]['project_id']];
        // $set= new DataCombo();
        // $set->selectdata($arrparam, "", "allrow");
        // $set= $set->rowResult;
        // print_r($set);exit;
        echo json_encode($result);
        exit;
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

            if($datesave!=$date[0]){
                $dateVal= explode('-',$date[0]);
                $href='#'.$i;
                $xdata++;

                if($i==0){
                    $temp_date .='<li><a href="'.$href.'" data-date="'.$dateVal[2].'/'.$dateVal[1].'/'.$dateVal[0].'" class="older-event" onclick="updateContent()">'.$date[0].'</a></li>';
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
                    $temp_date .='<li><a class="'.$clastdata.'" href="'.$href.'" data-date="'.$dateVal[2].'/'.$dateVal[1].'/'.$dateVal[0].'" '.$class2.'>'.$date[0].'</a></li>';        

                    $tanggal_Sebelum=$dateVal[2].'/'.$dateVal[1].'/'.$dateVal[0];
                    $judul_Sebelum=$set[($totalData-($i+1))]['media_caption'];
                    $capton_Sebelum=$set[($totalData-($i+1))]['media_description'];
                }
                $datesave=$date[0];
            }
            else{
                $imgurl = base_url().'json-api/KinerjaProyekAcn_json/img/'.urlencode(base64_encode($set[($totalData-($i+1))]['media_url']));
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
                        
                        $temp_content .=' <li data-date="'.$dateVal[2].'/'.$dateVal[1].'/'.$dateVal[0].'" '.$class2.' style="list-style-type: none;">
                                          <div class="row">
                                            <div class="col-md-7">
                                              <div style="text-align:center;">
                                                <div style="display:none;margin:0 auto;" class="html5gallery" data-skin="horizontal" data-width="480" data-height="272" data-resizemode="fill">';     
                        $imgurl = base_url().'json-api/KinerjaProyekAcn_json/img/'.urlencode(base64_encode($set[($totalData-($i+1))]['media_url']));
                        $temp_content .=' <a href="'.str_replace('=', '', $imgurl).'"><img src="'.str_replace('=', '', $imgurl).'" alt="'.$set[($totalData-($i+1))]['media_caption'].'"></a>';                

                        $tanggal_Sebelum=$dateVal[2].'/'.$dateVal[1].'/'.$dateVal[0];
                        $judul_Sebelum=$set[($totalData-($i+1))]['media_caption'];
                        $capton_Sebelum=$set[($totalData-($i+1))]['media_description'];
                    }
                    $datesave=$date[0];
                }
                else{
                    $imgurl = base_url().'json-api/KinerjaProyekAcn_json/img/'.urlencode(base64_encode($set[($totalData-($i+1))]['media_url']));
                    $temp_content .=' <a href="'.$imgurl.'"><img src="'.str_replace('=', '', $imgurl).'" alt="'.$set[($totalData-($i+1))]['media_caption'].'"></a>';
                }  
            }                             
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
        echo json_encode($result);
        exit;
    }

    function highlightDetilContent(){
        $this->load->model('base-api/DataCombo');
        $x = $this->input->get("t");

        $arrparam= ["vurl"=>"Project_highlight"];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        $datesaveLast='';
        $temp_content='<ol>';
        $datesave='';
        $totalData=count($set);
        $clastdata= "";
        $xdata= 0;
        $awal='0';
        for($i=0;$i<$totalData;$i++){
            $date=explode(' ', $set[($totalData-($i+1))]['media_date']);
            if($x==$date[0]){
                if($datesave!=$date[0]){
                    $dateVal= explode('-',$date[0]);
                    $href='#'.$i;
                    $xdata++;

                    if($awal==0){
                        $temp_content .=' <li data-date="'.$dateVal[2].'/'.$dateVal[1].'/'.$dateVal[0].'" style="list-style-type: none;">
                                          <div class="row">
                                            <div class="col-md-7">
                                              <div style="text-align:center;">
                                                <div style="display:none;margin:0 auto;" class="html5gallery" data-skin="horizontal" data-width="480" data-height="272" data-resizemode="fill">';
                                                $tanggal_Sebelum=$dateVal[2].'/'.$dateVal[1].'/'.$dateVal[0];
                                                $judul_Sebelum=$set[($totalData-($i+1))]['media_caption'];
                                                $capton_Sebelum=$set[($totalData-($i+1))]['media_description'];
                                                $awal=1;
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
                        
                        $temp_content .=' <li data-date="'.$dateVal[2].'/'.$dateVal[1].'/'.$dateVal[0].'" '.$class2.' style="list-style-type: none;">
                                          <div class="row">
                                            <div class="col-md-7">
                                              <div style="text-align:center;">
                                                <div style="display:none;margin:0 auto;" class="html5gallery" data-skin="horizontal" data-width="480" data-height="272" data-resizemode="fill">';     
                        $imgurl = base_url().'json-api/KinerjaProyekAcn_json/img/'.urlencode(base64_encode($set[($totalData-($i+1))]['media_url']));
                        $temp_content .=' <a href="'.str_replace('=', '', $imgurl).'"><img src="'.str_replace('=', '', $imgurl).'" alt="'.$set[($totalData-($i+1))]['media_caption'].'"></a>';                

                        $tanggal_Sebelum=$dateVal[2].'/'.$dateVal[1].'/'.$dateVal[0];
                        $judul_Sebelum=$set[($totalData-($i+1))]['media_caption'];
                        $capton_Sebelum=$set[($totalData-($i+1))]['media_description'];
                    }
                    $datesave=$date[0];
                }
                else{
                    $imgurl = base_url().'json-api/KinerjaProyekAcn_json/img/'.urlencode(base64_encode($set[($totalData-($i+1))]['media_url']));
                    $temp_content .=' <a href="'.$imgurl.'"><img src="'.str_replace('=', '', $imgurl).'" alt="'.$set[($totalData-($i+1))]['media_caption'].'"></a>';
                }  
            }                     
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
        $temp_content.='</div>

                                          </div>
                                          <!-- GALLERY END -->

                                        </div>
                                        
                                      </div>
                                      
                                    </li>';
        $temp_content.='</ol>';



        $result["temp_content"]= $temp_content;
        echo json_encode($result);
        exit;
    }

}
?>