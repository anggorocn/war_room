<? 
include_once(APPPATH.'/models/CurlData.php');

class DataCombo extends CurlData{

  var $query;
  var $id;

  function DataCombo()
  {
    $this->CurlData(); 
  }

  function selectdata($arrparam=[], $lihat="", $lihathasil="")
  {
    $token= $arrparam["token"];
    $vurl= $arrparam["vurl"];
    $id= $arrparam["id"];
    $vid= $arrparam["vid"];
    $rowid= $arrparam["rowid"];
    $nip= $arrparam["nip"];
    $jenis= $arrparam["jenis"];
    // print_r($vurl);exit;
    $vparam= $token;

    if(!empty($id))
    {
      $vparam.= "&reqId=".$id;
    }
    if(!empty($rowid))
    {
      $vparam.= "&reqRowId=".$rowid;
    }
    if(!empty($nip))
    {
      $vparam.= "&nip=".$nip;
    }
    if(!empty($vid))
    {
      $vparam.= "&id=".$vid;
    }
    if(!empty($jenis))
    {
      $vparam.= "&jenis=".$jenis;
    }
    $this->selectLimit($vurl, $vparam, $lihat, $lihathasil);
  }
} 
?>