<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once("functions/string.func.php");
include_once("functions/date.func.php");

class Etl_dashboard_ditop_json extends CI_Controller {

    function __construct() {
        parent::__construct();

        if($this->session->userdata("appuserid") == "")
        {
            redirect('login');
        }
    }

    function home(){
        $this->load->model('base-api/DataCombo');

        $bln = $this->input->get("b");
        $thn = $this->input->get("t");
        $mode = $this->input->get("mode");
        $reqId = $this->input->get("reqId");
        $arrdatabkn= [];
        $arrparam= ["vurl"=>"Etl_dashboard_ditop?b=".$bln."&t=".$thn."&mode=".$mode."&jenis=".$reqId];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        print_r($set);exit;

        if($mode=='jenis_bahan_bakar')
        {
            $tabel1='';
            $tot_bpp_bulan=0;
            $tot_kwh_netto_bulan=0;
            $tot_komp_d_bulan=0;

            for($i=0; $i<count($set['data']);$i++){
                if($set['data'][$i]['bulan']==$bln && $set['data'][$i]['tahun']==$thn){
                    $jenis_bahan_bakar= $set['data'][$i]['jenis_bahan_bakar'];
                    $bpp_bulan= $set['data'][$i]['bpp_ytd'];
                    $kwh_netto_bulan= $set['data'][$i]['kwh_netto_ytd'];
                    $komp_d_bulan= $set['data'][$i]['kwh_netto_ytd'];

                    $vkoma= $set['data'][$i]['komp_a_ytd'];
                    $vkomb= $set['data'][$i]['komp_b_ytd'];
                    $vkomc= $set['data'][$i]['komp_c_ytd'];
                    $vkomd= $set['data'][$i]['komp_d_ytd'];
                    $vsupport= $set['data'][$i]['komp_e_ytd'];
                    $vtotalbeban=$vkoma+$vkomb+$vkomc+$vkomd+$vsupport;

                    $tabel1.='
                    <tr>
                        <td>'.$jenis_bahan_bakar.'</td>
                        <td style="text-align:right">'.number_format($bpp_bulan, 2, ',', '.').'</td>
                        <td style="text-align:right">'.number_format($kwh_netto_bulan, 2, ',', '.').'</td>
                        <td style="text-align:right">'.number_format($vtotalbeban, 2, ',', '.').'</td>
                    </tr>
                    ';   
                }
                if($set['data'][$i]['jenis_bahan_bakar']='GRAND TOTAL'){

                    $jenis_bahan_bakar= $set['data'][$i]['jenis_bahan_bakar'];
                    $bpp_bulan= $set['data'][$i]['bpp_ytd'];
                    $kwh_netto_bulan= $set['data'][$i]['kwh_netto_ytd'];
                    $komp_d_bulan= $set['data'][$i]['kwh_netto_ytd'];

                    $vkoma= $set['data'][$i]['komp_a_ytd'];
                    $vkomb= $set['data'][$i]['komp_b_ytd'];
                    $vkomc= $set['data'][$i]['komp_c_ytd'];
                    $vkomd= $set['data'][$i]['komp_d_ytd'];
                    $vsupport= $set['data'][$i]['komp_e_ytd'];
                    $vtotalbeban=$vkoma+$vkomb+$vkomc+$vkomd+$vsupport;

                    $tabelFoot1='
                    <tr>
                        <th><b>TOTAL</b></th>
                        <th style="text-align:right">'.numberformatnew($bpp_bulan).'</th>
                        <th style="text-align:right">'.numberformatnew($kwh_netto_bulan).'</th>
                        <th style="text-align:right">'.numberformatnew($vtotalbeban).'</th>
                    </tr>
                    ';                       
                }
            }

            $result["tabel1"]= $tabel1;
            $result["tabelFoot1"]= $tabelFoot1;
        }

        else if($mode=='distrik_nama')
        {
            $tabel1='';
            $tot_bpp_bulan=0;
            $tot_kwh_netto_bulan=0;
            $tot_komp_d_bulan=0;
            $no=1;
            for($i=0; $i<count($set['data']);$i++){
                
                $distrik_nama= $set['data'][$i]['distrik_nama'];
                $bpp_ytd= $set['data'][$i]['bpp_ytd'];
                $komp_d_bulan= round($set['data'][$i]['kwh_netto_ytd'],0);
                $kwh_netto_ytd= $set['data'][$i]['kwh_netto_ytd'];
                $jenis_bahan_bakar= $set['data'][$i]['jenis_bahan_bakar'];

                $tot_bpp_ytd=$tot_bpp_ytd+ $bpp_ytd;
                $tot_komp_d_bulan=$tot_komp_d_bulan+ $komp_d_bulan;
                $tot_kwh_netto_ytd=$tot_kwh_netto_ytd+ $kwh_netto_ytd;

                $vkoma= round($set['data'][$i]['komp_a_ytd'],0);
                $vkomb= round($set['data'][$i]['komp_b_ytd'],0);
                $vkomc= round($set['data'][$i]['komp_c_ytd'],0);
                $vkomd= round($set['data'][$i]['komp_d_ytd'],0);
                $vsupport= round($set['data'][$i]['komp_e_ytd'],0);
                $vtotalbeban=$vkoma+$vkomb+$vkomc+$vkomd+$vsupport;

                $Arr[$i]['nama']=$distrik_nama;
                $Arr[$i]['bpp']=numberformatnew($bpp_ytd);

                if($set['data'][$i]['bulan']==$bln && $set['data'][$i]['tahun']==$thn){

                    $tabel1.='
                    <tr>
                        <td width="5%">'.$no.'</td>
                        <td width="20%" >'.$distrik_nama.'</td>
                        <td width="25%" style="text-align:right">'.numberformatnew($bpp_ytd).'</td>
                        <td width="25%" style="text-align:right" >'.numberformatnew($vtotalbeban).'</td>
                        <td width="25%" style="text-align:right" >'.numberformatnew($komp_d_bulan).'</td>
                    </tr>
                    ';
                    $no++;   
                }

                if($set['data'][$i]['distrik_nama']=='GRAND TOTAL'){
                    $tabelFoot1='
                    <tr>
                        <th colspan=2><b>TOTAL</b></th>
                        <th width="25%"  style="text-align:right">'.numberformatnew($bpp_ytd).'</th>
                        <th width="25%"  style="text-align:right">'.numberformatnew($vtotalbeban).'</th>
                        <th width="25%"  style="text-align:right">'.numberformatnew($komp_d_bulan).'</th>
                    </tr>
                    ';    
                }
            }

            // $bpp_tot=$total_beban_ytd/$kwh_netto_ytd;

                               

            $result["tabel1"]= $tabel1;
            $result["tabelFoot1"]= $tabelFoot1;
            $result["Arrgrafik"]= $Arr;
        }
        else if($mode=='jenis_pembangkit')
        {
            $Arrgrafik=array();

            for($i=0; $i<count($set['data']);$i++){
                $jenis_kit= $set['data'][$i]['jenis_pembangkit'];
                $vkoma= $set['data'][$i]['komp_a_ytd'];
                $vkomb= $set['data'][$i]['komp_b_ytd'];
                $vkomc= $set['data'][$i]['komp_c_ytd'];
                $vkomd= $set['data'][$i]['komp_d_ytd'];
                $vsupport= $set['data'][$i]['komp_e_ytd'];
                $vtotalbeban= $set['data'][$i]['total_beban'];
                $vtotalkwh= $set['data'][$i]['kwh_netto_ytd'];
                $vbpp= $set['data'][$i]['bpp_ytd'];
                $vtotalbeban=$vkoma+$vkomb+$vkomc+$vkomd+$vsupport;
                
                if($set['data'][$i]['jenis_pembangkit']!='GRAND TOTAL'){
                    if($set['data'][$i]['tipe_baris']!='DETAIL'){
                        
                        $Arr[$i]['nama']=$jenis_kit;
                        $Arr[$i]['vkoma']=round($vkoma);
                        $Arr[$i]['vkomb']=round($vkomb);
                        $Arr[$i]['vkomc']=round($vkomc);
                        $Arr[$i]['vkomd']=round($vkomd);

                        $tabel1.='
                        <tr>
                            <td>'.$jenis_kit.'</td>
                            <td style="text-align:right">'.numberformatnew($vbpp).'</td>
                            <td style="text-align:right">'.number_format($vtotalkwh, 2, ',', '.').'</td>
                            <td style="text-align:right">'.number_format($vkoma, 2, ',', '.').'</td>
                            <td style="text-align:right">'.number_format($vkomb, 2, ',', '.').'</td>
                            <td style="text-align:right">'.number_format($vkomc, 2, ',', '.').'</td>
                            <td style="text-align:right">'.number_format($vkomd, 2, ',', '.').'</td>
                            <td style="text-align:right">'.number_format($vtotalbeban, 2, ',', '.').'</td>
                        </tr>
                        ';
                    }
                }
                else{
                    $tabelFoot1='
                        <tr>
                            <th><b>TOTAL</b></th>
                            <th style="text-align:right">'.numberformatnew($vbpp).'</th>
                            <th style="text-align:right">'.numberformatnew($vtotalkwh).'</th>
                            <th style="text-align:right">'.numberformatnew($vkoma).'</th>
                            <th style="text-align:right">'.numberformatnew($vkomb).'</th>
                            <th style="text-align:right">'.numberformatnew($vkomc).'</th>
                            <th style="text-align:right">'.numberformatnew($vkomd).'</th>
                            <th style="text-align:right">'.numberformatnew($vtotalbeban).'</th>
                        </tr>
                        ';    

                } 
            }                 

            $result["tabel1"]= $tabel1;
            $result["tabelFoot1"]= $tabelFoot1;
            $result["Arrgrafik"]= $Arr;
        }
        else if($mode=='bpp_per_mesin'){
            
            $tabel2='';
            $no=1;
            $tot_abde=0;
            $tot_abcde=0;
            $tot_kwh_netto_ytd=0;
            $tot_bpp_ytd=0;
            $tot_komp_a_ytd=0;
            $tot_komp_b_ytd=0;
            $tot_komp_c_ytd=0;
            $tot_komp_d_ytd=0;
            $tot_komp_e_ytd=0;
            $tot_bpp_komp_a=0;
            $tot_bpp_komp_b=0;
            $tot_bpp_komp_c=0;
            $tot_bpp_komp_d=0;

            for($i=0; $i<count($set['data']);$i++){                
                $abde=$set['data'][$i]['komp_a_ytd']+$set['data'][$i]['komp_b_ytd']+$set['data'][$i]['komp_d_ytd']+$set['data'][$i]['komp_e_ytd'];
                $abcde=$set['data'][$i]['komp_a_ytd']+$set['data'][$i]['komp_b_ytd']+$set['data'][$i]['komp_c_ytd']+$set['data'][$i]['komp_d_ytd']+$set['data'][$i]['komp_e_ytd'];
                if($set['data'][$i]['kwh_netto_ytd']==0){
                    $bpp_komp_a=0;
                    $bpp_komp_b=0;
                    $bpp_komp_c=0;
                    $bpp_komp_d=0;
                }
                else{
                    $bpp_komp_a=$set['data'][$i]['komp_a_ytd']/$set['data'][$i]['kwh_netto_ytd'];
                    $bpp_komp_b=$set['data'][$i]['komp_b_ytd']/$set['data'][$i]['kwh_netto_ytd'];
                    $bpp_komp_c=$set['data'][$i]['komp_c_ytd']/$set['data'][$i]['kwh_netto_ytd'];
                    $bpp_komp_d=$set['data'][$i]['komp_d_ytd']/$set['data'][$i]['kwh_netto_ytd'];
                }

                $tot_abde=$tot_abde+$abde;
                $tot_abcde=$tot_abcde+$abcde;
                $tot_kwh_netto_ytd=$tot_kwh_netto_ytd+$set['data'][$i]['kwh_netto_ytd'];
                $tot_bpp_ytd=$tot_bpp_ytd+$set['data'][$i]['kwh_netto_ytd'];
                $tot_komp_a_ytd=$tot_komp_a_ytd+$set['data'][$i]['komp_a_ytd'];
                $tot_komp_b_ytd=$tot_komp_b_ytd+$set['data'][$i]['komp_b_ytd'];
                $tot_komp_c_ytd=$tot_komp_c_ytd+$set['data'][$i]['komp_c_ytd'];
                $tot_komp_d_ytd=$tot_komp_d_ytd+$set['data'][$i]['komp_d_ytd'];
                $tot_bpp_komp_a=$tot_bpp_komp_a+$bpp_komp_a;
                $tot_bpp_komp_b=$tot_bpp_komp_b+$bpp_komp_b;
                $tot_bpp_komp_c=$tot_bpp_komp_c+$bpp_komp_c;
                $tot_bpp_komp_d=$tot_bpp_komp_d+$bpp_komp_d;

                if($set['data'][$i]['bulan']==$bln && $set['data'][$i]['tahun']==$thn){
                    if(!empty($reqId)){
                        if($set['data'][$i]['jenis_pembangkit']==$reqId){


                            $tabel2.='
                            <tr>
                                <td style="width:3%">'.$no.'</td>

                                <td style="width:18%">'.$set['data'][$i]['kunit_nama'].' '.$set['data'][$i]['unit_kode'].'</td>

                                <td style="width:10%">'.$set['data'][$i]['distrik_nama'].'</td>

                                <td style="width:10%">'.$set['data'][$i]['jenis_pembangkit'].'</td>

                                <td style="width:5%; text-align:right">'.numberformatnew($abde).'</td>

                                <td style="width:5%; text-align:right">'.numberformatnew($abcde).'</td>

                                <td style="width:6%; text-align:right">'.numberformatnew($set['data'][$i]['kwh_netto_ytd']).'</td>

                                <td style="width:6%; text-align:right">'.numberformatnew($set['data'][$i]['bpp_ytd']).'</td>

                                <td style="width:6%; text-align:right">'.numberformatnew($set['data'][$i]['daya_terpasang_bulan']).'</td>

                                <td style="width:4%; text-align:right">'.numberformatnew($set['data'][$i]['komp_a_ytd']).'</td>

                                <td style="width:4%; text-align:right">'.numberformatnew($set['data'][$i]['komp_b_ytd']).'</td>

                                <td style="width:4%; text-align:right">'.numberformatnew($set['data'][$i]['komp_c_ytd']).'</td>

                                <td style="width:4%; text-align:right">'.numberformatnew($set['data'][$i]['komp_d_ytd']).'</td>

                                <td style="width:3%; text-align:right">'.numberformatnew($bpp_komp_a).'</td>

                                <td style="width:3%; text-align:right">'.numberformatnew($bpp_komp_b).'</td>

                                <td style="width:3%; text-align:right">'.numberformatnew($bpp_komp_c).'</td>

                                <td style="width:3%; text-align:right">'.numberformatnew($bpp_komp_d).'</td>
                            </tr>
                            ';     
                            $no++;
                        }
                    }
                    else{
                        $tabel2.='
                        <tr>
                            <td style="width:3%">'.$no.'</td>

                            <td style="width:18%">'.$set['data'][$i]['kunit_nama'].' '.$set['data'][$i]['unit_kode'].'</td>

                            <td style="width:10%">'.$set['data'][$i]['distrik_nama'].'</td>

                            <td style="width:10%">'.$set['data'][$i]['jenis_pembangkit'].'</td>

                            <td style="width:5%; text-align:right">'.numberformatnew($abde).'</td>

                            <td style="width:5%; text-align:right">'.numberformatnew($abcde).'</td>

                            <td style="width:6%; text-align:right">'.numberformatnew($set['data'][$i]['kwh_netto_ytd']).'</td>

                            <td style="width:6%; text-align:right">'.numberformatnew($set['data'][$i]['bpp_ytd']).'</td>

                            <td style="width:6%; text-align:right">'.numberformatnew($set['data'][$i]['daya_terpasang_bulan']).'</td>

                            <td style="width:4%; text-align:right">'.numberformatnew($set['data'][$i]['komp_a_ytd']).'</td>

                            <td style="width:4%; text-align:right">'.numberformatnew($set['data'][$i]['komp_b_ytd']).'</td>

                            <td style="width:4%; text-align:right">'.numberformatnew($set['data'][$i]['komp_c_ytd']).'</td>

                            <td style="width:4%; text-align:right">'.numberformatnew($set['data'][$i]['komp_d_ytd']).'</td>

                            <td style="width:3%; text-align:right">'.numberformatnew($bpp_komp_a).'</td>

                            <td style="width:3%; text-align:right">'.numberformatnew($bpp_komp_b).'</td>

                            <td style="width:3%; text-align:right">'.numberformatnew($bpp_komp_c).'</td>

                            <td style="width:3%; text-align:right">'.numberformatnew($bpp_komp_d).'</td>
                        </tr>
                        ';     
                        $no++;
                    }  
                }
                if($set['data'][$i]['direktorat']=='GRAND TOTAL')
                {
                    $tabelFoot2='
                    <tr>
                        <th colspan="4" style="width:46%">TOTAL</th>

                        <th style="width:5%; text-align:right">'.numberformatnew($abde).'</th>

                        <th style="width:5%; text-align:right">'.numberformatnew($abcde).'</th>

                        <th style="width:6%; text-align:right">'.numberformatnew($set['data'][$i]['kwh_netto_ytd']).'</th>

                        <th style="width:6%; text-align:right">'.numberformatnew($set['data'][$i]['bpp_ytd']).'</th>

                        <th style="width:6%; text-align:right">'.numberformatnew($set['data'][$i]['daya_terpasang_bulan']).'</th>

                        <th style="width:4%; text-align:right">'.numberformatnew($set['data'][$i]['komp_a_ytd']).'</th>

                        <th style="width:4%; text-align:right">'.numberformatnew($set['data'][$i]['komp_b_ytd']).'</th>

                        <th style="width:4%; text-align:right">'.numberformatnew($set['data'][$i]['komp_c_ytd']).'</th>

                        <th style="width:4%; text-align:right">'.numberformatnew($set['data'][$i]['komp_d_ytd']).'</th>

                        <th style="width:3%; text-align:right">'.numberformatnew($bpp_komp_a).'</th>

                        <th style="width:3%; text-align:right">'.numberformatnew($bpp_komp_b).'</th>

                        <th style="width:3%; text-align:right">'.numberformatnew($bpp_komp_c).'</th>

                        <th style="width:3%; text-align:right">'.numberformatnew($bpp_komp_d).'</th>
                    </tr>
                    ';             
                }
            }
            $result["tabel2"]= $tabel2;
            $result["tabelFoot2"]= $tabelFoot2;
        }
        echo json_encode($result);
        exit;
    }

}
?>
