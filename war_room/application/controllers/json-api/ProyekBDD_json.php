<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once("functions/string.func.php");
include_once("functions/date.func.php");

class ProyekBDD_json extends CI_Controller {

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
        $arrparam= ["vurl"=>"Proyek_bdd"];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        // print_r($set);exit;
        $data=$set[0]['data'];
        $last_modified=$set[0]['last_modified'];
        $last_modified=explode(' ', $last_modified);

        $StatusWorkExecution=0;
        $StatusCanceled=0;
        $StatusProposalPreparation=0;
        $StatusBidProcess=0;
        $StatusDone=0;
        $StatusKosong=0;
        $tabContent.='
            <link rel="stylesheet" href="lib/ScrollingTable/style.css" />
            <div class="area-tabel">
              <table id="Demo">
                <thead>
                  <tr>
                    <th class="headerHor">Nama Proyek</th>
                    <th class="headerHor">Grup</th>
                    <th class="headerHor">Customer</th>
                    <th class="headerHor">Lokasi</th>
                    <th class="headerHor">Penyelesaian</th>
                    <th class="headerHor">Status</th>
                  </tr>
                </thead>
                <tbody>';
                for($i=0;$i<count($data);$i++){
                    if($search=='undefined'){
                        $tabContent .=
                        '<tr>
                            <td>'.$data[$i]['json']['nama_proyek'].'</td>
                            <td>'.$data[$i]['json']['group'].'</td>
                            <td>'.$data[$i]['json']['customer'].'</td>
                            <td>'.$data[$i]['json']['lokasi'].'</td>
                            <td>'.($data[$i]['json']['completion']).' %</td>
                            <td>'.$data[$i]['json']['status'].'</td>
                        </tr>';
                    }
                    else{
                        if($search==$data[$i]['json']['status']){
                            $tabContent .=
                            '<tr>
                                <td>'.$data[$i]['json']['nama_proyek'].'</td>
                                <td>'.$data[$i]['json']['group'].'</td>
                                <td>'.$data[$i]['json']['customer'].'</td>
                                <td>'.$data[$i]['json']['lokasi'].'</td>
                                <td>'.($data[$i]['json']['completion']).' %</td>
                                <td>'.$data[$i]['json']['status'].'</td>
                            </tr>';
                        }
                    }
                    if($data[$i]['json']['status']=='WORK EXECUTION'){
                        $StatusWorkExecution++;
                    }
                    else if($data[$i]['json']['status']=='NO GO/CANCELED/LOST'){
                        $StatusCanceled++;
                    }
                    else if($data[$i]['json']['status']=='PROPOSAL PREPARATION'){
                        $StatusProposalPreparation++;
                    }
                    else if($data[$i]['json']['status']=='BID PROCESS'){
                        $StatusBidProcess++;
                    }
                    else if($data[$i]['json']['status']=='DONE'){
                        $StatusDone++;
                    }
                    else{
                        $StatusKosong++;
                        // echo $data[$i]['json']['status'];
                    }
                }
                
                $tabContent.='
                </tbody>
              </table>
            </div>';

        $result["StatusWorkExecution"]= $StatusWorkExecution;
        $result["StatusCanceled"]= $StatusCanceled;
        $result["StatusProposalPreparation"]= $StatusProposalPreparation;
        $result["StatusBidProcess"]= $StatusBidProcess;
        $result["StatusDone"]= $StatusDone;
        $result["StatusKosong"]= $StatusKosong;
        $result["tabContent"]= $tabContent;
        $result["last_modified"]= $last_modified[1]." ".$last_modified[2]." ".$last_modified[3];
        echo json_encode($result);
        exit;
    }

}
?>