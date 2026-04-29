<?php
error_reporting(0);
require APPPATH . '/libraries/REST_Controller.php';
include_once("functions/string.func.php");
include_once("functions/date.func.php");

class Peta_pembangkit extends REST_Controller {
 
    function __construct() {
        parent::__construct();
        $this->load->library('gapi');
    }
 
    // show data entitas
	function index_get() {
		$url= "Pbr_kinerja_operasi/";
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