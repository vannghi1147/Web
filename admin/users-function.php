<?php
//-------------------------------------------------------------------------------------
// THEM MOI users
//-------------------------------------------------------------------------------------
function users_them($HoTen,$Username,$Password,$DiaChi,$Dienthoai,$Email,$NgaySinh,$GioiTinh,$idGroup){
	// Insert SQL
	$sql = sprintf("INSERT INTO users (HoTen,Username,Password,DiaChi,Dienthoai,Email,NgaySinh,GioiTinh,idGroup) VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s)",
		checkvalue($HoTen,"text"),
		checkvalue($Username,"text"),
		checkvalue($Password,"text"),
		checkvalue($DiaChi,"text"),
		checkvalue($Dienthoai,"text"),
		checkvalue($Email,"text"),
		checkvalue($NgaySinh,"text"),		
		checkvalue($GioiTinh,"int"),
		checkvalue($idGroup,"int"));
	//echo $sql;
	$result = mysql_query($sql);
	return $result;
}
	
//-------------------------------------------------------------------------------------
// CAP NHAT users
//-------------------------------------------------------------------------------------
function users_capnhat($idUser,$HoTen,$Username,$Password,$DiaChi,$Dienthoai,$Email,$NgaySinh,$GioiTinh,$idGroup){
	// Update SQL
	$sql = sprintf("UPDATE users SET HoTen=%s,Username=%s,Password=%s,DiaChi=%s,Dienthoai=%s,Email=%s,NgaySinh=%s,GioiTinh=%s,idGroup=%s WHERE idUser=%s",
		checkvalue($HoTen,"text"),
		checkvalue($Username,"text"),
		checkvalue($Password,"text"),
		checkvalue($DiaChi,"text"),
		checkvalue($Dienthoai,"text"),
		checkvalue($Email,"text"),
		checkvalue($NgaySinh,"text"),		
		checkvalue($GioiTinh,"int"),
		checkvalue($idGroup,"int"),
		checkvalue($idUser,"int"));
		echo $sql;
	$result = mysql_query($sql);
	return $result;
}

//-------------------------------------------------------------------------------------
// XOA users
//-------------------------------------------------------------------------------------
function users_xoa($idUser){
	$sql = "DELETE FROM users WHERE idUser = $idUser";
	$result = mysql_query($sql);
	return $result;
}

