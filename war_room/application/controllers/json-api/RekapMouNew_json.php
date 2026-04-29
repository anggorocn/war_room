<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once("functions/string.func.php");
include_once("functions/date.func.php");

class RekapMouNew_json extends CI_Controller {

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

        $arrparam= ["vurl"=>"Monitor_mou_bdd"];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        // print_r($set);exit;

        $tablebdd=array();
        $bddHijau=0;
        $bddMerah=0;
        $warna='merah';
        $nobdd=0;

        for($i=0;$i<count($set);$i++){      
            if($set[$i]['status_dashboard']=='ok'){
                $warna='hijau';
                $bddHijau++;
            }
            else{
                $warna='merah';
                $bddMerah++;
            }
            $tablebdd[$nobdd]['no']=$nobdd;
            $tablebdd[$nobdd]['partner']=$set[$i]['partner'];
            $tablebdd[$nobdd]['mou_title']=$set[$i]['mou_title'];
            $tablebdd[$nobdd]['scope']=substr($set[$i]['scope'], 0, 100 ).' <a href="javascript:void(0)" onclick="showpopup('.$i.')" >see more....</a>';
            $tablebdd[$nobdd]['warna']='<i style="text-align: center;width: 100%;" class="fa fa-circle '.$warna.'" aria-hidden="true"></i>';
            $nobdd++;
        };

        $modal1='';
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
            $sign_date= $sign_date[1]." ".getNameMonth(intval($sign_date[0]))." ".$sign_date[2];

            $expiration_date=$set[$i]['expiration_date'];
            $expiration_date=explode('/', $expiration_date);
            $expiration_date= $expiration_date[1]." ".getNameMonth(intval($expiration_date[0]))." ".$expiration_date[2];

            $modal1.='
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
                                <label class="control-label col-sm-1 title">Partner:</label>
                                <div class="col-sm-11">
                                  <label class="control-label">'.$set[$i]['partner'].'</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-1 title">MoU Title:</label>
                                <div class="col-sm-11">
                                  <label class="control-label text-left">'.$set[$i]['mou_title'].'</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-1 title">Status:</label>
                                <div class="col-sm-11">
                                  <label class="control-label"><i class="fa fa-circle '.$warna.'" aria-hidden="true"></i> '.$status.'</label>
                                </div>
                            </div>

                              <div class="form-group">
                                <label class="control-label col-sm-1 title">Scope:</label>
                                <div class="col-sm-11">
                                    <span style="width:100%" class="">'.$this->gntibr($set[$i]['scope']).'</span>
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="control-label col-sm-1 title">Sign Date:</label>
                                <div class="col-sm-2">
                                  <label class="control-label"><i class="fa fa-calendar" aria-hidden="true"></i> '.$sign_date.'</label>
                                </div>
                                <label class="control-label col-sm-2 title">Expiration Date:</label>
                                <div class="col-sm-2">
                                  <label class="control-label"><i class="fa fa-calendar" aria-hidden="true"></i> '.$expiration_date.'</label>
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="control-label col-sm-1 title">Remarks/ Progress:</label>
                                <div class="col-sm-11">
                                    <span style="width:100%;" class="">'.$this->gntibr($set[$i]['progress']).'</span>
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="control-label col-sm-1 title">Action Plan:</label>
                                <div class="col-sm-11">
                                    <span style="width:100%" class="">'.$this->gntibr($set[$i]['action_plan']).'</span>
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
        
        $last_sync=$set[0]['tgl_entri'];
        $tgl_entri=explode(' ', $last_sync);
        $tgl_entri=explode('-', $tgl_entri[0]);
        $result["tgl_entri"]= $tgl_entri[2]." ".getNameMonth(intval($tgl_entri[1]))." ".$tgl_entri[0];

        $modal=$modal1;
        $result['table-bdd']=$tablebdd;
        $result['bddHijau']=$bddHijau;
        $result['bddMerah']=$bddMerah;

        $arrparam= ["vurl"=>"Monitor_mou_bdg"];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        // print_r($set);exit;

        $tablebdg=array();
        $bdgHijau=0;
        $bdgMerah=0;
        $warna='merah';
        $nobdg=0;

        for($i=0;$i<count($set);$i++){
            if($set[$i]['status_dashboard']=='ok'){
                $warna='hijau';
                $bdgHijau++;
            }
            else{
                $warna='merah';
                $bdgMerah++;
            }
            $tablebdg[$nobdg]['no']=$nobdg;
            $tablebdg[$nobdg]['partner']=$set[$i]['partner'];
            $tablebdg[$nobdg]['mou_title']=$set[$i]['mou_title'];
            $tablebdg[$nobdg]['scope']=substr($set[$i]['scope'], 0, 100 ).' <a href="javascript:void(0)" onclick="showpopup('.$i.')" >see more....</a>';
            $tablebdg[$nobdg]['warna']='<i style="text-align: center;width: 100%;" class="fa fa-circle '.$warna.'" aria-hidden="true"></i>';
            $nobdg++;
        };

        $modal2='';
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
            $sign_date= $sign_date[1]." ".getNameMonth(intval($sign_date[0]))." ".$sign_date[2];

            $expiration_date=$set[$i]['expiration_date'];
            $expiration_date=explode('/', $expiration_date);
            $expiration_date= $expiration_date[1]." ".getNameMonth(intval($expiration_date[0]))." ".$expiration_date[2];

            $modal2.='
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
                                <label class="control-label col-sm-1 title">Partner:</label>
                                <div class="col-sm-11">
                                  <label class="control-label">'.$set[$i]['partner'].'</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-1 title">MoU Title:</label>
                                <div class="col-sm-11">
                                  <label class="control-label text-left">'.$set[$i]['mou_title'].'</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-1 title">Status:</label>
                                <div class="col-sm-11">
                                  <label class="control-label"><i class="fa fa-circle '.$warna.'" aria-hidden="true"></i> '.$status.'</label>
                                </div>
                            </div>

                              <div class="form-group">
                                <label class="control-label col-sm-1 title">Scope:</label>
                                <div class="col-sm-11">
                                    <span style="width:100%" class="">'.$this->gntibr($set[$i]['scope']).'</span>
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="control-label col-sm-1 title">Sign Date:</label>
                                <div class="col-sm-2">
                                  <label class="control-label"><i class="fa fa-calendar" aria-hidden="true"></i> '.$sign_date.'</label>
                                </div>
                                <label class="control-label col-sm-2 title">Expiration Date:</label>
                                <div class="col-sm-2">
                                  <label class="control-label"><i class="fa fa-calendar" aria-hidden="true"></i> '.$expiration_date.'</label>
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="control-label col-sm-1 title">Remarks/ Progress:</label>
                                <div class="col-sm-11">
                                    <span style="width:100%;" class="">'.$this->gntibr($set[$i]['progress']).'</span>
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="control-label col-sm-1 title">Action Plan:</label>
                                <div class="col-sm-11">
                                    <span style="width:100%" class="">'.$this->gntibr($set[$i]['action_plan']).'</span>
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
        
        $last_sync=$set[0]['tgl_entri'];
        $tgl_entri=explode(' ', $last_sync);
        $tgl_entri=explode('-', $tgl_entri[0]);
        $result["tgl_entri"]= $tgl_entri[2]." ".getNameMonth(intval($tgl_entri[1]))." ".$tgl_entri[0];

        $result['table-bdg']=$tablebdg;
        $modal.=$modal2;
        $result['modal']=$modal;
        $result['bdgHijau']=$bdgHijau;
        $result['bdgMerah']=$bdgMerah;
        echo json_encode($result);
        exit;
    }

    function gntibr($v)
    {
        $vreturn= $v;
        $vreturn= str_replace("\n", '<br />', $vreturn);
        return $vreturn;
    }
}
?>