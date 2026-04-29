<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once("functions/string.func.php");
include_once("functions/date.func.php");

class RealisasiAi_json extends CI_Controller {

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

        $arrparam= ["vurl"=>"Realisasi_ai?t=".$thn."&b=".$bln];
        // $arrparam= ["vurl"=>"Kinerja_keuangan_korporat?t=".$thn."&b=".$bln];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        // print_r($set);exit;

        if(count($set)==0){
            $result=
            array(
                 array('penetapan_ai'=>0, 'penetapan_aki'=>0, 'realisasi_ai'=>0, 'realisasi_aki'=>0, 'prognosa_ai'=>0, 'prognosa_aki'=>0),
                 array('penetapan_ai'=>0, 'penetapan_aki'=>0, 'realisasi_ai'=>0, 'realisasi_aki'=>0, 'prognosa_ai'=>0, 'prognosa_aki'=>0),
                 array('penetapan_ai'=>0, 'penetapan_aki'=>0, 'realisasi_ai'=>0, 'realisasi_aki'=>0, 'prognosa_ai'=>0, 'prognosa_aki'=>0),
                 array('penetapan_ai'=>0, 'penetapan_aki'=>0, 'realisasi_ai'=>0, 'realisasi_aki'=>0, 'prognosa_ai'=>0, 'prognosa_aki'=>0)
            );
        }
        else{
            for($i=0;$i<count($set);$i++){
                $result[$i]['penetapan_ai']= $set[$i]['penetapan_ai'];
                $result[$i]['penetapan_aki']= $set[$i]['penetapan_aki'];
                $result[$i]['realisasi_ai']= $set[$i]['realisasi_ai'];
                $result[$i]['realisasi_aki']= $set[$i]['realisasi_aki'];
                $result[$i]['prognosa_ai']= $set[$i]['prognosa_ai'];
                $result[$i]['prognosa_aki']= $set[$i]['prognosa_aki'];
            }
        }

        $result['bulan']=getNameMonth($bln);
        $last_modified=explode(' ', $set[0]['tgl_entri']);
        $last_modified=explode('-', $last_modified[0]);
        // print_r($last_modified);exit;

        $result["LastRealisasiAi"]= $last_modified[2]." ".getNameMonth((int)$last_modified[1])." ".$last_modified[0];

        echo json_encode($result);
        exit;
    }
}
?>