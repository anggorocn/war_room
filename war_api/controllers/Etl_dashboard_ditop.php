<?php
error_reporting(0);
require APPPATH . '/libraries/REST_Controller.php';
include_once("functions/string.func.php");
include_once("functions/date.func.php");

class Etl_dashboard_ditop extends REST_Controller {
 
    function __construct() {
        parent::__construct();
        $this->load->library('gapi');
    }
 
    // show data entitas
	function index_get() {

        $t= $this->input->get("t");
        $b= $this->input->get("b");
        $jenis_pembangkit= $this->input->get("jenis");
        $cekquery= $this->input->get("c");
        $mode= $this->input->get("mode");
        // print_r($mode);exit;

        if(empty($t)) $t= 0;
        if(empty($b)) $b= 0;

        $t= (int)$t;
        $b= (int)$b;

        $periode_awal= $t.str_pad($b, 2, '0', STR_PAD_LEFT);
        $periode_terakhir= $t.str_pad($b, 2, '0', STR_PAD_LEFT);
        if($mode == "")
            $url= "?periode_akhir=".$periode_terakhir."&periode_awal=".$periode_awal;
        else
            // $url= "?group_by=".$mode."&periode_terakhir=".$periode_terakhir."&periode_awal=".$periode_awal;
            $url= "?group_by=".$mode."&periode_akhir=".$periode_terakhir."&periode_awal=".$periode_awal."&jenis_pembangkit=".$jenis_pembangkit;

        // print_r($url);exit;
		$arrparam= ["vurl" => $url, "mode"=>$mode, "periode_awal"=>$periode_awal, "periode_terakhir"=>$periode_terakhir];
        if($cekquery == "p")
        {
            print_r($arrparam);exit;
        }
        $vreturn= gapi::getEtlDashboardDitop($arrparam);

        $this->response(array('status' => 'success', 'message' => 'success', 'code' => 200, 'result' => $vreturn));
    }
	
    // insert new data to entitas
    function index_post() {

    }
 
    // update data entitas
    function index_put() {

    }
 
    // delete entitas
    function index_delete() {
        
    }
 
}