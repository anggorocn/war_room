<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once("functions/string.func.php");
include_once("functions/date.func.php");

class KinerjaKorporatNKO_json extends CI_Controller {

    function __construct() {
        parent::__construct();

        if($this->session->userdata("appuserid") == "")
        {
            redirect('login');
        }
    }

    function sub(){
        
        $bln = $this->input->get("bln");
        $thn = $this->input->get("thn");
        $this->load->model('base-api/DataCombo');
        $arrdatabkn= [];
        $arrparam= ["vurl"=>"Kinerja_korporat_nko?t=".$thn."&b=".$bln];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        // print_r($set);exit;
        $data=$set['entry'];

        $result["nko_final"]= $data[0]['nko_final'];
        echo json_encode($result);
        exit;
    }

}
?>