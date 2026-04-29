<?php
error_reporting(0);
require APPPATH . '/libraries/REST_Controller.php';
include_once("functions/string.func.php");
include_once("functions/date.func.php");

class Laba_rugi_komponen extends REST_Controller {
 
    function __construct() {
        parent::__construct();
        $this->load->library('gapi');
    }
 
    // show data entitas
	function index_get($format) {

		// $url= "proxycors.php?b64url=aHR0cDovL3Bici5wbG5udXNhbnRhcmFwb3dlci5jby5pZDo1Njc4L3dlYmhvb2sva2luZXJqYS1iZGQ=";
        // $url= 'kinerja-bdd';
        // $url= 'dataKeuangan/2024/1/laba_rugi_komponen';
        $t= $this->input->get("t");
        $b= $this->input->get("b");

        if(empty($t)) $t= 0;
        if(empty($b)) $b= 0;

        $t= (int)$t;
        $b= (int)$b;


        $url= 'dataKeuangan/'.$t.'/'.$b.'/laba_rugi_komponen';
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