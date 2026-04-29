<?php
error_reporting(0);
require APPPATH . '/libraries/REST_Controller.php';
include_once("functions/string.func.php");
include_once("functions/date.func.php");

class Detail_kesiapan_pembangkit extends REST_Controller {
 
    function __construct() {
        parent::__construct();
        $this->load->library('gapi');
    }
 
    // show data entitas
	function index_get() {
        $reqCode= $this->input->get("reqCode");

        if(empty($t)) $t= 0;
		$url= "Pbr_kinerja_operasi/detail_kesiapan_pembangkit/".$reqCode;
		$arrparam= ["vurl" => $url];
        $vreturn= gapi::getpbrkinerja($arrparam);

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