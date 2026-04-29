<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once("functions/string.func.php");
include_once("functions/date.func.php");

class KPIKeuangan_json extends CI_Controller {

    function __construct() {
        parent::__construct();

        if($this->session->userdata("appuserid") == "")
        {
            redirect('login');
        }
    }

    function home(){
        $this->load->model('base-api/DataCombo');
        $arrdatabkn= [];
        $bln = $this->input->get("bln");
        $thn = $this->input->get("thn");
        $arrparam= ["vurl"=>"Kpi_keuangan_ikon?t=".$thn."&b=".$bln];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        // print_r($set);exit;
        $textKeuangan='';
        for($i=0; $i<count($set);$i++){

            if($set[$i]['prosentase'] >= 100){
                $classBunder='tanda hijau';
            } else if($set[$i]['prosentase'] >= 95 && $set[$i]['prosentase'] < 100){
                $classBunder='tanda kuning';
            } else{
                $classBunder='tanda merah';
            }

            $textKeuangan .=
            '<div class="item">
                <div class="data">
                    <div class="title">'.$set[$i]['nama_kpi'].'</div>
                    <div class="nilai">'.$set[$i]['prosentase'].'%</div>
                </div>
                <div class="'.$classBunder.'">
                    <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                </div>
                <div class="clearfix"></div>
            </div>';
            $tgl_entri=$set[$i]['tgl_entri'];
        }
        $tgl_entri=explode(' ', $tgl_entri);
        $tgl_entri=explode('-', $tgl_entri[0]);
        $result["textKeuangan"]= $textKeuangan;
        $result["tgl_entri"]= $tgl_entri[2]." ".getNameMonth(intval($tgl_entri[1]))." ".$tgl_entri[0];
        echo json_encode($result);
        exit;
    }

    function sub(){
        $this->load->model('base-api/DataCombo');
        $arrdatabkn= [];
        $bln = $this->input->get("bln");
        $thn = $this->input->get("thn");
        $arrparam= ["vurl"=>"Kpi_keuangan_ikon?t=".$thn."&b=".$bln];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        // print_r($set);exit;
        $textKeuangan='';
        for($i=0; $i<count($set);$i++){

            if($set[$i]['prosentase'] >= 100){
                $classBunder='tanda hijau';
            } else if($set[$i]['prosentase'] >= 95 && $set[$i]['prosentase'] < 100){
                $classBunder='tanda kuning';
            } else{
                $classBunder='tanda merah';
            }
            $nama=explode('.',$set[$i]['nama_kpi']);

            $textKeuangan .=
            '<div class="item">
                <div class="caption">'.$nama[1].'</div>
                <div class="data-wrapper">
                  <div class="data">
                    <div class="title">Realisasi</div>
                    <div class="nilai">'.$set[$i]['realisasi'].'</div>
                    <div class="title">Target</div>
                    <div class="nilai">'.$set[$i]['target'].'</div>
                  </div>
                  <div class="persen">
                    '.$set[$i]['prosentase'].'%
                    <div class="'.$classBunder.'"><span><i class="fa fa-circle" aria-hidden="true"></i></span></div>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>';
            $tgl_entri=$set[$i]['tgl_entri'];
        }


        $tgl_entri=explode(' ', $tgl_entri);
        $tgl_entri=explode('-', $tgl_entri[0]);
        $result["textKeuangan"]= $textKeuangan;
        $result["tgl_entri"]= $tgl_entri[2]." ".getNameMonth(intval($tgl_entri[1]))." ".$tgl_entri[0];

        $arrparam= ["vurl"=>"Kpi_keuangan_tabel?t=".$thn."&b=".$bln];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        // print_r($set);exit;
        $textDetilKeuangan ='';
        $nama='';

        for($i=0; $i<count($set);$i++){

            if($nama!=$set[$i]['kategori']){
                if($i!=0){
                    $textDetilKeuangan .=
                    '</div></div>';
                }

                $nama=$set[$i]['kategori'];
                $textDetilKeuangan .=
                '<div class="col-md-4">
                  <div class="area-rasio-grup">
                    <div class="judul">'.$nama.'</div>';
            }
         
            if($set[$i]['realisasi']!=''){
                $textDetilKeuangan .=
                '<div class="item">
                    <div class="caption">'.$set[$i]['sub_kategori'].'</div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="title">Target</div>
                            <div class="nilai">'.$set[$i]['target'].'</div>
                        </div>
                        <div class="col-md-6">
                            <div class="title">Realisasi</div>
                            <div class="nilai">'.$set[$i]['realisasi'].'</div>
                        </div>
                    </div>  
                </div>';
            }
            else{
                $textDetilKeuangan .=
                '<div class="sub-judul">'.$set[$i]['sub_kategori'].'</div>';
            }
             

            // $textKeuangan .=
            // '<div class="col-md-4">
            //   <div class="area-rasio-grup">
            //     <div class="judul">Rasio Keuangan Likuiditas</div>
            //     <div class="sub-judul">Aktiva Lancar :</div>
            //     <div class="item">
            //       <div class="caption">Current Ratio</div>
            //       <div class="row">
            //         <div class="col-md-6">
            //           <div class="title">Target</div>
            //           <div class="nilai">295,96%</div>
            //         </div>
            //         <div class="col-md-6">
            //           <div class="title">Realisasi</div>
            //           <div class="nilai">315,68%</div>
            //         </div>
            //       </div>  
            //     </div>

            //     <div class="item">
            //       <div class="caption">Cash Ratio</div>
            //       <div class="row">
            //         <div class="col-md-6">
            //           <div class="title">Target</div>
            //           <div class="nilai">295,96%</div>
            //         </div>
            //         <div class="col-md-6">
            //           <div class="title">Realisasi</div>
            //           <div class="nilai">315,68%</div>
            //         </div>
            //       </div>
                          
            //     </div>

            //     <div class="item">
            //       <div class="caption">Acid Test Ratio</div>
            //       <div class="row">
            //         <div class="col-md-6">
            //           <div class="title">Target</div>
            //           <div class="nilai">295,96%</div>
            //         </div>
            //         <div class="col-md-6">
            //           <div class="title">Realisasi</div>
            //           <div class="nilai">315,68%</div>
            //         </div>
            //       </div>
                          
            //     </div>
            //   </div>
            // </div>';
        }
        $textDetilKeuangan .= '</div></div>';
        
        $result["textDetilKeuangan"]= $textDetilKeuangan;
        echo json_encode($result);
        exit;
    }

}
?>