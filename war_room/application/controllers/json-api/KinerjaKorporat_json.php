<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once("functions/string.func.php");
include_once("functions/date.func.php");

class KinerjaKorporat_json extends CI_Controller {

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

        $arrdatabkn= [];
        $arrparam= ["vurl"=>"Kinerja_korporat?t=".$thn."&b=".$bln];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        // print_r($set);exit;
        $data=$set['entry'];
        $listStatusBelumPenilaian=0;
        $listStatus100=0;
        $listStatus95=0;
        $listStatus90=0;
        $totalKpi=0;
        for($i=0;$i<count($data);$i++){
            if($data[$i]['iskpi']==1){
                if($data[$i]['pencapaian'] >= 100){
                    $listStatus100=$listStatus100+1;
                } else if($data[$i]['pencapaian'] >= 95 && $data[$i]['pencapaian'] < 100){
                    $listStatus95=$listStatus95+1;
                } else if($data[$i]['pencapaian'] < 95 && $data[$i]['pencapaian'] != ''){
                    $listStatus90=$listStatus90+1;
                }
                else{
                    $listStatusBelumPenilaian=$listStatusBelumPenilaian+1;
                }
                $totalKpi++;
                // echo "(".$i."-".$data[$i]['pencapaian'].")";
            }
        }
        $result["listStatusBelumPenilaian"]= $listStatusBelumPenilaian;
        $result["listStatus100"]= $listStatus100;
        $result["listStatus95"]= $listStatus95;
        $result["listStatus90"]= $listStatus90;
        $result["totalKpi"]= $totalKpi;
        
        $arrdatabkn= [];
        $arrparam= ["vurl"=>"Kinerja_korporat_nko?t=".$thn."&b=".$bln];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        $data=$set['entry'];
        
        // print_r($data);exit;
        $result["nko"]=$data[0]['nko_final'];


        echo json_encode($result);
        exit;
    }

    function sub(){
        $this->load->model('base-api/DataCombo');

        $bln = $this->input->get("bln");
        $thn = $this->input->get("thn");

        $arrdatabkn= [];
        $arrparam= ["vurl"=>"Kinerja_korporat?t=".$thn."&b=".$bln];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        // print_r($set);exit;
        $data=$set['entry'];
        $listStatusBelumPenilaian=0;
        $listStatus100=0;
        $listStatus95=0;
        $listStatus90=0;
        $totalKpi=0;
        $arrkpidata=array();
        $arrkpidataTotal=array();
        $arrkpidata100=array();
        $arrkpidata95=array();
        $arrkpidata90=array();
        $arrkpidataBelumNilai=array();
        for($i=0;$i<count($data);$i++){
            if($data[$i]['iskpi']==1){
                if($data[$i]['pencapaian'] >= 100){
                    $listStatus100=$listStatus100+1;
                } else if($data[$i]['pencapaian'] >= 95 && $data[$i]['pencapaian'] < 100){
                    $listStatus95=$listStatus95+1;
                } else if($data[$i]['pencapaian'] < 95 && $data[$i]['pencapaian'] != ''){
                    $listStatus90=$listStatus90+1;
                }
                else{
                    $listStatusBelumPenilaian=$listStatusBelumPenilaian+1;
                }
                $totalKpi++;
                // echo "(".$i."-".$data[$i]['pencapaian'].")";
            }

            if($data[$i]['kpi_group']==''){
                array_push($arrkpidata, $data[$i]['kpi_master']);
                $total=0;
                for($j=0;$j<count($data);$j++){
                    if($data[$i]['kpi_master']==$data[$j]['kpi_group']){
                        $total=0;
                        $listkpiStatus100=0;
                        $listkpiStatus95=0;
                        $listkpiStatus90=0;
                        $listkpiStatusBelumPenilaian=0;
                    }
                    else{
                        for($k=0;$k<count($data);$k++){
                            if($data[$k]['iskpi']==1){
                                if($data[$j]['kpi_master']==$data[$k]['kpi_group']){
                                    $total++;
                                    if($data[$k]['pencapaian'] >= 100){
                                        $listkpiStatus100=$listkpiStatus100+1;
                                    } else if($data[$k]['pencapaian'] >= 95 && $data[$k]['pencapaian'] < 100){
                                        $listkpiStatus95=$listkpiStatus95+1;
                                    } else if($data[$k]['pencapaian'] < 95 && $data[$k]['pencapaian'] != ''){
                                        $listkpiStatus90=$listkpiStatus90+1;
                                    }
                                    else{
                                        $listkpiStatusBelumPenilaian=$listkpiStatusBelumPenilaian+1;
                                    }
                                }
                            }
                        }
                    }
                    
                }
                array_push($arrkpidataTotal, $total);
                array_push($arrkpidata100, $listkpiStatus100);
                array_push($arrkpidata95, $listkpiStatus95);
                array_push($arrkpidata90, $listkpiStatus90);
                array_push($arrkpidataBelumNilai, $listkpiStatusBelumPenilaian);
                        
            }
        }
        // print_r($arrkpidata);
        // echo '<br>';
        // print_r($arrkpidataTotal);
        // echo '<br>';
        // print_r($arrkpidata100);
        // echo '<br>';
        // print_r($arrkpidata95);
        // echo '<br>';
        // print_r($arrkpidata90);
        // echo '<br>';
        // print_r($arrkpidataBelumNilai);

        // exit;
        $result["listStatusBelumPenilaian"]= $listStatusBelumPenilaian;
        $result["listStatus100"]= $listStatus100;
        $result["listStatus95"]= $listStatus95;
        $result["listStatus90"]= $listStatus90;
        $result["totalKpi"]= $totalKpi;
        $result["arrkpidata"]= $arrkpidata;
        $result["arrkpidataTotal"]= $arrkpidataTotal;
        $result["arrkpidata100"]= $arrkpidata100;
        $result["arrkpidata95"]= $arrkpidata95;
        $result["arrkpidata90"]= $arrkpidata90;
        $result["arrkpidataBelumNilai"]= $arrkpidataBelumNilai;
        echo json_encode($result);
        exit;
    }

    function replacekata($var)
    {
        $var= preg_replace('/[^a-z]+/i', ' ', $var);
        $var= str_replace(" ", "", strtolower($var));
        return $var;
    }

    function cariparent($cari, $key, $arr)
    {
        $arrcheck= in_array_column($cari, $key, $arr);
        // print_r($arrcheck);exit;

        if(!empty($arrcheck))
        {
            $vindex= $arrcheck[0];
            $vkpigroup= $arr[$vindex]["kpi_group"];
            $vkpimaster= $arr[$vindex]["kpi_master"];

            // kalau sudah mentok maka return
            if(empty($vkpigroup))
            {
                return $this->replacekata($vkpimaster);
            }

            return $this->cariparent($vkpigroup, $key, $arr);
        }
    }

    function cariindex($cari, $key, $arr)
    {
        $arrcheck= in_array_column($cari, $key, $arr);
        // print_r($arrcheck);exit;

        $vindex= "none";
        if(!empty($arrcheck))
        {
            $vindex= $arrcheck[0];
            return $vindex;
        }
        else
        {
            return $vindex;
        }
    }

    function subcb(){
        // print_r($arrkpidata);exit;
        // $tempArr= array_unique(array_column($arrkpigroup, "nama"));
        // $arrkpigroup= array_merge(array_intersect_key($arrkpigroup, $tempArr));
        // // print_r($arrkpigroup);exit;


        $this->load->model('base-api/DataCombo');

        $bln = $this->input->get("bln");
        $thn = $this->input->get("thn");

        $arrdatabkn= [];
        $arrparam= ["vurl"=>"Kinerja_korporat?t=".$thn."&b=".$bln];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        // print_r($set);exit;
        $data= $set['entry'];
        // print_r($data);exit;

        $vpie= "";
        $listStatusBelumPenilaian= $listStatus100= $listStatus95= $listStatus90= $totalKpi= 0;
        $arrkpigroup= [];

        foreach ($data as $key => $value) 
        {
            $vkpigroup= $value["kpi_group"];
            $vkpimaster= $value["kpi_master"];
            $dtkpigroup= $this->replacekata($vkpigroup);
            $dtkpimaster= $this->replacekata($vkpimaster);
            $keygroup= $dtkpigroup."-".$dtkpimaster;

            $viskpi= $value["iskpi"];
            $vidgrade= $value["id_grade"];
            $vrealisasi= $value["realisasi"];
            $vpencapaian= $value["pencapaian"];

            // ambil data kpi header
            if(empty($vkpigroup))
            {
                $arrdata= [];
                $arrdata["id"]= $dtkpimaster;
                $arrdata["nama"]= $vkpimaster;
                $arrdata["total"]= $arrdata["belum"]= $arrdata["v100"]= $arrdata["v95"]= $arrdata["v90"]= 0;
                $arrdata["keterangan"]= "";
                array_push($arrkpigroup, $arrdata);

                $vpie.= '
                <div class="col-md-2">
                  <div class="item">
                    <div class="caption">'.$vkpimaster.'</div>
                    <div class="grafik-pie" id="chartjson'.$dtkpimaster.'"></div>
                    <div class="keterangan"><label id="keteranganchart'.$dtkpimaster.'"></label></div>
                  </div>
                </div>';
            }

            if($viskpi == 1)
            {
                if($vpencapaian >= 100)
                {
                    $cariparent= $this->cariparent($vkpigroup, "kpi_master", $data);
                    
                    $vindexgroupid= $this->cariindex($cariparent, "id", $arrkpigroup);
                    if($vindexgroupid !== "none")
                    {
                        $vtotalgroup= $arrkpigroup[$vindexgroupid]["v100"];
                        $arrkpigroup[$vindexgroupid]["v100"]= $vtotalgroup + 1;
                    }

                    $listStatus100++;
                }
                else if($vpencapaian >= 95 && $vpencapaian < 100)
                {
                    $cariparent= $this->cariparent($vkpigroup, "kpi_master", $data);

                    $vindexgroupid= $this->cariindex($cariparent, "id", $arrkpigroup);
                    if($vindexgroupid !== "none")
                    {
                        $vtotalgroup= $arrkpigroup[$vindexgroupid]["v95"];
                        $arrkpigroup[$vindexgroupid]["v95"]= $vtotalgroup + 1;
                    }

                    $listStatus95++;
                }
                else if($vpencapaian < 95 && $vpencapaian != '')
                {
                    $cariparent= $this->cariparent($vkpigroup, "kpi_master", $data);

                    $vindexgroupid= $this->cariindex($cariparent, "id", $arrkpigroup);
                    if($vindexgroupid !== "none")
                    {
                        $vtotalgroup= $arrkpigroup[$vindexgroupid]["v90"];
                        $arrkpigroup[$vindexgroupid]["v90"]= $vtotalgroup + 1;

                        $vketerangan90= $arrkpigroup[$vindexgroupid]["keterangan"];
                        $vketerangan90= getconcatseparator($vketerangan90, $vkpimaster, ", ");
                        $arrkpigroup[$vindexgroupid]["keterangan"]= $vketerangan90;
                    }

                    $listStatus90++;
                    // $vketerangan90= getconcatseparator($vketerangan90, $vinfonama);
                }
                else
                {
                    $cariparent= $this->cariparent($vkpigroup, "kpi_master", $data);

                    $vindexgroupid= $this->cariindex($cariparent, "id", $arrkpigroup);
                    if($vindexgroupid !== "none")
                    {
                        $vtotalgroup= $arrkpigroup[$vindexgroupid]["belum"];
                        $arrkpigroup[$vindexgroupid]["belum"]= $vtotalgroup + 1;
                    }

                    $listStatusBelumPenilaian++;
                }
                $totalKpi++;
            }

        }
        // print_r($data[0]['modified_date']);exit;

        $result["listStatusBelumPenilaian"]= $listStatusBelumPenilaian;
        $result["listStatus100"]= $listStatus100;
        $result["listStatus95"]= $listStatus95;
        $result["listStatus90"]= $listStatus90;
        $result["totalKpi"]= $totalKpi;
        $result["arrkpigroup"]= $arrkpigroup;
        $result["vpie"]= $vpie;
        $tgl_entri=explode(' ', $data[0]['modified_date']);
        $tgl_entri=explode('-', $tgl_entri[0]);
        $result["tgl_entri"]= $tgl_entri[2]." ".getNameMonth(intval($tgl_entri[1]))." ".$tgl_entri[0];
        // print_r($result);exit;
        echo json_encode($result);
        exit;
    }

    function subDetil(){
        $this->load->model('base-api/DataCombo');

        $bln = $this->input->get("bln");
        $thn = $this->input->get("thn");

        $arrdatabkn= [];
        $arrparam= ["vurl"=>"Kinerja_korporat?t=".$thn."&b=".$bln];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        // print_r($set);exit;
        $data= $set['entry'];
        // print_r($data);exit;
        $classfa= $tab="";
        $jmlsudah= $jmlhampir= $jmlbelum= $jmlbelumdilakukan=0;

        for($i=0;$i<=count($data);$i++){
            
            $vkpigroup= $data[$i]["kpi_group"];
            $vidgrade= $data[$i]["id_grade"];
            $vkpimaster= $data[$i]["kpi_master"];
            $vnilaibobot= $data[$i]["nilai_bobot"];
            $vsatuan= $data[$i]["satuan"];
            $vtargetrkap= $data[$i]["target_rkap"];
            $vtarget= $data[$i]["target"];
            $vrealisasi= $data[$i]["realisasi"];
            $vpencapaian= $data[$i]["pencapaian"];
            $vnilai= $data[$i]["nilai"];
            $vidtransaksi= $data[$i]["id_kpimaster"];

            if($i==0)
            {
                $arrbody=array();
                $body= "";
            }
            else{
            		
            	if($vidgrade == 1)
            	{
            		//SUDAH MEMENUHI TARGET
            		$classfa="fa fa-circle hijau";
            		$jmlsudah++;
            	}
            	if($vidgrade == 2)
            	{
            		//HAMPIR MEMENUHI TARGET
            		$classfa="fa fa-circle kuning";
            		$jmlhampir++;
            	}
            	if($vidgrade == 3)
            	{
            		//BELUM MEMENUHI TARGET
            		$classfa="fa fa-circle merah";
            		$jmlbelum++;
            	}
            	if($vidgrade == 4)
            	{
            		//BELUM DILAKUKAN PENILAIAN
            		$classfa="";
            		$jmlbelumdilakukan++;
            	}
            	// var_dump($classfa);

                if(!empty($vkpigroup))
                {
                    $vtr= "tr-parent";

                    // echo $vkpigroup."-".$i."<br/>";
                    $arrcheck= $this->cariindex($vkpigroup, "kpi_master", $data);
                    if(!empty($arrcheck))
                    {
                        $checkdata= $data[$arrcheck];
                        // print_r($checkdata);exit;
                        if($i == 21)
                        {
                            // print_r($arrcheck);exit;
                        }

                        if(!empty($checkdata["kpi_group"]))
                        {
                            $vtr= "tr-child";
                        }
                    }

                    $body .=
                    '<tr class="'.$vtr.'">
                        <td class="nama" onclick="window.location.href=`app/index/kinerja_korporat_detil_kpi?b='.$bln.'&t='.$thn.'&reqId='.$vidtransaksi.'`;" style="cursor:pointer; color: blue">'.$vkpimaster.'</td>
                        <td>'.$vnilaibobot.'</td>
                        <td>'.$vsatuan.'</td>
                        <td>'.$vtargetrkap.'</td>
                        <td>'.$vtarget.'</td>
                        <td>'.$vrealisasi.'</td>
                        <td>'.$vpencapaian.'</td>
                        <td>'.$vnilai.'</td>
                        <td><i class="'.$classfa.'" aria-hidden="true"></i></td>
                    </tr>';
                }
                else{
                    array_push($arrbody, $body);
                    $body='';
                }
            }
        }
        $tabContent='';

        $j=0;
        for($i=0;$i<count($data);$i++){
            if($data[$i]['kpi_group']==''){
                $style='';
                if($i==0){
                    $style='active';
                }
                $tab.='
                    <li class="'.$style.'" style="width: 16.5%;"><a data-toggle="tab" href="#home'.$i.'">'.$data[$i]['kpi_master'].'</a></li>
                ';

                $tabContent.='
                <div id="home'.$i.'" class="tab-pane fade in '.$style.'">
                    <link rel="stylesheet" href="lib/ScrollingTable/style.css" />
                    <div class="area-tabel">
                      <table id="Demo">
                        <thead>
                          <tr>
                            <th class="headerHor">KPI</th>
                            <th class="headerHor">Bobot</th>
                            <th class="headerHor">Satuan</th>
                            <th class="headerHor">Target '.$thn.'</th>
                            <th class="headerHor">Target '.getNameMonth(intval($bln)).' '.$thn.'</th>
                            <th class="headerHor">Realisasi '.getNameMonth(intval($bln)).' '.$thn.'</th>
                            <th class="headerHor">Pencapaian</th>
                            <th class="headerHor">Nilai</th>
                            <th class="headerHor">&nbsp;</th>
                          </tr>
                        </thead>
                        <tbody>
                            '.$arrbody[$j].'
                        </tbody>
                      </table>
                    </div>
                  </div>';
                $j++;
            }
        }

        $result["tablist"]= $tab;
        $result["tabContent"]= $tabContent;
       

        // print_r($result["sudah"]);exit;

        echo json_encode($result);
        exit;
    }

    function subTracker(){
        $this->load->model('base-api/DataCombo');

        $bln = $this->input->get("bln");
        $thn = $this->input->get("thn");
        $reqId = $this->input->get("reqId");
        // echo $reqId;exit;

        $arrdatabkn= [];
        $arrparam= ["vurl"=>"Kinerja_korporat_tracker?t=".$thn."&b=".$bln."&id_kpimaster=".$reqId];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        $data=$set['entry']['0'];

        // print_r($set);exit;
        $result["explanation"]= $data['explanation'];
        $result["prev_action_steps"]= $data['prev_action_steps'];
        $result["action_impact"]= $data['action_impact'];
        $result["action_status"]= $data['action_status'];
        $result["next_action_step"]= $data['next_action_step'];
        $result["due_date"]= $data['due_date'];
        $result["pic"]= $data['pic'];
        $result["due_date"]= $data['due_date'];
        $result["target_rkap"]= $data['target_rkap'];
        $result["realisasi_bulan"]= $data['realisasi_bulan'];
        $result["target_bulan"]= $data['target_bulan'];
        $result["kpi_master"]= $data['kpi_master'];
        $j=0;
        for($i=1;$i<=12;$i++){
            $arrparam= ["vurl"=>"Kinerja_korporat_tracker?t=".$thn."&b=".$i."&id_kpimaster=".$reqId];
            $set= new DataCombo();
            $set->selectdata($arrparam, "", "allrow");
            $set= $set->rowResult;
            $data=$set['entry']['0'];

            $result["realisasi_bulan_arr"][$j]= $data['realisasi_bulan'];
            $j++;

        }
       

        // print_r($result["sudah"]);exit;

        echo json_encode($result);
        exit;
    }

    function DiagramGrafik(){
        $this->load->model('base-api/DataCombo');

        $bln = $this->input->get("bln");
        $thn = $this->input->get("thn");
        $reqId = $this->input->get("reqId");
        // echo $reqId;exit;

        $arrdatabkn= [];
        $arrparam= ["vurl"=>"Kinerja_korporat_tren?tawal=".($thn-1)."&takhir=".$thn];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        $realisasi_awal=['','','','','','','','','','','',''];
        $realisasi_akhir=['','','','','','','','','','','',''];
        $awal=0;
        $akhir=0;
        for($i=0;$i<count($set['entry']);$i++){
            if($set['entry'][$i]['tahun']==($thn-1)){
                if($set['entry'][$i]['nko_final']!=null){
                    $realisasi_awal[$awal]= $set['entry'][$i]['nko_final'];
                }else{
                    $realisasi_awal[$awal]= 0;
                }    
                    $awal++;
            }
            else{
                if($set['entry'][$i]['nko_final']!=null){
                    $realisasi_akhir[$akhir]= $set['entry'][$i]['nko_final'];
                }else{
                    if($thn!=date("Y")){
                        $realisasi_akhir[$akhir]= 0;
                    }
                }
                 $akhir++;                    

            }
        }

        $result["realisasi_awal"]=$realisasi_awal;
        $result["realisasi_akhir"]=$realisasi_akhir;
       
        echo json_encode($result);
        exit;
    }

    function TabelBawah(){
        $this->load->model('base-api/DataCombo');

        $bln = $this->input->get("bln");
        $thn = $this->input->get("thn");
        $reqId = $this->input->get("reqId");
        // echo $reqId;exit;

        $arrdatabkn= [];
        $arrparam= ["vurl"=>"Kinerja_korporat_tabel?tawal=".($thn-1)."&takhir=".$thn];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;
        // print_r($set); exit;
        $warna=['hijau','kuning','merah','abu'];
        $table='
            <div class="area-ringkasan-kontrak-kinerja" style="height: calc(40vh - 80px); padding: 15px;">
                <table class="table">
                    <thead>
                        <tr>
                          <th>Jan</th>
                          <th>Feb</th>
                          <th>Mar</th>
                          <th>Apr</th>
                          <th>Mei</th>
                          <th>Jun</th>
                          <th>Jul</th>
                          <th>Agu</th>
                          <th>Sep</th>
                          <th>Okt</th>
                          <th>Nov</th>
                          <th>Des</th>
                        </tr>
                    </thead>
                    <tbody>
        ';

        for($h=0;$h<count($warna);$h++){
            $table.='<tr>';
            $gambarrow=0;
            $keyDaftar = 'daftar_' . $warna[$h];
            for($i=0;$i<count($set['entry']);$i++){
                if($set['entry'][$i]['tahun']==$thn){

                    if($set['entry'][$i][$warna[$h]]=='0'){
                        
                        // $table.='<td><i class="fa fa-circle '.$warna[$h].'" aria-hidden="true"></i> : '.$set['entry'][$i][$warna[$h]].'</td>';
                        $table.='<td><i class="fa fa-circle '.$warna[$h].'" aria-hidden="true" title="'.$set['entry'][$i][$keyDaftar].'"></i> : '.$set['entry'][$i][$warna[$h]].'</td>';
                    $gambarrow++;
                    }
                    else if($set['entry'][$i][$warna[$h]]!=null){
                        // print_r($keyDaftar.$set['entry'][$i][$warna[$h]].$set['entry'][$i][$keyDaftar]);exit;
                        // $table.='<td><i class="fa fa-circle '.$warna[$h].'" aria-hidden="true"></i> : '.$set['entry'][$i][$warna[$h]].'</td>';
                        $table.='<td><i class="fa fa-circle '.$warna[$h].'" aria-hidden="true" title="'.$set['entry'][$i][$keyDaftar].'"></i> : '.$set['entry'][$i][$warna[$h]].'</td>';
                    $gambarrow++;
                    }
                }
            }
            if($gambarrow!=11){
                for($i=$gambarrow;$i<=12;$i++){
                    $table.='<td></td>';              
                }

            }
            $table.='</tr>';
        }

        $table.='
              </tbody>
            </table>
          </div>';
        
        $result["table"]= $table;
       
        echo json_encode($result);
        exit;
    }

}
?>