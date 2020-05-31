<?php	
	require_once("banner-function.php");
	
	$id=(isset($_GET['id']))?$_GET['id']:'';
	$sql= "SELECT * FROM banner WHERE idBanner=$id";
	$result=mysql_query($sql);
	$r=mysql_fetch_assoc($result);	
	$result=banner_xoa($id);
	if($result)
	{
		echo " Xóa thành công ";		
	}	
	header("location:index.php?p=banner");
?>
