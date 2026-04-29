<?php
error_reporting(0);
require APPPATH . '/libraries/REST_Controller.php';
include_once("functions/string.func.php");
include_once("functions/date.func.php");

class Penjualan extends REST_Controller {
 
    function __construct() {
        parent::__construct();
        $this->load->library('gapi');
    }
 
    // show data entitas
	function index_get() {
// $x=file_get_contents('http://192.168.3.116/Pbr_kinerja_operasi/penjualan?tahun=0&bulan=0&kode_sistem=0'); 
// echo $x;exit;
        $t= $this->input->get("t");
        $b= $this->input->get("b");
        $kode= $this->input->get("kode");

        if(empty($t)) $t= 0;
        if(empty($b)) $b= 0;
        if(empty($kode)) $kode= 0;

        $t= (int)$t;
        $b= (int)$b;
        $kode= (int)$kode;

        // $url= "Pbr_kinerja_operasi/penjualan?tahun=2023&bulan=7";
        $url= "Pbr_kinerja_operasi/penjualan?tahun=".$t."&bulan=".$b."&kode_sistem=".$kode;
        // echo $url;exit;
		$arrparam= ["vurl" => $url];
        $vreturn= gapi::getpbrkinerja($arrparam);

		print_r($vreturn);exit;
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