<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once("functions/string.func.php");
include_once("functions/date.func.php");

class ProyekBDG_json extends CI_Controller {

    function __construct() {
        parent::__construct();

        if($this->session->userdata("appuserid") == "")
        {
            redirect('login');
        }
    }

    function home(){
        $this->load->model('base-api/DataCombo');

        $bln = $this->input->get("bln");
        $thn = $this->input->get("thn");
        $search = $this->input->get("search");

        $arrdatabkn= [];
        // $arrparam= ["vurl"=>"Proyek_bdg?reqMode=kinerja-bdd"];
        $arrparam= ["vurl"=>"Proyek_bdg"];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        // print_r($set);exit;
        $data=$set[0]['data'];
        $last_modified=$set[0]['last_modified'];
        $last_modified=explode(' ', $last_modified);

        $StatusBelumAdaProgress=0;
        $StatusDevelopment=0;
        $StatusCompletion=0;
        $StatusKKPolehPLN=0;
        $StatusKonstruksi=0;
        $StatusExecution=0;
        $StatusKosong=0;
        $tabContent.='
            <link rel="stylesheet" href="lib/ScrollingTable/style.css" />
            <div class="area-tabel">
              <table id="Demo">
                <thead>
                  <tr>
                    <th class="headerHor">Nama Proyek</th>
                    <th class="headerHor">Jenis Pembangkit</th>
                    <th class="headerHor">Target COD Rasionalisasi</th>
                    <th class="headerHor">Pengembang</th>
                    <th class="headerHor">Dev Status</th>
                  </tr>
                </thead>
                <tbody>';
                for($i=0;$i<count($data);$i++){

                    if($search=='undefined'){
                        $tabContent .=
                        '<tr>
                            <td>'.$data[$i]['json']['nama_proyek'].'</td>
                            <td>'.$data[$i]['json']['jenis_pembangkit'].'</td>
                            <td>'.$data[$i]['json']['target_cod_rasionalisasi'].'</td>
                            <td>'.($data[$i]['json']['pengembang']).'</td>
                            <td>'.$data[$i]['json']['latest_dev_status'].'</td>
                        </tr>';
                    }
                    else{
                        if($search==$data[$i]['json']['grouping_status']){
                            $tabContent .=
                            '<tr>
                                <td>'.$data[$i]['json']['kuota_ruptl'].'</td>
                                <td>'.$data[$i]['json']['jenis_pembangkit'].'</td>
                                <td>'.$data[$i]['json']['target_cod_rasionalisasi'].'</td>
                                <td>'.($data[$i]['json']['pengembang']).'</td>
                                <td>'.$data[$i]['json']['latest_dev_status'].'</td>
                            </tr>';
                        }
                    }
                   
                    if($data[$i]['json']['grouping_status']=='Initiation'){
                        $StatusBelumAdaProgress++;
                    }
                    else if($data[$i]['json']['grouping_status']=='Development'){
                        $StatusDevelopment++;
                    }
                    else if($data[$i]['json']['grouping_status']=='Completion'){
                        $StatusCompletion++;
                    }
                    else if($data[$i]['json']['grouping_status']=='Construction'){
                        $StatusKonstruksi++;
                    }
                    else if($data[$i]['json']['grouping_status']=='Execution'){
                        $StatusExecution++;
                    }
                    else{
                        $StatusKosong++;
                        $status_kosong=$data[$i]['json']['grouping_status'];
                        // echo $data[$i]['json']['status'];
                    }
                }
                
                $tabContent.='
                </tbody>
              </table>
            </div>';
            // echo $status_kosong;exit;
        $result["StatusBelumAdaProgress"]= $StatusBelumAdaProgress;
        $result["StatusDevelopment"]= $StatusDevelopment;
        $result["StatusCompletion"]= $StatusCompletion;
        $result["StatusKKPolehPLN"]= $StatusKKPolehPLN;
        $result["StatusKonstruksi"]= $StatusKonstruksi;
        $result["StatusExecution"]= $StatusExecution;
        $result["StatusKosong"]= $StatusKosong;
        $result["tabContent"]= $tabContent;
        $result["last_modified"]= $last_modified[1]." ".$last_modified[2]." ".$last_modified[3];

        echo json_encode($result);
        exit;
    }

}
?>