<?php
error_reporting(0);
require APPPATH . '/libraries/REST_Controller.php';
include_once("functions/string.func.php");
include_once("functions/date.func.php");

class Ma_status_akuisisi extends REST_Controller {
 
    function __construct() {
        parent::__construct();
        $this->load->library('gapi');
    }
 
    // show data entitas
	function index_get() {
		$t= $this->input->get("t");
        $b= $this->input->get("b");

        if(empty($t)) $t= 0;
        if(empty($b)) $b= 0;

        $t= (int)$t;
        $b= (int)$b;
        // $url= "pbrdb/view-kpipencapaian?tahun=2023&bulan=7";
        $url= "codex/index.php/pbr/dataKeuangan/9999/99/ma_status_akuisisi";
        // echo $url;exit;
        $arrparam= ["vurl" => $url];
        $vreturn= gapi::getcodex($arrparam);
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