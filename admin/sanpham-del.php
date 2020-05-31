<?php
	require_once("sanpham-function.php");
	
	$id=(isset($_GET['id']))?$_GET['id']:'';
	$sql= "SELECT * FROM sanpham WHERE idSP=$id";
	$result=mysql_query($sql);
	$r=mysql_fetch_assoc($result);
	$path="../upload/sanpham/hinhchinh/";
	if($r['UrlHinh']!=''){
		if(file_exists($path.$r['UrlHinh'])){
			unlink($path.$r['UrlHinh']);
		}
	}
	$result=sanpham_xoa($id);
	if($result)
	{
		echo " Xóa thành công ";		
	}	
	header("location:index.php?p=sanpham")
?>
