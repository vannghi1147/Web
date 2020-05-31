<?php 
		
	require_once('users-function.php');
	require_once('../system/config.php');
	require_once('../system/function.php');
	//$link=db_connect();
	$idUser=(isset($_GET['idUser']))?$_GET['idUser']:'';	
	
	$sql="select * from users where idUser=$idUser";
	$result=mysql_query($sql);
	//doc dong du lieu
	$row_HoTen=mysql_fetch_assoc($result);
	
	
	//doc du lieu laisp
	$xuly=(isset($_POST['xuly']))?1:0;
	if($xuly){
		$HoTen=(isset($_POST['HoTen']))?$_POST['HoTen']:'';
		$Username=(isset($_POST['Username']))?$_POST['Username']:'';
		$Pass=(isset($_POST['Password']))?$_POST['Password']:'';
		$Password=md5($Pass);
		$DiaChi=(isset($_POST['DiaChi']))?$_POST['DiaChi']:'';
		$Dienthoai=(isset($_POST['Dienthoai']))?$_POST['Dienthoai']:'';
		$Email=(isset($_POST['Email']))?$_POST['Email']:'';
		$NgaySinh=(isset($_POST['NgaySinh']))?$_POST['NgaySinh']:'';
		$GioiTinh=(isset($_POST['GioiTinh']))?$_POST['GioiTinh']:1;			
		$idGroup=(isset($_POST['idGroup']))?$_POST['idGroup']:1;
		$idUser=(isset($_POST['idUser']))?$_POST['idUser']:'';	
		
			
		$result=users_capnhat($idUser,$HoTen,$Username,$Password,$DiaChi,$Dienthoai,$Email,$NgaySinh,$GioiTinh,$idGroup);	
	}
?>
    
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="jquery-ui-1.8.2.custom.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../jquery-1.8.2.min.js"></script>
<!-- Chon Ngay-->
<script type="text/javascript" src="jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="jquery.ui.core.js"></script>

<script>
	$(document).ready(function() {
$("#NgaySinh").datepicker({
numberOfMonths: 1,  dateFormat: 'dd/mm/yy',
monthNames: ['Một','Hai','Ba','Tư','Năm','Sáu','Bảy','Tám','Chín', 
'Mười','Mười một','Mười hai'] ,
monthNamesShort: ['Tháng1','Tháng2','Tháng3','Tháng4','Tháng5',
'Tháng6','Tháng7','Tháng8','Tháng9','Tháng10','Tháng11','Tháng12'] ,
dayNames: ['Chủ nhật', 'Thứ hai', 'Thứ ba', 'Thứ tư', 'Thứ năm',
 'Thứ sáu', 'Thứ bảy'],
dayNamesMin: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'] ,
showWeek: true , showOn: 'both',
changeMonth: true , changeYear: true,
currentText: 'Hôm nay', weekHeader: 'Tuần'
});
});
</script>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
 <table class="tbl" width="1000" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td colspan="2" align="center" bgcolor="#0099FF"><h3 style="color: #FFF">Xinh vui lòng nhập đầy đủ thông tin bên dưới</h3></td>
    </tr>
    <tr>
      <td width="118" bgcolor="#CCCCCC" style="text-align: center">Họ tên</td>
      <td width="423" bgcolor="#CCCCCC"><label for="HoTen"></label>
      <input type="text" name="HoTen" id="HoTen" value="<?php echo $row_HoTen['HoTen']?>"></td>
    </tr>
    <tr>
      <td width="118" bgcolor="#CCCCCC" style="text-align: center">Username</td>
      <td bgcolor="#CCCCCC"><label for="Username"></label>
        <label for="Password"></label>
      <input type="text" name="Username" id="Username" value="<?php echo $row_HoTen['Username']?>"/></td>
    </tr>
    <tr>
      <td bgcolor="#CCCCCC" style="text-align: center">Password</td>
      <td bgcolor="#CCCCCC"><label for="DiaChi"></label>   
        <input type="password" name="Password" id="Password" value="<?php echo $row_HoTen['Password']?>"/>
      </label></td>
    </tr>
    <tr>
      <td bgcolor="#CCCCCC" style="text-align: center">Địa chỉ</td>
      <td bgcolor="#CCCCCC"><input type="text" name="DiaChi" id="DiaChi" value="<?php echo $row_HoTen['DiaChi']?>"/></td>
    </tr>
    <tr>
      <td bgcolor="#CCCCCC" style="text-align: center">Điện thoại</td>
      <td bgcolor="#CCCCCC"><input type="text" name="Dienthoai" id="Dienthoai" value="<?php echo $row_HoTen['Dienthoai']?>"/></td>
    </tr>
    <tr>
      <td bgcolor="#CCCCCC" style="text-align: center">Email</td>
      <td bgcolor="#CCCCCC"><input type="text" name="Email" id="Email" value="<?php echo $row_HoTen['Email']?>"/></td>
    </tr>
    <tr>
      <td bgcolor="#CCCCCC" style="text-align: center">Quyền hạn</td>
      <td bgcolor="#CCCCCC"><p>
        <label>
          <input name="idGroup" type="radio" id="idGroup_0" value="1"  <?php if($row_HoTen['idGroup']==1){echo "checked='checked'" ;}?> />
          Admin</label>
        <br />
        <label>
          <input type="radio" name="idGroup" value="0" id="idGroup_1" <?php if($row_HoTen['idGroup']==0){echo "checked='checked'" ;}?> />
          Thành viên</label>
        <br />
      </p></td>
    </tr>
    <tr>
      <td bgcolor="#CCCCCC" style="text-align: center">Ngày sinh</td>
      <td bgcolor="#CCCCCC"><input type="text" name="NgaySinh" id="NgaySinh" value="<?php echo $row_HoTen['NgaySinh']?>"/></td>
    </tr>
    <tr>
      <td bgcolor="#CCCCCC" style="text-align: center">Giới tính</td>
      <td bgcolor="#CCCCCC"><p>
        <label>
          <input type="radio" name="GioiTinh" value="1" id="GioiTinh_0" <?php if($row_HoTen['GioiTinh']==1){echo "checked='checked'" ;}?> />
          Nam</label>
        <br />
        <label>
          <input type="radio" name="GioiTinh" value="0" id="GioiTinh_1"  <?php if($row_HoTen['GioiTinh']==0){echo "checked='checked'" ;}?>/>
          Nữ</label>
        <br />
      </p></td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#CCCCCC" class="color"></td>
    </tr>
    <tr>
      <td width="118" bgcolor="#CCCCCC"><input name="xuly" type="hidden" id="xuly" value="1">
        <span style="text-align: center">
        <input name="idUser" type="hidden" id="idUser" value="<?php echo $row_HoTen['idUser']; ?>" />
      </span></td>
      <td bgcolor="#CCCCCC"><p>
        <input type="submit" name="luu" id="luu" value="lưu" />
      </p>
      <p align="center"><font color="#0099FF" size="+2" ><?php
      	if(isset($_POST['luu'])){
			echo " Sửa thành công";
		}
	  ?></font> </p></td>
    </tr>
  </table>

</form>
</body>
</html>





