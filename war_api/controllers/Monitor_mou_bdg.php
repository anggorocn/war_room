<?php
error_reporting(0);
require APPPATH . '/libraries/REST_Controller.php';
include_once("functions/string.func.php");
include_once("functions/date.func.php");

class Monitor_mou_bdg extends REST_Controller {
 
    function __construct() {
        parent::__construct();
        $this->load->library('gapi');
    }
 
    // show data entitas
	function index_get($format) {

		// $url= "proxycors.php?b64url=aHR0cDovL3Bici5wbG5udXNhbnRhcmFwb3dlci5jby5pZDo1Njc4L3dlYmhvb2sva2luZXJqYS1iZGQ=";
        // $url= 'kinerja-bdd';
        $url= 'dataKeuangan/9999/99/monitor_mou_bdg';
		$arrparam= ["vurl" => $url];
         // $vreturn= gapi::getDashboardPLNNP($arrparam);
        $vreturn= gapi::getBdd($arrparam);
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