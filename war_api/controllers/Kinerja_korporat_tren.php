<?php
error_reporting(0);
require APPPATH . '/libraries/REST_Controller.php';
include_once("functions/string.func.php");
include_once("functions/date.func.php");

class Kinerja_korporat_tren extends REST_Controller {
 
    function __construct() {
        parent::__construct();
        $this->load->library('gapi');
    }
 
    // show data entitas
	function index_get() {
        $tawal= $this->input->get("tawal");
        $takhir= $this->input->get("takhir");
        $tawal= (int)$tawal;
        $takhir= (int)$takhir;
        $url= "pbrdb/tren_nko?tahunawal=".$tawal."&tahunakhir=".$takhir;
        // $url= "pbrdb/tren_nko?tahunawal=2023&tahunakhir=2024";
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