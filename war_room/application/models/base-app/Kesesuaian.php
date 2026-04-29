<? 
include_once(APPPATH.'/models/Entity.php');

class Kesesuaian extends Entity { 

	var $query;

    function Kesesuaian()
	{
      	$this->Entity(); 
    }
 
    function insert()
    {
    	$this->setField("KESESUAIAN_ID", $this->getNextId("KESESUAIAN_ID","KESESUAIAN"));

    	$str = "
    	INSERT INTO KESESUAIAN
    	(
    		KESESUAIAN_ID,OUTLINING_ASSESSMENT_ID,DISTRIK_ID,BLOK_UNIT_ID,UNIT_MESIN_ID,BULAN,TAHUN,STATUS,LAST_CREATE_USER,LAST_CREATE_DATE
    	)
    	VALUES 
    	(
    		".$this->getField("KESESUAIAN_ID")."
	    	, ".$this->getField("OUTLINING_ASSESSMENT_ID")."
	    	, ".$this->getField("STATUS")."
	    	, '".$this->getField("LAST_CREATE_USER")."'
	    	, ".$this->getField("LAST_CREATE_DATE")."
	    )"; 

	    $this->id= $this->getField("KESESUAIAN_ID");
	    $this->query= $str;
			// echo $str;exit;
	    return $this->execQuery($str);
	}

	function insertdetil()
    {
    	$this->setField("KESESUAIAN_DETIL_ID", $this->getNextId("KESESUAIAN_DETIL_ID","KESESUAIAN_DETIL"));

    	$str = "
    	INSERT INTO KESESUAIAN_DETIL
    	(
    		KESESUAIAN_DETIL_ID,KESESUAIAN_ID,LIST_AREA_ID,KATEGORI_ITEM_ASSESSMENT_ID,ITEM_ASSESSMENT_DUPLIKAT_ID,ITEM_ASSESSMENT_FORMULIR_ID,STANDAR_REFERENSI_ID,STATUS_CONFIRM,KETERANGAN,LAST_CREATE_USER,LAST_CREATE_DATE,AREA_UNIT_DETIL_ID,PROGRAM_ITEM_ASSESSMENT_ID,STATUS_KONFIRMASI,BOBOT
    	)
    	VALUES 
    	(
    		".$this->getField("KESESUAIAN_DETIL_ID")."
    		, ".$this->getField("KESESUAIAN_ID")."
	    	, ".$this->getField("LIST_AREA_ID")."
	    	, ".$this->getField("KATEGORI_ITEM_ASSESSMENT_ID")."
	    	, ".$this->getField("ITEM_ASSESSMENT_DUPLIKAT_ID")."
	    	, ".$this->getField("ITEM_ASSESSMENT_FORMULIR_ID")."
	    	, ".$this->getField("STANDAR_REFERENSI_ID")."
	    	, ".$this->getField("STATUS_CONFIRM")."
	    	, '".$this->getField("KETERANGAN")."'
	    	, '".$this->getField("LAST_CREATE_USER")."'
	    	, ".$this->getField("LAST_CREATE_DATE")."
	    	, ".$this->getField("AREA_UNIT_DETIL_ID")."
	    	, ".$this->getField("PROGRAM_ITEM_ASSESSMENT_ID")."
	    	, ".$this->getField("STATUS_KONFIRMASI")."
	    	, ".$this->getField("BOBOT")."
	    )"; 

	    $this->id= $this->getField("KESESUAIAN_DETIL_ID");
	    $this->query= $str;
		// echo $str;exit;
	    return $this->execQuery($str);
	}


	
	function update()
	{
		$str = "
		UPDATE KESESUAIAN
		SET
		DISTRIK_ID = ".$this->getField("DISTRIK_ID")."
		, BLOK_UNIT_ID = ".$this->getField("BLOK_UNIT_ID")."
		, UNIT_MESIN_ID = ".$this->getField("UNIT_MESIN_ID")."
		, BULAN = '".$this->getField("BULAN")."'
		, TAHUN = ".$this->getField("TAHUN")."
		, STATUS = ".$this->getField("STATUS")."
		, LAST_UPDATE_USER = '".$this->getField("LAST_UPDATE_USER")."'
		, LAST_UPDATE_DATE = ".$this->getField("LAST_UPDATE_DATE")."
		WHERE KESESUAIAN_ID = '".$this->getField("KESESUAIAN_ID")."'
		"; 
		$this->query = $str;
			// echo $str;exit;
		return $this->execQuery($str);
	}

	function updatedetil()
	{
		$str = "
		UPDATE KESESUAIAN_DETIL
		SET
			KESESUAIAN_ID= ".$this->getField("KESESUAIAN_ID")."
			, LIST_AREA_ID = ".$this->getField("LIST_AREA_ID")."
			, KATEGORI_ITEM_ASSESSMENT_ID = ".$this->getField("KATEGORI_ITEM_ASSESSMENT_ID")."
			, ITEM_ASSESSMENT_DUPLIKAT_ID = ".$this->getField("ITEM_ASSESSMENT_DUPLIKAT_ID")."
			, ITEM_ASSESSMENT_FORMULIR_ID = ".$this->getField("ITEM_ASSESSMENT_FORMULIR_ID")."
			, STANDAR_REFERENSI_ID = ".$this->getField("STANDAR_REFERENSI_ID")."
			, STATUS_CONFIRM = ".$this->getField("STATUS_CONFIRM")."
			, KETERANGAN = '".$this->getField("KETERANGAN")."'
			, LAST_UPDATE_USER = '".$this->getField("LAST_UPDATE_USER")."'
			, LAST_UPDATE_DATE = ".$this->getField("LAST_UPDATE_DATE")."
			, AREA_UNIT_DETIL_ID = ".$this->getField("AREA_UNIT_DETIL_ID")."
			, PROGRAM_ITEM_ASSESSMENT_ID = ".$this->getField("PROGRAM_ITEM_ASSESSMENT_ID")."
			, STATUS_KONFIRMASI = ".$this->getField("STATUS_KONFIRMASI")."
			, BOBOT = ".$this->getField("BOBOT")."

		WHERE KESESUAIAN_DETIL_ID = '".$this->getField("KESESUAIAN_DETIL_ID")."'
		"; 
		$this->query = $str;
			// echo $str;exit;
		return $this->execQuery($str);
	}

	function update_status()
	{
		$str = "
		UPDATE KESESUAIAN
		SET
		STATUS = ".$this->getField("STATUS")."
		WHERE KESESUAIAN_ID = '".$this->getField("KESESUAIAN_ID")."'
		"; 

		$this->query = $str;
		return $this->execQuery($str);
	}

	function delete()
	{
		$str = "
		DELETE FROM KESESUAIAN
		WHERE 
		KESESUAIAN_ID = ".$this->getField("KESESUAIAN_ID").";
		";
		$str .= "
		DELETE FROM KESESUAIAN_DETIL
		WHERE 
		KESESUAIAN_ID = ".$this->getField("KESESUAIAN_ID").";
		"; 

		$this->query = $str;
		return $this->execQuery($str);
	}

	function deletedetil()
	{
		$str = "
		DELETE FROM KESESUAIAN_DETIL
		WHERE 
		KESESUAIAN_DETIL_ID = ".$this->getField("KESESUAIAN_DETIL_ID")."
		AND KESESUAIAN_ID = ".$this->getField("KESESUAIAN_ID")."
		"; 

		$this->query = $str;
		return $this->execQuery($str);
	}

	

	function selectByParams($paramsArray=array(),$limit=-1,$from=-1, $statement='', $sOrder="ORDER BY KESESUAIAN_ID ASC")
	{
		$str = "
			SELECT 
				A.*, B.BULAN, B.TAHUN,C.NAMA DISTRIK_INFO,D.NAMA BLOK_INFO, E.NAMA UNIT_MESIN_INFO
				, CASE WHEN A.STATUS = 1 THEN 'Tidak  Aktif' ELSE 'Aktif' END STATUS_INFO
			FROM KESESUAIAN A
			INNER JOIN OUTLINING_ASSESSMENT B ON B.OUTLINING_ASSESSMENT_ID = A.OUTLINING_ASSESSMENT_ID
			INNER JOIN DISTRIK C ON C.DISTRIK_ID = B.DISTRIK_ID
			INNER JOIN BLOK_UNIT D ON D.BLOK_UNIT_ID = B.BLOK_UNIT_ID
			INNER JOIN UNIT_MESIN E ON E.UNIT_MESIN_ID = B.UNIT_MESIN_ID
			WHERE 1=1

		"; 
		
		while(list($key,$val) = each($paramsArray))
		{
			$str .= " AND $key = '$val' ";
		}
		
		$str .= $statement." ".$sOrder;
		$this->query = $str;
				
		return $this->selectLimit($str,$limit,$from); 
	}

	

	function selectByParamsDetil($paramsArray=array(),$limit=-1,$from=-1, $statement='', $sOrder="ORDER BY KESESUAIAN_DETIL_ID ASC")
	{
		$str = "
			SELECT 
				A.*
			FROM KESESUAIAN_DETIL A
			INNER JOIN  KESESUAIAN B ON B.KESESUAIAN_ID = A.KESESUAIAN_ID
			WHERE 1=1
		"; 
		
		while(list($key,$val) = each($paramsArray))
		{
			$str .= " AND $key = '$val' ";
		}
		
		$str .= $statement." ".$sOrder;
		$this->query = $str;
				
		return $this->selectLimit($str,$limit,$from); 
	}


    function getCountByParams($paramsArray=array(),$statement='')
	{
		$str = "SELECT COUNT(1) AS ROWCOUNT 
		FROM KESESUAIAN a
		WHERE 1 = 1  ".$statement; 
		while(list($key,$val)=each($paramsArray))
		{
			$str .= " AND $key = '$val' ";
		}
		
		$this->select($str); 
		if($this->firstRow()) 
			return $this->getField("ROWCOUNT"); 
		else 
			return 0; 
    }

  
} 
?>