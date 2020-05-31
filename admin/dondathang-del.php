<?php
	error_reporting(0);
	require("../lib/dbcon.php");
	$idDH=(isset($_GET['idDH']))?$_GET['idDH']:'';
	$sql = "DELETE FROM donhang WHERE idDH = $idDH";
	$result = mysql_query($sql);
	$sq = "DELETE FROM donhangchitiet WHERE idDH = $idDH";
	$resul = mysql_query($sq);	
	
	header("location:index.php?p=dondathang")
?>
