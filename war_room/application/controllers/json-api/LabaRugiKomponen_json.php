<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once("functions/string.func.php");
include_once("functions/date.func.php");

class LabaRugiKomponen_json extends CI_Controller {

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
        // echo $bln;exit;

        if($search=='undefined'){
            $search='undefined';
        }
        else if($search=='Berjalan'){
            $search='ok';
        }
        else{
            $search='nok';
        }

        $arrparam= ["vurl"=>"Laba_rugi_komponen/index_get?t=".$thn."&b=".$bln];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        // print_r($set);exit;

        $result['pendapatan_a_target']=$set[0]['target'];
        $result['pendapatan_a_realisasi']=$set[0]['realisasi'];
        $result['beban_a_target']=$set[1]['target'];
        $result['beban_a_realisasi']=$set[1]['realisasi'];
        $result['labarugi_a_target']=$set[2]['target'];
        $result['labarugi_a_realisasi']=$set[2]['realisasi'];

        $result['pendapatan_b_target']=$set[3]['target'];
        $result['pendapatan_b_realisasi']=$set[3]['realisasi'];
        $result['beban_b_target']=$set[4]['target'];
        $result['beban_b_realisasi']=$set[4]['realisasi'];
        $result['labarugi_b_target']=$set[5]['target'];
        $result['labarugi_b_realisasi']=$set[5]['realisasi'];

        $result['pendapatan_c_target']=$set[6]['target'];
        $result['pendapatan_c_realisasi']=$set[6]['realisasi'];
        $result['beban_c_target']=$set[7]['target'];
        $result['beban_c_realisasi']=$set[7]['realisasi'];
        $result['labarugi_c_target']=$set[8]['target'];
        $result['labarugi_c_realisasi']=$set[8]['realisasi'];

        $result['pendapatan_d_target']=$set[9]['target'];
        $result['pendapatan_d_realisasi']=$set[9]['realisasi'];
        $result['beban_d_target']=$set[10]['target'];
        $result['beban_d_realisasi']=$set[10]['realisasi'];
        $result['labarugi_d_target']=$set[11]['target'];
        $result['labarugi_d_realisasi']=$set[11]['realisasi'];

        $result['pendapatan_e_target']=$set[12]['target'];
        $result['pendapatan_e_realisasi']=$set[12]['realisasi'];
        $result['beban_e_target']=$set[13]['target'];
        $result['beban_e_realisasi']=$set[13]['realisasi'];
        $result['labarugi_e_target']=$set[14]['target'];
        $result['labarugi_e_realisasi']=$set[14]['realisasi'];
        
        $result['executive_summary']=$set[11]['executive_summary'];
        $tgl_entri=explode(' ', $set[11]['tgl_entri']);
        $tgl_entri=explode('-', $tgl_entri[0]);
        $tgl_entri= $tgl_entri[2]." ".getNameMonth(intval($tgl_entri[1]))." ".$tgl_entri[0];
        $result['tgl_entri']=$tgl_entri;
        echo json_encode($result);
        exit;
    }

}
?>