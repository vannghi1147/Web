<?php	
	require_once("loaisp-function.php");
	require_once("../system/function.php");
	
	$id=(isset($_GET['id']))?$_GET['id']:'';
	$sql= "SELECT * FROM loaisp WHERE idLoai=$id";
	$result=mysql_query($sql);
	$r=mysql_fetch_assoc($result);	
	$result=loaisp_xoa($id);
	if($result)
	{
		echo " Xóa thành công ";		
	}	
	header("location:index.php?p=loaisanpham");
?>
