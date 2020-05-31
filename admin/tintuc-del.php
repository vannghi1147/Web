<?php
	error_reporting(0);
	require("../lib/dbcon.php");
	require_once("tintuc-function.php");	
	$id=(isset($_GET['id']))?$_GET['id']:'';
	$sql= "SELECT * FROM tintuc WHERE IDtintuc=$id";
	$result=mysql_query($sql);
	$r=mysql_fetch_assoc($result);
	$path="../upload/tintuc/";
	if($r['hinhanh']!=''){
		if(file_exists($path.$r['hinhanh'])){
			unlink($path.$r['hinhanh']);
		}
	}
	$result=tintuc_xoa($id);
	if($result)
	{
		echo " Xóa thành công ";		
	}	
	header("location:index.php?p=tintuc");
?>
