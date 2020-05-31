<?php
	function redirect($url,$second){
		echo "<meta http-equiv='refresh' content='".$second.";URL=".$url."'>";

	}
	function sanphammoi(){
		$qr=("SELECT *
			 FROM sanpham
			 ORDER BY idSP DESC
			 LIMIT 0,8 ");
		return mysql_query($qr);	
	}
	function sanpham($from){
		$qr=("SELECT *
			 FROM sanpham
			 ORDER BY idSP DESC
			 LIMIT $from,".SOTRANGCL);
		return mysql_query($qr);	
	}
	//function sanphambanchay(){
	//	$qr=("SELECT *
	//		 FROM sanpham
	//		 ORDER BY SoLanMua DESC
	//		 LIMIT 0,5 ");
	//	return mysql_query($qr);
	//}
	function danhsachchungloai(){
		$qr=("SELECT *
			 FROM chungloai");
		return mysql_query($qr);	
	}
	function danhsachsanphamtheocloai($idcl){
		$qr=("SELECT * 
			  FROM sanpham
			  WHERE idCL=$idcl
			  LIMIT 0,4 ");
		return mysql_query($qr);
	}	
	function sphamtrongloai($TenLoai_KD,$from){
		$qr=("SELECT *,loaisp.*
		   	  FROM sanpham,loaisp
		      WHERE TenLoai_KD='$TenLoai_KD'
			  AND sanpham.idLoai=loaisp.idLoai
			  LIMIT $from,".SOTRANG);
		return mysql_query($qr);
	}
	function loaispdangxem($TenLoai_KD){
		$qr="SELECT loaisp.*,sanpham.*
			 FROM loaisp LEFT JOIN sanpham ON loaisp.idLoai=sanpham.idLoai
			 WHERE TenLoai_KD='$TenLoai_KD'";	
		return mysql_query($qr);		
	}
	function sphamtheochungloai($TenCL_KD,$from){
		$qr=("SELECT *,chungloai.*
		   	  FROM sanpham,chungloai
			  WHERE TenCL_KD='$TenCL_KD'
		      AND sanpham.idCL=chungloai.idCL
			  LIMIT $from,".SOTRANGCL);
		return mysql_query($qr);
	}
	function chungloaidangxem($TenCL_KD){
		$qr="SELECT *
			 FROM chungloai
			 where TenCL_KD='$TenCL_KD'";	
		return mysql_query($qr);		
	}
	
	function chitietsanpham($TenSP_KD){
		$qr=("SELECT *,loaisp.*
			  FROM sanpham inner join loaisp on sanpham.idLoai=loaisp.idLoai
			  WHERE TenSP_KD='$TenSP_KD'");
		$row=mysql_query($qr);
		return mysql_fetch_array($row);		
	}
	function motachitiet($idSP){
		$qr="SELECT * 
			 FROM sanpham_thuoctinh
			 WHERE idSP=$idSP";
		return mysql_query($qr);
	}
	function sanphamcungloai($idloaisp){
		$qr=("SELECT *
		   	  FROM sanpham
		      WHERE idLoai=$idloaisp
			  ORDER BY RAND()	    
		      LIMIT 0,4 ");
		return mysql_query($qr);
	}
	//function sptimkiem($tukhoa,$min,$max){
	//	$qr="SELECT * 
	//		  FROM sanpham
	//		  WHERE TenSP REGEXP '$tukhoa'
	//		  AND (Gia BETWEEN $min AND $max)
	//		  ORDER BY idSP DESC";			 
	//	$row=mysql_query($qr);
	//	return mysql_fetch_array($row);
	//}
	function timkiem($tukhoa,$min,$max,$from){
		$qr="SELECT * 
			  FROM sanpham
			  WHERE TenSP REGEXP '$tukhoa'
			  AND (Gia BETWEEN $min AND $max)
			  ORDER BY idSP DESC
			  LIMIT $from,".SOTRANG ;
		return mysql_query($qr);
	}
?>