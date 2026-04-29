<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once("functions/string.func.php");
include_once("functions/date.func.php");

class KinerjaKeuanganKorporat_json extends CI_Controller {

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

        $arrparam= ["vurl"=>"Kinerja_keuangan_korporat?t=".$thn."&b=".$bln];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        // print_r($set);
        $result["LabaRugi"]['kategori']= ($set[0]['kategori']);
        $result["LabaRugi"]['realisasi']= number_format($set[0]['realisasi1'] , 2, ',', '.');
        $result["LabaRugi"]['realisasi_alt']= ($set[0]['realisasi_alt']);
        $result["Aset"]['kategori']= ($set[17]['kategori']);
        $result["Aset"]['realisasi']= number_format($set[17]['realisasi1'] , 2, ',', '.');
        $result["Aset"]['realisasi_alt']= ($set[17]['realisasi_alt']);
        $result["PendapatanUsaha"]['kategori']= ($set[1]['kategori']);
        $result["PendapatanUsaha"]['realisasi']= number_format($set[1]['realisasi1'] , 2, ',', '.');
        $result["PendapatanUsaha"]['realisasi_alt']= ($set[1]['realisasi_alt']);
        $result["PiutangUsaha"]['kategori']= ($set[19]['kategori']);
        $result["PiutangUsaha"]['realisasi']= number_format($set[19]['realisasi1'] , 2, ',', '.');
        $result["PiutangUsaha"]['realisasi_alt']= ($set[19]['realisasi_alt']);
        $result["BebanUsaha"]['kategori']= ($set[6]['kategori']);
        $result["BebanUsaha"]['realisasi']= number_format($set[6]['realisasi1'] , 2, ',', '.');
        $result["BebanUsaha"]['realisasi_alt']= ($set[6]['realisasi_alt']);
        $result["SaldoKas"]['kategori']= ($set[24]['kategori']);
        $result["SaldoKas"]['realisasi']= number_format($set[24]['realisasi1'] , 2, ',', '.');
        $result["SaldoKas"]['realisasi_alt']= ($set[24]['realisasi_alt']);
        
        $last_sync=$set[0]['tgl_entri'];
        $tgl_entri=explode(' ', $last_sync);
        $tgl_entri=explode('-', $tgl_entri[0]);
        $result["tgl_entri_kinerjakeuangankorporat"]= $tgl_entri[2]." ".getNameMonth(intval($tgl_entri[1]))." ".$tgl_entri[0];

        $last_kurs=$set[0]['tgl_kurs']; 
        $kurs=$set[0]['kurs'];
        $result["tgl_kurs_kinerjakeuangankorporat"]= ($last_kurs);
        $result["kurs_kinerjakeuangankorporat"]= ($kurs);
        echo json_encode($result);
        exit;
    }

    function sub(){
        $this->load->model('base-api/DataCombo');
        $arrdatabkn= [];
        $bln = $this->input->get("bln");
        $thn = $this->input->get("thn");

        $arrparam= ["vurl"=>"Kinerja_keuangan_korporat?t=".$thn."&b=".$bln];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        // print_r($set);exit;
        $TextDateNow= getExtMonth($bln)." ".($thn-1);
        $TextDateLastYear= getExtMonth($bln)." ".$thn;
        $TextDateNext=  getExtMonth($bln-1)." ".$thn;


        for($i=0; $i<25;$i++){
            $result[$i]['kategori']= ($set[$i]['kategori']);
            $result[$i]['realisasi']= '-';
            $result[$i]['rkap2']= '-';
            $result[$i]['realisasi2']= '-';
            $result[$i]['realisasi3']= '-';
            $nilai_percent = '-';
            $result[$i]['classWarna']='merah';
            $result[$i]['TextDateNow']= $TextDateNow;
            $result[$i]['TextDateNext']= $TextDateNext;
            $result[$i]['TextDateLastYear']= $TextDateLastYear;
            $result[$i]["tgl_entri"]='-';
        }


        for($i=0; $i<count($set);$i++){
            $result[$i]['kategori']= ($set[$i]['kategori']);
            $result[$i]['realisasi']= number_format($set[$i]['realisasi1'] , 2, ',', '.');
            $result[$i]['rkap2']= number_format($set[$i]['rkap1'] , 2, ',', '.');
            $result[$i]['realisasi2']= number_format($set[$i]['realisasi3'] , 2, ',', '.');
            $result[$i]['realisasi3']= number_format($set[$i]['realisasi2'] , 2, ',', '.');
            $nilai_percent = ($set[$i]['realisasi1']/$set[$i]['rkap1'])*100;
            //ketika polaritas 1 = plus
            if($set[$i]['polaritas']==1){
                if($nilai_percent<95)
                {
                    $result[$i]['classWarna']='merah';
                }
                else if($nilai_percent>=95 && $nilai_percent<=99.99)
                {
                    $result[$i]['classWarna']='kuning';
                }
                else
                {
                    $result[$i]['classWarna']='hijau';
                }
                
            }
            else{
                if($nilai_percent<95)
                {
                    $result[$i]['classWarna']='hijau';
                }
                else if($nilai_percent>=95 && $nilai_percent<=99.99)
                {
                    $result[$i]['classWarna']='kuning';
                }
                else
                {
                    $result[$i]['classWarna']='merah';
                }
            }
            $result[$i]['TextDateNow']= $TextDateNow;
            $result[$i]['TextDateNext']= $TextDateNext;
            $result[$i]['TextDateLastYear']= $TextDateLastYear;
            $tgl_entri=explode(' ', $set[0]['tgl_entri']);
            $tgl_entri=explode('-', $tgl_entri[0]);
            $result[$i]["tgl_entri"]= $tgl_entri[2]." ".getNameMonth(intval($tgl_entri[1]))." ".$tgl_entri[0];
        }

        echo json_encode($result);
        exit;
    }

}
?>