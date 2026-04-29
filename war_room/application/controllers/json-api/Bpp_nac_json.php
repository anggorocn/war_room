<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once("functions/string.func.php");
include_once("functions/date.func.php");

class Bpp_nac_json extends CI_Controller {

    function __construct() {
        parent::__construct();

        if($this->session->userdata("appuserid") == "")
        {
            redirect('login');
        }
    }

    function home(){
        $this->load->model('base-api/DataCombo');

        $bln = $this->input->get("bln");
        $thn = $this->input->get("thn");

        if($kode==''){
            $kode=0;
        }

        $arrdatabkn= [];
        $arrparam= ["vurl"=>"bpp_nac?t=".$thn."&b=".$bln."&kode=".$kode];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        $arr_kode_distrik=array();
        $arr_bpp=array();
        $arr_nac_kat_a=array();
        $arr_nac_kat_b=array();
        for($i=0; $i<count($set);$i++){
            $executive_summary=$set[$i]['executive_summary'];
            $bpp_korporat=$set[$i]['bpp_korporat'];
            $arr_kode_distrik[]=$set[$i]['kode_distrik'];
            $arr_bpp[]=$set[$i]['bpp'] ?? '0';
            $arr_nac_kat_a[]=$set[$i]['nac_kat_a'] ?? '0';
            $arr_nac_kat_b[]=$set[$i]['nac_kat_b'] ?? '0';
        }
        $result["kode_distrik"]= $arr_kode_distrik;
        $result["bpp"]= $arr_bpp;
        $result["nac_kat_a"]= $arr_nac_kat_a;
        $result["nac_kat_b"]= $arr_nac_kat_b;
        $result["executive_summary"]= $executive_summary;
        $result["bpp_korporat"]= $bpp_korporat;
        echo json_encode($result);
        exit;
    }

}
?>
