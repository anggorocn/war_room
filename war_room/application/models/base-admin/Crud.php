<? 
include_once(APPPATH.'/models/Entity.php');

class Crud extends Entity { 

	var $query;

    function Crud()
	{
      	$this->Entity(); 
    }

    function insert()
    {
    	$this->setField("PENGGUNA_HAK_ID", $this->getNextId("PENGGUNA_HAK_ID","PENGGUNA_HAK"));

    	$str = "
    	INSERT INTO PENGGUNA_HAK
    	(
    		PENGGUNA_HAK_ID, KODE_HAK, NAMA_HAK, DESKRIPSI
    	)
    	VALUES 
    	(
	    	'".$this->getField("PENGGUNA_HAK_ID")."'
	    	, '".$this->getField("KODE_HAK")."'
	    	, '".$this->getField("NAMA_HAK")."'
	    	, '".$this->getField("DESKRIPSI")."'
	    )"; 

			$this->id= $this->getField("PENGGUNA_HAK_ID");
			$this->query= $str;
			// echo $str;exit;
			return $this->execQuery($str);
	}

	function updateDurasi()
    {
    	$str = "
		UPDATE durasi_autoplay
		SET
		durasi_autoplay= '".$this->getField("durasi_autoplay")."'
		"; 
		$this->query = $str;
		// echo $str;exit;
		return $this->execQuery($str);
	}

	function selectByParamsDurasi($paramsArray=array(),$limit=-1,$from=-1, $statement='', $sOrder="")
	{
		$str = "
			SELECT 
				A.*
			FROM durasi_autoplay A 
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

	function insertPenggunaCrud()
    {
    	// $this->setField("PENGGUNA_HAK_ID", $this->getNextId("PENGGUNA_HAK_ID","PENGGUNA_HAK"));

    	$str = "
    	INSERT INTO PENGGUNA_CRUD
    	(
    		PENGGUNA_HAK_ID, KODE_HAK, kode_modul, menu, modul_c, modul_anak_c
    		, modul_r, modul_anak_r, modul_u, modul_anak_u, modul_d, modul_anak_d
    	)
    	VALUES 
    	(
	    	'".$this->getField("PENGGUNA_HAK_ID")."'
	    	, '".$this->getField("KODE_HAK")."'
	    	, '".$this->getField("kode_modul")."'
	    	, '".$this->getField("menu")."'
	    	, '".$this->getField("modul_c")."'
	    	, '".$this->getField("modul_anak_c")."'
	    	, '".$this->getField("modul_r")."'
	    	, '".$this->getField("modul_anak_r")."'
	    	, '".$this->getField("modul_u")."'
	    	, '".$this->getField("modul_anak_u")."'
	    	, '".$this->getField("modul_d")."'
	    	, '".$this->getField("modul_anak_d")."'
	    )"; 

			$this->id= $this->getField("PENGGUNA_HAK_ID");
			$this->query= $str;
			// echo $str;exit;
			return $this->execQuery($str);
	}

	function update()
	{
			$str = "
			UPDATE PENGGUNA_HAK
			SET
			KODE_HAK= '".$this->getField("KODE_HAK")."'
			, NAMA_HAK= '".$this->getField("NAMA_HAK")."'
			, DESKRIPSI= '".$this->getField("DESKRIPSI")."'
			WHERE PENGGUNA_HAK_ID = '".$this->getField("PENGGUNA_HAK_ID")."'
			"; 
			$this->query = $str;
			// echo $str;exit;
			return $this->execQuery($str);
	}

	function delete()
	{
		$str = "
		DELETE FROM PENGGUNA_HAK
		WHERE 
		PENGGUNA_HAK_ID = ".$this->getField("PENGGUNA_HAK_ID").""; 

		$this->query = $str;
		return $this->execQuery($str);
	}

	function deletePenggunaCrud()
	{
		$str = "
		DELETE FROM PENGGUNA_CRUD
		WHERE 
		KODE_HAK = '".$this->getField("KODE_HAK")."'"; 

		// echo $str;exit();
		$this->query = $str;
		return $this->execQuery($str);
	}

	function selectByParams($paramsArray=array(),$limit=-1,$from=-1, $statement='', $sOrder="ORDER BY PENGGUNA_HAK_ID ASC")
	{
		$str = "
			SELECT 
				A.*
			FROM PENGGUNA_HAK A 
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

	function selectByParamsMenus($paramsArray=array(),$limit=-1,$from=-1, $statement='', $kodeHak='', $sOrder="ORDER BY idpath ASC")
	{
		$str = "
			with recursive cte as 
			(
				select
				b.kode_modul, b.level_modul, b.menu_modul, b.order_modul
				, b.kode_modul id, lpad(b.kode_modul::varchar(12),12,'0')::varchar(144) as idpath, 1::int as depth
				, b.group_modul, a.menu, a.modul_c, a.modul_anak_c, a.modul_r, a.modul_anak_r, a.modul_u, a.modul_anak_u
				, a.modul_d, a.modul_anak_d,b.status_sub_appr
				FROM pengguna_modul b
				LEFT JOIN (SELECT * FROM pengguna_crud WHERE kode_hak = '".$kodeHak."') a ON a.kode_modul = b.kode_modul
				WHERE 1=1 and b.level_modul = '0'
				
				union all
				
				select
				a.kode_modul, a.level_modul, a.menu_modul, a.order_modul
				, a.kode_modul id, concat(idpath, lpad(a.kode_modul::varchar(12),12,'0'))::varchar(144) idpath, depth + 1::int as depth
				, a.group_modul, a.menu, a.modul_c, a.modul_anak_c, a.modul_r, a.modul_anak_r, a.modul_u, a.modul_anak_u
				, a.modul_d, a.modul_anak_d,a.status_sub_appr
				from cte r
				join
				(
					select
					b.kode_modul, b.level_modul, b.menu_modul, b.order_modul
					, b.group_modul, a.menu, a.modul_c, a.modul_anak_c, a.modul_r, a.modul_anak_r, a.modul_u, a.modul_anak_u
					, a.modul_d, a.modul_anak_d,b.status_sub_appr
					FROM pengguna_modul b
					LEFT JOIN (SELECT * FROM pengguna_crud WHERE kode_hak = '".$kodeHak."') a ON a.kode_modul = b.kode_modul
					WHERE 1=1
				)
				a on a.level_modul = r.id
			)
			select * from cte
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



	function selectByParamsCrudHak($paramsArray=array(),$limit=-1,$from=-1, $statement='', $sOrder="ORDER BY PENGGUNA_HAK_ID ASC")
	{
		$str = "
			SELECT 
				A.*,B.MENU
			FROM PENGGUNA_HAK A 
			INNER JOIN PENGGUNA_CRUD B ON B.PENGGUNA_HAK_ID = A.PENGGUNA_HAK_ID
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

	function insertPilihanKinerja()
    {
    	$this->setField("pilihan_kinerja_id", $this->getNextId("pilihan_kinerja_id","pilihan_kinerja"));

    	$str = "
    	INSERT INTO pilihan_kinerja
    	(
    		pilihan_kinerja_id, Kinerja_id, Urutan
    	)
    	VALUES 
    	(
	    	".$this->getField("pilihan_kinerja_id")."
	    	, ".$this->getField("Kinerja_id")."
	    	, ".$this->getField("Urutan")."
	    )"; 

		$this->query= $str;
		// echo $str;exit;
		return $this->execQuery($str);
	}

	function deletePilihanKinerja($statement='')
	{
		$str = "
		DELETE FROM pilihan_kinerja where 1=1"; 

		$str .= $statement." ".$sOrder;

		$this->query = $str;
		return $this->execQuery($str);
	}

	function selectByParamsPilihanKinerja($paramsArray=array(),$limit=-1,$from=-1, $statement='', $sOrder="order by Urutan asc")
	{
		$str = "
			SELECT 
				A.*
			FROM pilihan_kinerja A 
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

} 
?>