<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once("functions/string.func.php");
include_once("functions/date.func.php");

class RekapMou_json extends CI_Controller {

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
        $bln = $this->input->get("bln");
        $thn = $this->input->get("thn");
        $tipe = $this->input->get("tipe");
        $search = $this->input->get("search");

        if($search=='undefined'){
            $search='undefined';
        }
        else if($search=='Berjalan'){
            $search='ok';
        }
        else{
            $search='nok';
        }

        $arrparam= ["vurl"=>"Rekap_mou?t=".$thn."&b=".$bln];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        // print_r($set);exit;

        $tablebdd='
        <table id="table-bdd">
            <thead>
                <tr>
                  <th class="headerHor" width="15%">Partner</th>
                  <th class="headerHor" width="40%">MoU Title</th>
                  <th class="headerHor" width="40%">Scope</th>
                  <th class="headerHor" width="5%">Status</th>
                </tr>
            </thead>
            <tbody>';

        $tablebdg='
        <table id="table-bdd">
            <thead>
                <tr>
                  <th class="headerHor" width="15%">Partner</th>
                  <th class="headerHor" width="40%">MoU Title</th>
                  <th class="headerHor" width="40%">Scope</th>
                  <th class="headerHor" width="5%">Status</th>
                </tr>
            </thead>
            <tbody>';

            $bdgHijau=0;
            $bdgMerah=0;
            $bddHijau=0;
            $bddMerah=0;
            $warna='merah';

            for($i=0;$i<count($set);$i++){
                if($set[$i]['owner']=='BDG'){
                    if($set[$i]['status_dashboard']=='ok'){
                        $warna='hijau';
                        $bdgHijau++;
                    }
                    else{
                        $warna='merah';
                        $bdgMerah++;
                    }

                    if($tipe=='bdd'||$tipe=='undefined'||( strtoupper($tipe)==$set[$i]['owner'] && $search==$set[$i]['status_dashboard'])){
                        $tablebdg.='
                        <tr>
                          <td onclick="showpopup('.$i.')" style="cursor:pointer">'.$set[$i]['partner'].'</td>
                          <td onclick="showpopup('.$i.')" style="cursor:pointer">'.$set[$i]['mou_title'].'</td>
                          <td onclick="showpopup('.$i.')" style="cursor:pointer">'.substr($set[$i]['scope'], 0, 100 ).' <span style="color:blue">see more....</span></td>
                          <td onclick="showpopup('.$i.')" style="cursor:pointer;text-align:center"><i class="fa fa-circle '.$warna.'" aria-hidden="true"></i></td>
                        </tr>
                        ';
                    }

                }
                else{

                    if($set[$i]['status_dashboard']=='ok'){
                        $warna='hijau';
                        $bddHijau++;
                    }
                    else{
                        $warna='merah';
                        $bddMerah++;
                    }

                    if($tipe=='bdg'||$tipe=='undefined'||( strtoupper($tipe)==$set[$i]['owner'] && $search==$set[$i]['status_dashboard'])){
                        $tablebdd.='
                        <tr>
                          <td onclick="showpopup('.$i.')" style="cursor:pointer">'.$set[$i]['partner'].'</td>
                          <td onclick="showpopup('.$i.')" style="cursor:pointer">'.$set[$i]['mou_title'].'</td>
                          <td onclick="showpopup('.$i.')" style="cursor:pointer">'.substr($set[$i]['scope'], 0, 100 ).' <span style="color:blue">see more....</span></td>
                          <td onclick="showpopup('.$i.')" style="cursor:pointer;text-align:center"><i class="fa fa-circle '.$warna.'" aria-hidden="true"></i></td>
                        </tr>
                        ';
                    }
                }
            };
                                            
        $tablebdd .='
            </tbody>
        </table>';

        $tablebdg .='
            </tbody>
        </table>';

        $modal='';
        for($i=0;$i<count($set);$i++){
            $warna='';
            $status='';

            if($set[$i]['status_dashboard']=='ok'){
                $warna='hijau';
                $status='Berjalan';
            }
            else{
                $warna='merah';
                $status='Perlu Tindak Lanjut';
            }

            $sign_date=$set[$i]['sign_date'];
            $sign_date=explode('/', $sign_date);
            $sign_date= $sign_date[0]." ".getNameMonth(intval($sign_date[1]))." ".$sign_date[2];

            $expiration_date=$set[$i]['expiration_date'];
            $expiration_date=explode('/', $expiration_date);
            $expiration_date= $expiration_date[0]." ".getNameMonth(intval($expiration_date[1]))." ".$expiration_date[2];

            $modal.='
            <div id="myModal'.$i.'" class="modal fade detil-mou" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Detail MoU</h4>
                        </div>
                    <div class="modal-body">
                        <form class="form-horizontal" action="/action_page.php">                      
                            <div class="form-group">
                                <label class="control-label col-sm-2 title">Partner:</label>
                        <div class="col-sm-8">
                          <label class="control-label">'.$set[$i]['partner'].'</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-sm-2 title">MoU Title:</label>
                        <div class="col-sm-8">
                          <label class="control-label text-left">'.$set[$i]['mou_title'].'</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-sm-2 title">Status:</label>
                        <div class="col-sm-8">
                          <label class="control-label"><i class="fa fa-circle '.$warna.'" aria-hidden="true"></i> '.$status.'</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-sm-2 title">Scope:</label>
                        <div class="col-sm-8">
                            <textarea style="width:100%" class="form-control">'.$set[$i]['scope'].'</textArea>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-sm-2 title">Sign Date:</label>
                        <div class="col-sm-2">
                          <label class="control-label"><i class="fa fa-calendar" aria-hidden="true"></i> '.$sign_date.'</label>
                        </div>
                        <label class="control-label col-sm-2 title">Expiration Date:</label>
                        <div class="col-sm-2">
                          <label class="control-label"><i class="fa fa-calendar" aria-hidden="true"></i> '.$expiration_date.'</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-sm-2 title">Remarks/ Progress:</label>
                        <div class="col-sm-8">
                            <textarea style="width:100%;height: 100vh;" class="form-control">'.$set[$i]['progress'].'</textArea>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-sm-2 title">Action Plan:</label>
                        <div class="col-sm-8">
                            <textarea style="width:100%" class="form-control">'.$set[$i]['action_plan'].'</textArea>
                        </div>
                      </div>
                    </form> 

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>

                </div>
                </div>
        ';

        }
        
        // $result['bulan']=getNameMonth($bln);

        $last_sync=$set[0]['tgl_entri'];
        $tgl_entri=explode(' ', $last_sync);
        $tgl_entri=explode('-', $tgl_entri[0]);
        $result["tgl_entri"]= $tgl_entri[2]." ".getNameMonth(intval($tgl_entri[1]))." ".$tgl_entri[0];

        $result['table-bdd']=$tablebdd;
        $result['table-bdg']=$tablebdg;
        $result['modal']=$modal;
        $result['bdgHijau']=$bdgHijau;
        $result['bdgMerah']=$bdgMerah;
        $result['bddHijau']=$bddHijau;
        $result['bddMerah']=$bddMerah;
        echo json_encode($result);
        exit;
    }
}
?>