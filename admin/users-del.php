<?php
	require_once("users-function.php");
	
	$idUser=(isset($_GET['idUser']))?$_GET['idUser']:'';
	$sql="select * from users where idUser=$idUser";
	$result=mysql_query($sql);
	//doc dong du lieu
	$row_users=mysql_fetch_assoc($result);		
	$result=users_xoa($idUser);
	if($result)
	{
		echo " Xóa thành công ";		
	}	
	header("location:index.php?p=users")
?>



