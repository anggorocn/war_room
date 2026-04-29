<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once("functions/string.func.php");
include_once("functions/date.func.php");

class Hpp_vs_bpp_json extends CI_Controller {

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

        if($kode==''){
            $kode=0;
        }

        $arrdatabkn= [];
        $arrparam= ["vurl"=>"Hpp_vs_bpp"];
        $set= new DataCombo();
        $set->selectdata($arrparam, "", "allrow");
        $set= $set->rowResult;

        $dataGrafik=array();
        $categories=array();
        $Arrtabel=array();
        // grafik
        for($i=0; $i<count($set);$i++){
            for($j=0; $j<count($set[$i]['yAxis']);$j++){
                $dataGrafik[$i][$j]['nama']=$set[$i]['yAxis'][$j]['label'];
                $dataGrafik[$i][$j]['data']=$set[$i]['yAxis'][$j]['data'];
            }
            for($j=0; $j<count($set[$i]['xAxis']);$j++){
                $categories[$i][]=$set[$i]['xAxis'][$j];
            }

        }
        // tabel
        for($i=0; $i<count($set);$i++){
            $tabel='
            <table style="width:100%">
                <thead>
                    <tr>
                        <th>KET</th>';

            for($j=0; $j<count($set[$i]['xAxis']);$j++){
                $tabel.='<th>'.$set[$i]['xAxis'][$j].'</th>';
            }

            $tabel.='
                    </tr>
                </thead>
                <tbody>';

            for($j=0; $j<count($set[$i]['yAxis']);$j++){
                $tabel.='<tr>
                    <td>'.$set[$i]['yAxis'][$j]['label'].'</td>';
                
                for($k=0; $k<count($set[$i]['xAxis']);$k++){
                    $tabel.='<td>'.$set[$i]['yAxis'][$j]['data'][$k].'</td>';                
                }
                
                $tabel.='</tr>';
            }

            $tabel.='
                </tbody>
            </table>';
            
            $Arrtabel[$i][]=$tabel;
        }

              // <table>
              //   <thead>
              //     <tr>
              //       <th>KET</th><th>2017</th><th>2018</th><th>2019</th><th>2020</th><th>2021</th><th>2022</th><th>2023</th><th>2024</th><th>MAR 2025</th><th>JUN 2025</th>
              //     </tr>
              //   </thead>
              //   <tbody>
              //     <tr>
              //       <td>HPP PLTU JAWA 7 (SGPJB 2.100MW)</td><td> </td><td> </td><td> </td><td>836.34</td><td>571.22</td><td>654.85</td><td>647.49</td><td>668.23</td><td>546.94</td><td>556.41</td>
              //     </tr>
              //     <tr>
              //       <td>BPP PLTU REMBANG (NP 560MW)</td><td>635.38</td><td>569.33</td><td>497.74</td><td>519.96</td><td>485.22</td><td>583.29</td><td>733.77</td><td>780.18</td><td>832.12</td><td>813.27</td>
              //     </tr>
              //     <tr>
              //       <td>BPP PLTU AWAR-AWAR (NP 646MW)</td><td>615.71</td><td>604.89</td><td>574.78</td><td>566.38</td><td>604.86</td><td>692.97</td><td>733.51</td><td>755.20</td><td>736.24</td><td>780.78</td>
              //     </tr>
              //     <tr>
              //       <td>BPP PLTU INDRAMAYU (NP 870MW)</td><td>523.47</td><td>555.50</td><td>558.77</td><td>519.18</td><td>609.34</td><td>719.00</td><td>759.29</td><td>833.66</td><td>872.99</td><td>875.01</td>
              //     </tr>
              //     <tr>
              //       <td>BPP PLTU PACITAN (NP 560MW)</td><td>613.12</td><td>708.10</td><td>619.79</td><td>612.53</td><td>695.82</td><td>764.22</td><td>789.38</td><td>838.63</td><td>879.22</td><td>859.80</td>
              //     </tr>
              //   </tbody>
              // </table>
        // print_r($categories);exit;

        $result["dataGrafik"]= $dataGrafik;
        $result["categories"]= $categories;
        $result["tabel"]= $Arrtabel;
        echo json_encode($result);
        exit;
    }

}
?>
