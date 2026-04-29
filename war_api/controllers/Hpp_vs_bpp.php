<?php
error_reporting(0);
require APPPATH . '/libraries/REST_Controller.php';
include_once("functions/string.func.php");
include_once("functions/date.func.php");

class Hpp_vs_bpp extends REST_Controller {
 
    function __construct() {
        parent::__construct();
        $this->load->library('gapi');
    }
 
    // show data entitas
	function index_get() {

// $x=file_get_contents('http://192.168.2.91:8080/codex/index.php/pbr/dataKeuangan/2025/7/bpp_nac/'); 
//         echo $x;exit;
        $t= $this->input->get("t");
        $b= $this->input->get("b");
        $kode= $this->input->get("kode");

        if(empty($t)) $t= 0;
        if(empty($b)) $b= 0;
        if(empty($kode)) $kode= 0;

        $t= (int)$t;
        $b= (int)$b;
        $kode= (int)$kode;

        // $url= "".$t."/".$b."/bpp_nac/";
        $url= "hpp-vs-bpp";
		$arrparam= ["vurl" => $url];
        $vreturn= gapi::getHppvsbpp($arrparam);

		// print_r($url);exit;
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