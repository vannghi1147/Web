<?php
//-------------------------------------------------------------------------------------
// THEM MOI LOAISP
//-------------------------------------------------------------------------------------
function loaisp_them($TenLoai,$TenLoai_KD,$AnHien,$ThuTu){
	// Insert SQL
	$sql = sprintf("INSERT INTO loaisp (TenLoai,TenLoai_KD,AnHien,ThuTu) VALUES (%s,%s,%s,%s)",
		checkvalue($TenLoai,"text"),
		checkvalue($TenLoai_KD,"text"),		
		checkvalue($AnHien,"int"),		
		checkvalue($ThuTu,"int"));
	// echo $sql;
	$result = mysql_query($sql);
	return $result;
}
	
//-------------------------------------------------------------------------------------
// CAP NHAT LOAISP
//-------------------------------------------------------------------------------------
function loaisp_capnhat($idLoai,$TenLoai,$TenLoai_KD,$AnHien,$ThuTu){
	// Update SQL
	$sql = sprintf("UPDATE loaisp SET TenLoai=%s, TenLoai_KD=%s, AnHien=%s, ThuTu=%s WHERE idLoai=%s",
		checkvalue($TenLoai,"text"),
		checkvalue($TenLoai_KD,"text"),		
		checkvalue($AnHien,"int"),
		checkvalue($ThuTu,"int"),
		checkvalue($idLoai,"int"));
	$result = mysql_query($sql);
	return $result;
}

//-------------------------------------------------------------------------------------
// XOA LOAISP
//-------------------------------------------------------------------------------------
function loaisp_xoa($id){
	$sql = "DELETE FROM loaisp WHERE idLoai = $id";
	$result = mysql_query($sql);
	return $result;
}

