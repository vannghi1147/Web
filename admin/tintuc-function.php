<?php
//-------------------------------------------------------------------------------------
// THEM MOI TINTUC
//-------------------------------------------------------------------------------------
function tintuc_them($tintuc,$gioithieu,$chitiet,$hinhanh,$nguon,$hienthi,$sapxep){
	// Insert SQL
	$sql = sprintf("INSERT INTO tintuc (tintuc,gioithieu,chitiet,hinhanh,nguon,hienthi,sapxep) VALUES (%s,%s,%s,%s,%s,%s,%s)",
		checkvalue($tintuc,"text"),
		checkvalue($gioithieu,"text"),
		checkvalue($chitiet,"text"),
		checkvalue($hinhanh,"text"),		
		checkvalue($nguon,"text"),
		checkvalue($hienthi,"int"),
		checkvalue($sapxep,"int"));
	// echo $sql;
	$result = mysql_query($sql);
	return $result;
}
	
//-------------------------------------------------------------------------------------
// CAP NHAT LOAISP
//-------------------------------------------------------------------------------------
function tintuc_capnhat($IDtintuc,$tintuc,$gioithieu,$chitiet,$hinhanh,$nguon,$hienthi,$sapxep){
	// Update SQL
	$sql = sprintf("UPDATE tintuc SET tintuc=%s, gioithieu=%s,chitiet=%s, hinhanh=%s,nguon=%s, hienthi=%s, sapxep=%s WHERE IDtintuc=%s",
		checkvalue($tintuc,"text"),
		checkvalue($gioithieu,"text"),
		checkvalue($chitiet,"text"),
		checkvalue($hinhanh,"text"),		
		checkvalue($nguon,"text"),
		checkvalue($hienthi,"int"),
		checkvalue($sapxep,"int"),
		checkvalue($IDtintuc,"int"));
		// echo $sql;
	$result = mysql_query($sql);
	return $result;
}

//-------------------------------------------------------------------------------------
// XOA LOAISP
//-------------------------------------------------------------------------------------
function tintuc_xoa($id){
	$sql = "DELETE FROM tintuc WHERE IDtintuc = $id";
	$result = mysql_query($sql);
	return $result;
}

