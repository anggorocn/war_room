<?php
error_reporting(0);
require APPPATH . '/libraries/REST_Controller.php';
include_once("functions/string.func.php");
include_once("functions/date.func.php");

class Kinerja_korporat_tracker extends REST_Controller {
 
    function __construct() {
        parent::__construct();
        $this->load->library('gapi');
    }
 
    // show data entitas
	function index_get() {
		$t= $this->input->get("t");
        $b= $this->input->get("b");
        $id_kpimaster= $this->input->get("id_kpimaster");

        if(empty($t)) $t= 0;
        if(empty($b)) $b= 0;
        if(empty($id_kpimaster)) $id_kpimaster= 0;

        $t= (int)$t;
        $b= (int)$b;
        $id_kpimaster= (int)$id_kpimaster;
        $url= "pbrdb/view-kpi_actiontracker?tahun=".$t."&bulan=".$b."&id_kpimaster=".$id_kpimaster;
        // $url= "pbrdb/view-kpipencapaian?tahun=".$t."&bulan=".$b;
        // echo $url;exit;
        $arrparam= ["vurl" => $url];
        $vreturn= gapi::getPbrBackend($arrparam);
        // print_r($vreturn);exit;

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