<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once("functions/string.func.php");
include_once("functions/date.func.php");

class MaStatusAkuisisiDetil_json extends CI_Controller {

    function __construct() {
        parent::__construct();

        if($this->session->userdata("appuserid") == "")
        {
            redirect('login');
        }
    }

    function home(){
        $this->load->model('base-api/DataCombo');
        $reqNama = $this->input->get("reqNama");
        $arrdatabkn= [];
        $arrparam= ["vurl"=>"Ma_status_akuisisi"];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        // print_r($set);exit;
        // echo count($set);exit;
        $key = array_search($reqNama, array_column($set, 'potential_project'));
        // echo $key; exit;

        $last_sync=$set[$key]['tgl_entri'];
        $tgl_entri=explode(' ', $last_sync);
        $tgl_entri=explode('-', $tgl_entri[0]);
        $result["LastUpdate"]= $tgl_entri[2]." ".getNameMonth(intval($tgl_entri[1]))." ".$tgl_entri[0];

        // initiation section
        $result["initial_information"]= $set[$key]['initial_information'];
        $result["nda"]= $set[$key]['nda'];
        $result["meeting"]= $set[$key]['meeting'];
        $result["collecting_data"]= $set[$key]['collecting_data'];
        $result["site_visit"]= $set[$key]['site_visit'];
        $result["prospectus_asesment"]= $set[$key]['prospectus_asesment'];

        // DEVELOPMENT section
        $result["fs_due_diligence"]= $set[$key]['fs_due_diligence'];
        $result["proposal_acquisition"]= $set[$key]['proposal_acquisition'];
        $result["valuasi_aset"]= $set[$key]['valuasi_aset'];
        $result["negotiation"]= $set[$key]['negotiation'];
        $result["internal_fs_approval"]= $set[$key]['internal_fs_approval'];
        $result["term_conditional_agreement"]= $set[$key]['term_conditional_agreement'];
        $result["initial_kkp_to_pln"]= $set[$key]['initial_kkp_to_pln'];
        $result["alignment_ap_contribution"]= $set[$key]['alignment_ap_contribution'];

        // CLOSING section
        $result["internal_preparation"]= $set[$key]['internal_preparation'];
        $result["cspa_sha"]= $set[$key]['cspa_sha'];
        $result["kkp_final_approval"]= $set[$key]['kkp_final_approval'];
        $result["technical_trantiton"]= $set[$key]['technical_trantiton'];
        $result["shraholder_approval"]= $set[$key]['shraholder_approval'];
        $result["conditional_final_asesment"]= $set[$key]['conditional_final_asesment'];
        $result["other_key_stakeholder_approval"]= $set[$key]['other_key_stakeholder_approval'];
        $result["closing_transaction"]= $set[$key]['closing_transaction'];

        $this->load->model('base-api/DataCombo');
        $reqNama = $this->input->get("reqNama");
        $reqStrIssue = $this->input->get("reqStrIssue");
        $arrdatabkn= [];
        $arrparam= ["vurl"=>"ma_strategic_issue"];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        // print_r($set);exit;
        $set= $set->rowResult;

        if(!empty($reqStrIssue))
        {
            $keys = array_keys(array_column($set, 'status_st_issue'), $reqStrIssue);
            $set = array_map(function($k) use ($set){return $set[$k];}, $keys);
            // print_r($set);exit;
        }
        $table1='';
        $no=1;
        for($i=0;$i<count($set);$i++){
            if($set[$i]['potential_project']==$reqNama){
                $last_sync=$set[$i]['due_date'];
                $tgl_entri=explode('/', $last_sync);
                $table1.='
                <tr>
                    <td>'.$no.'</td>
                    <td>'.$set[$i]['activity'].'</td>
                    <td>'.$set[$i]['strategic_issue'].'</td>
                    <td>'.$set[$i]['action_plan_needed'].'</td>
                    <td style="text-align:center">'.$tgl_entri[1]." ".getNameMonthEn(intval($tgl_entri[0]))." ".$tgl_entri[2].'</td>
                    <td style="text-align:center">'.$set[$i]['status_st_issue'].'</td>
                </tr>';
                $no++;
            }
        }

        $result["table1"]= $table1;

        $this->load->model('base-api/DataCombo');
        $reqNama = $this->input->get("reqNama");
        $reqPtrIssue = $this->input->get("reqPtrIssue");
        $arrdatabkn= [];
        $arrparam= ["vurl"=>"ma_partner_related_issue"];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;

        if(!empty($reqPtrIssue))
        {
            $keys = array_keys(array_column($set, 'status_p_issue'), $reqPtrIssue);
            $set = array_map(function($k) use ($set){return $set[$k];}, $keys);
            // print_r($set);exit;
        }

        $table2='';
        $no=1;
        for($i=0;$i<count($set);$i++){
            if($set[$i]['potential_project']==$reqNama){
                $last_sync=$set[$i]['due_date'];
                $tgl_entri=explode('/', $last_sync);
                $table2.='
                <tr>
                    <td>'.$no.'</td>
                    <td>'.$set[$i]['partner_relation_issue'].'</td>
                    <td>'.$set[$i]['action_plan_needed'].'</td>
                    <td style="text-align:center">'.$tgl_entri[1]." ".getNameMonthEn(intval($tgl_entri[0]))." ".$tgl_entri[2].'</td>
                    <td style="text-align:center">'.$set[$i]['status_p_issue'].'</td>
                </tr>';
                $no++;
            }
        }

        $result["table2"]= $table2;

        echo json_encode($result);
        exit;
    }

}
?>