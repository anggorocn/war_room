<?php
error_reporting(0);
require APPPATH . '/libraries/REST_Controller.php';
include_once("functions/string.func.php");
include_once("functions/date.func.php");

class Kinerja_proyek_grafik extends REST_Controller {
 
    function __construct() {
        parent::__construct();
        $this->load->library('gapi');
    }
 
    // show data entitas
	function index_get() {
		$t= $this->input->get("t");
        $b= $this->input->get("b");
        $reqProyekId= $this->input->get("reqProyekId");

        if(empty($t)) $t= 0;
        if(empty($b)) $b= 0;
        if(empty($reqProyekId)) $b= reqProyekId;

        $t= (int)$t;
        $b= (int)$b;
        $reqProyekId= (int)$reqProyekId;

        $url= "proxycors.php?b64url=aHR0cDovL3ByaW1lLnBsbm51c2FudGFyYXBvd2VyLmNvLmlkL0Rhc2hib2FyZFByb2plY3RBUEkvc2N1cnZlLw&str_append=".$reqProyekId;
        $arrparam= ["vurl" => $url];
        $vreturn= gapi::getDashboardCdn($arrparam);

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