<?php
error_reporting(0);
require APPPATH . '/libraries/REST_Controller.php';
include_once("functions/string.func.php");
include_once("functions/date.func.php");

class Kinerja_proyek_video extends REST_Controller {
 
    function __construct() {
        parent::__construct();
        $this->load->library('gapi');
    }
 
    // show data entitas
	function index_get() {
        $t= $this->input->get("v");
        // $t=6;
		// $url= "proxycors.php?b64url=aHR0cDovLzE5Mi4xNjguMTguNDQvRGFzaGJvYXJkUHJvamVjdEFQSS9kb2t1bWVudGFzaS8&str_append=".$t;
        $url= "DashboardProjectAPI/dokumentasi";
        // $url= "proxycors.php?b64url=aHR0cDovLzE5Mi4xNjguMTguNDQvRGFzaGJvYXJkUHJvamVjdEFQSS9kb2t1bWVudGFzaS8&str_append=6";
		$arrparam= ["vurl" => $url];
        $vreturn= gapi::gethighlight($arrparam);
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