<? 
include_once(APPPATH.'/models/Entity.php');

class Notif extends Entity { 

	var $query;

    function Notif()
	{
      	$this->Entity(); 
    }

  //   function getCountByParamsNotifOutlining($paramsArray=array(),$statementstatus="",$roleid="", $statement="")
  //   {
  //       $str = "
  //       SELECT COUNT(1) AS ROWCOUNT
  //       FROM APPROVAL A
  //       INNER JOIN PENGGUNA_MODUL C ON A.REF_TABEL = C.LINK_MODUL
  //       INNER JOIN OUTLINING_ASSESSMENT E ON E.OUTLINING_ASSESSMENT_ID = A.REF_ID::INTEGER  
  //       WHERE 1=1
  //        ".$statementstatus."
  //        AND (E.V_STATUS = 0 OR E.V_STATUS = 1 OR E.V_STATUS = 10 OR E.V_STATUS = 30)
  //       AND ( C.KODE_MODUL IN
  //       (
	 //        SELECT A.REF_TABEL
	 //        FROM FLOW_APPROVAL A
	 //        INNER JOIN FLOW_APPDETAIL B ON A.FLOW_ID=B.FLOW_ID
	 //        INNER JOIN ROLE_APPROVAL C ON B.ROLE_ID=C.ROLE_ID
	 //        WHERE C.ROLE_ID = '".$roleid."'
  //       ))
  //       AND  NOT EXISTS
  //       (
  //           SELECT ROLE_ID FROM APPRDETAIL X 
  //           WHERE X.APPR_ID= A.APPR_ID 
  //           AND  X.ROLE_ID = '".$roleid."'
  //           AND (APRD_STATUS = 0 OR APRD_STATUS = 1 OR APRD_STATUS = 10 OR APRD_STATUS = 30)

  //       )
		// ".$statement;

  //       while(list($key,$val)=each($paramsArray))
  //       {
  //           $str .= " AND $key= '$val' ";
  //       }
        
  //       $this->query= $str;
  //       // echo $str;exit();
  //       $this->select($str);
  //       if($this->firstRow()){
  //           return $this->getField("ROWCOUNT"); 
  //       }
  //       else {
  //           return 0; 
  //       }
  //   }

    function getCountByParamsNotifOutlining($paramsArray=array(),$statementstatus="",$roleid="", $statement="")
    {
        $str = "
        SELECT COUNT(1) AS ROWCOUNT
        FROM APPROVAL A
        INNER JOIN PENGGUNA_MODUL C ON A.REF_TABEL = C.LINK_MODUL
        INNER JOIN OUTLINING_ASSESSMENT E ON E.OUTLINING_ASSESSMENT_ID = A.REF_ID::INTEGER  
        WHERE 1=1
         ".$statementstatus."
        AND ( C.KODE_MODUL IN
        (
            SELECT A.REF_TABEL
            FROM FLOW_APPROVAL A
            INNER JOIN FLOW_APPDETAIL B ON A.FLOW_ID=B.FLOW_ID
            INNER JOIN ROLE_APPROVAL C ON B.ROLE_ID=C.ROLE_ID
        ))
        AND A.NEXT_ROLE_ID =  '".$roleid."'
        
        ".$statement;

        while(list($key,$val)=each($paramsArray))
        {
            $str .= " AND $key= '$val' ";
        }
        
        $this->query= $str;
        // echo $str;exit();
        $this->select($str);
        if($this->firstRow()){
            return $this->getField("ROWCOUNT"); 
        }
        else {
            return 0; 
        }
    }


    function getCountByParamsNotifRekomendasi($paramsArray=array(),$statementstatus="",$roleid="", $statement="")
    {
        $str = "
        SELECT COUNT(1) AS ROWCOUNT
        FROM APPROVAL A
        INNER JOIN PENGGUNA_MODUL C ON A.REF_TABEL = C.LINK_MODUL
        INNER JOIN OUTLINING_ASSESSMENT_REKOMENDASI E ON E.OUTLINING_ASSESSMENT_REKOMENDASI_ID = A.REF_ID::INTEGER  
        WHERE 1=1
         ".$statementstatus."
        AND ( C.KODE_MODUL IN
        (
	        SELECT A.REF_TABEL
	        FROM FLOW_APPROVAL A
	        INNER JOIN FLOW_APPDETAIL B ON A.FLOW_ID=B.FLOW_ID
	        INNER JOIN ROLE_APPROVAL C ON B.ROLE_ID=C.ROLE_ID
        ))
        AND A.NEXT_ROLE_ID =  '".$roleid."'
		    ".$statement;

        while(list($key,$val)=each($paramsArray))
        {
            $str .= " AND $key= '$val' ";
        }
        
        $this->query= $str;
        // echo $str;exit();
        $this->select($str);
        if($this->firstRow()){
            return $this->getField("ROWCOUNT"); 
        }
        else {
            return 0; 
        }
    }

    function selectlistapproval($paramsArray=array(), $statement="")
	{
		$str = "
		SELECT B.ROLE_ID, B.FLOWD_INDEX, C.ROLE_NAMA, D.APPR_ID
		FROM flow_approval A
		INNER JOIN flow_appdetail B ON A.FLOW_ID = B.FLOW_ID
		INNER JOIN role_approval C ON B.ROLE_ID = C.ROLE_ID
		INNER JOIN
		(
			SELECT B.KODE_MODUL, A.*
			FROM approval A
			INNER JOIN (SELECT KODE_MODUL, LINK_MODUL FROM pengguna_modul) B ON LINK_MODUL = REF_TABEL
		) D ON D.KODE_MODUL = A.REF_TABEL
		INNER JOIN outlining_assessment e ON e.outlining_assessment_id = d.ref_id::integer 
		WHERE 1=1 
		";
		
		$str .= $statement." ".$sOrder;
		$this->query = $str;
		// echo $str;exit;
				
		return $this->selectLimit($str,-1,-1); 
    }

     function selectlistapprovalstatus($reftabel, $sOrder="")
	{
		$str = "
		SELECT
		B.ROLE_ID, C.NAMA, B.APRD_TGL, B.APRD_STATUS, B.APRD_ALASANTOLAK
		, SA.NAMA APRD_STATUS_NAMA
    	--*
		FROM approval A
		INNER JOIN apprdetail B ON A.APPR_ID=B.APPR_ID
		INNER JOIN pengguna C ON B.USER_ID=C.PENGGUNA_ID
		LEFT JOIN status_approve SA ON B.APRD_STATUS = SA.STATUS_APPROVE_ID
		WHERE 1=1
		AND A.REF_TABEL = '".$reftabel."'
		AND A.APPR_STATUS < 30
		";
		
		$str .= " ".$sOrder;
		$this->query = $str;
		// echo $str;exit;
				
		return $this->selectLimit($str,-1,-1); 
    }


	
} 
?>