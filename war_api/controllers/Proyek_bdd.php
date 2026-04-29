<?php
error_reporting(0);
require APPPATH . '/libraries/REST_Controller.php';
include_once("functions/string.func.php");
include_once("functions/date.func.php");

class Proyek_bdd extends REST_Controller {
 
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

        $b= str_replace("/index_get?reqToken=", "", $b);
         $url= 'data_kinerja_proyek/0/0/kinerja_proyek_bdd';
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