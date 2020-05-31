<?php
//-------------------------------------------------------------------------------------
// THEM MOI LOAISP
//-------------------------------------------------------------------------------------
function banner_them($TenBanner,$UrlHinh,$sapxep){
	// Insert SQL
	$sql = sprintf("INSERT INTO banner (TenBanner,UrlHinh,sapxep) VALUES (%s,%s,%s)",
		checkvalue($TenBanner,"text"),
		checkvalue($UrlHinh,"text"),
		checkvalue($sapxep,"int"));		
	// echo $sql;
	$result = mysql_query($sql);
	return $result;
}
	
//-------------------------------------------------------------------------------------
// CAP NHAT lienhe
//-------------------------------------------------------------------------------------
function banner_capnhat($idBanner,$TenBanner,$UrlHinh,$sapxep){
	// Update SQL
	$sql = sprintf("UPDATE banner SET TenBanner=%s, UrlHinh=%s ,sapxep=%s WHERE idBanner=%s",
		checkvalue($TenBanner,"text"),
		checkvalue($UrlHinh,"text"),
		checkvalue($sapxep,"int"),		
		checkvalue($idBanner,"int"));
	$result = mysql_query($sql);
	return $result;
}
//-------------------------------------------------------------------------------------
// XOA lienhe
//-------------------------------------------------------------------------------------
function banner_xoa($idBanner){
	$sql = "DELETE FROM banner WHERE idBanner = $idBanner";
	$result = mysql_query($sql);
	return $result;
}

